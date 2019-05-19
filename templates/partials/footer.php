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
	<section class="footer__content maxwidth">
		<div class="footer__wrapper">
			<div class="footer__content__intro">
				<h3 class="footer__content__intro__name"><?php bloginfo('name'); ?><span class="footer__content__intro__name__secondary">优质漫画文化媒体</span></h3>
				<p class="footer__content__intro__summary">没有资讯快餐，没有动游音影。我们致力于收集与输出中文互联网上最具长远留存价值的漫画内容，让你更了解漫画及其身后世界的魅力。<br/><br/><strong>喜欢漫画的，都是我们的朋友。一起来玩吧！</strong></p>
			</div>
			<div class="footer__content__widgets">
				hihi
			</div>
			<?php get_template_part( 'templates/partials/footer-widgets' ); ?>
			<!-- <?php if ( has_nav_menu( 'footer' ) ) : ?>
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
				</nav>
			<?php endif; ?> -->

			<div class="footer__content__copyright">
				<em class="">版权所属 &copy; 2011-<?php echo date('Y'); ?> <?php bloginfo('name'); ?> 及其作者群体。著作权持有人保留著作权法规定的所有权利。</em>
					<!-- <br><br><span style="font-size: 12px; color: #999;">Best wishes to Z in Japan.</span></em> -->
			</div>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>
