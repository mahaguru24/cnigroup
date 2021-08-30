<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package Tm_codebolt
 */

?>
<div class="footer-container <?php echo tm_codebolt_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<?php
			tm_codebolt_footer_logo();
			tm_codebolt_footer_menu();
			tm_codebolt_contact_block( 'footer' );
			tm_codebolt_social_list( 'footer' );
			tm_codebolt_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
