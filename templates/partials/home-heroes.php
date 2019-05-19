<?php
/**
 * The template that displays the home page's "heroes", a collection of hero tiles.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<div class="stage"></div>
<div class="heroes">
  <?php generateFeedsByTag( 'featured', 1 ); ?>
  <section class="latest">
    <?php generateFeedsByRecentExcludingFeatured(); ?>
  </section>
</div>