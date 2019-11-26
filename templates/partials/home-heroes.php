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
  <div class="hero-swiper">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php generateFeedsByTag( 'featured', 'hero-swiper', 3 ); ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <section class="latest">
    <?php generateFeedsByRecentExcludingFeatured(); ?>
  </section>
</div>
