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
			throw new NotFoundException(__('Nota inv&aacute;lida'));
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
				$this->Session->setFlash(__('La nota fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('controller'=>'oms_registers','action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('La nota no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		if  ($this->Auth->user('group_id')!=2) { // Si no es un medico...
			$medics = $this->Note->Medic->find('list',array('fields'=>array('Medic.nombrecompleto')));
			$this->set(compact('medics','id'));
		} else {
			Controller::loadModel('Medic');
			$medic = $this->Medic->read('nombrecompleto',$this->Auth->user('medic_id'));
			$this->set(compact('medic','id'));
		}
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
			throw new NotFoundException(__('Nota no v&aacute;lida'));
		}
		
		$medic_id = $this->Note->read('medic_id');
		
		if ((($this->Auth->user('group_id')==2) && ($medic_id['Note']['medic_id'] != $this->Auth->user('medic_id'))) || ($this->Auth->user('group_id')==3))  {
			exit(0);
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash(__('La nota fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
			} else {
				$this->Session->setFlash(__('La nota no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Note->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idRegOms = null) {
	
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Nota inv&aacute;lida'));
		}
		$medic_id = $this->Note->read('medic_id');
		if ($medic_id['Note']['medic_id'] != $this->Auth->user('medic_id')) {
			exit(0);
		}
		
		
		if ($this->Note->delete()) {
			$this->Session->setFlash(__('La nota fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			//$this->redirect($this->referer());
			$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
		}
		$this->Session->setFlash(__('La nota no pudo ser borrada'));
		$this->redirect(array('controller'=>'oms_registers','action' => 'view',$idRegOms));
	}

	function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allowedActions = array('index', 'view');
    }

}
