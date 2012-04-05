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
			throw new NotFoundException(__('Invalid medic'));
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
				$this->Session->setFlash(__('The medic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medic could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid medic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Medic->save($this->request->data)) {
				$this->Session->setFlash(__('The medic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medic could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid medic'));
		}
		if ($this->Medic->delete()) {
			$this->Session->setFlash(__('Medic deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medic was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
