<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => 'SELECT User.*,Medic.nombre,Medic.apellido FROM geocan.users AS User LEFT JOIN medics AS Medic ON Medic.id=User.medic_id  WHERE User.group_id ={$__cakeID__$}',
			'counterQuery' => ''
		)
	);

	//ACL
	public $actsAs = array('AuditLog.Auditable', 'Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }
	//ACL***
}
