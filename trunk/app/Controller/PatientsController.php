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
		
		//	debug($this->request->data);	
		//	exit();
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
			throw new NotFoundException(__('Invalid patient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Patient->read(null, $id);
		}
//		$addressParticulars = $this->Patient->AddressParticular->find('list');
//		$addressLaborals = $this->Patient->AddressLaboral->find('list');
//		$this->set(compact('addressParticulars', 'addressLaborals'));
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
		$this->Auth->allowedActions = array('index', 'view');
    }
	
}