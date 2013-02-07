<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

  <div class="layout-regular-post">
    <article id="post-<?php the_ID(); ?>" 
      <?php post_class('main-item-block main-item-style'); ?>>
      
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
      </div><!-- .entry-content -->
      <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
      </footer><!-- .entry-meta -->

    </article><!-- #post -->
  </div><!-- .layout-regular-post -->

