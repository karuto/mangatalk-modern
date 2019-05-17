<?php
/**
 * Displays header menus. The menu in dashboard must be enabled.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php 
// TODO: the main-navigation class is wrangled with a lot of assumptions. Clean it up later.
if ( has_nav_menu( 'header' ) ) : ?>
  <nav class="main-navigation header__nav" aria-label="<?php esc_attr_e( 'Content Menu', 'twentynineteen' ); ?>">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'header',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      )
    );
    ?>
  </nav>
<?php endif; ?>