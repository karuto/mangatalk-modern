<?php
  $args = array( 
    'orderby' => 'rand',
    'posts_per_page' => '1', 
    'post_type' => 'post'
  );
  $randomPosts = new WP_Query( $args );
  while ( $randomPosts->have_posts() ) :
    $randomPosts->the_post();
    $randomPostId = get_the_ID();

    $imageUrl = '';
    if ( has_post_thumbnail( $randomPostId ) ) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $randomPostId ), 'large' );
      $imageUrl = $image[0];
    } else {
      $imageUrl = get_template_directory_uri() . '/img/mt-cover-brand.jpg';
    }
?>

<div class="sidebar__block">
  <div class="heading"><span class="heading__label">随机推荐</span></div>
    <div class="special" style="background-image: url('<?php echo $imageUrl; ?>')">
    <a class="special__link" href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      <div class="special__link__desc">
      <?php echo get_the_excerpt(); ?>
      </div>
    </a>
  </div>
</div>

<?php
endwhile;
wp_reset_postdata();
?>