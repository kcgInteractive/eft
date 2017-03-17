<?php

if ( ! function_exists('fluid_edge_mobile_header_options_map') ) {

	function fluid_edge_mobile_header_options_map() {

		fluid_edge_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => esc_html__('Mobile Header', 'fluid'),
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = fluid_edge_add_admin_panel(array(
			'title' => esc_html__('Mobile Header', 'fluid'),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));
		
		$mobile_header_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'mobile_header_group',
				'title' => esc_html__('Mobile Header Styles', 'fluid')
			)
		);
		
		$mobile_header_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name' => 'mobile_header_row1'
			)
		);

			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_header_height',
				'type'        => 'textsimple',
				'label'       => esc_html__('Height', 'fluid'),
				'parent'      => $mobile_header_row1,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			));
	
			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_header_background_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__('Background Color', 'fluid'),
				'parent'      => $mobile_header_row1
			));
	
			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_header_border_bottom_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__('Border Bottom Color', 'fluid'),
				'parent'      => $mobile_header_row1
			));
		
		$mobile_menu_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'mobile_menu_group',
				'title' => esc_html__('Mobile Menu Styles', 'fluid')
			)
		);
		
		$mobile_menu_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name' => 'mobile_menu_row1'
			)
		);

			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_menu_background_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__('Background Color', 'fluid'),
				'parent'      => $mobile_menu_row1
			));
	
			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_menu_border_bottom_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__('Border Bottom Color', 'fluid'),
				'parent'      => $mobile_menu_row1
			));
	
			fluid_edge_add_admin_field(array(
				'name'        => 'mobile_menu_separator_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__('Menu Item Separator Color', 'fluid'),
				'parent'      => $mobile_menu_row1
			));
		
		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'fluid'),
			'description' => esc_html__('Define logo height for screen size smaller than 1024px', 'fluid'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));
		
		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'fluid'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'fluid'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		fluid_edge_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'fluid')
		));

		$first_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'fluid'),
				'description' => esc_html__('Define styles for 1st level in Mobile Menu Navigation', 'fluid')
			)
		);

		$first_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Text Color', 'fluid'),
			'parent'      => $first_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Hover/Active Text Color', 'fluid'),
			'parent'      => $first_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_google_fonts',
			'type'        => 'fontsimple',
			'label'       => esc_html__('Font Family', 'fluid'),
			'parent'      => $first_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'textsimple',
			'label'       => esc_html__('Font Size', 'fluid'),
			'parent'      => $first_level_row1,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$first_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2'
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'textsimple',
			'label'       => esc_html__('Line Height', 'fluid'),
			'parent'      => $first_level_row2,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Text Transform', 'fluid'),
			'parent'      => $first_level_row2,
			'options'     => fluid_edge_get_text_transform_array()
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Font Style', 'fluid'),
			'parent'      => $first_level_row2,
			'options'     => fluid_edge_get_font_style_array()
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Font Weight', 'fluid'),
			'parent'      => $first_level_row2,
			'options'     => fluid_edge_get_font_weight_array()
		));
		
		$first_level_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3'
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'mobile_letter_spacing',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'default_value' => '',
				'parent' => $first_level_row3,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'second_level_group',
				'title' => esc_html__('Dropdown Menu', 'fluid'),
				'description' => esc_html__('Define styles for drop down menu items in Mobile Menu Navigation', 'fluid')
			)
		);

		$second_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Text Color', 'fluid'),
			'parent'      => $second_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_hover_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Hover/Active Text Color', 'fluid'),
			'parent'      => $second_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_google_fonts',
			'type'        => 'fontsimple',
			'label'       => esc_html__('Font Family', 'fluid'),
			'parent'      => $second_level_row1
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_size',
			'type'        => 'textsimple',
			'label'       => esc_html__('Font Size', 'fluid'),
			'parent'      => $second_level_row1,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$second_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2'
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_line_height',
			'type'        => 'textsimple',
			'label'       => esc_html__('Line Height', 'fluid'),
			'parent'      => $second_level_row2,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_transform',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Text Transform', 'fluid'),
			'parent'      => $second_level_row2,
			'options'     => fluid_edge_get_text_transform_array()
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_style',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Font Style', 'fluid'),
			'parent'      => $second_level_row2,
			'options'     => fluid_edge_get_font_style_array()
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_weight',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Font Weight', 'fluid'),
			'parent'      => $second_level_row2,
			'options'     => fluid_edge_get_font_weight_array()
		));
		
		$second_level_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3'
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'mobile_dropdown_letter_spacing',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'default_value' => '',
				'parent' => $second_level_row3,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__('Mobile Menu Opener', 'fluid')
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_menu_title',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Title', 'fluid'),
			'description' => esc_html__('Enter title for mobile menu navigation', 'fluid'),
			'parent'      => $panel_mobile_header,
			'default_value' => esc_html__('Menu', 'fluid'),
			'args' => array(
				'col_width' => 3
			)
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color', 'fluid'),
			'parent'      => $panel_mobile_header
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'fluid'),
			'parent'      => $panel_mobile_header
		));
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_mobile_header_options_map', 5);
}