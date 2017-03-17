<?php

if(!function_exists('fluid_edge_register_top_header_areas')) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function fluid_edge_register_top_header_areas() {

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Left Column', 'fluid'),
			'id'            => 'edgtf-top-bar-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear on the left side in top bar header', 'fluid')
		));

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Middle Column', 'fluid'),
			'id'            => 'edgtf-top-bar-center',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear on the middle side in top bar header', 'fluid')
		));

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Right Column', 'fluid'),
			'id'            => 'edgtf-top-bar-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear on the right side in top bar header', 'fluid')
		));
	}

	add_action('widgets_init', 'fluid_edge_register_top_header_areas');
}

if(!function_exists('fluid_edge_header_standard_widget_areas')) {
	/**
	 * Registers widget areas for header types
	 */
	function fluid_edge_header_standard_widget_areas() {
		register_sidebar(array(
			'name'          => esc_html__('Header Widget Area', 'fluid'),
			'id'            => 'edgtf-header-widget-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-widget-area">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'fluid')
		));
	}

	add_action('widgets_init', 'fluid_edge_header_standard_widget_areas');
}

if(!function_exists('fluid_edge_register_mobile_header_areas')) {
	/**
	 * Registers widget areas for mobile header
	 */
	function fluid_edge_register_mobile_header_areas() {
		if(fluid_edge_is_responsive_on()) {
			register_sidebar(array(
				'name'          => esc_html__('Mobile Header Widget Area', 'fluid'),
				'id'            => 'edgtf-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'fluid')
			));
		}
	}

	add_action('widgets_init', 'fluid_edge_register_mobile_header_areas');
}

if(!function_exists('fluid_edge_register_sticky_header_areas')) {
	/**
	 * Registers widget area for sticky header
	 */
	function fluid_edge_register_sticky_header_areas() {
		if(in_array(fluid_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
			register_sidebar(array(
				'name'          => esc_html__('Sticky Header Widget Area', 'fluid'),
				'id'            => 'edgtf-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the sticky menu', 'fluid')
			));
		}
	}

	add_action('widgets_init', 'fluid_edge_register_sticky_header_areas');
}