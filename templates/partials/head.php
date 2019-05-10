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
  <meta name="keywords" content="software, engineering, developer, web, design, frontend, front-end, user experience, html, css, html5, css3, javascript, reactjs, technology, productivity, essay">
  <meta name="description" content="Personal website of software engineer Vincent Zhang, with professional portfolio information, projects, articles on front-end technology and long-form essays.">
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Roboto:400,700|" rel="stylesheet">
<?php wp_head(); ?>
</head>