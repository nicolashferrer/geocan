<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property City $City
 */
class Audit extends AppModel {
	
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'source_id',
			'conditions' => '',
			'fields' => 'username',
			'order' => ''
		)
	);	
	
	public function getModelos() {
		
		$opciones = array('OmsCode' => 'Código OMS','Province' =>'Provincia','OmsRegister' => 'OMS','City' => 'Ciudad','Primary' => 'Dirección Particular', 'Secondary' => 'Dirección Laboral','Medic' => 'Médico','MedicType' => 'Tipo de Médico', 'Patient' => 'Paciente','User' => 'Usuario','Note' => 'Nota','Answer' => 'Respuesta','Question' => 'Pregunta');
		 
		asort($opciones);
		 
		return $opciones;
	}

	public function getAcciones() {
		
		return array('CREATE' => 'Creación','DELETE' => 'Eliminación','EDIT' => 'Edición');
	}
	
	public function getUsers() {
		
		Controller::loadModel('User');
		$users = $this->User->find('list');
		
		return array('CREATE' => 'Creación','DELETE' => 'Eliminación','EDIT' => 'Edición');
	}
	
	function afterDataFilter($query, $options)  
	{  

		if ((!empty($options['values']['Audit']['created_from'])) && (!empty($options['values']['Audit']['created_to'])))
		{
			$query['conditions']['Audit.created between ? AND ?'] = array(implode('-', array_reverse(explode('/', $options['values']['Audit']['created_from']))) . ' 00:00:00',implode('-', array_reverse(explode('/', $options['values']['Audit']['created_to'])))  . ' 23:59:59');
		}
		else
		{
			if (!empty($options['values']['Audit']['created_from']))
			{
				$query['conditions']['Audit.created >='] = implode('-', array_reverse(explode('/', $options['values']['Audit']['created_from']))) . ' 00:00:00';
			}
			if (!empty($options['values']['Audit']['created_to']))
			{
				$query['conditions']['Audit.created <='] = implode('-', array_reverse(explode('/', $options['values']['Audit']['created_to'])))  . ' 23:59:59';
			}
		}
		
		unset($query['conditions']['Audit.created_from ']);
		unset($query['conditions']['Audit.created_to ']);
	   
		return $query;  
	}

	function afterFind($resultados) {
			foreach ($resultados as $clave => $valor) {
				if (isset($valor['Audit']['created'])) {
					$resultados[$clave]['Audit']['created'] = date('d/m/Y h:i:s A', strtotime($valor['Audit']['created']));
				}
			}
			return $resultados;
	}  
}