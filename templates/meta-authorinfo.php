  <div id="author-info" class="author-info clearfix">  
    <header class="meta-header author-info-header">本文作者&emsp;|&emsp;Author of Honor</header>
    <div class="row">
      <!-- <div class="col-xs-12 col-md-12 author-info-content"> -->
      <div class="col-xs-12 col-md-12">
        <div class="alignleft">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150); ?>
        </div>
        <div class="author-name">
          <?php get_author_posts_url( $author_id, $author_nicename ); ?>
          
          <a href="http://mangatalk.net/author/<?php echo the_author_meta( 'user_nicename' ); ?>" target="_blank"><?php echo the_author_meta( 'display_name' ); ?></a>
        </div>
        <p class="article-meta-spec">
           Written on <?php echo get_the_date(); ?>&nbsp;<?php edit_post_link(); ?>
           <br>
           <?php the_tags( 'Published under ', ', ', '' ); ?>
        </p>
        <p class="author-bio">
          <?php echo get_the_author_meta('description', $post->post_author ); ?> 
        </p>
      </div>

    </div><!-- .row -->
  
  </div><!-- .author-info -->