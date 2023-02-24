<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://agrivirtual.eu
 * @since             1.0.0
 * @package           Arvesta_Api
 *
 * @wordpress-plugin
 * Plugin Name:       Arvesta API
 * Plugin URI:        https://agrivirtual.eu
 * Description:       NEED THE ARVESTA CORE - Expose the database entities through the wp-json api 
 * Version:           1.0.0
 * Author:            Remy Chauveau
 * Author URI:        https://agrivirtual.eu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       arvesta-api
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ARVESTA_API_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-arvesta-api-activator.php
 */
function activate_arvesta_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-arvesta-api-activator.php';
	Arvesta_Api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-arvesta-api-deactivator.php
 */
function deactivate_arvesta_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-arvesta-api-deactivator.php';
	Arvesta_Api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_arvesta_api' );
register_deactivation_hook( __FILE__, 'deactivate_arvesta_api' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-arvesta-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_arvesta_api() {

	$plugin = new Arvesta_Api();
	$plugin->run();

}
run_arvesta_api();
