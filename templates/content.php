<!-- Although this is a generic content template, it's used as mt-block in loops. -->
<article class="block-panel">
  <div class="block-cover-wrapper">
    
    <div class="block-cover" <?php post_class();
     // Retrieve cover image URL then set header's background
    if ( has_post_thumbnail() ) {
      $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    } else {
      $cover_img_url = 'http://i.imgur.com/zk0ecX8.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
      <a href="<?php the_permalink(); ?>"><div class="cover-shade"></div></a>
    
      <div class="row block-content">
        <header class="block-category">
          <!-- #TODO: write the algorithm to retrieve the primary tag to display below. -->
          <span class="entry-category text-contrast"><a href="">专访</a></span>
        </header>
        
        <header class="block-header">
          <h4 class="entry-title text-contrast">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h4>
          <div class="entry-meta">
            <span class="entry-author-name text-contrast">
            By <a class="text-contrast" href="<?php echo get_author_posts_url( get_the_author_meta('ID'), $author_nicename ); ?>">
                <?php echo the_author_meta( 'display_name' ); ?>
              </a>
            </span> &nbsp; 
            <span class="entry-comment-count text-contrast alignright">
              <?php comments_number( '', 
              '1 <span class="glyphicon glyphicon-comment"></span>', 
              '% <span class="glyphicon glyphicon-comment"></span>' ); ?>
            </span>
          </div>
          <div class="excerpt hidden text-contrast">
            <?php the_excerpt(); ?>
          </div>
        </header><!-- .block-header -->
      </div><!-- .block-content -->
      
    </div><!-- .block-cover -->
    
  </div><!-- .block-cover-wrapper -->
</article>
