<?php
App::uses('AppController', 'Controller');
/**
 * Medics Controller
 *
 * @property Medic $Medic
 */
class MedicsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Medic->recursive = 0;
		$this->set('medics', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Medic->id = $id;
		if (!$this->Medic->exists()) {
			throw new NotFoundException(__('M&eacute;dico inv&aacute;lido'));
		}
		$this->set('medic', $this->Medic->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medic->create();
			if ($this->Medic->save($this->request->data)) {
				$this->Session->setFlash(__('El m&eacute;dico fue creado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El m&eacute;dico no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$medicTypes = $this->Medic->MedicType->find('list');
		$this->set(compact('medicTypes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Medic->id = $id;
		if (!$this->Medic->exists()) {
			throw new NotFoundException(__('M&eacute;dico inv&aacute;lido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Medic->save($this->request->data)) {
				$this->Session->setFlash(__('El m&eacute;dico fue modificado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El m&eacute;dico no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Medic->read(null, $id);
		}
		$medicTypes = $this->Medic->MedicType->find('list');
		$this->set(compact('medicTypes'));
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
		$this->Medic->id = $id;
		if (!$this->Medic->exists()) {
			throw new NotFoundException(__('M&eacute;dico inv&aacute;lido'));
		}
		if ($this->Medic->delete()) {
			$this->Session->setFlash(__('El m&eacute;dico fue borrado correctamente', null), 
					'default', 
					array('class' => 'success'));
			//$this->redirect(array('action' => 'index'));
		}

		if (!$this->checkDelete()){
			$this->Session->setFlash(__('El m&eacute;dico no pudo ser borrado. Tiene Oms asociados.'));
		}
		$this->redirect(array('action' => 'index'));
	}

	function checkDelete(){
		$count = $this->Medic->OmsRegister->find("count", array(
			"conditions" => array("medic_id" => $this->Medic->id)
		));
		if ($count == 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allowedActions = array('index', 'view');
    }

}
