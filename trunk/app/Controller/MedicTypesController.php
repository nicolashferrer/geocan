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
			throw new NotFoundException(__('Tipo de m&eacute;dico inv&aacute;lido'));
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
				$this->Session->setFlash(__('El tipo de m&eacute;dico fue creado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de m&eacute;dico no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
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
			throw new NotFoundException(__('Tipo de m&eacute;dico inv&aacute;lido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MedicType->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de m&eacute;dico fue modificado correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de m&eacute;dico no se ha podido guardar. Por favor, intente nuevamente.'));
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
			throw new NotFoundException(__('Tipo de m&eacute;dico inv&aacute;lido'));
		}
		if ($this->MedicType->delete()) {
			$this->Session->setFlash(__('El tipo de m&eacute;dico fue borrado correctamente', null), 
					'default', 
					array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El tipo de m&eacute;dico no pudo ser borrado'));
		$this->redirect(array('action' => 'index'));
	}
}
