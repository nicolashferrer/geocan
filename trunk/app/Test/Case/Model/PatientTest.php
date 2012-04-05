<?php
App::uses('Patient', 'Model');

/**
 * Patient Test Case
 *
 */
class PatientTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.patient', 'app.address_particular', 'app.address_laboral', 'app.answer', 'app.question', 'app.oms_register');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Patient = ClassRegistry::init('Patient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Patient);

		parent::tearDown();
	}

}
