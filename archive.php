<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="mt-list">
  <?php if (is_author()): ?>
  <header class="meta-header"> 发表作品&emsp;|&emsp; Published Pieces</header>
  <?php endif; ?>
   <?php get_template_part('templates/loop', 'grid'); ?>
</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
