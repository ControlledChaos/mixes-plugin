<?php
/**
 * Functions for post types and taxonomies.
 *
 * @package    Site_Plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Functions for post types and taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
class Post_Type_Tax_Functions {

	/**
	 * Get an instance of the class.
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

		// Make Instructions post type private by default.
		add_action( 'transition_post_status', [ $this, 'private_posts' ], 10, 3 );
		add_action( 'post_submitbox_misc_actions', [ $this, 'private_posts_metabox' ] );

		// Replace "Post" in the update messages.
		add_filter( 'post_updated_messages', [ $this, 'update_messages' ], 99 );

	}

	/**
	 * Make Instructions post type private by default
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function private_posts( $new_status, $old_status, $post ) {

		if ( 'site_admin' == $post->post_type && 'publish' == $new_status && $old_status != $new_status ) {
			$post->post_status = 'private';
			wp_update_post( $post );
		}

	}

	/**
	 * Instructions post type publish metabox
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns CSS and JavaScript for the metabox.
	 */
	public function private_posts_metabox() {

		// Access global variables.
		global $post;

		// Bail if not instructions post type.
		if ( ! 'site_admin' == $post->post_type ) {
			return;
		}

		// Function variables.
		$message = __( '<strong>Note:</strong> Instruction posts are always <strong>private</strong>.', 'mixes-plugin' );
		$post->post_password = '';
		$visibility = 'private';
		$visibility_text = __( 'Private', 'mixes-plugin' );
		?>
		<style type="text/css">
			.private-nosts-note {
				margin: 0;
				padding: 1em;
			}
		</style>
		<script type="text/javascript">
			(function($){
				try {
					$('#post-visibility-display').text('<?php echo $visibility_text; ?>');
					$('#hidden-post-visibility').val('<?php echo $visibility; ?>');
				} catch(err){}
			}) (jQuery);
		</script>
		<div class="private-nosts-note">
			<?php echo $message; ?>
		</div>
		<?php

	}

	/**
	 * Replace "Post" in the update messages for custom post types.
	 *
	 * Example: where the edit screen reads "Post updated" and "View post"
	 * it would read "Project updated" and "View project" for post type Project.
	 *
	 * @since  1.0.0
	 * @access public
	 * @global object post
	 * @global int post_ID
	 * @param array $messages
	 * @return string Returns the text appropriate for each condition.
	 */
	public function update_messages( $messages ) {

		global $post, $post_ID;

		$post_types = get_post_types(
			[
				'show_ui'  => true,
				'_builtin' => false
			],
			'objects' );

		foreach ( $post_types as $post_type => $post_object ) {

			$messages[ $post_type ] = [
				0  => '', /* Unused. Messages start at index 1 */

				1  => sprintf(
					__( '%1s updated. <a href="%2s">View %3s</a>', 'mixes-plugin' ), $post_object->labels->singular_name,
					esc_url( get_permalink( $post_ID ) ),
					$post_object->labels->singular_name
				),
				2  => __( 'Custom field updated.', 'mixes-plugin' ),
				3  => __( 'Custom field deleted.', 'mixes-plugin' ),
				4  => sprintf(
					__( '1%s updated.', 'mixes-plugin' ),
					$post_object->labels->singular_name
				),
				5  => isset( $_GET['revision']) ? sprintf(
					__( '%1s restored to revision from %2s', 'mixes-plugin' ),
					$post_object->labels->singular_name,
					wp_post_revision_title( (int) $_GET['revision'], false )
					) : false,
				6  => sprintf(
					__( '%1s published. <a href="%2s">View %3s</a>', 'mixes-plugin' ),
					$post_object->labels->singular_name,
					esc_url( get_permalink( $post_ID ) ),
					$post_object->labels->singular_name
				),
				7  => sprintf(
					__( '%1s saved.', 'mixes-plugin' ),
					$post_object->labels->singular_name
				),
				8  => sprintf(
					__( '%1s submitted. <a target="_blank" href="%2s">Preview %3s</a>', 'mixes-plugin' ),
					$post_object->labels->singular_name,
					esc_url( add_query_arg( 'preview', 'true',
					get_permalink( $post_ID ) ) ),
					$post_object->labels->singular_name
				),
				9  => sprintf(
					__( '%1s scheduled for: <strong>%2s</strong>. <a target="_blank" href="%3s">Preview %4s</a>', 'mixes-plugin'  ),
					$post_object->labels->singular_name,
					date_i18n( __( 'M j, Y @ G:i', 'mixes-plugin' ),
					strtotime( $post->post_date ) ),
					esc_url( get_permalink( $post_ID ) ),
					$post_object->labels->singular_name
				),
				10 => sprintf(
					__( '%1s draft updated. <a target="_blank" href="%2s">Preview %3s</a>', 'mixes-plugin'  ),
					$post_object->labels->singular_name,
					esc_url( add_query_arg( 'preview', 'true',
					get_permalink( $post_ID ) ) ),
					$post_object->labels->singular_name
				),
			];

		}

		return $messages;
	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function mmp_type_taxes_functions() {

	return Post_Type_Tax_Functions::instance();

}

// Run an instance of the class.
mmp_type_taxes_functions();