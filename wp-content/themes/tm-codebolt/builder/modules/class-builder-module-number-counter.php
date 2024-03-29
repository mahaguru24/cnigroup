<?php
/**
 * class Tm_Codebolt_Builder_Module_Number_Counter.
 */
class Tm_Codebolt_Builder_Module_Number_Counter extends Tm_Builder_Module {

	public $function_name;

	public function init() {
		$this->name = esc_html__( 'Number Counter', 'tm-codebolt' );
		$this->slug = 'tm_pb_number_counter';
		$this->icon = 'f295';

		$this->whitelisted_fields = array(
			'title',
			'number',
			'percent_sign',
			'counter_color',

			'use_icon',
			'font_icon',
			'icon_color',

			'use_icon_font_size',
			'icon_font_size',
			'icon_font_size_laptop',
			'icon_font_size_tablet',
			'icon_font_size_phone',

			'admin_label',
			'module_id',
			'module_class',
		);

		$this->fields_defaults = array(
			'number'             => array( '0' ),
			'percent_sign'       => array( 'on' ),
			'counter_color'      => array( tm_builder_secondary_color(), 'add_default_setting' ),

			'use_icon'           => array( 'off' ),
			'icon_color'         => array( tm_builder_accent_color(), 'add_default_setting' ),
			'use_icon_font_size' => array( 'off' ),
			'icon_font_size'     => array( '50px' ),
		);

		$this->custom_css_options = array(
			'percent' => array(
				'label'    => esc_html__( 'Percent', 'tm-codebolt' ),
				'selector' => '.percent',
			),
			'number_counter_title' => array(
				'label'    => esc_html__( 'Number Counter Title', 'tm-codebolt' ),
				'selector' => 'h3',
			),
		);

		$this->main_css_element = '%%order_class%%.tm_pb_number_counter';
		$this->advanced_options = array(
			'fonts' => array(
				'title' => array(
					'label'    => esc_html__( 'Title', 'tm-codebolt' ),
					'css'      => array(
						'main' => "{$this->main_css_element} h3",
					),
				),
				'number'   => array(
					'label'    => esc_html__( 'Number', 'tm-codebolt' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .percent",
					),
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
					),
				),
			),
			'background' => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(),
			'custom_margin_padding' => array(
				'use_margin' => false,
				'css'        => array(
					'important' => 'all',
				),
			),
		);

