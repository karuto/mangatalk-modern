<?php

// The Query
$the_query = new WP_Query( "showposts=1&cat=0" );
// The Loop
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
} else {
	// no posts found
  echo '<h1>NO POST FOUND</h1>';
}
?>

<header id="mt-front" class="mt-front">
<section class="article-cover">
  <div class="cover-image" <?php post_class();
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
      <div class="front-cover-content col-xs-12 col-sm-12 col-md-10">
        <h4 class="h4 entry-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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

  <div class="row"> 
    <a class="h3 archive-entry-link" href='category/<?php $category = get_the_category(); echo $category[0]->cat_name;?>' alt="阅读更多文章">
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



<!-- <?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?> -->