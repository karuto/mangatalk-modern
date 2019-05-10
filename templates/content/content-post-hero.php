<?php
/**
 * Template part for displaying the hero section of posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<div class="hero hero--entry">
  <aside class="entry__meta">
    <?php get_template_part( 'templates/content/content-post-meta' ); ?>
  </aside>
  <h1 class="hero__title"><?php single_post_title(); ?></h1>
  <aside class="entry__excerpt"><?php echo get_the_excerpt(); ?></aside>
</div>