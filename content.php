<?php
/**
 * The default template for displaying content. 
 * Used for regular single post only, not for index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php 
  // Before entering main logic, retrieve meta box data for format detection
  // CAUTION: Mangatalk Meta Box plugin is required in your plugin directory
  $post_meta_box_likes = get_post_meta( $post->ID, "post_meta_box_likes", true );
  $post_meta_box_interface = get_post_meta( $post->ID, "post_meta_box_interface", true );
  $post_meta_box_enlarge_check = get_post_meta( $post->ID, "post_meta_box_enlarge_check", true );

  // Printing stuff out for testing
  // echo $post_meta_box_likes . " + " . $post_meta_box_interface . " + " . $post_meta_box_enlarge_check;

  if ($post_meta_box_interface == "feature") {
    echo '<div class="layout-feature-post">';
  } else {
    echo '<div class="layout-regular-post">';
  }
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('main-item-block main-item-style'); ?>>

<!--      <div class="entry-topimg"><?php the_post_thumbnail('full'); ?></div>
  TODO: Potential solution using images rather than CSS background but JS required:
  http://stackoverflow.com/questions/643500/html-ie-stretch-image-to-fit-preserve-aspect-ratio
-->

      <?php 
      /* Retrieving the featured image URL of this post */
      $image = wp_get_attachment_image_src( 
      get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

      if ($image[0] == '') {
        /* If this post does NOT have a featured image, we set one */
        $image[0] = "http://gnnaz.com/wp-content/uploads/2012/12/Saga-e1357012394969.jpg"; } 

        /* Else create a div and set it as background down below */?>
      
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

        <?php if ( 'post' == get_post_type() ) : ?>
        <h3 class="entry-meta roboto-font">Written By 
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
          on <?php echo get_the_date(); ?> 
          <b class="red">+</b> 
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?></a>  
          <?php the_tags( '<span style="">Tagged with ', '<span style="color:#ce5333"> | </span>', '</span>' ); ?>  
          <b class="red">+</b> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
          <?php edit_post_link( __( '- Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
          <!--
          + <strong><?php if(function_exists('wpcc_output_navi')) wpcc_output_navi(); ?></strong>
        -->
          <br>
        </h3>
        <?php endif; ?>


      </header><!-- .entry-header -->


      <?php if ( is_search() ) : // Only display full content for search results
      // TODO: change this when implementing actual search ?>

        <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

      <?php else : // Only display excerpts for regular pages ?>    

        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->

      <?php endif; ?>

<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>

      <footer class="entry-copyright">

        <h3>版权声明：本文采用<a href="http://creativecommons.org/licenses/by-nc-sa/2.5/deed.zh"> 
        BY-NC-SA 中国大陆许可协议</a> 授权，可以自由转载，但转载时请务必
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '《%s》的原文链接', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>"
         rel="bookmark"><strong>以超链接形式</strong>标明本文原始出处</a>、
         <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
          作者信息</a>及本声明，并且不得商用。任何违反协议的侵权行为将被追究法律责任。</h3>
        
        <span class="pspace social-stuff"><?php if(function_exists('wp_sns_share')) echo wp_sns_share();?></span>

      </footer><!-- .entry-copyright -->

      <div class="author-info">
        <div class="author-avatar">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 100 ) ); ?>
        </div><!-- #author-avatar -->
        
        <div class="author-meta">
          <h3 class="author-name roboto-font"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
              rel="author"><?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?></a></h3><br/>
          <h4 class="author-desc roboto-font"><?php the_author_meta( 'description' ); ?></h4>
        </div><!-- .author-meta -->
      </div><!-- .author-info -->


    </article><!-- #post -->
  </div><!-- .layout-regular-post / .layout-featured-post -->
