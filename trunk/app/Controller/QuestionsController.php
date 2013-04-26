<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 */
class QuestionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Pregunta inv&aacute;lida'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('La pregunta fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La pregunta no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Pregunta inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('La pregunta fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La pregunta no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Question->read(null, $id);
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Pregunta inv&aacute;lida'));
		}
		
		if (!$this->checkDelete()) {
			$this->Session->setFlash(__('La pregunta ya fue respondida al menos una vez, no puede ser eliminada.'));
			$this->redirect(array('action' => 'index'));
		}
			
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('La pregunta fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La pregunta no pudo ser borrada'));
		$this->redirect(array('action' => 'index'));
	}
	
	function checkDelete(){
		Controller::loadModel('Answer');	
		$count = $this->Answer->find("count", array(
			"conditions" => array("question_id" => $this->Question->id)
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
