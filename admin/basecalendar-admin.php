<?php
/**
 * BaseCalendar admin
 *
 * @package WordPress
 * @subpackage Combined Calendar
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Output_setting_page_html
 */
function output_setting_page_html() {
	require_once( dirname( __FILE__ ) . '/views/html-setting-page.php' );
}

/**
 * Base_calendar_add_menu_page
 */
function base_calendar_add_menu_page() {
	add_options_page( 'Combined Calendar', 'Combined Calendar', 'manage_options', 'combined-calendar', 'output_setting_page_html' );
}
add_action( 'admin_menu', 'base_calendar_add_menu_page' );
