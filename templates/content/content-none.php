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
	<div style="text-align: center;">
		<?php
		if ( is_search() ) {
			$message = '很抱歉！漫言无法找到您需要的内容。试试搜点别的？';
		} else {
			$message = '很抱歉！漫言无法找到您需要的内容。试试搜索？';
		}

		echo '<p>' . $message . '</p>';
		get_search_form();
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
