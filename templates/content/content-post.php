<?php
/**
 * Template part for displaying post content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php get_template_part( 'templates/content/content-post-hero' ); ?>
<article <?php post_class(); /* .post .entry .category-${id} .tag-${id} */ ?>>
		<div class="entry__content">
			<?php the_content(); ?>
			<?php get_template_part( 'templates/content/content-post-footer' ); ?>
		</div>
</article>

