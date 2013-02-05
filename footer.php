<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
  </div><!-- #main .layout-main-wrap -->
  
  <div class="layout-footer-wrap">

	  <footer id="colophon" class="main-footer" role="contentinfo">
	    <div class="site-info">
	      <?php do_action( 'twentytwelve_credits' ); ?>
	      <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
	    </div><!-- .site-info -->
	  </footer><!-- #colophon -->

	</div><!-- .layout-footer-wrap -->

</div><!-- #page .layout-page-wrap -->

<?php wp_footer(); ?>
</body>
</html>