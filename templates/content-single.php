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
  
  <div class="author-container">
    <div class="avatar">
      <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80); ?>
    </div>
    <div class="author-name">
      <?php echo get_the_author_link(); ?>
    </div>
    <p class="author-bio">
      <?php echo get_the_author_meta('description', $post->post_author ); ?> 
    </p>
    
  </div>
</div>

<!-- <div class="entry-extra-container">
<section class="container">
  <div class="row">

    <div class="col-sm-12 col-md-6 col-lg-8">
      <?php comments_template('/templates/comments.php'); ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>

        </aside>
      <?php endif; ?>

    </div>

  </div>
</section>
</div> -->

</article>
<?php endwhile; ?>
