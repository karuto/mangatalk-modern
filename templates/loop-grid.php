<div class="row">
  <?php $blocks = 1; $rows = 0; ?>
  <?php 
  function outputBlock() {
    echo '<section class="mt-block col-xs-6 col-sm-6 col-md-4 col-lg-3">'; 
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  }

  // while (have_posts()) {
  //   the_post();
  //   outputBlock();
  // }
  
  if ($renderArticles == 1) {
    echo "<h1>ARTICLE</h1>";
    $query = new WP_Query( 'cat=-10' ); // Exclude meta cat
    while ($query->have_posts()) {
      $query->the_post();
      outputBlock();
    }

  } else if ($renderMeta == 1) {

    echo "<h1>META</h1>";
    $query = new WP_Query( 'category_name=meta' ); // Only meta cat
    while ($query->have_posts()) {
      $query->the_post();
      outputBlock();
    }

  } else {
    // Normal while loop without specific $query
    while (have_posts()) {
      the_post();
      outputBlock();
    }
  }
  
  
  // global $query_string;
  // query_posts($query_string . ‘&cat=-10′);
  // wp_reset_query();
  ?>
</div>