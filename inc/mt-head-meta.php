<?php
/**
 * MangaTalk <meta> attributes in <head>.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
// https://www.wpbeginner.com/wp-themes/how-to-add-facebook-open-graph-meta-data-in-wordpress-themes/
//Add the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
  return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

//Add Open Graph Meta Info
function mt_head_meta_opengraph() {
  global $post;
  if ( !is_singular()) {
    //if it is not a post or a page
    return;
  }
  echo '<meta property="og:title" content="' . get_the_title() . '"/>';
  echo '<meta property="og:type" content="article"/>';
  echo '<meta property="og:url" content="' . get_permalink() . '"/>';
  if (!has_post_thumbnail( $post->ID )) {
    // if the post does not have featured image, use a default image
    $default_image = "https://mangatalk.net/wp-content/themes/mangatalk-twentynineteen/img/mt-cover-brand.jpg";
    echo '<meta property="og:image" content="' . $default_image . '"/>';
  } else {
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
    echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
  }
}

add_action( 'wp_head', 'mt_head_meta_opengraph', 5 );
?>