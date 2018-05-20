<?php
/*
Plugin Name:  Calendar Framework
Plugin URI:   https://github.com/yoyoginorth/calendarframework
Description:  Simple Calendar Framework
Version:      1.0.0
Author:       ryotsun
Author URI:   https://github.com/yoyoginorth/calendarframework
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  yoyoginorth-calendar-framework
Domain Path:  /languages
*/

include "includes/functions.php";

class CalendarFramework
{
	const TEXT_DOMAIN = 'yoyoginorth-calendar-framework';
	const LANG_DIR = 'languages';

	public function __construct()
	{
		load_plugin_textdomain(self::TEXT_DOMAIN, false, dirname(plugin_basename(__FILE__)) . '/' . self::LANG_DIR);
	}
}

new CalendarFramework;
