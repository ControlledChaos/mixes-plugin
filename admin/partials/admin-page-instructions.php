<?php
/**
 * Website instructions page output
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
}

// Access the post object.
global $post;

// Post query arguments.
$args = [
	'post_type'              => [ 'site_admin' ],
	'post_status'            => [ 'private' ],
	'nopaging'               => true,
	'posts_per_page'         => -1,
	'ignore_sticky_posts'    => false,
	'order'                  => 'ASC',
	'orderby'                => 'menu_order',
];

// Get posts as a variable for foreach loops.
$posts = get_posts( $args );
foreach( $posts as $post ) {
	$tab = $post->ID;

	/**
	 * Active tab switcher.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	if ( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
	} else {
		$active_tab = 'first';
	}
}

?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Website Instructions', 'mixes-plugin' ); ?></h1>
    <p class="description"><?php esc_html_e( 'This page will help you publish & edit content, manage the media library, draw visitors to the site, and more.', 'mixes-plugin' ); ?></p>

    <hr class="wp-header-end">

	<div class="backend-tabbed-content">
		<ul>
		<?php foreach( $posts as $post ) :
			echo sprintf(
				'<li><a href="#%1s"><span class="dashicons %2s"></span> %3s</a></li>',
				$post->ID,
				get_field( 'instructions_tab_icon' ),
				get_field( 'instructions_tab_text' )
			);
		endforeach; ?>
		</ul>
		<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
			<article id="<?php echo $post->ID; ?>" class="entry-content">
				<header class="instructions-tab-header">
					<h2><?php the_title(); ?></h2>
				</header>
				<div class="instructions-tab-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</div>