<?php
/**
 * Functions in Calendar Framework
 *
 * @package WordPress
 * @subpackage Calendar Framework
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
 */
function yoyoginorth_show_calendar() {
	$cal = new Calendar;
	return $cal->show_cal();
}
