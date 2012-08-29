<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 */
class JobsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Trabajo inv&aacute;lido'));
		}
		$this->set('job', $this->Job->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo fue creado correctamente.', null), 
					'default', 
				array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El trabajo no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Trabajo inv&aacute;lido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo fue modificado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El trabajo no se ha podido guardar. Por favor, int&eacute;ntelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Job->read(null, $id);
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Trabajo inv&aacute;lido'));
		}
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('El trabajo fue borrado correctamente', null), 
					'default', 
					array('class' => 'success'));
		}
		if (!$this->checkDelete())
			$this->Session->setFlash(__('El trabajo no pudo ser borrado. Tiene pacientes asociados.'));
		
		$this->redirect(array('action' => 'index'));
	}
}
