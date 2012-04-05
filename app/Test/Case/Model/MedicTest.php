<?php
App::uses('Medic', 'Model');

/**
 * Medic Test Case
 *
 */
class MedicTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medic', 'app.medic_type', 'app.note', 'app.oms_register');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medic = ClassRegistry::init('Medic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medic);

		parent::tearDown();
	}

}
