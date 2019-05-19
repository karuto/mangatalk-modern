<?php
/**
 * Template part for displaying page content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>
<?php get_template_part( 'templates/content/content-post-social-func' ); ?>

<article <?php post_class(); ?>>
	<div class="entry__content">
		<?php the_content(); ?>
		<?php get_template_part( 'templates/content/content-post-social' ); ?>
	</div>
</article>
