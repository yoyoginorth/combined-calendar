<?php
/**
 * Class CalendarTest
 *
 * @package Yoyoginorth_Calendar_Framework
 */

/**
 * Calendar test case.
 */
class CalendarTest extends WP_UnitTestCase {
	/**
	 * Calendar object
	 *
	 * @var $object Calendar
	 * @since 1.0.0
	 */
	protected $object;

	/**
	 * Preparation of CalendarTest
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		$this->object = new Calendar;
	}


	/**
	 * Check if year and month would be the specified date
	 *
	 * @since 1.0.0
	 */
	function test_set_date() {
		$reflection = new \ReflectionClass( $this->object );

		$method = $reflection->getMethod( 'set_date' );
		$method->setAccessible( true );
		$method->invoke( $this->object, 2005, 6 );

		$year = $reflection->getProperty( 'year' );
		$year->setAccessible( true );
		$month = $reflection->getProperty( 'month' );
		$month->setAccessible( true );

		$this->assertEquals( $month->getValue( $this->object ), 6 );
		$this->assertEquals( $year->getValue( $this->object ), 2005 );
	}
}
