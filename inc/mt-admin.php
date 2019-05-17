<?php

/**
 * Author: Karuto
 *
 * Replace the default WordPrss avatar.
 */
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar( $avatar_defaults ) {
    $myavatar = get_bloginfo('template_directory') . '/assets/img/mt-logo.png';
    $avatar_defaults[$myavatar] = "MangaTalk";
    return $avatar_defaults;
}

/**
 * Author: Karuto
 *
 * Add new contact fields in the user profiles, remove useless ones.
 */
add_filter('user_contactmethods', 'new_contactmethods');
function new_contactmethods( $contactmethods ) {
  $contactmethods['douban'] = '豆瓣'; // Add Twitter
  $contactmethods['weibo'] = '微博'; // Add Facebook
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber
  return $contactmethods;
}

/**
 * Author: Karuto
 *
 * Add new custom fields in the user profiles.
 */
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("专栏设置", "blank"); ?></h3>

<table class="form-table">
<tr>
<th><label for="coverimage"><?php _e("封面图"); ?></label></th>
<td>
<input type="text" name="coverimage" id="coverimage" value="<?php echo esc_attr( get_the_author_meta( 'coverimage', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("填写您的封面图片地址（以 http://... 开头的完整图片链接），将用于您的作者页面顶端。 宽度根据网页宽度自适应（越宽越好），高度为 500 像素。"); ?></span>
</td>
</tr>
</table>
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
  if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    update_user_meta( $user_id, 'coverimage', $_POST['coverimage'] );
}
?>