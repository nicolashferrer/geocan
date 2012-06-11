<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 */
class AnswersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Respuesta inv&aacute;lida'));
		}
		$this->set('answer', $this->Answer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$patients = $this->Answer->Patient->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('patients', 'questions'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Respuesta inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Answer->read(null, $id);
		}
		$patients = $this->Answer->Patient->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('patients', 'questions'));
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
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Respuesta inv&aacute;lida'));
		}
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('La respuesta fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La respuesta no pudo ser borrada'));
		$this->redirect(array('action' => 'index'));
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
