<?php
namespace EdgeCore\CPT\Shortcodes\Banner;

use EdgeCore\Lib;

class Banner implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'edgtf_banner';

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
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Edge Banner', 'edgtf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                      => 'icon-wpb-banner extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'edgtf-core' ),
							'description' => esc_html__( 'Select image from media library', 'edgtf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'edgtf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'edgtf-core' ),
							'value'      => array_flip( fluid_edge_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_tag',
							'heading'     => esc_html__( 'Subtitle Tag', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'edgtf-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'edgtf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'edgtf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'edgtf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'edgtf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'edgtf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'edgtf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						)
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'image'			   => '',
			'link'             => '',
			'target'           => '_self',
			'subtitle'		   => '',
			'subtitle_tag'	   => 'h6',
			'subtitle_color'   => '',
			'title'			   => '',
			'title_tag'	 	   => 'h3',
			'title_color'      => '',
			'title_top_margin' => '',
			'text'			   => '',
			'text_color'       => '',
			'text_font_size'   => '',
			'text_font_weight' => '600',
			'text_top_margin'  => ''
		);

		$params = shortcode_atts($args, $atts);
		
		$params['subtitle_tag'] = !empty($subtitle_tag) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['subtitle_styles'] = $this->getSubitleStyles($params);
		
		$params['title_tag'] = !empty($title_tag) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);
		
		$params['text_styles'] = $this->getTextStyles($params);

		$html = edgtf_core_get_shortcode_module_template_part('templates/banner', 'banner', '', $params);

		return $html;
	}
	
	private function getSubitleStyles($params) {
		$styles = array();
		
		if (!empty($params['subtitle_color'])) {
			$styles[] = 'color: '.$params['subtitle_color'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		if (!empty($params['title_top_margin'])) {
			$styles[] = 'margin-top: '.fluid_edge_filter_px($params['title_top_margin']).'px';
		}
		
		return implode(';', $styles);
	}
	
	private function getTextStyles($params) {
		$styles = array();
		
		if (!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}
		
		if (!empty($params['text_font_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['text_font_size']).'px';
		}
		
		if (!empty($params['text_font_weight'])) {
			$styles[] = 'font-weight: '.$params['text_font_weight'];
		}
		
		if (!empty($params['text_top_margin'])) {
			$styles[] = 'margin-top: '.fluid_edge_filter_px($params['text_top_margin']).'px';
		}
		
		return implode(';', $styles);
	}
}