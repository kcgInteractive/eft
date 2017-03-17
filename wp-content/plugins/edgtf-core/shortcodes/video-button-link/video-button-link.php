<?php
namespace EdgeCore\CPT\Shortcodes\VideoButtonLink;

use EdgeCore\Lib;

class VideoButtonLink implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'edgtf_video_button_link';

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
				    'name'                      => esc_html__( 'Edge Video Button Link', 'edgtf-core' ),
				    'base'                      => $this->getBase(),
				    'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
				    'icon'                      => 'icon-wpb-video-button-link extended-custom-icon',
				    'allowed_container_element' => 'vc_row',
				    'params'                    => array(
					    array(
						    'type'       => 'textfield',
						    'param_name' => 'button_text',
						    'heading'    => esc_html__( 'Button Text', 'edgtf-core' )
					    ),
					    array(
						    'type'       => 'textfield',
						    'param_name' => 'video_link',
						    'heading'    => esc_html__( 'Video Link', 'edgtf-core' )
					    ),
					    array(
						    'type'       => 'colorpicker',
						    'param_name' => 'color',
						    'heading'    => esc_html__( 'Play Button Link Text And Icon Color', 'edgtf-core' )
					    ),
					    array(
						    'type'       => 'textfield',
						    'param_name' => 'size',
						    'heading'    => esc_html__( 'Play Button Link Text And Icon Size (px)', 'edgtf-core' )
					    ),
					    array(
						    'type'       => 'colorpicker',
						    'param_name' => 'text_color',
						    'heading'    => esc_html__( 'Play Button Link Text Color', 'edgtf-core' ),
						    'group'      => esc_html__('Text', 'edgtf-core')
					    ),
					    array(
						    'type'       => 'textfield',
						    'param_name' => 'text_size',
						    'heading'    => esc_html__( 'Play Button Link Text Size (px)', 'edgtf-core' ),
						    'group'      => esc_html__('Text', 'edgtf-core')
					    ),
					    array(
						    'type'       => 'colorpicker',
						    'param_name' => 'icon_color',
						    'heading'    => esc_html__( 'Play Button Link Icon Color', 'edgtf-core' ),
						    'group'      => esc_html__('Icon', 'edgtf-core')
					    ),
					    array(
						    'type'       => 'textfield',
						    'param_name' => 'icon_size',
						    'heading'    => esc_html__( 'Play Button Link Icon Size (px)', 'edgtf-core' ),
						    'group'      => esc_html__('Icon', 'edgtf-core')
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
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'button_text'        => '',
			'video_link'         => '#',
			'color'              => '',
			'size'               => '',
			'text_color'         => '',
			'text_size'          => '',
			'icon_color'         => '',
			'icon_size'          => ''
		);
		
		$params = shortcode_atts($args, $atts);
		
		$params['play_button_styles']      = $this->getPlayButtonLinkStyles($params);
		$params['play_button_text_styles'] = $this->getPlayButtonLinkTextStyles($params);
		$params['play_button_icon_styles'] = $this->getPlayButtonLinkIconStyles($params);
		
		//Get HTML from template
		$html = edgtf_core_get_shortcode_module_template_part('templates/video-button-link', 'video-button-link', '', $params);
		
		return $html;
	}
	
	private function getPlayButtonLinkStyles($params) {
		$styles = array();
		
		if (!empty($params['color'])) {
			$styles[] = 'color: '.$params['color'];
		}
		
		if (!empty($params['size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['size']) .'px';
		}
		
		return implode(';', $styles);
	}

	private function getPlayButtonLinkTextStyles($params) {
		$styles = array();

		if (!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}

		if (!empty($params['text_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['text_size']) .'px';
		}

		return implode(';', $styles);
	}

	private function getPlayButtonLinkIconStyles($params) {
		$styles = array();

		if (!empty($params['icon_color'])) {
			$styles[] = 'color: '.$params['icon_color'];
		}

		if (!empty($params['icon_size'])) {
			$styles[] = 'font-size: '.fluid_edge_filter_px($params['icon_size']) .'px';
		}

		return implode(';', $styles);
	}
}