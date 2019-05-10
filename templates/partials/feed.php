<?php
/**
 * The template that displays the feed, based on any query to render some posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>
<?php 
get_template_part( 'templates/partials/page-header' );
?>
<section class="feeds">
  <?php 
  if ( have_posts() ) {
    // Start the Loop.
    while ( have_posts() ) {
      the_post();

      if ( is_single() ) {
        $post_type = 'post';
      } else if ( is_page() ) {
        $post_type = 'page';
      } else {
        $post_type = 'excerpt';
      }
      get_template_part( 'templates/content/content', $post_type );

      // End the loop.
    }

    // If comments are open or we have at least one comment, load up the comment template.
    // This only applies for single post and page pages.
    // This won't apply for numbered pages, such as home or archive pages.
    // Gotcha: this function requires file extension when looking for templates.
    comments_template( '/templates/content/comments.php' );

    // Previous/next page navigation.
    // This won't apply for single post and page pages.
    // This only applies for numbered pages, such as home or archive pages.
    the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					twentynineteen_get_icon_svg( 'chevron_left', 22 ),
					''
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					'',
					twentynineteen_get_icon_svg( 'chevron_right', 22 )
				),
			)
		);

    // If no content, include the "No posts found" template.
  } else {
    get_template_part( 'templates/content/content', 'none' );
  }
  ?>
</section>