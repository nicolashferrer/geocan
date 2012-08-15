<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
		//,'History'
		//,'HistoryBar'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'patients', 'action' => 'search');
		$this->Auth->authError = "No tiene permisos para realizar esta acci&oacute;n.";
		
		//Defino el root
		$this->Auth->actionPath = 'controllers/';
		
		//Esto hace que la acci�n 'display' sea p�blica
		$this->Auth->allowedActions = array('display','captcha','login','logout');
		
		$this->currentUser = $this->Auth->user();
		$this->isAuthed = !empty($this->currentUser); 
		
		
		// Pregunto si el usuario esta logueado y si su contrase�a es la default, le exigo que la cambie y no le dejo hacer mas nada hasta que cambie la contrase�a.
		if (($this->isAuthed) && ($this->params['action']!="editPassword") && ($this->params['action']!="logout"))  {
			if (AuthComponent::password('geocan2012') == $this->Session->read('userpass')) {
				$this->Session->setFlash(__('Por cuestiones de seguridad le pedimos que cambie su contrase&ntilde;a por una m&aacute;s segura.', null), 'default', array('class' => 'warning'));
				$this->redirect(array('controller' => 'users', 'action' => 'editPassword', $this->Auth->user('id')));
			}
		}
		
		
    }
	
	function beforeRender() {
	   $this->set('auth', $this->Auth->user());
	   $this->set('isAuthed', $this->isAuthed); 
	} 

}
