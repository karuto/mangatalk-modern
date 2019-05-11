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

<header id="toolbar" class="header header--toolbar">
	<div class="maxwidth header__wrapper">
		<a href="" class="header__toolbar__item">关于漫言</a>
		<a href="" class="header__toolbar__item">版权声明</a>
		<a href="" class="header__toolbar__item">意见反馈</a>
		<a href="" class="header__toolbar__item">成为作者</a>
	</div>
</header><!-- #masthead -->

<header id="masthead" class="header">
	<div class="maxwidth header__wrapper">
		<?php get_template_part( 'templates/partials/header-branding' ); ?>
		<?php get_template_part( 'templates/partials/header-menu' ); ?>
	</div>
</header><!-- #masthead -->

