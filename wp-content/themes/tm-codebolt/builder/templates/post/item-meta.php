<?php
/**
 * Template part for displaying cureent item meta
 *
 * @package Tm_codebolt
 */

if ( ! $this->_var( 'meta_data' ) || 'off' === $this->_var( 'meta_data' ) ) {
	return;
}
?>
<div class="tm_codeboltposts_item_meta entry-meta"><?php

	tm_builder_core()->utility()->meta_data->get_date( apply_filters( 'tm_codebolt_module_post_date_settings', array(
		'icon' => '',
		'echo' => true,
	) ) );

	tm_builder_core()->utility()->meta_data->get_author( apply_filters( 'tm_codebolt_module_post_author_settings', array(
		'icon'   => '',
		'prefix' => esc_html__( 'by ', 'tm-codebolt' ),
		'html'   => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
		'echo'   => true,
	) ) );

	tm_builder_core()->utility()->meta_data->get_comment_count( apply_filters( 'tm_codebolt_module_post_comment_settings', array(
		'visible' => false,
		'icon'    => '',
		'sufix'   => get_comments_number_text( esc_html__( 'No comment(s)', 'tm-codebolt' ), esc_html__( '1 comment', 'tm-codebolt' ), esc_html__( '% comments', 'tm-codebolt' ) ),
		'echo'    => true,
	) ) );

?></div>
