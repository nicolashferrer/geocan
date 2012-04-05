<?php
App::uses('MedicType', 'Model');

/**
 * MedicType Test Case
 *
 */
class MedicTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medic_type', 'app.medic');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicType = ClassRegistry::init('MedicType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicType);

		parent::tearDown();
	}

}
