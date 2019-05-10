<?php
/**
 * Template for displaying Current Discussion on posts.
 * This means showing a list of avatars (up to 6) and the number of comments.
 * Migrated some helper functions that were from `inc/` before.
 * I haven't decided where to place this, so hide it for now.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */

/* Get data from current discussion on post. */
$discussion    = twentynineteen_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %1(X comments)$s */
	$meta_label = sprintf( _n( '%d Comment', '%d Comments', $discussion->responses, 'twentynineteen' ), $discussion->responses );
} else {
	$meta_label = __( 'No comments', 'twentynineteen' );
}

function twentynineteen_get_user_avatar_markup( $id_or_email = null ) {
	if ( ! isset( $id_or_email ) ) {
		$id_or_email = get_current_user_id();
	}
	return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, 48 ) );
}

function twentynineteen_discussion_avatars_list( $comment_authors ) {
	if ( empty( $comment_authors ) ) {
		return;
	}
	echo '<ol class="discussion-avatar-list">', "\n";
	foreach ( $comment_authors as $id_or_email ) {
		printf(
			"<li>%s</li>\n",
			twentynineteen_get_user_avatar_markup( $id_or_email )
		);
	}
	echo '</ol><!-- .discussion-avatar-list -->', "\n";
}
?>

<div class="discussion-meta">
	<?php
	if ( $has_responses ) {
		twentynineteen_discussion_avatars_list( $discussion->authors );
	}
	?>
	<p class="discussion-meta-info">
		<?php echo twentynineteen_get_icon_svg( 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
