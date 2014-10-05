<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>
  
  <div class="wrap" role="document">
    <!-- <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main"> -->
    <div class="content">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->      
  
  <div class="article-content-container">
  <section class="promo-section row">
    
    <div class="promo-block col-lg-6">
      <header class="promo-header">
        <a href="http://goo.gl/R2TOHA" target="_blank">填写调查问卷</a>
      </header>
      <span class="promo-text text-muted">您的反馈，对我们意义重大。</span>
    </div>
    <div class="promo-block col-lg-6">
      <header class="promo-header">
        <a href="http://goo.gl/LVj65m" target="_blank">订阅漫言漫报</a>
      </header>
      <span class="promo-text text-muted">每季文摘，以及最亲密联络。</span>
    </div>
    
  </section>
  </div>
  
  <?php get_template_part('templates/footer'); ?>
  
</body>
</html>
