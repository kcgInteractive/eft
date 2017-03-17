<?php
namespace EdgeCore\CPT\Shortcodes\ImageSlider;

use EdgeCore\Lib;

class ImageSlider implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'edgtf_image_slider';

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
					'name'                      => esc_html__( 'Edge Image Slider', 'edgtf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                      => 'icon-wpb-image-slider extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'attach_images',
							'param_name'  => 'images',
							'heading'     => esc_html__( 'Images', 'edgtf-core' ),
							'description' => esc_html__( 'Select images from media library', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'edgtf-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Images (px)', 'edgtf-core' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'pretty_photo',
							'heading'    => esc_html__( 'Open PrettyPhoto On Click', 'edgtf-core' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false ) )
						),
						array(
							'type'        => 'textarea',
							'param_name'  => 'custom_links',
							'heading'     => esc_html__( 'Custom Links', 'edgtf-core' ),
							'description' => esc_html__( 'Delimit links by comma', 'edgtf-core' ),
							'dependency'  => Array( 'element' => 'pretty_photo', 'value' => array( 'no' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'edgtf-core' ),
							'value'      => array_flip( fluid_edge_get_link_target_array() ),
							'dependency' => Array( 'element' => 'pretty_photo', 'value' => array( 'no' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'One', 'edgtf-core' )   => '1',
								esc_html__( 'Two', 'edgtf-core' )   => '2',
								esc_html__( 'Three', 'edgtf-core' ) => '3',
								esc_html__( 'Four', 'edgtf-core' )  => '4',
								esc_html__( 'Five', 'edgtf-core' )  => '5',
								esc_html__( 'Six', 'edgtf-core' )   => '6'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slider Speed', 'edgtf-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'edgtf-core' ),
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slider Slide Animation', 'edgtf-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'edgtf-core' ),
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Enable Slider Left/Right Padding',
							'param_name' => 'enable_padding',
							'value' => array_flip(fluid_edge_get_yes_no_select_array(false)),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'edgtf-core' )
						),
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
			'images'			      => '',
			'image_size'		      => 'thumbnail',
			'space_between_items'     => '',
			'pretty_photo'		      => '',
			'custom_links'		      => '',
			'custom_link_target'      => '_self',
			'grayscale'			      => '',
			'number_of_visible_items' => '1',
			'slider_loop'		      => 'yes',
			'slider_autoplay'		  => 'yes',
			'slider_speed'		      => '5000',
			'slider_speed_animation'  => '600',
			'enable_padding'          => 'no',
			'slider_navigation'	      => 'yes',
			'slider_pagination'	      => 'yes'
		);

		$params = shortcode_atts($args, $atts);
		
		$params['slider_data'] = $this->getSliderData($params);
		
		$params['images'] = $this->getSliderImages($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		
		$params['enable_links'] = false;
        if(!$params['pretty_photo']) {
            $params['links'] = $this->getSliderLinks($params);
            if(count($params['images']) == count($params['links'])){
                $params['enable_links'] = true;
            };
        }

        $params['custom_link_target'] = !empty($params['custom_link_target']) ? $params['custom_link_target'] : $args['custom_link_target'];

		$html = edgtf_core_get_shortcode_module_template_part('templates/image-slider', 'image-slider', '', $params);

		return $html;
	}

	
	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = !empty($params['number_of_visible_items']) ? $params['number_of_visible_items'] : '1';
		$slider_data['data-margin']                 = $params['space_between_items'] !== '' ? fluid_edge_filter_px($params['space_between_items']) : '60';
		$slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
		$slider_data['data-enable-padding']         = !empty($params['enable_padding']) ? $params['enable_padding'] : '';
		
		return $slider_data;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['alt'] = get_post_meta( $id, '_wp_attachment_image_alt', true);

			$images[$i] = $image;
			$i++;
		}

		return $images;
	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {
		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

    /**
     * Return links for gallery
     *
     * @param $params
     * @return array
     */
    private function getSliderLinks($params) {
        $custom_links = array();

        if (!empty($params['custom_links'])) {
            $custom_links = array_map('trim', explode(',', $params['custom_links']));
	    }

        return $custom_links;
    }
}