<?php
App::uses('OmsRegister', 'Model');

/**
 * OmsRegister Test Case
 *
 */
class OmsRegisterTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.oms_register', 'app.patient', 'app.address_particular', 'app.address_laboral', 'app.answer', 'app.question', 'app.medic', 'app.medic_type', 'app.note', 'app.address_part', 'app.address_lab', 'app.oms_code');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OmsRegister = ClassRegistry::init('OmsRegister');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OmsRegister);

		parent::tearDown();
	}

}
