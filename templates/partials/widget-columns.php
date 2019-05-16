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
            <a class="columnrec__author__link" href="<?php echo get_author_posts_url( $user->ID ); ?>">
              <?php echo $user->display_name ?>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>