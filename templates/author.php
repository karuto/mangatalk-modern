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
$authorId = get_the_author_meta( 'ID' );
// Retrieve cover image URL then set header's background
$coverImgUrl = get_the_author_meta( 'coverimage' );
if ( $coverImgUrl === '' ) {
  $coverImgUrl = get_template_directory_uri() . '/img/mt-cover-brand.jpg';
}
?>

<div 
  class="stage stage--relative stage--author"  
  style="background-image: url(<?php echo $coverImgUrl; ?>);">
</div>
<?php get_template_part( 'templates/partials/author-bio' ); ?>
<?php get_template_part( 'templates/partials/feed' ); ?>
