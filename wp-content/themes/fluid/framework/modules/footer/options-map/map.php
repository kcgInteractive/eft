<?php

if ( ! function_exists('fluid_edge_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function fluid_edge_footer_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'fluid'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = fluid_edge_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'fluid'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'fluid'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'fluid'),
				'parent' => $footer_panel,
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'fluid'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'fluid'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = fluid_edge_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'parent' => $show_footer_top_container,
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'fluid'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'fluid'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns Alignment', 'fluid'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'fluid'),
				'options' => array(
					''       => esc_html__('Default', 'fluid'),
					'left'   => esc_html__('Left', 'fluid'),
					'center' => esc_html__('Center', 'fluid'),
					'right'  => esc_html__('Right', 'fluid')
				),
				'parent' => $show_footer_top_container,
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Set background color for top footer area', 'fluid'),
			'parent' => $show_footer_top_container
		));

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'fluid'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'fluid'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = fluid_edge_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		fluid_edge_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'fluid'),
			'description' => esc_html__('Set background color for bottom footer area', 'fluid'),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_footer_options_map', 11);
}