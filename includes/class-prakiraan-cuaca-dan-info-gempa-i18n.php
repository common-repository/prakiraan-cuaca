<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bmkg.vercel.com
 * @since      1.0.2
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.2
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/includes
 * @author     Helmi <pm2monit@gmail.com>
 */
class Prakiraan_Cuaca_Dan_Info_Gempa_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.2
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'prakiraan-cuaca-dan-info-gempa',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
