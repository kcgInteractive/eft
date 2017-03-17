<?php
if(!function_exists('fluid_edge_header_top_options_map')) {

	function fluid_edge_header_top_options_map($panel_header){

		$top_header_container = fluid_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array('','header-top-menu','header-vertical','header-vertical-compact','header-vertical-closed')
			));

		fluid_edge_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Bar', 'fluid'),
				'description'   => esc_html__('Enabling this option will show top bar area', 'fluid'),
				'parent'        => $top_header_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = fluid_edge_add_admin_container(array(
			'name'            => 'top_bar_container',
			'parent'          => $top_header_container,
			'hidden_property' => 'top_bar',
			'hidden_value'    => 'no'
		));

		fluid_edge_add_admin_field(
			array(
				'parent'        => $top_bar_container,
				'type'          => 'select',
				'name'          => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label'         => esc_html__('Choose top bar layout', 'fluid'),
				'description'   => esc_html__('Select the layout for top bar', 'fluid'),
				'options'       => array(
					'two-columns'   => esc_html__('Two columns', 'fluid'),
					'three-columns' => esc_html__('Three columns', 'fluid')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'two-columns'   => '#edgtf_top_bar_layout_container',
						'three-columns' => '#edgtf_top_bar_two_columns_layout_container'
					),
					'show'       => array(
						'two-columns'   => '#edgtf_top_bar_two_columns_layout_container',
						'three-columns' => '#edgtf_top_bar_layout_container'
					)
				)
			)
		);

		$top_bar_layout_container = fluid_edge_add_admin_container(array(
			'name'            => 'top_bar_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('two-columns'),
		));

		fluid_edge_add_admin_field(
			array(
				'parent'        => $top_bar_layout_container,
				'type'          => 'select',
				'name'          => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label'         => esc_html__('Choose column widths', 'fluid'),
				'description'   => '',
				'options'       => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		$top_bar_two_columns_layout = fluid_edge_add_admin_container(array(
			'name'            => 'top_bar_two_columns_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('three-columns'),
		));

		fluid_edge_add_admin_field(
			array(
				'parent'        => $top_bar_two_columns_layout,
				'type'          => 'select',
				'name'          => 'top_bar_two_column_widths',
				'default_value' => '50-50',
				'label'         => esc_html__('Choose column widths', 'fluid'),
				'description'   => '',
				'options'       => array(
					'50-50' => '50% - 50%',
					'33-66' => '33% - 66%',
					'66-33' => '66% - 33%'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Top Bar in grid', 'fluid'),
				'description'   => esc_html__('Set top bar content to be in grid', 'fluid'),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = fluid_edge_add_admin_container(array(
			'name'            => 'top_bar_in_grid_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value'    => 'no'
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Grid Background Color', 'fluid'),
			'description' => esc_html__('Set grid background color for top bar', 'fluid'),
			'parent'      => $top_bar_in_grid_container
		));


		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Grid Background Transparency', 'fluid'),
			'description' => esc_html__('Set grid background transparency for top bar', 'fluid'),
			'parent'      => $top_bar_in_grid_container,
			'args'        => array('col_width' => 3)
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Set background color for top bar', 'fluid'),
			'parent'      => $top_bar_container
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'fluid'),
			'description' => esc_html__('Set background transparency for top bar', 'fluid'),
			'parent'      => $top_bar_container,
			'args'        => array('col_width' => 3)
		));

		fluid_edge_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Top Bar Border', 'fluid'),
				'description'   => esc_html__('Set top bar border', 'fluid'),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_border_container"
				)
			)
		);

		$top_bar_border_container = fluid_edge_add_admin_container(array(
			'name'            => 'top_bar_border_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_border',
			'hidden_value'    => 'no'
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_border_color',
			'type'        => 'color',
			'label'       => esc_html__('Top Bar Border', 'fluid'),
			'description' => esc_html__('Set border color for top bar', 'fluid'),
			'parent'      => $top_bar_border_container
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'top_bar_height',
			'type'        => 'text',
			'label'       => esc_html__('Top bar height', 'fluid'),
			'description' => esc_html__('Enter top bar height (Default is 37px)', 'fluid'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

	}

	add_action('fluid_edge_header_top_options_map', 'fluid_edge_header_top_options_map', 10, 1);
}