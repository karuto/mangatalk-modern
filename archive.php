<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="mt-list">
<?php $count = 1; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php 
  if ($count % 2 != 0) { // odd, render the start of the row
    echo '<div class="row">';
    echo '<section class="mt-block col-xs-12 col-sm-6 col-md-8">'; 
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  } else { // even, render the end of the row
    echo '<section class="mt-block col-xs-12 col-sm-6 col-md-4">';   
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
