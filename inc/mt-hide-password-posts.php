<?php
/**
 * Hide password protected posts from all WP loops.
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