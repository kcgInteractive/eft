<?php
namespace EdgeCore\CPT\Shortcodes\InnerRowHolder;

use EdgeCore\Lib;

class InnerRowHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_inner_row_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Edge Inner Row Holder', 'edgtf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-inner-row-holder extended-custom-icon',
					'category'  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'as_parent' => array( 'only' => 'edgtf_inner_row_column' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_columns',
							'heading'     => esc_html__( 'Space Between Columns', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Large', 'edgtf-core' )   => 'large',
								esc_html__( 'Medium', 'edgtf-core' )   => 'medium',
								esc_html__( 'Normal', 'edgtf-core' )   => 'normal',
								esc_html__( 'Small', 'edgtf-core' )    => 'small',
								esc_html__( 'Tiny', 'edgtf-core' )     => 'tiny',
								esc_html__( 'No Space', 'edgtf-core' ) => 'no'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_alignment',
							'heading'     => esc_html__( 'Horizontal Alignment', 'edgtf-core' ),
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
			'space_between_columns'	=> 'normal',
			'text_alignment' 	    => ''
		);
		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params, $args);
		
		$html = '';
		
		$html .= '<div class="edgtf-inner-row-holder edgtf-grid-row '.esc_attr($params['holder_classes']).'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		
		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params, $args) {
		$holderClasses = '';
		
		$holderClasses .= !empty($params['space_between_columns']) ? ' edgtf-grid-' . $params['space_between_columns'] . '-gutter' : ' edgtf-grid-' . $args['space_between_items'] . '-gutter';
		$holderClasses .= !empty($params['text_alignment']) ? ' edgtf-ir-alignment-' . $params['text_alignment'] : '';
		
		return $holderClasses;
	}
}
