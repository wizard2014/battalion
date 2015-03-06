<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blog Fever
 */
?>

		</div><!-- #content -->
	</div> <!-- end of main-page -->
</div> <!-- end of main-content-area -->

<div class="footer-area full">
	<div class="main-page">
		<footer id="colophon" class="site-footer inner" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'blog-fever' ) ); ?>"><?php printf( __( 'Powered by %s', 'blog-fever' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				Created by <a href="http://versover.com" target="_blank">Versover</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div> <!-- end of main-page -->
</div> <!-- end of footer-area -->

<?php wp_footer(); ?>

</body>
</html>
