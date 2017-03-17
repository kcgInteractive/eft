<?php

if (!function_exists('fluid_edge_title_area_typography_style')) {

    function fluid_edge_title_area_typography_style(){

        // title default/small style
	    
	    $item_styles = fluid_edge_get_typography_styles('page_title');
	
	    $item_selector = array(
		    '.edgtf-title .edgtf-title-holder .edgtf-page-title'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
	
	    // subtitle style
	
	    $item_styles = fluid_edge_get_typography_styles('page_subtitle');
	
	    $item_selector = array(
		    '.edgtf-title .edgtf-title-holder .edgtf-subtitle'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
	
	    // breadcrumb style
	
	    $item_styles = fluid_edge_get_typography_styles('page_breadcrumb');
	
	    $item_selector = array(
		    '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs a',
		    '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs span'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
	    

	    $breadcrumb_hover_color = fluid_edge_options()->getOptionValue('page_breadcrumb_hovercolor');
	    
        $breadcrumb_hover_styles = array();
        if(!empty($breadcrumb_hover_color)) {
            $breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
        }

        $breadcrumb_hover_selector = array(
            '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs a:hover'
        );

        echo fluid_edge_dynamic_css($breadcrumb_hover_selector, $breadcrumb_hover_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_title_area_typography_style');
}