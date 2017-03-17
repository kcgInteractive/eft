<?php

if ( ! function_exists('fluid_edge_error_404_options_map') ) {

	function fluid_edge_error_404_options_map() {

		fluid_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'fluid'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_header = fluid_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_header',
			'title'	=> esc_html__('Header', 'fluid')
		));

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_background_color_header',
				'label' => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for header area', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'text',
				'name' => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'fluid'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_border_color_header',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'fluid'),
				'description' => esc_html__('Choose a border bottom color for header area', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'select',
				'name' => '404_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'fluid'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'fluid'),
				'options' => array(
					'' => esc_html__('Default', 'fluid'),
					'light-header' => esc_html__('Light', 'fluid'),
					'dark-header' => esc_html__('Dark', 'fluid')
				)
			)
		);

		$panel_404_options = fluid_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Options', 'fluid')
		));

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'label' => esc_html__('Background Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'label' => esc_html__('Background Image', 'fluid'),
				'description' => esc_html__('Choose a background image for 404 page', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'fluid'),
				'description' => esc_html__('Choose a pattern image for 404 page', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_title_image',
				'label' => esc_html__('Title Image', 'fluid'),
				'description' => esc_html__('Choose a background image for displaying above 404 page Title', 'fluid')
			)
		);

		fluid_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'fluid'),
			'description' => esc_html__('Enter title for 404 page. Default label is "404".', 'fluid')
		));

		$first_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__('Title Style', 'fluid'),
				'description' => esc_html__('Define styles for 404 page title', 'fluid')
			)
		);

		$first_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => '404_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'fontsimple',
				'name' => '404_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'textsimple',
				'name' => '404_title_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		fluid_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'fluid'),
			'description' => esc_html__('Enter text for 404 page.', 'fluid')
		));

		$third_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => '$third_level_group',
				'title' => esc_html__('Text Style', 'fluid'),
				'description' => esc_html__('Define styles for 404 page text', 'fluid')
			)
		);

		$third_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => '404_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'fontsimple',
				'name' => '404_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => '404_text_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		fluid_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'label' => esc_html__('Back to Home Button Label', 'fluid'),
			'description' => esc_html__('Enter label for "BACK TO HOME" button', 'fluid')
		));
		
		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'select',
				'name' => '404_button_style',
				'default_value' => '',
				'label' => esc_html__('Button Skin', 'fluid'),
				'description' => esc_html__('Choose a style to make Back to Home button in that predefined style', 'fluid'),
				'options' => array(
					'' => esc_html__('Default', 'fluid'),
					'light-button' => esc_html__('Light', 'fluid')
				)
			)
		);
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_error_404_options_map', 19);
}