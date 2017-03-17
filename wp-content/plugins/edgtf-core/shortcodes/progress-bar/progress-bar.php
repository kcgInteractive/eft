<?php
namespace EdgeCore\CPT\Shortcodes\ProgressBar;

use EdgeCore\Lib;

class ProgressBar implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Edge Progress Bar', 'edgtf-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-progress-bar extended-custom-icon',
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'percent',
							'heading'    => esc_html__( 'Percentage', 'edgtf-core' )
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
							'value'       => array_flip( fluid_edge_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'edgtf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__( 'Progress Bar Gradient Color', 'edgtf-core'),
							'param_name' => 'gradient',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => '',
							'save_always' => true,
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_active',
							'heading'    => esc_html__( 'Active Color', 'edgtf-core' ),
							'dependency' => array('element' => 'gradient', 'value' => 'no')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_inactive',
							'heading'    => esc_html__( 'Inactive Color', 'edgtf-core' ),
							'dependency' => array('element' => 'gradient', 'value' => 'no')
						),
						array(
							'type'       => 'colorpicker',
							'class'      => '',
							'heading'    => 'Active Gradient First Color',
							'param_name' => 'gradient_first_color',
							'value'      => '',
							'dependency' => array('element' => 'gradient', 'value' => 'yes')
						),
						array(
							'type'       => 'colorpicker',
							'class'      => '',
							'heading'    => 'Active Gradient Second Color',
							'param_name' => 'gradient_second_color',
							'value'      => '',
							'dependency' => array('element' => 'gradient', 'value' => 'yes')
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'percent'               => '100',
			'title'                 => '',
			'title_tag'             => 'h6',
			'title_color'           => '',
			'gradient'              => '',
			'color_active'          => '',
			'color_inactive'        => '',
			'gradient_first_color'  => '',
			'gradient_second_color' => ''
        );
		
		$params = shortcode_atts($args, $atts);

		$params['holder_classes']     = $this->getHolderClasss($params);
		
		$params['title_tag']          = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']       = $this->getTitleStyles($params);

		$params['percent_data']       = $this->getPercentData($params);
		
		$params['active_bar_style']   = $this->getActiveColor($params);
		$params['inactive_bar_style'] = $this->getInactiveColor($params);
		
        //init variables
		$html = edgtf_core_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
	}

	/**
	 * Return holder class
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getHolderClasss($params) {
		$classes = array();

		$is_gradient = $this->isGradient($params);

		if($is_gradient) {
			$classes[] = 'edgtf-has-gradient';
		}

		return implode(' ', $classes);
	}
	
	/**
	 * Return styles for title
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getTitleStyles($params) {
		$styles = array();
		
		if(!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		return $styles;
	}

	/**
	 * Return data attributes for percent
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getPercentData($params) {
		$data = array();

		$is_gradient = $this->isGradient($params);

		if($is_gradient && !empty($params['percent'])) {
			$data['data-position'] = $params['percent'];
		}

		return $data;
	}

    /**
     * Return active color for active bar
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveColor($params) {
        $styles = array();

	    $is_gradient = $this->isGradient($params);

        if($params['gradient'] == 'no' && !empty($params['color_active'])) {
            $styles[] = 'background-color: '.$params['color_active'];
        }

	    if ($is_gradient) {
		    $styles[] = fluid_edge_inline_background_gradient($params['gradient_first_color'], $params['gradient_second_color']);
	    }

        return $styles;
    }

    /**
     * Return active color for inactive bar
     *
     * @param $params
     *
     * @return array
     */
    private function getInactiveColor($params) {
        $styles = array();

        if($params['gradient'] == 'no' && !empty($params['color_inactive'])) {
            $styles[] = 'background-color: '.$params['color_inactive'];
        }

	    if ($params['gradient'] == 'yes' && $params['gradient_first_color'] != '' && $params['gradient_second_color'] != '') {
	        $styles[] = 'background-color: transparent';
        }

        return $styles;
    }

	/**
	 * Return active color for active bar
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function isGradient($params) {

		if($params['gradient'] == 'yes' && $params['gradient_first_color'] != '' && $params['gradient_second_color'] != '') {
			return true;
		}

		return false;
	}
}