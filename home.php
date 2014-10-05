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
    <div class="cover-image-inner">
      
    <div class="container">
      <div class="row">
      <div class="front-cover-content col-xs-12 col-sm-12 col-md-12">
        <h4 class="h4 entry-title">
          <a id="cover-story-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <div class="entry-subtitle">
          <?php the_excerpt(); ?>
        </div>
            
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

<?php
/* Restore original Post Data */
wp_reset_postdata();
?>

<div class="mt-story-banner">
<div class="container">
  <div class="story-banner-title">
    <span id="" class="alignleft">
    <a class="story-banner-link" style="color: white" href="/story">
      一个故事或许不能改变世界，但她能改变你与我的人生。<strong>讲述你的故事 ›</strong>
    </a>
    </span>
    <span id="" class="alignright">
      <span id="story-remove" class="glyphicon glyphicon-remove"></span>
    </span>
  </div>
</div>
</div>


<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="mt-list container">
  <header class="meta-header">近期文章&emsp;|&emsp;Recent Readings</header>
   <?php get_template_part('templates/loop', 'grid'); ?>

  <div class="row"> 
    <a class="h3 archive-entry-link" href='category/article' alt="阅读更多文章">
    <span id="archive-entry" class="glyphicon glyphicon-chevron-down"></span>
    </a>
  </div>

</div><!-- .mt-list -->

<div class="mt-action-call">
  <section class="container">
    <div class="row">
      <!-- TODO: Call for action: WRITE FOR MANGATALK, CONNECT WITH US -->
    </div><!-- .row -->
  </secion>
</div>

<div class="container">
  <section class="promo-section row">
    
    <div class="promo-block col-sm-6 col-md-6 col-lg-6">
      <header class="promo-header">
        <a href="https://mangatalk.typeform.com/to/LpHD8h" target="_blank">填写调查问卷</a>
      </header>
      <span class="promo-text text-muted">您的反馈，对我们意义重大。</span>
    </div>
    <div class="promo-block col-sm-6 col-md-6 col-lg-6">
      <header class="promo-header">
        <a href="http://mangatalk.us4.list-manage.com/subscribe?u=3a348cad64b3e0662b001c652&id=6df5ae571d" target="_blank">订阅漫言漫报</a>
      </header>
      <span class="promo-text text-muted">每季文摘，以及最亲密联络。</span>
    </div>
    
    
  </section>
</div>


<!-- <?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?> -->