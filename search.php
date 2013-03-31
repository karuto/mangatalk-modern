<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


  <div class="layout-subheader-wrap">
    <header class="sub-header" roll="banner">

      <h1 class="archive-title sub-title">
        搜索结果：<?php the_search_query(); ?> 
      </h1>
    </header><!-- .sub-header -->
  </div><!-- .layout-subheader-wrap -->


  <div id="main" class="layout-main-wrap"><!-- This defines the max-width framework -->
    <div class="layout-main-inner-wrap clearfix-modern">

    <div id="primary" class="layout-primary-wrap">
      <div id="content" class="layout-content-wrap" role="main">

      <?php if ( have_posts() ) : ?>


        <?php get_template_part('mainlooplogic'); ?>


      <?php else : ?>

      <div class="layout-posts-section" style="margin-top:20px;">
        <div class="layout-posts-row">

          <article class="main-item-block main-item-style empty-item">
              <div class="empty-masthead">
                
                <?php if ($rand_icon == 1) : ?>
                  <img src="http://i.imgur.com/ydzehKy.png" class="encourage-icon">
                <?php else : ?>
                  <img src="http://i.imgur.com/lIq3Nez.png" class="encourage-icon">
                <?php endif; ?>
              </div>
              <!-- <img src="/sg/t.gif" alt="" style="width:1px; height:10em; vertical-align:middle;" /> -->
              <h3 class="entry-summary">
                很抱歉没有您想要查找的内容。<br>
                您可以尝试重新搜索，或<a href="<?php echo esc_url( home_url( '/' ) ); ?>">返回主页。</a><br>
                <?php get_search_form(); ?><br>
              </h3>
          </article>

          <div class="main-item-gap"></div>

          <article class="main-item-block main-item-style empty-item">
            <a href="/about/#about-contact">
              <div class="empty-masthead">
                
                <?php if ($rand_icon == 1) : ?>
                  <img src="http://i.imgur.com/ydzehKy.png" class="encourage-icon">
                <?php else : ?>
                  <img src="http://i.imgur.com/lIq3Nez.png" class="encourage-icon">
                <?php endif; ?>
              </div>
              <!-- <img src="/sg/t.gif" alt="" style="width:1px; height:10em; vertical-align:middle;" /> -->
              <h3 class="entry-summary">
                想让自己的文字出现在这里？<br>
                想看到更多有趣的内容？<br>
                请大胆地投稿给我们吧！<br>
              </h3>
            </a>
          </article>

        </div>
      </div><!-- .layout-posts-section -->

      <?php endif; ?>

      </div><!-- .layout-content-wrap -->
    </div><!-- .layout-primary-wrap -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>