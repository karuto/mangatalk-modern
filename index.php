<?php
/**
 * The main template file. I've made it to be the universal base template.
 * Every single page request will be routed to this template, then we use
 * conditional tags to determine which template to render.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * ===============================================================
 * Template structure inside this theme
 * 
 * templates
 * --content
 * 	 [Templates for content types: post, page, excerpt, none...]
 * 	 [Template partials, exclusive to content: comments, meta, title...]
 * --partials
 *   [Template partials, generic (not just for content): footer, header, feed...]
 * [Top level templates that represent complete pages: 404, archive...]
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
get_template_part( 'templates/partials/html-starting-tags' );
if ( is_home() ) {
	// only for "recent posts", not for static page as home page
	get_template_part( 'templates/home' );
} else if ( is_single() ) {
	// any posts; excludes pages and attachments
	get_template_part( 'templates/post' );
} else if ( is_page() ) {
	// any pages; excludes posts and attachments
	get_template_part( 'templates/page' );
} else if ( is_archive() ) {
	get_template_part( 'templates/archive' );
} else if ( is_search() ) {
	get_template_part( 'templates/search' );
} else if ( is_404() ) {
	get_template_part( 'templates/404' );
} else {
	get_template_part( 'templates/home' );
}
get_template_part( 'templates/partials/html-closing-tags' );
?>