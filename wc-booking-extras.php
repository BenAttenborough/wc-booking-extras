<?php
/**
 * Plugin Name:     Wc Booking Extras
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Ben Attenborough
 * Author URI:      YOUR SITE HERE
 * Text Domain:     wc-booking-extras
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wc_Booking_Extras
 */

// Your code starts here.

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WC_BOOKING_EXTRAS', '0.1.0' );

if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

function rba_wcbe_check_requirements() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        return true;
    } else {
        add_action( 'admin_notices', 'rba_wcbe_missing_wc_notice' );
        return false;
    }
}

function rba_wcbe_missing_wc_notice() { 
    $class = 'notice notice-error';
    $message = __( 'Woocommerce Booking Extras requires WooCommerce to be installed and active.', 'wc-booking-extras' );
 
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

function activate_wc_booking_extras() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-rba-wcbe-activator.php';
    RBA_WCBE_Activator::activate();
}

function deactivate_wc_booking_extras() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rba-wcbe-deactivator.php';
	RBA_WCBE_Deactivator::deactivate();
}

add_action( 'plugins_loaded', 'rba_wcbe_check_requirements' );

register_activation_hook( __FILE__, 'activate_wc_booking_extras' );
register_deactivation_hook( __FILE__, 'deactivate_wc_booking_extras' );

require plugin_dir_path( __FILE__ ) . 'includes/class-rba-wcbe.php';

function run_wc_booking_extras() {
    if (rba_wcbe_check_requirements()) {
        $plugin = new RBA_WCBE();
        $plugin->run();        
    }
}

run_wc_booking_extras();