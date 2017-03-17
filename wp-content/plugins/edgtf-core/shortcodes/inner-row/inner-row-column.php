<?php
namespace EdgeCore\CPT\Shortcodes\InnerRowHolder;

use EdgeCore\Lib;

class InnerRowColumn implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'edgtf_inner_row_column';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Edge Inner Row Column', 'edgtf-core'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_inner_row_holder'),
					'as_parent' => array('except' => 'vc_row, vc_accordion'),
					'content_element' => true,
					'category' => esc_html__('by EDGE', 'edgtf-core'),
					'icon' => 'icon-wpb-inner-row-column extended-custom-icon',
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'column_size',
							'heading'    => esc_html__('Column Size', 'edgtf-core'),
							'value'      => array(
								esc_html__('One Even', 'edgtf-core')     => '12',
								esc_html__('One Half', 'edgtf-core')     => '6',
								esc_html__('One Third', 'edgtf-core')    => '4',
								esc_html__('Two Thirds', 'edgtf-core')   => '8',
								esc_html__('One Fourth', 'edgtf-core')   => '3',
								esc_html__('Three Fourth', 'edgtf-core') => '9',
								esc_html__('One Sixth', 'edgtf-core')    => '2',
								esc_html__('One Twenty', 'edgtf-core')   => '1'
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_alignment',
							'heading'     => esc_html__( 'Content Horizontal Alignment', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'edgtf-core' ) => '',
								esc_html__( 'Left', 'edgtf-core' )    => 'left',
								esc_html__( 'Center', 'edgtf-core' )  => 'center',
								esc_html__( 'Right', 'edgtf-core' )   => 'right'
							),
							'save_always' => true
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'column_size'    => '1',
			'text_alignment' => ''
		);
		$params = shortcode_atts($args, $atts);
		
		$params['column_classes'] = $this->getColumnClasses($params, $args);
		
		$params['content']= $content;
		
		$html = edgtf_core_get_shortcode_module_template_part('templates/inner-row-column', 'inner-row', '', $params);

		return $html;
	}
	
	/**
	 * Generates column classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getColumnClasses($params, $args) {
		$holderClasses = '';
		
		$holderClasses .= !empty($params['column_size']) ? ' edgtf-grid-col-' . $params['column_size'] : ' edgtf-grid-col-' . $args['column_size'];
		$holderClasses .= !empty($params['text_alignment']) ? ' edgtf-ir-col-alignment-' . $params['text_alignment'] : '';
		
		return $holderClasses;
	}
}
