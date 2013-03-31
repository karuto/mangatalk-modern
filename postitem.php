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

      <h3 class="entry-meta roboto-font">
        By 
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
        on <?php echo get_the_date(); ?> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
      </h3><!-- .entry-postitem-meta -->

    </header><!-- .entry-header -->

    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

  </article><!-- #post -->