<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://bmkg.vercel.com
 * @since      1.0.2
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.2
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/includes
 * @author     Helmi <pm2monit@gmail.com>
 */
class Prakiraan_Cuaca_Dan_Info_Gempa {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		if ( defined( 'PRAKIRAAN_CUACA_DAN_INFO_GEMPA_VERSION' ) ) {
			$this->version = '1.0.2';
		} else {
			$this->version = '1.0.2';
		}
		$this->plugin_name = 'prakiraan-cuaca-dan-info-gempa';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-prakiraan-cuaca-dan-info-gempa-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-prakiraan-cuaca-dan-info-gempa-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-prakiraan-cuaca-dan-info-gempa-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-prakiraan-cuaca-dan-info-gempa-public.php';

		$this->loader = new Prakiraan_Cuaca_Dan_Info_Gempa_Loader();

	}

	private function set_locale() {

		$plugin_i18n = new Prakiraan_Cuaca_Dan_Info_Gempa_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		$plugin_admin = new Prakiraan_Cuaca_Dan_Info_Gempa_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	private function define_public_hooks() {

		$plugin_public = new Prakiraan_Cuaca_Dan_Info_Gempa_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		add_shortcode('prakiraan-cuaca', array($plugin_public, 'p_cuaca'));

	}


	// Add Shortcode
	

	// add_shortcode('prakiraan_cuaca', 'p_cuaca');

	
	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	
	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
