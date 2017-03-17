<?php
namespace EdgeCore\CPT\Shortcodes\PricingTable;

use EdgeCore\Lib;

class PricingTableItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_pricing_table_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map( array(
				'name' => esc_html__('Edge Pricing Table Item', 'edgtf-core'),
				'base' => $this->base,
				'icon' => 'icon-wpb-pricing-table-item extended-custom-icon',
				'category' => esc_html__('by EDGE', 'edgtf-core'),
				'allowed_container_element' => 'vc_row',
				'as_child' => array('only'  => 'edgtf_pricing_table'),
				'params' => array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'type',
						'heading'    => esc_html__('Type', 'edgtf-core'),
						'value' => array(
							esc_html__('Standard', 'edgtf-core') => 'standard',
							esc_html__('Simple', 'edgtf-core')   => 'simple'
						),
						'save_always' => true
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'title',
						'heading'     => esc_html__('Title', 'edgtf-core'),
						'value'       => esc_html__('Basic Plan', 'edgtf-core'),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'price',
						'heading'    => esc_html__('Price', 'edgtf-core')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'currency',
						'heading'     => esc_html__('Currency', 'edgtf-core'),
						'description' => esc_html__('Default mark is $', 'edgtf-core')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'price_period',
						'heading'     => esc_html__('Price Period', 'edgtf-core'),
						'description' => esc_html__('Default label is monthly', 'edgtf-core')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'button_text',
						'heading'     => esc_html__('Button Text', 'edgtf-core'),
						'value'       => esc_html__('BUY NOW', 'edgtf-core'),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'link',
						'heading'    => esc_html__('Button Link', 'edgtf-core'),
						'dependency' => array('element' => 'button_text',  'not_empty' => true)
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'button_style',
						'heading'    => esc_html__('Button Style', 'edgtf-core'),
						'value'      => array(
							esc_html__('Default', 'edgtf-core') => '',
							esc_html__('Dark', 'edgtf-core') => 'dark'
						),
						'dependency' => array('element' => 'button_text',  'not_empty' => true)
					),
					array(
						'type'       => 'textarea_html',
						'param_name' => 'content',
						'heading'    => esc_html__('Content', 'edgtf-core'),
						'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
					)
				)
			));
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'type'         => 'standard',
			'title'        => '',
			'price'        => '100',
			'currency'     => '$',
			'price_period' => 'monthly',
			'button_text'  => '',
			'link'         => '',
			'button_style' => ''
		);
		
		$params = shortcode_atts($args, $atts);

		$params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content); // delete p tag before and after content

		$params['type'] = !empty($params['type']) ? $params['type'] : $args['type'];
		$params['holder_classes'] = $this->getHolderClasses($params);

		$html = edgtf_core_get_shortcode_module_template_part('templates/pricing-table-'.$params['type'], 'pricing-table', '', $params);
		
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
		$holderClasses = array();

		if(!empty($params['type'])){
			$holderClasses[] = 'edgtf-pt-'.$params['type'];
		}

		if(!empty($params['button_style'])){
			$holderClasses[] = 'edgtf-pt-button-'.$params['button_style'];
		}

		return implode(' ', $holderClasses);
	}
}