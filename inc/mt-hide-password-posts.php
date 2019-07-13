<?php
/**
 * Hide password protected posts in all WP loops.
 * This also hides password protected posts in the RSS feed.
 * https://www.wpbeginner.com/wp-tutorials/how-to-hide-password-protected-posts-from-wordpress-loop/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

function mt_hide_password_posts( $where = '' ) {
  if (!is_single() && !is_admin()) {
      $where .= " AND post_password = ''";
  }
  return $where;
}
add_filter( 'posts_where', 'mt_hide_password_posts' );
?>