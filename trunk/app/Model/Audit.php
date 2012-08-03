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

}