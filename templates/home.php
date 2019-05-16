<?php
/**
 * The template that displays the content of blog's "home page".
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
$postsPerPage = 4;

function outputBlock() {
  get_template_part( 'templates/content/content-feed' );
}

function getCategoryIdBySlug( $slug ) {
  $category_object = get_category_by_slug( $slug );
  $category_id = $category_object->term_id;
  return $category_id;
}

function getQueryIncludeCategory( $catId, $postsPerPage ) {
  $posts = new WP_Query(
    array(
      'cat' => $catId,
      'posts_per_page' => $postsPerPage
    )
  );
  return $posts;
}

function getQueryExcludeCategory( $catId, $postsPerPage ) {
  $posts = new WP_Query(
    array(
      'category__not_in' => $catId,
      'posts_per_page' => $postsPerPage,
    )
  );
  return $posts;
}

function generateFeed( $query ) {
  $feedLimit = 4;
  $feedCount = 0;
  if ( !is_null( $query ) ) {
    while ( $query->have_posts() && ($feedCount < $feedLimit) ) {
      $query->the_post();
      $feedCount++;
      // at this point, thanks to the binding of the_post() above,
      // you can use native single post functions, such as get_post_type().
      outputBlock();
    }
    wp_reset_postdata();
    wp_reset_query();
  }
}

function generateFeedsBySlug( $catSlug ) {
  $catId = getCategoryIdBySlug( $catSlug );
  $catUrl = esc_url( get_category_link( $catId ) );
  $catName = get_cat_name( $catId );
  $catPosts = getQueryIncludeCategory( $catId, $postsPerPage );

  echo '<section class="feeds">';
  echo '<div class="feeds__header"><a href="' . $catUrl . '">' . $catName . '</a></div>';
  generateFeed( $catPosts );
  echo '</section>';
}
?>

<?php 
  // echo '<div class="stage"></div>';
  echo '<div class="grid">';
  echo '<section class="collection-of-feeds">';
  generateFeedsBySlug( 'article' );
  generateFeedsBySlug( 'scomix' );
  generateFeedsBySlug( 'scomix' );
  generateFeedsBySlug( 'article' );
  echo '</section>';
  echo '<aside class="sidebar">Hi sidebar</div>';
  echo '</div>'

// get_template_part( 'templates/partials/home-mosaic' );
?>
