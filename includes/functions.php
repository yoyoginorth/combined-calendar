<?php
/**
 * Functions in Combined Calendar
 *
 * @package WordPress
 * @subpackage Combined Calendar
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Require file
 */
require_once 'class-calendar.php';

/**
 * Display simple calendar
 *
 * @return string Output calendar html
 * @since 1.0.0
 */
function combined_calendar_show_calendar() {
	$cal = new Calendar();
	return $cal->show_cal();
}
