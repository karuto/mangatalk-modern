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
                'category' => array( 1, 46 ),
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