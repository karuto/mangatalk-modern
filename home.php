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
 

<!-- TODO: Find a way to make caption elegant, until then I'll freeze the development on this. -->
<!--   <div id="global-hero-slider" class="flexslider">
    <ul class="slides">
      <li>
        <img style="height:250px;" src="http://localhost/2013/wp-content/uploads/2011/02/R1-08398-0001x-1024x691.jpg" />
        <p class="flex-caption">This image is wrapped in a link!</p>
      </li>
      <li>
        <img style="height:250px;" src="http://i.imgur.com/FV2MV.png" />
        <p class="flex-caption">This image is wrapped in a link 2!</p>
      </li>
    </ul>
  </div> -->
  
<!--     <div class="layout-hero main-item-style">
    </div> -->

    <!-- Note: I wrote a plugin for excluding "ComicBits" category from main loop.
    Please refer to modify-main-loop-by-v.php in wp-content/plugins directory. -->

  <script type="text/javascript" charset="utf-8">
    /* @package MangaTalk
     * Author: Karuto
     * Make the Image Post widget the same height as the first main-item-block
     */
    $j(function(){
      var itemHeight = $j(".main-item-block:first-child").height();
      // alert(itemHeight);
      var widgetMastheadHeight = itemHeight - 90;
      $j(".ImagePostWidget .entry-header").css("margin-top", widgetMastheadHeight);
    });
  </script>

    <?php get_template_part('mainlooplogic'); ?>

    </div><!-- .layout-content-wrap -->
  </div><!-- .layout-primary-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>