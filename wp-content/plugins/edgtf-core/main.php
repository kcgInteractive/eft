<?php
/*
Plugin Name: Edge CPT
Description: Plugin that adds all post types needed by our theme
Author: Edge Themes
Version: 1.0
*/

require_once 'load.php';

add_action('after_setup_theme', array(EdgeCore\CPT\PostTypesRegister::getInstance(), 'register'));

if(!function_exists('edgt_core_activation')) {
    /**
     * Triggers when plugin is activated. It calls flush_rewrite_rules
     * and defines fluid_edge_action_core_on_activate action
     */
    function edgt_core_activation() {
        do_action('fluid_edge_action_core_on_activate');

        EdgeCore\CPT\PostTypesRegister::getInstance()->register();
        flush_rewrite_rules();
    }

    register_activation_hook(__FILE__, 'edgt_core_activation');
}

if(!function_exists('edgt_core_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function edgt_core_text_domain() {
        load_plugin_textdomain('edgtf-core', false, EDGE_CORE_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'edgt_core_text_domain');
}

if(!function_exists('edgtf_core_version_class')) {
	/**
	 * Adds plugins version class to body
	 * @param $classes
	 * @return array
	 */
	function edgtf_core_version_class($classes) {
		$classes[] = 'edgt-core-'.EDGE_CORE_VERSION;
		
		return $classes;
	}
	
	add_filter('body_class', 'edgtf_core_version_class');
}

if(!function_exists('edgtf_core_theme_installed')) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function edgtf_core_theme_installed() {
		return defined('EDGE_ROOT');
	}
}

if (!function_exists('edgtf_core_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function edgtf_core_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if(!function_exists('edgtf_core_is_revolution_slider_installed')) {
	function edgtf_core_is_revolution_slider_installed() {
		return class_exists('RevSliderFront');
	}
}

if(!function_exists('edgt_core_theme_menu')) {
    /**
     * Function that generates admin menu for options page.
     * It generates one admin page per options page.
     */
    function edgt_core_theme_menu() {
        if (edgtf_core_theme_installed()) {

            global $fluid_edge_global_Framework;
            fluid_edge_init_theme_options();

            $page_hook_suffix = add_menu_page(
                'Edge Options',      // The value used to populate the browser's title bar when the menu page is active
	            'Edge Options',      // The text of the menu in the administrator's sidebar
                'administrator',                  // What roles are able to access the menu
                'fluid_edge_theme_menu',                // The ID used to bind submenu items to this menu
                array($fluid_edge_global_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
                $fluid_edge_global_Framework->getSkin()->getMenuIcon('options'),             // Icon For menu Item
                $fluid_edge_global_Framework->getSkin()->getMenuItemPosition('options')            // Position
            );

            foreach ($fluid_edge_global_Framework->edgtOptions->adminPages as $key=>$value ) {
                $slug = "";

                if (!empty($value->slug)) {
                    $slug = "_tab".$value->slug;
                }

                $subpage_hook_suffix = add_submenu_page(
                    'fluid_edge_theme_menu',
	                'Edge Options - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
                    $value->title,                   // The text of the menu in the administrator's sidebar
                    'administrator',                  // What roles are able to access the menu
                    'fluid_edge_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
                    array($fluid_edge_global_Framework->getSkin(), 'renderOptions')
                );

                add_action('admin_print_scripts-'.$subpage_hook_suffix, 'fluid_edge_enqueue_admin_scripts');
                add_action('admin_print_styles-'.$subpage_hook_suffix, 'fluid_edge_enqueue_admin_styles');
            };

            add_action('admin_print_scripts-'.$page_hook_suffix, 'fluid_edge_enqueue_admin_scripts');
            add_action('admin_print_styles-'.$page_hook_suffix, 'fluid_edge_enqueue_admin_styles');
        }
    }

    add_action( 'admin_menu', 'edgt_core_theme_menu');
}
if(!function_exists('edgt_core_theme_menu_backup_options')) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function edgt_core_theme_menu_backup_options() {
		if (edgtf_core_theme_installed()) {
			global $fluid_edge_global_Framework;
			
			$slug = "_backup_options";
			$page_hook_suffix = add_submenu_page(
				'fluid_edge_theme_menu',
				'Edge Options - Backup Options',                   // The value used to populate the browser's title bar when the menu page is active
				'Backup Options',                   // The text of the menu in the administrator's sidebar
				'administrator',                  // What roles are able to access the menu
				'fluid_edge_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
				array($fluid_edge_global_Framework->getSkin(), 'renderBackupOptions')
			);
			
			add_action('admin_print_scripts-'.$page_hook_suffix, 'fluid_edge_enqueue_admin_scripts');
			add_action('admin_print_styles-'.$page_hook_suffix, 'fluid_edge_enqueue_admin_styles');
		}
	}

	add_action( 'admin_menu', 'edgt_core_theme_menu_backup_options');
}