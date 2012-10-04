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
	
		$this->set(compact('addresses'));
		Controller::loadModel('Question');
		$questions = $this->Question->find('all',array('recursive' => 0,'conditions' => array('Question.visible' => '1')));
		$this->set(compact('questions'));
		
	}
	
	// Metodo que devuelve resultados en formato json y es invocado mediante ajax!
	public function reporteBusqueda() {
		
		$condiciones = " WHERE 1=1 ";
		$condedad = " WHERE 1=1 ";
		$condfecha= " WHERE 1=1 ";
		$joinpreguntas = "";
		$condtipdir = "";
		$selectorpreguntas = "";
		$condicionpreguntas = "";
		$listaCodigos = "0";
		$condicioncodigos = " ";
		
		$aux = $this->request->query['data']['Consulta'];		
			
		if ($aux['edadMin'] != '') {
			$condedad .= " AND edad >= ".$aux['edadMin']." ";
		} 
		
		if ($aux['edadMax'] != '') {
			$condedad .= " AND edad <= ".$aux['edadMax']." ";
		} 

		if ($aux['estado'] == 'V') {
			$condiciones .= " AND p.vive = 1 ";
		}
		
		if ($aux['estado'] == 'F') {
			$condiciones .= " AND p.vive = 0 ";
		}

		if ($aux['sexo'] == 'M') {
			$condiciones .= " AND p.sexo = 'M' ";
		}
		
		if ($aux['sexo'] == 'F') {
			$condiciones .= " AND p.sexo = 'F' ";
		}
		
		if (($aux['fechaFrom'] != '') AND ($aux['fechaTo'] != '')) {
			$condfecha .= " AND o.fecha BETWEEN '". implode('-',array_reverse(explode('/', $aux['fechaFrom']))). " 00:00:00' AND '". implode('-',array_reverse(explode('/', $aux['fechaTo'])))." 23:59:59'";
		}
		else {
			if ($aux['fechaFrom'] != '') {
				$condfecha .= " AND o.fecha >= '". implode('-',array_reverse(explode('/', $aux['fechaFrom']))). " 00:00:00'";
			}
			if ($aux['fechaTo'] != '') {
				$condfecha .= " AND o.fecha <= '". implode('-',array_reverse(explode('/', $aux['fechaTo']))). " 23:59:59'";
			}
		}
		
			
		Controller::loadModel('Question');
		$questions = $this->Question->find('all',array('recursive' => 0,'conditions' => array('Question.visible' => '1')));
		foreach ($questions as $q):
			$ipreg = $q['Question']['id'];
			$joinpreguntas .= " LEFT JOIN answers AS a".$ipreg." ON a".$ipreg.".patient_id = p.id AND a".$ipreg.".question_id = ".$ipreg;
			$selectorpreguntas .= " , a".$ipreg.".valor as '".$ipreg."'";
		endforeach;
		
		if (isset($this->request->query['data']['Answer'])) {
		
			$preguntas = $this->request->query['data']['Answer'];	
				
			foreach ($preguntas as $preg):
			
				if ($preg['valor'] != '') {
					$condicionpreguntas .= " AND a" . $preg['question_id'] . ".valor = " .$preg['valor'];
				}
			
			endforeach;		
		}

			
		if ($aux['tipodir'] == '') {
			$condtipdir = "COALESCE(oms.address_part_id,oms.address_lab_id) ";
		} else if ($aux['tipodir'] == 'P') {
			$condtipdir = "oms.address_part_id ";
		} else {
			$condtipdir = "oms.address_lab_id ";
		}


		if (isset($this->request->query['data']['Codigo'])) {
		
			$codigosOms = $this->request->query['data']['Codigo'];
		
			foreach ($codigosOms as $cod):
				
				$listaCodigos .= "," . $cod['item'];	
			
			endforeach;
			
			$condicioncodigos = " AND o.oms_code_id IN ( " . $listaCodigos . " ) ";	
						
		} 

		// ANTES ERA EDAD DEL PACIENTE (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(p.fecha_nacimiento)), '%Y')+0) AS edad
		// AHORA ES EDAD DEL PACIENTE AL MOMENTO QUE SE LE CARGO EL OMS

		$consulta = "select Patient.* from ( select p.vive,p.fecha_defuncion,p.sexo,oms.fecha, (DATE_FORMAT(FROM_DAYS(TO_DAYS(oms.fecha) - TO_DAYS(p.fecha_nacimiento)), '%Y')+0) AS edad, (DATE_FORMAT(FROM_DAYS(TO_DAYS(p.fecha_defuncion) - TO_DAYS(p.fecha_nacimiento)), '%Y')+0) AS edad_defuncion, jobs.descripcion as 'ocupacion', dir.*,oms.estadio,oms.codigo,oms.descripcion " . $selectorpreguntas . " from patients AS p join
				(select codes.codigo,codes.descripcion,o.address_part_id,o.address_lab_id,o.patient_id,o.estadio,o.fecha from oms_registers as o
				join oms_codes as codes on codes.id = o.oms_code_id " . $condicioncodigos . $condfecha . " GROUP BY o.patient_id) AS oms on oms.patient_id = p.id JOIN jobs on jobs.id=p.job_id join addresses 
				as dir on dir.id = " . $condtipdir . $joinpreguntas . $condiciones . $condicionpreguntas . " ) as Patient".$condedad;
	
		//debug($consulta);
		//exit;
	
		$addresses = $this->Address->query($consulta);
		
		return new CakeResponse(array('body' => json_encode($addresses)));
		
		//return new CakeResponse(array('body' => json_encode($consulta)));
	
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
