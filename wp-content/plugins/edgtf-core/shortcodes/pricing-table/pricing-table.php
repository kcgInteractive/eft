<?php
namespace EdgeCore\CPT\Shortcodes\PricingTable;

use EdgeCore\Lib;

class PricingTable implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Edge Pricing Table', 'edgtf-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'edgtf_pricing_table_item' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                    => 'icon-wpb-pricing-table extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'columns',
							'heading'     => esc_html__( 'Number of Columns', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'One', 'edgtf-core' )   => 'edgtf-one-column',
								esc_html__( 'Two', 'edgtf-core' )   => 'edgtf-two-columns',
								esc_html__( 'Three', 'edgtf-core' ) => 'edgtf-three-columns',
								esc_html__( 'Four', 'edgtf-core' )  => 'edgtf-four-columns',
								esc_html__( 'Five', 'edgtf-core' )  => 'edgtf-five-columns',
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_columns',
							'heading'     => esc_html__( 'Space Between Columns', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Normal', 'edgtf-core' )   => 'normal',
								esc_html__( 'Small', 'edgtf-core' )    => 'small',
								esc_html__( 'Tiny', 'edgtf-core' )     => 'tiny',
								esc_html__( 'No Space', 'edgtf-core' ) => 'no'
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
			'columns'         	    => 'edgtf-two-columns',
			'space_between_columns' => 'normal'
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$holder_class = '';
		
		if (!empty($columns)) {
			$holder_class .= ' '.$columns;
		}

		if (!empty($space_between_columns)) {
			$holder_class .= ' edgtf-pt-'.$space_between_columns.'-space';
		}
		
		$html = '<div class="edgtf-pricing-tables clearfix '.esc_attr($holder_class).'">';
			$html .= '<div class="edgtf-pt-wrapper">';
				$html .= do_shortcode($content);
			$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}