<?php
/**
 * About page media options output.
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
<h2><?php _e( 'Media and Upload Options', 'mixes-plugin' ); ?></h2>
<h3><?php _e( 'Image Sizes', 'mixes-plugin' ); ?></h3>
<ul>
	<li><?php _e( 'Add option to hard crop the medium and/or large image sizes', 'mixes-plugin' ); ?></li>
	<li><?php _e( 'Add option to allow SVG uploads to the Media Library', 'mixes-plugin' ); ?></li>
</ul>
<h3><?php _e( 'Fancybox Presentation', 'mixes-plugin' ); ?></h3>
<h3><?php _e( 'SVG Uploads', 'mixes-plugin' ); ?></h3>