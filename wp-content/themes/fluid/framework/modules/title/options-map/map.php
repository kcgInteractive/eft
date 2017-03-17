<?php

if ( ! function_exists('fluid_edge_title_options_map') ) {

	function fluid_edge_title_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'fluid'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = fluid_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'fluid'),
				'description' => esc_html__('This option will enable/disable Title Area', 'fluid'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = fluid_edge_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Title Area Type', 'fluid'),
				'description' => esc_html__('Choose title type', 'fluid'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'fluid'),
					'breadcrumb' => esc_html__('Breadcrumb', 'fluid')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#edgtf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#edgtf_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = fluid_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Breadcrumbs', 'fluid'),
				'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'fluid'),
				'parent' => $title_area_type_container,
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_title_tag',
				'type' => 'select',
				'default_value' => 'h1',
				'label' => esc_html__('Title Tag', 'fluid'),
				'parent' => $title_area_type_container,
				'options' => fluid_edge_get_title_tag(false, array('h7' => esc_html__('Huge Custom Title', 'fluid')))
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_vertical_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment', 'fluid'),
				'description' => esc_html__('Specify title vertical alignment', 'fluid'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'fluid'),
					'window_top' => esc_html__('From Window Top', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'fluid'),
				'description' => esc_html__('Specify title horizontal alignment', 'fluid'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'fluid'),
					'center' => esc_html__('Center', 'fluid'),
					'right' => esc_html__('Right', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for Title Area', 'fluid'),
				'parent' => $show_title_area_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'fluid'),
				'description' => esc_html__('Choose an Image for Title Area', 'fluid'),
				'parent' => $show_title_area_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'fluid'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'fluid'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = fluid_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'fluid'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'fluid'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'fluid'),
					'yes' => esc_html__('Yes', 'fluid'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'fluid'),
			'description' => esc_html__('Set a height for Title Area', 'fluid'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = fluid_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'fluid')
			)
		);

        fluid_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Title', 'fluid'),
            'parent' => $panel_typography
        ));

        $group_page_title_styles = fluid_edge_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title', 'fluid'),
			'description'	=> esc_html__('Define styles for page title', 'fluid'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_page_title_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_page_title_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

        fluid_edge_add_admin_section_title(array(
            'name' => 'type_section_subtitle',
            'title' => esc_html__('Subtitle', 'fluid'),
            'parent' => $panel_typography
        ));

		$group_page_subtitle_styles = fluid_edge_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle', 'fluid'),
			'description'	=> esc_html__('Define styles for page subtitle', 'fluid'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

        fluid_edge_add_admin_section_title(array(
            'name' => 'type_section_breadcrumbs',
            'title' => esc_html__('Breadcrumbs', 'fluid'),
            'parent' => $panel_typography
        ));

		$group_page_breadcrumbs_styles = fluid_edge_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs', 'fluid'),
			'description'	=> esc_html__('Define styles for page breadcrumbs', 'fluid'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Text Color', 'fluid'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));
    }

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_title_options_map', 6);
}