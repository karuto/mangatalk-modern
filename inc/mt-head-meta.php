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
  $description_default = "优质漫画文化媒体。我们致力于收集与输出中文互联网上最具长远留存价值的漫画内容，让你更了解漫画及其背后世界的魅力。";
  $description_post = get_the_excerpt();

  global $post;
  if ( !is_singular()) {
    //if it is not a post or a page
    echo '<meta property="description" content="' . $description_default . '"/>';
    echo '<meta property="og:description" content="' . $description_default . '"/>';
    return;
  }
  echo '<meta property="og:title" content="' . get_the_title() . '"/>';
  echo '<meta property="og:type" content="article"/>';
  echo '<meta property="description" content="' . $description_post . '"/>';
  echo '<meta property="og:description" content="' . $description_post . '"/>';
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