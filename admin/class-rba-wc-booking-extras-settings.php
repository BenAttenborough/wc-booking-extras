<?php
/**
 * Extends the WC_Settings_Page class
 *
 * @link        https://github.com/BenAttenborough
 * @since       1.0.0
 *
 * @package    Rba_Wc_Booking_Extras
 * @subpackage Rba_Wc_Booking_Extras/admin
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Rba_Wc_Booking_Extras_Settings' ) ) {
    /**
     * Settings class
     *
     * @since 1.0.0
     */
    class Rba_Wc_Booking_Extras_Settings extends WC_Settings_Page {

        /**
         * Constructor
         * @since  1.0
         */
        public function __construct() {
                
            $this->id    = 'rba-wc-booking-extras';
            $this->label = __( 'Booking Extras', 'rba-wc-booking-extras' );

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
                '' => __( 'Settings', 'rba-wc-booking-extras' ),
                'log' => __( 'Log', 'rba-wc-booking-extras' )
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

            switch ($current_section) {
                case 'log':
                    $settings = array(                              
                            array()
                    );
                    break;
                default:
                     $settings = array(                              
                            array()
                    );                 
            }   

            return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );                   
        }

        /**
         * Output the settings
         */
        public function output() {                  
            $settings = $this->get_settings();

            WC_Admin_Settings::output_fields( $settings );
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

return new Rba_Wc_Booking_Extras_Settings();