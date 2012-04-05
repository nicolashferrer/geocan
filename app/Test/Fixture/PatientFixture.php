<?php
/**
 * PatientFixture
 *
 */
class PatientFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'iniciales' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fecha_nacimiento' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'sexo' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'address_particular_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'address_laboral_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'nro_documento' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FK_patient_address1' => array('column' => 'address_particular_id', 'unique' => 0), 'FK_patient_address2' => array('column' => 'address_laboral_id', 'unique' => 0)),
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
			'iniciales' => 'Lor',
			'fecha_nacimiento' => '2012-04-01',
			'sexo' => 1,
			'address_particular_id' => 1,
			'address_laboral_id' => 1,
			'nro_documento' => 'Lorem ipsum dolor sit amet'
		),
	);
}
