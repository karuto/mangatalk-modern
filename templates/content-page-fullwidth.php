<?php
/*
 * Template Name: Full-width Page, blank
 * Description: A Page Template with full-width, end-to-end display with no content yet.
 */
?>

<div class="page-content">
  
<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php // wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>

</div>


