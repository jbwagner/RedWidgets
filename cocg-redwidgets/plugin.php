<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * @package   RedWidgets
 * @author    COCG
 * @copyright 2014 COCG
 *
 * @wordpress-plugin
 * Plugin Name:       RedWidgets
 * Plugin URI:        http://www.cocg.co/
 * Description:       Custom widgets by COCG
 * Version:           1.0.0
 * Author:            COCG
 * Author URI:        http://www.cocg.co/
 * Text Domain:       cocg-red-widgets
 * Domain Path:       /lang
 */
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

class Red_Widgets {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Instatiates the plugin itself and the widgets.
	 */
	public function __construct() {

		// load plugin text domain
		add_action( 'init', array( $this, 'cocg_textdomain' ) );

		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		
		// Instatiate all widgets
		add_action( 'widgets_init', create_function( '', 'register_widget("Red_Widgets_Callout");' ) );

	} // end constructor

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Fired when the plugin is activated.
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here
	} // end activate

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here
	} // end deactivate

} // end class

$widgets = array(
                  'callout/callout.php'
                );

foreach ( $widgets as $widget ) {
  include_once( plugin_dir_path( __FILE__ ) . $widget );
}

$Red_Widgets = new Red_Widgets();