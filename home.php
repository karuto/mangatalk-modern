
<header id="mt-front" class="mt-front">
<section class="article-cover">
  <div class="cover-image" style="background-image: url('http://i.imgur.com/zk0ecX8.jpg');">
    
    <div class="cover-content container">
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8">
        
      </div>
      <div class="cover-content-wrapper col-xs-12 col-sm-12 col-md-8">
        <h1 class="h2 entry-title">TITLE</h1>
        <h4 class="h4 entry-subtitle">EXCERPT</h4>
            
        <!-- <h4 class="h4 entry-comment-count alignright">
          By Author &nbsp;
          <span class="glyphicon glyphicon-heart"></span>3
          &nbsp;
          <span class="glyphicon glyphicon-comment"></span>3
        </h4> -->
      
      </div><!-- .cover-content-wrapper -->
      </div><!-- .row -->
    </div><!-- .cover-content -->
    
  </div><!-- .cover-image -->
</section>
</header>




<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<div class="mt-list container">
<?php $count = 1; $rows = 0; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php 
  if ($count % 2 != 0) { // odd post, render the start of the row
    echo '<div class="row">';
    $rows++;
    if ($rows % 2 != 0) { // odd row
      echo '<section class="mt-block col-xs-12 col-sm-6 col-md-8">'; 
    } else { // even row
      echo '<section class="mt-block col-xs-12 col-sm-6 col-md-4">'; 
    }
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  } else { // even post, render the end of the row
    if ($rows % 2 != 0) { // odd row
      echo '<section class="mt-block col-xs-12 col-sm-6 col-md-4">'; 
    } else { // even row
      echo '<section class="mt-block col-xs-12 col-sm-6 col-md-8">'; 
    }  
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
    echo '</div>'; 
  }
  $count++;
  ?>
<?php endwhile; ?>
</div>


<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>