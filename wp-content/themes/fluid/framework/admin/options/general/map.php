<?php

if ( ! function_exists('fluid_edge_general_options_map') ) {
    /**
     * General options page
     */
    function fluid_edge_general_options_map() {

        fluid_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'fluid'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = fluid_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'fluid')
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'fluid'),
                'description'   => esc_html__('Choose a default Google font for your site', 'fluid'),
                'parent' => $panel_design_style
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'fluid'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = fluid_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'fluid'),
                'description'   => esc_html__('Choose additional Google font for your site', 'fluid'),
                'parent'        => $additional_google_fonts_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'fluid'),
                'description'   => esc_html__('Choose additional Google font for your site', 'fluid'),
                'parent'        => $additional_google_fonts_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'fluid'),
                'description'   => esc_html__('Choose additional Google font for your site', 'fluid'),
                'parent'        => $additional_google_fonts_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'fluid'),
                'description'   => esc_html__('Choose additional Google font for your site', 'fluid'),
                'parent'        => $additional_google_fonts_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'fluid'),
                'description'   => esc_html__('Choose additional Google font for your site', 'fluid'),
                'parent'        => $additional_google_fonts_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'fluid'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'fluid'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100'       => esc_html__('100 Thin', 'fluid'),
                    '100italic' => esc_html__('100 Thin Italic', 'fluid'),
                    '200'       => esc_html__('200 Extra-Light', 'fluid'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'fluid'),
                    '300'       => esc_html__('300 Light', 'fluid'),
                    '300italic' => esc_html__('300 Light Italic', 'fluid'),
                    '400'       => esc_html__('400 Regular', 'fluid'),
                    '400italic' => esc_html__('400 Regular Italic', 'fluid'),
                    '500'       => esc_html__('500 Medium', 'fluid'),
                    '500italic' => esc_html__('500 Medium Italic', 'fluid'),
                    '600'       => esc_html__('600 Semi-Bold', 'fluid'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'fluid'),
                    '700'       => esc_html__('700 Bold', 'fluid'),
                    '700italic' => esc_html__('700 Bold Italic', 'fluid'),
                    '800'       => esc_html__('800 Extra-Bold', 'fluid'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'fluid'),
                    '900'       => esc_html__('900 Ultra-Bold', 'fluid'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'fluid')
                )
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'fluid'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'fluid'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'fluid'),
                    'latin-ext' => esc_html__('Latin Extended', 'fluid'),
                    'cyrillic' => esc_html__('Cyrillic', 'fluid'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'fluid'),
                    'greek' => esc_html__('Greek', 'fluid'),
                    'greek-ext' => esc_html__('Greek Extended', 'fluid'),
                    'vietnamese' => esc_html__('Vietnamese', 'fluid')
                )
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'fluid'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #00bbb3', 'fluid'),
                'parent'        => $panel_design_style
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'fluid'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'fluid'),
                'parent'        => $panel_design_style
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'fluid'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'fluid'),
                'parent'        => $panel_design_style
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'fluid'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = fluid_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'fluid'),
                'description'   => esc_html__('Choose the page background color outside box', 'fluid'),
                'parent'        => $boxed_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'fluid'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'fluid'),
                'parent'        => $boxed_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Pattern', 'fluid'),
                'description'   => esc_html__('Choose an image to be used as background pattern', 'fluid'),
                'parent'        => $boxed_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'fluid'),
                'description'   => esc_html__('Choose background image attachment', 'fluid'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'fluid'),
                    'scroll'    => esc_html__('Scroll', 'fluid')
                )
            )
        );
        
        fluid_edge_add_admin_field(
            array(
                'name'          => 'paspartu',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Passepartout', 'fluid'),
                'description'   => esc_html__('Enabling this option will display passepartout around site content', 'fluid'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_paspartu_container"
                )
            )
        );

        $paspartu_container = fluid_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'paspartu_container',
                'hidden_property'   => 'paspartu',
                'hidden_value'      => 'no'
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'paspartu_color',
                'type'          => 'color',
                'label'         => esc_html__('Passepartout Color', 'fluid'),
                'description'   => esc_html__('Choose passepartout color, default value is #ffffff', 'fluid'),
                'parent'        => $paspartu_container
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name' => 'paspartu_width',
                'type' => 'text',
                'label' => esc_html__('Passepartout Size', 'fluid'),
                'description' => esc_html__('Enter size amount for passepartout', 'fluid'),
                'parent' => $paspartu_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => '%'
                )
            )
        );

        fluid_edge_add_admin_field(
            array(
                'parent' => $paspartu_container,
                'type' => 'yesno',
                'default_value' => 'no',
                'name' => 'disable_top_paspartu',
                'label' => esc_html__('Disable Top Passepartout', 'fluid')
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'fluid'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'fluid'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'edgtf-grid-1100' => esc_html__('1100px - default', 'fluid'),
                    'edgtf-grid-1300' => esc_html__('1300px', 'fluid'),
                    'edgtf-grid-1200' => esc_html__('1200px', 'fluid'),
                    'edgtf-grid-1000' => esc_html__('1000px', 'fluid'),
                    'edgtf-grid-800'  => esc_html__('800px', 'fluid')
                )
            )
        );

        $panel_settings = fluid_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'fluid')
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'fluid'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'fluid'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = fluid_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

	    fluid_edge_add_admin_field(
		    array(
			    'name'          => 'page_transition_preloader',
			    'type'          => 'yesno',
			    'default_value' => 'no',
			    'label'         => esc_html__( 'Enable Preloading Animation', 'fluid' ),
			    'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'fluid' ),
			    'parent'        => $page_transitions_container,
			    'args'          => array(
				    "dependence"             => true,
				    "dependence_hide_on_yes" => "",
				    "dependence_show_on_yes" => "#edgtf_page_transition_preloader_container"
			    )
		    )
	    );

	    $page_transition_preloader_container = fluid_edge_add_admin_container(
		    array(
			    'parent'          => $page_transitions_container,
			    'name'            => 'page_transition_preloader_container',
			    'hidden_property' => 'page_transition_preloader',
			    'hidden_value'    => 'no'
		    )
	    );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'fluid'),
                'parent'        => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = fluid_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'fluid'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'fluid'),
            'parent'        => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = fluid_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        fluid_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'fluid'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                'rotate_circles' => esc_html__('Rotate Circles', 'fluid'),
                'pulse' => esc_html__('Pulse', 'fluid'),
                'double_pulse' => esc_html__('Double Pulse', 'fluid'),
                'cube' => esc_html__('Cube', 'fluid'),
                'rotating_cubes' => esc_html__('Rotating Cubes', 'fluid'),
                'stripes' => esc_html__('Stripes', 'fluid'),
                'wave' => esc_html__('Wave', 'fluid'),
                'two_rotating_circles' => esc_html__('2 Rotating Circles', 'fluid'),
                'five_rotating_circles' => esc_html__('5 Rotating Circles', 'fluid'),
                'atom' => esc_html__('Atom', 'fluid'),
                'clock' => esc_html__('Clock', 'fluid'),
                'mitosis' => esc_html__('Mitosis', 'fluid'),
                'lines' => esc_html__('Lines', 'fluid'),
                'fussion' => esc_html__('Fussion', 'fluid'),
                'wave_circles' => esc_html__('Wave Circles', 'fluid'),
                'pulse_circles' => esc_html__('Pulse Circles', 'fluid')
            )
        ));

        fluid_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'fluid'),
            'parent'        => $row_pt_spinner_animation
        ));

	    fluid_edge_add_admin_field(
		    array(
			    'name'          => 'page_transition_fadeout',
			    'type'          => 'yesno',
			    'default_value' => 'no',
			    'label'         => esc_html__( 'Enable Fade Out Animation', 'fluid' ),
			    'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'fluid' ),
			    'parent'        => $page_transitions_container
		    )
	    );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'fluid'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'fluid'),
                'parent'        => $panel_settings
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'fluid'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'fluid'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = fluid_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'fluid')
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'fluid'),
                'description'   => esc_html__('Enter your custom CSS here', 'fluid'),
                'parent'        => $panel_custom_code
            )
        );

        fluid_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'fluid'),
                'description'   => esc_html__('Enter your custom Javascript here', 'fluid'),
                'parent'        => $panel_custom_code
            )
        );
	
	    $panel_google_api = fluid_edge_add_admin_panel(
		    array(
			    'page'  => '',
			    'name'  => 'panel_google_api',
			    'title' => esc_html__('Google API', 'fluid')
		    )
	    );
	
	    fluid_edge_add_admin_field(
		    array(
			    'name'        => 'google_maps_api_key',
			    'type'        => 'text',
			    'label'       => esc_html__('Google Maps Api Key', 'fluid'),
			    'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'fluid'),
			    'parent'      => $panel_google_api
		    )
	    );
    }

    add_action( 'fluid_edge_action_options_map', 'fluid_edge_general_options_map', 1);
}