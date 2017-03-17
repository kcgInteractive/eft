<?php
namespace EdgeCore\CPT\Shortcodes\ExpandedGallery;

use EdgeCore\Lib;

class ExpandedGallery implements Lib\ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_expanded_gallery';

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
		vc_map(array(
			'name'                      => esc_html__('Edge Expanded Gallery', 'edgtf-core'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE', 'edgtf-core'),
			'icon' 						=> 'icon-wpb-expanded-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'       => 'dropdown',
					'param_name' => 'number_of_images',
					'heading'    => esc_html__('Number of Images', 'edgtf-core'),
					'value' => array(
						esc_html__('Three', 'edgtf-core') => 'three',
						esc_html__('Five', 'edgtf-core')  => 'five'
					),
					'save_always' => true
				),
				array(
					'type'		  => 'attach_images',
					'param_name'  => 'images',
					'heading'	  => esc_html__('Images', 'edgtf-core'),
					'description' => esc_html__('Select images from media library. Images needs to be same size', 'edgtf-core')
				),
				array(
					'type'        => 'textarea',
					'param_name'  => 'custom_links',
					'heading'     => esc_html__('Custom Links', 'edgtf-core'),
					'description' => esc_html__('Delimit links by comma', 'edgtf-core')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'custom_link_target',
					'heading'     => esc_html__('Custom Link Target', 'edgtf-core'),
					'value'       => array_flip( fluid_edge_get_link_target_array() )
				),
			)
		));
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
			'number_of_images'   => 'five',
			'images'		     => '',
			'custom_links'		 => '',
			'custom_link_target' => '_self'
		);

		$params = shortcode_atts($args, $atts);
		
		$params['gallery_classes'] = $this->getGalleryClasses($params);
		$params['images']          = $this->getGalleryImages($params);
		$params['links']           = $this->getGalleryLinks($params);
		$params['target']          = !empty($params['custom_link_target']) ? $params['custom_link_target'] : $args['custom_link_target'];

		$html = edgtf_core_get_shortcode_module_template_part('templates/expanded-gallery', 'expanded-gallery', '', $params);

		return $html;
	}
	
	/**
	 * Generates gallery classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getGalleryClasses($params) {
		$holderClasses = '';
		
		$holderClasses .= !empty($params['number_of_images']) ? ' edgtf-eg-' . $params['number_of_images'] : ' edgtf-eg-five';
		
		return $holderClasses;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
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
			$image['alt'] = get_post_meta( $id, '_wp_attachment_image_alt', true);

			$images[$i] = $image;
			$i++;
		}

		return $images;
	}
	
	/**
	 * Return links for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryLinks($params) {
		$custom_links = array();
		
		if (!empty($params['custom_links'])) {
			$custom_links = array_map('trim', explode(',', $params['custom_links']));
		}
		
		return $custom_links;
	}
}