  <?php  
      $orig_post = $post; // store variable
      global $post;  
      $tags = wp_get_post_tags($post->ID);
      if ($tags) {  
        $tag_ids = array();  
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
        $args=array(  
          'tag__in' => $tag_ids,  
          'post__not_in' => array($post->ID),  
          'posts_per_page'=>5, // Number of related posts to display.
        );  
      
        $related_posts_query = new wp_query( $args );  
        
        if ( $related_posts_query->have_posts() ) { ?>

  <div id="related-article-list" class="related-article-list clearfix">  
    <header class="meta-header related-article-header">联动阅读&emsp;|&emsp;Further Readings</header>
  
  <?php   while( $related_posts_query->have_posts() ) {  
            $related_posts_query->the_post(); ?> 
      
      <section class="mt-block mini-block clearfix">
        <?php get_template_part('templates/content', get_post_format()); ?>
      </section>
      
  <?php   } // endwhile; ?> 
  
  </div><!-- .related-article-list -->
  
  <?php } else { ?>
      
  <?php 
        } // endif have_posts();
      } // endif $tags;
      $post = $orig_post; // restore variables
      wp_reset_query();
  ?>  