<?php
/**
 * Plugin Name: Fields API Debug Bar
 * Plugin URI: https://github.com/sc0ttkclark/wordpress-fields-api-debug-bar
 * Description: WordPress Fields API Debug Bar with Stats
 * Version: 1.0
 * Author: Scott Kingsley Clark
 * Author URI: http://scottkclark.com/
 * License: GPL2+
 * GitHub Plugin URI: https://github.com/sc0ttkclark/wordpress-fields-api-debug-bar
 * GitHub Branch: master
 * Requires WP: 4.4
 */

/**
 * The absolute server path to the fields API directory.
 */
define( 'WP_FIELDS_API_DEBUG_PANEL_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Register panel for Fields API
 *
 * @param array $panels
 *
 * @return array
 */
function _wp_fields_api_add_debug_bar_panel( $panels ) {

	require_once( WP_FIELDS_API_DEBUG_PANEL_DIR . 'classes/class-wp-fields-api-debug-bar-panel.php' );

	$panels[] = WP_Fields_API_Debug_Bar_Panel::factory();

	return $panels;

}
add_filter( 'debug_bar_panels', '_wp_fields_api_add_debug_bar_panel' );
