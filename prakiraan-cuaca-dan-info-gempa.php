<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bmkg.vercel.com
 * @since             1.0.3
 * @package           Prakiraan_Cuaca_Dan_Info_Gempa
 *
 * @wordpress-plugin
 * Plugin Name:       Prakiraan cuaca
 * Plugin URI:        https://webflazz.com
 * Description:       Prakiraan cuaca 34 provinsi 3 harian dan info gempa terkini, sumber BMKG sortcode [prakiraan_cuaca].
 * Version:           1.0.3
 * Author:            Helmi
 * Author URI:        https://bmkg.vercel.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       prakiraan-cuaca-dan-info-gempa
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.3 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PRAKIRAAN_CUACA_DAN_INFO_GEMPA_VERSION', '1.0.3' );

define( 'PRAKIRAAN_CUACA_URL', plugin_dir_url(__FILE__) );
define( 'PRAKIRAAN_CUACA_PATH', plugin_dir_path(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prakiraan-cuaca-dan-info-gempa-activator.php
 */
function activate_prakiraan_cuaca_dan_info_gempa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prakiraan-cuaca-dan-info-gempa-activator.php';
	Prakiraan_Cuaca_Dan_Info_Gempa_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prakiraan-cuaca-dan-info-gempa-deactivator.php
 */
function deactivate_prakiraan_cuaca_dan_info_gempa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prakiraan-cuaca-dan-info-gempa-deactivator.php';
	Prakiraan_Cuaca_Dan_Info_Gempa_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_prakiraan_cuaca_dan_info_gempa' );
register_deactivation_hook( __FILE__, 'deactivate_prakiraan_cuaca_dan_info_gempa' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-prakiraan-cuaca-dan-info-gempa.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.3
 */

function run_prakiraan_cuaca_dan_info_gempa() {

	$plugin = new Prakiraan_Cuaca_Dan_Info_Gempa();
	$plugin->run();

}
run_prakiraan_cuaca_dan_info_gempa();
