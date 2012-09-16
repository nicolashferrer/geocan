<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Medics $Medics
 */
class User extends AppModel {

var $captcha = ''; //intializing captcha var

var $displayField = 'username';

	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}
	
/**
 * Validation rules
 *
 * @var array
 */
	var $validate = array(
		'username' => array(
			'is_unique' => array(
                    'rule' => array('isUnique'),
					'on' => 'create',
                    'message' => 'El nombre de usuario ya se encuentra registrado.',
               ),
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo es obligatorio.',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'create'
			),
		),
		'pass_viejo' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Por favor ingrese el password viejo.',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update'
			),
			'compare' => array(
                    'rule' => array('compare', array('password_antiguo')),
                    'message' => 'El password antiguo no coincide.'
            ),
		),
        'password' => array(
                'compare' => array(
                    //'rule' => array('compare', array('password', 'password_confirm')),
					'rule' => array('compare', array('password_confirm')),
                    'message' => 'Los passwords no coinciden.'
                ),
                'minlength' => array(
                    'rule' => array('wrapper', array(array('minLength', 6), array('password_confirm'))),
                    'message' => 'El password tiene que tener como minimo 6 caracteres.'
                ),
         ),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	public function compare($value, $options = array(), $rule = array()) {
            $valid = current($value) == $this->data[$this->alias][$options[0]];
			
            if (!$valid) {
                $this->invalidate(isset($options[1])? $options[1] : $options[0], $rule['message']);
            }
            return $valid;
        }

	public function wrapper($value, $options = array(), $rule = array()) {
        $method = $options[0][0];
        $options[0][0] = $this->data[$this->alias][$options[1][0]];
       
        if (method_exists($this, $method)) {
            $valid = $this->{$method}($value);
        } else {
            $valid = call_user_func_array(array('Validation', $method), $options[0]);
        }
       
        if (!$valid) {
            foreach($options[1] as $field) {
                $this->invalidate($field, $rule['message']);
            }
        }
        return $valid;
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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
		)
	);
	
	public function beforeSave() {
		//Encriptacion del password
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);	
        return true;
    }
	
	public function beforeValidate(){
	
		$this->data['User']['pass_viejo'] = AuthComponent::password($this->data['User']['pass_viejo']);
		
		return true;
	}

	
	function afterSave($created) {
		if (!$created) {
			$parent = $this->parentNode();
			$parent = $this->node($parent);
			$node = $this->node();
			$aro = $node[0];
			$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
			$this->Aro->save($aro);
		}
	}
	
	//ACL
	public $name = 'User';
    public $actsAs = array('AuditLog.Auditable', 'Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	//ACL***
	
	// En caso que queramos permisos por grupo solamente

	function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

}
