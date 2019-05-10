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

<article <?php post_class(); ?>>
	<div class="entry">

		<?php get_template_part( 'templates/content/content-page-hero' ); ?>

		<div class="entry__content">
			<?php the_content(); ?>
		</div>

	</div>
</article>

