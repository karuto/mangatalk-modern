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

        <article id="post-0" class="post no-results not-found">
          <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
          </header>

          <div class="entry-content">
            <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
            <?php get_search_form(); ?>
          </div><!-- .entry-content -->
        </article><!-- #post-0 -->

      <?php endif; ?>

      </div><!-- .layout-content-wrap -->
    </div><!-- .layout-primary-wrap -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>