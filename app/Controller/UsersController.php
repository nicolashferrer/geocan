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
			throw new NotFoundException(__('Usuario no válido'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if (!empty($this->data)) {

			$this->User->create();
            $this->request->data['User']['password_confirm_hash'] = $this->data['User']['password_confirm'];	
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ha creado correctamente'));
				$this->redirect(array('action' => 'view',$this->User->id));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, inténtelo de nuevo.'));
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
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ha guardado'));
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
	public function editPassword($id =null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this->request->is('post')) {
			$this->request->data['Patient']['id']= $id;
			$this->data['User']['password_confirm_hash'] = $this->Auth->password($this->data['User']['password_confirm']);
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ha guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}
		else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuarios borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Su nombre de usuario o la contrase&ntilde;a es incorrecta.');
			}
		}
	}

	public function logout() {
		$this->Session->setFlash('Gracias por utilizar Geocan&copy;');
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
		$this->Acl->allow($group, 'controllers/Patients/editAnswers');
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
