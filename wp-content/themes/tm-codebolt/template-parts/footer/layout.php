<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Tm_codebolt
 */

$footer_contact_block_visibility = get_theme_mod( 'footer_contact_block_visibility', tm_codebolt_theme()->customizer->get_default( 'footer_contact_block_visibility' ) );
?>

<div class="footer-container <?php echo tm_codebolt_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<?php tm_codebolt_footer_logo(); ?>
			<?php tm_codebolt_footer_menu(); ?>

			<?php if ( $footer_contact_block_visibility ) : ?>
			<div class="site-info__bottom">
			<?php endif; ?>
				<?php tm_codebolt_footer_copyright(); ?>
				<?php tm_codebolt_contact_block( 'footer' ); ?>
			<?php if ( $footer_contact_block_visibility ) : ?>
			</div>
			<?php endif; ?>

			<?php tm_codebolt_social_list( 'footer' ); ?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->
