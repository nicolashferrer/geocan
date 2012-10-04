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

	//funcion invocada por ajax, para determinar si existe un paciente y devolver su ID
	function recuperarPaciente($doc=null){
	
		$json = array();
		
		if (!empty($doc)) {
		
			$documentoEncriptado = Security::hash($doc, 'sha256', true);
			
			//Ver como hacer para que solamente me traiga EL ID!!! y no todo el restoooooooooooooo
			$resultado = $this->Patient->find('first', array('fields' => array('Patient.id'),'conditions' => array( 'Patient.nro_documento' => $documentoEncriptado )));
			
			if ($resultado!=false) {
				$json[0]['encontre'] = true;
				$json[0]['id'] = $resultado['Patient']['id'];
			} else {
		
				$json[0]['encontre'] = false;
				$json[0]['id'] = '';
			}
			
		} else {
		
			$json[0]['encontre'] = false;
			$json[0]['id'] = '';
		}

		return new CakeResponse(array('body' => json_encode($json[0])));
	
	}
	
	function search(){}


	function result() {
					if(!empty($this->data)) { 
					
						//debug($this->data['Patient']['nro_documento']);
					
						$documentoEncriptado = Security::hash($this->data['Patient']['nro_documento'], 'sha256', true);
						
						//debug($documentoEncriptado);
						
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
			throw new NotFoundException(__('Paciente inv&aacute;lido'));
		}
		
		$this->Session->write('PacienteActual', $id);
		
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
			throw new NotFoundException(__('Paciente inv&aacute;lido'));
		}
		if ($this->request->is('post')) {
			$this->request->data['Patient']['id']= $id;
			//Limpio las preguntas que no contesto
			$respuestas = $this->request->data['Answer'];
			foreach($respuestas as $indice => $respuesta) {
				
				if ($respuesta['valor'] == '') {
					//si la respuesta se modifico a "no contesta" hay que eliminarla
					$rta= $this->Patient->Answer->Find('all',array('conditions' => array('Answer.patient_id' => $id , 'Answer.question_id' => $respuesta['question_id'])));
					if ($rta!=null){
						Controller::loadModel('Answer');
						$this->Answer->Delete($rta[0]['Answer']['id']);
					}
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
			//	$this->Session->setFlash(__('Las respuestas fueron actualizadas exitosamente'));
				$this->Session->setFlash(__('La informaci&oacute;n fue modificada correctamente', null), 
                            'default', 
                             array('class' => 'success'));
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('Las respuestas no pueden ser actualizadas. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$this->set('patient', $this->Patient->read(null, $id));
		$result = $this->Patient->Query('select * from questions left join answers on answers.question_id=questions.id and answers.patient_id="'.$id.'" where questions.visible=true;');
		$this->set('questions',$result);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Patient->create();
			
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
			
			if ($this->Patient->saveAll($this->request->data)) {
				$this->Session->setFlash(__('La informaci&oacute;n fue agregada correctamente!', null), 
                            'default', 
                             array('class' => 'success'));
				$this->redirect(array('action' => 'view',$this->Patient->id));
			} else {
				$this->Session->setFlash(__('El paciente no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
		Controller::loadModel('Job');
		$jobs = $this->Job->find('list');
		Controller::loadModel('Question');
		$questions = $this->Question->find('all',array('conditions' => array('Question.visible' => '1')));
		$this->set(compact('provinces','questions','id','jobs'));
		
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
			throw new NotFoundException(__('Paciente inv&aacute;lido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			//debug($this->request->data);
			//exit;
			
			$part_act= null;
			$lab_act= null;
			$nueva_part= false;
			$nueva_lab= false;
			
			if ($this->request->data['Control']['cargo_particular'] == 'false') {
				unset($this->request->data['Primary']);
			}
			else{
				$part_act= $this->request->data['Control']['particular_actual'];
				$nueva_part= true;
			}
			
			if ($this->request->data['Control']['cargo_laboral'] == 'false') {
				unset($this->request->data['Secondary']);
			}
			else{
				$lab_act= $this->request->data['Control']['laboral_actual'];
				$nueva_lab= true;
			}
			
			unset($this->request->data['Control']);
			
			if (empty($this->request->data['Patient']['fecha_defuncion'])) {
				$this->request->data['Patient']['fecha_defuncion'] = null;
			}
			
	
			if ($this->Patient->saveAll($this->request->data)){
				
				$this->Session->setFlash(__('La informaci&oacute;n fue modificada correctamente!', null), 
                            'default', 
                             array('class' => 'success'));
	
				if (!($part_act==null)) {
					//si $part_act no se usa en ningun registro oms del paciente.. la borro de direcciones
					$rta= $this->Patient->OmsRegister->Find('all',array('conditions' => array('OmsRegister.address_part_id' => $part_act , 'OmsRegister.patient_id' => $id)));
					if ($rta==null){
						Controller::loadModel('Address');
						$this->Address->Delete($part_act);
					}
				}
				else 
				{					
					if ($nueva_part){
						//no tenia dir particular e ingrese una
						$id_dir= $this->Patient->Primary->id;
						$id = $this->Patient->id;
						$this->Patient->OmsRegister->updateAll( array('address_part_id' => $id_dir),array('OmsRegister.address_part_id' => NULL , 'OmsRegister.patient_id' => $id));
					
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
				else 
				{					
					if ($nueva_lab){
						//no tenia dir laboral e ingrese una
						$id_dir= $this->Patient->Secondary->id;
						$id = $this->Patient->id;
						$this->Patient->OmsRegister->updateAll( array('address_lab_id' => $id_dir),array('OmsRegister.address_lab_id' => NULL , 'OmsRegister.patient_id' => $id));
					
					}
				}
				
				//y redirecciono a la vista
				$this->redirect(array('action' => 'view',$id));
				
			} else {
				// echo "<script language='JavaScript'> alert('lalal'); </script>";
				$this->Session->setFlash(__('El paciente no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Patient->read(null, $id);
		}
		Controller::loadModel('Job');
		$jobs = $this->Job->find('list');
		Controller::loadModel('Province');
		$provinces = $this->Province->find('list');
		$this->set(compact('provinces','jobs'));
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
			throw new NotFoundException(__('Paciente invalido'));
		}
		if ($this->Patient->delete()) {
			$this->Session->setFlash(__('El paciente fue borrado exitosamente.', null), 
                            'default', 
                             array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El paciente no fue eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
	
	function beforeFilter() {
		parent::beforeFilter();
    }
	
}