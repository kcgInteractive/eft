<?php
namespace EdgeCore\CPT\Shortcodes\Tabs;

use EdgeCore\Lib;

class TabsItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_tabs_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Edge Tabs Item', 'edgtf-core' ),
					'base'            => $this->getBase(),
					'as_parent'       => array( 'except' => 'vc_row' ),
					'as_child'        => array( 'only' => 'edgtf_tabs' ),
					'category'        => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'            => 'icon-wpb-tabs-item extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'attach_image',
							'heading'     => 'Title Image',
							'param_name'  => 'title_image',
							'description' => esc_html__( 'This option works only for Simple Tabs layout. Select tab title image from media library', 'edgtf-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'tab_title',
							'heading'    => esc_html__( 'Title', 'edgtf-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'tab_title_description',
							'heading'    => esc_html__( 'Title Description', 'edgtf-core' ),
							'dependency' => array( 'element' => 'tab_title', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'title_image'           => '',
			'tab_title'             => 'Tab',
			'tab_title_description' => '',
			'tab_id'                => ''
		);
		
		$params = shortcode_atts( $default_atts, $atts );
		extract( $params );
		
		$rand_number     = rand( 0, 1000 );
		$params['tab_title'] = $params['tab_title'] . '-' . $rand_number;
		
		$params['content'] = $content;
		
		$output = '';
		
		$output .= edgtf_core_get_shortcode_module_template_part( 'templates/tab-content', 'tabs', '', $params );
		
		return $output;
	}
}