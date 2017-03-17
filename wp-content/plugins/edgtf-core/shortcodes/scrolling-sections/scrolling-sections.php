<?php
namespace EdgeCore\CPT\Shortcodes\ScrollingSections;

use EdgeCore\Lib;

class ScrollingSections implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_scrolling_sections';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Edge Scrolling Sections', 'edgtf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-scrolling-sections extended-custom-icon',
					'category'  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'as_parent' => array( 'only' => 'edgtf_scrolling_sections_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array()
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array();
		$params = shortcode_atts($args, $atts);

		$html = '';

		$html .= '<div class="edgtf-scrolling-sections-holder">';
			$html .= do_shortcode($content);
			$html .= '<div class="edgtf-ss-background"></div>';
		$html .= '</div>';

		return $html;
	}
}