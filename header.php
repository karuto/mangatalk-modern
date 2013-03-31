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
  <script src="<?php echo get_template_directory_uri(); ?>/js/mangatalk.js"></script>
  <!-- Flexslider support, can be used on both list pages and single post pages -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css">

  <!-- Activate the flex slider markup -->
  <script type="text/javascript" charset="utf-8">
    // Including jQuery in WordPress (The Right Way)
    var $j = jQuery.noConflict();
    $j(window).load(function() {
      $j('#global-hero-slider').flexslider({
        animation: 'fade',
        animationLoop: true,
        pauseOnAction: true,
        pauseOnHover: true,
        controlNav: false
      });
      $j('.flexslider').flexslider();
    });
  </script>

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

      <hgroup class="site-title-wrap">
        <h1 class="site-title">
<!--           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a> -->
          <?php get_template_part('mangatalk-dropdown'); ?>

        </h1>
      </hgroup>


      <nav class="external-nav" role="navigation">
        <li class="external-item"><?php get_search_form(); ?></li>
        <li class="external-item"><a href="#">搜索</a></li>
        <li class="external-item"><a href="http://weibo.com/mangatalk">微博</a></li>
        <li class="external-item"><a href="<?php bloginfo('rss2_url'); ?>">订阅</a></li>
        <li class="external-item"><a href="<?php bloginfo('rss2_url'); ?>">给我们留言建议</a></li>          
      </nav><!-- #site-navigation -->

    </header><!-- #masthead -->


  </div><!-- .layout-header-wrap -->

  <!-- <div class="layout-tophero"></div> -->


  
  <?php 
    if ( is_page() || is_post_type_archive() || is_archive() || is_search() ) {
      // If it's a type of webpage (see above) that needs a subheader
      // We will define the max-width framework after the subheader, thus blank
      $has_subheader = true;
    } else {
      // This defines the max-width framework here since no subheader exists
      echo '<div id="main" class="layout-main-wrap non-archive">'; 
      // This container below is where the float trouble takes place
      echo '<div class="layout-main-inner-wrap clearfix-modern">';      
    }
  ?>