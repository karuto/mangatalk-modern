<?php
/**
 * The template for sidebar widget "columns", showcasing the authors / columns of the site.
 * This specific template showcases the authors that has the most posts published.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
$topPosts = get_posts(
  array(
    'post_type' => 'post',
    'meta_key' => '_post_views',
    'orderby'   => 'meta_value_num',
  )
);
?>

<section class="widget">
  <div class="heading"><span class="heading__label">本周热榜</span></div>
  <div class="widget__content widget__content--topreads">
    <?php foreach ( $topPosts as $rank=>$post ) {
      setup_postdata( $post );
      $naturalRank = $rank + 1;
      echo '<span class="rank rank--' . $naturalRank . '">' . $naturalRank . '</span>';
      get_template_part( 'templates/content/content-feed' );
    } ?>
  </div>
</section>