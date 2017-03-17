<?php

if ( ! function_exists('fluid_edge_sidearea_options_map') ) {

	function fluid_edge_sidearea_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'fluid'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'fluid'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = fluid_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'fluid'),
				'description' => esc_html__('Define styles for Side Area icon', 'fluid')
			)
		);

		$side_area_icon_style_row1 = fluid_edge_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'fluid')
			)
		);

		$side_area_icon_style_row2 = fluid_edge_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'fluid'),
				'description' => esc_html__('Enter a width for Side Area', 'fluid'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for Side Area', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_padding',
				'label' => esc_html__('Padding', 'fluid'),
				'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'fluid'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'fluid'),
				'description' => esc_html__('Choose text alignment for side area', 'fluid'),
				'options' => array(
					'' => esc_html__('Default', 'fluid'),
					'left' => esc_html__('Left', 'fluid'),
					'center' => esc_html__('Center', 'fluid'),
					'right' => esc_html__('Right', 'fluid')
				)
			)
		);
	}

	add_action('fluid_edge_action_options_map', 'fluid_edge_sidearea_options_map', 15);
}