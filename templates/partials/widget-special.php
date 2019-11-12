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

<section class="widget" id="special" role="command">
  <div class="heading"><span class="heading__label">随机推荐</span></div>
  <div class="hero hero--home hero--widget">
    <a class="hero__title" href="<?php the_permalink(); ?>">
      <div class="hero__cover" style="background-image: url('<?php echo $imageUrl; ?>')">
        <div class="hero__cover__content">
            <h1 class="hero__title__text"><?php the_title(); ?></h1>
          <aside class="hero__excerpt"><?php echo get_the_excerpt(); ?></aside>
        </div>
        <div class="hero__cover__shade hero__cover__shade--black"></div>
      </div>
    </a>
  </div>
</section>

<?php
endwhile;
wp_reset_postdata();
?>