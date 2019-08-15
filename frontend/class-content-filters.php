<?php
/**
 * The frontend content filters for post types
 *
 * @package    Mixes_Plugin
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The frontend content filters for post types
 *
 * @since  1.0.0
 * @access public
 */
class Content_Filters {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Filter the cabins for sale post type singular content.
		add_filter( 'the_content', [ $this, 'recipe_singular_filter' ], 10, 2 );

		// Filter the cabins for sale post type archive content.
		add_filter( 'the_content', [ $this, 'recipe_archive_filter' ], 10, 2 );

	}

	/**
	 * Filter the cabins for sale post type singular content
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $content
	 * @return mixed Returns the custom HTML output.
	 */
	public function recipe_singular_filter( $content ) {

		// Return the default content if not cabins for sale.
		if ( ! is_singular( 'recipe' ) ) {
			return $content;
		}

		ob_start();

		// Include the snippet content.
		include MMP_PATH . 'frontend/partials/singular-recipe.php';

		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

	}

	/**
	 * Filter the cabins for sale post type archive content
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $content
	 * @return mixed Returns the custom HTML output.
	 */
	public function recipe_archive_filter( $content ) {

		// Return the default content if not cabins for sale.
		if ( ! ( is_post_type_archive( 'recipe' ) || is_tax( 'recipe_types' ) ) ) {
			return $content;
		}

		ob_start();

		// Include the snippet content.
		include MMP_PATH . 'frontend/partials/archive-recipe.php';

		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

	}

}

$recipe_content = new Content_Filters();