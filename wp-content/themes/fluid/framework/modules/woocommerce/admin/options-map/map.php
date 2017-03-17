<?php

if ( ! function_exists('fluid_edge_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function fluid_edge_woocommerce_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'fluid'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = fluid_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'fluid')
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'fluid'),
			'default_value'	=> 'edgtf-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for main product list page', 'fluid'),
			'options'		=> array(
				'edgtf-woocommerce-columns-3' => esc_html__('3 Columns', 'fluid'),
				'edgtf-woocommerce-columns-4' => esc_html__('4 Columns', 'fluid')
			),
			'parent'      	=> $panel_product_list,
		));
		
		fluid_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'fluid'),
			'default_value'	=> 'edgtf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'fluid'),
			'options'		=> array(
				'edgtf-woo-normal-space' => esc_html__('Normal', 'fluid'),
				'edgtf-woo-small-space'  => esc_html__('Small', 'fluid'),
				'edgtf-woo-no-space'     => esc_html__('No Space', 'fluid')
			),
			'parent'      	=> $panel_product_list,
		));
		
		fluid_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_info_position',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product Info Position', 'fluid'),
			'default_value'	=> 'info_below_image',
			'description' 	=> esc_html__('Select product info position for product listing and related products on single product', 'fluid'),
			'options'		=> array(
				'info_below_image'    => esc_html__('Info Below Image', 'fluid'),
				'info_on_image_hover' => esc_html__('Info On Image Hover', 'fluid')
			),
			'parent'      	=> $panel_product_list,
		));

		fluid_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'fluid'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'fluid'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		fluid_edge_add_admin_field(array(
			'name'        	=> 'edgtf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'fluid'),
			'default_value'	=> 'h6',
			'description' 	=> '',
			'options'       => fluid_edge_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = fluid_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'fluid')
			)
		);

			fluid_edge_add_admin_field(array(
				'name' => 'woo_single_header_background_color',
				'type' => 'color',
				'label' => esc_html__('Header Background Color', 'fluid'),
				'description' => esc_html__('Choose a background color for header area', 'fluid'),
				'parent' => $panel_single_product
			));

			fluid_edge_add_admin_field(array(
				'name' => 'woo_single_header_background_transparency',
				'type' => 'text',
				'label' => esc_html__('Header Background Transparency', 'fluid'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fluid'),
				'parent' => $panel_single_product,
				'args' 			=> array(
					'col_width' => 3
				)
			));

			fluid_edge_add_admin_field(array(
					'name' => 'woo_single_header_border_color',
					'type' => 'color',
					'label' => esc_html__('Header Border Color', 'fluid'),
					'description' => esc_html__('Set border bottom color for header area. This option doesn\'t work for Vertical header layout', 'fluid'),
					'default_value' => '',
					'parent' => $panel_single_product
				)
			);

			fluid_edge_add_admin_field(array(
				'name'          => 'woo_enable_single_thumb_featured_switch',
				'type'          => 'yesno',
				'label'         => esc_html__('Switch Featured Image on Thumbnail Click', 'fluid'),
				'description'   => esc_html__('Enabling this option will switch featured image with thumbnail image on thumbnail click', 'fluid'),
				'default_value' => 'yes',
				'parent'        => $panel_single_product
			));
			
			fluid_edge_add_admin_field(array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'label'         => esc_html__('Set Thumbnail Images Position', 'fluid'),
				'default_value' => 'below-image',
				'options'		=> array(
					'below-image'  => esc_html__('Below Featured Image', 'fluid'),
					'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'fluid')
				),
				'parent'        => $panel_single_product
			));

			fluid_edge_add_admin_field(array(
				'name'        	=> 'edgtf_single_product_title_tag',
				'type'        	=> 'select',
				'label'       	=> esc_html__('Single Product Title Tag', 'fluid'),
				'default_value'	=> 'h2',
				'description' 	=> '',
				'options'       => fluid_edge_get_title_tag(),
				'parent'      	=> $panel_single_product,
			));
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_woocommerce_options_map', 21);
}