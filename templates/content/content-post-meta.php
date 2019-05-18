<?php
/**
 * Template part for displaying the metadata section of a single post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>
<?php 
$userId = get_the_author_meta( 'ID' );
?>

<aside class="entry__intro">
  <div class="entry__intro__content">
    <div class="entry__intro__image">
      <?php echo get_avatar( $userId, 48 ); ?>
    </div>
    <div class="columnrec__meta">
      <a class="columnrec__authorlink" href="<?php echo get_author_posts_url( $userId ); ?>">
        <?php echo get_the_author_meta( 'display_name' ); ?>
        <span class="columnrec__authorcount">
          <?php echo count_user_posts( $userId ); ?> 篇文章
        </span>
      </a>
      <div class="columnrec__stats">
        <?php get_template_part( 'templates/content/content-post-stats' ); ?>
      </div>
    </div>
    <?php get_template_part( 'templates/content/content-post-social' ); ?>
  </div>
</aside>