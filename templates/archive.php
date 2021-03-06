<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>
<div 
  class="stage stage--relative">
  <div class="stage__heading">
    <?php echo get_the_archive_title(); ?>
  </div>
</div>
<?php get_template_part( 'templates/partials/feed' ); ?>
