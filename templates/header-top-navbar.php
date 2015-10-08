<div id="mt-search" class="mt-search">
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</div>
<?php if (is_front_page() || is_single() ): /* A cover exists, so need immersive nav */ ?>
<header id="mt-banner" class="mt-banner banner navbar navbar-static-top is-immersive" role="banner">
<?php else: /* Normal page, don't need transparent nav */ ?>
<header id="mt-banner" class="mt-banner banner navbar navbar-static-top is-normal" role="banner">
<?php endif; ?>

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      
      <ul class="nav navbar-nav navbar-right">
         <li id="nav-search"><a href="#"><span id="nav-search-icon" class="glyphicon glyphicon-search"></span></a></li>
      </ul>
      
    </nav><!-- .navbar-collapse -->
    
  </div>
</header>
