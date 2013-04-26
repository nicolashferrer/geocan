<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 */
class CitiesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Ciudad inv&aacute;lida'));
		}
		$this->set('city', $this->City->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('La ciudad fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La ciudad no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$provinces = $this->City->Province->find('list');
		$this->set(compact('provinces'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Ciudad inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('La ciudad fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La ciudad no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->City->read(null, $id);
		}
		$provinces = $this->City->Province->find('list');
		$this->set(compact('provinces'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Ciudad inv&aacute;lida'));
		}
		if ($this->City->delete()) {
			$this->Session->setFlash(__('La ciudad fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			//$this->redirect(array('action' => 'index'));
		}
		if (!$this->checkDelete())
			$this->Session->setFlash(__('La ciudad no pudo ser borrada. Tiene direcciones asociadas.'));
		$this->redirect(array('action' => 'index'));
	}
	
	function checkDelete(){
		$count = $this->City->Address->find("count", array(
			"conditions" => array("city_id" => $this->City->id)
		));
		if ($count == 0) {
			return true;
		} else {
			return false;
		}
	}

	//Obtener las ciudades a partir de una provincia	
	function getCiudades($id){
        if (!$id) {
            $ciudades = "";
        }
        else{
            $mixes= $this->City->find('all', array('conditions' => array('province_id' => $id)));
        }
            $json = array();
            $i = 0;  
            foreach ($mixes as $mix) {
                $json[$i]['id'] = $mix['City']['id'];
                $json[$i]['nombre'] = $mix['City']['nombre'];
                $i++;
            }
     //   $this->set('jsonVariables', $json);
    //    $this->render(null, 'ajax', '/elements/json');
    //    exit(); 
		return new CakeResponse(array('body' => json_encode($json)));
    }


	
	function getNombre($id) {
		if (!$id) {
            $nombre = "";
        }
		else{
			$this->City->recursive = 0;
            $nombre = $this->City->read('nombre',$id);
        }
		
		return new CakeResponse(array('body' => json_encode($nombre)));
          
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('getCiudades');
    }
 
}