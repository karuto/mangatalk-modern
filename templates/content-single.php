<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

<header>
  <?php // Retrieve cover image URL then set header's background
  if ( has_post_thumbnail() ) {
    $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    echo '<section class="article-cover is-darkBackgrounded">' .
      '<div class="cover-image" style="background-image: url(' . $cover_img_url . ');">';
  } 
  ?>

  <div class="cover-content container">
      <h1 class="h1 entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
  </div>

  <?php 
  echo "</div></section>"; 
  ?>
    
</header>

<div class="wrap container" role="document">
  <div class="content row">
    <main class="main <?php echo roots_main_class(); ?>" role="main">
      
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>

    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->

</article>
<?php endwhile; ?>
