<?php

foreach(glob(EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/header/options-map/*/*.php') as $options_load) {
	include_once $options_load;
}

if ( ! function_exists('fluid_edge_header_options_map') ) {

	function fluid_edge_header_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'fluid'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = fluid_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'fluid'),
				'description' => esc_html__('Select the type of header you would like to use', 'fluid'),
				'options' => array(
					'header-standard'          => array(
						'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-standard.png',
						'label' => esc_html__('Standard', 'fluid')
					),
					'header-full-screen' => array(
						'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-minimal.png',
						'label' => esc_html__('Full Screen', 'fluid')
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard'    => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header'
					),
					'hide' => array(
						'header-standard'    => '#edgtf_panel_header_full_screen',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_panel_main_menu'
					)
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'fixed-on-scroll',
				'label' => esc_html__('Choose Header Behaviour', 'fluid'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'fluid'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scroll up', 'fluid'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scroll up/down', 'fluid'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll', 'fluid'),
					'no-behavior' => esc_html__('No behavior', 'fluid')
				),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
						'no-behavior' => '#edgtf_panel_fixed_header, #edgtf_panel_sticky_header'
					)
				),
				'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-full-screen'
				)

			)
		);

		/***************** Top Header Layout  **********************/

		fluid_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'fluid'),
				'description' => esc_html__('Enabling this option will show top bar area', 'fluid'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = fluid_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		fluid_edge_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label' => esc_html__('Choose Top Bar Layout', 'fluid'),
				'description' => esc_html__('Select the layout for top bar', 'fluid'),
				'options' => array(
					'two-columns' => esc_html__('Two Columns', 'fluid'),
					'three-columns' => esc_html__('Three Columns', 'fluid')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#edgtf_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#edgtf_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = fluid_edge_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_values' => array("two-columns"),
		));

		fluid_edge_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose Column Widths', 'fluid'),
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Grid Layout', 'fluid'),
				'description' => esc_html__('Set top bar content to be in grid', 'fluid'),
				'parent' => $top_bar_container
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Choose a background color for header area', 'fluid'),
			'parent' => $top_bar_container
		));

		fluid_edge_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'fluid'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		fluid_edge_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top Bar Height', 'fluid'),
			'description' => esc_html__('Enter top bar height (Default is 42px)', 'fluid'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		/***************** Top Header Layout **********************/


		/***************** Header Skin Options -start ********************/

			fluid_edge_add_admin_field(
				array(
					'parent' => $panel_header,
					'type' => 'select',
					'name' => 'header_style',
					'default_value' => '',
					'label' => esc_html__('Header Skin', 'fluid'),
					'description' => esc_html__('Choose a predefined header style for header elements (logo, main menu, side menu opener...)', 'fluid'),
					'options' => array(
						'' => esc_html__('Default', 'fluid'),
						'light-header' => esc_html__('Light', 'fluid'),
						'dark-header' => esc_html__('Dark', 'fluid')
					)
				)
			);
		/***************** Header Skin Options ********************/

		/***************** Header Style **********************/

		fluid_edge_add_admin_section_title(
			array(
				'parent' => $panel_header,
				'name' => 'header_area_style',
				'title' => esc_html__('Header Area Style', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_grid_layout_header',
				'default_value' => 'no',
				'label' => esc_html__('Enable Grid Layout', 'fluid'),
				'description' => esc_html__('Enabling this option you will set header area to be in grid', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'color',
				'name' => 'header_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for header area', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'text',
				'name' => 'header_area_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'fluid'),
				'description' => esc_html__('Choose a transparency for the header area background color (0 = fully transparent, 1 = opaque)', 'fluid'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'color',
				'name' => 'header_area_border_color',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'fluid'),
				'description' => esc_html__('Set border bottom color for header area. This option doesn\'t work for Vertical header layout', 'fluid')
			)
		);

		/***************** Header Style **********************/


		//***************** Standard Header Layout *****************/

		$panel_header_standard = fluid_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'fluid'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'select',
				'name' => 'set_menu_area_position',
				'default_value' => 'center',
				'label' => esc_html__('Choose Menu Area Position', 'fluid'),
				'description' => esc_html__('Select menu area position in your header', 'fluid'),
				'options' => array(
					'center' => esc_html__('Center', 'fluid'),
					'left' => esc_html__('Left', 'fluid'),
					'right' => esc_html__('Right', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'fluid'),
				'description' => esc_html__('Enter Header Height (default is 100px)', 'fluid'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		/***************** Standard Header Layout *****************/

		/***************** Full Screen Header Layout *******************/

		$panel_header_full_screen = fluid_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen', 'fluid'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical'
				)
			)
		);

		fluid_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_full_screen,
				'name' => 'header_full_screen_title',
				'title' => esc_html__('Header Full Screen', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__('Fullscreen Menu Overlay Animation', 'fluid'),
				'description' => esc_html__('Choose animation type for fullscreen menu overlay', 'fluid'),
				'options' => array(
					'fade-push-text-right' => esc_html__('Fade Push Text Right', 'fluid'),
					'fade-push-text-top'   => esc_html__('Fade Push Text Top', 'fluid'),
					'fade-text-scaledown'  => esc_html__('Fade Text Scaledown', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Fullscreen Menu in Grid', 'fluid'),
				'description' => esc_html__('Enabling this option will put fullscreen menu content in grid', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__('Fullscreen Menu Alignment', 'fluid'),
				'description' => esc_html__('Choose alignment for fullscreen menu content', 'fluid'),
				'options' => array(
					''       => esc_html__('Default', 'fluid'),
					'left'   => esc_html__('Left', 'fluid'),
					'center' => esc_html__('Center', 'fluid'),
					'right'  => esc_html__('Right', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height', 'fluid'),
				'description' => esc_html__('Enter Header Height (default is 100px)', 'fluid'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		/***************** Sticky Header Layout *******************/

		$panel_sticky_header = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'fluid'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_value' => '',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'fluid'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height). This value can be overriden on a page level basis', 'fluid'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Sticky Header in Grid', 'fluid'),
				'description' => esc_html__('Enabling this option will put sticky header in grid', 'fluid'),
				'parent' => $panel_sticky_header,
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Choose a background color for header area', 'fluid'),
			'parent' => $panel_sticky_header
		));

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'fluid'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_header_border_color',
			'type' => 'color',
			'label' => esc_html__('Border Color', 'fluid'),
			'description' => esc_html__('Set border bottom color for header area', 'fluid'),
			'parent' => $panel_sticky_header
		));

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'fluid'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)', 'fluid'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = fluid_edge_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu', 'fluid'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'fluid')
		));

		$row1_sticky_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'fluid'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		fluid_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__(esc_html__('Hover/Active Color', 'fluid'), 'fluid'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		fluid_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'fluid'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_font_size',
				'label' => esc_html__('Font Size', 'fluid'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_line_height',
				'label' => esc_html__('Line Height', 'fluid'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_text_transform',
				'label' => esc_html__('Text Transform', 'fluid'),
				'default_value' => '',
				'options' => fluid_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letter_spacing',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		/***************** Sticky Header Layout *******************/

		/***************** Fixed Header Layout ********************/

		$panel_fixed_header = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'fluid'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_value' => '',
				'hidden_values' => array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up'
				)
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Choose a background color for header area', 'fluid'),
			'parent' => $panel_fixed_header
		));

		fluid_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'fluid'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_fixed_header,
				'type' => 'color',
				'name' => 'fixed_header_border_bottom_color',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'fluid'),
				'description' => esc_html__('Set border bottom color for header area', 'fluid'),
			)
		);

		$group_fixed_header_menu = fluid_edge_add_admin_group(array(
			'title' => esc_html__('Fixed Header Menu', 'fluid'),
			'name' => 'group_fixed_header_menu',
			'parent' => $panel_fixed_header,
			'description' => esc_html__('Define styles for fixed menu items', 'fluid')
		));

		$row1_fixed_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_fixed_header_menu
		));

		fluid_edge_add_admin_field(array(
			'name' => 'fixed_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'fluid'),
			'description' => '',
			'parent' => $row1_fixed_header_menu
		));

		fluid_edge_add_admin_field(array(
			'name' => 'fixed_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__(esc_html__('Hover/Active Color', 'fluid'), 'fluid'),
			'description' => '',
			'parent' => $row1_fixed_header_menu
		));

		$row2_fixed_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_fixed_header_menu
		));

		fluid_edge_add_admin_field(
			array(
				'name' => 'fixed_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'fluid'),
				'default_value' => '-1',
				'parent' => $row2_fixed_header_menu,
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'fixed_font_size',
				'label' => esc_html__('Font Size', 'fluid'),
				'default_value' => '',
				'parent' => $row2_fixed_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'fixed_line_height',
				'label' => esc_html__('Line Height', 'fluid'),
				'default_value' => '',
				'parent' => $row2_fixed_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'fixed_text_transform',
				'label' => esc_html__('Text Transform', 'fluid'),
				'default_value' => '',
				'options' => fluid_edge_get_text_transform_array(),
				'parent' => $row2_fixed_header_menu
			)
		);

		$row3_fixed_header_menu = fluid_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_fixed_header_menu
		));

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'fixed_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array(),
				'parent' => $row3_fixed_header_menu
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'fixed_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array(),
				'parent' => $row3_fixed_header_menu
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'fixed_letter_spacing',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'default_value' => '',
				'parent' => $row3_fixed_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		/***************** Fixed Header Layout ********************/

		/******************* Main Menu Layout *********************/

		$panel_main_menu = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'fluid'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		fluid_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'fluid')
			)
		);

		$drop_down_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'fluid'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'fluid')
			)
		);

		$drop_down_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'dropdown-animate-height',
				'label' => esc_html__('Main Dropdown Menu Appearance', 'fluid'),
				'description' => esc_html__('Choose appearance for dropdown menu', 'fluid'),
				'options' => array(
					'dropdown-default' => esc_html__('Default', 'fluid'),
					'dropdown-animate-height' => esc_html__('Animate Height', 'fluid')
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown Position', 'fluid'),
				'description' => esc_html__('Enter value in percentage of entire header height', 'fluid'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		$first_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'fluid'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'fluid')
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
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'fluid'),
			)
		);

		$first_level_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color', 'fluid'),
			)
		);

		$first_level_row4 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color', 'fluid'),
			)
		);

		$first_level_row5 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid'),
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row6 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = fluid_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu', 'fluid'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'fluid')
			)
		);

		$second_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'fluid')
			)
		);

		$second_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu', 'fluid'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'fluid')
			)
		);

		$second_level_wide_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'fluid')
			)
		);

		$second_level_wide_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		$third_level_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu', 'fluid'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'fluid')
			)
		);

		$third_level_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'fluid')
			)
		);

		$third_level_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_font_size_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_line_height_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_font_style_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_font_weight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letter_spacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_text_transform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		$third_level_wide_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu', 'fluid'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'fluid')
			)
		);

		$third_level_wide_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'fluid')
			)
		);

		$third_level_wide_row2 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_font_size_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_line_height_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = fluid_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_font_style_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'fluid'),
				'options' => fluid_edge_get_font_style_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_font_weight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'fluid'),
				'options' => fluid_edge_get_font_weight_array()
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letter_spacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'fluid'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_text_transform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'fluid'),
				'options' => fluid_edge_get_text_transform_array()
			)
		);

		/******************* Main Menu Layout *********************/

		/****************** Vertical Main Menu Layout ********************/

		$panel_vertical_main_menu = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Vertical Main Menu', 'fluid'),
				'name' => 'panel_vertical_main_menu',
				'page' => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-standard',
					'header-full-screen'
				)
			)
		);

		$drop_down_group = fluid_edge_add_admin_group(
			array(
				'parent' => $panel_vertical_main_menu,
				'name' => 'vertical_drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'fluid'),
				'description' => esc_html__('Set a style for dropdown menu', 'fluid')
			)
		);

		$vertical_drop_down_row1 = fluid_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'edgtf_drop_down_row1',
			)
		);

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_top_margin',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Margin', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $vertical_drop_down_row1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_bottom_margin',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Margin', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $vertical_drop_down_row1
		));

		$group_vertical_first_level = fluid_edge_add_admin_group(array(
			'name'			=> 'group_vertical_first_level',
			'title'			=> esc_html__('1st level', 'fluid'),
			'description'	=> esc_html__('Define styles for 1st level menu', 'fluid'),
			'parent'		=> $panel_vertical_main_menu
		));

		$row_vertical_first_level_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_first_level_1',
			'parent'	=> $group_vertical_first_level
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_1st_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_vertical_first_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_1st_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'fluid'),
			'parent'		=> $row_vertical_first_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_1st_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_first_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_1st_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_first_level_1
		));

		$row_vertical_first_level_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_first_level_2',
			'parent'	=> $group_vertical_first_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_1st_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_vertical_first_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'vertical_menu_1st_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_vertical_first_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_1st_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_vertical_first_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_1st_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_vertical_first_level_2
		));

		$row_vertical_first_level_3 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_first_level_3',
			'parent'	=> $group_vertical_first_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_1st_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_first_level_3
		));

		$group_vertical_second_level = fluid_edge_add_admin_group(array(
			'name'			=> 'group_vertical_second_level',
			'title'			=> esc_html__('2nd level', 'fluid'),
			'description'	=> esc_html__('Define styles for 2nd level menu', 'fluid'),
			'parent'		=> $panel_vertical_main_menu
		));

		$row_vertical_second_level_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_second_level_1',
			'parent'	=> $group_vertical_second_level
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_2nd_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_vertical_second_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_2nd_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'fluid'),
			'parent'		=> $row_vertical_second_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_2nd_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_second_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_2nd_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_second_level_1
		));

		$row_vertical_second_level_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_second_level_2',
			'parent'	=> $group_vertical_second_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_2nd_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_vertical_second_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'vertical_menu_2nd_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_vertical_second_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_2nd_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_vertical_second_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_2nd_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_vertical_second_level_2
		));

		$row_vertical_second_level_3 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_second_level_3',
			'parent'	=> $group_vertical_second_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_2nd_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_second_level_3
		));

		$group_vertical_third_level = fluid_edge_add_admin_group(array(
			'name'			=> 'group_vertical_third_level',
			'title'			=> esc_html__('3rd level', 'fluid'),
			'description'	=> esc_html__('Define styles for 3rd level menu', 'fluid'),
			'parent'		=> $panel_vertical_main_menu
		));

		$row_vertical_third_level_1 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_third_level_1',
			'parent'	=> $group_vertical_third_level
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_3rd_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'fluid'),
			'parent'		=> $row_vertical_third_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'vertical_menu_3rd_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'fluid'),
			'parent'		=> $row_vertical_third_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_3rd_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_third_level_1
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_3rd_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_third_level_1
		));

		$row_vertical_third_level_2 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_third_level_2',
			'parent'	=> $group_vertical_third_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_3rd_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'fluid'),
			'options'		=> fluid_edge_get_text_transform_array(),
			'parent'		=> $row_vertical_third_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'vertical_menu_3rd_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'fluid'),
			'parent'		=> $row_vertical_third_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_3rd_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'fluid'),
			'options'		=> fluid_edge_get_font_style_array(),
			'parent'		=> $row_vertical_third_level_2
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'vertical_menu_3rd_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'fluid'),
			'options'		=> fluid_edge_get_font_weight_array(),
			'parent'		=> $row_vertical_third_level_2
		));

		$row_vertical_third_level_3 = fluid_edge_add_admin_row(array(
			'name'		=> 'row_vertical_third_level_3',
			'parent'	=> $group_vertical_third_level,
			'next'		=> true
		));

		fluid_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'vertical_menu_3rd_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'fluid'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_vertical_third_level_3
		));


	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_header_options_map', 4);
}