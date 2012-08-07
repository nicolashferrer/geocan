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

	public $actsAs = array('AuditLog.Auditable');
	
/**
 * Validation rules
 *
 * @var array
 */
 
 
	var $virtualFields = array(
		'edad' => "DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(Patient.fecha_nacimiento)), '%Y')+0"
	);

	public $validate = array(
		'nro_documento' => array(
		    /*'numeric'=>array(
			'rule' => 'numeric',
			'on' => 'create',
			'message' => 'Ingrese solo numeros, sin puntos ni comas.',
			) , */ 
			'is_unique' => array(
                    'rule' => array('isUnique'),
					'on' => 'create',
                    'message' => 'El DNI ingresado ya corresponde a otro paciente.',
               ),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'iniciales' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_nacimiento' => array(
			'notempty' => array(
				'rule' => array('date','dmy'),
				'message' => 'Ingrese una fecha valida dd/mm/aaaa.',
				//'allowEmpty' => true
			),
			'date' => array(
				'rule' => '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
				'message' => 'Por favor ingrese la fecha en este formato: DD/MM/AAAA'
			)
		)
	);

	public $belongsTo = array(
		'Primary' => array('className' => 'Address', 'foreignKey' => 'address_particular_id'),
		'Secondary' => array('className' => 'Address', 'foreignKey' => 'address_laboral_id')
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
			'finderQuery' => 'SELECT OmsRegister.*,Medic.nombre,Medic.apellido,Oms.codigo,AddressPart.direccion,AddressLab.direccion FROM geocan.oms_registers AS OmsRegister LEFT JOIN medics AS Medic ON Medic.id=OmsRegister.medic_id LEFT JOIN oms_codes AS Oms ON Oms.id=OmsRegister.oms_code_id LEFT JOIN addresses AS AddressPart ON AddressPart.id=OmsRegister.address_part_id LEFT JOIN addresses AS AddressLab ON AddressLab.id=OmsRegister.address_lab_id WHERE OmsRegister.patient_id ={$__cakeID__$}',
			'counterQuery' => ''
		)
	);

        function beforeSave()
        {
            if (!empty($this->data['Patient']['fecha_nacimiento']))
            {
                $this->data['Patient']['fecha_nacimiento'] = implode('-', array_reverse(explode('/', $this->data['Patient']['fecha_nacimiento'])));
            }
			/*if (empty($this->data['Patient']['id'])) { // Si es una alta de nuevo paciente...
				if (!empty($this->data['Patient']['nro_documento']))
				{
					$documentoEncriptado = Security::hash($this->data['Patient']['nro_documento'], 'sha256', true);
					$this->data['Patient']['nro_documento'] = $documentoEncriptado;
				}
			}*/
            return true;
        }
		
		public function beforeValidate(){
			//Encriptacion del documento
			
			if (empty($this->data['Patient']['id'])) { // Si es una alta de nuevo paciente...
				if (!empty($this->data['Patient']['nro_documento']))
				{
					$documentoEncriptado = Security::hash($this->data['Patient']['nro_documento'], 'sha256', true);
					$this->data['Patient']['nro_documento'] = $documentoEncriptado;
				}
			}
            return true;
		}
				
		function afterFind($resultados) {
			foreach ($resultados as $clave => $valor) {
				if (isset($valor['Patient']['fecha_nacimiento'])) {
					$resultados[$clave]['Patient']['fecha_nacimiento'] = date('d/m/Y', strtotime($valor['Patient']['fecha_nacimiento']));
				}
			}
			return $resultados;
		}
		
}