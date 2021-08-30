<?php
/**
 * Template part for style-5 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tm_codebolt
 */
?>
<div class="header-container_wrap container">
	<div class="header-container__flex">
		<div class="site-branding">
			<?php tm_codebolt_header_logo() ?>
			<?php tm_codebolt_site_description(); ?>
		</div>
		<?php tm_codebolt_main_menu(); ?>
		<?php tm_codebolt_header_btn(); ?>
	</div>
</div>
