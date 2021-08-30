<?php
/**
 * Cherry-projects hooks.
 *
 * @package Tm_codebolt
 */

// Customization cherry-project plugin.
add_filter( 'cherry-projects-title-settings', 'tm_codebolt_cherry_projects_title_settings' );
add_filter( 'cherry-projects-author-settings', 'tm_codebolt_cherry_projects_author_settings' );
add_filter( 'cherry-projects-button-settings', 'tm_codebolt_cherry_projects_button_settings' );
add_filter( 'cherry-projects-content-settings', 'tm_codebolt_cherry_projects_content_settings' );
add_filter( 'cherry_projects_show_all_text', 'tm_codebolt_projects_show_all_text' );
add_filter( 'cherry-projects-prev-button-text', 'tm_codebolt_cherry_projects_prev_button_text' );
add_filter( 'cherry-projects-next-button-text', 'tm_codebolt_cherry_projects_next_button_text' );
add_filter( 'cherry_projects_data_callbacks', 'tm_codebolt_cherry_projects_data_callbacks', 10, 2 );
add_filter( 'cherry_projects_cascading_list_map', 'tm_codebolt_cherry_projects_cascading_list_map' );

// Change terms permalink text
add_filter( 'cherry-projects-terms-permalink-text', 'tm_codebolt_function_projects_terms_permalink_text' );

// Change layout of single project
add_filter( 'tm_codebolt_content_classes', 'tm_codebolt_function_set_specific_content_classes' );

//Change layout of before main content of project
add_action( 'cherry_projects_before_main_content', 'tm_codebolt_action_cherry_projects_before_main_content' );

/**
 * Customization title settings to cherry-project.
 *
 * @param array $settings Title settings.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_title_settings( $settings ) {

	$title_html = ( is_single() ) ? '<h3 %1$s>%4$s</h3>' : '<h5 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h5>';

	$settings['html']  = $title_html;
	$settings['class'] = 'project-entry-title';

	return $settings;
}

/**
 * Customization meta author settings to cherry-project.
 *
 * @param array $settings Author settings.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_author_settings( $settings ) {

	$settings['html'] = '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>';

	return $settings;
}

/**
 * Customization button settings to cherry-project.
 *
 * @param array $settings Button settings.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_button_settings( $settings ) {

	$new_settings = array(
		'text'  => esc_html__( 'View now!', 'tm-codebolt' ),
		'class' => 'project-more-button link',
		'icon'  => '<i class="linearicon linearicon-arrow-right"></i>',
		'html'  => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
	);

	$settings = array_merge( $settings, $new_settings );

	return $settings;
}

/**
 * Customization content settings to cherry-project.
 *
 * @param array $settings Content settings.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_content_settings( $settings ) {

	$settings['class'] = 'project-entry-content';

	return $settings;
}

/**
 * Customization show all text to cherry-project.
 *
 * @return string
 */
function tm_codebolt_projects_show_all_text( $show_all_text ) {
	return esc_html__( 'All', 'tm-codebolt' );
}

/**
 * Customization cherry-projects prev button text.
 *
 * @return string
 */
function tm_codebolt_cherry_projects_prev_button_text( $prev_text ) {
	return '<i class="linearicon linearicon-arrow-left"></i>';
}

/**
 * Customization cherry-projects next button text.
 *
 * @return string
 */
function tm_codebolt_cherry_projects_next_button_text( $next_text ) {
	return '<i class="linearicon linearicon-arrow-right"></i>';
}

/**
 * Add macros %%SHAREBUTTONS%% and callback to cherry-project.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_data_callbacks( $data, $atts ) {

	$data['sharebuttons'] = 'tm_codebolt_get_single_share_buttons';

	return $data;
}

/**
 * Customization cherry-projects cascading list map.
 *
 * @return array
 */
function tm_codebolt_cherry_projects_cascading_list_map( $cascading_list_map ) {
	return array( 2, 2, 3, 3, 3, 4, 4, 4, 4 );
}

/**
 * Change terms permalink text
 */
function tm_codebolt_function_projects_terms_permalink_text() {
	return esc_html__( 'view projects', 'tm-codebolt' );
}

/**
 * Change layout for custom post type
 */
function tm_codebolt_function_set_specific_content_classes( $layout_classes ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );

	if ( ('fullwidth' === $sidebar_position && is_single() && !is_singular( 'post' )) ) {
		$layout_classes = array( 'col-xs-12' );
	}

	return $layout_classes;
}


/**
 * Change layout of before main content of project
 */
function tm_codebolt_action_cherry_projects_before_main_content() {
	if ( ! is_tax( array( 'projects_category', 'projects_tag' ) ) ) {
		return;
	}

	$title = '<h2 class="project-terms-title">' . single_term_title( '', false ) . '</h2>';
	$desc  = get_the_archive_description();
	$image = tm_codebolt_utility()->utility->media->get_image(
		array(
			'html'        => '<img src="%3$s" %2$s alt="%4$s" %5$s >',
			'class'       => 'term-img',
			'size'        => 'tm_codebolt-thumb-xl',
			'placeholder' => false,
			'echo'        => false,
		),
		'term',
		get_queried_object_id()
	); ?>

	<div class="project-terms-caption grid-default-layout">
		<div class="project-terms-caption-header">
			<div class="project-terms-thumbnail">
				<?php echo $image; ?>
			</div>
			<?php
			if ( single_term_title( '', false ) ) {
				echo $title;
			} ?>
		</div>
		<div class="project-terms-caption-content">
			<div class="container">
				<?php if ( $desc ) {
					echo $desc;
				} ?>
			</div>
		</div>
	</div>
	<?php
}
