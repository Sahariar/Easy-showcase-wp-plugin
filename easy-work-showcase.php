<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sahariarkabir.com/
 * @since             1.0.0
 * @package           Easy_Work_Showcase
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Work Showcase
 * Plugin URI:        https://sahariarkabir.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sahariar Kabir
 * Author URI:        https://sahariarkabir.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-work-showcase
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
define( 'EASY_WORK_SHOWCASE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-work-showcase-activator.php
 */
function activate_easy_work_showcase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-work-showcase-activator.php';
	Easy_Work_Showcase_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-work-showcase-deactivator.php
 */
function deactivate_easy_work_showcase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-work-showcase-deactivator.php';
	Easy_Work_Showcase_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_easy_work_showcase' );
register_deactivation_hook( __FILE__, 'deactivate_easy_work_showcase' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-work-showcase.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_work_showcase() {

	$plugin = new Easy_Work_Showcase();
	$plugin->run();

}
run_easy_work_showcase();
