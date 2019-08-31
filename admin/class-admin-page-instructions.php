<?php
/**
 * Page for website instructions.
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
 * Settings page for site instructions.
 *
 * @since  1.0.0
 * @access public
 */
class Admin_Page_Instructions {

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

		// Add the page to the admin menu.
		add_action( 'admin_menu', [ $this, 'settings_page' ] );

	}

	/**
	 * Add a page for site settings.
	 *
	 * If the Advanced Custom Fields Pro plugin is active then
	 * an ACF options page and ACF fields will be used. If not
	 * then a default WordPress/ClassicPress admin page and the
	 * Settings API will be used.
	 *
	 * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
	 *
	 * @since  1.0.0
	 * @access public
	 * @global string pagenow Gets the current admin screen URL.
	 * @return void
	 *
	 * @link   https://www.advancedcustomfields.com/resources/acf_add_options_page/
	 * @link   https://developer.wordpress.org/reference/functions/add_menu_page/
	 * @link   https://developer.wordpress.org/reference/functions/add_submenu_page/
	 *
	 * @todo  Think about whether this is a good idea. Maybe it's
	 *        better to simply provide a sample ACF page. ACF is
	 *        certainly faster for further development but do we
	 *        want the dependency?
	 */
    public function settings_page() {

		$this->page_help_section = add_menu_page(
			__( 'Website Instructions', 'mixes-plugin' ),
			__( 'Instructions', 'mixes-plugin' ),
			'manage_options',
			MMP_ADMIN_SLUG . '-instructions',
			[ $this, 'page_output' ],
			'welcome-learn-more',
			3
		);

		// Add content to the Help tab.
		add_action( 'load-' . $this->page_help_section, [ $this, 'page_help_section' ] );

	}

	/**
     * Output for the Instructions page contextual help tab.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function page_help_section() {

		// Add to the plugin settings pages.
		$screen = get_current_screen();
		if ( $screen->id != $this->page_help_section ) {
			return;
		}

		// Inline Scripts.
		$screen->add_help_tab( [
			'id'       => 'inline_scripts',
			'title'    => __( 'Instructions Posts', 'mixes-plugin' ),
			'content'  => null,
			'callback' => [ $this, 'help_instructions_post_type' ]
		] );

		// Add a help sidebar.
		$screen->set_help_sidebar(
			$this->page_help_section_sidebar()
		);

	}

	/**
     * Get ACF Notice help content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
     */
	public function help_instructions_post_type() {

		// include_once MMP_PATH . 'admin/partials/help/help-instructions-post-type.php';

	}

	/**
     * Get Instructions page contextual tab sidebar content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function page_help_section_sidebar() {

		$html = '';

		return $html;

	}

	/**
	 * Instructions page output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
    public function page_output() {

		// Get the partial that contains the settings page HTML.
		require MMP_PATH . 'admin/partials/admin-page-instructions.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_admin_page_instructions() {

	return Admin_Page_Instructions::instance();

}

// Run an instance of the class.
mmp_admin_page_instructions();