<?php
/**
 * The template that displays the bio section on author archive pages.
 * Structurally similar to content/content-post-meta.
 * TODO: Consolidate this and content/content-post-meta.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<aside class="author-bio author-bio__archive">
  <div class="author-bio__content">
    <div class="author-bio__image">
      <a href="<?php echo get_author_posts_url( $authorId ); ?>">
        <?php echo get_avatar( $authorId, 48 ); ?>
      </a>
    </div>
    <div class="columnrec__meta">
      <a class="columnrec__authorlink" href="<?php echo get_author_posts_url( $authorId ); ?>">
        <?php echo get_the_author_meta( 'display_name' ); ?>
        <span class="columnrec__authorcount">
          <?php echo count_user_posts( $authorId ); ?> 篇文章
        </span>
      </a>
    </div>
  </div>
</aside>


<!-- <?php echo get_the_author_meta( 'description' ) ?> -->