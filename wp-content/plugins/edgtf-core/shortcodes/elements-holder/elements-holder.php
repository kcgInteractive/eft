<?php
namespace EdgeCore\CPT\Shortcodes\ElementsHolder;

use EdgeCore\Lib;

class ElementsHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Edge Elements Holder', 'edgtf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-elements-holder extended-custom-icon',
					'category'  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'as_parent' => array( 'only' => 'edgtf_elements_holder_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Columns', 'edgtf-core' ),
							'value'       => array(
								esc_html__( '1 Column', 'edgtf-core' )  => 'one-column',
								esc_html__( '2 Columns', 'edgtf-core' ) => 'two-columns',
								esc_html__( '3 Columns', 'edgtf-core' ) => 'three-columns',
								esc_html__( '4 Columns', 'edgtf-core' ) => 'four-columns',
								esc_html__( '5 Columns', 'edgtf-core' ) => 'five-columns',
								esc_html__( '6 Columns', 'edgtf-core' ) => 'six-columns'
							),
							'save_always' => true
						),
						array(
							'type'       => 'checkbox',
							'param_name' => 'items_float_left',
							'heading'    => esc_html__( 'Items Float Left', 'edgtf-core' ),
							'value'      => array( 'Make Items Float Left?' => 'yes' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'switch_to_one_column',
							'heading'     => esc_html__( 'Switch to One Column', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'edgtf-core' )      => '',
								esc_html__( 'Below 1280px', 'edgtf-core' ) => '1280',
								esc_html__( 'Below 1024px', 'edgtf-core' ) => '1024',
								esc_html__( 'Below 768px', 'edgtf-core' )  => '768',
								esc_html__( 'Below 600px', 'edgtf-core' )  => '600',
								esc_html__( 'Below 480px', 'edgtf-core' )  => '480',
								esc_html__( 'Never', 'edgtf-core' )        => 'never'
							),
							'description' => esc_html__( 'Choose on which stage item will be in one column', 'edgtf-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'alignment_one_column',
							'heading'     => esc_html__( 'Choose Alignment In Responsive Mode', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'edgtf-core' ) => '',
								esc_html__( 'Left', 'edgtf-core' )    => 'left',
								esc_html__( 'Center', 'edgtf-core' )  => 'center',
								esc_html__( 'Right', 'edgtf-core' )   => 'right'
							),
							'description' => esc_html__( 'Alignment When Items are in One Column', 'edgtf-core' ),
							'save_always' => true
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'number_of_columns' 	=> '',
			'switch_to_one_column'	=> '',
			'alignment_one_column' 	=> '',
			'items_float_left' 		=> '',
			'background_color' 		=> ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'edgtf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'edgtf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'edgtf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'edgtf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'edgtf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'edgtf-ehi-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . fluid_edge_get_class_attribute($elements_holder_class) . ' ' . fluid_edge_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
