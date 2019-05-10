
<?php
/**
 * Modify the comment date of the current comment.
 *
 * @param string $d - Optional. The format of the date. Default user's setting.
 * @param int|WP_Comment $comment_ID - WP_Comment or ID of the comment for which to get the date. Default is current comment.
 * @return string - The comment's date.
 */
function relative_comment_time($date, $d, $comment){
	return sprintf( _x( '%s ago', '%s = human-readable time difference', 'twentynineteen' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter('get_comment_date', 'relative_comment_time', 10, 3);
?>