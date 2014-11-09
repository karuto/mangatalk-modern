<?php if (is_author()): ?>
  
<header id="mt-front" class="mt-front author-front">
<section class="article-cover">
  <div id="cover-story" class="cover-image" <?php post_class();
    // Retrieve cover image URL then set header's background
    $cover_img_url = get_the_author_meta( 'coverimage' );
    if ( $cover_img_url == "" ) {
      $cover_img_url = 'http://i.imgur.com/zk0ecX8.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
    <div class="cover-shade"></div>
    <div class="cover-image-inner">
      
    <div class="container">
      <div class="row">
      <div class="front-cover-content col-xs-12 col-sm-12 col-md-12">

        <h1 class="author-avatar">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150); ?>
        </h1>
      
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