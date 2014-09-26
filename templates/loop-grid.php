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
    
  <?php endwhile; 
  // Note: $count starts at 1 so we have to do minus 1 to check real amount
  // Right now $count is the total amount of posts displayed
  if (($count-1) % 2 != 0) {// if we get a total odd number of posts, print an extra row end
    echo '</div>';
  }
  ?>