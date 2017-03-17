<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edgtf_Inner_Row_Holder extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Inner_Row_Column extends WPBakeryShortCodesContainer {}
}

if(!function_exists('edgtf_core_add_inner_row_holder_shortcodes')) {
	function edgtf_core_add_inner_row_holder_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\InnerRowHolder\InnerRowHolder',
			'EdgeCore\CPT\Shortcodes\InnerRowHolder\InnerRowColumn'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('edgtf_core_filter_add_vc_shortcode', 'edgtf_core_add_inner_row_holder_shortcodes');
}

if( !function_exists('edgtf_core_set_inner_row_holder_custom_style_for_vc_shortcodes') ) {
	/**
	 * Function that set custom css style for inner row holder shortcode
	 */
	function edgtf_core_set_inner_row_holder_custom_style_for_vc_shortcodes($style) {
		$current_style = '.vc_shortcodes_container.wpb_edgtf_inner_row_column { 
			background-color: #f4f4f4; 
		}';
		
		$style = $style . $current_style;
		
		return $style;
	}
	
	add_filter('edgtf_core_filter_add_vc_shortcodes_custom_style', 'edgtf_core_set_inner_row_holder_custom_style_for_vc_shortcodes');
}

if( !function_exists('edgtf_core_set_inner_row_holder_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for inner row holder shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function edgtf_core_set_inner_row_holder_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-inner-row-holder';
		$shortcodes_icon_class_array[] = '.icon-wpb-inner-row-column';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('edgtf_core_filter_add_vc_shortcodes_custom_icon_class', 'edgtf_core_set_inner_row_holder_icon_class_name_for_vc_shortcodes');
}