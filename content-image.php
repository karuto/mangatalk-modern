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


  if ($post_meta_box_enlarge_check) {
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

    </article><!-- #post -->
  </div><!-- .layout-regular-post / .layout-featured-post -->
