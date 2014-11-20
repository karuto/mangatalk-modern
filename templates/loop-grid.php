<div class="row">
  <?php $blocks = 1; $rows = 0; ?>
  <?php 
  function outputBlock() {
    echo '<section class="mt-block col-xs-6 col-sm-6 col-md-4 col-lg-3">'; 
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  }

  while (have_posts()) {
    the_post(); 
    outputBlock();
  }
  ?>
</div>