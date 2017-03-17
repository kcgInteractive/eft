<?php
namespace EdgeCore\CPT\Shortcodes\ScrollingSections;

use EdgeCore\Lib;

class ScrollingSectionsItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_scrolling_sections_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Edge Scrolling Sections Item', 'edgtf-core' ),
					'base'            => $this->base,
					'as_child'        => array( 'only' => 'edgtf_scrolling_sections' ),
					'as_parent'       => array( 'except' => 'vc_row, vc_accordion' ),
					'category'        => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'            => 'icon-wpb-scrolling-sections-item extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'edgtf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__( 'Background Image', 'edgtf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'watermark_image',
							'heading'    => esc_html__( 'Watermark Background Image', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding',
							'heading'     => esc_html__( 'Padding', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. You can use px or % mark', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1280_1600',
							'heading'     => esc_html__( 'Padding on screen size between 1280px-1600px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1024_1280',
							'heading'     => esc_html__( 'Padding on screen size between 1024px-1280px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_768_1024',
							'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_600_768',
							'heading'     => esc_html__( 'Padding on screen size between 600px-768px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_480_600',
							'heading'     => esc_html__( 'Padding on screen size between 480px-600px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_480',
							'heading'     => esc_html__( 'Padding on Screen Size Bellow 480px', 'edgtf-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'edgtf-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'edgtf-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'background_color'       => '',
			'background_image'       => '',
			'watermark_image'        => '',
			'item_padding'           => '',
			'item_padding_1280_1600' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024'  => '',
			'item_padding_600_768'   => '',
			'item_padding_480_600'   => '',
			'item_padding_480'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		extract( $params );
		
		$params['content'] = $content;
		$rand_class        = 'edgtf-eh-custom-' . mt_rand( 100000, 1000000 );
		
		$params['watermark_style']      = $this->getItemWatermarkStyles( $params );
		$params['content_style']        = $this->getItemContentStyles( $params );
		$params['content_class']        = $rand_class;
		$params['item_responsive_data'] = $this->getItemResponsiveData( $params );
		
		$html = edgtf_core_get_shortcode_module_template_part( 'templates/scrolling-sections-item', 'scrolling-sections', '', $params );
		
		return $html;
	}

	/**
	 * Return Scrolling Sections Item watermark style
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getItemWatermarkStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['watermark_image'] ) ) {
			$watermark_image = wp_get_attachment_image_src($params['watermark_image'], 'full');
			$styles[] = 'background-image: url(' . esc_url($watermark_image[0]) .')';
		}
		
		return implode( ';', $styles );
	}
	
	/**
	 * Return Scrolling Sections Item content style
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getItemContentStyles( $params ) {
		$styles = array();
		
		if ( $params['item_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	/**
	 * Return Scrolling Sections Item content responsive data
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getItemResponsiveData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['content_class'];
		
		if ( ! empty( $params['background_color'] ) ) {
			$data['data-background-color'] = $params['background_color'];
		}
		
		if ( ! empty( $params['background_image'] ) ) {
			$background_image = wp_get_attachment_image_src($params['background_image'], 'full');
			$data['data-background-image'] = esc_url($background_image[0]);
		}
		
		if ( $params['item_padding_1280_1600'] !== '' ) {
			$data['data-1280-1600'] = $params['item_padding_1280_1600'];
		}
		
		if ( $params['item_padding_1024_1280'] !== '' ) {
			$data['data-1024-1280'] = $params['item_padding_1024_1280'];
		}
		
		if ( $params['item_padding_768_1024'] !== '' ) {
			$data['data-768-1024'] = $params['item_padding_768_1024'];
		}
		
		if ( $params['item_padding_600_768'] !== '' ) {
			$data['data-600-768'] = $params['item_padding_600_768'];
		}
		
		if ( $params['item_padding_480_600'] !== '' ) {
			$data['data-480-600'] = $params['item_padding_480_600'];
		}
		
		if ( $params['item_padding_480'] !== '' ) {
			$data['data-480'] = $params['item_padding_480'];
		}
		
		return $data;
	}
}
