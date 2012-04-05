<?php
App::uses('AppController', 'Controller');
/**
 * MedicTypes Controller
 *
 * @property MedicType $MedicType
 */
class MedicTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MedicType->recursive = 0;
		$this->set('medicTypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MedicType->id = $id;
		if (!$this->MedicType->exists()) {
			throw new NotFoundException(__('Invalid medic type'));
		}
		$this->set('medicType', $this->MedicType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MedicType->create();
			if ($this->MedicType->save($this->request->data)) {
				$this->Session->setFlash(__('The medic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medic type could not be saved. Please, try again.'));
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
		$this->MedicType->id = $id;
		if (!$this->MedicType->exists()) {
			throw new NotFoundException(__('Invalid medic type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MedicType->save($this->request->data)) {
				$this->Session->setFlash(__('The medic type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medic type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MedicType->read(null, $id);
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
		$this->MedicType->id = $id;
		if (!$this->MedicType->exists()) {
			throw new NotFoundException(__('Invalid medic type'));
		}
		if ($this->MedicType->delete()) {
			$this->Session->setFlash(__('Medic type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medic type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
