<?php
App::uses('AppController', 'Controller');
/**
 * Provinces Controller
 *
 * @property Province $Province
 */
class ProvincesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Province->recursive = 0;
		$this->set('provinces', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Provincia inv&aacute;lida'));
		}
		$this->set('province', $this->Province->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Province->create();
			if ($this->Province->save($this->request->data)) {
				$this->Session->setFlash(__('La provincia fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
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
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Provincia inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Province->save($this->request->data)) {
				$this->Session->setFlash(__('La provincia fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Province->read(null, $id);
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
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Provincia inv&aacute;lida'));
		}
		if ($this->Province->delete()) {
			$this->Session->setFlash(__('La provincia fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La provincia no pudo ser borrada'));
		$this->redirect(array('action' => 'index'));
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
