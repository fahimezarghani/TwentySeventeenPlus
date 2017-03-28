<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :

	$sed_footer_columns = (int)get_theme_mod( 'sed_footer_columns' , 2 );

	$sed_footer_columns = $sed_footer_columns < 2 || $sed_footer_columns > 4 ? 2 : $sed_footer_columns;
?>

	<aside class="widget-area footer-widget-area-<?php echo esc_attr( $sed_footer_columns );?>" data-num-columns="<?php echo esc_attr( $sed_footer_columns );?>" role="complementary">
		<?php

		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php }

		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>

			<div class="widget-column-spacing footer-widget-spacing"><span><?php echo __( 'Seperator', 'twentyseventeen' );?></span></div>

			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>

		<?php }

		if ( is_active_sidebar( 'sidebar-4' ) && ( $sed_footer_columns > 2 || site_editor_app_on() ) ) {

			$hide_class = ( $sed_footer_columns > 2 ) ? "" : "hide";

			?>

			<div class="widget-column-spacing footer-widget-spacing <?php echo esc_attr( $hide_class );?>"><span><?php echo __( 'Seperator', 'twentyseventeen' );?></span></div>

			<div class="widget-column footer-widget-3 <?php echo esc_attr( $hide_class );?>">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div>
		<?php }

		if ( is_active_sidebar( 'sidebar-5' ) && ( $sed_footer_columns == 4 || site_editor_app_on() ) ) {

			$hide_class = ( $sed_footer_columns == 4 ) ? "" : "hide";

			?>

			<div class="widget-column-spacing footer-widget-spacing <?php echo esc_attr( $hide_class );?>"><span><?php echo __( 'Seperator', 'twentyseventeen' );?></span></div>

			<div class="widget-column footer-widget-4 <?php echo esc_attr( $hide_class );?>">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			</div>
		<?php }

		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
