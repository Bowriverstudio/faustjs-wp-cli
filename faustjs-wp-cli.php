<?php
/**
 * Plugin Name: WP CLI for FaustJS
 * Plugin URI: https://github.com/Bowriverstudio/faustjs-wp-cli
 * GitHub Plugin URI: https://github.com/Bowriverstudio/faustjs-wp-cli
 * Description: Adds developer support for Faustjs via WP CLI
 * Author: Maurice Tadros
 * Author URI: http://www.bowriverstudio.com
 * Version: 1.0.1
 * Text Domain: faustjs-wp-cli
 * Domain Path: /languages/
 * Requires PHP: 7.1
 * License: GPL-3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace {

	use function WPE\FaustWP\Settings\faustwp_get_settings;
	use function WPE\FaustWP\Settings\faustwp_update_setting;

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( defined( 'WP_CLI' ) && WP_CLI ) {

		/**
		 * Manage FaustJS Framework via cli.
		 */
		class Faustjs_Wp_Cli {
			/**
			 * Updates the FaustJS Settings.
			 *
			 * @param Array $args Arguments in array format.
 			 * @param Array $assoc_args Key value arguments stored in associated array format.
			 * ## EXAMPLES
			 *
			 *  $ wp faustjs update_setting --setting="frontend_uri" --value="http://localhost:3000"
			 *
			 * @subcommand update_setting
			 *
			 * @since 1.0.0
			 *
			 */
			public function update_setting( $args, $assoc_args ) {

				// Sanity Check - ensure we have the required variables.
				if( !$assoc_args['setting'] || !$assoc_args['value'] ) {
					WP_CLI::error_multi_line( ['Error found!', 'setting and value are both required',' ie: wp faustjs update_setting --setting="frontend_uri" --value="http://localhost:3000"'] ); // Displays multi-line error in red box. Doesn't exit script. Ignores --quiet but looses formating.
					WP_CLI::halt( 200 ); 
				}

				// Ensure Setting exists.
				$settings = faustwp_get_settings();
				if( ! array_key_exists($assoc_args['setting'], $settings)){
					WP_CLI::error_multi_line( ['Error found!', 'setting not in Faustjs',' ie: wp faustjs settings'] ); // Displays multi-line error in red box. Doesn't exit script. Ignores --quiet but looses formating.
					WP_CLI::halt( 200 ); 
				}

				// Update Setting
				faustwp_update_setting($assoc_args['setting'], $assoc_args['value']);

				// Print Results
				$this->settings();
			}

			/**
			 * Display faustjs settings
			 *
			 * ## Constants
			 *
			 * ## EXAMPLES
			 *
			 *  $ wp faustjs settings
			 *
			 * @subcommand settings
			 *
			 * @since 2.0.0
			 *
			 */
			public function settings()
			{
				$fields = array('name', 'value');

				$settings = faustwp_get_settings();
				foreach($settings as $setting => $value){
					$item = array();
					$item['name'] = $setting;
					$item['value'] = $value;
					$items[] = $item;
				}

				// var_dump(faustwp_get_settings());
				WP_CLI\Utils\format_items('table', $items, $fields);
			}
		}
		WP_CLI::add_command( 'faustjs', 'Faustjs_Wp_Cli' );
	}
}