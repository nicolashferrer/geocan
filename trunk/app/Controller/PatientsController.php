<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
/**
 * Patients Controller
 *
 * @property Patient $Patient
 */
class PatientsController extends AppController {

	public $helpers = array('Js' => array('Jquery'));

	function search(){}


	function result() {
					if(!empty($this->data)) { 
					
						debug($this->data['Patient']['nro_documento']);
					
						$documentoEncriptado = Security::hash($this->data['Patient']['nro_documento'], 'sha256', true);
						
						debug($documentoEncriptado);
						
						exit;
                      
					    $this->paginate = array('conditions' => array('Patient.nro_documento' => $documentoEncriptado));
						$data = $this->paginate('Patient');
						$this->set(compact('data'));
						
                        $this->set('result',$data); 
                       
						}
					else { 
                                $this->redirect(array('action'=>'search'));
									
                        } 
				

				} 


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Patient->recursive = 0;
		$this->set('patients', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$this->set('patient', $this->Patient->read(null, $id));
		$result = $this->Patient->Query('select * from questions left join answers on answers.question_id=questions.id and answers.patient_id="'.$id.'" where questions.visible=true;');
		$this->set('results',$result);
	}
	
/**
 * editAnswers method
 *
 * @param string $id
 * @return void
 */
	public function editAnswers($id = null) {
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$this->set('patient', $this->Patient->read(null, $id));
		$result = $this->Patient->Query('select * from questions left join answers on answers.question_id=questions.id and answers.patient_id="'.$id.'" where questions.visible=true;');
		$this->set('results',$result);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Patient->create();
	//		debug($this->request->data);
			if ($this->request->data['Control']['cargo_particular'] == 'false') {
				unset($this->request->data['Primary']);
			}
			if ($this->request->data['Control']['cargo_laboral'] == 'false') {
				unset($this->request->data['Secondary']);
			}
			unset($this->request->data['Control']);
			
			//Limpio las preguntas que no contesto
			$respuestas = $this->request->data['Answer'];
			foreach($respuestas as $indice => $respuesta) {
				if ($respuesta['valor'] == '') {
					unset($this->request->data['Answer'][$indice]);
				}
			} 
			$quedaron = sizeof($this->request->data['Answer']);
			if ($quedaron==0) {
				unset($this->request->data['Answer']);
			}
			//debug($this->request->data);	
			//exit();
			
			if ($this->Patient->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
			}
		}
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
		Controller::loadModel('Question');
		$questions = $this->Question->find('all',array('conditions' => array('Question.visible' => '1')));
		$this->set(compact('provinces','questions'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Paciente invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$part_act= null;
			$lab_act= null;
			
			if ($this->request->data['Control']['cargo_particular'] == 'false') {
				unset($this->request->data['Primary']);
			}
			else{
				$part_act= $this->request->data['Control']['particular_actual'];
			}
			if ($this->request->data['Control']['cargo_laboral'] == 'false') {
				unset($this->request->data['Secondary']);
			}
			else{
				$lab_act= $this->request->data['Control']['laboral_actual'];
			}
			
			unset($this->request->data['Control']);
						
			if ($this->Patient->saveAll($this->request->data)) {
				
				$this->Session->setFlash(__('The patient has been saved'));
	
				if (!($part_act==null)) {
					//si $part_act no se usa en ningun registro oms del paciente.. la borro de direcciones
					$rta= $this->Patient->OmsRegister->Find('all',array('conditions' => array('OmsRegister.address_part_id' => $part_act , 'OmsRegister.patient_id' => $id)));
					if ($rta==null){
						Controller::loadModel('Address');
						$this->Address->Delete($part_act);
					}
				}
				if (!($lab_act==null)) {
					//si $lab_act no se usa en ningun registro oms del paciente.. la borro de direcciones
					$rta= $this->Patient->OmsRegister->Find('all',array('conditions' => array('OmsRegister.address_lab_id' => $lab_act , 'OmsRegister.patient_id' => $id)));
					if ($rta==null){
						Controller::loadModel('Address');
						$this->Address->Delete($lab_act);
					}
				}
				
				//y redirecciono a la vista
				$this->redirect(array('action' => 'index'));
				
			} else {
				// echo "<script language='JavaScript'> alert('lalal'); </script>";
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Patient->read(null, $id);
		}
//		$addressParticulars = $this->Patient->AddressParticular->find('list');
//		$addressLaborals = $this->Patient->AddressLaboral->find('list');
//		$this->set(compact('addressParticulars', 'addressLaborals'));
		$this->set('patient', $this->Patient->read(null, $id));
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
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
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		if ($this->Patient->delete()) {
			$this->Session->setFlash(__('Patient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Patient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allowedActions = array('index', 'view');
    }
	
}