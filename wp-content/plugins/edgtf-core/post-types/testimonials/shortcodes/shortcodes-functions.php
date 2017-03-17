<?php

if(!function_exists('edgtf_core_include_testimonials_shortcodes')) {
	function edgtf_core_include_testimonials_shortcodes() {
		include_once EDGE_CORE_CPT_PATH.'/testimonials/shortcodes/testimonials.php';
	}
	
	add_action('edgtf_core_action_include_shortcodes_file', 'edgtf_core_include_testimonials_shortcodes');
}

if(!function_exists('edgtf_core_add_testimonials_shortcodes')) {
	function edgtf_core_add_testimonials_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\Testimonials\Testimonials'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('edgtf_core_filter_add_vc_shortcode', 'edgtf_core_add_testimonials_shortcodes');
}

if( !function_exists('edgtf_core_set_testimonials_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for testimonials shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function edgtf_core_set_testimonials_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-testimonials';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('edgtf_core_filter_add_vc_shortcodes_custom_icon_class', 'edgtf_core_set_testimonials_icon_class_name_for_vc_shortcodes');
}