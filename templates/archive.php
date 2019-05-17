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

<?php 
// Retrieve cover image URL then set header's background
$cover_img_url = get_the_author_meta( 'coverimage' );
if ( $cover_img_url == "" ) {
  $cover_img_url = get_template_directory_uri().'/img/mt-cover-brand.jpg';
}
// echo $cover_img_url;
// echo 'style="background-image: url(' . $cover_img_url . ');"';
?>

<div 
  class="stage stage--relative <?php echo is_author() ? 'stage--author' : ''; ?>" 
  style="background-image: url(<?php echo $cover_img_url; ?>);">
  <div class="archive-head">
    <?php echo get_the_archive_title(); ?>
  </div>
</div>
<?php get_template_part( 'templates/partials/feed' ); ?>
