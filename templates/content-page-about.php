<?php
/*
 * Template Name: Full-width Page, about
 * Description: A Page Template with full-width, end-to-end display. Content is "About us"
 */
?>
<div class="page-content page-fullwidth page-about">
<?php 
  global $post; 
  if ($post->post_name == "about") {
    $is_chinese = true;
  } else {
    $is_chinese = false;
  }
?>
  
<header class="mt-front">
<section class="article-cover">
  <div id="cover-story" class="cover-image">
    <div class="cover-image-inner">
      
    <div class="container">
      <div class="row">
      <div class="page-cover-content col-xs-12 col-sm-12 col-md-12">
        <h2 class="page-title">
          <?php 
            if ($is_chinese) {
              echo "漫言 MangaTalk";
            } else {
              echo "MangaTalk";
            }
          ?>
        </h2>
        <div class="entry-subtitle">
          <?php 
            if ($is_chinese) {
              echo "创立于 2012 年初，漫言是一个非盈利性质的团队博客、自由媒体平台。";
            } else {
              echo "Founded in 2012, MangaTalk is a non-profit, educational publishing platform dedicated to the comics medium.";
            }
          ?>
        </div>
      </div><!-- .page-cover-content -->
      </div><!-- .row -->
    </div><!-- .container -->
    
  </div><!-- .cover-image-inner -->
  </div><!-- .cover-image -->
</section>
</header>

<section class="featurette">
  <div class="featurette-inner container">
    <div class="row">
      <div class="featurette-block col-xs-12 col-sm-6">
        <div class="featurette-content" style="background-color: yellow">
          <h2 class="featurette-heading">
            <?php if ($is_chinese) {echo "精益求精。";} else {echo "High standards";} ?>
          </h2>
          <p class="lead">
            <?php 
              if ($is_chinese) {
                echo "
                  专注业界深入解读、主打长篇完全原创。<br>
                  没有资讯快餐，没有动游音影，全心全意关注漫画。<br>
                  漫言背后严谨而专业的编辑审校机制，<br>
                  致力于将最高质量的文章，献给最懂得欣赏的你。<br>
                  ";
              } else {
                echo "
                  No junk news. No click-baits. No fluff.<br>
                  It's 100% comics at MangaTalk.<br>
                  A strong focus on authentic, long-form storytelling.<br>
                  ";
              }
            ?>
          
            <a href="/story">您是作者？讲述你的故事</a>
          </p>
        </div>
      </div><!-- .featurette-block -->
      <div class="featurette-block image-block col-xs-12 col-sm-6">
        <div class="" style="background-color: white">
          <h1>Filler</h1>
        </div>
      </div><!-- .featurette-block -->
    </div><!-- .row -->
  </div><!-- .featurette-inner -->
</section><!-- .featurette -->

<section class="featurette feature-copyright">
  <div class="featurette-inner container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <img class="featurette-image alignleft img-responsive" src="http://i.imgur.com/qrcQq4w.png" alt="尊识至源。">
      </div>
      <div class="featurette-content col-sm-12 col-md-6">
        <h2 class="featurette-heading">
          <?php
            if ($is_chinese) {
              echo "
                尊识至源。
                ";
            } else {
              echo "
                Do No Evil
                ";
            }
          ?>
        </h2>
        <p class="lead">
          <?php 
            if ($is_chinese) {
              echo "
                不侵权，不抄袭，还版权于知识。<br>
                所有编译摘抄均注明来源出处，<br>
                所有全文转载皆经过许可授权，<br>
                我们曾与日本国家图书馆等机构进行官方合作，<br>
                坚持以正确的方式传播漫画文化价值。<br>
                ";
            } else {
              echo "
                We honor the authenticity of knowledge to the fullest.<br>
                Plagiarism and reproduction without permission is strictly prohibited.<br>
                We have worked with noticable industry organizations such as Japanese National Congress Library, Kodansha and Blambot Press, dedicated to spread the comics culture the right way.<br>
                ";
            }
          ?>
          
          <a href="/business">您是媒体？欢迎联络合作</a>
        </p>
      </div>
    </div><!-- .row -->
  </div><!-- .featurette-inner -->
</section><!-- .featurette -->

<section class="featurette feature-typography">
  <div class="featurette-inner container">
    <div class="row">
      <div class="featurette-content col-sm-12 col-md-6">
        <h2 class="featurette-heading">
          <?php 
            if ($is_chinese) {
              echo "
                品读深思。
                ";
            } else {
              echo "
                Design-driven
                ";
            }
          ?>
          
        </h2>
        <p class="lead">
          <?php 
            if ($is_chinese) {
              echo "
                中文互联网上领先的排版设计。<br>
                爱写作，但和你一样，我们更爱阅读。<br>
                每一处留白都精心考量、每一个字节都匠心独具，<br>
                无广告、无干扰，雕琢最优雅的沉浸式阅读体验。<br>
                领会中文字体排印之美。<br>
                ";
            } else {
              echo "
                Featuring leading CJK typography.<br>
                No distractions, no ads, our team is dedicated to bring you the premium reading experience.<br>
                From letters to bytes, we fine-tuned every visible detail, crafting a design that's lived up to the standards of our content.<br>
                ";
            }
          ?>
          
          <a href="/feedback">您是读者？写下您的建议</a>
        </p>
      </div>
      <div class="col-sm-12 col-md-6">
        <img class="featurette-image alignright img-responsive" src="http://i.imgur.com/pNQsSQt.png" alt="品读深思。">
      </div>
    </div><!-- .row -->
  </div><!-- .featurette-inner -->
</section><!-- .featurette -->
  
<!-- <hr class="divider"> -->

</div>


