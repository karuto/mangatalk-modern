<?php
/**
 * Template part for displaying a single content excerpt piece - a.k.a a feed.
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

<article id="post-<?php the_ID(); ?>" class="feed">

	<div class="feed__image" style="background-image: url('<?php echo $image[0]; ?>')"></div>

	<div class="feed__content">
		<a class="feed__title" href="<?php the_permalink(); ?>">
			<h2 class="feed__title__text"><?php the_title(); ?></h2>
		</a>

		<div class="feed__excerpt">
			<?php echo get_the_excerpt(); ?>
		</div>

		<div class="feed__metas">
			<?php get_template_part( 'templates/content/content-feed-meta' ); ?>
		</div>
	</div>

</article>
