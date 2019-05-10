<?php
/**
 * Displays header site branding, such as logo, site name, etc.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<?php if ( has_custom_logo() ) : ?>
	<div class="header__logo"><?php the_custom_logo(); ?></div>
<?php endif; ?>
<?php $blog_info = get_bloginfo( 'name' ); ?>
<?php if ( ! empty( $blog_info ) ) : ?>
	<p class="header__title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</p>
<?php endif; ?>
<?php
$description = get_bloginfo( 'description', 'display' );
if ( $description || is_customize_preview() ) :
	?>
		<p class="header__description">
			<?php echo $description; ?>
		</p>
<?php endif; ?>