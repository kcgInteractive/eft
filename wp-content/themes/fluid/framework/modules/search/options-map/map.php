<?php

if ( ! function_exists('fluid_edge_search_options_map') ) {

	function fluid_edge_search_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'fluid'),
				'icon' => 'fa fa-search'
			)
		);

		$search_page_panel = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Search Page', 'fluid'),
				'name' => 'search_template',
				'page' => '_search_page'
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'search_page_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'fluid'),
            'description' 	=> esc_html__("Choose a sidebar layout for search page", 'fluid'),
            'default_value' => 'no-sidebar',
            'options'       => array(
                'no-sidebar'        => esc_html__('No Sidebar', 'fluid'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'fluid'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'fluid'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'fluid'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'fluid')
            ),
			'parent'      => $search_page_panel
		));

        $fluid_custom_sidebars = fluid_edge_get_custom_sidebars();
        if(count($fluid_custom_sidebars) > 0) {
            fluid_edge_add_admin_field(array(
                'name' => 'search_custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'fluid'),
                'description' => esc_html__('Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'fluid'),
                'parent' => $search_page_panel,
                'options' => $fluid_custom_sidebars
            ));
        }

		$search_panel = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'fluid'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'fullscreen',
				'label' 		=> esc_html__('Select Search Type', 'fluid'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'fluid'),
				'options' 		=> array(
					'fullscreen' => esc_html__('Fullscreen Search', 'fluid'),
					'slide-from-header-bottom' => esc_html__('Slide From Header Bottom', 'fluid'),
                    'covers-header' => esc_html__('Search Covers Header', 'fluid'),
                    'slide-from-window-top' => esc_html__('Slide from Window Top' , 'fluid')
				)
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack', 'fluid'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'fluid'),
				'options'		=> fluid_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons'))
			)
		);

        fluid_edge_add_admin_field(
            array(
                'parent'		=> $search_panel,
                'type'			=> 'yesno',
                'name'			=> 'search_in_grid',
                'default_value'	=> 'yes',
                'label'			=> esc_html__('Enable Grid Layout', 'fluid'),
                'description'	=> esc_html__('Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'fluid'),
            )
        );
		
		fluid_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'fluid'),
				'description'	=> esc_html__('Set size for icon', 'fluid'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);
		
		$search_icon_color_group = fluid_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'fluid'),
				'description' => esc_html__('Define color style for icon', 'fluid'),
				'name'		=> 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = fluid_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'fluid'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'fluid'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = fluid_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);
		
		$enable_search_icon_text_group = fluid_edge_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'fluid'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define style for search icon text', 'fluid')
			)
		);
		
		$enable_search_icon_text_row = fluid_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'fluid')
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_font_size',
				'label'			=> esc_html__('Font Size', 'fluid'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_line_height',
				'label'			=> esc_html__('Line Height', 'fluid'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = fluid_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_text_transform',
				'label'			=> esc_html__('Text Transform', 'fluid'),
				'default_value'	=> '',
				'options'		=> fluid_edge_get_text_transform_array()
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'fluid'),
				'default_value'	=> '-1',
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_style',
				'label'			=> esc_html__('Font Style', 'fluid'),
				'default_value'	=> '',
				'options'		=> fluid_edge_get_font_style_array(),
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_weight',
				'label'			=> esc_html__('Font Weight', 'fluid'),
				'default_value'	=> '',
				'options'		=> fluid_edge_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = fluid_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);
		
		fluid_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letter_spacing',
				'label'			=> esc_html__('Letter Spacing', 'fluid'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
	}

	add_action('fluid_edge_action_options_map', 'fluid_edge_search_options_map', 16);
}