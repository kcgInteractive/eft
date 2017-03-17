<?php

if(!function_exists('fluid_edge_map_general_meta')) {

    function fluid_edge_map_general_meta() {

        $general_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'team-member'),
                'title' => esc_html__('General', 'fluid'),
                'name' => 'general_meta'
            )
        );

	    fluid_edge_add_meta_box_field(
		    array(
			    'name'          => 'edgtf_smooth_page_transitions_meta',
			    'type'          => 'select',
			    'default_value' => '',
			    'label'         => esc_html__( 'Smooth Page Transitions', 'fluid' ),
			    'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'fluid' ),
			    'parent'        => $general_meta_box,
			    'options'     => fluid_edge_get_yes_no_select_array(),
			    'args'          => array(
				    "dependence"             => true,
				    "hide"       => array(
					    ""    => "#edgtf_page_transitions_container_meta",
					    "no"  => "#edgtf_page_transitions_container_meta",
					    "yes" => ""
				    ),
				    "show"       => array(
					    ""    => "",
					    "no"  => "",
					    "yes" => "#edgtf_page_transitions_container_meta"
				    )
			    )
		    )
	    );

	    $page_transitions_container_meta = fluid_edge_add_admin_container(
		    array(
			    'parent'          => $general_meta_box,
			    'name'            => 'page_transitions_container_meta',
			    'hidden_property' => 'edgtf_smooth_page_transitions_meta',
			    'hidden_values'   => array('','no')
		    )
	    );

	    fluid_edge_add_meta_box_field(
		    array(
			    'name'          => 'edgtf_page_transition_preloader_meta',
			    'type'          => 'select',
			    'default_value' => '',
			    'label'         => esc_html__( 'Enable Preloading Animation', 'fluid' ),
			    'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'fluid' ),
			    'parent'        => $page_transitions_container_meta,
			    'options'     => fluid_edge_get_yes_no_select_array(),
			    'args'          => array(
				    "dependence"             => true,
				    "hide"       => array(
					    ""    => "#edgtf_page_transition_preloader_container_meta",
					    "no"  => "#edgtf_page_transition_preloader_container_meta",
					    "yes" => ""
				    ),
				    "show"       => array(
					    ""    => "",
					    "no"  => "",
					    "yes" => "#edgtf_page_transition_preloader_container_meta"
				    )
			    )
		    )
	    );

	    $page_transition_preloader_container_meta = fluid_edge_add_admin_container(
		    array(
			    'parent'          => $page_transitions_container_meta,
			    'name'            => 'page_transition_preloader_container_meta',
			    'hidden_property' => 'edgtf_page_transition_preloader_meta',
			    'hidden_values'   => array('','no')
		    )
	    );

	    fluid_edge_add_meta_box_field(
		    array(
			    'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
			    'type'   => 'color',
			    'label'  => esc_html__( 'Page Loader Background Color', 'fluid' ),
			    'parent' => $page_transition_preloader_container_meta
		    )
	    );

	    $group_pt_spinner_animation_meta = fluid_edge_add_admin_group(
		    array(
			    'name'        => 'group_pt_spinner_animation_meta',
			    'title'       => esc_html__( 'Loader Style', 'fluid' ),
			    'description' => esc_html__( 'Define styles for loader spinner animation', 'fluid' ),
			    'parent'      => $page_transition_preloader_container_meta
		    )
	    );

	    $row_pt_spinner_animation_meta = fluid_edge_add_admin_row(
		    array(
			    'name'   => 'row_pt_spinner_animation_meta',
			    'parent' => $group_pt_spinner_animation_meta
		    )
	    );

	    fluid_edge_add_meta_box_field(
		    array(
			    'type'          => 'selectsimple',
			    'name'          => 'edgtf_smooth_pt_spinner_type_meta',
			    'default_value' => '',
			    'label'         => esc_html__( 'Spinner Type', 'fluid' ),
			    'parent'        => $row_pt_spinner_animation_meta,
			    'options'       => array(
				    'rotate_circles'        => esc_html__( 'Rotate Circles', 'fluid' ),
				    'pulse'                 => esc_html__( 'Pulse', 'fluid' ),
				    'double_pulse'          => esc_html__( 'Double Pulse', 'fluid' ),
				    'cube'                  => esc_html__( 'Cube', 'fluid' ),
				    'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'fluid' ),
				    'stripes'               => esc_html__( 'Stripes', 'fluid' ),
				    'wave'                  => esc_html__( 'Wave', 'fluid' ),
				    'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'fluid' ),
				    'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'fluid' ),
				    'atom'                  => esc_html__( 'Atom', 'fluid' ),
				    'clock'                 => esc_html__( 'Clock', 'fluid' ),
				    'mitosis'               => esc_html__( 'Mitosis', 'fluid' ),
				    'lines'                 => esc_html__( 'Lines', 'fluid' ),
				    'fussion'               => esc_html__( 'Fussion', 'fluid' ),
				    'wave_circles'          => esc_html__( 'Wave Circles', 'fluid' ),
				    'pulse_circles'         => esc_html__( 'Pulse Circles', 'fluid' )
			    )
		    )
	    );

	    fluid_edge_add_meta_box_field(
		    array(
			    'type'          => 'colorsimple',
			    'name'          => 'edgtf_smooth_pt_spinner_color_meta',
			    'default_value' => '',
			    'label'         => esc_html__( 'Spinner Color', 'fluid' ),
			    'parent'        => $row_pt_spinner_animation_meta
		    )
	    );

	    fluid_edge_add_meta_box_field(
		    array(
			    'name'          => 'edgtf_page_transition_fadeout_meta',
			    'type'          => 'select',
			    'default_value' => '',
			    'label'         => esc_html__( 'Enable Fade Out Animation', 'fluid' ),
			    'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'fluid' ),
			    'options'       => fluid_edge_get_yes_no_select_array(),
			    'parent'        => $page_transitions_container_meta

		    )
	    );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_page_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'fluid'),
                'description' => esc_html__('Choose background color for page content', 'fluid'),
                'parent' => $general_meta_box
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_page_slider_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Slider Shortcode', 'fluid'),
                'description' => esc_html__('Paste your slider shortcode here', 'fluid'),
                'parent' => $general_meta_box
            )
        );

        $edgtf_content_padding_group = fluid_edge_add_admin_group(array(
            'name' => 'content_padding_group',
            'title' => esc_html__('Content Style', 'fluid'),
            'description' => esc_html__('Define styles for Content area', 'fluid'),
            'parent' => $general_meta_box
        ));

        $edgtf_content_padding_row = fluid_edge_add_admin_row(array(
            'name' => 'edgtf_content_padding_row',
            'next' => true,
            'parent' => $edgtf_content_padding_group
        ));

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Top Padding', 'fluid'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding_mobile',
                'type' => 'selectsimple',
                'label' => esc_html__('Set this top padding for mobile header', 'fluid'),
                'parent' => $edgtf_content_padding_row,
                'options' => fluid_edge_get_yes_no_select_array(false)
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_page_comments_meta',
                'type' => 'select',
                'label' => esc_html__('Show Comments', 'fluid'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'fluid'),
                'parent' => $general_meta_box,
                'options' => fluid_edge_get_yes_no_select_array()
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_general_meta', 10);
}