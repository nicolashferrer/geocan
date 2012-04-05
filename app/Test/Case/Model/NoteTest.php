<?php
App::uses('Note', 'Model');

/**
 * Note Test Case
 *
 */
class NoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.note', 'app.medic', 'app.medic_type', 'app.oms_register', 'app.patient', 'app.address_particular', 'app.address_laboral', 'app.answer', 'app.question', 'app.address_part', 'app.address_lab', 'app.oms_code');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Note = ClassRegistry::init('Note');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Note);

		parent::tearDown();
	}

}
