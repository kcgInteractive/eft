<?php

if(!function_exists('fluid_edge_404_header_general_styles')) {
    /**
     * Generates general custom styles for 404 header area
     */
    function fluid_edge_404_header_general_styles() {
	    $background_color        = fluid_edge_options()->getOptionValue('404_menu_area_background_color_header');
	    $background_transparency = fluid_edge_options()->getOptionValue('404_menu_area_background_transparency_header');
	    
        $header_styles = array();

        if(!empty($background_color)) {
            $header_styles['background-color'] = $background_color;
            $header_styles['background-transparency'] = 1;

            if($background_transparency !== '') {
                $header_styles['background-transparency'] = $background_transparency;
            }

            echo fluid_edge_dynamic_css('.edgtf-404-page .edgtf-page-header', array('background-color' => fluid_edge_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }

        if(empty($background_color) && $background_transparency !== '') {
            $header_styles['background-color'] = '#fff';
            $header_styles['background-transparency'] = $background_transparency;

            echo fluid_edge_dynamic_css('.edgtf-404-page .edgtf-page-header', array('background-color' => fluid_edge_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }
	
	    $border_color = fluid_edge_options()->getOptionValue('404_menu_area_border_color_header');

        $menu_styles = array();

        if(!empty($border_color)) {
            $menu_styles['border-color'] = $border_color;
        }

        echo fluid_edge_dynamic_css('.edgtf-404-page .edgtf-page-header .edgtf-menu-area', $menu_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_404_header_general_styles');
}

if(!function_exists('fluid_edge_404_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function fluid_edge_404_footer_top_general_styles() {
        $background_color         = fluid_edge_options()->getOptionValue('404_page_background_color');
	    $background_image         = fluid_edge_options()->getOptionValue('404_page_background_image');
	    $pattern_background_image = fluid_edge_options()->getOptionValue('404_page_background_pattern_image');
    	
    	$item_styles = array();
        if(!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        if (!empty($background_image)) {
            $item_styles['background-image'] = 'url('.$background_image.')';
            $item_styles['background-position'] = 'center 0';
            $item_styles['background-size'] = 'cover';
            $item_styles['background-repeat'] = 'no-repeat';
        }

        if (!empty($pattern_background_image)) {
            $item_styles['background-image'] = 'url('.$pattern_background_image.')';
            $item_styles['background-position'] = '0 0';
            $item_styles['background-repeat'] = 'repeat';
        }
	
	    $item_selector = array(
		    '.edgtf-404-page .edgtf-content'
	    );

        echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_404_footer_top_general_styles');
}

if(!function_exists('fluid_edge_404_title_styles')) {
    /**
     * Generates styles for 404 page title
     */
    function fluid_edge_404_title_styles() {
	    $item_styles = fluid_edge_get_typography_styles('404_title');
	
	    $item_selector = array(
		    '.edgtf-404-page .edgtf-page-not-found h1'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_404_title_styles');
}

if(!function_exists('fluid_edge_404_text_styles')) {
    /**
     * Generates styles for 404 page text
     */
    function fluid_edge_404_text_styles() {
	    $item_styles = fluid_edge_get_typography_styles('404_text');
	
	    $item_selector = array(
		    '.edgtf-404-page .edgtf-page-not-found .edgtf-page-not-found-text'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_404_text_styles');
}