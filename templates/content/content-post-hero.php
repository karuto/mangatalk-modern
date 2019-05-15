<?php
/**
 * Template part for displaying the hero section of posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php 
$imageUrl = '';
if (has_post_thumbnail( $post->ID ) ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$imageUrl = $image[0];
}
?>

<div class="stage"></div>
<div class="hero hero--page">
  <div class="feed__cover feed__cover--hero" style="background-image: url('<?php echo $image[0]; ?>')">
    <div class="feed__cover__content">
      <a class="feed__title" href="<?php the_permalink(); ?>">
        <h2 class="feed__title__text"><?php the_title(); ?></h1>
      </a>
    </div>
    <div class="feed__cover__shade feed__cover__shade--black"></div>
  </div>
  <!-- <aside class="entry__meta">
    <?php get_template_part( 'templates/content/content-post-meta' ); ?>
  </aside>
  <h1 class="hero__title"><?php single_post_title(); ?></h1>
  <aside class="entry__excerpt"><?php echo get_the_excerpt(); ?></aside> -->
</div>