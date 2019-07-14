<?php
/**
 * MangaTalk password protected posts related features.
 * The official documentation gives a wonderful overview of all the possibilities:
 * https://wordpress.org/support/article/using-password-protection/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

/**
 * Hide password protected posts in all WP loops.
 * This also hides password protected posts in the RSS feed.
 * https://www.wpbeginner.com/wp-tutorials/how-to-hide-password-protected-posts-from-wordpress-loop/
 */
function mt_hide_protected_posts( $where = '' ) {
  if ( !is_single() && !is_admin() ) {
      $where .= " AND post_password = ''";
  }
  return $where;
}
add_filter( 'posts_where', 'mt_hide_protected_posts' );



/**
 * Change the default form of password protected posts.
 * https://wordpress.org/support/article/using-password-protection/#password-form-text
*/
function mt_protected_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '
    <form class="form form--mini" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="form__exerpt">请输入密码，解锁文章内容：</div>
    <div class="form__content">
    <input class="form__input" name="post_password" id="' . $label . '" type="password" placeholder="编辑给的密码" size="20" maxlength="20" /><input class="form__action" type="submit" name="Submit" value="' . 解锁 . '" />
    </div>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'mt_protected_password_form' );



/**
 * Change the default exerpt of password protected posts.
 * https://wordpress.org/support/article/using-password-protection/#protected-excerpt-text
*/
function mt_excerpt_protected( $excerpt ) {
    if ( post_password_required() )
        $excerpt = '<em>hi</em>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'mt_excerpt_protected' );
?>