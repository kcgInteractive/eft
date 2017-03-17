<?php
namespace EdgeCore\CPT\Shortcodes\Accordion;

use EdgeCore\Lib;

class Accordion implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'edgtf_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Edge Accordion', 'edgtf-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'edgtf_accordion_tab' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                    => 'icon-wpb-accordion extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'el_class',
							'heading'    => esc_html__( 'Custom CSS Class', 'edgtf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'edgtf-core' ),
							'value'      => array(
								esc_html__( 'Accordion', 'edgtf-core' ) => 'accordion',
								esc_html__( 'Toggle', 'edgtf-core' )    => 'toggle'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'layout',
							'heading'    => esc_html__( 'Layout', 'edgtf-core' ),
							'value'      => array(
								esc_html__( 'Boxed', 'edgtf-core' )  => 'boxed',
								esc_html__( 'Standard', 'edgtf-core' ) => 'standard',
								esc_html__( 'Simple', 'edgtf-core' ) => 'simple'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'icon_position',
							'heading'    => esc_html__( 'Icon Position', 'edgtf-core' ),
							'value'      => array(
								esc_html__( 'Left From Title', 'edgtf-core' )    => 'left',
								esc_html__( 'Right From Title', 'edgtf-core' )   => 'right'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'background_skin',
							'heading'    => esc_html__( 'Background Skin', 'edgtf-core' ),
							'value'      => array(
								esc_html__( 'Default', 'edgtf-core' ) => '',
								esc_html__( 'White', 'edgtf-core' )   => 'white'
							),
							'dependency' => array( 'element' => 'layout', 'value' => array( 'boxed' ) )
						)
					)
				)
			);
		}
	}
	
	public function render($atts, $content = null) {
		$default_atts = array(
			'el_class'        => '',
			'title'           => '',
			'style'           => 'accordion',
			'layout'          => 'boxed',
			'icon_position'   => '',
			'background_skin' => ''
		);
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['acc_class'] = $this->getAccordionClasses($params);
		$params['content'] = $content;

		$output = '';

		$output .= edgtf_core_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		$holder_classes = array('edgtf-ac-default');

		switch($params['style']) {
            case 'toggle':
                $holder_classes[] = 'edgtf-toggle';
                break;
            default:
	            $holder_classes[] = 'edgtf-accordion';
                break;
        }
		
		if (!empty($params['layout'])) {
			$holder_classes[] = 'edgtf-ac-'.esc_attr($params['layout']);
		}
		
		if (!empty($params['background_skin'])) {
			$holder_classes[] = 'edgtf-'.esc_attr($params['background_skin']).'-skin';
		}

		if (!empty($params['el_class'])) {
			$holder_classes[] = esc_attr($params['el_class']);
		}

		if (!empty($params['icon_position'])) {
			$holder_classes[] = 'edgtf-icon-position-'.esc_attr($params['icon_position']);
		}

        return implode(' ', $holder_classes);
	}
}
