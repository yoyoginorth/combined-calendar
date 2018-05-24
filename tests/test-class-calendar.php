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
	 * @throws ReflectionException Reflection exception.
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

		$this->assertSame( $month->getValue( $this->object ), 6 );
		$this->assertSame( $year->getValue( $this->object ), 2005 );
	}

	/**
	 * Check if start_of_week would be the specified day of the week
	 *
	 * @throws ReflectionException Reflection exception.
	 * @since 1.0.0
	 */
	function test_set_start_of_week() {
		update_option( 'start_of_week', 6 );
		$expected = get_option( 'start_of_week' );

		$reflection = new \ReflectionClass( $this->object );

		$method = $reflection->getMethod( 'set_start_of_week' );
		$method->setAccessible( true );
		$method->invoke( $this->object, $expected );

		$start_of_week = $reflection->getProperty( 'start_of_week' );
		$start_of_week->setAccessible( true );
		$actual = $start_of_week->getValue( $this->object );

		$this->assertSame( $expected, $actual );
	}

	/**
	 * Check the structure of the calendar array
	 *
	 * @throws ReflectionException Reflection exception.
	 * @since 1.0.0
	 */
	function test_get_cal_array() {
		$reflection = new \ReflectionClass( $this->object );
		$this->initialize( $reflection, 2018, 5, 2 );

		$method = $reflection->getMethod( 'get_cal_array' );
		$method->setAccessible( true );
		$array = $method->invoke( $this->object );

		$this->assertCount( 5, $array );
		$this->assertSame( 1, $array[0][0] );
	}

	/**
	 * Check the structure of the combined calendar array
	 *
	 * @throws ReflectionException Reflection exception.
	 * @since 1.0.0
	 */
	function test_get_combined_cal_array() {
		$reflection = new \ReflectionClass( $this->object );
		$this->initialize( $reflection, 2018, 5, 2 );

		$method = $reflection->getMethod( 'get_combined_cal_array' );
		$method->setAccessible( true );
		$array = $method->invoke( $this->object );

		$this->assertCount( 5, $array );
		$this->assertSame( 1, $array[0][0] );
	}

	/**
	 * Check each values of day of the week in header (English).
	 *
	 * @throws ReflectionException Reflection exception.
	 * @since 1.0.0
	 */
	function test_get_week_header_en() {
		$reflection = new \ReflectionClass( $this->object );

		// Set start of week.
		$method = $reflection->getMethod( 'set_start_of_week' );
		$method->setAccessible( true );
		$method->invoke( $this->object, 1 );

		$expected_array = array(
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday',
		);

		$method = $reflection->getMethod( 'get_week_header' );
		$method->setAccessible( true );
		$array = $method->invoke( $this->object );

		$this->assertSame( $expected_array, $array );
	}

	/**
	 * Initialize variables
	 *
	 * @param Reflection $reflection reflection instance.
	 * @param int        $year year.
	 * @param int        $month month.
	 * @param int        $start_of_week start_of_week.
	 * @since 1.0.0
	 */
	function initialize( $reflection, $year, $month, $start_of_week ) {
		// Set year and month.
		$method = $reflection->getMethod( 'set_date' );
		$method->setAccessible( true );
		$method->invoke( $this->object, $year, $month );

		// Set start of week.
		$method = $reflection->getMethod( 'set_start_of_week' );
		$method->setAccessible( true );
		$method->invoke( $this->object, $start_of_week );
	}
}
