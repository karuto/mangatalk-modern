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

function getQueryExcludeCategory( $catId, $postsCount ) {
  $posts = new WP_Query(
    array(
      'category__not_in' => $catId,
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

function generateFeedsBySlug( $catSlug, $postsCount = 4, $template = 'feed' ) {
  $catId = getCategoryIdBySlug( $catSlug );
  $catUrl = esc_url( get_category_link( $catId ) );
  $catName = get_cat_name( $catId );
  $catPosts = getQueryIncludeCategory( $catId, $postsCount );

  if ( $template == 'feed' ) {
    echo '<section class="feeds">';
    echo '<div class="feeds__header"><a href="' . $catUrl . '">' . $catName . '</a></div>';  
  }
  generateFeed( $catPosts, $postsCount, $template );
  if ( $template == 'feed' ) {
    echo '</section>';
  }
}
?>

<?php get_template_part( 'templates/partials/home-heroes' ); ?>
<div class="grid">
  <section class="collection-of-feeds">
  <?php
  generateFeedsBySlug( 'article' ); // culture
  generateFeedsBySlug( 'scomix' ); // recommendations
  generateFeedsBySlug( 'scomix' ); // people
  ?>
  </section>
  <aside class="sidebar">
    <?php get_template_part( 'templates/partials/widget-column-top' ); ?>
    <div class="sidebar__block">
      MangaTalk is a non-profit, community-oriented educational organization dedicated to enhance reader's understanding and appreciation of the comics medium, the people who make it and the industry behind it.
    </div>
    <?php get_template_part( 'templates/partials/widget-column-new' ); ?>
  </aside>
</div>