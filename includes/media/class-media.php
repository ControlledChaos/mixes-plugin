<?php
/**
 * Media functionality.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Includes\Media
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Includes\Media;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Media functionality.
 *
 * @since  1.0.0
 * @access public
 */
class Media {

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

			// Get class dependencies
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

    /**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Add categories and tags to media library items.
		add_action( 'init' , [ $this, 'media_taxonomies' ] );

		// Add image sizes.
		add_action( 'init', [ $this, 'image_sizes' ] );

		// Add Fancybox data attributes to image links in the content.
		add_filter( 'the_content', [ $this, 'fancybox_single_images' ], 2 );
		add_filter( 'acf_the_content', [ $this, 'fancybox_single_images' ], 2 );

		// Default add single image link.
        add_action( 'admin_init', [ $this, 'image_link' ], 10 );

        // Default add gallery images link.
        add_filter( 'media_view_settings', [ $this, 'gallery_link' ], 10 );

		// Add featured images to RSS feeds.
		add_filter( 'the_excerpt_rss', [ $this, 'rss_featured_images' ] );
		add_filter( 'the_content_feed', [ $this, 'rss_featured_images' ] );

	}

	/**
	 * Get class dependencies
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Replace WP gallery shortcode if Fancybox option is used.
		$fancybox = get_option( 'mmp_enqueue_fancybox_script' );

		if ( $fancybox ) {
			require_once MMP_PATH . 'includes/media/class-gallery-shortcode.php';
		}

	}

	/**
	 * Add taxonomies to media library
	 *
	 * Includes categories and tags for attachment post type.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function media_taxonomies() {

		// Add standard categories.
		register_taxonomy_for_object_type( 'category', 'attachment' );

		// Add standard tags.
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

	}

	/**
	 * Add image sizes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function image_sizes() {

		// For link embedding and sharing on social sites.
		add_image_size( __( 'meta-image', 'mixes-plugin' ), 1280, 720, true );

		/**
		 * For use as featured image in admin columns.
		 *
		 * @see admin/class-admin-pages.php
		 */
		add_image_size( __( 'column-thumbnail', 'mixes-plugin' ), 48, 48, true );

	}

	/**
	 * Add Fancybox data attributes to image links in the content.
	 *
	 * Note: As of this comment on June 22, 2018 this function only works with
	 * images in the classic editor, not with the new block editor images.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param string $content
	 * @return string
	 *
	 * @todo Review this after WordPress 5.0 is released or if/when the new block
	 *       editor adds the option to link to the full size image.
	 */
	public function fancybox_single_images( $content ) {

		// Get the post opbject.
		$post = get_post();

		if ( get_option( 'mmp_enqueue_fancybox_script' ) ) {

			global $post;
			$pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
			$replacement = '<a$1href=$2$3.$4$5 data-fancybox data-type="image"$6>';
			$content = preg_replace( $pattern, $replacement, $content );
			return $content;

		}

		return $content;

	}

	/**
     * Default link when adding an image.
	 *
	 * Note: As of this comment on June 21, 2018 the `image_default_link_type`
	 * option only works with the classic editor, not with the new block editor.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
	 *
	 * @todo Review this after WordPress 5.0 is released or if/when the new block
	 *       editor adds the option to link to the full size image.
     */
    public function image_link() {

        $image_set = get_option( 'image_default_link_type' );

        if ( $image_set !== 'file' ) { // Could be 'none'
            update_option( 'image_default_link_type', 'file' );
        }

    }

    /**
     * Default gallery images link.
	 *
	 * Note: As of this comment on June 21, 2018 this function only works with
	 * galleries in the classic editor, not with the new block editor galleries.
     *
     * @since  1.0.0
	 * @access public
	 * @return mixed[] Modifies the WordPress gallery shortcode.
	 *
	 * @todo Review this after WordPress 5.0 is released or if/when the new block
	 *       editor adds the option to link to the full size images.
     */
    public function gallery_link( $settings ) {

        $settings['galleryDefaults']['link'] = 'file';

        return $settings;
    }

	/**
	 * Add featured images to RSS feeds.
	 *
	 * @since  1.0.0
	 * @access public
	 * @global object post The post object for the current post.
	 * @param  string $content Gets the current post content.
	 * @return string $content Returns the filered current post content.
	 */
	public function rss_featured_images( $content ) {

		// Get the post object.
		global $post;

		// Apply a filter for conditional image sizes.
		$size = apply_filters( 'mmp_rss_featured_image_size', 'medium' );

		/**
		 * Use this layout only if the post has a featured image.
		 *
		 * The image and the content/excerpt are in separate <div> tags
		 * to get the content below the image.
		 */
		if ( has_post_thumbnail( $post->ID ) ) {
			$content = sprintf( '<div>%1s</div><div>%2s</div>', get_the_post_thumbnail( $post->ID, $size, [] ), $content );
		}

		// Return the filered post content.
		return $content;
	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_media() {

	return Media::instance();

}

// Run an instance of the class.
mmp_media();