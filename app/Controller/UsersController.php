<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$medics = $this->User->Medic->find('list');
		$this->set(compact('groups', 'medics'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$medics = $this->User->Medic->find('list');
		$this->set(compact('groups', 'medics'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Your username or password was incorrect.');
			}
		}
	}

	public function logout() {
		$this->Session->setFlash('Gracias por utilizar Geocan&#174;');
		$this->redirect($this->Auth->logout());
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login,logout,initDB');
	}
	
	public function initDB() {
		$group =& $this->User->Group;
		//Permisos de los administradores
		$group->id = 1;
		$this->Acl->allow($group, 'controllers');
		//Permisos de los medicos
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Patients/add');
		$this->Acl->allow($group, 'controllers/Patients/edit');
		$this->Acl->allow($group, 'controllers/Patients/view');
		$this->Acl->allow($group, 'controllers/Addresses/add');
		$this->Acl->allow($group, 'controllers/Addresses/edit');
		$this->Acl->allow($group, 'controllers/Notes/add');
		$this->Acl->allow($group, 'controllers/Notes/edit');
		$this->Acl->allow($group, 'controllers/OmsRegisters/add');
		$this->Acl->allow($group, 'controllers/OmsRegisters/edit');
		$this->Acl->allow($group, 'controllers/Answers/add');
		$this->Acl->allow($group, 'controllers/Answers/edit');
		//Permisos de los usuarios
		$group->id = 3;
		$this->Acl->allow($group, 'controllers');
    }

}
