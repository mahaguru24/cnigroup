<?php
/**
 * Template part for single post navigation.
 *
 * @package Tm_codebolt
 */

if ( ! get_theme_mod( 'single_post_navigation', tm_codebolt_theme()->customizer->get_default( 'single_post_navigation' ) ) ) {
	return;
}

the_post_navigation();
