<?php
/**
 * Author: ryotsun
 * Date: 2018/05/20
 * Time: 21:35
 */

require_once 'calendar.php';

function show_calendar() {
	$cal = new Calendar;
	return $cal->show_cal();
}
