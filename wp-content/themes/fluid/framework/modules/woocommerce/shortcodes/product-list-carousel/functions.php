<?php

if(!function_exists('fluid_edge_add_product_list_carousel_shortcode')) {
	function fluid_edge_add_product_list_carousel_shortcode($shortcodes_class_name) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	if(fluid_edge_core_plugin_installed()) {
		add_filter('edgtf_core_filter_add_vc_shortcode', 'fluid_edge_add_product_list_carousel_shortcode');
	}
}