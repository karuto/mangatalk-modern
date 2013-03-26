<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <div id="primary" class="layout-primary-wrap">
    <div id="content" class="layout-content-wrap" role="main">
 

  <div class="flexslider">
    <ul class="slides">
      <li>
        <img src="http://localhost/2013/wp-content/uploads/2013/03/7O6t0-1024x346.png" />
        <p class="flex-caption">This image is wrapped in a link!</p>
      </li>
      <li>
        <img src="http://i.imgur.com/FV2MV.png" />
        <p class="flex-caption">This image is wrapped in a link!</p>
      </li>
    </ul>
  </div>
  
<!--     <div class="layout-hero main-item-style">
    </div> -->

    <?php get_template_part('mainlooplogic'); ?>

    </div><!-- .layout-content-wrap -->
  </div><!-- .layout-primary-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>