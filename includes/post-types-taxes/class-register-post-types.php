<?php
/**
 * Register post types.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 */

namespace Mixes_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register Recipe types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register Recipe types.
     *
     * Note for WordPress 5.0 or greater:
     * If you want your post type to adopt the block edit_form_image_editor
     * rather than using the classic editor then set `show_in_rest` to `true`.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Recipes
         */

        $labels = [
            'name'                  => __( 'Recipes', 'mixes-plugin' ),
            'singular_name'         => __( 'Recipe', 'mixes-plugin' ),
            'menu_name'             => __( 'Recipes', 'mixes-plugin' ),
            'all_items'             => __( 'All Recipes', 'mixes-plugin' ),
            'add_new'               => __( 'Add New', 'mixes-plugin' ),
            'add_new_item'          => __( 'Add New Recipe', 'mixes-plugin' ),
            'edit_item'             => __( 'Edit Recipe', 'mixes-plugin' ),
            'new_item'              => __( 'New Recipe', 'mixes-plugin' ),
            'view_item'             => __( 'View Recipe', 'mixes-plugin' ),
            'view_items'            => __( 'View Recipes', 'mixes-plugin' ),
            'search_items'          => __( 'Search Recipes', 'mixes-plugin' ),
            'not_found'             => __( 'No Recipes Found', 'mixes-plugin' ),
            'not_found_in_trash'    => __( 'No Recipes Found in Trash', 'mixes-plugin' ),
            'parent_item_colon'     => __( 'Parent Recipe', 'mixes-plugin' ),
            'featured_image'        => __( 'Featured image for this Recipe', 'mixes-plugin' ),
            'set_featured_image'    => __( 'Set featured image for this Recipe', 'mixes-plugin' ),
            'remove_featured_image' => __( 'Remove featured image for this Recipe', 'mixes-plugin' ),
            'use_featured_image'    => __( 'Use as featured image for this Recipe', 'mixes-plugin' ),
            'archives'              => __( 'Recipe archives', 'mixes-plugin' ),
            'insert_into_item'      => __( 'Insert into Recipe', 'mixes-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'mixes-plugin' ),
            'filter_items_list'     => __( 'Filter Recipes', 'mixes-plugin' ),
            'items_list_navigation' => __( 'Recipes list navigation', 'mixes-plugin' ),
            'items_list'            => __( 'Recipes List', 'mixes-plugin' ),
            'attributes'            => __( 'Recipe Attributes', 'mixes-plugin' ),
            'parent_item_colon'     => __( 'Parent Recipe', 'mixes-plugin' ),
        ];

        // Apply a filter to labels for customization.
        $labels = apply_filters( 'recipe_labels', $labels );

        $options = [
            'label'               => __( 'Recipes', 'mixes-plugin' ),
            'labels'              => $labels,
            'description'         => __( 'Recipe type description.', 'mixes-plugin' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'recipe_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'recipes',
                'with_front' => true
            ],
            'query_var'           => 'recipe',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-index-card',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
                'category',
                'post_tag',
                'mmp_taxonomy' // Change to your custom taxonomy name.
            ],
        ];

        // Apply a filter to arguments for customization.
        $options = apply_filters( 'recipe_args', $options );

        /**
         * Register the post type
         *
         * Maximum 20 characters, cannot contain capital letters or spaces.
         */
        register_post_type(
            'recipe',
            $options
        );

    }

}

// Run the class.
$recipes = new Post_Types_Register;