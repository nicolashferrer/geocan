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
		$this -> User -> recursive = 0;
		$this -> set('users', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
		$this -> set('user', $this -> User -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if (!empty($this -> data)) {

			$this -> User -> create();
			$this -> request -> data['User']['password'] = 'geocan2016';
			$this -> request -> data['User']['password_confirm'] = 'geocan2016';

			if ($this -> request -> data['Control']['conMedico'] == 'false') {
				unset($this -> request -> data['User']['medic_id']);
			}
			unset($this -> request -> data['Control']);

			if ($this -> User -> save($this -> request -> data, true, array('username', 'password', 'group_id', 'medic_id', 'created', 'modified'))) {
				$this -> Session -> setFlash(__('El usuario se ha creado correctamente', null), 'default', array('class' => 'success'));
				$this -> redirect(array('action' => 'view', $this -> User -> id));
			} else {
				$this -> Session -> setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$groups = $this -> User -> Group -> find('list');
		$medics = $this -> User -> Medic -> find('list');
		$this -> set(compact('groups', 'medics'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function resetPassword($id = null) {
		$this -> autoRender = false;
		$this -> User -> id = $id;

		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v�lido'));
		} else {
			$this -> request -> data['User']['id'] = $id;
			$this -> request -> data['User']['password'] = 'geocan2016';
			$this -> request -> data['User']['password_confirm'] = 'geocan2016';

			//debug($this->request->data);
			//exit();

			if ($this -> User -> save($this -> request -> data, true, array('password'))) {
				$this -> Session -> setFlash(__('La contrase&ntilde;a se reseto exitosamente', null), 'default', array('class' => 'success'));
			} else {
				$this -> Session -> setFlash(__('La contrase&ntilde;a no se pudo Resetear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {

			unset($this -> request -> data['User']['username']);

			if ($this -> request -> data['Control']['conMedico'] == 'false') {
				$this -> request -> data['User']['medic_id'] = null;
			}

			unset($this -> request -> data['Control']);

			//debug($this->request->data);
			//exit();

			if ($this -> User -> save($this -> request -> data, true, array('group_id', 'medic_id', 'created', 'modified'))) {
				$this -> Session -> setFlash(__('El usuario se ha modificado correctamente', null), 'default', array('class' => 'success'));
				$this -> redirect(array('action' => 'view', $id));
			} else {
				$this -> Session -> setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
			}
		} else {
			$this -> request -> data = $this -> User -> read(null, $id);
		}
		$groups = $this -> User -> Group -> find('list');
		$medics = $this -> User -> Medic -> find('list');
		$this -> set(compact('groups', 'medics'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function editPassword($id = null) {
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v�lido'));
		}
		if ($this -> request -> is('post')) {

			$cont = $this -> User -> Find('all', array('conditions' => array('User.id' => $id)));

			$this -> request -> data['User']['id'] = $id;
			$this -> request -> data['User']['password_antiguo'] = $cont[0]['User']['password'];

			//debug($this->request->data);
			//exit();

			if ($this -> User -> save($this -> request -> data, true, array('password', 'pass_viejo', 'created', 'modified'))) {
				$this -> Session -> setFlash(__('La contrase&ntilde;a se cambio correctamente. Por favor vuelva a ingresar.', null), 'default', array('class' => 'success'));
				$this -> redirect($this -> Auth -> logout());
			} else {
				$this -> Session -> setFlash(__('El usuario no se pudo guardar. Por favor, int&eacute;ntelo de nuevo.'));
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
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
		if ($this -> User -> delete()) {
			$this -> Session -> setFlash(__('El usuario se ha borrado correctamente', null), 'default', array('class' => 'success'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('El usuario no se ha eliminado'));
		$this -> redirect(array('action' => 'index'));
	}

	public function login() {

		if ($this -> Session -> read('Auth.User')) {
			
			$this->Session->write('PacienteActual', '');

			$this -> redirect(array('controller' => 'patients', 'action' => 'search'));

		} else {

			if (!isset($this -> Captcha)) {//if Component was not loaded throug $components array()
				App::import('Component', 'Captcha');
				//load it
				$this -> Captcha = new CaptchaComponent();
				//make instance
				$this -> Captcha -> startup($this);
				//and do some manually calling
			}

			$this -> User -> setCaptcha($this -> Captcha -> getVerCode());
			//getting from component and passing to model to make proper validation check

			if ($this -> request -> is('post')) {

				if ($this -> User -> getCaptcha() == $this -> request -> data['User']['captcha']) {

					if ($this -> Auth -> login()) {
						
						if (!$this->isAuthorized()) {
							$this -> redirect($this -> Auth -> logout());
						}
						
						// Aca hice login correctamente
						$this->Session->write('PacienteActual', '');
						
						$user = $this -> User -> read('password', $this -> Auth -> user('id'));
						$this -> Session -> write('userpass', $user['User']['password']);
						$this -> redirect($this -> Auth -> redirect());
					} else {
						$this -> Session -> setFlash('Su nombre de usuario o la contrase&ntilde;a es incorrecta.');
					}
				} else {
					$this -> Session -> setFlash('El captcha ingresado es inv&aacute;lido.');
				}
			}
		}
	}

	public function logout() {
		$this->Session->write('PacienteActual', '');
		$this -> Session -> setFlash('Gracias por utilizar Geocan&copy;');
		$this -> redirect($this -> Auth -> logout());
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('login,logout');
	}

	public function initDB() {
		$group = &$this -> User -> Group;

		// ----------- Permisos de los administradores ------------ //

		$group -> id = 1;
		$this -> Acl -> allow($group, 'controllers');
		$this -> Acl -> deny($group, 'controllers/Groups/add');
		$this -> Acl -> deny($group, 'controllers/Groups/edit');
		$this -> Acl -> deny($group, 'controllers/Groups/delete');

		// ------------ Permisos de los medicos ------------- //

		$group -> id = 2;
		$this -> Acl -> deny($group, 'controllers');

		// Permisos de pagina de bienvenida
		$this -> Acl -> allow($group, 'controllers/Pages/welcome');
		
		// Permisos sobre Usuarios
		$this -> Acl -> allow($group, 'controllers/Users/editPassword');
		//$this->Acl->allow($group, 'controllers/Users/view');
		$this -> Acl -> allow($group, 'controllers/Users/login');
		//$this->Acl->allow($group, 'controllers/Users/index');
		$this -> Acl -> allow($group, 'controllers/Users/logout');
		//$this->Acl->allow($group, 'controllers/Groups/view');
		//$this->Acl->allow($group, 'controllers/Groups/index');

		// Permisos sobre pacientes
		$this -> Acl -> allow($group, 'controllers/Patients/add');
		$this -> Acl -> allow($group, 'controllers/Patients/edit');
		$this -> Acl -> allow($group, 'controllers/Patients/view');
		$this -> Acl -> allow($group, 'controllers/Patients/search');
		$this -> Acl -> allow($group, 'controllers/Patients/editAnswers');
		$this -> Acl -> allow($group, 'controllers/Patients/recuperarPaciente');

		// Permisos sobre Direcciones
		$this -> Acl -> allow($group, 'controllers/Addresses/add');
		$this -> Acl -> allow($group, 'controllers/Addresses/edit');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporte');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporteBusqueda');
		$this -> Acl -> allow($group, 'controllers/Addresses/view');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporte');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporteBusqueda');

		// Permisos sobre Notas
		$this -> Acl -> allow($group, 'controllers/Notes/add');
		$this -> Acl -> allow($group, 'controllers/Notes/edit');
		$this -> Acl -> allow($group, 'controllers/Notes/delete');
		$this -> Acl -> allow($group, 'controllers/Notes/view');

		// Permisos sobre Medicos y Tipos de Medicos
		//$this->Acl->allow($group, 'controllers/Medics/view');
		//$this->Acl->allow($group, 'controllers/MedicTypes/view');
		//$this->Acl->allow($group, 'controllers/MedicTypes/index');

		// Permisos sobre Preguntas y respuestas
		$this -> Acl -> allow($group, 'controllers/Questions/view');
		$this -> Acl -> allow($group, 'controllers/Questions/index');
		//$this->Acl->allow($group, 'controllers/Questions/add');
		$this -> Acl -> allow($group, 'controllers/Answers/add');
		$this -> Acl -> allow($group, 'controllers/Answers/edit');
		$this -> Acl -> allow($group, 'controllers/Answers/view');

		// Permisos OMS Registers y Codigos OMS
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/add');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/edit');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/view');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/delete');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/getSigNivel');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/sugerencias');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/help');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/view');

		// Ciudades y Provincias
		$this -> Acl -> allow($group, 'controllers/Cities/getCiudades');
		$this -> Acl -> allow($group, 'controllers/Cities/getNombre');
		$this -> Acl -> allow($group, 'controllers/Cities/view');
		$this -> Acl -> allow($group, 'controllers/Cities/add');
		$this -> Acl -> allow($group, 'controllers/Provinces/view');
		$this -> Acl -> deny($group, 'controllers/Provinces/index');


		// Permisos de Jobs
		$this -> Acl -> allow($group, 'controllers/Jobs/index');
		$this -> Acl -> allow($group, 'controllers/Jobs/add');
		$this -> Acl -> allow($group, 'controllers/Jobs/view');
		$this -> Acl -> allow($group, 'controllers/Jobs/delete');
		$this -> Acl -> deny($group, 'controllers/Jobs/edit');

		// ------------ Permisos de los ayudantes ------------- //

		$group -> id = 3;
		$this -> Acl -> deny($group, 'controllers');
		$this -> Acl -> deny($group, 'controllers/Groups/add');
		$this -> Acl -> deny($group, 'controllers/Groups/edit');
		$this -> Acl -> deny($group, 'controllers/Groups/delete');

		// Permisos de pagina de bienvenida
		$this -> Acl -> allow($group, 'controllers/Pages/welcome');
		
		// Permisos sobre Usuarios
		$this -> Acl -> allow($group, 'controllers/Users/editPassword');
		//$this->Acl->allow($group, 'controllers/Users/view');
		//$this->Acl->allow($group, 'controllers/Users/index');
		$this -> Acl -> allow($group, 'controllers/Users/login');
		$this -> Acl -> allow($group, 'controllers/Users/logout');
		//$this->Acl->allow($group, 'controllers/Groups/view');
		//$this->Acl->allow($group, 'controllers/Groups/index');

		// Permisos sobre pacientes
		$this -> Acl -> allow($group, 'controllers/Patients/add');
		$this -> Acl -> allow($group, 'controllers/Patients/edit');
		$this -> Acl -> allow($group, 'controllers/Patients/view');
		$this -> Acl -> allow($group, 'controllers/Patients/search');
		$this -> Acl -> allow($group, 'controllers/Patients/recuperarPaciente');
		$this -> Acl -> allow($group, 'controllers/Patients/editAnswers');

		// Permisos OMS Registers y Codigos OMS
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/add');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/edit');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/view');
		$this -> Acl -> allow($group, 'controllers/OmsRegisters/delete');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/getSigNivel');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/sugerencias');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/help');
		$this -> Acl -> allow($group, 'controllers/OmsCodes/view');

		// Permisos de direcciones
		$this -> Acl -> allow($group, 'controllers/Addresses/add');
		$this -> Acl -> allow($group, 'controllers/Addresses/view');
		$this -> Acl -> allow($group, 'controllers/Addresses/edit');
		$this -> Acl -> allow($group, 'controllers/Addresses/delete');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporte');
		$this -> Acl -> allow($group, 'controllers/Addresses/reporteBusqueda');

		//Permisos de notas
		$this -> Acl -> allow($group, 'controllers/Notes/add');
		$this -> Acl -> allow($group, 'controllers/Notes/edit');
		$this -> Acl -> allow($group, 'controllers/Notes/delete');
		$this -> Acl -> allow($group, 'controllers/Notes/view');

		// Permisos sobre Preguntas y respuestas
		$this -> Acl -> allow($group, 'controllers/Questions/add');
		$this -> Acl -> allow($group, 'controllers/Questions/edit');
		$this -> Acl -> allow($group, 'controllers/Questions/view');
		$this -> Acl -> allow($group, 'controllers/Answers/add');
		$this -> Acl -> allow($group, 'controllers/Answers/edit');
		$this -> Acl -> allow($group, 'controllers/Answers/delete');
		$this -> Acl -> allow($group, 'controllers/Answers/view');

		// Ciudades y Provincias
		$this -> Acl -> allow($group, 'controllers/Cities/getCiudades');
		$this -> Acl -> allow($group, 'controllers/Cities/getNombre');
		$this -> Acl -> allow($group, 'controllers/Cities/add');
		$this -> Acl -> allow($group, 'controllers/Cities/view');
		$this -> Acl -> allow($group, 'controllers/Cities/edit');
		$this -> Acl -> allow($group, 'controllers/Cities/delete');
		$this -> Acl -> allow($group, 'controllers/Provinces/view');
		$this -> Acl -> deny($group, 'controllers/Provinces/index');

		// Permisos sobre Medicos y Tipos de medicos
		//$this->Acl->allow($group, 'controllers/Medics/view');
		//$this->Acl->allow($group, 'controllers/MedicTypes/view');
		//$this->Acl->allow($group, 'controllers/MedicTypes/index');
		
		// Permisos de Jobs
		$this -> Acl -> allow($group, 'controllers/Jobs/index');
		$this -> Acl -> allow($group, 'controllers/Jobs/add');
		$this -> Acl -> allow($group, 'controllers/Jobs/view');
		$this -> Acl -> allow($group, 'controllers/Jobs/delete');
		$this -> Acl -> deny($group, 'controllers/Jobs/edit');
		

	}

	public function captcha() {

		$this -> autoRender = false;
		$this -> layout = 'ajax';
		if (!isset($this -> Captcha)) {//if Component was not loaded throug $components array()
			App::import('Component', 'Captcha');
			//load it
			$this -> Captcha = new CaptchaComponent();
			//make instance
			$this -> Captcha -> startup($this);
			//and do some manually calling
		}
		//$width = isset($_GET['width']) ? $_GET['width'] : '120';
		//$height = isset($_GET['height']) ? $_GET['height'] : '40';
		//$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';
		//$this->Captcha->create($width, $height, $characters); //options, default are 120, 40, 6.
		$this -> Captcha -> create();
	}

	public function reload_captcha() {
		App::import('Component', 'Captcha');
		//load it
		$this -> Captcha = new CaptchaComponent();
		//make instance
		$this -> Captcha -> startup($this);
		//and do some manually calling
		$this -> layout = 'ajax';
		Configure::write('debug', 0);
		$this -> viewPath = 'elements' . DS;
		$this -> render('reload_captcha');
	}

	private function isAuthorized() {
		if ($this->Auth->user('blocked') == 1) {
			$this -> Session -> setFlash('Esta cuenta ha sido desactivada. Contacte al Administrador para mayor informaci&oacute;n.');
			return false;
		}
		return true;
	}
	
	// ID del usuario
	// Nuevo valor de blockeado, 0 o 1
	public function cambiarBlocked($id,$valor) {
		
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no v&aacute;lido'));
		}
			
	    $this->User->read(null, $id);
	    $this->User->set('blocked', $valor);
	 	//	$this->User->blocked = $valor;
	    $this->User->save(null,false);
		if ($valor == 1) {
			$this -> Session -> setFlash(__('Usuario deshabilitado correctamente.', null), 'default', array('class' => 'success'));	
		} else {
			$this -> Session -> setFlash(__('Usuario habilitado correctamente.', null), 'default', array('class' => 'success'));	
		}
		
		$this -> redirect(array('action' => 'index'));
		
	}

}
