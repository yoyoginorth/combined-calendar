<?php
/**
 * BaseCalendar class in Calendar Framework
 *
 * @package WordPress
 * @subpackage Calendar Framework
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Class BaseCalendar
 */
class BaseCalendar {
	/**
	 * Year
	 *
	 * @var $year
	 * @since 1.0.0
	 */
	protected $year;
	/**
	 * Month
	 *
	 * @var $month
	 * @since 1.0.0
	 */
	protected $month;
	/**
	 * Start of week
	 *
	 * @var $start_of_week
	 * @since 1.0.0
	 */
	protected $start_of_week;

	const WEEK_DAYS = 7;

	/**
	 * BaseCalendar constructor.
	 */
	function __construct() {
		$this->set_date( date( 'Y' ), date( 'n' ) );
		$this->set_start_of_week( get_option( 'start_of_week' ) );
	}

	/**
	 * Set year and month
	 *
	 * @param int $year year.
	 * @param int $month month.
	 * @since 1.0.0
	 */
	protected function set_date( $year, $month ) {
		$this->year  = $year;
		$this->month = $month;
	}

	/**
	 * Set start of week
	 *
	 * @param int $day day of the week.
	 * @since 1.0.0
	 */
	protected function set_start_of_week( $day ) {
		$this->start_of_week = $day;
	}

	/**
	 * Show calendar
	 *
	 * @param int $year year.
	 * @param int $month month.
	 * @return string html
	 * @since 1.0.0
	 */
	public function show_cal( $year = null, $month = null ) {
		if ( $year && $month ) {
			$this->set_date( $year, $month );
		}

		$cal_array = $this->get_combined_cal_array();
		$cal_html  = $this->get_cal_with_html( $cal_array );

		return $cal_html;
	}

	/**
	 * Get combined calendar array, not only specific month (in near future)
	 *
	 * @return array Calendar Array
	 * @since 1.0.0
	 */
	protected function get_combined_cal_array() {
		$cal = $this->get_cal_array();
		return $cal;
	}

	/**
	 * Get specific month's calendar
	 *
	 * @return array Specific Month
	 * @since 1.0.0
	 */
	protected function get_cal_array() {
		$cal        = array();
		$week       = 0;
		$date_count = date( 'j', mktime( 0, 0, 0, $this->month + 1, 0, $this->year ) );

		for ( $i = 1; $i <= $date_count; $i++ ) {
			$w = date( 'w', mktime( 0, 0, 0, $this->month, $i, $this->year ) );

			// set empty string until comes 1st date.
			if ( 1 === $i ) {
				if ( $this->start_of_week < $w ) {
					for ( $j = 0; $j < $w - $this->start_of_week; $j++ ) {
						$cal[ $week ][] = '';
					}
				} elseif ( $this->start_of_week > $w ) {
					for ( $j = 0; $j < self::WEEK_DAYS - $this->start_of_week + $w; $j++ ) {
						$cal[ $week ][] = '';
					}
				}
			}

			$cal[ $week ][] = $i;

			if ( count( $cal[ $week ] ) === self::WEEK_DAYS ) {
				$week++;
			}
		}

		return $cal;
	}

	/**
	 * Get calendar HTML to display
	 *
	 * @param array $cal calendar array.
	 * @return string
	 * @since 1.0.0
	 */
	protected function get_cal_with_html( $cal ) {
		$tag  = '<table>';
		$tag .= '<caption>' . $this->month . '</caption>';
		$tag .= '<tr>';

		$week_header = $this->get_week_header();
		for ( $i = 0; $i < self::WEEK_DAYS; $i++ ) {
			$tag .= '<th>' . $week_header[ $i ] . '</th>';
		}
		$tag .= '</tr>';
		for ( $i = 0; $i < count( $cal ); $i++ ) {
			$tag .= '<tr>';

			for ( $j = 0; $j < count( $cal[ $i ] ); $j++ ) {
				$tag .= '<td>' . $cal[ $i ][ $j ] . '</td>';
			}

			$tag .= '</tr>';
		}
		$tag .= '</table>';

		return $tag;
	}

	/**
	 * Get week header (Sunday to Saturday)
	 *
	 * @return array
	 * @since 1.0.0
	 */
	protected function get_week_header() {
		$week_header = array(
			__( 'Sunday', 'yoyoginorth-calendar-framework' ),
			__( 'Monday', 'yoyoginorth-calendar-framework' ),
			__( 'Tuesday', 'yoyoginorth-calendar-framework' ),
			__( 'Wednesday', 'yoyoginorth-calendar-framework' ),
			__( 'Thursday', 'yoyoginorth-calendar-framework' ),
			__( 'Friday', 'yoyoginorth-calendar-framework' ),
			__( 'Saturday', 'yoyoginorth-calendar-framework' ),
		);

		$tmp_suffix_array = array();

		for ( $i = 0; $i < self::WEEK_DAYS; $i++ ) {
			if ( $i < $this->start_of_week ) {
				array_push( $tmp_suffix_array, $week_header[0] );
				array_shift( $week_header );
			}
		}

		return array_merge( $week_header, $tmp_suffix_array );
	}
}
