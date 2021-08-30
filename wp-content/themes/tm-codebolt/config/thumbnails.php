<?php
/**
 * Thumbnails configuration.
 *
 * @package Tm_codebolt
 */

add_action( 'after_setup_theme', 'tm_codebolt_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function tm_codebolt_register_image_sizes() {
	set_post_thumbnail_size( 418, 315, true );

	// Registers a new image sizes.
	add_image_size( 'tm_codebolt-thumb-s', 150, 150, true );
	add_image_size( 'tm_codebolt-slider-thumb', 158, 88, true );
	add_image_size( 'tm_codebolt-thumb-m', 400, 400, true );
	add_image_size( 'tm_codebolt-thumb-m-2', 650, 490, true );
	add_image_size( 'tm_codebolt-thumb-masonry', 418, 9999 );
	add_image_size( 'tm_codebolt-thumb-l', 886, 668, true );
	add_image_size( 'tm_codebolt-thumb-l-2', 886, 315, true );
	add_image_size( 'tm_codebolt-thumb-xl', 1920, 1080, true );
	add_image_size( 'tm_codebolt-author-avatar', 512, 512, true );
	add_image_size( 'tm_codebolt-thumb-1355-1020', 1355, 1020, true );
}
