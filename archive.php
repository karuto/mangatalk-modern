<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<!-- TODO: FIX THE TOP EMTPY MARGIN BUG!!! -->

  <div class="layout-subheader-wrap">
    <header class="sub-header" roll="banner">

      <h1 class="archive-title sub-title"><?php
        if ( is_day() ) :
          printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
          printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . 
            get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
        elseif ( is_year() ) :
          printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . 
            get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
        else :
          // _e( 'Archives', 'twentytwelve' );
          printf('文章合集');
        endif;
      ?></h1>
    </header><!-- .sub-header -->
  </div><!-- .layout-subheader-wrap -->

  <div id="main" class="layout-main-wrap"><!-- This defines the max-width framework -->
    <div class="layout-main-inner-wrap clearfix-modern">

    <div id="primary" class="layout-primary-wrap">
      <div id="content" class="layout-content-wrap" role="main">

        <?php get_template_part('mainlooplogic'); ?>

      </div><!-- .layout-content-wrap -->
    </div><!-- .layout-primary-wrap -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>