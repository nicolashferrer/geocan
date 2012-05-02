<?php
App::uses('AppController', 'Controller');
/**
 * OmsCodes Controller
 *
 * @property OmsCode $OmsCode
 */
class OmsCodesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OmsCode->recursive = 0;
		$this->set('omsCodes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OmsCode->id = $id;
		if (!$this->OmsCode->exists()) {
			throw new NotFoundException(__('Invalid oms code'));
		}
		$this->set('omsCode', $this->OmsCode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OmsCode->create();
			if ($this->OmsCode->save($this->request->data)) {
				$this->Session->setFlash(__('The oms code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oms code could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->OmsCode->id = $id;
		if (!$this->OmsCode->exists()) {
			throw new NotFoundException(__('Invalid oms code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OmsCode->save($this->request->data)) {
				$this->Session->setFlash(__('The oms code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oms code could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OmsCode->read(null, $id);
		}
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
		$this->OmsCode->id = $id;
		if (!$this->OmsCode->exists()) {
			throw new NotFoundException(__('Invalid oms code'));
		}
		if ($this->OmsCode->delete()) {
			$this->Session->setFlash(__('Oms code deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Oms code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	//Devuelve los hijos del siguiente nivel para el padre $id	
	function getSigNivel($id){

	$mixes= $this->OmsCode->find('all', array('conditions' => array('padre' => $id)));
        
            $json = array();
            $i = 0;  
            foreach ($mixes as $mix) {
				$json[$i]['id'] = $mix['OmsCode']['id'];
                $json[$i]['descripcion'] = $mix['OmsCode']['descripcion'];
				$json[$i]['codigo'] = $mix['OmsCode']['codigo'];
                $i++;
            }
		return new CakeResponse(array('body' => json_encode($json)));
    }
	
	//Devuelve las sugerencias a partir de un query dado para el autocompletamiento de codigos oms	
	function sugerencias(){

	if (!empty($this->request->query['query'])) {
		$query = $this->request->query['query'];
	} else {
		$query = "";
	}
	
	$mixes= $this->OmsCode->find('all', array('conditions' => array( 'OR' => array('OmsCode.codigo LIKE' => '%'.$query.'%','OmsCode.descripcion LIKE' => '%'.$query.'%'), 'OmsCode.padre <>' => null )));
        
            $desc = array();
			$ids = array();
            $i = 0;  
            foreach ($mixes as $mix) {
                $desc[$i] = $mix['OmsCode']['codigo'].' - '.$mix['OmsCode']['descripcion'];
				$ids[$i] = $mix['OmsCode']['id'];
                $i++;
            }
			$json = array();
			$json[0]['query'] = $query;
			$json[0]['suggestions'] = $desc;
			$json[0]['data'] = $ids;
		return new CakeResponse(array('body' => json_encode($json[0])));
    }
	
	//Ayuda para seleccion de codigos OMS
	public function help() {
		$codigos = $this->OmsCode->find('list', array('fields' => array('OmsCode.codigo','OmsCode.descripcion'),
		'conditions' => array('OmsCode.padre' => null)));
		$this->layout = 'mini';
		$this->set(compact('codigos'));
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }
	
}