<?php

if(!function_exists('fluid_edge_map_title_meta')) {
    function fluid_edge_map_title_meta() {
        $title_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'team-member'),
                'title' => esc_html__('Title', 'fluid'),
                'name' => 'title_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'fluid'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'fluid'),
                'parent' => $title_meta_box,
                'options' => fluid_edge_get_yes_no_select_array(),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "#edgtf_edgtf_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_show_title_area_meta_container",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = fluid_edge_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'edgtf_show_title_area_meta_container',
                'hidden_property' => 'edgtf_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

	    fluid_edge_add_meta_box_field(
		    array(
			    'name' => 'edgtf_title_in_grid_meta',
			    'type' => 'select',
			    'default_value' => '',
			    'label' => esc_html__('Title Area in Grid', 'fluid'),
			    'description' => esc_html__('Choose wheter for title content to be in grid', 'fluid'),
			    'parent' => $show_title_area_meta_container,
			    'options' => fluid_edge_get_yes_no_select_array()
		    )
	    );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'fluid'),
                'description' => esc_html__('Choose title type', 'fluid'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'standard' => esc_html__('Standard', 'fluid'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'fluid')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = fluid_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => 'breadcrumb'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'fluid'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'fluid'),
                'parent' => $title_area_type_meta_container,
                'options' => fluid_edge_get_yes_no_select_array()
            )
        );



        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertical_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'fluid'),
                'description' => esc_html__('Specify title vertical alignment', 'fluid'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'header_bottom' => esc_html__('From Bottom of Header', 'fluid'),
                    'window_top' => esc_html__('From Window Top', 'fluid')
                )
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'fluid'),
                'description' => esc_html__('Specify title horizontal alignment', 'fluid'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'left' => esc_html__('Left', 'fluid'),
                    'center' => esc_html__('Center', 'fluid'),
                    'right' => esc_html__('Right', 'fluid')
                )
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_title_tag_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Tag', 'fluid'),
                'parent' => $title_area_type_meta_container,
                'options' => fluid_edge_get_title_tag(true, array('h7' => esc_html__('Huge Custom Title', 'fluid')))
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'fluid'),
                'description' => esc_html__('Choose a color for title text', 'fluid'),
                'parent' => $show_title_area_meta_container
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'fluid'),
                'description' => esc_html__('Choose a background color for title area', 'fluid'),
                'parent' => $show_title_area_meta_container
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'fluid'),
                'description' => esc_html__('Enable this option to hide background image in title area', 'fluid'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = fluid_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'fluid'),
                'description' => esc_html__('Choose an Image for title area', 'fluid'),
                'parent' => $hide_background_image_meta_container
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'fluid'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'fluid'),
                'parent' => $hide_background_image_meta_container,
                'options' => fluid_edge_get_yes_no_select_array(),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = fluid_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'fluid'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'fluid'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'no' => esc_html__('No', 'fluid'),
                    'yes' => esc_html__('Yes', 'fluid'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'fluid')
                )
            )
        );

        fluid_edge_add_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'fluid'),
            'description' => esc_html__('Set a height for Title Area', 'fluid'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        fluid_edge_add_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'fluid'),
            'description' => esc_html__('Enter your subtitle text', 'fluid'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'fluid'),
                'description' => esc_html__('Choose a color for subtitle text', 'fluid'),
                'parent' => $show_title_area_meta_container
            )
        );
	
	    fluid_edge_add_meta_box_field(array(
		    'name' => 'edgtf_subtitle_side_padding_meta',
		    'type' => 'text',
		    'label' => esc_html__('Subtitle Side Padding', 'fluid'),
		    'description' => esc_html__('Set left/right padding for subtitle area', 'fluid'),
		    'parent' => $show_title_area_meta_container,
		    'args' => array(
			    'col_width' => 2,
			    'suffix' => '%'
		    )
	    ));
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_title_meta', 60);
}