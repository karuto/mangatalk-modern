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
function renderTemplate( $template ) {
  if ( $template == 'feed' ) {
    get_template_part( 'templates/content/content-feed' );
  } else if ( $template == 'hero' ) {
    get_template_part( 'templates/content/content-post-hero' );
  }
}

function getCategoryIdBySlug( $slug ) {
  $category_object = get_category_by_slug( $slug );
  $category_id = $category_object->term_id;
  return $category_id;
}

function getQueryIncludeCategory( $catId, $postsCount ) {
  $posts = new WP_Query(
    array(
      'cat' => $catId,
      'posts_per_page' => $postsCount
    )
  );
  return $posts;
}

function getQueryExcludeTag( $catId, $postsCount ) {
  $posts = new WP_Query(
    array(
      'tag__not_in' => array( $catId ),
      'posts_per_page' => $postsCount,
    )
  );
  return $posts;
}

function generateFeed( $query, $postsCount, $template ) {
  $feedCount = 0;
  if ( !is_null( $query ) ) {
    while ( $query->have_posts() && ($feedCount < $postsCount) ) {
      $query->the_post();
      $feedCount++;
      // at this point, thanks to the binding of the_post() above,
      // you can use native single post functions, such as get_post_type().
      renderTemplate( $template );
    }
    wp_reset_postdata();
    wp_reset_query();
  }
}

function generateFeedsByCat( $catSlug, $postsCount = 3 ) {
  $catId = getCategoryIdBySlug( $catSlug );
  $catUrl = esc_url( get_category_link( $catId ) );
  $catName = get_cat_name( $catId );
  $catPosts = getQueryIncludeCategory( $catId, $postsCount );

  echo '<section class="feeds">';
  echo '<a href="' . $catUrl . '"><div class="heading"><span class="heading__label">' . $catName . '</span><span class="heading__secondary">查看全部</span></div></a>';
  generateFeed( $catPosts, $postsCount, 'feed' );
  echo '</section>';
}

function generateFeedsByTag( $tagSlug, $postsCount = 3 ) {
  $tagPosts = new WP_Query(
    array(
      'tag' => $tagSlug,
      'posts_per_page' => $postsCount
    )
  );
  generateFeed( $tagPosts, $postsCount, 'hero' );
}

function generateFeedsByRecentExcludingFeatured() {
  $featuredTagId = 8; /* FUCK THIS SHIT */
  $thisPostsCount = 2;
  $postsExcludingFeatured = getQueryExcludeTag( $featuredTagId, $thisPostsCount );
  generateFeed( $postsExcludingFeatured, $thisPostsCount, 'hero' );
}
?>

<?php get_template_part( 'templates/partials/home-heroes' ); ?>
<div class="grid">
  <section class="collection-of-feeds">
    <?php
    generateFeedsByCat( 'culture' ); // culture
    generateFeedsByCat( 'recommendation' ); // recommendation
    generateFeedsByCat( 'people' ); // people
    ?>
  </section>
  <aside class="sidebar">
    <?php get_template_part( 'templates/partials/widget-column-top' ); ?>
    <?php get_template_part( 'templates/partials/widget-special' ); ?>
    <?php get_template_part( 'templates/partials/widget-column-new' ); ?>
  </aside>
</div>