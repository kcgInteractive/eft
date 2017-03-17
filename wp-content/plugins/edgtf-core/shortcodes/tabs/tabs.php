<?php
namespace EdgeCore\CPT\Shortcodes\Tabs;

use EdgeCore\Lib;

class Tabs implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_tabs';
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
					'name'            => esc_html__( 'Edge Tabs', 'edgtf-core' ),
					'base'            => $this->getBase(),
					'as_parent'       => array( 'only' => 'edgtf_tabs_item' ),
					'content_element' => true,
					'category'        => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'            => 'icon-wpb-tabs extended-custom-icon',
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'edgtf-core' ),
							'value'       => array(
								esc_html__( 'Standard', 'edgtf-core' ) => 'standard',
								esc_html__( 'Boxed', 'edgtf-core' )    => 'boxed',
								esc_html__( 'Simple', 'edgtf-core' )   => 'simple',
								esc_html__( 'Vertical', 'edgtf-core' ) => 'vertical'
							),
							'save_always' => true
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'type' => 'standard'
		);

        $params  = shortcode_atts($args, $atts);
		extract($params);
		
		// Extract tab titles
		preg_match_all('/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles = array();

		/**
		 * get tab titles array
		 */
		if (isset($matches[0])) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach($tab_titles as $tab) {
			preg_match('/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
			$tab_title_array[] = $tab_matches[1][0];
		}
		
		// Extract tab titles description
		preg_match_all('/tab_title_description="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles_description = array();
		
		/**
		 * get tab titles array
		 */
		if (isset($matches[0])) {
			$tab_titles_description = $matches[0];
		}
		
		$tab_title_description_array = array();
		foreach($tab_titles_description as $tab_description) {
			preg_match('/tab_title_description="([^\"]+)"/i', $tab_description[0], $tab_description_matches, PREG_OFFSET_CAPTURE);
			$tab_title_description_array[] = $tab_description_matches[1][0];
		}

		// Extract tab titles images
		preg_match_all('/title_image="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$title_images = array();

		/**
		 * get title images array
		 *
		 */
		if (isset($matches[0])) {
			$title_images = $matches[0];
		}

		$title_images_array = array();

		foreach($title_images as $title_image) {
			preg_match('/title_image="([^\"]+)"/i', $title_image[0], $title_image_matches, PREG_OFFSET_CAPTURE);
			$title_images_array[] = $title_image_matches[1][0];
		}

		if(!empty($params['title_images'])){
			$params['tab_class'] = '';
		} else {
			$params['tab_class'] = 'edgtf-tab-title-without-image';
		}

		$params['holder_classes']  = $this->getHolderClasses($params);
		$params['title_images']    = $title_images_array;
		$params['tabs_titles']     = $tab_title_array;
		$params['tabs_titles_description']     = $tab_title_description_array;
		$params['title_metas']     = $this->getImageMeta($params);
		$params['content']         = $content;
		
		$output = '';
		
		$output .= edgtf_core_get_shortcode_module_template_part('templates/tab-template','tabs', '', $params);
		
		return $output;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holder_classes = array();
		
		$holder_classes[] = !empty($params['type']) ? 'edgtf-tabs-'.esc_attr($params['type']) : 'edgtf-tabs-standard';
		
		return implode(' ', $holder_classes);
	}

	/**
	 * Return images
	 *
	 * @param $params
	 * @return array
	 */
	private function getImageMeta($params) {

		$title_meta = array();

		if(!empty($params['title_images'])){
			$size = array(53,53);

			foreach ($params['title_images'] as $image_id) {
				$img = wp_get_attachment_image_src($image_id, $size);

				$image['url'] = $img[0];
				$image['width'] = $img[1];
				$image['height'] = $img[2];
				$image['title'] = get_the_title($image_id);

				$title_meta[] = $image;
			}
		}

		return $title_meta;
	}
}