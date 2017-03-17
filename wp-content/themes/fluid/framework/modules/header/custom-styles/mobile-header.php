<?php

if(!function_exists('fluid_edge_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function fluid_edge_mobile_header_general_styles() {
        $item_styles      = array();
        $height           = fluid_edge_options()->getOptionValue('mobile_header_height');
	    $background_color = fluid_edge_options()->getOptionValue('mobile_header_background_color');
	    $border_color     = fluid_edge_options()->getOptionValue('mobile_header_border_bottom_color');
	    
        if(!empty($height)) {
            $item_styles['height'] = fluid_edge_filter_px($height).'px';
        }

        if(!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        if(!empty($border_color)) {
            $item_styles['border-color'] = $border_color;
        }

        echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-header-inner', $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_mobile_header_general_styles');
}

if(!function_exists('fluid_edge_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function fluid_edge_mobile_navigation_styles() {
        $mobile_nav_styles = array();
	    $background_color  = fluid_edge_options()->getOptionValue('mobile_menu_background_color');
	    $border_color      = fluid_edge_options()->getOptionValue('mobile_menu_border_bottom_color');
	    
        if(!empty($background_color)) {
            $mobile_nav_styles['background-color'] = $background_color;
        }

        if(!empty($border_color)) {
            $mobile_nav_styles['border-color'] = $border_color;
        }

        echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-nav', $mobile_nav_styles);

        $nav_item_styles   = array();
	    $nav_border_color  = fluid_edge_options()->getOptionValue('mobile_menu_separator_color');
	    $mobile_nav_item_selector = array(
	        '.edgtf-mobile-header .edgtf-mobile-nav ul li a',
		    '.edgtf-mobile-header .edgtf-mobile-nav ul li h5'
	    );
	    
        if(!empty($nav_border_color)) {
	        $nav_item_styles['border-bottom-color'] = $nav_border_color;
        }
	
	    echo fluid_edge_dynamic_css($mobile_nav_item_selector, $nav_item_styles);
	    
	
	    // mobile dropdown 1st level menu style
    
        $mobile_menu_style = fluid_edge_get_typography_styles('mobile_text');
	
	    $mobile_menu_selector = array(
		    '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li > a',
		    '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li > h5'
        );
    
        echo fluid_edge_dynamic_css($mobile_menu_selector, $mobile_menu_style);
	    

        $mobile_nav_item_hover_styles = array();
        $mobile_text_hover_color      = fluid_edge_options()->getOptionValue('mobile_text_hover_color');
        
        if(!empty($mobile_text_hover_color)) {
            $mobile_nav_item_hover_styles['color'] = $mobile_text_hover_color;
        }

        $mobile_nav_item_selector_hover = array(
            '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li.edgtf-active-item > a',
            '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li > a:hover',
            '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li > h5:hover'
        );

        echo fluid_edge_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
	
	    // mobile dropdown deeper levels menu style
	    
	    $mobile_dropdown_style = fluid_edge_get_typography_styles('mobile_dropdown_text');
	
	    $mobile_dropdown_selector = array(
		    '.edgtf-mobile-header .edgtf-mobile-nav ul ul li a',
		    '.edgtf-mobile-header .edgtf-mobile-nav ul ul li h5'
	    );
	
	    echo fluid_edge_dynamic_css($mobile_dropdown_selector, $mobile_dropdown_style);
	    

        $mobile_nav_dropdown_item_hover_styles = array();
	    $mobile_nav_dropdown_hover_color       = fluid_edge_options()->getOptionValue('mobile_dropdown_text_hover_color');
	
	    if(!empty($mobile_nav_dropdown_hover_color)) {
		    $mobile_nav_dropdown_item_hover_styles['color'] = $mobile_nav_dropdown_hover_color;
	    }

        $mobile_nav_dropdown_item_selector_hover = array(
            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor > a',
            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item > a',
            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li a:hover',
            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li h5:hover'
        );

        echo fluid_edge_dynamic_css($mobile_nav_dropdown_item_selector_hover, $mobile_nav_dropdown_item_hover_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_mobile_navigation_styles');
}

if(!function_exists('fluid_edge_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function fluid_edge_mobile_logo_styles() {
    	$logo_height          = fluid_edge_options()->getOptionValue('mobile_logo_height');
	    $mobile_logo_height   = fluid_edge_options()->getOptionValue('mobile_logo_height_phones');
	    $mobile_header_height = fluid_edge_options()->getOptionValue('mobile_header_height');
	    
        if(!empty($logo_height)) { ?>
            @media only screen and (max-width: 1024px) {
	            <?php echo fluid_edge_dynamic_css(
	                '.edgtf-mobile-header .edgtf-mobile-logo-wrapper a',
	                array('height' => fluid_edge_filter_px($logo_height).'px !important')
	            ); ?>
            }
        <?php }

        if(!empty($mobile_logo_height)) { ?>
            @media only screen and (max-width: 480px) {
	            <?php echo fluid_edge_dynamic_css(
	                '.edgtf-mobile-header .edgtf-mobile-logo-wrapper a',
	                array('height' => fluid_edge_filter_px($mobile_logo_height).'px !important')
	            ); ?>
            }
        <?php }

        if(!empty($mobile_header_height)) {
            echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-logo-wrapper a', array('max-height' => fluid_edge_filter_px($mobile_header_height).'px'));
        }
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_mobile_logo_styles');
}

if(!function_exists('fluid_edge_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function fluid_edge_mobile_icon_styles() {
        $mobile_icon_styles = array();
	    $mobile_text_styles = array();
	    
	    $icon_color       = fluid_edge_options()->getOptionValue('mobile_icon_color');
	    $icon_hover_color = fluid_edge_options()->getOptionValue('mobile_icon_hover_color');
	    
        if(!empty($icon_color)) {
            $mobile_icon_styles['background-color'] = $icon_color;
	        $mobile_text_styles['color']            = $icon_color;
        }

        echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-menu-opener a .edgtf-mo-lines .edgtf-mo-line', $mobile_icon_styles);
	    echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-menu-opener a .edgtf-mobile-menu-text', $mobile_text_styles);

        if(!empty($icon_hover_color)) {
            echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover .edgtf-mo-lines .edgtf-mo-line', array('background-color' => $icon_hover_color));

	        echo fluid_edge_dynamic_css('.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover .edgtf-mobile-menu-text', array('color' => $icon_hover_color));
        }
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_mobile_icon_styles');
}