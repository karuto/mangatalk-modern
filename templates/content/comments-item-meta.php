<div class="comment__meta__data">
  <?php
  printf(
    /* translators: %s: comment author link */
    wp_kses(
      __( '%s <span class="screen-reader-text says">says:</span>', 'twentynineteen' ),
      array(
        'span' => array(
          'class' => array(),
        ),
      )
    ),
    '<b class="fn">' . get_comment_author_link( $comment ) . '</b>'
  );

  $comment_relative_time = sprintf( __( '%1$s at %2$s', 'twentynineteen' ), get_comment_date( '', $comment ), get_comment_time() );
  ?>
  &nbsp;&bull;&nbsp;
  <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
    <time datetime="<?php comment_time( 'c' ); ?>">
      <?php echo $comment_relative_time; ?>
    </time>
  </a>
  <?php
    $edit_comment_icon = twentynineteen_get_icon_svg( 'edit', 16 );
    edit_comment_link( __( 'Edit', 'twentynineteen' ), '<span class="edit-link-sep">&mdash;</span> <span class="edit-link">' . $edit_comment_icon, '</span>' );
  ?>
</div><!-- .comment-metadata -->