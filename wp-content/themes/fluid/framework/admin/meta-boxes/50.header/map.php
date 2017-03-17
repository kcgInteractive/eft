<?php

if(!function_exists('fluid_edge_map_header_meta')) {
	function fluid_edge_map_header_meta() {
		$header_meta_box = fluid_edge_add_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post', 'team-member'),
				'title' => esc_html__('Header', 'fluid'),
				'name' => 'header_meta'
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_type_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Choose Header Type', 'fluid'),
				'description' => esc_html__('Select header type layout', 'fluid'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => 'Default',
					'header-standard' => esc_html__('Standard Header Layout', 'fluid'),
					'header-full-screen' => esc_html__('Full Screen Header Layout', 'fluid')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'' => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container',
						'header-standard' => '#edgtf_edgtf_header_full_screen_type_meta_container',
						'header-full-screen' => '#edgtf_edgtf_header_standard_type_meta_container'
					),
					'show' => array(
						'' => '',
						'header-standard' => '#edgtf_edgtf_header_standard_type_meta_container',
						'header-full-screen' => '#edgtf_edgtf_header_full_screen_type_meta_container'
					)
				)
			)
		);

		$header_standard_type_meta_container = fluid_edge_add_admin_container(
			array(
				'parent' => $header_meta_box,
				'name' => 'edgtf_header_standard_type_meta_container',
				'hidden_property' => 'edgtf_header_type_meta',
				'hidden_values' => array(
					'header-full-screen'
				),
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_set_menu_area_position_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Choose Menu Area Position', 'fluid'),
				'description' => esc_html__('Select menu area position in your header', 'fluid'),
				'parent' => $header_standard_type_meta_container,
				'options' => array(
					'' => esc_html__('Default', 'fluid'),
					'center' => esc_html__('Center', 'fluid'),
					'left' => esc_html__('Left', 'fluid'),
					'right' => esc_html__('Right', 'fluid')
				)
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_disable_header_widget_area_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Header Widget Area', 'fluid'),
				'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'fluid'),
				'parent' => $header_meta_box
			)
		);

		$fluid_custom_sidebars = fluid_edge_get_custom_sidebars();
		if(count($fluid_custom_sidebars) > 0) {
			fluid_edge_add_meta_box_field(array(
				'name' => 'edgtf_custom_header_sidebar_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Custom Widget Area in Header', 'fluid'),
				'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'fluid'),
				'parent' => $header_meta_box,
				'options' => $fluid_custom_sidebars
			));
		}

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_top_bar_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Header Top Bar', 'fluid'),
				'description' => esc_html__('Enabling this option will show header top bar area', 'fluid'),
				'parent' => $header_meta_box,
				'options' => fluid_edge_get_yes_no_select_array()
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_style_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'fluid'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'fluid'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => esc_html__('Default', 'fluid'),
					'light-header' => esc_html__('Light', 'fluid'),
					'dark-header' => esc_html__('Dark', 'fluid')
				)
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_enable_grid_layout_header_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Enable Grid Layout', 'fluid'),
				'description' => esc_html__('Enabling this option you will set header area to be in grid', 'fluid'),
				'parent' => $header_meta_box,
				'options' => fluid_edge_get_yes_no_select_array()
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_area_background_color_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for header area', 'fluid'),
				'parent' => $header_meta_box
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_area_background_transparency_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'fluid'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
				'parent' => $header_meta_box,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_area_border_color_meta',
				'type' => 'color',
				'label' => esc_html__('Border Color', 'fluid'),
				'description' => esc_html__('Choose a border bottom color for header area.', 'fluid'),
				'parent' => $header_meta_box
			)
		);

		fluid_edge_add_meta_box_field(
			array(
				'name'            => 'edgtf_scroll_amount_for_sticky_meta',
				'type'            => 'text',
				'label'           => esc_html__('Scroll amount for sticky header appearance', 'fluid'),
				'description'     => esc_html__('Define scroll amount for sticky header appearance', 'fluid'),
				'parent'          => $header_meta_box,
				'args'            => array(
					'col_width' => 2,
					'suffix'    => 'px'
				),
				'hidden_property' => 'header_behaviour',
				'hidden_values'   => array("sticky-header-on-scroll-up", "fixed-on-scroll")
			)
		);
	}

	add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_header_meta', 50);
}