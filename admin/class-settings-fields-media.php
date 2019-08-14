<?php
/**
 * Settings fields for media options.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Settings fields for media options.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Media {

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
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

        // Media settings.
        add_action( 'admin_init', [ $this, 'settings' ] );

        // Hard crop default image sizes.
        add_action( 'after_setup_theme', [ $this, 'crop' ] );

    }

    /**
	 * Media settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {

        /**
         * Image crop settings.
         */
        add_settings_field( 'mmp_hard_crop_medium', __( 'Medium size crop', 'mixes-plugin' ), [ $this, 'medium_crop' ], 'media', 'default', [ __( 'Crop thumbnail to exact dimensions (normally thumbnails are proportional)', 'mixes-plugin' ) ] );

        add_settings_field( 'mmp_hard_crop_large', __( 'Large size crop', 'mixes-plugin' ), [ $this, 'large_crop' ], 'media', 'default', [ __( 'Crop thumbnail to exact dimensions (normally thumbnails are proportional)', 'mixes-plugin' ) ] );

        register_setting(
            'media',
            'mmp_hard_crop_medium'
        );

        register_setting(
            'media',
            'mmp_hard_crop_large'
        );

        /**
         * Fancybox settings.
         */
        add_settings_section( 'mmp-media-settings', __( 'Fancybox', 'mixes-plugin' ), [ $this, 'fancybox_description' ], 'media' );

        add_settings_field( 'mmp_enqueue_fancybox_script', __( 'Enqueue Fancybox script', 'mixes-plugin' ), [ $this, 'fancybox_script' ], 'media', 'mmp-media-settings', [ __( 'Needed for lightbox functionality.', 'mixes-plugin' ) ] );

        if ( ! current_theme_supports( 'ccd-fancybox' ) ) {
            add_settings_field( 'mmp_enqueue_fancybox_styles', __( 'Enqueue Fancybox styles', 'mixes-plugin' ), [ $this, 'fancybox_styles' ], 'media', 'mmp-media-settings', [ __( 'Leave unchecked to use a custom stylesheet in a theme.', 'mixes-plugin' ) ] );
        }

        register_setting(
            'media',
            'mmp_enqueue_fancybox_script'
        );

        if ( ! current_theme_supports( 'ccd-fancybox' ) ) {
            register_setting(
                'media',
                'mmp_enqueue_fancybox_styles'
            );
        }

    }

    /**
     * Medium crop field.
     *
     * @since  1.0.0
	 * @access public
	 * @return string
     */
    public function medium_crop( $args ) {

        $html = '<p><input type="checkbox" id="mmp_hard_crop_medium" name="mmp_hard_crop_medium" value="1" ' . checked( 1, get_option( 'mmp_hard_crop_medium' ), false ) . '/>';

        $html .= '<label for="mmp_hard_crop_medium"> '  . $args[0] . '</label></p>';

        echo $html;

    }

    /**
     * Large crop field.
     *
     * @since  1.0.0
	 * @access public
	 * @return string
     */
    public function large_crop( $args ) {

        $html = '<p><input type="checkbox" id="mmp_hard_crop_large" name="mmp_hard_crop_large" value="1" ' . checked( 1, get_option( 'mmp_hard_crop_large' ), false ) . '/>';

        $html .= '<label for="mmp_hard_crop_large"> '  . $args[0] . '</label></p>';

        echo $html;

    }

    /**
     * Update crop options.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function crop() {

        if ( get_option( 'mmp_hard_crop_medium' ) ) {
            update_option( 'medium_crop', 1 );
        } else {
            update_option( 'medium_crop', 0 );
        }

        if ( get_option( 'mmp_hard_crop_large' ) ) {
            update_option( 'large_crop', 1 );
        } else {
            update_option( 'large_crop', 0 );
        }

    }

    /**
     * Fancybox settings description.
     *
     * @since  1.0.0
	 * @access public
	 * @return string
     */
    public function fancybox_description() {

        $url  = 'http://fancyapps.com/fancybox/3/';
        $html = sprintf( '<p>%1s <a href="%2s" target="_blank">%3s</a></p>', esc_html__( 'Documentation on the Fancybox website:', 'mixes-plugin' ), esc_url( $url ), $url );

        echo $html;

    }

    /**
     * Fancybox script field.
     *
     * @since  1.0.0
	 * @access public
	 * @return string
     */
    public function fancybox_script( $args ) {

        $html = '<p><input type="checkbox" id="mmp_enqueue_fancybox_script" name="mmp_enqueue_fancybox_script" value="1" ' . checked( 1, get_option( 'mmp_enqueue_fancybox_script' ), false ) . '/>';

        $html .= '<label for="mmp_enqueue_fancybox_script"> '  . $args[0] . '</label></p>';

        echo $html;

    }

    /**
     * Fancybox styles field.
     *
     * @since  1.0.0
	 * @access public
	 * @return string
     */
    public function fancybox_styles( $args ) {

        $html = '<p><input type="checkbox" id="mmp_enqueue_fancybox_styles" name="mmp_enqueue_fancybox_styles" value="1" ' . checked( 1, get_option( 'mmp_enqueue_fancybox_styles' ), false ) . '/>';

        $html .= '<label for="mmp_enqueue_fancybox_styles"> '  . $args[0] . '</label></p>';

        echo $html;

    }

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_settings_fields_media() {

	return Settings_Fields_Media::instance();

}

// Run an instance of the class.
mmp_settings_fields_media();