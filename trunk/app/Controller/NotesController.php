<?php
App::uses('AppController', 'Controller');
/**
 * Notes Controller
 *
 * @property Note $Note
 */
class NotesController extends AppController {

public $helpers = array('Tinymce');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Note->recursive = 0;
		$this->set('notes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null, $idRegOms = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Invalid note'));
		}
		$this->set('note', $this->Note->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add( $id=null) {
		if ($this->request->is('post')) {
			$this->Note->create();
			
			
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash(__('La nota ha sido guardada'));
				$this->redirect(array('controller'=>'omsregisters','action' => 'view',$id));
				//$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The note could not be saved. Please, try again.'));
			}
		}
		$medics = $this->Note->Medic->find('list',array('fields'=>array('Medic.nombrecompleto')));
		$omsRegisters = $this->Note->OmsRegister->find('list');
		$this->set(compact('medics', 'omsRegisters','id'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idRegOms = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Nota no v�lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash(__('La nota ha sido guardada'));
				$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
			} else {
				$this->Session->setFlash(__('La nota no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Note->read(null, $idRegOms);
		}
		$medics = $this->Note->Medic->find('list');
		$omsRegisters = $this->Note->OmsRegister->find('list');
		$this->set(compact('medics', 'omsRegisters'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idRegOms = null ) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Nota no v�lida'));
		}
		if ($this->Note->delete()) {
			$this->Session->setFlash(__('Nota borrada'));
			//$this->redirect($this->referer());
			$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
		}
		$this->Session->setFlash(__('La nota no pudo ser borrada'));
		$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
