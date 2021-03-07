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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'RBA_WCBE_WC_Settings' ) ) {

    /**
     * Settings class
     *
     * @since 0.1.0
     */
    class RBA_WCBE_WC_Settings extends WC_Settings_Page {

        /**
         * Constructor
         * @since  1.0
         */
        public function __construct() {
                
            $this->id    = 'wc-booking-extras';
            $this->label = __( 'Galactica', 'wc-booking-extras' );

            // Define all hooks instead of inheriting from parent                    
            add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
            add_action( 'woocommerce_sections_' . $this->id, array( $this, 'output_sections' ) );
            add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
            add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
            
        }


        /**
         * Get sections.
         *
         * @return array
         */
        public function get_sections() {
            $sections = array(
                '' => __( 'Settings', 'wc-booking-extras' ),
                'log' => __( 'Log', 'wc-booking-extras' ),
                'results' => __( 'Sale Results', 'wc-booking-extras' )
            );

            return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
        }


        /**
         * Get settings array
         *
         * @return array
         */
        public function get_settings() {

            global $current_section;
            $prefix = 'rba_wcbe_';
            $settings = array();
            
            switch ($current_section) {
                case 'log':
                    $settings = array(                              
                            array()
                    );
                    break;
                default:
                    include 'partials/rba-wcbe-settings-main.php';      
            }   

            return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );                   
        }

        /**
         * Output the settings
         */
        public function output() {
            global $current_section;

            switch ($current_section) {
                case 'results':
                    include 'partials/rba-wcbe-settings-results.php';
                    break;
                default:
                    $settings = $this->get_settings();
                    WC_Admin_Settings::output_fields( $settings );
            }               
            
        }

        /**
         * Save settings
         *
         * @since 1.0
         */
        public function save() {                    
            $settings = $this->get_settings();

            WC_Admin_Settings::save_fields( $settings );
        }

    }

}


return new RBA_WCBE_WC_Settings();