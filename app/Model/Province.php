<?php
App::uses('AppModel', 'Model');
/**
 * Province Model
 *
 * @property City $City
 */
class Province extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
 
	var $displayField = 'nombre';

 
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'province_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function beforeDelete(){
		$count = $this->City->find("count", array(
			"conditions" => array("province_id" => $this->id)
		));
		if ($count == 0) {
			return true;
		} else {
			return false;
		}
	}
}
