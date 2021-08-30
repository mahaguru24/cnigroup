<?php
/**
 * Template part for style-2 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tm_codebolt
 */

$search       = get_theme_mod( 'header_search', tm_codebolt_theme()->customizer->get_default( 'header_search' ) );
$woo_elements = get_theme_mod( 'header_woo_elements', tm_codebolt_theme()->customizer->get_default( 'header_woo_elements' ) );
?>
<div class="header-container_wrap container">
	<div class="header-container__top">
		<div class="header-container__flex">
			<div class="site-branding">
				<?php tm_codebolt_header_logo() ?>
				<?php tm_codebolt_site_description(); ?>
			</div>
			<div class="header-elements-wrap">
				<?php tm_codebolt_contact_block( 'header' ); ?>
				<?php tm_codebolt_header_btn(); ?>
			</div>
		</div>
	</div>

	<div class="header-container__bottom">
		<div class="header-container__flex">
			<?php tm_codebolt_main_menu(); ?>

			<?php if ( $search || $woo_elements ) : ?>
			<div class="header-icons divider">
				<?php tm_codebolt_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
				<?php tm_codebolt_header_woo_elements(); ?>
			</div>
			<?php endif; ?>

		</div>
	</div>
</div>
