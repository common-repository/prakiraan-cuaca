<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bmkg.vercel.com
 * @since      1.0.1
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/admin
 * @author     Helmi <pm2monit@gmail.com>
 */
class Prakiraan_Cuaca_Dan_Info_Gempa_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
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
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Prakiraan_Cuaca_Dan_Info_Gempa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Prakiraan_Cuaca_Dan_Info_Gempa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prakiraan-cuaca-dan-info-gempa-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Prakiraan_Cuaca_Dan_Info_Gempa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Prakiraan_Cuaca_Dan_Info_Gempa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prakiraan-cuaca-dan-info-gempa-admin.js', array( 'jquery' ), $this->version, false );

	}

}
