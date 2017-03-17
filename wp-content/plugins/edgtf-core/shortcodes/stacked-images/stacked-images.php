<?php
namespace EdgeCore\CPT\Shortcodes\StackedImages;

use EdgeCore\Lib;

class StackedImages implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'edgtf_stacked_images';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Edge Stacked Images', 'edgtf-core'),
			'base' => $this->base,
			'category' => esc_html__('by EDGE', 'edgtf-core'),
			'icon' => 'icon-wpb-stacked-images extended-custom-icon',
			'params' =>	array(
				array(
					'type'       => 'attach_image',
					'param_name' => 'item_image',
					'heading'    => esc_html__('Image', 'edgtf-core')
				),
				array(
					'type'       => 'attach_image',
					'param_name' => 'item_stack_image',
					'heading'    => esc_html__('Stack Image', 'edgtf-core')
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_image'       => '',
			'item_stack_image' => ''
		);

		$params = shortcode_atts($args, $atts);

		$html = edgtf_core_get_shortcode_module_template_part('templates/stacked-images', 'stacked-images', '', $params);

		return $html;
	}
}
