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

<div class="stage"></div>
<?php get_template_part( 'templates/content/content-post-hero' ); ?>
<article <?php post_class(); /* .post .entry .category-${id} .tag-${id} */ ?>>
	<?php get_template_part( 'templates/content/content-post-meta' ); ?>
	<div class="entry__content">
		<?php the_content(); ?>
	</div>
</article>
<?php get_template_part( 'templates/content/content-post-related' ); ?>
