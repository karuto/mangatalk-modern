<?php
/**
 * MangaTalk password protected posts related features.
 * The official documentation gives a wonderful overview of all the possibilities:
 * https://wordpress.org/support/article/using-password-protection/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

/**
 * Hide password protected posts in all WP loops.
 * This also hides password protected posts in the RSS feed.
 * https://www.wpbeginner.com/wp-tutorials/how-to-hide-password-protected-posts-from-wordpress-loop/
 */
function mt_hide_password_posts( $where = '' ) {
  if (!is_single() && !is_admin()) {
      $where .= " AND post_password = ''";
  }
  return $where;
}
add_filter( 'posts_where', 'mt_hide_password_posts' );


function my_excerpt_protected( $excerpt ) {
    if ( post_password_required() )
        $excerpt = '<em>[This is password-protected.]</em>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'my_excerpt_protected' );
?>