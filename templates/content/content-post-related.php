<?php
/**
 * Template part for displaying the footer section of posts.
 * For example, put your copyright notice here.
 * Since this is an unopinionated parent template, it has nothing.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php  
$originalPost = $post; // store variable
global $post;
$originalPostTags = wp_get_post_tags ($post->ID );
if ( $originalPostTags ) {
  $tagIds = array();
  foreach( $originalPostTags as $tag ) {
    $tagIds[] = $tag->term_id;
  }
  $relatedPostsByTagsQuery = new wp_query(
    array(  
    'tag__in' => $tagIds,
    'post__not_in' => array( $post->ID ),
    'posts_per_page'=> 4, // Number of related posts to display.
    )
  );
  if ( $relatedPostsByTagsQuery->have_posts() ) {
    echo '<div class="entry__footer">';
    echo '<div class="heading"><span class="heading__label">你可能也会喜欢</span></div>';
    echo '<section class="feeds">';
    while ( $relatedPostsByTagsQuery->have_posts() ) {
      $relatedPostsByTagsQuery->the_post();
      get_template_part( 'templates/content/content-feed');
    }
    echo '</section>';
    echo '</div>';
  } // endif have_posts();
} // endif $originalPostTags;
$post = $originalPost; // restore variables
wp_reset_query();
?>  