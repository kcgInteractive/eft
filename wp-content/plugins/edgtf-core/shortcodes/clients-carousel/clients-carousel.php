<?php
namespace EdgeCore\CPT\Shortcodes\ClientsCarousel;

use EdgeCore\Lib;

class ClientsCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'edgtf_clients_carousel';

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
					'name'            => esc_html__( 'Edge Clients Carousel', 'edgtf-core' ),
					'base'            => $this->getBase(),
					'category'        => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'            => 'icon-wpb-clients-carousel extended-custom-icon',
					'as_parent'       => array( 'only' => 'edgtf_clients_carousel_item' ),
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'One', 'edgtf-core' )   => '1',
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
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slider Speed', 'edgtf-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slider Slide Animation', 'edgtf-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_disable_responsive',
							'heading'     => esc_html__( 'Disable Slider Responsive', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'items_hover_animation',
							'heading'     => esc_html__( 'Items Hover Animation', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Switch Images', 'edgtf-core' ) => 'switch-images',
								esc_html__( 'Roll Over', 'edgtf-core' )     => 'roll-over'
							),
							'save_always' => true
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
			'number_of_visible_items'   => '4',
			'slider_loop'		        => 'yes',
			'slider_autoplay'		    => 'yes',
			'slider_speed'		        => '5000',
			'slider_speed_animation'    => '600',
			'slider_navigation'	        => 'no',
			'slider_pagination'	        => 'no',
			'items_hover_animation'     => 'switch-images',
			'slider_disable_responsive' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['carousel_data']  = $this->getSliderData($params);
		$params['content'] = $content;
		
		$html = edgtf_core_get_shortcode_module_template_part('templates/clients-carousel', 'clients-carousel', '', $params);
		
		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holderClasses = '';
		
		$holderClasses .= !empty($params['items_hover_animation']) ? ' edgtf-cc-hover-'.$params['items_hover_animation'] : ' edgtf-cc-hover-switch-images';
		
		return $holderClasses;
	}
	
	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = !empty($params['number_of_visible_items']) ? $params['number_of_visible_items'] : '4';
		$slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
		$slider_data['data-disable-responsive']     = !empty($params['slider_disable_responsive']) ? $params['slider_disable_responsive'] : '';
		
		return $slider_data;
	}
}