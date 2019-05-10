<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) {
			$message = 'Sorry, but nothing matched your search terms. Please try again with some different keywords.';
		} else {
			$message = 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.';
		}

		echo '<p>' . _e( $message, 'twentynineteen' ) . '</p>';
		get_search_form();
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
