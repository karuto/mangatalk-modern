<?php
/**
 * The template that displays the top header content inside the <body>.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<header id="top-links" class="header header--toplinks">
<?php 
// TODO: the main-navigation class is wrangled with a lot of assumptions. Clean it up later.
if ( has_nav_menu( 'header' ) ) : ?>
  <nav class="maxwidth header__nav" aria-label="<?php esc_attr_e( 'Top Links', 'twentynineteen' ); ?>">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'toplinks',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      )
    );
    ?>
  </nav>
<?php endif; ?>
</header><!-- #masthead -->

<header id="masthead" class="header">
	<div class="maxwidth header__wrapper">
		<?php get_template_part( 'templates/partials/header-branding' ); ?>
		<?php get_template_part( 'templates/partials/header-menu' ); ?>
	</div>
</header><!-- #masthead -->

