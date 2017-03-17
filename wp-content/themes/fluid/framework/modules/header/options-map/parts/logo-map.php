<?php

if ( ! function_exists('fluid_edge_logo_options_map') ) {

	function fluid_edge_logo_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo', 'fluid'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = fluid_edge_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__('Logo', 'fluid')
			)
		);

		fluid_edge_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo', 'fluid'),
				'description' => esc_html__('Enabling this option will hide logo image', 'fluid'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = fluid_edge_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default', 'fluid'),
				'parent' => $hide_logo_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Dark', 'fluid'),
				'parent' => $hide_logo_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Light', 'fluid'),
				'parent' => $hide_logo_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky', 'fluid'),
				'parent' => $hide_logo_container
			)
		);

		fluid_edge_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile', 'fluid'),
				'parent' => $hide_logo_container
			)
		);
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_logo_options_map', 2);
}