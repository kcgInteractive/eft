<?php
namespace EdgeCore\CPT\Shortcodes\PieChart;

use EdgeCore\Lib;

class PieChart implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_pie_chart';

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
					'name'                      => esc_html__( 'Edge Pie Chart', 'edgtf-core' ),
					'base'                      => $this->getBase(),
					'icon'                      => 'icon-wpb-pie-chart extended-custom-icon',
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'percent',
							'heading'    => esc_html__( 'Percentage', 'edgtf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'percent_color',
							'heading'    => esc_html__( 'Percentage Color', 'edgtf-core' ),
							'dependency' => array( 'element' => 'percent', 'not_empty' => true )
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__( 'Pie Chart Active Gradient Color', 'edgtf-core'),
							'param_name' => 'gradient',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => '',
							'save_always' => true,
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'active_color',
							'heading'    => esc_html__( 'Pie Chart Active Color', 'edgtf-core' ),
							'dependency' => array('element' => 'gradient', 'value' => 'no')
						),
						array(
							'type'       => 'colorpicker',
							'class'      => '',
							'heading'    => 'Active Gradient First Color',
							'param_name' => 'gradient_first_color',
							'value'      => '',
							'dependency' => array('element' => 'gradient', 'value' => 'yes')
						),
						array(
							'type'       => 'colorpicker',
							'class'      => '',
							'heading'    => 'Active Gradient Second Color',
							'param_name' => 'gradient_second_color',
							'value'      => '',
							'dependency' => array('element' => 'gradient', 'value' => 'yes')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'inactive_color',
							'heading'    => esc_html__( 'Pie Chart Inactive Color', 'edgtf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'size',
							'heading'    => esc_html__( 'Pie Chart Size (px)', 'edgtf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line-width',
							'heading'    => esc_html__( 'Line Width (px)', 'edgtf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'percentage_font_size',
							'heading'    => esc_html__( 'Percentage Font Size (px)', 'edgtf-core' )
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
							'value'       => array_flip( fluid_edge_get_title_tag( true ) ),
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
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'edgtf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'edgtf-core' ),
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
			'percent'               => '69',
			'percent_color'         => '',
			'gradient'              => '',
			'active_color'          => '',
			'gradient_first_color'  => '',
			'gradient_second_color' => '',
			'inactive_color'        => '',
			'size'                  => '',
			'line-width'            => '',
			'percentage_font_size'  => '',
			'title'                 => '',
			'title_tag'             => 'h4',
			'title_color'           => '',
			'text'                  => '',
			'text_color'            => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['pie_chart_data']    = $this->getPieChartData($params);
		$params['title_tag']         = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['percent_classes']   = $this->getPercentClass($params);

		$params['percentage_styles'] = $this->getPercentageStyle($params);
		$params['percent_styles']    = $this->getPercentStyles($params);
		$params['title_styles']      = $this->getTitleStyles($params);
		$params['text_styles']       = $this->getTextStyles($params);

		$html = edgtf_core_get_shortcode_module_template_part('templates/pie-chart', 'pie-chart', '', $params);

		return $html;
	}


	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {
		$data = array();

		$is_gradient = $this->isGradient($params);
		
		if(!empty($params['percent'])) {
			$data['data-percent'] = $params['percent'];
		}

		if(!empty($params['size'])) {
			$data['data-size'] = $params['size'];
		}

		if(!empty($params['line-width'])) {
			$data['data-line-width'] = $params['line-width'];
		}

        if($params['gradient'] == 'no' && !empty($params['active_color'])) {
	        $data['data-bar-color'] = $params['active_color'];
        }

		if ($is_gradient) {
			$data['data-bar-1st-color'] = $params['gradient_first_color'];
			$data['data-bar-2nd-color'] =  $params['gradient_second_color'];
		}

        if(!empty($params['inactive_color'])) {
	        $data['data-track-color'] = $params['inactive_color'];
        }

		return $data;
	}

	/**
	 * Return percentage style
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getPercentageStyle($params) {
		$styles = array();

		if (!empty($params['size'])) {
			$styles[] = 'width: '.fluid_edge_filter_px($params['size']).'px';
			$styles[] = 'height: '.fluid_edge_filter_px($params['size']).'px';
			$styles[] = 'line-height: '.fluid_edge_filter_px($params['size']).'px';
		}

		return implode(';', $styles);
	}

	/**
	 * Return percent class
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getPercentClass($params) {
		$classes = array();

		$is_gradient = $this->isGradient($params);

		if($is_gradient) {
			$classes[] = 'edgtf-pc-percentage-gradient';
		}

		return implode(' ', $classes);
	}
	
	private function getPercentStyles($params) {
		$styles = array();
		
		if (!empty($params['percent_color'])) {
			$styles[] = 'color: '.$params['percent_color'];
		}
		
		if(!empty($params['percentage_font_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['percentage_font_size']).'px';
		}
		
		return implode(';', $styles);
	}
	
	private function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTextStyles($params) {
		$styles = array();
		
		if (!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}
		
		return implode(';', $styles);
	}

	/**
	 * Return active color for active bar
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function isGradient($params) {

		if($params['gradient'] == 'yes' && $params['gradient_first_color'] != '' && $params['gradient_second_color'] != '') {
			return true;
		}

		return false;
	}
}