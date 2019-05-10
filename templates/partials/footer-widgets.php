<?php
/**
 * Displays the footer widget area (in the code it's called "sidebar").
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

	<aside 
		class="widget-area" 
		role="complementary" 
		aria-label="<?php esc_attr_e( 'Footer', 'twentynineteen' ); ?>"
	>
		<?php
		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			dynamic_sidebar( 'sidebar-footer' );
		}
		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
