<?php
/**
 * The template that displays all of the HTML <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<!-- TODO: this section below is specific to the site. Make it adaptable later. -->
  <link rel="copyright" href="/copyright">
  <meta name="keywords" content="comics, comicbooks, manga, anime, media, 漫画, 动画, 动漫, 二次元, 日本漫画, 日漫, 美漫, 美国漫画, 超级英雄, 欧漫, 欧洲漫画, 独立漫画, 艺术漫画, 地下漫画, 媒体, 漫画业界, 漫画推荐, 漫评, 漫画历史, 漫画考据, 漫画家, 漫画家访谈, 漫画家采访">
  <meta name="description" content="优质漫画文化媒体。我们致力于收集与输出中文互联网上最具长远留存价值的漫画内容，让你更了解漫画及其背后世界的魅力。">
  <meta name="google-site-verification" content="Um3LvoN1rqm7ZZY_ZPW2nSRY_SAe9mlcHfHCsobK5eI" />
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Roboto:400,700|" rel="stylesheet">
<?php if ( is_home() ) { ?>
  <link href="https://cdn.jsdelivr.net/npm/swiper@5.2.1/css/swiper.min.css" rel="stylesheet">
<?php } ?>
<?php wp_head(); ?>
</head>
