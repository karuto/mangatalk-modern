<?php
/**
 * The default template for displaying content. 
 * Used for index/archive/search only, not for single post.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

  <article id="post-<?php the_ID(); ?>" 
    <?php post_class('main-item-block main-item-style'); ?>>


<!-- 
     <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
      <div class="featured-post">
        <?php _e( 'Featured post', 'twentytwelve' ); ?>
      </div>
    <?php endif; ?> 
 -->


    <?php 
    /* Retrieving the featured image URL of this post */
    $image = wp_get_attachment_image_src( 
    get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

    <?php 
    if ($image[0] == '') {
      /* If this post does NOT have a featured image, we set one */
      $image[0] = "http://www.wordofthenerdonline.com/wp-content/uploads/2012/03/saga-2-1311467620.jpg"; } ?>

    <!-- /* Else create a div and set it as background down below */ -->
    <div class="entry-masthead" 
    style="background-image: url('<?php echo $image[0]; ?>')"></div>


    <header class="entry-header">

      <?php if ( is_single() ) : ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
      <?php endif; // is_single() ?>
<!-- 
      <?php if ( comments_open() ) : ?>
        <div class="comments-link">
          <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
        </div>
      <?php endif; // comments_open() ?>
 -->

    </header><!-- .entry-header -->


    <?php if ( is_search() ) : // Only display full content for search results
    // TODO: change this when implementing actual search ?>

      <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
      </div><!-- .entry-content -->

    <?php else : // Only display excerpts for regular pages ?>    

      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->

    <?php endif; ?>


    <footer class="entry-meta">

      <?php twentytwelve_entry_meta(); ?>
      <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>

      <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>

        <div class="author-info">
          <div class="author-avatar">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
          </div><!-- .author-avatar -->

          <div class="author-description">
            <h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
            <p><?php the_author_meta( 'description' ); ?></p>
            <div class="author-link">
              <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
              </a>
            </div><!-- .author-link -->
          </div><!-- .author-description -->
        </div><!-- .author-info -->
      <?php endif; ?>

    </footer><!-- .entry-meta -->


  </article><!-- #post -->
