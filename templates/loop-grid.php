<div class="row">
  <?php 
  // Helper function to output a single block
  function outputBlock() {
    echo '<section class="mt-block col-xs-6 col-sm-6 col-md-4 col-lg-3">'; 
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  }

  if ($renderArticles == 1) {
    $query = new WP_Query( 'cat=-10' ); // Exclude meta cat
    while ($query->have_posts()) {
      $query->the_post();
      outputBlock();
    }

  } elseif ($renderMeta == 1) {
    $metaquery = new WP_Query( 'cat=10' ); // Only meta cat
    while ($metaquery->have_posts()) {
      $metaquery->the_post();
      outputBlock();
    }

  } else {
    // Normal while loop without specific $query
    while (have_posts()) {
      the_post();
      outputBlock();
    }
  }
  wp_reset_postdata(); // must use if the_post() is used in loop
  // wp_reset_query(); // don't think we need this, but maybe?
  ?>
</div>