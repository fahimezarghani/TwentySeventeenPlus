<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<?php
		$disable_footer = (bool)get_theme_mod( 'sed_disable_footer' );

		if( $disable_footer === false || site_editor_app_on() ) {

			$hide_class = ( $disable_footer !== false ) ? "hide" : "";

			?>

			<footer id="colophon" class="site-footer <?php echo esc_attr( $hide_class );?>" role="contentinfo">
				<div class="wrap">
					<?php

					get_template_part( 'template-parts/footer/footer', 'widgets' );

					if ( site_editor_app_on() ) : ?>
						<div class="twse-social-navigation">
						<?php endif;

						if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif;

					if ( site_editor_app_on() ) : ?>
						</div>
					<?php endif;

					get_template_part( 'template-parts/footer/site', 'info' );
					?>
				</div><!-- .wrap -->
			</footer><!-- #colophon -->

			<?php
		}
		?>

	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
