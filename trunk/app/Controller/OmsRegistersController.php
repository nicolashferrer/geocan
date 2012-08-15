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
			throw new NotFoundException(__('Registro Oms inv&aacute;lido'));
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
			
			$nueva_part= false;
			$nueva_lab= false;
			
			$id_pat= $this->request->data['OmsRegister']['patient_id'];
			
			if ($this->request->data['Control']['misma_particular'] == 'true') {
				unset($this->request->data['Primary']);
			} else if ($this->request->data['Control']['cargo_particular'] == 'true') {
				unset($this->request->data['OmsRegister']['address_part_id']);
				$nueva_part= true;
			}
			
			if ($this->request->data['Control']['misma_laboral'] == 'true') {
				unset($this->request->data['Secondary']);
			} else if ($this->request->data['Control']['cargo_laboral'] == 'true') {
				unset($this->request->data['OmsRegister']['address_lab_id']);
				$nueva_lab= true;
			}
			unset($this->request->data['Control']);
			
			//debug($this->request->data);
			//exit;	
			
			$this->OmsRegister->create();
			
			if ($this->OmsRegister->saveAll($this->request->data)) {
			
				$this->Session->setFlash(__('El registro Oms fue creado correctamente.', null), 
					'default', 
					array('class' => 'success'));
					
				if ($nueva_part){
					$id_dir= $this->OmsRegister->Primary->id;
					Controller::loadModel('Patient');
					//si el paciente no tiene direccion particular y agregue un oms con direccion particular.. tambien se lo asigno al paciente
					$this->Patient->updateAll( array('address_particular_id' => $id_dir),array('Patient.address_particular_id' => NULL ,'Patient.id' => $id_pat));
					//ahora le asigno esa direccion a todos los oms sin direccion particular
					$this->OmsRegister->updateAll( array('address_part_id' => $id_dir),array('OmsRegister.address_part_id' => NULL , 'OmsRegister.patient_id' => $id));
				}	
					
				if ($nueva_lab){
					$id_dir= $this->OmsRegister->Secondary->id;
					Controller::loadModel('Patient');
					//si el paciente no tiene direccion laboral y agregue un oms con direccion laboral.. tambien se lo asigno al paciente
					$this->Patient->updateAll( array('address_laboral_id' => $id_dir),array('Patient.address_laboral_id' => NULL ,'Patient.id' => $id_pat));
					//ahora le asigno esa direccion a todos los oms sin direccion laboral
					$this->OmsRegister->updateAll( array('address_lab_id' => $id_dir),array('OmsRegister.address_lab_id' => NULL , 'OmsRegister.patient_id' => $id));
				}		
					
				$this->redirect(array('controller' => 'patients','action' => 'view',$id));
				
			} else {
				$this->Session->setFlash(__('El registro Oms no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
		$this->set('patient', $this->OmsRegister->Patient->read(null, $id));
		//$medics = $this->OmsRegister->Medic->find('list');
		$omsCodes = $this->OmsRegister->OmsCode->find('list');
		//$this->set(compact('medics','omsCodes','provinces'));
		
		
		if  ($this->Auth->user('group_id')!=2) { // Si no es un medico...
			$medics = $this->OmsRegister->Medic->find('list',array('fields'=>array('Medic.nombrecompleto')));
			$this->set(compact('medics','omsCodes','provinces'));
		} else {
			Controller::loadModel('Medic');
			$medic = $this->OmsRegister->Medic->read('nombrecompleto',$this->Auth->user('medic_id'));
			$this->set(compact('medic','omsCodes','provinces'));
		}
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
			throw new NotFoundException(__('Registro Oms inv&aacute;lido'));
		}
		$medic_id = $this->OmsRegister->read('medic_id');
		
		if (($this->Auth->user('group_id')==2) && ($medic_id['OmsRegister']['medic_id'] != $this->Auth->user('medic_id'))) {
			exit(0);
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OmsRegister->save($this->request->data)) {
				$this->Session->setFlash(__('El registro Oms fue modificado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('controller' => 'patients','action' => 'view',$paciente));
			} else {
				$this->Session->setFlash(__('El registro Oms no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->set('omsregister', $this->OmsRegister->read(null, $id));
		}
		//$medics = $this->OmsRegister->Medic->find('list');
		//$this->set(compact('medics'));
		if  ($this->Auth->user('group_id')!=2) { // Si no es un medico...
			$medics = $this->OmsRegister->Medic->find('list',array('fields'=>array('Medic.nombrecompleto')));
			$this->set(compact('medics'));
		} else {
			$medic = $this->OmsRegister->Medic->read('nombrecompleto',$this->Auth->user('medic_id'));
			$this->set(compact('medic'));
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null,$paciente=null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->OmsRegister->id = $id;
		if (!$this->OmsRegister->exists()) {
			throw new NotFoundException(__('Registro Oms inv&aacute;lido'));
		}
		$medic_id = $this->OmsRegister->read('medic_id');
		
		if (($this->Auth->user('group_id')==2) && ($medic_id['OmsRegister']['medic_id'] != $this->Auth->user('medic_id'))) {
			exit(0);
		}
		if ($this->OmsRegister->delete()) {
			$this->Session->setFlash(__('El registro Oms fue borrado correctamente', null), 
					'default', 
					array('class' => 'success'));
			//$this->redirect(array('controller' => 'patients','action' => 'view',$paciente));
		}
		if (!$this->checkDelete())
			$this->Session->setFlash(__('El registro Oms no pudo ser borrado, tiene notas asociadas.'));
		//$this->redirect(array('action' => 'index'));
		$this->redirect(array('controller' => 'patients','action' => 'view',$paciente));
	}	
	
	function checkDelete(){
		$count = $this->OmsRegister->Note->find("count", array(
			"conditions" => array("oms_register_id" => $this->OmsRegister->id)
		));
		if ($count == 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
