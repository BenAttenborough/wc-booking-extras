<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.benattenborough.org.uk/
 * @since      0.1.0
 *
 * @package    wc-booking-extras
 * @subpackage wc-booking-extras/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.1.0
 * @package    wc-booking-extras
 * @subpackage wc-booking-extras/includes
 * @author     Ben Attenborough
 */
class RBA_WCBE_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-booking-extras',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}