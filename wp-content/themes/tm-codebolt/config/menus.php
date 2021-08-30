<?php
/**
 * Menus configuration.
 *
 * @package Tm_codebolt
 */

add_action( 'after_setup_theme', 'tm_codebolt_register_menus', 5 );
/**
 * Register menus.
 */
function tm_codebolt_register_menus() {

	register_nav_menus( array(
		'top'          => esc_html__( 'Top', 'tm-codebolt' ),
		'main'         => esc_html__( 'Main', 'tm-codebolt' ),
		'main_landing' => esc_html__( 'Landing Main', 'tm-codebolt' ),
		'footer'       => esc_html__( 'Footer', 'tm-codebolt' ),
		'social'       => esc_html__( 'Social', 'tm-codebolt' ),
	) );
}
