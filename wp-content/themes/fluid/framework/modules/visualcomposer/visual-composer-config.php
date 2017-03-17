<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) {
	vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if(function_exists('vc_set_shortcodes_templates_dir')) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists('fluid_edge_configure_visual_composer_frontend_editor') ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function fluid_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if(function_exists('vc_disable_frontend')){
			vc_disable_frontend();
		}
	}

	add_action('vc_after_init', 'fluid_edge_configure_visual_composer_frontend_editor');
}

if (!function_exists('fluid_edge_vc_row_map')) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function fluid_edge_vc_row_map() {

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'param_name' => 'row_content_width',
			'heading' => esc_html__('Edge Row Content Width', 'fluid'),
			'value' => array(
				esc_html__('Full Width', 'fluid') => 'full-width',
				esc_html__('In Grid', 'fluid') => 'grid'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'param_name' => 'anchor',
			'heading' => esc_html__('Edge Anchor ID', 'fluid'),
			'description' => esc_html__('For example "home"', 'fluid')
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'param_name' => 'animate_bg',
			'heading' => esc_html__('Animate Background', 'fluid'),
			'description' => esc_html__('This will add animated background behind the row content.', 'fluid'),
			'value'   => array_flip(fluid_edge_get_yes_no_select_array(false))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading' => esc_html__('Edge Content Aligment', 'fluid'),
			'value' => array(
				esc_html__('Default', 'fluid') => '',
				esc_html__('Left', 'fluid') => 'left',
				esc_html__('Center', 'fluid') => 'center',
				esc_html__('Right', 'fluid') => 'right'
			)
		));

		/*** Row Inner ***/

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'param_name' => 'row_content_width',
			'heading' => esc_html__('Edge Row Content Width', 'fluid'),
			'value' => array(
				esc_html__('Full Width', 'fluid') => 'full-width',
				esc_html__('In Grid', 'fluid') => 'grid'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading' => esc_html__('Edge Content Aligment', 'fluid'),
			'value' => array(
				esc_html__('Default', 'fluid') => '',
				esc_html__('Left', 'fluid') => 'left',
				esc_html__('Center', 'fluid') => 'center',
				esc_html__('Right', 'fluid') => 'right'
			)
		));
	}

	add_action('vc_after_init', 'fluid_edge_vc_row_map');
}