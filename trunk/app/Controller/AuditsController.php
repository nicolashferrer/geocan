<?php
App::uses('AppController', 'Controller');

class AuditsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
