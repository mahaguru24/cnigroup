<?php
/**
 * Template part for style-3 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tm_codebolt
 */
?>
<div class="header-container_wrap container">
	<?php tm_codebolt_vertical_main_menu(); ?>
	<div class="header-container__flex">
		<div class="site-branding">
			<?php tm_codebolt_header_logo() ?>
			<?php tm_codebolt_site_description(); ?>
		</div>

		<div class="header-icons">
			<?php tm_codebolt_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
			<?php tm_codebolt_header_woo_elements(); ?>
			<?php tm_codebolt_vertical_menu_toggle( 'main-menu' ); ?>
			<?php tm_codebolt_header_btn(); ?>
		</div>

	</div>
</div>
