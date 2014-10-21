<?php
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "http://i.imgur.com/6mmA2Mq.png";
  }
  
  $format_title = wp_title( '|', false, 'right' );
  // $weibo_link = 'http://service.weibo.com/share/share.php?appkey=1';
  $seg_post = "&url=".get_permalink();
  $seg_wbid = "&ralateUid=2634774843";
  $seg_title = "&title=".$format_title;
  $seg_pic = "&pic=".$first_img;
  $weibo_link = 'http://service.weibo.com/share/share.php?appkey=1'.$seg_post.$seg_wbid.$seg_title.$seg_pic;
  // echo $weibo_link;
  
?>
<div class="social-shares">
  <a href="<?php echo $weibo_link?>"> 分享到微博</a>
</div>
