<?php
/**
 * Custom welcome panel output.
 *
 * Provided are several widget areas and hooks for adding content.
 * The `do_action` hooks are named and placed to be similar to the
 * before and after pseudoelements in CSS.
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

// Get the current user name for the greeting.
$current_user = wp_get_current_user();
$user_name    = $current_user->display_name;

// Add a filterable description.
$about_desc = apply_filters( 'mixes_welcome_about', __( 'Following are some handy links to help you publish content and manage the website.', 'mixes-plugin' ) );

// Get pages by slug.
$merch_page = get_page_by_path( 'merch' );
$search_page = get_page_by_path( 'search' );
$about_page = get_page_by_path( 'about' );
$contact_page = get_page_by_path( 'contact' );

if ( $search_page ) {
    $search_link   = admin_url( 'post.php?post=' . $search_page->ID . '&action=edit' );
} else {
    $search_link = '';
}

if ( $about_page ) {
    $about_link   = admin_url( 'post.php?post=' . $about_page->ID . '&action=edit' );
} else {
    $about_link = '';
}

if ( $merch_page ) {
    $merch_link   = admin_url( 'post.php?post=' . $merch_page->ID . '&action=edit' );
} else {
    $merch_link = '';
}

if ( $contact_page ) {
    $contact_link   = admin_url( 'post.php?post=' . $contact_page->ID . '&action=edit' );
} else {
    $contact_link = '';
} ?>
<?php /* echo sprintf(
	'<h2>%1s %2s.</h2>',
	esc_html__( 'Welcome,', 'mixes-plugin' ),
	$user_name
); */ ?>
<p class="description about-description"><?php echo $about_desc; ?></p>
<div class="mixes-dashboard-summary">
    <?php // wp_dashboard_right_now(); ?>
</div>
<?php
if ( has_header_image() ) {
	// the_header_image_tag();
} ?>
<div class="mixes-dashboard-post-managment">
    <header class="mixes-dashboard-section-header">
        <h3><?php _e( 'Manage Content', 'mixes-plugin' ); ?></h3>
	</header>
    <ul class="mixes-dashboard-post-type-actions">
        <li>
            <h4><?php _e( 'Recipes', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-post-type-actions-icon recipes-icon"><span class="dashicons dashicons-index-card"></span></div>
            <p>
                <a href="<?php echo admin_url( 'post-new.php?post_type=recipe' ); ?>"><?php _e( 'Add New', 'mixes-plugin' ); ?></a>
                <a href="<?php echo admin_url( 'edit.php?post_type=recipe' ); ?>"><?php _e( 'View List', 'mixes-plugin' ); ?></a>
            </p>
        </li>
        <li>
            <h4><?php _e( 'Blog Posts', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-post-type-actions-icon posts-icon"><span class="dashicons dashicons-admin-post"></span></div>
            <p>
                <a href="<?php echo admin_url( 'post-new.php' ); ?>"><?php _e( 'Add New', 'mixes-plugin' ); ?></a>
                <a href="<?php echo admin_url( 'edit.php' ); ?>"><?php _e( 'View List', 'mixes-plugin' ); ?></a>
            </p>
		</li>
		<li>
            <h4><?php _e( 'Media', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon front-icon"><span class="dashicons dashicons-format-image"></span></div>
            <p>
                <a href="<?php echo admin_url( 'media-new.php' ); ?>"><?php _e( 'Add New', 'mixes-plugin' ); ?></a>
                <a href="<?php echo admin_url( 'upload.php' ); ?>"><?php _e( 'Manage', 'mixes-plugin' ); ?></a>
            </p>
		</li>
		<li>
            <h4><?php _e( 'Display', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon display-icon"><span class="dashicons dashicons-admin-appearance"></span></div>
            <p>
				<a href="<?php echo admin_url( '/customize.php?autofocus[section]=header_image' ); ?>"><?php _e( 'Header', 'mixes-plugin' ); ?></a>
                <a href="<?php echo admin_url( 'themes.php?page=mixes-theme-settings' ); ?>"><?php _e( 'Settings', 'mixes-plugin' ); ?></a>
            </p>
        </li>
		<li>
            <h4><?php _e( 'Merch', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon merch-icon"><span class="dashicons dashicons-store"></span></div>
            <p>
                <a href="<?php echo $merch_link; ?>"><?php _e( 'Manage Products', 'mixes-plugin' ); ?></a>
            </p>
        </li>
		<li>
            <h4><?php _e( 'Users', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon users-icon"><span class="dashicons dashicons-admin-users"></span></div>
            <p>
                <a href="<?php echo admin_url( 'edit-comments.php' ); ?>"><?php _e( 'Comments', 'mixes-plugin' ); ?></a>
				<a href="<?php echo admin_url( 'users.php' ); ?>"><?php _e( 'Profiles', 'mixes-plugin' ); ?></a>
            </p>
        </li>
		<li>
            <h4><?php _e( 'Search', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon search-icon"><span class="dashicons dashicons-search"></span></div>
            <p>
				<?php if ( class_exists( 'SearchAndFilter' ) ) : ?><a href="<?php echo admin_url( 'admin.php?page=searchandfilter-settings' ); ?>"><?php _e( 'Shortcode', 'mixes-plugin' ); ?></a><?php endif; ?>
                <a href="<?php echo $search_link; ?>"><?php _e( 'Page', 'mixes-plugin' ); ?></a>
            </p>
        </li>
		<li>
            <h4><?php _e( 'Contact', 'mixes-plugin' ); ?></h4>
            <div class="mixes-dashboard-content-actions-icon email-icon"><span class="dashicons dashicons-email"></span></div>
            <p>
                <a href="<?php echo admin_url( 'admin.php?page=wpcf7' ); ?>"><?php _e( 'Forms', 'mixes-plugin' ); ?></a>
				<a href="<?php echo $contact_link; ?>"><?php _e( 'Page', 'mixes-plugin' ); ?></a>
            </p>
        </li>
    </ul>
</div>