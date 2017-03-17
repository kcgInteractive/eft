<?php

use FluidEdgeNamespace\Modules\Header\Lib\HeaderFactory;

if(!function_exists('fluid_edge_get_header')) {
	/**
	 * Loads header HTML based on header type option. Sets all necessary parameters for header
	 * and defines fluid_edge_filter_header_type_parameters filter
	 */
	function fluid_edge_get_header() {
		//will be read from options
		$header_type = fluid_edge_get_meta_field_intersect('header_type');

		$header_in_grid = fluid_edge_get_meta_field_intersect('enable_grid_layout_header');

		$set_menu_area_position = fluid_edge_get_meta_field_intersect('set_menu_area_position');

		$header_behavior = fluid_edge_options()->getOptionValue('header_behaviour');

		if(HeaderFactory::getInstance()->validHeaderObject()) {
			$parameters = array(
				'hide_logo' => fluid_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
				'header_in_grid' => $header_in_grid == 'yes' ? true : false,
				'standard_menu_area_class' => !empty($set_menu_area_position) ? 'edgtf-menu-'.$set_menu_area_position : 'edgtf-menu-center',
				'set_menu_area_position' => $set_menu_area_position,
				'vertical_text_align_class' => '',
				'show_sticky' => in_array($header_behavior, array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up'
				)) ? true : false,
				'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false
			);

			$parameters = apply_filters('fluid_edge_filter_header_type_parameters', $parameters, $header_type);

			HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
		}
	}
}

if(!function_exists('fluid_edge_get_header_top')) {
	/**
	 * Loads header top HTML and sets parameters for it
	 */
	function fluid_edge_get_header_top() {

		//generate column width class
		switch(fluid_edge_options()->getOptionValue('top_bar_layout')) {
			case ('two-columns'):
				$column_width_class = '50-50';
				break;
			case ('three-columns'):
				$column_width_class = fluid_edge_options()->getOptionValue('top_bar_column_widths');
				break;
		}

		$params = array(
			'column_widths'      => $column_width_class,
			'show_widget_center' => fluid_edge_options()->getOptionValue('top_bar_layout') === 'three-columns' ? true : false,
			'show_header_top'    => fluid_edge_get_meta_field_intersect('top_bar') === 'yes' ? true : false,
			'top_bar_in_grid'    => fluid_edge_get_meta_field_intersect('top_bar_in_grid') === 'yes' ? true : false
		);

		$params = apply_filters('fluid_edge_filter_header_top_params', $params);

		fluid_edge_get_module_template_part('templates/parts/header-top', 'header', '', $params);
	}
}

if(!function_exists('fluid_edge_get_logo')) {
	/**
	 * Loads logo HTML
	 *
	 * @param $slug
	 */
	function fluid_edge_get_logo($slug = '') {

		$slug = $slug !== '' ? $slug : fluid_edge_options()->getOptionValue('header_type');

		if ($slug == 'sticky'){
			$logo_image = fluid_edge_options()->getOptionValue('logo_image_sticky');
		}  else {
			$logo_image = fluid_edge_options()->getOptionValue('logo_image');
		}

		$logo_image_dark = fluid_edge_options()->getOptionValue('logo_image_dark');
		$logo_image_light = fluid_edge_options()->getOptionValue('logo_image_light');


		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = fluid_edge_get_image_dimensions($logo_image);

		$logo_height = '';
		$logo_styles = '';
		if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
		}

		$params = array(
			'logo_image'  => $logo_image,
			'logo_image_dark' => $logo_image_dark,
			'logo_image_light' => $logo_image_light,
			'logo_styles' => $logo_styles
		);

		fluid_edge_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
	}
}

