<?php
/**
 * Functions in Calendar Framework
 *
 * @package WordPress
 * @subpackage Calendar Framework
 * @since 1.0.0
 * @version 1.0.0
 */

require_once 'class-calendar.php';

/**
 * @return string Output calendar html
 */
function show_calendar() {
	$cal = new Calendar;
	return $cal->show_cal();
}
