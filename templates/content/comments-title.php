<?php
/**
 * Template for displaying the comment section's title.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>
<div class="<?php echo $discussion->responses > 0 ? 'hero hero--discussion' : 'hero hero--discussion hero hero__discussion--no-responses'; ?>">
	<h1 class="hero__title">
			<?php
			if ( comments_open() ) {
				if ( have_comments() ) {
					_e( 'Join the Conversation', 'twentynineteen' );
				} else {
					_e( 'Leave a comment', 'twentynineteen' );
				}
			} else {
				if ( '1' == $discussion->responses ) {
					/* translators: %s: post title */
					printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'twentynineteen' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$discussion->responses,
							'comments title',
							'twentynineteen'
						),
						number_format_i18n( $discussion->responses ),
						get_the_title()
					);
				}
			}
			?>
	</h1>
</div>