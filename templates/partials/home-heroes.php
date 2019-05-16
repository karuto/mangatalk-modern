<?php
/**
 * The template that displays the home page's "mosaic", a.k.a featured hero content.
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
  <!-- TODO: this doesn't work, because right now the code only works for a tag, not a category. -->
  <?php generateFeedsBySlug( 'featured', 1, 'hero' ); ?>
  <section class="latest">
    <?php generateFeedsBySlug( 'scomix', 2, 'hero' ); ?>
  </section>
</div>