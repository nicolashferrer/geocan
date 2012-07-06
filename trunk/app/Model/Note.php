<?php
App::uses('AppModel', 'Model');
/**
 * Note Model
 *
 * @property Medic $Medic
 * @property OmsRegister $OmsRegister
 */
class Note extends AppModel {

	public $actsAs = array('AuditLog.Auditable');

		public function beforeSave() {
			$hoy = new DateTime();
			$this->data['Note']['fecha'] = $hoy->format('Y-m-d H:i:s');
		}
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
		'oms_register_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
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
		'Medic' => array(
			'className' => 'Medic',
			'foreignKey' => 'medic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OmsRegister' => array(
			'className' => 'OmsRegister',
			'foreignKey' => 'oms_register_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
