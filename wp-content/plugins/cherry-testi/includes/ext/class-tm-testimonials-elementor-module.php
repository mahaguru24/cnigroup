<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class TM_Testimonials_Elementor_Widget extends Elementor\Widget_Base {

	/**
	 * Rewritten shortcode arguments
	 *
	 * @var array
	 */
	protected $rewrite = array(
		'id' => 'post_id',
	);

	/**
	 * Get shortcode data by name
	 *
	 * @param  string $name Data name to get.
	 * @return mixed
	 */
	public function get_shortcode( $name ) {

		if ( ! isset( tm_testimonials_elementor_compat()->shortcodes[ tm_testimonials_shortcode()->get_tag() ] ) ) {
			return;
		}

		$shortcode = wp_parse_args( tm_testimonials_elementor_compat()->shortcodes[ tm_testimonials_shortcode()->get_tag() ], array(
			'title' => null,
			'icon'  => 'eicon-shortcode',
			'atts'  => array(),
		) );

		return isset( $shortcode[ $name ] ) ? $shortcode[ $name ] : false;
	}

	public function get_script_depends() {
		return array( 'cherry-testi-public' );
	}

	public function get_name() {
		return tm_testimonials_shortcode()->get_tag();
	}

	public function get_title() {
		return $this->get_shortcode( 'title' );
	}

	public function get_icon() {
		return $this->get_shortcode( 'icon' );
	}

	public function get_categories() {
		return array( 'cherry' );
	}

	public function is_reload_preview_required() {
		return true;
	}

	/**
	 * Map controls
	 *
	 * @param  string $name Default control name.
	 * @return string
	 */
	protected function _get_mapped_control( $name = null ) {

		$mapped_controls = array(
			'media'    => Elementor\Controls_Manager::MEDIA,
			'text'     => Elementor\Controls_Manager::TEXT,
			'textarea' => Elementor\Controls_Manager::TEXTAREA,
			'select'   => Elementor\Controls_Manager::SELECT,
			'switcher' => Elementor\Controls_Manager::SWITCHER,
			'slider'   => Elementor\Controls_Manager::SLIDER,
		);

		if ( isset( $mapped_controls[ $name ] ) ) {
			return $mapped_controls[ $name ];
		} else {
			return false;
		}

	}

	/**
	 * Sanitize attribute arguments data.
	 *
	 * @param  array  $data Input arguments.
	 * @param  string $type Attribute control type.
	 * @return array
	 */
	protected function _sanitize_attr_data( $data ) {

		$type = $this->_get_mapped_control( $data['type'] );

		if ( ! $type ) {
			return;
		}

		$mapped_args = array(
			'label'   => $data['title'],
			'type'    => $type,
			'default' => array( $data['value'] ),
		);

		if ( 'switcher' === $data['type'] ) {
			$mapped_args['default'] = ( 'on' === $data['value'] ) ? 'yes' : '';
		}

		if ( isset( $data['options'] ) ) {
			$mapped_args['options'] = $data['options'];
		}

		if ( isset( $data['options_cb'] ) ) {
			$mapped_args['options'] = call_user_func( $data['options_cb'] );
		}

		if ( ! empty( $mapped_args['options'] ) ) {
			$mapped_args = $this->__fix_options( $mapped_args );
		}

		if ( isset( $data['min_value'] ) && isset( $data['max_value'] ) ) {
			$mapped_args['default'] = array(
				'size' => $data['value'],
			);
			$mapped_args['range'] = array(
				'px' => array(
					'min' => $data['min_value'],
					'max' => $data['max_value'],
				),
			);
		}

		if ( isset( $data['condition'] ) ) {
			$mapped_args['condition'] = $data['condition'];
		}

		return $mapped_args;
	}

	/**
	 * Fix options list
	 *
	 * @return array
	 */
	protected function __fix_options( $args = array() ) {
		foreach ( $args['options'] as $key => $label ) {
			if ( is_array( $label ) ) {
				$args['options'][ $key ] = $label['label'];
			}
		}

		return $args;
	}

	/**
	 * Sanitize attribute name
	 *
	 * @param  string $name Attribute name.
	 * @return string
	 */
	protected function _sanitize_attr_name( $name ) {
		return isset( $this->rewrite[ $name ] ) ? $this->rewrite[ $name ] : $name;
	}

	protected function _register_controls() {

		$args = $this->get_shortcode( 'atts' );

		if ( ! $args ) {
			return;
		}

		$this->start_controls_section(
			'section_main',
			array(
				'label' => $this->get_shortcode( 'title' ),
			)
		);

		foreach ( $args as $name => $arg ) {

			$name        = $this->_sanitize_attr_name( $name );
			$mapped_args = $this->_sanitize_attr_data( $arg );

			$this->add_control( $name, $mapped_args );

		}

		$this->end_controls_section();

	}

	protected function render() {

		$settings       = $this->get_settings();
		$shortcode      = '[%1$s%2$s]';
		$shortcode_atts = '';
		$args           = $this->get_shortcode( 'atts' );
		$tag            = tm_testimonials_shortcode()->get_tag();

		foreach ( $args as $name => $arg ) {

			if ( empty( $settings[ $name ] ) ) {

				if ( 'switcher' === $arg['type'] ) {
					$shortcode_atts .= sprintf( ' %1$s="%2$s"', $name, 'no' );
				}

				continue;
			}

			if ( ! is_array( $settings[ $name ] ) ) {
				$val = $settings[ $name ];
			} else {
				if ( isset( $settings[ $name ]['size'] ) ) {
					$val = $settings[ $name ]['size'];
				} else {
					$val = $settings[ $name ][0];
				}
			}

			$shortcode_atts .= sprintf( ' %1$s="%2$s"', $name, $val );
		}

		?>
		<div class="elementor-<?php $tag; ?>"><?php
			echo do_shortcode( sprintf( $shortcode, $tag, $shortcode_atts ) );
		?></div>
		<?php
	}

	protected function _content_template() {}

	/**
	 * Returns widget instance for register function
	 *
	 * @return object
	 */
	public static function get_instance() {
		return new self();
	}

}
