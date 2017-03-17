<?php
namespace EdgeCore\CPT\Shortcodes\ClientsCarouselItem;

use EdgeCore\Lib;

class ClientsCarouselItem implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'edgtf_clients_carousel_item';
		
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
					'name'                    => esc_html__( 'Edge Clients Carousel Item', 'edgtf-core' ),
					'base'                    => $this->getBase(),
					'category'                => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                    => 'icon-wpb-clients-carousel-item extended-custom-icon',
					'as_child'                => array( 'only' => 'edgtf_clients_carousel' ),
					'as_parent'               => array( 'except' => 'vc_row' ),
					'show_settings_on_create' => true,
					'params'                  => array(
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'edgtf-core' ),
							'description' => esc_html__( 'Select image from media library', 'edgtf-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'hover_image',
							'heading'     => esc_html__( 'Hover Image', 'edgtf-core' ),
							'description' => esc_html__( 'Select image from media library', 'edgtf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'edgtf-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'edgtf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Custom Link', 'edgtf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'target',
							'heading'     => esc_html__( 'Custom Link Target', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_link_target_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'client_border',
							'heading'     => esc_html__( 'Enable Client Right Border', 'edgtf-core' ),
							'value'       => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'save_always' => true
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
			'image'	 	    => '',
			'hover_image'   => '',
			'image_size'    => 'full',
			'link'	 	    => '',
			'target' 	    => '_self',
			'client_border' => 'no'
		);
		
		$params = shortcode_atts($args, $atts);
		
		$params['item_classes'] = $this->getItemClasses($params);
		$params['image'] = $this->getCarouselImage($params);
		$params['hover_image'] = $this->getCarouselHoverImage($params);
		$params['image_size'] = $this->getCarouselImageSize($params['image_size']);
		$params['target'] = !empty($params['target']) ? $params['target'] : $args['target'];
		
		$html = edgtf_core_get_shortcode_module_template_part('templates/clients-carousel-item', 'clients-carousel', '', $params);
		
		return $html;
	}
	
	/**
	 * Generates item classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getItemClasses($params){
		$holderClasses = '';
		
		$holderClasses .= $params['client_border'] === 'yes' ? ' edgtf-cc-has-border' : '';
		
		return $holderClasses;
	}
	
	/**
	 * Return images for carousel
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselImage($params) {
		$image_meta = array();
		
		if (!empty($params['image'])) {
			$image_id = $params['image'];
			$image_original = wp_get_attachment_image_src($image_id, 'full');
			$image['url'] = $image_original[0];
			$image['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
			
			$image_meta = $image;
		}
		
		return $image_meta;
	}
	
	/**
	 * Return images for carousel
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselHoverImage($params) {
		$image_meta = array();
		
		if (!empty($params['hover_image'])) {
			$image_id = $params['hover_image'];
			$image_original = wp_get_attachment_image_src($image_id, 'full');
			$image['url'] = $image_original[0];
			$image['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
			
			$image_meta = $image;
		}
		
		return $image_meta;
	}
	
	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getCarouselImageSize($image_size) {
		
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
			return 'full';
		}
	}
}