<?php

if(!function_exists('fluid_edge_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function fluid_edge_header_top_bar_styles() {
	    $top_header_height = fluid_edge_options()->getOptionValue( 'top_bar_height' );
	    if ( ! empty( $top_header_height ) ) {
		    echo fluid_edge_dynamic_css( '.edgtf-top-bar', array( 'height' => fluid_edge_filter_px( $top_header_height ) . 'px' ) );
		    echo fluid_edge_dynamic_css( '.edgtf-top-bar .edgtf-logo-wrapper a', array( 'max-height' => fluid_edge_filter_px( $top_header_height ) . 'px' ) );
	    }

	    $background_color = fluid_edge_options()->getOptionValue( 'top_bar_background_color' );
	    $top_bar_styles   = array();
	    if ( $background_color !== '' ) {
		    $background_transparency = 1;
		    if ( fluid_edge_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
			    $background_transparency = fluid_edge_options()->getOptionValue( 'top_bar_background_transparency' );
		    }

		    $background_color                   = fluid_edge_rgba_color( $background_color, $background_transparency );
		    $top_bar_styles['background-color'] = $background_color;
	    }

	    echo fluid_edge_dynamic_css( '.edgtf-top-bar', $top_bar_styles );

    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_header_top_bar_styles');
}

if(!function_exists('fluid_edge_header_area_styles')) {
    /**
     * Generates styles for menu area
     */
	function fluid_edge_header_area_styles() {
		$header_styles = array();
		$background_color = fluid_edge_options()->getOptionValue('header_area_background_color');
		$background_transparency = fluid_edge_options()->getOptionValue('header_area_background_transparency');
		$border_color = fluid_edge_options()->getOptionValue('header_area_border_color');

		if(!empty($background_color)) {
			$header_background_color        = $background_color;
			$header_background_transparency = 1;

			if($background_transparency !== '') {
				$header_background_transparency = $background_transparency;
			}

			$header_styles['background-color'] = fluid_edge_rgba_color($header_background_color, $header_background_transparency);
		}

		if(empty($background_color) && $background_transparency !== '') {
			$header_background_color        = '#fff';
			$header_background_transparency = $background_transparency;

			$header_styles['background-color'] = fluid_edge_rgba_color($header_background_color, $header_background_transparency);
		}

		$header_selectors = array(
			'.edgtf-page-header'
		);

		echo fluid_edge_dynamic_css($header_selectors, $header_styles);

		$menu_styles = array();

		$menu_selectors = array(
			'.edgtf-page-header .edgtf-menu-area'
		);

		if(!empty($border_color)) {
			$menu_styles['border-bottom-color'] = $border_color;
		}

		echo fluid_edge_dynamic_css($menu_selectors, $menu_styles);

    }
    
    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_header_area_styles');
}

if(!function_exists('fluid_edge_header_standard_menu_area_styles')) {
	/**
	 * Generates styles for header standard menu
	 */
	function fluid_edge_header_standard_menu_area_styles() {
		$styles = array();

		$selectors = array(
			'.edgtf-header-standard .edgtf-page-header .edgtf-menu-area'
		);

		$header_height = fluid_edge_options()->getOptionValue('menu_area_height_header_standard');

		if(!empty($header_height)) {
			$max_height = intval(fluid_edge_filter_px($header_height)).'px';
			echo fluid_edge_dynamic_css('.edgtf-header-standard .edgtf-page-header .edgtf-logo-wrapper a', array('max-height' => $max_height));

			$styles['height'] = fluid_edge_filter_px($header_height).'px';
		}

		echo fluid_edge_dynamic_css($selectors, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_header_standard_menu_area_styles');
}

if(!function_exists('fluid_edge_header_full_screen_menu_area_styles')) {
	/**
	 * Generates styles for header full_screen menu
	 */
	function fluid_edge_header_full_screen_menu_area_styles() {
		$styles = array();

		$selectors = array(
			'.edgtf-header-full-screen .edgtf-page-header .edgtf-menu-area'
		);

		$header_height = fluid_edge_options()->getOptionValue('menu_area_height_header_full_screen');

		if(!empty($header_height)) {
			$max_height = intval(fluid_edge_filter_px($header_height)).'px';
			echo fluid_edge_dynamic_css('.edgtf-header-full-screen .edgtf-page-header .edgtf-logo-wrapper a', array('max-height' => $max_height));

			$styles['height'] = fluid_edge_filter_px($header_height).'px';

		}

		echo fluid_edge_dynamic_css($selectors, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_header_full_screen_menu_area_styles');
}

if(!function_exists('fluid_edge_vertical_menu_styles')) {
	function fluid_edge_vertical_menu_styles() {
		$styles = array();

		$selectors = array(
			'.edgtf-header-vertical .edgtf-vertical-area-background'
		);

		$background_color        = fluid_edge_options()->getOptionValue( 'header_area_background_color' );
		$background_transparency = fluid_edge_options()->getOptionValue( 'header_area_background_transparency' );
		$background_image        = fluid_edge_options()->getOptionValue( 'vertical_header_background_image' );

		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}

		if ( $background_transparency !== '' ) {
			$styles['opacity'] = $background_transparency;
		}

		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . $background_image . ')';
		}

		echo fluid_edge_dynamic_css( $selectors, $styles );
	}

	add_action( 'fluid_edge_action_style_dynamic', 'fluid_edge_vertical_menu_styles' );
}

if(!function_exists('fluid_edge_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function fluid_edge_sticky_header_styles() {
    	$background_color = fluid_edge_options()->getOptionValue('sticky_header_background_color');
	    $background_transparency = fluid_edge_options()->getOptionValue('sticky_header_transparency');
	    $border_color = fluid_edge_options()->getOptionValue('sticky_header_border_color');
	    $header_height = fluid_edge_options()->getOptionValue('sticky_header_height');
    	
        if(!empty($background_color)) {
            $header_background_color              = $background_color;
            $header_background_color_transparency = 1;
		
		    if($background_transparency !== '') {
                $header_background_color_transparency = $background_transparency;
            }

            echo fluid_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('background-color' => fluid_edge_rgba_color($header_background_color, $header_background_color_transparency)));
        }
	
	    if(!empty($border_color)) {
		    echo fluid_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('border-color' => $border_color));
        }
	
	    if(!empty($header_height)) {
            $height = fluid_edge_filter_px($header_height).'px';

            echo fluid_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header', array('height' => $height));
            echo fluid_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-logo-wrapper a', array('max-height' => $height));
        }
	
	    // sticky menu style
	
	    $menu_item_styles = fluid_edge_get_typography_styles('sticky');

        $menu_item_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li > a'
        );

        echo fluid_edge_dynamic_css($menu_item_selector, $menu_item_styles);
	    
	
	    $hover_color = fluid_edge_options()->getOptionValue('sticky_hovercolor');
	    
        $menu_item_hover_styles = array();
	    if(!empty($hover_color)) {
            $menu_item_hover_styles['color'] = $hover_color;
        }

        $menu_item_hover_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item > a'
        );

        echo fluid_edge_dynamic_css($menu_item_hover_selector, $menu_item_hover_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_sticky_header_styles');
}

if(!function_exists('fluid_edge_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function fluid_edge_fixed_header_styles() {
	    $background_color = fluid_edge_options()->getOptionValue('fixed_header_background_color');
	    $background_transparency = fluid_edge_options()->getOptionValue('fixed_header_transparency');
	    $border_color = fluid_edge_options()->getOptionValue('fixed_header_border_bottom_color');
    	
    	$fixed_area_styles = array();
	    if(!empty($background_color)) {
            $fixed_header_background_color        = $background_color;
            $fixed_header_background_color_transparency = 1;
		
		    if($background_transparency !== '') {
                $fixed_header_background_color_transparency = $background_transparency;
            }

            $fixed_area_styles['background-color'] = fluid_edge_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency) . '!important';
        }

        if(empty($background_color) && $background_transparency !== '') {
            $fixed_header_background_color        = '#fff';
            $fixed_header_background_color_transparency = $background_transparency;

            $fixed_area_styles['background-color'] = fluid_edge_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency) . '!important';
        }

        $selector = array(
            '.edgtf-page-header .edgtf-fixed-wrapper.fixed .edgtf-menu-area'
        );

        echo fluid_edge_dynamic_css($selector, $fixed_area_styles);

        $fixed_area_holder_styles = array();
	
	    if(!empty($border_color)) {
            $fixed_area_holder_styles['border-bottom-color'] = $border_color;
        }

        $selector_holder = array(
            '.edgtf-page-header .edgtf-fixed-wrapper.fixed'
        );

        echo fluid_edge_dynamic_css($selector_holder, $fixed_area_holder_styles);
	
	    // fixed menu style
	    
	    $menu_item_styles = fluid_edge_get_typography_styles('fixed');
	
	    $menu_item_selector = array(
		    '.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_selector, $menu_item_styles);
	
	    
	    $hover_color = fluid_edge_options()->getOptionValue('fixed_hovercolor');
	
	    $menu_item_hover_styles = array();
	    if(!empty($hover_color)) {
		    $menu_item_hover_styles['color'] = $hover_color;
	    }
	
	    $menu_item_hover_selector = array(
		    '.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li:hover > a',
		    '.edgtf-fixed-wrapper.fixed .edgtf-main-menu > ul > li.edgtf-active-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_hover_selector, $menu_item_hover_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_fixed_header_styles');
}

if(!function_exists('fluid_edge_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function fluid_edge_main_menu_styles() {
	
	    // main menu 1st level style
	    
	    $menu_item_styles = fluid_edge_get_typography_styles('menu');
	    $padding = fluid_edge_options()->getOptionValue('menu_padding_left_right');
	    $margin = fluid_edge_options()->getOptionValue('menu_margin_left_right');
	
	    if(!empty($padding)) {
		    $menu_item_styles['padding'] = '0 '.fluid_edge_filter_px($padding).'px';
	    }
	    if(!empty($margin)) {
		    $menu_item_styles['margin'] = '0 '.fluid_edge_filter_px($margin).'px';
	    }
	    
	    $menu_item_selector = array(
		    '.edgtf-main-menu > ul > li > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_selector, $menu_item_styles);
	    
	    $hover_color = fluid_edge_options()->getOptionValue('menu_hovercolor');
	
	    $menu_item_hover_styles = array();
	    if(!empty($hover_color)) {
		    $menu_item_hover_styles['color'] = $hover_color;
	    }
	
	    $menu_item_hover_selector = array(
		    '.edgtf-main-menu > ul > li > a:hover'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_hover_selector, $menu_item_hover_styles);
	    
	    $active_color = fluid_edge_options()->getOptionValue('menu_activecolor');
	
	    $menu_item_active_styles = array();
	    if(!empty($active_color)) {
		    $menu_item_active_styles['color'] = $active_color;
	    }
	
	    $menu_item_active_selector = array(
		    '.edgtf-main-menu > ul > li.edgtf-active-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_active_selector, $menu_item_active_styles);
	    
	    $light_hover_color = fluid_edge_options()->getOptionValue('menu_light_hovercolor');
	
	    $menu_item_light_hover_styles = array();
	    if(!empty($light_hover_color)) {
		    $menu_item_light_hover_styles['color'] = $light_hover_color;
	    }
	
	    $menu_item_light_hover_selector = array(
		    '.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header):not(.edgtf-fixed-wrapper) .edgtf-main-menu > ul > li > a:hover'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_light_hover_selector, $menu_item_light_hover_styles);
	    
	    $light_active_color = fluid_edge_options()->getOptionValue('menu_light_activecolor');
	
	    $menu_item_light_active_styles = array();
	    if(!empty($light_active_color)) {
		    $menu_item_light_active_styles['color'] = $light_active_color;
	    }
	
	    $menu_item_light_active_selector = array(
		    '.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header):not(.edgtf-fixed-wrapper) .edgtf-main-menu > ul > li.edgtf-active-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_light_active_selector, $menu_item_light_active_styles);
	    
	    $dark_hover_color = fluid_edge_options()->getOptionValue('menu_dark_hovercolor');
	
	    $menu_item_dark_hover_styles = array();
	    if(!empty($dark_hover_color)) {
		    $menu_item_dark_hover_styles['color'] = $dark_hover_color;
	    }
	
	    $menu_item_dark_hover_selector = array(
		    '.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header):not(.edgtf-fixed-wrapper) .edgtf-main-menu > ul > li > a:hover'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_dark_hover_selector, $menu_item_dark_hover_styles);
	    
	    $dark_active_color = fluid_edge_options()->getOptionValue('menu_dark_activecolor');
	
	    $menu_item_dark_active_styles = array();
	    if(!empty($dark_active_color)) {
		    $menu_item_dark_active_styles['color'] = $dark_active_color;
	    }
	
	    $menu_item_dark_active_selector = array(
		    '.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header):not(.edgtf-fixed-wrapper) .edgtf-main-menu > ul > li.edgtf-active-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($menu_item_dark_active_selector, $menu_item_dark_active_styles);
	
	    // main menu 2nd level style
	    
	    $dropdown_menu_item_styles = fluid_edge_get_typography_styles('dropdown');
	
	    $dropdown_menu_item_selector = array(
		    '.edgtf-drop-down .second .inner > ul > li > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_menu_item_selector, $dropdown_menu_item_styles);
	    
	    $dropdown_hover_color = fluid_edge_options()->getOptionValue('dropdown_hovercolor');
	
	    $dropdown_menu_item_hover_styles = array();
	    if(!empty($dropdown_hover_color)) {
		    $dropdown_menu_item_hover_styles['color'] = $dropdown_hover_color . ' !important';
	    }
	
	    $dropdown_menu_item_hover_selector = array(
		    '.edgtf-drop-down .second .inner > ul > li > a:hover',
            '.edgtf-drop-down .second .inner > ul > li.current-menu-ancestor > a',
            '.edgtf-drop-down .second .inner > ul > li.current-menu-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_menu_item_hover_selector, $dropdown_menu_item_hover_styles);
	
	    // main menu 2nd level wide style
	    
	    $dropdown_wide_menu_item_styles = fluid_edge_get_typography_styles('dropdown_wide');
	
	    $dropdown_wide_menu_item_selector = array(
		    '.edgtf-drop-down .wide .second .inner > ul > li > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_wide_menu_item_selector, $dropdown_wide_menu_item_styles);
	
	    $dropdown_wide_hover_color = fluid_edge_options()->getOptionValue('dropdown_wide_hovercolor');
	
	    $dropdown_wide_menu_item_hover_styles = array();
	    if(!empty($dropdown_wide_hover_color)) {
		    $dropdown_wide_menu_item_hover_styles['color'] = $dropdown_wide_hover_color . ' !important';
	    }
	
	    $dropdown_wide_menu_item_hover_selector = array(
		    '.edgtf-drop-down .wide .second .inner > ul > li > a:hover',
		    '.edgtf-drop-down .wide .second .inner > ul > li.current-menu-ancestor > a',
		    '.edgtf-drop-down .wide .second .inner > ul > li.current-menu-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_wide_menu_item_hover_selector, $dropdown_wide_menu_item_hover_styles);
	
	    // main menu 3rd level style
	    
	    $dropdown_menu_item_styles_thirdlvl = fluid_edge_get_typography_styles('dropdown', '_thirdlvl');
	
	    $dropdown_menu_item_selector_thirdlvl = array(
		    '.edgtf-drop-down .second .inner ul li ul li a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_menu_item_selector_thirdlvl, $dropdown_menu_item_styles_thirdlvl);
	
	    $dropdown_hover_color_thirdlvl = fluid_edge_options()->getOptionValue('dropdown_hovercolor_thirdlvl');
	
	    $dropdown_menu_item_hover_styles_thirdlvl = array();
	    if(!empty($dropdown_hover_color_thirdlvl)) {
		    $dropdown_menu_item_hover_styles_thirdlvl['color'] = $dropdown_hover_color_thirdlvl . ' !important';
	    }
	
	    $dropdown_menu_item_hover_selector_thirdlvl = array(
		    '.edgtf-drop-down .second .inner ul li ul li a:hover',
            '.edgtf-drop-down .second .inner ul li ul li.current-menu-ancestor > a',
            '.edgtf-drop-down .second .inner ul li ul li.current-menu-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_menu_item_hover_selector_thirdlvl, $dropdown_menu_item_hover_styles_thirdlvl);
	
	    // main menu 3rd level wide style
	    
	    $dropdown_wide_menu_item_styles_thirdlvl = fluid_edge_get_typography_styles('dropdown_wide', '_thirdlvl');
	
	    $dropdown_wide_menu_item_selector_thirdlvl = array(
		    '.edgtf-drop-down .wide .second .inner ul li ul li a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_wide_menu_item_selector_thirdlvl, $dropdown_wide_menu_item_styles_thirdlvl);
	    
	    $dropdown_wide_hover_color_thirdlvl = fluid_edge_options()->getOptionValue('dropdown_wide_hovercolor_thirdlvl');
	
	    $dropdown_wide_menu_item_hover_styles_thirdlvl = array();
	    if(!empty($dropdown_wide_hover_color_thirdlvl)) {
		    $dropdown_wide_menu_item_hover_styles_thirdlvl['color'] = $dropdown_wide_hover_color_thirdlvl . ' !important';
	    }
	
	    $dropdown_wide_menu_item_hover_selector_thirdlvl = array(
		    '.edgtf-drop-down .wide .second .inner ul li ul li a:hover',
		    '.edgtf-drop-down .wide .second .inner ul li ul li.current-menu-ancestor > a',
		    '.edgtf-drop-down .wide .second .inner ul li ul li.current-menu-item > a'
	    );
	
	    echo fluid_edge_dynamic_css($dropdown_wide_menu_item_hover_selector_thirdlvl, $dropdown_wide_menu_item_hover_styles_thirdlvl);
	
	    // main menu dropdown holder style
	    
		$dropdown_top_position = fluid_edge_options()->getOptionValue('dropdown_top_position');
		
		$dropdown_styles = array();
		if($dropdown_top_position !== '') {
			$dropdown_styles['top'] = $dropdown_top_position.'%';
		}
		
		$dropdown_selector = array(
			'.edgtf-page-header .edgtf-drop-down .second'
		);
		
		echo fluid_edge_dynamic_css($dropdown_selector, $dropdown_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_main_menu_styles');
}

if(!function_exists('fluid_edge_vertical_main_menu_styles')) {
	/**
	 * Generates styles for vertical main main menu
	 */
	function fluid_edge_vertical_main_menu_styles() {
		$menu_holder_styles = array();

		if(fluid_edge_options()->getOptionValue('vertical_menu_top_margin') !== '') {
			$menu_holder_styles['margin-top'] = fluid_edge_filter_px(fluid_edge_options()->getOptionValue('vertical_menu_top_margin')).'px';
		}
		if(fluid_edge_options()->getOptionValue('vertical_menu_bottom_margin') !== '') {
			$menu_holder_styles['margin-bottom'] = fluid_edge_filter_px(fluid_edge_options()->getOptionValue('vertical_menu_bottom_margin')).'px';
		}

		$menu_holder_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu'
		);

		echo fluid_edge_dynamic_css($menu_holder_selector, $menu_holder_styles);
		
		// vertical menu 1st level style
		
		$first_level_styles = fluid_edge_get_typography_styles('vertical_menu_1st');
		
		$first_level_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a'
		);
		
		echo fluid_edge_dynamic_css($first_level_selector, $first_level_styles);
		
		$first_level_hover_styles = array();
		
		if(fluid_edge_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
			$first_level_hover_styles['color'] = fluid_edge_options()->getOptionValue('vertical_menu_1st_hover_color');
		}
		
		$first_level_hover_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a:hover',
			'.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a.edgtf-active-item',
			'.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a.current-menu-ancestor'
		);

		echo fluid_edge_dynamic_css($first_level_hover_selector, $first_level_hover_styles);
		
		// vertical menu 2nd level style
		
		$second_level_styles = fluid_edge_get_typography_styles('vertical_menu_2nd');
		
		$second_level_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner > ul > li > a'
		);
		
		echo fluid_edge_dynamic_css($second_level_selector, $second_level_styles);
		
		$second_level_hover_styles = array();

		if(fluid_edge_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
			$second_level_hover_styles['color'] = fluid_edge_options()->getOptionValue('vertical_menu_2nd_hover_color');
		}
		
		$second_level_hover_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner > ul > li > a:hover',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner > ul > li.current_page_item > a',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner > ul > li.current-menu-item > a',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner > ul > li.current-menu-ancestor > a'
		);

		echo fluid_edge_dynamic_css($second_level_hover_selector, $second_level_hover_styles);
		
		// vertical menu 3rd level style
		
		$third_level_styles = fluid_edge_get_typography_styles('vertical_menu_3rd');
		
		$third_level_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner ul li ul li a'
		);
		
		echo fluid_edge_dynamic_css($third_level_selector, $third_level_styles);
		
		
		$third_level_hover_styles = array();

		if(fluid_edge_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
			$third_level_hover_styles['color'] = fluid_edge_options()->getOptionValue('vertical_menu_3rd_hover_color');
		}
		
		$third_level_hover_selector = array(
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner ul li ul li a:hover',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner ul li ul li a.edgtf-active-item',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner ul li ul li.current_page_item a',
			'.edgtf-header-vertical .edgtf-vertical-menu .second .inner ul li ul li.current-menu-item a'
		);

		echo fluid_edge_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_vertical_main_menu_styles');
}