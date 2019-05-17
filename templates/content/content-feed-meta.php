<?php
/**
 * Template part for displaying the metadata section of excerpts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php 

echo '<div class="feed__meta feed__meta--author">';
echo '<a class="feed__meta__link" href="';
echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
echo '">';
the_author();
echo '</a>';
echo '</div>';
get_template_part( 'templates/content/content-post-stats' ); 
?>