<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Uninstall avatars.
 *
 * During uninstallation, remove the custom field from the users
 * and delete the local avatars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mmp_user_avatars_uninstall() {

	$mmp_user_avatars = new mmp_user_avatars;
	$users            = get_users_of_blog();

	foreach ( $users as $user ) {
		$mmp_user_avatars->avatar_delete( $user->user_id );
	}

	delete_option( 'mmp_user_avatars_caps' );

}
register_uninstall_hook( __FILE__, 'mmp_user_avatars_uninstall' );