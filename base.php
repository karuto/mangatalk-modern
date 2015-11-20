<?php get_template_part('templates/global/head'); ?>
<body <?php body_class(); ?>>

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/global/header-top-navbar');
    } else {
      get_template_part('templates/global/header');
    }
  ?>

  <?php if (is_front_page() || is_single() || is_page()): ?>
  <div class="wrap" role="document">
  <?php else: ?>
  <div class="wrap container" role="document"><!-- .container is bootstrap control class -->
  <?php endif; ?>
    <main class="main" role="main">
      <?php include roots_template_path(); ?>
    </main><!-- /.main -->
    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div><!-- /.wrap -->

  <?php get_template_part('templates/global/footer'); ?>

</body>
</html>
