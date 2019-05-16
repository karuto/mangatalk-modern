<?php
/**
 * The template for sidebar widget "columns", showcasing the authors / columns of the site.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */
?>

<?php
// $userCount = 5;
// $userQuery = new WP_User_Query(
//   array(
//     'role' => 'Author',
//     'number' => $userCount,
//     'orderby' => 'post_count',
//     'order' => 'DESC'
//   )
// );
// $authors = $userQuery->get_results();

// if ( ! empty( $authors ) ) {
//   echo '<ul>';
//   // loop through each author
//   foreach ( $authors as $author ) {
//       // get all the user's data
//       $author_info = get_userdata( $author->ID );
//       echo $author_info;
//       echo '<li>' . $author_info->first_name . ' ' . $author_info->last_name . '</li>';
//   }
//   echo '</ul>';
// } else {
//   echo 'No authors found';
// }

$users = get_users(
  array(
    'orderby' => 'post_count',
    'order' => 'DESC',
    'number' => '10'
  )
);
?>

   <!-- echo $user->ID;
   echo $user->display_name;
  //  $all_meta_for_user = get_user_meta( $user->ID );
   
  //  print_r( $all_meta_for_user );
  //  the_author_image($user->ID);
  //  echo $user->description; -->


<section class="widget">
  <div class="feeds__header"><a href="">专栏推荐</a></div>
  <div class="widget__content">
    <?php foreach ( $users as $user ): ?>
      <div class="columnrec">
        <div class="columnrec__content">
          <div class="columnrec__image">
            <?php echo get_avatar( $user->ID, 40 ); ?>
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
                  'category' => 1,
                  'orderby' => 'post_date',
                  'order' => 'DESC',
                  'posts_per_page' => 1
                )
              );
              foreach ( $userPosts as $post ) {
                echo '<a class="columnrec__desclink" href="';
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