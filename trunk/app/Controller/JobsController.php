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
			throw new NotFoundException(__('Ocupaci&oacute;n inv&aacute;lida'));
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
				$this->Session->setFlash(__('La ocupaci&oacute;n fue creada correctamente.', null), 
					'default', 
				array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La ocupaci&oacute;n no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
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
			throw new NotFoundException(__('Ocupaci&oacute;n inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('La ocupaci&oacute;n fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La ocupaci&oacute;n no se ha podido guardar. Por favor, int&eacute;ntelo de nuevo.'));
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
			throw new NotFoundException(__('Ocupaci&oacute;n inv&aacute;lida'));
		}
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('La ocupaci&oacute;n fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
		$this->redirect(array('action' => 'index'));
		}
		
		
		$this->Session->setFlash(__('La ocupaci&oacute;n no pudo ser borrada. Tiene pacientes asociados.'));
		$this->redirect(array('action' => 'index'));
	}
}
