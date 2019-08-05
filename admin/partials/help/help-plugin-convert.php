<?php
/**
 * Content for the Convert Plugin help tab.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin\Partials\Help
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin\Partials\Help;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h3><?php _e( 'Converting the plugin for your website', 'mixes-plugin' ); ?></h3>
<h4><?php _e( 'Directories and file names', 'mixes-plugin' ); ?></h4>
<p><?php _e( 'The names for directories and files are descriptive enough to describe what they do yet generic enough that they likely will not need to be changed. However, you may want to remove some files, such as that in which this code is written.', 'mixes-plugin' ); ?></p>
<h4><?php _e( 'Renaming the code', 'mixes-plugin' ); ?></h4>
<p><?php _e( 'To rename this plugin to convert it specifically for a single website, first rename this file and rename the plugin folder with the same name as this file. Then use a find &amp; replace function to look for the following...', 'mixes-plugin' ); ?></p>
<ol>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Text Domain', 'mixes-plugin' ), esc_html__( 'The text domain should be the same as this file and the plugin folder. Replace "mixes-plugin".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Classes', 'mixes-plugin' ), esc_html__( 'Classes are prefixed with the plugin name. Replace "Controlled_Chaos".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Class Variables', 'mixes-plugin' ), esc_html__( 'Class variables are prefixed with the plugin name. Replace "controlled_chaos".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Functions', 'mixes-plugin' ), esc_html__( 'There are a few functions prefixed with the plugin name. The above replace of "controlled_chaos" will have given them your new name.', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Filters', 'mixes-plugin' ), esc_html__( 'Filters are prexixed with an abbreviation for the plugin name. Replace "mmp".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Pages', 'mixes-plugin' ), esc_html__( 'Admin page URLs are prexixed with an abbreviation for the plugin name. The above replace of "mmp" will have given them your new prefix.', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Options', 'mixes-plugin' ), esc_html__( 'Options are prexixed with an abbreviation for the plugin name. The above replace of "mmp" will have given them your new prefix.', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Version', 'mixes-plugin' ), esc_html__( 'The plugin version is all caps and is prexixed with an abbreviation for the plugin name. Replace "MMP".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Author', 'mixes-plugin' ), esc_html__( 'The author name and email is used in class docblocks. Replace "Greg Sweet" and replace "greg@ccdzine.com".', 'mixes-plugin' ) ); ?>
<?php echo sprintf( '<li><strong>%1s:</strong> %2s</li>', esc_html__( 'Plugin Name', 'mixes-plugin' ), esc_html__( 'The plugin name is used in various places. Replace "Controlled Chaos".', 'mixes-plugin' ) ); ?>
</ol>