<?php
App::uses('AppController', 'Controller');
/**
 * OmsRegisters Controller
 *
 * @property OmsRegister $OmsRegister
 */
class OmsRegistersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OmsRegister->recursive = 0;
		$this->set('omsRegisters', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OmsRegister->id = $id;
		if (!$this->OmsRegister->exists()) {
			throw new NotFoundException(__('Invalid oms register'));
		}
		$this->set('omsRegister', $this->OmsRegister->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {	
		if ($this->request->is('post')) {
		
			//debug($this->request->data);
			
			if ($this->request->data['Control']['misma_particular'] == 'true') {
				unset($this->request->data['Primary']);
			} else if ($this->request->data['Control']['cargo_particular'] == 'true') {
				unset($this->request->data['OmsRegister']['address_part_id']);
			}
			
			if ($this->request->data['Control']['misma_laboral'] == 'true') {
				unset($this->request->data['Secondary']);
			} else if ($this->request->data['Control']['cargo_laboral'] == 'true') {
				unset($this->request->data['OmsRegister']['address_lab_id']);
			}
			unset($this->request->data['Control']);
			
			//debug($this->request->data);
			//exit;	
			$this->OmsRegister->create();
			if ($this->OmsRegister->saveAll($this->request->data)) {
				//$this->Session->setFlash(__('The oms register has been saved'));
				$this->Session->setFlash(__('La informaci&oacute;n fue agregada correctamente!', null), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'patients','action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The oms register could not be saved. Please, try again.'));
			}
		}
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
		$this->set('patient', $this->OmsRegister->Patient->read(null, $id));
		$medics = $this->OmsRegister->Medic->find('list');
		$omsCodes = $this->OmsRegister->OmsCode->find('list');
		$this->set(compact('medics','omsCodes','provinces'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null,$paciente=null) {
		$this->OmsRegister->id = $id;
		if (!$this->OmsRegister->exists()) {
			throw new NotFoundException(__('Invalid oms register'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OmsRegister->save($this->request->data)) {
				$this->Session->setFlash(__('La informaci&oacute;n fue modificada correctamente!', null), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'patients','action' => 'view',$paciente));
				//$this->Session->setFlash(__('The oms register has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oms register could not be saved. Please, try again.'));
			}
		} else {
			//$this->request->data = $this->OmsRegister->read(null, $id);
			$this->set('omsregister', $this->OmsRegister->read(null, $id));
		}
		//$patients = $this->OmsRegister->Patient->find('list');
		$medics = $this->OmsRegister->Medic->find('list');
		//$addressParts = $this->OmsRegister->AddressPart->find('list');
		//$addressLabs = $this->OmsRegister->AddressLab->find('list');
		//$omsCodes = $this->OmsRegister->OmsCode->find('list');
		$this->set(compact('medics'));
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
		$this->OmsRegister->id = $id;
		if (!$this->OmsRegister->exists()) {
			throw new NotFoundException(__('Invalid oms register'));
		}
		if ($this->OmsRegister->delete()) {
			$this->Session->setFlash(__('Oms register deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Oms register was not deleted'));
		$this->redirect(array('action' => 'index'));
	}	

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
