<!-- Template for editoral promotional mt-blocks in loops (home and related-post area). -->
<?php
if (is_single()) { // in article page (related post) it needs to be 6-col
  echo '<section class="mt-block col-xs-6">';
} else { // else responsive
  echo '<section class="mt-block col-xs-6 col-sm-6 col-md-6 col-lg-3">';
}
?>
<article class="block-panel">
  <div class="block-cover-wrapper">
    
    <div class="block-cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/thumb_promo_newsletter.jpg');">
      <a href="http://mangatalk.us4.list-manage.com/subscribe?u=3a348cad64b3e0662b001c652&id=6df5ae571d"><div class="cover-shade"></div></a>
    
      <div class="row block-content">
        <header class="block-header">
          <h4 class="entry-title text-contrast">
            <a href="http://mangatalk.us4.list-manage.com/subscribe?u=3a348cad64b3e0662b001c652&id=6df5ae571d" target="_blank">订阅漫言漫报</a>
          </h4>
          <div class="entry-meta">
            <span class="entry-author-name text-contrast">
              每季文摘，以及最亲密联络。
            </span>&nbsp; 
            <span class="entry-comment-count text-contrast alignright">
              &nbsp;
            </span>
          </div>
        </header><!-- .block-header -->
      </div><!-- .block-content -->
      
    </div><!-- .block-cover -->
    
  </div><!-- .block-cover-wrapper -->
</article>
</section>

<?php
if (is_single()) { // in article page (related post) it needs to be 6-col
  echo '<section class="mt-block col-xs-6">';
} else { // else responsive
  echo '<section class="mt-block col-xs-6 col-sm-6 col-md-6 col-lg-3">';
}
?>
<article class="block-panel">
  <div class="block-cover-wrapper">

    <div class="block-cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/thumb_promo_survey.jpg');">
      <a href="https://mangatalk.typeform.com/to/LpHD8h"><div class="cover-shade"></div></a>
    
      <div class="row block-content">
        <header class="block-header">
          <h4 class="entry-title text-contrast">
            <a href="https://mangatalk.typeform.com/to/LpHD8h">填写调查问卷</a>
          </h4>
          <div class="entry-meta">
            <span class="entry-author-name text-contrast">
              您的反馈，对我们意义重大。
            </span>&nbsp; 
            <span class="entry-comment-count text-contrast alignright">
              &nbsp;
            </span>
          </div>
        </header><!-- .block-header -->
      </div><!-- .block-content -->
      
    </div><!-- .block-cover -->
    
  </div><!-- .block-cover-wrapper -->
</article>
</section>