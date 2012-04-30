<?php
App::uses('AppModel', 'Model');
/**
 * OmsRegister Model
 *
 * @property Patient $Patient
 * @property Medic $Medic
 * @property AddressPart $AddressPart
 * @property AddressLab $AddressLab
 * @property OmsCode $OmsCode
 * @property Note $Note
 */
class OmsRegister extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'medic_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'oms_code_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estadio' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Medic' => array(
			'className' => 'Medic',
			'foreignKey' => 'medic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AddressPart' => array(
			'className' => 'Address',
			'foreignKey' => 'address_part_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AddressLab' => array(
			'className' => 'Address',
			'foreignKey' => 'address_lab_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OmsCode' => array(
			'className' => 'OmsCode',
			'foreignKey' => 'oms_code_id',
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
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'oms_register_id',
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
	
	function afterFind($resultados) {
			foreach ($resultados as $clave => $valor) {
				if (isset($valor['OmsRegister']['fecha'])) {
					$resultados[$clave]['OmsRegister']['fecha'] = date('d/m/Y', strtotime($valor['OmsRegister']['fecha']));
				}
			}
			return $resultados;
		}

}
