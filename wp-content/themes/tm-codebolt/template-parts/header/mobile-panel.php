<?php
/**
 * Template part for mobile panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tm_codebolt
 */
?>
<div class="mobile-panel">
	<?php tm_codebolt_menu_toggle( 'main-menu' ); ?>
	<div class="mobile-panel__right">
		<?php tm_codebolt_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
		<?php tm_codebolt_header_woo_elements(); ?>
	</div>
</div>
