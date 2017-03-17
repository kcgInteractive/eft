<?php

if(!function_exists('fluid_edge_register_full_screen_menu_nav')) {
    function fluid_edge_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'fluid')
		    )
	    );
    }

	add_action('after_setup_theme', 'fluid_edge_register_full_screen_menu_nav');
}

if ( !function_exists('fluid_edge_register_full_screen_menu_sidebars') ) {

	function fluid_edge_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Top', 'fluid'),
			'id' => 'fullscreen_menu_above',
			'description' => esc_html__('This widget area is rendered above fullscreen menu', 'fluid'),
			'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Bottom', 'fluid'),
			'id' => 'fullscreen_menu_below',
			'description' => esc_html__('This widget area is rendered below fullscreen menu', 'fluid'),
			'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));
	}

	add_action('widgets_init', 'fluid_edge_register_full_screen_menu_sidebars');
}

if(!function_exists('fluid_edge_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function fluid_edge_fullscreen_menu_body_class($classes) {

		if ( fluid_edge_get_meta_field_intersect('header_type') == 'header-full-screen') {

			$classes[] = 'edgtf-' . fluid_edge_options()->getOptionValue('fullscreen_menu_animation_style');
		}

		return $classes;
	}

	add_filter('body_class', 'fluid_edge_fullscreen_menu_body_class');
}

if ( !function_exists('fluid_edge_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function fluid_edge_get_full_screen_menu() {

		if ( fluid_edge_get_meta_field_intersect('header_type') == 'header-full-screen') {

			$parameters = array(
				'fullscreen_menu_in_grid' => fluid_edge_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);

			fluid_edge_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);
		}
	}
	
	add_action('fluid_edge_action_after_header_area', 'fluid_edge_get_full_screen_menu', 10);
}