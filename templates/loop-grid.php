  <?php $blocks = 1; $rows = 0; ?>
  <?php 
  function outputBlock() {
    echo '<section class="mt-block col-xs-12 col-sm-4 col-md-4">'; 
    get_template_part('templates/content', get_post_format()); 
    echo '</section>';
  }
  
  while (have_posts()) : the_post(); 
  // echo "<h1>".($blocks%3)."</h1>";
    if ($blocks % 3 != 0) { // 1st & 2nd post of the 3, render start of the row
      if ($blocks % 3 == 1) { // 1st post of the 3
        echo '<div class="row">';
        $rows++;
      }
      outputBlock();
    } else { // last post of the 3, render the end of the row
      outputBlock();
      echo '</div>';
    }
    $blocks++;
  ?>
    
  <?php endwhile; 
  // Note: $count starts at 1 so we have to do minus 1 to check real amount
  // Right now $count is the total amount of posts displayed
  // if (($count-1) % 2 != 0) {// if we get a total odd number of posts, print an extra row end
  //   echo '</div>';
  // }
  ?>