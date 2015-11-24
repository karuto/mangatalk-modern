<?php get_template_part('templates/home/cover'); ?>

<header id="mt-front" class="mt-front">
<section class="article-cover">
  <div id="cover-story" class="cover-image" <?php post_class();
     // Retrieve cover image URL then set header's background
    if ( has_post_thumbnail() ) {
      $cover_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    } else {
      $cover_img_url = get_template_directory_uri().'/assets/img/thumb_default_lg.jpg';
    }
    echo 'style="background-image: url(' . $cover_img_url . ');"';
    ?>>
    <div class="cover-shade"></div>
    <div class="cover-image-inner">

    <div class="container">
      <div class="row">
      <div class="front-cover-content col-xs-12">
        <h1 class="entry-title">
          <a id="cover-story-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>
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

<?php get_template_part('templates/home/component', 'home'); ?>

<div class="mt-list container">
  <header class="meta-header">近期文章&emsp;|&emsp;Recent Readings</header>
   <?php 
   /* TODO: use loop-grid.php to dynamically judge / load content instead of below
     // $renderArticles = 1; // Flag to control loop content
     // via http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/
     // include(locate_template('templates/loop-grid.php'));
     // $renderArticles = 0;
   */
     
     // Helper function to output a single block
     function outputBlock() {
       echo '<section class="mt-block col-xs-12 col-sm-6 col-md-4 col-lg-3">';
       get_template_part('templates/content', get_post_format());
       echo '</section>';
     }
     // Retrieve 'meta' category id by slug
     $meta_category_object = get_category_by_slug('meta');
     $scomix_category_object = get_category_by_slug('scomix');
     $article_category_object = get_category_by_slug('article');
     $meta_category_id = $meta_category_object->term_id;
     $scomix_category_id = $scomix_category_object->term_id;
     $article_category_id = $article_category_object->term_id;
     // $query_args = 'cat='.'-'.$meta_category_id.',-'.$scomix_category_id;
     $query_args = 'cat='.'-'.$meta_category_id;
     
     echo '<div class="row">';
     $query = new WP_Query($query_args); // Exclude meta cat
     while ($query->have_posts()) {
       $query->the_post();
       outputBlock();
     }
     wp_reset_postdata();
     echo '</div>'; 
   ?>

  <div class="archive-entry-link"> 
    <a class="mt-meta-button" href='<?php echo esc_url(get_category_link( $article_category_id )); ?>' alt="阅读更多文章">阅读更多文章</a>
  </div>

</div><!-- .mt-list -->

<div class="mt-list container">
  <header class="meta-header">漫言动态&emsp;|&emsp;Editorial Updates</header>
   <?php
   /* TODO: use loop-grid.php to dynamically judge / load content instead of below
     // $renderMeta = 1; // Flag to control loop content
     // via http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/
     // include(locate_template('templates/loop-grid.php'));
     // $renderMeta = 0;
   */
     // Helper function to output a single block
     function outputMetaBlock() {
       echo '<section class="mt-block col-xs-12 col-sm-6 col-lg-3">'; 
       get_template_part('templates/content', get_post_format()); 
       echo '</section>';
     }
     // Retrieve 'meta' category id by slug
     $meta_category_object = get_category_by_slug('meta');
     $meta_category_id = $meta_category_object->term_id;
     $query_args = 'cat='.$meta_category_id.'&posts_per_page=2';
   
     echo '<div class="row">';
     $query = new WP_Query($query_args); // Only meta cat
     while ($query->have_posts()) {
       $query->the_post();
       outputMetaBlock();
     }
     include(locate_template('templates/content-promotions.php'));
     wp_reset_postdata();
     echo '</div>';
   ?>

  <div class="archive-entry-link"> 
    <a class="mt-meta-button" href='<?php echo esc_url(get_category_link( $meta_category_id )); ?>' alt="阅读更多动态">阅读更多动态</a>
  </div>

</div><!-- .mt-list -->

<div class="mt-action-call">
  <section class="container">
    <div class="row">
      <!-- TODO: Call for action: WRITE FOR MANGATALK, CONNECT WITH US -->
    </div><!-- .row -->
  </secion>
</div>

<!-- <div class="container">
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
</div> -->


<!-- <?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?> -->