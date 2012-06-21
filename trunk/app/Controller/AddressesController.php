<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AppController {
public $helpers = array('GoogleMapV3'); 

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate());
	}

	
	public function reporte() {
		$addresses = $this->Address->query("select Patient.iniciales, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(Patient.fecha_nacimiento)), '%Y')+0) AS edad,
		Address.longitud, Address.latitud, Address.direccion from patients as Patient inner join oms_registers as OmsRegister on Patient.id = OmsRegister.patient_id
		left join addresses as Address on Address.id = OmsRegister.address_part_id");
		$addresses_work = $this->Address->query("select Patient.iniciales, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(Patient.fecha_nacimiento)), '%Y')+0) AS edad,
		Address.longitud, Address.latitud, Address.direccion from patients as Patient inner join oms_registers as OmsRegister on Patient.id = OmsRegister.patient_id
		left join addresses as Address on Address.id = Patient.address_laboral_id");
		//debug($addresses_work);
		//exit;
		$this->set(compact('addresses'));
		$this->set(compact('addresses_work'));
	}
	
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Direcci&oacute;n inv&aacute;lida'));
		}
		$this->set('address', $this->Address->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('La direcci&oacute;n fue creada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La direcci&oacute;n no se pudo crear. Por favor, int&eacute;ntelo de nuevo.'));
			}
		}
		$cities = $this->Address->City->find('list');
		$this->set(compact('cities'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Direcci&oacute;n inv&aacute;lida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('La direcci&oacute;n fue modificada correctamente.', null), 
					'default', 
					array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La direcci&oacute;n no se ha podido guardar. Por favor, intente nuevamente.'));
			}
		} else {
			$this->request->data = $this->Address->read(null, $id);
		}
		$cities = $this->Address->City->find('list');
		$this->set(compact('cities'));
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
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Direcci&oacute;n inv&aacute;lida'));
		}
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('La direcci&oacute;n fue borrada correctamente', null), 
					'default', 
					array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La direcci&oacute;n no pudo ser borrada'));
		$this->redirect(array('action' => 'index'));
	}

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
    }

}
