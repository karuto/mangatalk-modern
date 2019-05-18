<?php
/**
 * The template that displays the header of the feeds section. 
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
  echo '<header class="feeds__header">';
  if ( is_archive() ) {
    echo get_the_archive_title() . '的文章';
  } else if ( is_search() ) {
    echo '搜索结果：' . get_search_query();;
  } else if ( is_404() ) {
    _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' );
  }
  echo '</header>';
}

?>