<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>  

<div class="entry-content article-content-container">
  <?php the_content(); ?>
</div>

<div class="entry-meta-container article-content-container">

  <?php get_template_part('templates/content', 'relatedposts'); ?>

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
           <?php the_tags( '<span>Published under: ', ' | ', '</span>' ); ?>
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
