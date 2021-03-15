<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/BenAttenborough
 * @since             1.0.0
 * @package           Rba_Wc_Booking_Extras
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Booking Extras
 * Plugin URI:        https://github.com/BenAttenborough/wc-booking-extras
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ben Attenborough
 * Author URI:        https://github.com/BenAttenborough
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rba-wc-booking-extras
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RBA_WC_BOOKING_EXTRAS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rba-wc-booking-extras-activator.php
 */
function activate_rba_wc_booking_extras() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rba-wc-booking-extras-activator.php';
	Rba_Wc_Booking_Extras_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rba-wc-booking-extras-deactivator.php
 */
function deactivate_rba_wc_booking_extras() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rba-wc-booking-extras-deactivator.php';
	Rba_Wc_Booking_Extras_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rba_wc_booking_extras' );
register_deactivation_hook( __FILE__, 'deactivate_rba_wc_booking_extras' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rba-wc-booking-extras.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rba_wc_booking_extras() {

	$plugin = new Rba_Wc_Booking_Extras();
	$plugin->run();

}
run_rba_wc_booking_extras();
