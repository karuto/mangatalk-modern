<?php
/**
 * The template that displays the bottom footer content inside the <body>.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<footer id="colophon" class="footer">
	<?php get_template_part( 'templates/partials/footer-widgets' ); ?>
	<div class="site-info">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
