<?php
namespace EdgeCore\CPT\Shortcodes\ItemShowcase;

use EdgeCore\Lib;

class ItemShowcase implements Lib\ShortcodeInterface {
	private $base; 
	
	function __construct() {
		$this->base = 'edgtf_item_showcase';

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
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Edge Item Showcase', 'edgtf-core' ),
					'base'      => $this->base,
					'category'  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'      => 'icon-wpb-item-showcase extended-custom-icon',
					'as_parent' => array( 'only' => 'edgtf_item_showcase_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'       => 'attach_image',
							'param_name' => 'item_image',
							'heading'    => esc_html__( 'Image', 'edgtf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'item_stack_image',
							'heading'    => esc_html__('Stack Image', 'edgtf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_top_offset',
							'heading'     => esc_html__( 'Image Top Offset', 'edgtf-core' ),
							'value'       => '-50px',
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'holder_bottom_margin',
							'heading'     => esc_html__( 'Holder Bottom Margin', 'edgtf-core' ),
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
            'item_image'           => '',
            'item_stack_image'     => '',
            'image_top_offset'     => '',
			'holder_bottom_margin' => ''
        );

		$params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';

		$item_image_classes = '';
		if(!empty($item_image) && !empty($item_stack_image)) {
			$item_image_classes = 'edgtf-is-has-both-image';
		}
		
        $item_image_style = '';
		if(!empty($image_top_offset)) {
			$item_image_style = 'margin-top: '.fluid_edge_filter_px($image_top_offset).'px';
		}

		$holder_style = '';
		if(!empty($holder_bottom_margin)) {
			$holder_style = 'margin: 0 0 '.fluid_edge_filter_px($holder_bottom_margin).'px';
		}

        $html .= '<div class="edgtf-item-showcase-holder clearfix" '.fluid_edge_get_inline_style($holder_style).'>';
			$html .= do_shortcode($content);
			$html .= '<div class="edgtf-is-image '.esc_attr($item_image_classes).'" '.fluid_edge_get_inline_style($item_image_style).'>';
                if (!empty($item_image)) {
                    $html .= wp_get_attachment_image($item_image, 'full', false, array('class' => 'edgtf-is-first-image'));
                }
				if (!empty($item_stack_image)) {
					$html .= wp_get_attachment_image($item_stack_image, 'full', false, array('class' => 'edgtf-is-stack-image'));
				}
            $html .= '</div>';
        $html .= '</div>';

        return $html;
	}
}