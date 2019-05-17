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

<aside class="entry__meta">
  <div class="columnrec__image">
    <?php echo get_avatar( $userId, 40 ); ?>
  </div>
  <a class="columnrec__authorlink" href="<?php echo get_author_posts_url( $user->ID ); ?>">
    <?php echo get_the_author_meta( 'display_name' ); ?>
    <span class="columnrec__authorcount">
      <?php echo count_user_posts( $user->ID ); ?> 篇文章
    </span>
  </a>
</aside>