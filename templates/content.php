<article class="block-panel">
  <div class="block-cover-wrapper">
    
    <div class="block-cover overlay" <?php post_class();
     // Retrieve cover image URL then set header's background
    if ( has_post_thumbnail() ) {
      $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    } else {
      $cover_img_url = 'http://i.imgur.com/zk0ecX8.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
    
      <div class="row block-content">
        
        <header class="block-header">
          
          <h2 class="entry-title text-contrast"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="entry-summary text-contrast">
            <?php the_excerpt(); ?>
          </div>
          
        </header>
        
      </div><!-- .block-content -->
      
    </div><!-- .block-cover -->
    
  </div><!-- .block-cover-wrapper -->
</article>
