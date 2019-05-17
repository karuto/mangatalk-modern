<?php
/**
 * The template that displays the page's hero section. 
 * Do not be confused with the header (title section) of a post or a page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php
if ( is_archive() || is_search() || is_404() ) {
  // echo '<div class="stage"></div>';
  echo '<header class="feeds__header">';

  if ( is_archive() ) {
    echo '所有文章：' . get_the_archive_title();
  } else if ( is_search() ) {
    _e( 'Search results for:', 'twentynineteen' );
  } else if ( is_404() ) {
    _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' );
  }

  // Extra div just for search result pages.
  if( is_search() ) {
    echo '<div class="page-description">';
    echo get_search_query();
    echo '</div>';
  }
  echo '</header>'; //.feeds__header
}

?>