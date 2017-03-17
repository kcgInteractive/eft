<?php

if(!function_exists('fluid_edge_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function fluid_edge_header_class($classes) {
		$id = fluid_edge_get_page_id();

		$header_type = fluid_edge_get_meta_field_intersect('header_type', $id);

        $classes[] = 'edgtf-'.$header_type;

		$disable_menu_area_shadow = fluid_edge_get_meta_field_intersect('menu_area_shadow',$id) == 'no';
		if($disable_menu_area_shadow) {
			$classes[] = 'edgtf-menu-area-shadow-disable';
		}

		$disable_menu_area_grid_shadow = fluid_edge_get_meta_field_intersect('menu_area_in_grid_shadow',$id) == 'no';
		if($disable_menu_area_grid_shadow) {
			$classes[] = 'edgtf-menu-area-in-grid-shadow-disable';
		}

		$disable_menu_area_border = fluid_edge_get_meta_field_intersect('menu_area_border',$id) == 'no';
		if($disable_menu_area_border) {
			$classes[] = 'edgtf-menu-area-border-disable';
		}

		$disable_menu_area_grid_border = fluid_edge_get_meta_field_intersect('menu_area_in_grid_border',$id) == 'no';
		if($disable_menu_area_grid_border) {
			$classes[] = 'edgtf-menu-area-in-grid-border-disable';
		}

		if(fluid_edge_get_meta_field_intersect('menu_area_in_grid',$id) == 'yes' &&
			fluid_edge_get_meta_field_intersect('menu_area_grid_background_color',$id) !== '' &&
			fluid_edge_get_meta_field_intersect('menu_area_grid_background_transparency',$id) !== '0'){
			$classes[] = 'edgtf-header-menu-area-in-grid-padding';
		}

		$disable_logo_area_border = fluid_edge_get_meta_field_intersect('logo_area_border',$id) == 'no';
		if($disable_logo_area_border) {
			$classes[] = 'edgtf-logo-area-border-disable';
		}

		$disable_logo_area_grid_border = fluid_edge_get_meta_field_intersect('logo_area_in_grid_border',$id) == 'no';
		if($disable_logo_area_grid_border) {
			$classes[] = 'edgtf-logo-area-in-grid-border-disable';
		}

		if(fluid_edge_get_meta_field_intersect('logo_area_in_grid',$id) == 'yes' &&
			fluid_edge_get_meta_field_intersect('logo_area_grid_background_color',$id) !== '' &&
			fluid_edge_get_meta_field_intersect('logo_area_grid_background_transparency',$id) !== '0'){
			$classes[] = 'edgtf-header-logo-area-in-grid-padding';
		}

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_header_class');
}

if(!function_exists('fluid_edge_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function fluid_edge_header_behaviour_class($classes) {

        $classes[] = 'edgtf-'.fluid_edge_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_header_behaviour_class');
}

if(!function_exists('fluid_edge_mobile_header_class')) {
    function fluid_edge_mobile_header_class($classes) {
        $classes[] = 'edgtf-default-mobile-header';

        $classes[] = 'edgtf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_mobile_header_class');
}

if(!function_exists('fluid_edge_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function fluid_edge_menu_dropdown_appearance($classes) {
	    if(fluid_edge_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
		    $classes[] = 'edgtf-'.fluid_edge_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_menu_dropdown_appearance');
}

if (!function_exists('fluid_edge_header_skin_class')) {

    function fluid_edge_header_skin_class( $classes ) {
	    $id = fluid_edge_get_page_id();

	    if(($meta_temp = get_post_meta($id, 'edgtf_header_style_meta', true)) !== ''){
		    $classes[] = 'edgtf-' . $meta_temp;
	    }
	    else if ( is_404() && fluid_edge_options()->getOptionValue('404_header_style') !== '' ) {
		    $classes[] = 'edgtf-' . fluid_edge_options()->getOptionValue('404_header_style');
	    }
	    else if ( fluid_edge_options()->getOptionValue('header_style') !== '' ) {
		    $classes[] = 'edgtf-' . fluid_edge_options()->getOptionValue('header_style');
	    }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_header_skin_class');
}

if(!function_exists('fluid_edge_header_global_js_var')) {
    function fluid_edge_header_global_js_var($global_variables) {

        $global_variables['edgtfTopBarHeight'] = fluid_edge_get_top_bar_height();
        $global_variables['edgtfStickyHeaderHeight'] = fluid_edge_get_sticky_header_height();
        $global_variables['edgtfStickyHeaderTransparencyHeight'] = fluid_edge_get_sticky_header_height_of_complete_transparency();
	    $global_variables['edgtfStickyScrollAmount'] = fluid_edge_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('fluid_edge_filter_js_global_variables', 'fluid_edge_header_global_js_var');
}

if(!function_exists('fluid_edge_header_per_page_js_var')) {
    function fluid_edge_header_per_page_js_var($perPageVars) {

        $perPageVars['edgtfStickyScrollAmount'] = fluid_edge_get_sticky_scroll_amount();

        return $perPageVars;
    }

    add_filter('fluid_edge_filter_per_page_js_vars', 'fluid_edge_header_per_page_js_var');
}

if(!function_exists('fluid_edge_get_top_bar_styles')) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function fluid_edge_get_top_bar_styles($styles) {
		$id            = fluid_edge_get_page_id();

		$class_id = fluid_edge_get_page_id();
		if(fluid_edge_is_woocommerce_installed() && is_product()) {
			$class_id = get_the_ID();
		}
		$class_prefix  = fluid_edge_get_unique_page_class($class_id);

		$top_bar_style = array();

		$top_bar_bg_color = get_post_meta($id, 'edgtf_top_bar_background_color_meta', true);
		$top_bar_border = get_post_meta($id, 'edgtf_top_bar_border_meta', true);
		$top_bar_border_color = get_post_meta($id, 'edgtf_top_bar_border_color_meta', true);

		$current_style = '';

		$top_bar_selector = array(
			$class_prefix.' .edgtf-top-bar'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'edgtf_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}
			$top_bar_style['background-color'] = fluid_edge_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

		if($top_bar_border == 'yes') {
			$top_bar_style['border-bottom'] = '1px solid '.$top_bar_border_color;
		}elseif($top_bar_border == 'no'){
			$top_bar_style['border-bottom'] = '0';
		}

		$current_style  .= fluid_edge_dynamic_css($top_bar_selector, $top_bar_style);

		$current_style = $current_style . $styles;

		return $current_style;
	}

	add_filter('fluid_edge_filter_add_page_custom_style', 'fluid_edge_get_top_bar_styles');
}

if(!function_exists('fluid_edge_top_bar_skin_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function fluid_edge_top_bar_skin_class($classes) {
		$id           = fluid_edge_get_page_id();
		$top_bar_skin = get_post_meta($id, 'edgtf_top_bar_skin_meta', true);

		if(!empty($top_bar_skin)) {
			$classes[] = 'edgtf-top-bar-'.$top_bar_skin;
		}

		return $classes;
	}

	add_filter('body_class', 'fluid_edge_top_bar_skin_class');
}

if(!function_exists('fluid_edge_top_bar_grid_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function fluid_edge_top_bar_grid_class($classes) {
		$id = fluid_edge_get_page_id();

		if(fluid_edge_get_meta_field_intersect('top_bar_in_grid', $id) == 'yes' &&
			fluid_edge_options()->getOptionValue('top_bar_grid_background_color') !== '' &&
			fluid_edge_options()->getOptionValue('top_bar_grid_background_transparency') !== '0') {
			$classes[] = 'edgtf-top-bar-in-grid-padding';
		}
		
		return $classes;
	}

	add_filter('body_class', 'fluid_edge_top_bar_grid_class');
}