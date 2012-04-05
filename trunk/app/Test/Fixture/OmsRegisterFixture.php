<?php
/**
 * OmsRegisterFixture
 *
 */
class OmsRegisterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'medic_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'address_part_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'address_lab_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'oms_code_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'fecha' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FK_oms_paciente' => array('column' => 'patient_id', 'unique' => 0), 'FK_oms_medico' => array('column' => 'medic_id', 'unique' => 0), 'FK_oms_direccion1' => array('column' => 'address_part_id', 'unique' => 0), 'FK_oms_direccion2' => array('column' => 'address_lab_id', 'unique' => 0), 'FK_oms_codigo_oms' => array('column' => 'oms_code_id', 'unique' => 0), 'FK_oms_registers_patient' => array('column' => 'patient_id', 'unique' => 0), 'FK_oms_registers_medic' => array('column' => 'medic_id', 'unique' => 0), 'FK_oms_registers_address1' => array('column' => 'address_part_id', 'unique' => 0), 'FK_oms_registers_address2' => array('column' => 'address_lab_id', 'unique' => 0), 'FK_oms_registers_oms_code' => array('column' => 'oms_code_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'patient_id' => 1,
			'medic_id' => 1,
			'address_part_id' => 1,
			'address_lab_id' => 1,
			'oms_code_id' => 1,
			'fecha' => '2012-04-01 17:24:40'
		),
	);
}
