<?php

if ( ! function_exists('fluid_edge_sidebar_options_map') ) {

	function fluid_edge_sidebar_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_sidebar_page',
				'title' => esc_html__('Sidebar Area', 'fluid'),
				'icon' => 'fa fa-indent'
			)
		);

		$sidebar_panel = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Sidebar Area', 'fluid'),
				'name' => 'sidebar',
				'page' => '_sidebar_page'
			)
		);
		
		fluid_edge_add_admin_field(array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'fluid'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'fluid'),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'        => esc_html__('No Sidebar', 'fluid'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'fluid'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'fluid'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'fluid'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'fluid')
			)
		));
		
		$fluid_custom_sidebars = fluid_edge_get_custom_sidebars();
		if(count($fluid_custom_sidebars) > 0) {
			fluid_edge_add_admin_field(array(
				'name' => 'custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'fluid'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'fluid'),
				'parent' => $sidebar_panel,
				'options' => $fluid_custom_sidebars
			));
		}
	}

	add_action('fluid_edge_action_options_map', 'fluid_edge_sidebar_options_map', 9);
}