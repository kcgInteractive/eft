<?php

if ( ! function_exists('fluid_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function fluid_edge_reset_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'fluid'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = fluid_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'fluid')
			)
		);

		fluid_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'fluid'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'fluid'),
			'parent'		=> $panel_reset
		));
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_reset_options_map', 100 );
}