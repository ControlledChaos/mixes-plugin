<?php
/**
 * About page site settings output.
 *
 * Uses the universal slug partial for admin pages. Set this
 * slug in the core plugin file.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h3><?php _e( 'Website settings', 'mixes-plugin' ); ?></h3>
<?php echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'The plugin is equipped with', 'mixes-plugin' ),
	esc_url( admin_url( '?page=' . MMP_ADMIN_SLUG . '-settings' ) ),
	__( 'an admin page', 'mixes-plugin' ),
	__( 'for customizing the user interface of WordPress/ClassicPress, as well as other useful features.', 'mixes-plugin' )
 ); ?>
<h3><?php _e( 'Clean Up the Admin', 'mixes-plugin' ); ?></h3>
<ul>
	<li><?php _e( 'Remove dashboard widgets: WordPress/ClassicPress news, quick press', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Make Menus and Widgets top level menu items', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Remove select admin menu items', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Remove WordPress/ClassicPress logo from admin bar', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Remove access to theme and plugin editors', 'mixes-plugin' ); ?></li>
</ul>
<h3><?php _e( 'Enchance the Admin', 'mixes-plugin' ); ?></h3>
<ul>
	<li><?php _e( 'Add three admin bar menus', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Add custom post types to the At a Glance widget', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Custom admin footer message', 'mixes-plugin' ); ?></li>
</ul>