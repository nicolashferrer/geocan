<?php
App::uses('OmsCode', 'Model');

/**
 * OmsCode Test Case
 *
 */
class OmsCodeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.oms_code', 'app.oms_register');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OmsCode = ClassRegistry::init('OmsCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OmsCode);

		parent::tearDown();
	}

}
