<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bmkg.vercel.com
 * @since      1.0.1
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/public
 * @author     Helmi <pm2monit@gmail.com>
 */
class Prakiraan_Cuaca_Dan_Info_Gempa_Public {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prakiraan-cuaca-dan-info-gempa-public.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prakiraan-cuaca-dan-info-gempa-public.js', array( 'jquery' ), $this->version, false );
	}

	public function p_cuaca() {


		ob_start();
		include_once PRAKIRAAN_CUACA_PATH . 'public/partials/prakiraan-cuaca-dan-info-gempa-public-display.php';
		$template = ob_get_contents();
		ob_end_clean();
		return $template;
	}

}
