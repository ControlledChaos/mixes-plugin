<?php
/**
 * Register types.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace Mixes_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register types.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxes_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Type: Sample taxonomy (Type).
         *
         * Renaming:
         * Search case "Type" and replace with your post type singular name.
         * Search case "Types" and replace with your post type plural name.
         * Search case "mmp_taxonomy" and replace with your taxonomy database name.
         * Search case "types" and replace with your taxonomy permalink slug.
         */

        $labels = [
            'name'                       => __( 'Types', 'mixes-plugin' ),
            'singular_name'              => __( 'Type', 'mixes-plugin' ),
            'menu_name'                  => __( 'Recipe Types', 'mixes-plugin' ),
            'all_items'                  => __( 'All Types', 'mixes-plugin' ),
            'edit_item'                  => __( 'Edit Type', 'mixes-plugin' ),
            'view_item'                  => __( 'View Type', 'mixes-plugin' ),
            'update_item'                => __( 'Update Type', 'mixes-plugin' ),
            'add_new_item'               => __( 'Add New Type', 'mixes-plugin' ),
            'new_item_name'              => __( 'New Type', 'mixes-plugin' ),
            'parent_item'                => __( 'Parent Type', 'mixes-plugin' ),
            'parent_item_colon'          => __( 'Parent Type', 'mixes-plugin' ),
            'popular_items'              => __( 'Popular Types', 'mixes-plugin' ),
            'separate_items_with_commas' => __( 'Separate Types with commas', 'mixes-plugin' ),
            'add_or_remove_items'        => __( 'Add or Remove Types', 'mixes-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Types', 'mixes-plugin' ),
            'not_found'                  => __( 'No Types Found', 'mixes-plugin' ),
            'no_terms'                   => __( 'No Types', 'mixes-plugin' ),
            'items_list_navigation'      => __( 'Types List Navigation', 'mixes-plugin' ),
            'items_list'                 => __( 'Types List', 'mixes-plugin' )
        ];

        $options = [
            'label'              => __( 'Types', 'mixes-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => 'Types',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'types',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'types',
            'show_in_quick_edit' => true
        ];

        /**
         * Register the taxonomy
         */
        register_taxonomy(
            'recipe_types',
            [
                'recipe' // Change to your post type name.
            ],
            $options
        );

    }

}

// Run the class.
// $mmp_taxes = new Taxes_Register;