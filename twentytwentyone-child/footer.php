<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->


<footer>
	<div class="flex wrapper">
		<div class="powered-by">
					<?php
					printf(
						/* translators: %s: WordPress. */
						esc_html__( 'Proudly powered by %s.', 'twentytwentyone' ),
						'<a href="' . esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ) . '">WordPress</a>'
					);
					?>
		</div><!-- .powered-by -->
	</div>

</body>
</html>
