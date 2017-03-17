<?php

if(!function_exists('fluid_edge_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function fluid_edge_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_theme_version_class');
}

if(!function_exists('fluid_edge_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function fluid_edge_boxed_class($classes) {

        //is boxed layout turned on?
        if(fluid_edge_options()->getOptionValue('boxed') == 'yes' && fluid_edge_get_meta_field_intersect('header_type') !== 'header-vertical') {
            $classes[] = 'edgtf-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_boxed_class');
}

if(!function_exists('fluid_edge_paspartu_class')) {
    /**
     * Function that adds classes on body for paspartu layout
     */
    function fluid_edge_paspartu_class($classes) {

        //is paspartu layout turned on?
        if(fluid_edge_get_meta_field_intersect('paspartu') === 'yes') {
            $classes[] = 'edgtf-paspartu-enabled';

            if(fluid_edge_get_meta_field_intersect('disable_top_paspartu') === 'yes') {
                $classes[] = 'edgtf-top-paspartu-disabled';
            }
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_paspartu_class');
}

if(!function_exists('fluid_edge_smooth_scroll_class')) {
	/**
	 * Function that adds classes on body for smooth scroll
	 */
	function fluid_edge_smooth_scroll_class($classes) {
		$classes[] = 'edgtf-smooth-scroll';
		
		return $classes;
	}
	
	add_filter('body_class', 'fluid_edge_smooth_scroll_class');
}

if(!function_exists('fluid_edge_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function fluid_edge_smooth_page_transitions_class($classes) {
	    $id = fluid_edge_get_page_id();

	    if(fluid_edge_get_meta_field_intersect('smooth_page_transitions',$id) == 'yes') {
		    $classes[] = 'edgtf-smooth-page-transitions';

		    if(fluid_edge_get_meta_field_intersect('page_transition_preloader',$id) == 'yes') {
			    $classes[] = 'edgtf-smooth-page-transitions-preloader';
		    }

		    if(fluid_edge_get_meta_field_intersect('page_transition_fadeout',$id) == 'yes') {
			    $classes[] = 'edgtf-smooth-page-transitions-fadeout';
		    }

	    }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_smooth_page_transitions_class');
}

if(!function_exists('fluid_edge_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function fluid_edge_content_initial_width_body_class($classes) {

        if(fluid_edge_options()->getOptionValue('initial_content_width')) {
            $classes[] = fluid_edge_options()->getOptionValue('initial_content_width');
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_content_initial_width_body_class');
}