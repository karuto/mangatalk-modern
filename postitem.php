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
    <?php post_class('main-item-block main-item-style post-item'); ?>>


<!-- 
     <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
      <div class="featured-post">
        <?php _e( 'Featured post', 'twentytwelve' ); ?>
      </div>
    <?php endif; ?> 
 -->


    <?php 
    /* Retrieving the featured image URL of this post */
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>
    <?php 
    if ($image == '') {
      /* If this post does NOT have a featured image, we set one */
      $image = "http://www.wordofthenerdonline.com/wp-content/uploads/2012/03/saga-2-1311467620.jpg"; } ?>

    <!-- /* Else create a div and set it as background down below */ -->
    <div class="entry-masthead" 
    style="background-image: url('<?php echo $image; ?>')">
      <a href="<?php the_permalink(); ?>" class="entry-masthead-link">&emsp;</a>        
    </div>


    <header class="entry-header">

      <?php if ( is_single() ) : ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
      <?php endif; // is_single() ?>

<!--TODO
      <div class="author-link">
        BY 
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
          <?php echo get_the_author(); ?>
        </a>
      </div><!-- .author-link -->
      <h3 class="entry-meta roboto-font">
        By 
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
        on <?php echo get_the_date(); ?> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
      </h3><!-- .entry-postitem-meta -->

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

<!--       <div class="entry-readmore">
        <span class="readmore roboto">MORE</span>
      </div> -->

    <?php endif; ?>


  </article><!-- #post -->