		if ( tm_is_builder_plugin_active() ) {
			$this->advanced_options['fonts']['number']['css']['important'] = 'all';
		}
	}

	public function get_fields() {
		$fields = array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'tm-codebolt' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input a title for the counter.', 'tm-codebolt' ),
			),
			'number' => array(
				'label'           => esc_html__( 'Number', 'tm-codebolt' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( "Define a number for the counter. (Don't include the percentage sign, use the option below.)", 'tm-codebolt' ),
			),
			'percent_sign' => array(
				'label'           => esc_html__( 'Percent Sign', 'tm-codebolt' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'On', 'tm-codebolt' ),
					'off' => esc_html__( 'Off', 'tm-codebolt' ),
				),
				'description'     => esc_html__( 'Here you can choose whether the percent sign should be added after the number set above.', 'tm-codebolt' ),
			),
			'counter_color' => array(
				'label'       => esc_html__( 'Counter Text Color', 'tm-codebolt' ),
				'type'        => 'color',
				'description' => esc_html__( 'This will change the fill color for the bar.', 'tm-codebolt' ),
			),
			'use_icon' => array(
				'label'           => esc_html__( 'Use Icon', 'tm-codebolt' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'tm-codebolt' ),
					'on'  => esc_html__( 'Yes', 'tm-codebolt' ),
				),
				'affects'         => array(
					'#tm_pb_font_icon',
					'#tm_pb_icon_color',
				),
				'description'     => esc_html__( 'Here you can choose whether icon set below should be used.', 'tm-codebolt' ),
			),
			'font_icon' => array(
				'label'               => esc_html__( 'Icon', 'tm-codebolt' ),
				'type'                => 'text',
				'option_category'     => 'basic_option',
				'class'               => array( 'Tm_Codeboltpb-font-icon' ),
				'renderer'            => 'tm_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'description'         => esc_html__( 'Choose an icon to display.', 'tm-codebolt' ),
				'depends_default'     => true,
			),
			'icon_color' => array(
				'label'           => esc_html__( 'Icon Color', 'tm-codebolt' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for your icon.', 'tm-codebolt' ),
				'depends_default' => true,
			),
			'use_icon_font_size' => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'tm-codebolt' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'tm-codebolt' ),
					'on'  => esc_html__( 'Yes', 'tm-codebolt' ),
				),
				'affects'         => array(
					'#tm_pb_icon_font_size',
				),
				'tab_slug'        => 'advanced',
			),
			'icon_font_size' => array(
				'label'           => esc_html__( 'Icon Font Size', 'tm-codebolt' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'tab_slug'        => 'advanced',
				'default'         => '50px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'depends_default' => true,
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'tm-codebolt' ),
				'type'            => 'multiple_checkboxes',
				'options'         => tm_pb_media_breakpoints(),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'tm-codebolt' ),
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'tm-codebolt' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'tm-codebolt' ),
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'tm-codebolt' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'tm-codebolt' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
		);
		return $fields;
	}

	public function shortcode_callback( $atts, $content = null, $function_name ) {

		wp_enqueue_script( 'easypiechart' );

		$this->set_vars(
			array(
				'number',
				'percent_sign',
				'title',
				'counter_color',

				'use_icon',
				'font_icon',
				'icon_color',
				'use_icon_font_size',
				'icon_font_size',
				'icon_font_size_laptop',
				'icon_font_size_tablet',
				'icon_font_size_phone',
			)
		);

		$this->function_name = $function_name;

		if ( tm_is_builder_plugin_active() ) {
			wp_enqueue_script( 'fittext' );
		}

		$this->_var( 'number', str_ireplace( '%', '', $this->_var( 'number' ) ) );

		$classes = array( 'tm_pb_bg_layout_light' );
		$atts    = array( 'data-number-value' => $this->_var( 'number' ) );
		$content = $this->get_template_part( 'number-counter.php' );

		TM_Builder_Element::set_style( $function_name, array(
			'selector'    => '%%order_class%% .percent',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_attr( $this->_var( 'counter_color' ) )
			),
		) );

		$output = $this->wrap_module( $content, $classes, $function_name, $atts );

		return $output;
	}

	/**
	 * Returns icon HTML markup.
	 *
	 * @return string|void
	 */
	public function get_icon() {
		if ( 'off' === $this->_var( 'use_icon' ) || '' === $this->_var( 'font_icon' ) ) {
			return;
		}

		$icon        = esc_attr( tm_pb_process_font_icon( $this->_var( 'font_icon' ) ) );
		$icon_family = tm_builder_get_icon_family();

		if ( 'off' !== $this->_var( 'use_icon_font_size' ) ) {
			$font_size_values = array(
				'desktop' => $this->_var( 'icon_font_size' ),
				'laptop'  => $this->_var( 'icon_font_size_laptop' ),
				'tablet'  => $this->_var( 'icon_font_size_tablet' ),
				'phone'   => $this->_var( 'icon_font_size_phone' ),
			);

			tm_pb_generate_responsive_css(
				$font_size_values,
				'%%order_class%% .tm_codeboltpb-icon',
				'font-size',
				$this->function_name
			);
		}

		if ( $icon_family ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%% .tm_codeboltpb-icon:before',
				'declaration' => sprintf(
					'font-family: "%1$s" !important;',
					esc_attr( $icon_family )
				),
			) );
		}

		TM_Builder_Element::set_style( $this->function_name, array(
			'selector'    => '%%order_class%% .tm_codeboltpb-icon',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_attr( $this->_var( 'icon_color' ) )
			),
		) );

		return sprintf(
			'<span class="tm_codeboltpb-icon" data-icon="%1$s"></span>',
			$icon
		);
	}

	/**
	 * Returns percent sign
	 *
	 * @param  string $sign
	 * @return string
	 */
	public function nc_sign( $sign = '%' ) {
		if ( 'on' === $this->_var( 'percent_sign' ) ) {
			return $sign;
		}
	}
}

new tm_codebolt_Builder_Module_Number_Counter;
