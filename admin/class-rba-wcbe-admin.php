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
class RBA_WCBE_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in P3k_Galactica_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The P3k_Galactica_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rba-wcbe-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in P3k_Galactica_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The P3k_Galactica_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rba-wcbe-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
    * Load dependencies for additional WooCommerce settings
    *
    * @since    0.1.0
    * @access   private
    */
    public function p3kg_add_settings( $settings ) {
        $settings[] = include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-rba-wcbe-wc-settings.php';        

        return $settings;
    }

}