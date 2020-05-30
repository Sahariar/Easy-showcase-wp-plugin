<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sahariarkabir.com/
 * @since      1.0.0
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/includes
 * @author     Sahariar Kabir <sahariark@gmail.com>
 */
class Easy_Work_Showcase_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-work-showcase',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
