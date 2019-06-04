<div class="social">
  <?php if( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {  ?>
    <span class="social__label"><?php edit_post_link(); ?></span>
  <?php } ?>
  <span class="social__label">分享至：</span>
  <a class="social__link" href="<?php echo $twitter_link; ?>" target="_blank"><?php echo getSocialIcon( 'twitter' ); ?></a>
  <a class="social__link" href="<?php echo $weibo_link; ?>" target="_blank"><?php echo getSocialIcon( 'weibo' ); ?></a>
  <a class="social__link" href="<?php echo $douban_link; ?>" target="_blank"><?php echo getSocialIcon( 'douban' ); ?></a>
</div>