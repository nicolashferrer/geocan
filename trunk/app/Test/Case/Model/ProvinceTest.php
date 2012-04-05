<?php
App::uses('Province', 'Model');

/**
 * Province Test Case
 *
 */
class ProvinceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.province', 'app.city');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Province = ClassRegistry::init('Province');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Province);

		parent::tearDown();
	}

}
