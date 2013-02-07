<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <div id="primary" class="layout-primary-wrap">
    <div id="content" class="layout-content-wrap" role="main">

      <?php $format = get_post_format();

        // TODO: Stop using 'aside' format as featured post! Use meta box instead.
        if ( $format == 'aside' )
          // If it's a featured post, we print nothing to keep it a single column
          echo '';
        else 
          // For regular posts, we print out the CSS table & row for two columns
          echo '<div class="layout-posts-section">';
          echo '<div class="layout-posts-row">';

      ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', get_post_format() ); ?>

            <nav class="nav-single">
              <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
              <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . 
              _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
              <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . 
              _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
            </nav><!-- .nav-single -->

            <?php comments_template( '', true ); ?>

          <?php endwhile; // end of the loop. ?>
          
        </div><!-- .layout-post-row -->
      </div><!-- .layout-posts-section -->

    </div><!-- .layout-content-wrap -->
  </div><!-- .layout-primary-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>