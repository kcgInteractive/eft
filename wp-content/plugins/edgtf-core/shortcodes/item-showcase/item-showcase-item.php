<?php
namespace EdgeCore\CPT\Shortcodes\ItemShowcaseItem;

use EdgeCore\Lib;

class ItemShowcaseItem implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'edgtf_item_showcase_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Edge Item Showcase List Item', 'edgtf-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'edgtf_item_showcase' ),
					'as_parent'               => array( 'except' => 'vc_row' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                    => 'icon-wpb-item-showcase-item extended-custom-icon',
					'show_settings_on_create' => true,
					'params'                  =>  array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_position',
								'heading'     => esc_html__( 'Item Position', 'edgtf-core' ),
								'value'       => array(
									esc_html__( 'Left', 'edgtf-core' )  => 'left',
									esc_html__( 'Right', 'edgtf-core' ) => 'right'
								),
								'save_always' => true,
								'admin_label' => true
							),
						),
						fluid_edge_icon_collections()->getVCParamsArray(),
						array(
							array(
								'type'       => 'attach_image',
								'param_name' => 'custom_icon',
								'heading'    => esc_html__( 'Custom Icon', 'edgtf-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'icon_size',
								'heading'    => esc_html__( 'Icon Size', 'edgtf-core' ),
								'value'      => array(
									esc_html__( 'Medium', 'edgtf-core' )     => 'edgtf-icon-medium',
									esc_html__( 'Tiny', 'edgtf-core' )       => 'edgtf-icon-tiny',
									esc_html__( 'Small', 'edgtf-core' )      => 'edgtf-icon-small',
									esc_html__( 'Large', 'edgtf-core' )      => 'edgtf-icon-large',
									esc_html__( 'Very Large', 'edgtf-core' ) => 'edgtf-icon-huge'
								),
								'group'      => esc_html__( 'Icon Settings', 'edgtf-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'custom_icon_size',
								'heading'    => esc_html__( 'Custom Icon Size (px)', 'edgtf-core' ),
								'group'      => esc_html__( 'Icon Settings', 'edgtf-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_color',
								'heading'    => esc_html__( 'Icon Color', 'edgtf-core' ),
								'group'      => esc_html__( 'Icon Settings', 'edgtf-core' )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'item_title',
								'heading'     => esc_html__( 'Item Title', 'edgtf-core' ),
								'admin_label' => true
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'item_link',
								'heading'    => esc_html__( 'Item Link', 'edgtf-core' ),
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_target',
								'heading'     => esc_html__( 'Item Target', 'edgtf-core' ),
								'value'       => array_flip( fluid_edge_get_link_target_array() ),
								'dependency'  => array( 'element' => 'item_link', 'not_empty' => true ),
								'save_always' => true
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'item_title_tag',
								'heading'     => esc_html__( 'Item Title Tag', 'edgtf-core' ),
								'value'       => array_flip( fluid_edge_get_title_tag( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'item_title_color',
								'heading'    => esc_html__( 'Item Title Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type'       => 'textarea',
								'param_name' => 'item_text',
								'heading'    => esc_html__( 'Item Text', 'edgtf-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'item_text_color',
								'heading'    => esc_html__( 'Item Text Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'item_text', 'not_empty' => true )
							)
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_position'    => 'left',
			'custom_icon'      => '',
			'icon_size'        => 'edgtf-icon-medium',
			'custom_icon_size' => '',
			'icon_color'       => '',
			'item_title'       => '',
			'item_link'        => '',
			'item_target'      => '_self',
			'item_title_tag'   => 'h4',
			'item_title_color' => '',
			'item_text'        => '',
			'item_text_color'  => ''
		);

		$default_atts = array_merge($args, fluid_edge_icon_collections()->getShortcodeParams());
		
		$params = shortcode_atts($default_atts, $atts);

		$params['showcase_item_class'] = $this->getShowcaseItemClasses($params);
		$params['item_target']         = !empty($item_target) ? $params['item_target'] : $args['item_target'];
		$params['icon_parameters']     = $this->getIconParameters($params);
		$params['item_title_tag']      = !empty($params['item_title_tag']) ? $params['item_title_tag'] : $args['item_title_tag'];
		$params['item_title_styles']   = $this->getTitleStyles($params);
		$params['item_text_styles']    = $this->getTextStyles($params);
		
		$html = edgtf_core_get_shortcode_module_template_part('templates/item-showcase-item', 'item-showcase', '', $params);

		return $html;
	}
	
	/**
	 * Return Showcase Item Classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getShowcaseItemClasses($params) {
		$itemClass = array();

		if (!empty($params['item_position'])) {
			$itemClass[] = 'edgtf-is-'. $params['item_position'];
		}

		return implode(' ', $itemClass);
	}

	/**
	 * Returns parameters for icon shortcode as a string
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconParameters($params) {
		$params_array = array();

		if(empty($params['custom_icon'])) {
			$iconPackName = fluid_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

			$params_array['icon_pack']   = $params['icon_pack'];
			$params_array[$iconPackName] = $params[$iconPackName];

			if(!empty($params['icon_size'])) {
				$params_array['size'] = $params['icon_size'];
			}

			if(!empty($params['custom_icon_size'])) {
				$params_array['custom_size'] = fluid_edge_filter_px($params['custom_icon_size']).'px';
			}

			$params_array['icon_color'] = $params['icon_color'];
		}

		return $params_array;
	}
	
	private function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['item_title_color'])) {
			$styles[] = 'color: '.$params['item_title_color'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTextStyles($params) {
		$styles = array();
		
		if (!empty($params['item_text_color'])) {
			$styles[] = 'color: '.$params['item_text_color'];
		}
		
		return implode(';', $styles);
	}
}
