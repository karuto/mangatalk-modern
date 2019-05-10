<?php
/**
 * Template part for displaying the post views. 
 * If there isn't post views data yet, set it to 0. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php 
global $post;
$post_views = get_post_meta( $post->ID, '_post_views', true );
if ( $post_views == '' ) {
 $post_views = 0;
}
echo esc_attr( $post_views ) . ' Views'; 
?>