<?php
/**
 * Cherry-services-list hooks.
 *
 * @package Tm_codebolt
 */

// Customization cherry-services-list plugin.
add_filter( 'cherry_services_list_meta_options_args', 'tm_codebolt_change_services_list_icon_pack' );
add_filter( 'cherry_services_default_icon_format', 'tm_codebolt_cherry_services_default_icon_format' );
add_filter( 'cherry_services_features_title_format', 'tm_codebolt_cherry_services_features_title_format' );

add_filter( 'cherry_services_list_meta_options_args', 'tm_codebolt_cherry_services_list_meta_options_args' );
add_filter( 'cherry_services_data_callbacks', 'tm_codebolt_cherry_services_data_callbacks', 10, 2 );

// Add new services list template
add_filter( 'cherry_services_listing_templates_list', 'tm_codebolt_cherry_services_listing_templates_list' );



/*
 *
 * Add new services list template
 *
 * */
function tm_codebolt_cherry_services_listing_templates_list( $tmpl ) {

	$tmpl['media-thumb'] = 'media-thumb.tmpl';

	return $tmpl;
}

/**
 * Change cherry-services-list icon pack.
 */
function tm_codebolt_change_services_list_icon_pack( $fields ) {

	$fields['fields']['cherry-services-icon']['icon_data'] = array(
		'icon_set'    => 'tm_codeboltLinearIcons',
		'icon_css'    => TM_CODEBOLT_THEME_URI . '/assets/css/linearicons.css',
		'icon_base'   => 'linearicon',
		'icon_prefix' => 'linearicon-',
		'icons'       => tm_codebolt_get_linear_icons_set(),
	);

	return $fields;
}


/**
 * Change cherry-services-list icon format
 *
 * @return string
 */
function tm_codebolt_cherry_services_default_icon_format( $icon_format ) {
	return '<i class="linearicon %s"></i>';
}

/**
 * Change cherry-services features title format.
 */
function tm_codebolt_cherry_services_features_title_format( $title_format ) {
	return '<h5 class="service-features_title">%s</h5>';
}


/**
 * Add new post-meta field to cherry services.
 *
 */
function tm_codebolt_cherry_services_list_meta_options_args( $args ) {

	$args['fields']['cherry-services-thumb'] = array(
			'type'               => 'media',
			'element'            => 'control',
			'parent'             => 'general',
			'multi_upload'       => false,
			'library_type'       => 'image',
			'upload_button_text' => esc_html__( 'Add thumbnails', 'tm-codebolt' ),
			'label'              => esc_html__( 'Service thumbnails', 'tm-codebolt' ),
			'sanitize_callback'  => 'esc_attr',
	);

	return $args;
}

/**
 * Add new macros %%THUMB%% to cherry services.
 */
function tm_codebolt_cherry_services_data_callbacks( $data, $atts ) {

	$data['thumb'] = 'tm_codebolt_get_service_thumb';

	return $data;
}

/**
 * Callback function to macros %%THUMB%%.
 */
function tm_codebolt_get_service_thumb ( $args = array() ) {

	$callbacks = cherry_services_templater()->callbacks;
	$atts      = $callbacks->atts;

	if ( ! isset( $atts['show_media'] ) ) {
		return;
	}

	$atts['show_media'] = filter_var( $atts['show_media'], FILTER_VALIDATE_BOOLEAN );

	if ( true !== $atts['show_media'] ) {
		return;
	}

	global $post;
	$thumb = get_post_meta( $post->ID, 'cherry-services-thumb', true );

	if ( ! $thumb ) {
		return;
	}

	$format = apply_filters( 'tm_codebolt_cherry_services_default_thumb_format', '<div class="service-thumb"><img src="%1$s" alt="%2$s" ></div>' );

	$args = wp_parse_args( $args, array(
			'wrap'   => 'div',
			'class'  => '',
			'base'   => 'thumb_wrap',
			'size'   => 'full',
			'format' => $format,
	) );

	$result = sprintf( $args['format'], wp_get_attachment_image_url( esc_attr( $thumb ), $args['size'] ), $callbacks->post_title() );

	return $callbacks->macros_wrap( $args, $result );
}

