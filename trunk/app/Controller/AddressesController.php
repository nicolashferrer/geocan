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
	
		if ($this->request->is('post')) {
			
			$condiciones = " WHERE 1=1 ";
	
			//debug($this->request->data);
	
			$aux = $this->request->data['Consulta'];
						
			//debug($aux);
			
			$condedad = " WHERE 1=1 ";
			
			if ($aux['edadMin'] != '') {
				$condedad .= " AND edad >= ".$aux['edadMin']." ";
			} 
			
			if ($aux['edadMax'] != '') {
				$condedad .= " AND edad <= ".$aux['edadMax']." ";
			} 

			if ($aux['sexo'] == 'M') {
				$condiciones .= " AND p.sexo = 'M' ";
			}
			
			if ($aux['sexo'] == 'F') {
				$condiciones .= " AND p.sexo = 'F' ";
			}
			
			$preguntas = $this->request->data['Answer'];
			
			$joinpreguntas = "";
			
			$ipreg=0;
			foreach ($preguntas as $preg):
			
				if ($preg['valor'] != '') {
					$ipreg++;	
					$joinpreguntas .= " JOIN answers AS a".$ipreg." ON a".$ipreg.".patient_id = p.id AND a".$ipreg.".question_id = ".$preg['question_id']." AND a".$ipreg.".valor = ".$preg['valor'];
				}
			
			endforeach;	
			
			//debug($joinpreguntas);
	
			$consulta = "select Patient.* from ( select p.sexo, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(p.fecha_nacimiento)), '%Y')+0) AS edad, dir.*,oms.estadio from patients AS p join
					(select o.address_part_id,o.address_lab_id,o.patient_id,o.estadio from oms_registers as o GROUP BY o.patient_id) AS oms on oms.patient_id = p.id join addresses 
					as dir on dir.id = COALESCE(oms.address_part_id,oms.address_lab_id) " . $joinpreguntas . $condiciones . " ) as Patient".$condedad;
	
			//debug($consulta);
			//exit;
			$addresses = $this->Address->query($consulta);
					
		} else {
			$addresses = null;
		}
		$this->set(compact('addresses'));
		Controller::loadModel('Question');
		$questions = $this->Question->find('all',array('conditions' => array('Question.visible' => '1')));
		$this->set(compact('questions'));
		
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
