<?php
/**
 * Plugin activation class.
 *
 * This file must not be namespaced.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin activation class.
 *
 * @since  1.0.0
 * @access public
 */
class Controlled_Chaos_Activate {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Activation function
			$instance->activate();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void Constructor method is empty.
	 *              Change to `self` if used.
	 */
	public function __construct() {}

	/**
	 * Fired during plugin activation.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function activate() {

		// Update image sizes.
		set_post_thumbnail_size( 1280, 720, true );
		update_option( 'thumbnail_size_w', 180 );
		update_option( 'thumbnail_size_h', 180 );
		update_option( 'thumbnail_crop', 1 ); // Hard crop.
		update_option( 'medium_size_w', 320 );
		update_option( 'medium_size_h', 240 );
		update_option( 'medium_crop', 1 );
		update_option( 'large_size_w', 960 );
		update_option( 'large_size_h', 720 );
		update_option( 'large_crop', 1 );
	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_activate() {

	return Controlled_Chaos_Activate::instance();

}