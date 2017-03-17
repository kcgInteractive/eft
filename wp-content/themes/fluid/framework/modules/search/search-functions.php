<?php

if( !function_exists('fluid_edge_load_search') ) {
    function fluid_edge_load_search() {

	    $search_type_meta = fluid_edge_options()->getOptionValue('search_type');
	    $search_type = !empty($search_type_meta) ? $search_type_meta : 'fullscreen';

        if ( fluid_edge_active_widget( false, false, 'edgtf_search_opener' ) ) {
            include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
        }
    }

    add_action('init', 'fluid_edge_load_search');
}