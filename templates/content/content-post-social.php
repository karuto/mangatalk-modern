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

$format_posttitle = get_the_title();
$format_title = wp_title( '|', false, 'right' );
$format_link = get_permalink();
$format_excerpt = get_the_excerpt();

$weibo_post = "&url=" . $format_link;
$weibo_wbid = "&ralateUid=2634774843";
$weibo_title = "&title=" . $format_title;
$weibo_pic = "&pic=" . $first_img;
$weibo_link = 'http://service.weibo.com/share/share.php?appkey=1' . $weibo_post . $weibo_wbid . $weibo_title . $weibo_pic;

$douban_svg = '<svg height="40px" width="40px" style="enable-background:new 0 0 256 256;" version="1.1" viewBox="0 0 256 256" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Background_1_" style="enable-background:new;"><g id="Background"><g><path d="M249.422,30.68c-2.722-4.986-5.816-9.537-9.794-13.521     c-3.991-3.998-8.708-7.587-13.702-10.314c-8.381-4.576-18.789-6.856-29.002-6.856H59.075c-10.444,0-20.542,2.345-29.265,6.949     c-5.022,2.65-9.588,6.146-13.503,10.126c-3.932,3.998-7.491,8.488-10.046,13.572c-4.289,8.533-6.274,18.478-6.274,28.65v137.43     c0,10.326,1.671,20.678,6.296,29.134c2.68,4.9,6.191,9.861,10.087,13.794c3.934,3.971,8.583,7.226,13.502,9.956     c8.465,4.7,18.842,6.413,29.202,6.413h137.849c10.568,0,20.398-1.523,28.982-6.401c4.739-2.692,9.879-6.113,13.687-9.966     c3.923-3.969,7.2-8.851,9.886-13.798c4.566-8.416,6.533-18.875,6.533-29.132V59.285C256.012,48.978,254.031,39.124,249.422,30.68     z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#F5F5F5;"/></g></g></g><g id="Shape_1_1_" style="enable-background:new    ;"><g id="Shape_1"><g><path d="M204.508,49.25H51.492v18.549h153.016V49.25z      M167.393,188.201l9.441-32.541h18.232c0,0,0-49.249,0-73.869H60.933c0,24.62,0,73.869,0,73.869h17.906l9.767,32.541     c0,0-27.783,0-41.673,0v18.549h162.133v-18.549C195.176,188.201,167.393,188.201,167.393,188.201z M84.048,137.111V100.34h87.903     v36.771H84.048z M148.51,187.876h-41.021l-9.767-32.216h60.23L148.51,187.876z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#777;"/></g></g></g></svg>';
$douban_link = "http://www.douban.com/share/service?image=" . $first_img . "&href=" . $format_link . "&name=" . $format_title . "&text=" . $format_excerpt;
$twitter_link = "https://twitter.com/intent/tweet?text=《" . $format_posttitle. "》来自漫言 @manga_talk" . $format_link;
?>

<div class="secondary">
  <div class="tags">
    <?php the_tags( '', '', '' ); /* before, separator, after */ ?>
  </div>
  <div class="social">
    <a class="social__link" href="<?php echo $twitter_link; ?>" target="_blank">推特分享</a>
    <a class="social__link" href="<?php echo $weibo_link; ?>" target="_blank">微博分享</a>
    <a class="social__link" href="<?php echo $douban_link; ?>" target="_blank"><?php echo $douban_svg; ?></a>
  </div>
</div>