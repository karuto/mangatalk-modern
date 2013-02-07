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
          _e( 'Archives', 'twentytwelve' );
        endif;
      ?></h1>
    </header><!-- .sub-header -->
  </div><!-- .layout-subheader-wrap -->

  <div id="main" class="layout-main-wrap"><!-- This defines the max-width framework -->
    <div class="layout-main-inner-wrap">

    <div id="primary" class="layout-primary-wrap">
      <div id="content" class="layout-content-wrap" role="main">



        <?php if ( have_posts() ) : ?>

          <div class="layout-posts-section">

          <?php /* Start the Loop */ 
          $counter = 1; /* Loop counter */ 
          echo '<div class="layout-posts-row">'; /* Print the first div row */ ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <?php 
            /* It loads content.php for normal single posts without formats */
            get_template_part('postitem');  

            if ($counter % 2 == 0) {
              /* For every 2 post items, we print a div row! */
              echo '</div><div class="layout-posts-row">';
            } else {
              echo '<div class="main-item-gap"></div>';
            }

            $counter++; /* Increment counter */ 
            ?>


          <?php endwhile; 
          $counter = 1; /* Make sure counter is reset */
          echo '</div>'; /* Make sure the open div is closed */ ?>

          <?php twentytwelve_content_nav( 'nav-below' ); ?>

          </div><!-- .layout-posts-section -->

        <?php else : ?>

          <?php get_template_part( 'content', 'none' ); ?>
          
        <?php endif; ?>

      </div><!-- .layout-content-wrap -->
    </div><!-- .layout-primary-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>