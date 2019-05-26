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
$authorId = get_the_author_meta( 'ID' );
?>

<aside class="entry__intro">
  <div class="entry__intro__content">
    <div class="entry__intro__image">
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
      <div class="columnrec__stats">
        <?php get_template_part( 'templates/content/content-post-stats' ); ?>
      </div>
    </div>
    <div class="secondary">
      <div class="tags">
        <span class="social__label">标签：</span>
        <?php the_tags( '', '', '' ); /* before, separator, after */ ?>
      </div>
    <?php get_template_part( 'templates/content/content-post-social' ); ?>
    </div>
  </div>
</aside>