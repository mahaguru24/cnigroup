<?php
/**
 * Register required plugins for TGM Plugin Activator
 *
 * @package Tm_codebolt
 */
add_action( 'tgmpa_register', 'tm_codebolt_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function tm_codebolt_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name' => esc_html__( 'Cherry Project', 'tm-codebolt' ),
			'slug' => 'cherry-projects',
		),
		array(
			'name' => esc_html__( 'Cherry Team Members', 'tm-codebolt' ),
			'slug' => 'cherry-team-members',
		),
		array(
			'name' => esc_html__( 'Cherry Testimonials', 'tm-codebolt' ),
			'slug' => 'cherry-testi',
		),
		array(
			'name' => esc_html__( 'Cherry Services List', 'tm-codebolt' ),
			'slug' => 'cherry-services-list',
		),
		array(
			'name' => esc_html__( 'Cherry Sidebars', 'tm-codebolt' ),
			'slug' => 'cherry-sidebars',
		),
		array(
			'name'   => esc_html__( 'Power Builder', 'tm-codebolt' ),
			'slug'   => 'power-builder',
			'source' => TM_CODEBOLT_THEME_DIR . '/assets/includes/plugins/power-builder.zip',
		),
		array(
			'name'         => esc_html__( 'Power Builder Integrator', 'tm-codebolt' ),
			'slug'         => 'power-builder-integrator',
			'source'       => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-integrator.zip',
		),
		array(
			'name'     => esc_html__('Cherry Data Importer', 'tm-codebolt'),
			'slug'     => 'cherry-data-importer',
			'source'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
			'external_url' => 'https://github.com/CherryFramework/cherry-data-importer',
		),
		array(
				'name' => esc_html__( 'Cherry Search', 'tm-codebolt' ),
				'slug' => 'cherry-search',
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tm-codebolt',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
