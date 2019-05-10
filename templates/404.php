<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<div class="error-404 not-found">
	<?php
	get_template_part( 'templates/partials/page-header' );
	?>

	<div class="page-content">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .page-content -->
</div><!-- .error-404 -->
