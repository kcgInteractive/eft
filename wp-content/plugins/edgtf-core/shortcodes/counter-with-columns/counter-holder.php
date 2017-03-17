<?php
namespace EdgeCore\CPT\Shortcodes\CounterHolder;

use EdgeCore\Lib;

class CounterHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_counter_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Edge Counter With Columns', 'edgtf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-counter-wc-holder extended-custom-icon',
					'category'  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'as_parent' => array( 'only' => 'edgtf_counter' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Two', 'edgtf-core' )   => '2',
								esc_html__( 'Three', 'edgtf-core' ) => '3',
								esc_html__( 'Four', 'edgtf-core' )  => '4',
								esc_html__( 'Five', 'edgtf-core' )  => '5',
								esc_html__( 'Six', 'edgtf-core' )   => '6'
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
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_alignment',
							'heading'     => esc_html__( 'Item Horizontal Alignment', 'edgtf-core' ),
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
			'number_of_columns' 	=> '3',
			'space_between_columns'	=> 'normal',
			'text_alignment' 	    => ''
		);
		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params, $args);
		
		$html = '';

		$html .= '<div class="edgtf-counter-wc-holder '.esc_attr($params['holder_classes']).'"><div class="edgtf-ch-inner">';
			$html .= do_shortcode($content);
		$html .= '</div></div>';

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
		
		$holderClasses .= !empty($params['number_of_columns']) ? ' edgtf-ch-columns-' . $params['number_of_columns'] : ' edgtf-ch-columns-' . $args['number_of_columns'];
		$holderClasses .= !empty($params['space_between_columns']) ? ' edgtf-ch-' . $params['space_between_columns'] . '-space' : ' edgtf-ch-' . $args['space_between_items'] . '-space';
		$holderClasses .= !empty($params['text_alignment']) ? ' edgtf-ch-alignment-' . $params['text_alignment'] : '';
		
		return $holderClasses;
	}
}
