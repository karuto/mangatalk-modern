<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>  

<header class="article-front">
  <?php // Retrieve cover image URL then set header's background
  if ( has_post_thumbnail() ) {
    $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
  ?>
  <section class="article-cover is-darkBackgrounded">
    <div class="cover-image" style="background-image: url('<?php echo $cover_img_url; ?>');">
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
      
        </div><!-- .cover-content-wrapper -->
      </div><!-- .cover-content -->
    </div><!-- .cover-image -->
  </section><!-- .article-cover -->
  <?php 
  } else {
  ?>
    <section class="article-header article-header-no-cover">
      <h2 class="h2 entry-title"><?php the_title(); ?></h2>
    </section>
  <?php 
  }
    // echo '<section class="article-cover is-darkBackgrounded">' .
    //   '<div class="cover-image" style="background-image: url(' . $cover_img_url . ');">';
  
  ?>


  <?php 
  echo ""; 
  ?>
    
</header>




<div class="entry-content article-content-container" data-spy="scroll" data-target="#myScrollspy">
  <?php the_content(); ?>
</div>

<div class="entry-meta-container article-content-container">
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
  

  <div id="author-info" class="author-info clearfix">  
    <header class="meta-header author-info-header"> 本文作者&emsp;|&emsp;Author Information</header>
    <div class="row">
      <div class="avatar col-xs-3 col-md-3">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150); ?>
      </div>
      <div class="col-xs-9 col-md-9">
        <div class="author-name">
          <?php echo get_the_author_link(); ?>
        </div>
        <p class="article-meta-spec">
           Written on <?php echo get_the_date(); ?>. 
           <?php the_tags( '<span>Tags: ', ' | ', '</span>' ); ?>
        </p>
        <p class="author-bio">
          <?php echo get_the_author_meta('description', $post->post_author ); ?> 
        </p>
      </div>

    </div><!-- .row -->
  
  </div><!-- .author-info -->
  
  
  <div class="comments-root-container clearfix">
    <header class="meta-header author-info-header"> 留言讨论&emsp;|&emsp;Goings-On About Town</header>
    <div class="row">
      <?php comments_template('/templates/comments.php'); ?>
  
    <!-- <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside>
    <?php endif; ?> -->

    </div><!-- .row -->
  
  </div><!-- .comments-container -->
    
</div><!-- .entry-meta-container -->


</article>
<?php endwhile; ?>