if(!function_exists('fluid_edge_get_main_menu')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fluid_edge_get_main_menu($additional_class = 'edgtf-default-nav') {
		fluid_edge_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if(!function_exists('fluid_edge_get_header_widget_area')) {
	/**
	 * Loads header widgets area HTML
	 */
	function fluid_edge_get_header_widget_area() {
		$page_id = fluid_edge_get_page_id();
		if (fluid_edge_is_woocommerce_installed() && fluid_edge_is_woocommerce_shop()) {
			//get shop page id from options table
			$shop_id = get_option('woocommerce_shop_page_id');

			if (!empty($shop_id)) {
				$page_id = $shop_id;
			} else {
				$page_id = '-1';
			}
		}

		if(get_post_meta($page_id, 'edgtf_disable_header_widget_area_meta', 'true') !== 'yes') {
			if(is_active_sidebar('edgtf-header-widget-area') && get_post_meta($page_id, 'edgtf_custom_header_sidebar_meta', true) === '') {
				dynamic_sidebar('edgtf-header-widget-area');
			} else if (get_post_meta($page_id, 'edgtf_custom_header_sidebar_meta', true) !== '') {
				$sidebar = get_post_meta($page_id, 'edgtf_custom_header_sidebar_meta', true);
				if (is_active_sidebar($sidebar)) {
					dynamic_sidebar($sidebar);
				}
			}
		}
	}
}


if(!function_exists('fluid_edge_get_sticky_menu')) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fluid_edge_get_sticky_menu($additional_class = 'edgtf-default-nav') {
		fluid_edge_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if(!function_exists('fluid_edge_get_sticky_header')) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function fluid_edge_get_sticky_header($slug = '') {

		$parameters = array(
			'hide_logo'             => fluid_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
			'sticky_header_in_grid' => fluid_edge_options()->getOptionValue('sticky_header_in_grid') == 'yes' ? true : false
		);

		fluid_edge_get_module_template_part('templates/behaviors/sticky-header', 'header', $slug, $parameters);
	}
}

if(!function_exists('fluid_edge_get_mobile_header')) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function fluid_edge_get_mobile_header() {
		if(fluid_edge_is_responsive_on()) {

			$mobile_menu_title = fluid_edge_options()->getOptionValue('mobile_menu_title');

			$has_navigation = false;
			if(has_nav_menu('main-navigation') || has_nav_menu('mobile-navigation')) {
				$has_navigation = true;
			}

			$parameters = array(
				'show_logo'              => fluid_edge_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title
			);

			fluid_edge_get_module_template_part('templates/types/mobile-header', 'header', '', $parameters);
		}
	}
}

if(!function_exists('fluid_edge_get_mobile_logo')) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 *
	 * @param string $slug
	 */
	function fluid_edge_get_mobile_logo($slug = '') {

		$slug = $slug !== '' ? $slug : fluid_edge_options()->getOptionValue('header_type');

		//check if mobile logo has been set and use that, else use normal logo
		if(fluid_edge_options()->getOptionValue('logo_image_mobile') !== '') {
			$logo_image = fluid_edge_options()->getOptionValue('logo_image_mobile');
		} else {
			$logo_image = fluid_edge_options()->getOptionValue('logo_image');
		}

		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = fluid_edge_get_image_dimensions($logo_image);

		$logo_height = '';
		$logo_styles = '';
		if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
		}

		//set parameters for logo
		$parameters = array(
			'logo_image'      => $logo_image,
			'logo_dimensions' => $logo_dimensions,
			'logo_height'     => $logo_height,
			'logo_styles'     => $logo_styles
		);

		fluid_edge_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
	}
}

if(!function_exists('fluid_edge_get_mobile_nav')) {
	/**
	 * Loads mobile navigation HTML
	 */
	function fluid_edge_get_mobile_nav() {

		fluid_edge_get_module_template_part('templates/parts/mobile-navigation', 'header', '');
	}
}

if( !function_exists('fluid_edge_header_area_style') ) {
	/**
	 * Function that return styles for header area
	 */
	function fluid_edge_header_area_style($style) {
		$id = fluid_edge_get_page_id();
		$class_id = fluid_edge_get_page_id();
		$is_product = false;

		if(fluid_edge_is_woocommerce_installed() && is_product()) {
			$class_id = get_the_ID();
			$is_product = true;
		}

		$class_prefix = fluid_edge_get_unique_page_class($class_id);

		$current_styles = '';

		$header_styles = array();
		$header_selector = array(
			$class_prefix . ' .edgtf-page-header'
		);

		$menu_styles = array();
		$menu_selector = array(
			$class_prefix . ' .edgtf-page-header .edgtf-menu-area'
		);

		$header_background_color                 = '';
		$header_border_color                     = '';

		$background_color = get_post_meta($id, 'edgtf_header_area_background_color_meta', true);
		$background_transparency = get_post_meta($id, 'edgtf_header_area_background_transparency_meta', true);
		$border_bottom_color = get_post_meta($id, 'edgtf_header_area_border_color_meta', true);

		if( $is_product ) {
			$background_color = fluid_edge_options()->getOptionValue('woo_single_header_background_color');
			$background_transparency = fluid_edge_options()->getOptionValue('woo_single_header_background_transparency');
			$border_bottom_color = fluid_edge_options()->getOptionValue('woo_single_header_border_color');
		}

		if(!empty($background_color)) {
			$header_background_color = $background_color;

			if($background_transparency !== '') {
				$header_background_transparency = $background_transparency;

				$header_background_color = fluid_edge_rgba_color($header_background_color, $header_background_transparency);
			}
		}

		if(!empty($border_bottom_color)) {
			$header_border_color = $border_bottom_color;
		}


		if(!empty($header_background_color)) {
			$header_styles['background-color'] = $header_background_color;
			$current_styles .= fluid_edge_dynamic_css($header_selector, $header_styles);
		}

		if(!empty($header_border_color)) {
			$menu_styles['border-color'] = $header_border_color;
			$current_styles .= fluid_edge_dynamic_css($menu_selector, $menu_styles);
		}

		$current_style = $current_styles . $style;

		return $current_style;
	}

	add_filter('fluid_edge_filter_add_page_custom_style', 'fluid_edge_header_area_style');
}