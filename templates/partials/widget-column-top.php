<?php
/**
 * The template for sidebar widget "columns", showcasing the authors / columns of the site.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
$users = get_users(
  array(
    'orderby' => 'post_count',
    'order' => 'DESC',
    'number' => '6'
  )
);
?>

<section class="widget">
  <div class="feeds__header"><a href="#">专栏排行</a></div>
  <?php get_template_part( 'templates/partials/widget-column-base' ); ?>
</section>