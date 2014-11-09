<?php if (is_author()): ?>
  
<header id="mt-front" class="mt-front">
<section class="article-cover">
  <div id="cover-story" class="cover-image" <?php post_class();
     // Retrieve cover image URL then set header's background
    if ( has_post_thumbnail() ) {
      $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    } else {
      $cover_img_url = 'http://i.imgur.com/zk0ecX8.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
    <div class="cover-shade"></div>
    <div class="cover-image-inner">
      
    <div class="container">
      <div class="row">
      <div class="front-cover-content col-xs-12 col-sm-12 col-md-12">
        <h1 class="entry-title">
          <a id="cover-story-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>
            
        <!-- <h4 class="h4 entry-comment-count alignright">
          By Author &nbsp;
          <span class="glyphicon glyphicon-heart"></span>3
          &nbsp;
          <span class="glyphicon glyphicon-comment"></span>3
        </h4> -->
      
      </div><!-- .front-cover-content -->
      </div><!-- .row -->
    </div><!-- .container -->
    
  </div><!-- .cover-image-inner -->
  </div><!-- .cover-image -->
</section>
</header>

<?php else: ?>

<div class="page-header">
  <header class="meta-header">
    <?php echo roots_title(); ?> 文集
  </header>
</div>

<?php endif; ?>