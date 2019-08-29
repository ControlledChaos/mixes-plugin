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
         * Taxonomy: Recipe Type
         */

		// Types labels.
        $labels = [
            'name'                       => __( 'Types', 'mixes-plugin' ),
            'singular_name'              => __( 'Recipe Type', 'mixes-plugin' ),
            'menu_name'                  => __( 'Types', 'mixes-plugin' ),
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

		// Types options.
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

        // Register recipe type.
        register_taxonomy(
            'recipe_type',
            [
                'recipe'
            ],
            $options
		);

		/**
         * Taxonomy: Liquor Type
         */

		// Liquors labels.
        $labels = [
            'name'                       => __( 'Liquors', 'mixes-plugin' ),
            'singular_name'              => __( 'Liquor', 'mixes-plugin' ),
            'menu_name'                  => __( 'Liquors', 'mixes-plugin' ),
            'all_items'                  => __( 'All Liquors', 'mixes-plugin' ),
            'edit_item'                  => __( 'Edit Liquor', 'mixes-plugin' ),
            'view_item'                  => __( 'View Liquor', 'mixes-plugin' ),
            'update_item'                => __( 'Update Liquor', 'mixes-plugin' ),
            'add_new_item'               => __( 'Add New Liquor', 'mixes-plugin' ),
            'new_item_name'              => __( 'New Liquor', 'mixes-plugin' ),
            'parent_item'                => __( 'Parent Liquor', 'mixes-plugin' ),
            'parent_item_colon'          => __( 'Parent Liquor', 'mixes-plugin' ),
            'popular_items'              => __( 'Popular Liquors', 'mixes-plugin' ),
            'separate_items_with_commas' => __( 'Separate Liquors with commas', 'mixes-plugin' ),
            'add_or_remove_items'        => __( 'Add or Remove Liquors', 'mixes-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Liquors', 'mixes-plugin' ),
            'not_found'                  => __( 'No Liquors Found', 'mixes-plugin' ),
            'no_terms'                   => __( 'No Liquors', 'mixes-plugin' ),
            'items_list_navigation'      => __( 'Liquors List Navigation', 'mixes-plugin' ),
            'items_list'                 => __( 'Liquors List', 'mixes-plugin' )
        ];

		// Liquors options.
        $options = [
            'label'              => __( 'Liquors', 'mixes-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => 'Liquors',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'liquors',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'liquors',
            'show_in_quick_edit' => true
        ];

        // Register recipe liquor.
        register_taxonomy(
            'liquor_type',
            [
                'recipe'
            ],
            $options
		);

		/**
         * Taxonomy: Recipe Occasion
         */

		// Occasions labels.
        $labels = [
            'name'                       => __( 'Occasions', 'mixes-plugin' ),
            'singular_name'              => __( 'Occasion', 'mixes-plugin' ),
            'menu_name'                  => __( 'Occasions', 'mixes-plugin' ),
            'all_items'                  => __( 'All Occasions', 'mixes-plugin' ),
            'edit_item'                  => __( 'Edit Occasion', 'mixes-plugin' ),
            'view_item'                  => __( 'View Occasion', 'mixes-plugin' ),
            'update_item'                => __( 'Update Occasion', 'mixes-plugin' ),
            'add_new_item'               => __( 'Add New Occasion', 'mixes-plugin' ),
            'new_item_name'              => __( 'New Occasion', 'mixes-plugin' ),
            'parent_item'                => __( 'Parent Occasion', 'mixes-plugin' ),
            'parent_item_colon'          => __( 'Parent Occasion', 'mixes-plugin' ),
            'popular_items'              => __( 'Popular Occasions', 'mixes-plugin' ),
            'separate_items_with_commas' => __( 'Separate Occasions with commas', 'mixes-plugin' ),
            'add_or_remove_items'        => __( 'Add or Remove Occasions', 'mixes-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Occasions', 'mixes-plugin' ),
            'not_found'                  => __( 'No Occasions Found', 'mixes-plugin' ),
            'no_terms'                   => __( 'No Occasions', 'mixes-plugin' ),
            'items_list_navigation'      => __( 'Occasions List Navigation', 'mixes-plugin' ),
            'items_list'                 => __( 'Occasions List', 'mixes-plugin' )
        ];

		// Occasions options.
        $options = [
            'label'              => __( 'Occasions', 'mixes-plugin' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => true,
            'label'              => 'Occasions',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'occasions',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'occasions',
            'show_in_quick_edit' => true
        ];

        // Register recipe occasion.
        register_taxonomy(
            'recipe_occasion',
            [
                'recipe'
            ],
            $options
		);

    }

}

// Run the class.
$mmp_taxes = new Taxes_Register;