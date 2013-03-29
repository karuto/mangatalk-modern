<?php
/**
 * The default template for main loop logic (loading post items).
 * Used for index/archive/search only, not for single post.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


    <?php if ( have_posts() ) : /* THE MAIN LOOP OF WORDPRESS */ ?>
      <div class="layout-posts-section">

      <?php /* Start the Loop */ 
      $counter = 1; /* Loop counter */ 
      echo '<div class="layout-posts-row">'; /* Print the first div row */ ?>


      <?php while ( have_posts() ) : the_post(); ?>

        <?php 
        $format = get_post_format();
        /* We want the loop to just display standard posts 
         * But problem is it hides it but it's still in the count
         * TODO: write a custom loop to only count standard posts */
        // if ( false === $format ) { /* Enable this line if you want standard posts only */
        if (true ) {
          /* False return value means this is a standard post */
          $format = 'standard';
          
          /* It loads postitem.php for normal single posts without formats */
          get_template_part('postitem');  

          if ($counter % 2 == 0) {
            /* For every 2 post items, we print a div row! */
            echo '</div><div class="layout-posts-row">';
          } else {
            /* And between the 2 post items in a row, we print a div gap! */
            echo '<div class="main-item-gap"></div>';
          }

          /* Increment counter */ 
          $counter++; 

        }
        ?>


      <?php endwhile; 

        $counter--; /* Since init value was 1 not 0, we gotta minus here */

        /* If number of post items is odd, we have to deal with last one 
           Because somehow the alignment is fucked and it's ugly to have just one
           TODO: Maybe we can find a CSS hack to resolve this issue
        */
        if ($counter & 1) {
          /* Print an extra post-item manually to fill the void of the row */
          ?>

          <article class="main-item-block main-item-style empty-item">
            <a href="#">
              <img src="/sg/t.gif" alt="" style="width:1px; height:10em; vertical-align:middle" />
              <h3 class="entry-summary">
                想让自己的文字出现在这里？<br>
                想看到更多有趣的内容？<br>
                请大胆地投稿给我们吧！<br>
              </h3>
            </a>
            
          </article>

          <?php 
        }

        $counter = 1; /* Make sure counter is reset */
        echo '</div>'; /* Make sure the open div is closed */ 
      ?>

      <?php twentytwelve_content_nav( 'nav-below' ); ?>

      </div><!-- .layout-posts-section -->

    <?php else : ?>

      <?php 
        /* This is the simpliest way to handle no posts situation. */
        get_template_part( 'content', 'none' ); 
        /* Everything below is optional fancy markup. */
      ?>

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