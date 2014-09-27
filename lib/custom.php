<?php
/**
 * Custom functions
 */
add_filter('roots_wrap_base', 'roots_wrap_base_cpts'); // Add our function to the roots_wrap_base filter

function roots_wrap_base_cpts($templates) {
  $cpt = get_post_type(); // Get the current post type
  if (is_single()) { // only detect "single post"
     array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
  }
  return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}

/** 
 * Remove wpautop only for 'image' post format posts. I know, I know it's dangerous. 
 * But the <p> are fucking up the functionality of carousel which is essential for images.
 */  
add_filter('the_content', 'specific_no_wpautop', 9); // last is priority, must be >8

function specific_no_wpautop($content) {
  if( get_post_format() == 'image' ) {
    remove_filter('the_content','wpautop');
    return $content;  //no autop
  } else {
    return $content; // regular autop    
  }
}