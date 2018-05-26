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
 * general_setting_page
 */
function general_setting_page() { ?>
	<div class="wrap">
		<h2>設定</h2>
		<from method="post" action="options.php" novalidate="novalidate">
		</from>
	</div>
<?php
}

/**
 * starter_add_menu_page
 */
function baseCalendar_add_menu_page() {
	add_menu_page('Combined Calendar', 'Combined Calendar', 'manage_options', 'combined-calendar', 'general_setting_page', 'dashicons-admin-generic');
}
add_action('admin_menu', 'baseCalendar_add_menu_page' );