<div id="mt-search" class="mt-search">
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</div>
<header id="mt-banner" class="mt-banner banner navbar navbar-static-top" role="banner">

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>/"><img src="https://cdn0.vox-cdn.com/images/polygon/logos/logo_black@2x.v0cd37af.png" alt="<?php bloginfo('name'); ?>" /></a>
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
