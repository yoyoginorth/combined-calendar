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
function output_setting_page_html() { ?>
	<div class="wrap">
		<h2><?php _e( 'Combined Calendar Setting', 'combined-calendar' ); ?></h2>
			<from method="post" action="options.php" novalidate="novalidate">
			</from>
	</div>
<?php
}

/**
 * Base_calendar_add_menu_page
 */
function base_calendar_add_menu_page() {
	add_options_page( 'Combined Calendar', 'Combined Calendar', 'manage_options', 'combined-calendar', 'output_setting_page_html' );
}
add_action( 'admin_menu', 'base_calendar_add_menu_page' );
