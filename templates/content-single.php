<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>  

<header class="article-front">
  <?php // Retrieve cover image URL then set header's background
  if ( has_post_thumbnail() ) {
    $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
  } else {
    $cover_img_url = 'http://i.imgur.com/zk0ecX8.jpg';
  }
    echo '<section class="article-cover is-darkBackgrounded">' .
      '<div class="cover-image" style="background-image: url(' . $cover_img_url . ');">';
  
  ?>

  <div class="cover-content article-content-container">
    <div class="cover-content-wrapper">
      <h1 class="h2 entry-title"><?php the_title(); ?></h1>
      <h4 class="h4 entry-subtitle"><?php the_excerpt(); ?></h4>
            
      <h4 class="h4 entry-comment-count alignright">
        By <?php echo get_the_author(); ?> &nbsp;
        <span class="glyphicon glyphicon-heart"></span> <?php echo get_comments_number(); ?>
        &nbsp;
        <span class="glyphicon glyphicon-comment"></span> <?php echo get_comments_number(); ?>
      </h4>
      
    </div>
  </div>

  <?php 
  echo "</div></section>"; 
  ?>
    
</header>




<div class="entry-content article-content-container" data-spy="scroll" data-target="#myScrollspy">
  <?php the_content(); ?>
</div>

<div class="entry-meta-container article-content-container">
  <div class="divider"></div>
  
  <div class="relatedposts">  
  <h3>Related posts</h3>  
  <?php  
      $orig_post = $post;  
      global $post;  
      $tags = wp_get_post_tags($post->ID);  
      
      if ($tags) {  
      $tag_ids = array();  
      foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
      $args=array(  
      'tag__in' => $tag_ids,  
      'post__not_in' => array($post->ID),  
      'posts_per_page'=>4, // Number of related posts to display.  
      'caller_get_posts'=>1  
      );  
      
      $my_query = new wp_query( $args );  
  
      while( $my_query->have_posts() ) {  
      $my_query->the_post();  
      ?>  
      
      <div class="relatedthumb">  
          <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />  
          <?php the_title(); ?>  
          </a>  
      </div>  
      
      <? }  
      }  
      $post = $orig_post;  
      wp_reset_query();  
      ?>  
  </div>
  
  <div class="author-container">
    <div class="avatar">
      <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80); ?>
    </div>
    <div class="author-name">
      <?php echo get_the_author_link(); ?>  发表于 <?php echo get_the_time('Y/m/d g:i:s A'); ?>
    </div>
    <p class="author-bio">
      <?php echo get_the_author_meta('description', $post->post_author ); ?> 
    </p>
    
  </div>
</div>


</article>
<?php endwhile; ?>
