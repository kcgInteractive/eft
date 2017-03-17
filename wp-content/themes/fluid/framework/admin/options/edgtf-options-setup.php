<?php

if(!function_exists('fluid_edge_admin_map_init')) {
	function fluid_edge_admin_map_init() {
		do_action('fluid_edge_action_before_options_map');
		
		require_once EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/fonts/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/general/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/page/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/social/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/reset/map.php';
		
		do_action('fluid_edge_action_options_map');
		
		do_action('fluid_edge_action_after_options_map');
	}
	
	add_action('after_setup_theme', 'fluid_edge_admin_map_init', 0);
}