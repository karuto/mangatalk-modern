<?php
/**
 * Counts views for posts.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

/**
 * Counts views for posts.
 */
function update_post_views() {
	if ( is_single() ) {
		global $post;
		$post_views = esc_attr( get_post_meta( $post->ID, '_post_views', true ) );
		if( $post_views == '' ) {
			$post_views = 1;
			add_post_meta( $post->ID, '_post_views', $post_views );
		} else {
			$post_views = (int)$post_views + 1;
			update_post_meta( $post->ID, '_post_views', $post_views );
		}
	}
}
add_action('wp_head', 'update_post_views');
?>