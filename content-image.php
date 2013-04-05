<?php
/**
 * The template for displaying posts in the Image post format
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



  if ($post_meta_box_enlarge_check == "on") {
    // Single column like feature article for "enlarged" image post
    echo '<div class="layout-feature-post">';
  } else {
    echo '<div class="layout-regular-post">';
  }

  // Search for all attachments for the current post
  $args = array(
      'post_type' => 'attachment',
      // -1 for getting all, 1 for just getting the first one
      'numberposts' => 1, 
      'offset' => 0,
      'orderby' => 'menu_order',
      'order' => 'asc',
      'post_status' => null,
      'post_parent' => $post->ID,
      );
  /*
  // As of WP 3.5, this is the only way to get specific size of thumbnail's URL
  echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium')[0] . "<br>";
  $attachments = get_posts($args);
  if ($attachments) {
      foreach ($attachments as $attachment) {
        // Returns a full URI for an attachment file or false on failure
      echo wp_get_attachment_image_src( $attachment->ID, 'medium')[0] . "<br>";
    }
  }
  */

?>

    <article id="post-<?php the_ID(); ?>" 
      <?php post_class('main-item-block main-item-style'); ?>>

      <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
      </div><!-- .entry-content -->

      <div class="entry-like">
        <!-- <span class="like-pretext">喜欢就赞一下</span> -->
        <div class="like-wrapper">
          <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
        </div>
      </div>

      <footer class="entry-copyright">

        <h2 class="entry-title roboto-font"><?php the_title(); ?></h2>
        <h3 class="entry-meta roboto-font">Written on <?php echo get_the_date(); ?> 
          <b class="red">+</b> 
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?></a>  
          <?php the_tags( '<span style="">Tagged with ', '<span style="color:#ce5333"> | </span>', '</span>' ); ?>  
          <b class="red">+</b> <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
          <?php edit_post_link( __( '- Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
          <?php if(function_exists('wpcc_output_navi')) echo " + "; wpcc_output_navi(); ?>
          <br>
        </h3>
        
      </footer><!-- .entry-copyright -->

      <footer class="entry-comicbits-meta">

        <span class="roboto-font">
          <a href="/category/comicbits" target="_blank">ComicBits</a>
          是漫言除了传统长篇文章之外所开辟的一个崭新栏目。<br>
          在这里，我们以轻量级的高清图片为载体，记录并分享全球漫画界值得收藏的分镜绘稿、优秀设计与业界写真。
        </span>
        
        <span class="pspace social-stuff"><?php if(function_exists('wp_sns_share')) echo wp_sns_share();?></span>

      </footer><!-- .entry-copyright -->


    </article><!-- #post -->
  </div><!-- .layout-regular-post / .layout-featured-post -->
