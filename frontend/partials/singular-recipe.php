<?php
/**
 * Recipe post type singular content
 *
 * @package    Mixes_Plugin
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// Bail if ACF Pro is not active.
if ( ! class_exists( 'acf_pro' ) ) {
	return;
}

/**
 * Fields registered by Advanced Custom Fields
 *
 * @since  1.0.0
 */
$type        = get_field( 'recipe_type' );
$summary     = get_field( 'recipe_summary' );
$description = get_field( 'recipe_description' );
$preparation = get_field( 'recipe_preparation' );
$service     = get_field( 'recipe_service' );
$youtube     = get_field( 'recipe_youtube_url' );
$images      = get_field( 'recipe_gallery' );

// Begin output.
?>
<?php if ( $description ) : ?>
<section class="recipe-section recipe-description">
	<h2><?php _e( 'Recipe Description', 'mixes-plugin' ); ?></h2>
	<?php echo $description; ?>
</section>
<?php endif; ?>

<?php
if ( have_rows( 'recipe_ingredients' ) ) : ?>
<section class="recipe-section recipe-ingredients">
	<h2><?php _e( 'Ingredients', 'mixes-plugin' ); ?></h2>
	<ul class="recipe-ingredients-list">
	 <?php while ( have_rows( 'recipe_ingredients' ) ) : the_row();
	 $quantity = get_sub_field( 'recipe_ingredients_quantity' );
	 $name     = get_sub_field( 'recipe_ingredients_name' );
	 $comment  = get_sub_field( 'recipe_ingredients_comment' );
	 if ( $comment ) {
		 $comment = '<br /><span class="ingredients-list-comment">' . $comment . '</span>';
	 } else {
		 $comment = null;
	 }
	 ?>
	 	<li>
		 	<?php echo sprintf(
				 '%1s %2s%3s',
				 $quantity,
				 $name,
				 $comment
			 ); ?>
		</li>
	<?php endwhile; ?>
	</ul>
</section>
<?php endif; ?>

<?php if ( $preparation ) : ?>
<section class="recipe-section recipe-preparation">
	<h2><?php _e( 'Preparation', 'mixes-plugin' ); ?></h2>
	<?php echo $preparation; ?>
</section>
<?php endif; ?>

<?php if ( $service ) : ?>
<section class="recipe-section recipe-service">
	<h2><?php _e( 'Service', 'mixes-plugin' ); ?></h2>
	<?php echo $service; ?>
</section>
<?php endif; ?>

<?php if ( $youtube ) : ?>
<section class="recipe-section recipe-video">
	<h2><?php _e( 'Watch the Video', 'mixes-plugin' ); ?></h2>
	<?php echo $youtube; ?>
</section>
<?php endif; ?>

<?php if ( $images ) : ?>
<section id="recipe-section recipe-gallery" class=" recipe-gallery">
	<h2><?php _e( 'Image Gallery', 'seq-pac-theme' ); ?></h2>
	<ul class="gallery">
		<?php foreach( $images as $image ): ?>
			<li class="gallery-item">
				<a data-fancybox="images" href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endif; ?>