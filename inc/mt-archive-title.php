<?php
/**
 * Archive title processing.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

/**
 * Filters the default archive titles.
 * https://developer.wordpress.org/reference/functions/get_the_archive_title/#comment-1807
 */
function my_theme_archive_title( $title ) {
	if ( is_category() ) {
			$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
?>