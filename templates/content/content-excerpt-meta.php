<?php
/**
 * Template part for displaying the metadata section of excerpts.
 * This includes category, views, posted time.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php the_category(' &bull; '); ?>&nbsp;&bull;&nbsp;<?php get_template_part( 'templates/content/content-post-views' ); ?>