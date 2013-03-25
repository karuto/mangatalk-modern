<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <div id="main" class="layout-main-wrap"><!-- This defines the max-width framework -->
    <div class="layout-main-inner-wrap">

      <div id="primary" class="layout-primary-wrap">
        <div id="content" class="layout-content-wrap layout-single-post" role="main">

              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
                <?php comments_template( '', true ); ?>
              <?php endwhile; // end of the loop. ?>
            
        </div><!-- .layout-content-wrap -->
      </div><!-- .layout-primary-wrap -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>