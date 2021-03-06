<?php
/**
 * The template for sidebar widget "columns", showcasing the authors / columns of the site.
 * This specific template showcases the authors that has the most posts published.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
$newUsersCount = 1;
$newUsersLimit = 5;
$newUsers = get_users(
  array(
    'orderby' => 'post_count',
    'order' => 'ASC',
    'number' => '15'
  )
);
?>

<section class="widget" id="new" role="command">
  <div class="heading"><span class="heading__label">专栏推荐</span></div>
  <div class="widget__content widget__content--columnrec">
    <?php 
    foreach ( $newUsers as $user ): 
      $post_count = count_user_posts( $user->ID );
      // Move on if user has not published a post (yet).
      if ( !$post_count || ($newUsersCount > $newUsersLimit)) {
          continue;
      }
      $newUsersCount++;
    ?>
      <div class="columnrec">
        <div class="columnrec__content">
          <div class="columnrec__image">
            <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
              <?php echo get_avatar( $user->ID, 48 ); ?>
            </a>
          </div>
          <div class="columnrec__meta">
            <a class="columnrec__authorlink" href="<?php echo get_author_posts_url( $user->ID ); ?>">
              <?php echo $user->display_name; ?>
              <span class="columnrec__authorcount">
                <?php echo count_user_posts( $user->ID ); ?> 篇文章
              </span>
            </a>
            <div class="columnrec__desc">
              <?php 
              // get the latest 1 post by the author.
              $userPosts = get_posts(
                array(
                  'author'  => $user->ID,
                  'category' => array( 89, 90, 91 ), // YOU MUST SPECIFY CATEGORIES
                  'orderby' => 'post_date',
                  'order' => 'DESC',
                  'posts_per_page' => 1
                )
              );
              foreach ( $userPosts as $post ) {
                echo '<a class="columnrec__desc__link" href="';
                echo the_permalink();
                echo '">';
                echo the_title();
                echo '</a>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>