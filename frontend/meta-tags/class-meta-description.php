<?php
/**
 * Description meta tag.
 *
 * Conditionally gets information or content from the current page.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Frontend\Meta_Tags
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Frontend\Meta_Tags;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Description meta tag.
 *
 * @since  1.0.0
 * @access public
 */
class Meta_Description {

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

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Add description to the meta tag.
		add_action( 'mmp_meta_description_tag', [ $this, 'meta_description' ] );

	}

	/**
	 * Description meta tag.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function meta_description() {

		// Bail on 404 error pages because of non-object errors.
		if ( is_404() ) {
			return;
		}

		// Get the tagline from Setting > General.
		$tagline = get_bloginfo( 'description' );

		// Check if a tagline has been entered else return an empty string.
		if ( ! empty( $tagline ) ) {
			$tagline = $tagline;
		} else {
			$tagline = '';
		}

		// Conditional variables - ACF or not.
		if ( mmp_acf_pro() ) {
			$recipe_summary = get_field( 'recipe_summary' );
		} else {
			$recipe_summary = __( 'Another fine recipe from ', 'mixes-plugin' ) . get_bloginfo( 'name' );
		}

		if ( is_front_page() ) {
			$description = $tagline;
		} elseif ( is_home() && mmp_acf_pro() ) {
			$description = $tagline;
		} elseif ( is_singular( 'recipe' ) ) {
			$description = $recipe_summary;
		} elseif ( has_excerpt() ) {
			$description = get_the_excerpt();
		} else {
			$description = $tagline;
		}

		// Echo the conditional description in the meta tag.
		echo esc_html( $description );

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_meta_description() {

	return Meta_Description::instance();

}

// Run an instance of the class.
mmp_meta_description();