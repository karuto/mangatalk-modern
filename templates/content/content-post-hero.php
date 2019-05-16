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
// Really sorry, because home page hero is also using this template
$heroClasses = is_home() ? "hero hero--home" : "hero hero--content";
?>
<div class="<?php echo $heroClasses; ?>">
  <div class="hero__cover" style="background-image: url('<?php echo $image[0]; ?>')">
    <div class="hero__cover__content">
      <a class="hero__title" href="<?php the_permalink(); ?>">
        <h2 class="hero__title__text"><?php the_title(); ?></h1>
      </a>
      <aside class="hero__excerpt"><?php echo get_the_excerpt(); ?></aside>
    </div>
    <div class="hero__cover__shade hero__cover__shade--black"></div>
  </div>
  <!-- <aside class="entry__meta">
    <?php get_template_part( 'templates/content/content-post-meta' ); ?>
  </aside>
  <h1 class="hero__title"><?php single_post_title(); ?></h1>
  <aside class="entry__excerpt"><?php echo get_the_excerpt(); ?></aside> -->
</div>