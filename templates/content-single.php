<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

<header>
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
      <h1 class="h1 entry-title"><?php the_title(); ?></h1>
      <h3><?php the_excerpt(); ?></h3>
    </div>
  </div>

  <?php 
  echo "</div></section>"; 
  ?>
    
</header>

<div class="entry-content article-content-container" data-spy="scroll" data-target="#myScrollspy">
  <?php the_content(); ?>
</div>

<section class="container entry-extra-container">
  <?php comments_template('/templates/comments.php'); ?>
  
  <?php if (roots_display_sidebar()) : ?>
    <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
      <?php include roots_sidebar_path(); ?>
    </aside><!-- /.sidebar -->
  <?php endif; ?>

</section>

</article>
<?php endwhile; ?>
