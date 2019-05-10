<?php
/**
 * The template that displays the top header content inside the <body>.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

<header id="masthead" class="header">
	<?php get_template_part( 'templates/partials/header-branding' ); ?>
	<?php get_template_part( 'templates/partials/header-menu' ); ?>
</header><!-- #masthead -->

