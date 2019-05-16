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
  <?php get_template_part( 'templates/content/content-post-hero' ); ?>
  <div style="background: yellow;">sidebar</div>
</div>