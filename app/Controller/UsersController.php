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
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
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
			$this->request->data['User']['password'] = 'geocan2012';
			$this->request->data['User']['password_confirm'] = 'geocan2012';

			if ($this->request->data['Control']['conMedico'] == 'false') {
				unset($this->request->data['User']['medic_id']);
			}
			unset($this->request->data['Control']);
			
			//debug($this->request->data);	
			//exit();

			if ($this->User->save($this->request->data, true, array('username','password','group_id','medic_id','created','modified'))) {
				$this->Session->setFlash(__('El usuario se ha creado correctamente', null), 
                            'default', 
                             array('class' => 'success'));
				$this->redirect(array('action' => 'view',$this->User->id));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$medics = $this->User->Medic->find('list');
		$this->set(compact('groups', 'medics'));
	}

	
/**
 * add method
 *
 * @return void
 */
	public function resetPassword($id=null) {
		$this->autoRender = false;
		$this->User->id = $id;
		
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		else
		{
			$this->request->data['User']['id']= $id;
			$this->request->data['User']['password'] = 'geocan2012';
			$this->request->data['User']['password_confirm'] = 'geocan2012';
			
				//debug($this->request->data);	
				//exit();
			
			if ($this->User->save($this->request->data, true, array('password'))) {
				$this->Session->setFlash(__('La contrase&ntilde;a se reseto exitosamente', null), 
                            'default', 
                             array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('La contrase&ntilde;a no se pudo Resetear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$this->redirect(array('action' => 'index'));
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
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			unset($this->request->data['User']['username']);
			
			if ($this->request->data['Control']['conMedico'] == 'false') {
				$this->request->data['User']['medic_id']= null;
			}
			
			unset($this->request->data['Control']);
			
			//debug($this->request->data);
			//exit();
			
			if ($this->User->save($this->request->data, true, array('group_id','medic_id','created','modified'))) {
				$this->Session->setFlash(__('El usuario se ha modificado correctamente', null), 
                            'default', 
                             array('class' => 'success'));
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
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
			
			$cont= $this->User->Find('all',array('conditions' => array('User.id' => $id)));
			
			$this->request->data['User']['id']= $id;
			$this->request->data['User']['password_antiguo'] = $cont[0]['User']['password'];
			
			//debug($this->request->data);
			//exit();
		
			if ($this->User->save($this->request->data, true, array('password','pass_viejo','created','modified'))) {
				$this->Session->setFlash(__('La contrase&ntilde;a se cambio correctamente. Por favor vuelva a ingresar.', null), 
						'default', 
						 array('class' => 'success'));
				$this->redirect($this->Auth->logout());
			} else {
				$this->Session->setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
			}
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
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('El usuario se ha borrado correctamente', null), 
			'default', 
			 array('class' => 'success'));
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
