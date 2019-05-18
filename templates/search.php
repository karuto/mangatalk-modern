<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<div class="stage stage--relative">
  <div class="stage-heading">
    搜索「<?php echo get_search_query(); ?>」
  </div>
</div>
<?php get_template_part( 'templates/partials/feed' ); ?>