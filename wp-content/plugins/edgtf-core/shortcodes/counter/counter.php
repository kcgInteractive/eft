<?php
namespace EdgeCore\CPT\Shortcodes\Counter;

use EdgeCore\Lib;

class Counter implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_counter';

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
					'name'                      => esc_html__( 'Edge Counter', 'edgtf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                      => 'icon-wpb-counter extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'type',
								'heading'     => esc_html__( 'Type', 'edgtf-core' ),
								'value'       => array(
									esc_html__( 'Zero Counter', 'edgtf-core' )   => 'edgtf-zero-counter',
									esc_html__( 'Random Counter', 'edgtf-core' ) => 'edgtf-random-counter'
								),
								'save_always' => true,
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
								'type'       => 'textfield',
								'param_name' => 'digit',
								'heading'    => esc_html__( 'Digit', 'edgtf-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'digit_font_size',
								'heading'    => esc_html__( 'Digit Font Size (px)', 'edgtf-core' ),
								'dependency' => array( 'element' => 'digit', 'not_empty' => true )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'digit_color',
								'heading'    => esc_html__( 'Digit Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'digit', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'digit_font_weight',
								'heading'     => esc_html__( 'Digit Font Weight', 'edgtf-core' ),
								'value'       => array_flip( fluid_edge_get_font_weight_array( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'digit', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'title',
								'heading'    => esc_html__( 'Title', 'edgtf-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'title_tag',
								'heading'     => esc_html__( 'Title Tag', 'edgtf-core' ),
								'value'       => array_flip( fluid_edge_get_title_tag( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'title', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'title_position',
								'heading'     => esc_html__( 'Title Position', 'edgtf-core' ),
								'value'       => array(
									esc_html__( 'Bellow Number', 'edgtf-core' )    => 'bellow',
									esc_html__( 'Left From Number', 'edgtf-core' ) => 'left'
								),
								'save_always' => true,
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'title_color',
								'heading'    => esc_html__( 'Title Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'title', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'title_font_weight',
								'heading'     => esc_html__( 'Title Font Weight', 'edgtf-core' ),
								'value'       => array_flip( fluid_edge_get_font_weight_array( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'title', 'not_empty' => true )
							),
							array(
								'type'       => 'textarea',
								'param_name' => 'text',
								'heading'    => esc_html__( 'Text', 'edgtf-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'text_color',
								'heading'    => esc_html__( 'Text Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'text', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'border',
								'heading'     => esc_html__( 'Include Right Border', 'edgtf-core' ),
								'value'       => array_flip(fluid_edge_get_yes_no_select_array(false)),
								'save_always' => true,
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'border_width',
								'heading'     => esc_html__( 'Border Width', 'edgtf-core' ),
								'description' => esc_html__('Insert border right width (e.g 1px)', 'edgtf-core'),
								'dependency'  => array( 'element' => 'border', 'value' => 'yes' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'border_color',
								'heading'    => esc_html__( 'Border Color', 'edgtf-core' ),
								'dependency' => array( 'element' => 'border', 'value' => 'yes' )
							),
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
			'type'              => 'edgtf-zero-counter',
			'custom_icon'       => '',
			'icon_size'         => 'edgtf-icon-medium',
			'custom_icon_size'  => '',
			'icon_color'        => '',
			'digit'             => '123',
			'digit_font_size'   => '',
			'digit_color'       => '',
			'digit_font_weight' => '',
			'title'             => '',
			'title_tag'         => 'h6',
			'title_position'    => '',
			'title_color'       => '',
			'title_font_weight' => '',
			'text'              => '',
			'text_color'        => '',
			'border'            => 'no',
			'border_width'      => '1px',
			'border_color'      => ''
		);

		$default_atts = array_merge($args, fluid_edge_icon_collections()->getShortcodeParams());

		$params = shortcode_atts($default_atts, $atts);

		$params['holder_class']    = $this->getCounterHolderClass($params);
		$params['title_tag']       = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['icon_parameters'] = $this->getIconParameters($params);

		$params['holder_styles']        = $this->getCounterHolderStyles($params);
		$params['counter_styles']       = $this->getCounterStyles($params);
		$params['counter_title_styles'] = $this->getCounterTitleStyles($params);
		$params['counter_text_styles']  = $this->getCounterTextStyles($params);

		//Get HTML from template
		$html = edgtf_core_get_shortcode_module_template_part('templates/counter', 'counter', '', $params);

		return $html;
	}

	/**
	 * Return Counter Holder class
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderClass($params) {
		$class = array('edgtf-counter-holder');

		$with_icon = $this->CounterHasIcon($params);

		if (!empty($params['title_position'])) {
			$class[] = 'edgtf-counter-title-'.$params['title_position'];
		}

		if (!empty($params['border']) && $params['border'] === 'yes') {
			$class[] = 'edgtf-counter-border';
		}

		if( $with_icon ) {
			$class[] = 'edgtf-counter-has-icon';
		}

		return implode(' ', $class);
	}

	/**
	 * Check if the icon is used
	 *
	 * @param $params
	 * @return boolean
	 */
	private function CounterHasIcon($params) {
		$icon_par = $this->getIconParameters($params);
		$iconPackName = fluid_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

		if( !empty($params['custom_icon']) || ( isset($icon_par['icon_pack']) && isset($icon_par[$iconPackName]) && $icon_par[$iconPackName] !== '' ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Return Counter Holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderStyles($params) {
		$styles = array();

		if (!empty($params['border']) && $params['border'] === 'yes') {
			$styles[] = 'border-style: solid';

			if (!empty($params['border_width'])) {
				$styles[] = 'border-right-width: '.$params['border_width'];
			}

			if (!empty($params['border_color'])) {
				$styles[] = 'border-color: '.$params['border_color'];
			}
		}

		return implode(';', $styles);
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
			
			if(!empty($iconPackName)) {
				$params_array['icon_pack']   = $params['icon_pack'];
				$params_array[$iconPackName] = $params[$iconPackName];
				
				if(!empty($params_array[$iconPackName])) {
					$params_array['has_icon'] = true;
				}
				
				if(!empty($params['icon_size'])) {
					$params_array['size'] = $params['icon_size'];
				}
				
				if(!empty($params['custom_icon_size'])) {
					$params_array['custom_size'] = fluid_edge_filter_px($params['custom_icon_size']).'px';
				}
				
				$params_array['icon_color'] = $params['icon_color'];
			}
		}

		return $params_array;
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterStyles($params) {
		$styles = array();

		if (!empty($params['digit_font_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['digit_font_size']).'px';
		}

        if (!empty($params['digit_color'])) {
	        $styles[] = 'color: '.$params['digit_color'];
        }

		if (!empty($params['digit_font_weight'])) {
			$styles[] = 'font-weight: '.$params['digit_font_weight'];
		}

		return implode(';', $styles);
	}

	/**
	 * Return Counter Title styles
	 *
	 * @param $params
	 * @return string
	 */
    private function getCounterTitleStyles($params) {
	    $styles = array();

        if (!empty($params['title_color'])) {
	        $styles[] = 'color: '.$params['title_color'];
        }
	
	    if (!empty($params['title_font_weight'])) {
		    $styles[] = 'font-weight: '.$params['title_font_weight'];
	    }

        return implode(';', $styles);
    }

	/**
	 * Return Counter Text styles
	 *
	 * @param $params
	 * @return string
	 */
    private function getCounterTextStyles($params) {
	    $styles = array();

        if (!empty($params['text_color'])) {
	        $styles[] = 'color: '.$params['text_color'];
        }

        return implode(';', $styles);
    }
}