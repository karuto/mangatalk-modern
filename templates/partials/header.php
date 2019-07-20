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

<header id="masthead" class="header">
	<div class="maxwidth header__wrapper">
		<?php get_template_part( 'templates/partials/header-branding' ); ?>
		<?php get_template_part( 'templates/partials/header-menu' ); ?>
	</div>
</header><!-- #masthead -->

