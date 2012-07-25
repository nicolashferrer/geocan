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

}