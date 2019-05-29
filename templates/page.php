<?php
/**
 * The template for displaying all single page (non-post) pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<div 
  class="stage stage--relative">
  <div class="stage__heading">
    <?php single_post_title(); ?>
  </div>
</div>
<?php get_template_part( 'templates/partials/feed' ); ?>
