<?php
/**
 * Combined_Calendar class in Combined Calendar
 *
 * @package WordPress
 * @subpackage Combined Calendar
 * @since 1.0.0
 * @version 1.0.0
 *
 * Plugin Name:  Combined Calendar
 * Plugin URI:   https://github.com/yoyoginorth/combined-calendar
 * Description:  Display simple calendar
 * Version:      1.0.0
 * Author:       ryotsun
 * Author URI:   https://github.com/yoyoginorth/combined-calendar
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  combined-calendar
 * Domain Path:  /languages
 */

/**
 * Require file
 */
require_once 'includes/functions.php';
require_once 'admin/basecalendar-admin.php';

/**
 * Class Combined_Calendar
 */
class Combined_Calendar {
	const TEXT_DOMAIN = 'combined-calendar';
	const LANG_DIR    = 'languages';

	/**
	 * Combined Calendar constructor.
	 */
	public function __construct() {
		load_plugin_textdomain( self::TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/' . self::LANG_DIR );
	}
}

new Combined_Calendar();
