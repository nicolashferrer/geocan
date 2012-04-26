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
			throw new NotFoundException(__('Invalid city'));
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
				$this->Session->setFlash(__('The city has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('The city has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->City->delete()) {
			$this->Session->setFlash(__('City deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City was not deleted'));
		$this->redirect(array('action' => 'index'));
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
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }
 
}