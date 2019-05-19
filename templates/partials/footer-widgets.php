<?php
/**
 * Displays the footer widget area (in the code it's called "sidebar").
 * The CSS only accommodates a single type: Custom HTML widgets.
 * Inside the widget, there should be links with class .footer__link.
 * It's recommended to have an even number of widgets.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	<aside 
		class="footer__content__widgets" 
		role="complementary" 
		aria-label="<?php esc_attr_e( 'Footer', 'twentynineteen' ); ?>"
	>
		<?php
		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			dynamic_sidebar( 'sidebar-footer' );
		}
		?>
	</aside>
<?php endif; ?>
