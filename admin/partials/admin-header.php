<?php
/**
 * Admin header template.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin\Partials;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Admin header variables.
 *
 * @since 1.0.0
 */

// The site title markup.
$title = sprintf(
	'<p class="site-title"><a href="%1s" rel="home"><span class="title-span-one">%2s</span> <span class="title-span-two">%3s</span></a></p>',
	esc_attr( esc_url( admin_url() ) ),
	__( 'Monica', 'mixes-theme' ),
	__( 'Mixes', 'mixes-theme' )
);

// Return a reminder if no site tagline.
if ( ! empty( get_bloginfo( 'description' ) ) ) {
    $description = get_bloginfo( 'description' );
} else {
    $description = __( 'Add a tagline in Settings > General or change this in', 'mixes-plugin' ) . ' <code>mixes-plugin/admin/partials/admin-header.php</code>';
}

?>
<nav id="site-navigation" class="main-navigation admin-navigation" role="directory">
	<?php wp_nav_menu(
		[
			'theme_location' => 'admin-header',
			'menu_id'        => 'admin-navigation-list',
			'container'      => false,
			'menu_id'        => 'admin-navigation-list',
			'fallback_cb'    => null
		]
	); ?>
</nav>
<header class="site-header admin-header">
	<?php get_template_part( 'template-parts/site-branding' ); ?>
	<p class="site-description admin-site-description"><?php echo $description; ?></p>
</header>
<?php

// Hero image on dashboard screen only.
global $pagenow;

if ( 'index.php' === $pagenow && ! isset( $_GET['page'] ) ) {
	get_template_part( 'template-parts/hero' );
}