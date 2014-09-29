
<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>  
  <h2 class="entry-title-holder"><?php the_title(); ?></h2>
  <div class="entry-content article-content-container">
    <?php the_content(); ?>
  </div>

  <div class="entry-meta-container article-content-container">

    <?php get_template_part('templates/meta', 'relatedposts'); ?>
    <?php get_template_part('templates/meta', 'authorinfo'); ?>
  
    <div class="comments-root-container clearfix">
      <header class="meta-header author-info-header">留言讨论&emsp;|&emsp;Goings-On About Town</header>
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
