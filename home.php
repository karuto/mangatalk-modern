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

<!-- 
    <div class="layout-hero main-item-style">
    </div>
-->
      
    <?php if ( have_posts() ) : /* THE MAIN LOOP OF WORDPRESS */ ?>
      <div class="layout-posts-section">

      <?php /* Start the Loop */ 
      $counter = 1; /* Loop counter */ 
      echo '<div class="layout-posts-row">'; /* Print the first div row */ ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <?php 
        /* It loads content.php for normal single posts without formats */
        get_template_part( 'content', get_post_format() );  

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

      <article id="post-0" class="post no-results not-found">

      <?php if ( current_user_can( 'edit_posts' ) ) :
        // Show a different message to a logged-in user who can add posts.
      ?>
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
        </header>

        <div class="entry-content">
          <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
        </div><!-- .entry-content -->

      <?php else :
        // Show the default message to everyone else.
      ?>
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
        </header>

        <div class="entry-content">
          <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
          <?php get_search_form(); ?>
        </div><!-- .entry-content -->
      <?php endif; // end current_user_can() check ?>

      </article><!-- #post-0 -->

    <?php endif; // end have_posts() check ?>

    </div><!-- #layout-content-wrap -->
  </div><!-- #layout-primary-wrap -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>