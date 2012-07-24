<?php
App::uses('AppModel', 'Model');
/**
 * OmsCode Model
 *
 * @property OmsRegister $OmsRegister
 */
class OmsCode extends AppModel {

	public $actsAs = array('AuditLog.Auditable');

 var $displayField = 'codigo_desc';
 
  	var $virtualFields = array(
		'codigo_desc' => " CONCAT(OmsCode.codigo,' - ',OmsCode.descripcion) "
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'codigo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
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
		'OmsRegister' => array(
			'className' => 'OmsRegister',
			'foreignKey' => 'oms_code_id',
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
