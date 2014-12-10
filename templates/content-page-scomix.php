<?php
/*
 * Template Name: Scomix
 * Description: A Page Template for the homepage of scomix
 */
?>
<div class="page-content page-fullwidth page-scomix">
  
<header class="mt-front">
<section class="article-cover">
  <div id="cover-story" class="cover-image">
    <div class="cover-image-inner">
      
    <div class="container">
      <div class="row">
      <div class="page-cover-content col-xs-12 col-sm-12 col-md-12">
        <h3 class="page-title">
          讲述你的故事
        </h3>
        <div class="entry-subtitle">
          一个故事或许不能改变世界，但她能改变你与我的人生。<br><br><br>
          <a style="color: white;" class="page-intro-link" href="#story-start">
            投稿给漫言<br>
            <span id="story-entry" class="glyphicon glyphicon-chevron-down"></span>
          </a>
        </div>
      
      </div><!-- .front-cover-content -->
      </div><!-- .row -->
    </div><!-- .container -->
    
  </div><!-- .cover-image-inner -->
  </div><!-- .cover-image -->
</section>
</header>

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
     
     echo '<div class="row">';
     $query = new WP_Query( 'cat=-43' ); // Exclude meta cat
     while ($query->have_posts()) {
       $query->the_post();
       outputBlock();
     }
     wp_reset_postdata();
     echo '</div>'; 
   ?>

  <div class="archive-entry-link"> 
    <a class="mt-meta-button" href='category/article' alt="阅读更多文章">阅读更多文章</a>
  </div>

</div><!-- .mt-list -->

</div><!-- .page-content -->


