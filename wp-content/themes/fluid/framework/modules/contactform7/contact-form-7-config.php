<?php

if ( ! function_exists('fluid_edge_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function fluid_edge_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'fluid'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'fluid') => 'default',
				esc_html__('Custom Style 1', 'fluid') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'fluid') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'fluid') => 'cf7_custom_style_3',
				esc_html__('Custom Style 4', 'fluid') => 'cf7_custom_style_4'
			),
			'description' => esc_html__('You can style each form element individually in Edge Options > Contact Form 7', 'fluid')
		));
	}
	
	add_action('vc_after_init', 'fluid_edge_contact_form_map');
}