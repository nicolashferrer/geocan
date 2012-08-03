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
		
		return array('Note' => 'Nota','Question' => 'Pregunta');
	}

	public function getAcciones() {
		
		return array('CREATE' => 'Creación','DELETE' => 'Eliminación','EDIT' => 'Edición');
	}

}