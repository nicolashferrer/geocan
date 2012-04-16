<?php
App::uses('AppModel', 'Model');
/**
 * Patient Model
 *
 * @property AddressParticular $AddressParticular
 * @property AddressLaboral $AddressLaboral
 * @property Answer $Answer
 * @property OmsRegister $OmsRegister
 */
class Patient extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
  var $displayField = 'iniciales';
 
	public $validate = array(
		'nro_documento' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AddressParticular' => array(
			'className' => 'Address',
			'foreignKey' => 'address_particular_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AddressLaboral' => array(
			'className' => 'Address',
			'foreignKey' => 'address_laboral_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'patient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OmsRegister' => array(
			'className' => 'OmsRegister',
			'foreignKey' => 'patient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => 'SELECT OmsRegister.*,Medic.nombre,Medic.apellido,Oms.codigo FROM geocan.oms_registers AS OmsRegister LEFT JOIN medics AS Medic ON Medic.id=OmsRegister.medic_id LEFT JOIN oms_codes AS Oms ON Oms.id=OmsRegister.oms_code_id WHERE OmsRegister.patient_id ={$__cakeID__$}',
			'counterQuery' => ''
		)
	);

}
