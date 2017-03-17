<?php
if(!function_exists('fluid_edge_header_menu_area_options_map')) {

	function fluid_edge_header_menu_area_options_map($panel_header){

		$menu_area_container = fluid_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => array('header-vertical','header-vertical-compact','header-vertical-closed')
			)
		);

		fluid_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name' => 'menu_area_style',
				'title' => esc_html__('Menu Area Style', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Menu Area In Grid', 'fluid'),
				'description' => esc_html__('Set menu area content to be in grid', 'fluid'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_container'
				)
			)
		);

		$menu_area_in_grid_container = fluid_edge_add_admin_container(
			array(
				'parent' => $menu_area_container,
				'name' => 'menu_area_in_grid_container',
				'hidden_property' => 'menu_area_in_grid',
				'hidden_value' => 'no'
			)
		);

			fluid_edge_add_admin_field(
				array(
					'parent' => $menu_area_in_grid_container,
					'type' => 'color',
					'name' => 'menu_area_grid_background_color',
					'default_value' => '',
					'label' => esc_html__('Grid Background Color', 'fluid'),
					'description' => esc_html__('Set grid background color for menu area', 'fluid'),
				)
			);

			fluid_edge_add_admin_field(
				array(
					'parent' => $menu_area_in_grid_container,
					'type' => 'text',
					'name' => 'menu_area_grid_background_transparency',
					'default_value' => '',
					'label' => esc_html__('Grid Background Transparency', 'fluid'),
					'description' => esc_html__('Set grid background transparency for menu area', 'fluid'),
					'args' => array(
						'col_width' => 3
					)
				)
			);

			fluid_edge_add_admin_field(
				array(
					'parent' => $menu_area_in_grid_container,
					'type' => 'yesno',
					'name' => 'menu_area_in_grid_shadow',
					'default_value' => 'no',
					'label' => esc_html__('Grid Area Shadow', 'fluid'),
					'description' => esc_html__('Set shadow on grid area', 'fluid')
				)
			);

			fluid_edge_add_admin_field(
				array(
					'parent' => $menu_area_in_grid_container,
					'type' => 'yesno',
					'name' => 'menu_area_in_grid_border',
					'default_value' => 'no',
					'label' => esc_html__('Grid Area Border', 'fluid'),
					'description' => esc_html__('Set border on grid area', 'fluid'),
					'args' => array(
						'dependence' => true,
						'dependence_hide_on_yes' => '',
						'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_border_container'
					)
				)
			);

			$menu_area_in_grid_border_container = fluid_edge_add_admin_container(
				array(
					'parent' => $menu_area_in_grid_container,
					'name' => 'menu_area_in_grid_border_container',
					'hidden_property' => 'menu_area_in_grid_border',
					'hidden_value' => 'no'
				)
			);

				fluid_edge_add_admin_field(
					array(
						'parent' => $menu_area_in_grid_border_container,
						'type' => 'color',
						'name' => 'menu_area_in_grid_border_color',
						'default_value' => '',
						'label' => esc_html__('Border Color', 'fluid'),
						'description' => esc_html__('Set border color for menu area', 'fluid'),
					)
				);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'color',
				'name' => 'menu_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background color', 'fluid'),
				'description' => esc_html__('Set background color for menu area', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'text',
				'name' => 'menu_area_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'fluid'),
				'description' => esc_html__('Set background transparency for menu area', 'fluid'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'yesno',
				'name' => 'menu_area_shadow',
				'default_value' => 'no',
				'label' => esc_html__('Menu Area Area Shadow', 'fluid'),
				'description' => esc_html__('Set shadow on menu area', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'yesno',
				'name' => 'menu_area_border',
				'default_value' => 'no',
				'label' => esc_html__('Menu Area Border', 'fluid'),
				'description' => esc_html__('Set border on menu area', 'fluid'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_border_container'
				)
			)
		);

		$menu_area_border_container = fluid_edge_add_admin_container(
			array(
				'parent' => $menu_area_container,
				'name' => 'menu_area_border_container',
				'hidden_property' => 'menu_area_border',
				'hidden_value' => 'no'
			)
		);

			fluid_edge_add_admin_field(
				array(
					'parent' => $menu_area_border_container,
					'type' => 'color',
					'name' => 'menu_area_border_color',
					'default_value' => '',
					'label' => esc_html__('Border Color', 'fluid'),
					'description' => esc_html__('Set border color for menu area', 'fluid'),
				)
			);

		fluid_edge_add_admin_field(
			array(
				'parent' => $menu_area_container,
				'type' => 'text',
				'name' => 'menu_area_height',
				'default_value' => '',
				'label' => esc_html__('Height', 'fluid'),
				'description' => esc_html__('Enter header height', 'fluid'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		do_action('fluid_edge_header_menu_area_additional_options', $panel_header);
	}

	add_action('fluid_edge_header_menu_area_options_map', 'fluid_edge_header_menu_area_options_map', 10, 1);
}