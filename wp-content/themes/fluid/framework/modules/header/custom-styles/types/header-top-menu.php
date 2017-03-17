<?php

if(!function_exists('fluid_edge_header_top_menu_logo_area_styles')) {
	/**
	 * Generates styles for menu area
	 */
	function fluid_edge_header_top_menu_logo_area_styles() {


		$menu_area_height = fluid_edge_options()->getOptionValue('menu_area_height');

		if($menu_area_height !== '') {
			echo fluid_edge_dynamic_css('.edgtf-header-top-menu .edgtf-page-header .edgtf-logo-area', array('margin-top' => $menu_area_height.'px'));
		}
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_header_top_menu_logo_area_styles');
}