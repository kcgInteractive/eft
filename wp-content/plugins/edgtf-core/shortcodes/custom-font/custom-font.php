<?php
namespace EdgeCore\CPT\Shortcodes\CustomFont;

use EdgeCore\Lib;

/**
 * Class CustomFont
 */
class CustomFont implements Lib\ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_custom_font';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		vc_map( array(
				'name'      => esc_html__('Edge Custom Font', 'edgtf-core'),
				'base'      => $this->getBase(),
				'category'  => esc_html__('by EDGE', 'edgtf-core'),
				'icon'      => 'icon-wpb-custom-font extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__('Title Tag', 'edgtf-core'),
						'value'       => array_flip(fluid_edge_get_title_tag(true, array('p' => 'p'))),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'font_family',
						'heading'    => esc_html__('Font Family', 'edgtf-core')
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'font_size',
						'heading'    => esc_html__('Font Size (px)', 'edgtf-core')
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'line_height',
						'heading'    => esc_html__('Line Height (px)', 'edgtf-core')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'font_weight',
						'heading'     => esc_html__('Font Weight', 'edgtf-core'),
						'value'       => array_flip(fluid_edge_get_font_weight_array(true)),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'font_style',
						'heading'     => esc_html__('Font Style', 'edgtf-core'),
						'value'       => array_flip(fluid_edge_get_font_style_array(true)),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'letter_spacing',
						'heading'    => esc_html__('Letter Spacing (px)', 'edgtf-core')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'text_transform',
						'heading'     => esc_html__('Text Transform', 'edgtf-core'),
						'value'       => array_flip(fluid_edge_get_text_transform_array(true)),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'text_decoration',
						'heading'     => esc_html__('Text Decoration', 'edgtf-core'),
						'value'       => array_flip(fluid_edge_get_text_decorations(true)),
						'save_always' => true
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'color',
						'heading'    => esc_html__('Color', 'edgtf-core')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'text_align',
						'heading'    => esc_html__('Text Align', 'edgtf-core'),
						'value'      => array(
							esc_html__('Default', 'edgtf-core')   => '',
							esc_html__('Left', 'edgtf-core') => 'left',
							esc_html__('Center', 'edgtf-core') => 'center',
							esc_html__('Right', 'edgtf-core') => 'right',
							esc_html__('Justify', 'edgtf-core') => 'justify'
						),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'margin',
						'heading'    => esc_html__('Margin (px or %)', 'edgtf-core')
					),
					array(
						'type'       => 'textarea',
						'param_name' => 'content_text',
						'heading'    => esc_html__('Content', 'edgtf-core')
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'title_tag'       => 'h2',
			'font_family'     => '',
			'font_size'       => '',
			'line_height'     => '',
			'font_weight'     => '',
			'font_style'      => '',
			'letter_spacing'  => '',
			'text_transform'  => '',
			'text_decoration' => '',
			'color'           => '',
			'text_align'      => '',
			'margin'          => '',
			'content_text'    => ''
		);
		$params = shortcode_atts($args, $atts);

		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['holder_data']   = $this->getHolderData($params);

		$params['title_tag']     = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];

		//Get HTML from template
		$html = edgtf_core_get_shortcode_module_template_part('templates/custom-font', 'custom-font', '', $params);

		return $html;
	}

	/**
	 * Return holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getHolderStyles($params) {
		$styles = array();

		if ($params['font_family'] !== '') {
			$styles[] = 'font-family: '.$params['font_family'];
		}

		if (!empty($params['font_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['font_size']).'px';
		}

		if (!empty($params['line_height'])) {
			$styles[] = 'line-height: '.fluid_edge_filter_px($params['line_height']).'px';
		}

		if (!empty($params['font_weight'])) {
			$styles[] = 'font-weight: '.$params['font_weight'];
		}

		if (!empty($params['font_style'])) {
			$styles[] = 'font-style: '.$params['font_style'];
		}

		if (!empty($params['letter_spacing'])) {
			$styles[] = 'letter-spacing: '.fluid_edge_filter_px($params['letter_spacing']).'px';
		}

		if (!empty($params['text_transform'])) {
			$styles[] = 'text-transform: '.$params['text_transform'];
		}

		if (!empty($params['text_decoration'])) {
			$styles[] = 'text-decoration: '.$params['text_decoration'];
		}

		if (!empty($params['text_align'])) {
			$styles[] = 'text-align: '.$params['text_align'];
		}

		if (!empty($params['color'])) {
			$styles[] = 'color: '.$params['color'];
		}
		
		if ($params['margin'] !== '') {
			$styles[] = 'margin: '.$params['margin'];
		}

		return implode(';', $styles);
	}

	/**
	 * Return holder data attr
	 *
	 * @param $params
	 * @return string
	 */
	private function getHolderData($params) {
		$data = array();

		if (!empty($params['font_size'])) {
			$data[] = 'data-font-size='.fluid_edge_filter_px($params['font_size']);
		}

		if (!empty($params['line_height'])) {
			$data[] = 'data-line-height='.fluid_edge_filter_px($params['line_height']);
		}
		
		return implode(' ', $data);
	}
}