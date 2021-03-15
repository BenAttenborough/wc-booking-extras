<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/BenAttenborough
 * @since      1.0.0
 *
 * @package    Rba_Wc_Booking_Extras
 * @subpackage Rba_Wc_Booking_Extras/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rba_Wc_Booking_Extras
 * @subpackage Rba_Wc_Booking_Extras/includes
 * @author     Ben Attenborough <me@benattenborough.org.uk>
 */
class Rba_Wc_Booking_Extras_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rba-wc-booking-extras',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
