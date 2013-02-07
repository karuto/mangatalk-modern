<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


  <!-- TODO: Change to dynamic loading scripts later. Refer to:
  http://codex.wordpress.org/Function_Reference/wp_enqueue_script#jQuery_noConflict_wrappers -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>


  <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
  <![endif]-->
  <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<div id="page" class="hfeed layout-page-wrap">

  <div class="layout-header-wrap">

    <header id="masthead" class="site-header" role="banner">

      <hgroup>
        <h1 class="site-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
      </hgroup>


      <nav id="site-navigation" class="main-navigation" role="navigation">

        <h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
<!--
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
-->

      </nav><!-- #site-navigation -->


      <?php $header_image = get_header_image();
      if ( ! empty( $header_image ) ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" 
          width="<?php echo get_custom_header()->width; ?>" 
          height="<?php echo get_custom_header()->height; ?>" alt="" />
        </a>
      <?php endif; ?>


    </header><!-- #masthead -->


  </div><!-- .layout-header-wrap -->

  <!-- <div class="layout-tophero"></div> -->


  <div id="main" class="layout-main-wrap">
    <div class="layout-main-inner-wrap">