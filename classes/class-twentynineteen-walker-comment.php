<?php
/**
 * Custom comment walker for this theme
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */

/**
 * This class outputs custom comment walker for HTML5 friendly WordPress comment and threaded replies.
 *
 * @since 1.0.0
 */
class TwentyNineteen_Walker_Comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment__body">
				<div class="comment__author vcard">
					<?php
					$comment_author_link = get_comment_author_link( $comment );
					$comment_author_url  = get_comment_author_url( $comment );
					$comment_author      = get_comment_author( $comment );
					$avatar              = get_avatar( $comment, $args['avatar_size'] );

					if ( 0 != $args['avatar_size'] ) {
						if ( empty( $comment_author_url ) ) {
							echo $avatar;
						} else {
							printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url );
							echo $avatar;
						}
					}

					/*
						* Using the `check` icon instead of `check_circle`, since we can't add a
						* fill color to the inner check shape when in circle form.
						*/
					// TODO: add support for post author badge.
					// if ( twentynineteen_is_comment_by_post_author( $comment ) ) {
					// 	printf( '<span class="post-author-badge" aria-hidden="true">%s</span>', twentynineteen_get_icon_svg( 'check', 24 ) );
					// }

					if ( ! empty( $comment_author_url ) ) {
						echo '</a>';
					}
					?>
				</div><!-- .comment__author -->

				<div class="comment__content">
					<footer class="comment__meta">
						<?php 
						get_template_part( 'templates/content/comments-item-meta' );
						
						if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment__meta__awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentynineteen' ); ?></p>
						<?php endif; ?>
					</footer><!-- .comment__meta -->

					<p class='comment__text'>
						<?php echo get_comment_text(); ?>
					</p><!-- .comment__text -->

					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<div class="comment__reply">',
								'after'     => '</div>',
							)
						)
					);
					?>
				</div><!-- .comment__content -->

			</article><!-- .comment__body -->

		<?php
	}
}
