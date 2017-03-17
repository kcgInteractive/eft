<?php
if(!function_exists('fluid_edge_header_logo_area_options_map')) {

	function fluid_edge_header_logo_area_options_map($panel_header){

		$logo_area_container = fluid_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => array('header-standard','header-box','header-minimal','header-divided','header-tabbed','header-vertical','header-vertical-compact','header-vertical-closed')
			)
		);

		fluid_edge_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__('Logo Area', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__('Logo Area In Grid', 'fluid'),
				'description'   => esc_html__('Set menu area content to be in grid', 'fluid'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_in_grid_container'
				)
			)
		);

		$logo_area_in_grid_container = fluid_edge_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_in_grid_container',
				'hidden_property' => 'logo_area_in_grid',
				'hidden_value'    => 'no'
			)
		);

			fluid_edge_add_admin_field(
				array(
					'parent'        => $logo_area_in_grid_container,
					'type'          => 'color',
					'name'          => 'logo_area_grid_background_color',
					'default_value' => '',
					'label'         => esc_html__('Grid Background Color', 'fluid'),
					'description'   => esc_html__('Set grid background color for logo area', 'fluid'),
				)
			);

			fluid_edge_add_admin_field(
				array(
					'parent'        => $logo_area_in_grid_container,
					'type'          => 'text',
					'name'          => 'logo_area_grid_background_transparency',
					'default_value' => '',
					'label'         => esc_html__('Grid Background Transparency', 'fluid'),
					'description'   => esc_html__('Set grid background transparency', 'fluid'),
					'args'          => array(
						'col_width' => 3
					)
				)
			);

			fluid_edge_add_admin_field(
				array(
					'parent'        => $logo_area_in_grid_container,
					'type'          => 'yesno',
					'name'          => 'logo_area_in_grid_border',
					'default_value' => 'no',
					'label'         => esc_html__('Grid Area Border', 'fluid'),
					'description'   => esc_html__('Set border on grid area', 'fluid'),
					'args'          => array(
						'dependence'             => true,
						'dependence_hide_on_yes' => '',
						'dependence_show_on_yes' => '#edgtf_logo_area_in_grid_border_container'
					)
				)
			);

			$logo_area_in_grid_border_container = fluid_edge_add_admin_container(
				array(
					'parent'          => $logo_area_in_grid_container,
					'name'            => 'logo_area_in_grid_border_container',
					'hidden_property' => 'logo_area_in_grid_border',
					'hidden_value'    => 'no'
				)
			);

				fluid_edge_add_admin_field(
					array(
						'parent'        => $logo_area_in_grid_border_container,
						'type'          => 'color',
						'name'          => 'logo_area_in_grid_border_color',
						'default_value' => '',
						'label'         => esc_html__('Border Color', 'fluid'),
						'description'   => esc_html__('Set border color for grid area', 'fluid'),
					)
				);

		fluid_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'color',
				'name'          => 'logo_area_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'fluid'),
				'description'   => esc_html__('Set background color for logo area', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'fluid'),
				'description'   => esc_html__('Set background transparency for logo area', 'fluid'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__('Logo Area Border', 'fluid'),
				'description'   => esc_html__('Set border on logo area', 'fluid'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_border_container'
				)
			)
		);

		$logo_area_border_container = fluid_edge_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'hidden_property' => 'logo_area_border',
				'hidden_value'    => 'no'
			)
		);

			fluid_edge_add_admin_field(
				array(
					'parent'        => $logo_area_border_container,
					'type'          => 'color',
					'name'          => 'logo_area_border_color',
					'default_value' => '',
					'label'         => esc_html__('Border Color', 'fluid'),
					'description'   => esc_html__('Set border color for logo area', 'fluid'),
				)
			);

		fluid_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'default_value' => '',
				'label'         => esc_html__('Height', 'fluid'),
				'description'   => esc_html__('Enter logo area height (default is 90px)', 'fluid'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		do_action('fluid_edge_header_logo_area_additional_options', $logo_area_container);
	}

	add_action('fluid_edge_header_logo_area_options_map', 'fluid_edge_header_logo_area_options_map', 10, 1);
}