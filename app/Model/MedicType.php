<?php
App::uses('AppModel', 'Model');
/**
 * MedicType Model
 *
 * @property Medic $Medic
 */
class MedicType extends AppModel {

	public $actsAs = array('AuditLog.Auditable');
/**
 * Validation rules
 *
 * @var array
 */
 
 var $displayField = 'tipo';
 
	public $validate = array(
		'tipo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio.',
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
		'Medic' => array(
			'className' => 'Medic',
			'foreignKey' => 'medic_type_id',
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

}
