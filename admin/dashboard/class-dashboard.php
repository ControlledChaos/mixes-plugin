<?php
/**
 * Dashboard functionality.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin\Dashboard
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin\Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Dashboard functionality.
 *
 * @since  1.0.0
 * @access public
 */
class Dashboard {

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

            // Require the class files.
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

        // "At a Glance" dashboard widget.
        add_action( 'dashboard_glance_items', [ $this, 'at_glance' ] );

        // Remove metaboxes.
        add_action( 'wp_dashboard_setup', [ $this, 'metaboxes' ] );

        // Remove contextual help content.
        add_action( 'admin_head', [ $this, 'remove_help' ] );

        // Enqueue dashboard stylesheet.
        add_action( 'admin_enqueue_scripts', [ $this, 'styles' ] );

    }

    /**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

        // Get the welcome panel class.
        require MMP_PATH . 'admin/dashboard/class-welcome.php';

    }

    /**
     * Add custom post types to "At a Glance" dashboard widget.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function at_glance() {

        // Post type query arguments.
        $args       = [
            'public'   => true,
            '_builtin' => false
        ];

        // The type of output to return, either 'names' or 'objects'.
        $output     = 'object';

        // The operator (and/or) to use with multiple $args.
        $operator   = 'and';

        // Get post types according to above.
        $post_types = get_post_types( $args, $output, $operator );

        // Prepare an entry for each post type mathing the query.
        foreach ( $post_types as $post_type ) {

            // Count the number of posts.
            $count  = wp_count_posts( $post_type->name );

            // Get the number of published posts.
            $number = number_format_i18n( $count->publish );

            // Get the plural or single name based on the count.
            $name   = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $count->publish ) );

            // Supply an edit link if the user can edit posts.
            if ( current_user_can( 'edit_posts' ) ) {
                echo sprintf(
                    '<li class="post-count %1s-count"><a href="edit.php?post_type=%2s">%3s %4s</a></li>',
                    $post_type->name,
                    $post_type->name,
                    $number,
                    $name
                );

            // Otherwise just the count and post type name.
            } else {
                echo sprintf(
                    '<li class="post-count %1s-count">%2s %3s</li>',
                    $post_type->name,
                    $number,
                    $name
                );

            }
        }

    }

    /**
     * Remove Dashboard metaboxes.
     *
     * Check for the Advanced Custom Fields PRO plugin, or the Options Page
	 * addon for free ACF. Use ACF options from the ACF 'Site Settings' page,
     * otherwise use the options from the standard 'Site Settings' page.
     *
     * @since  1.0.0
	 * @access public
     * @global array wp_meta_boxes The metaboxes array holds all the widgets for wp-admin.
	 * @return void
     */
    public function metaboxes() {

		global $wp_meta_boxes;

		// Hide the WordPress News widget.
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );

		// Hide the ClassicPress Petitions widget.
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_petitions'] );

		// Hide Quick Draft (QuickPress) widget.
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );

		// Hide At a Glance widget.
		unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );

		// Hide Activity widget.
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

    }

    /**
     * Remove contextual help content.
     *
     * Much of the default help content does not apply to
     * the cleaned up Dashboard so we'll remove it.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function remove_help() {

        // Get the screen ID to target the Dashboard.
        $screen = get_current_screen();

        // Bail if not on the Dashboard screen.
        if ( $screen->id != 'dashboard' ) {
			return;
		}

        // Remove individual content tabs.
        $screen->remove_help_tab( 'overview' );
        $screen->remove_help_tab( 'help-content' );
        $screen->remove_help_tab( 'help-layout' );
        $screen->remove_help_tab( 'help-navigation' );

        // Remove the help sidebar.
        $screen->set_help_sidebar(
			null
		);

    }

    /**
     * The dashboard widget contextual tab sidebar content.
     *
     * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since      1.0.0
     */
    public function help_dashboard_sidebar() {

        $html  = sprintf(
            '<h4>%1s %2s</h4>',
            __( 'Custom Dashboard for', 'mixes-plugin' ),
             get_bloginfo( 'name' )
        );

        $html .= '<hr />';

        $html .= sprintf(
            '<p>%1s <a href="%2s">%3s</a></p>',
            __( 'Customize your' ),
            esc_url( 'http://localhost/controlledchaos/wp-admin/index.php?page=' . MMP_ADMIN_SLUG . '-settings' ),
            __( 'Dashboard Settings' )
        );

		return $html;

	}

    /**
	 * Enqueue dashboard stylesheet.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function styles() {

        // Get the screen ID to target the Dashboard.
        $screen = get_current_screen();

        // Enqueue only on the Dashboard screen.
        if ( $screen->id == 'dashboard' ) {
            wp_enqueue_style( MMP_ADMIN_SLUG . '-dashboard', MMP_URL .  'admin/dashboard/assets/css/dashboard.min.css', [], null, 'screen' );
        }

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_dashboard() {

	return Dashboard::instance();

}

// Run an instance of the class.
mmp_dashboard();