<?php
if(!function_exists('fluid_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function fluid_edge_design_styles() {
	    $font_family = fluid_edge_options()->getOptionValue('google_fonts');
	    if (!empty($font_family) && fluid_edge_is_font_option_valid($font_family)){
		    $font_family_selector = array(
	    		'body',
			    '.edgtf-main-menu ul li a .edgtf-menu-featured-icon.edgtf-new-text'
		    );
		    echo fluid_edge_dynamic_css($font_family_selector, array('font-family' => fluid_edge_get_font_option_val($font_family)));
		}
		
		$first_main_color = fluid_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'a:hover',
                'p a:hover',
	            '.edgtf-comment-holder .edgtf-comment-text .replay',
				'.edgtf-comment-holder .edgtf-comment-text .comment-reply-link',
				'.edgtf-comment-holder .edgtf-comment-text .comment-edit-link',
				'.edgtf-comment-holder .edgtf-comment-text #cancel-comment-reply-link',
				'.edgtf-owl-slider .owl-nav .owl-prev:hover .edgtf-prev-icon',
				'.edgtf-owl-slider .owl-nav .owl-prev:hover .edgtf-next-icon',
				'.edgtf-owl-slider .owl-nav .owl-next:hover .edgtf-prev-icon',
				'.edgtf-owl-slider .owl-nav .owl-next:hover .edgtf-next-icon',
				'.edgtf-main-menu ul li a:hover',
				'.edgtf-drop-down .second .inner ul li.current-menu-ancestor > a',
				'.edgtf-drop-down .second .inner ul li.current-menu-item > a',
				'.edgtf-drop-down .wide .second .inner > ul > li.current-menu-ancestor > a',
				'.edgtf-drop-down .wide .second .inner > ul > li.current-menu-item > a',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li.edgtf-active-item > a',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li.current_page_item > a',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-item > a',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-ancestor > a',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav ul li h5:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor > a',
				'.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item > a',
				'.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li.edgtf-active-item > a',
				'.edgtf-side-menu-button-opener.opened',
				'.edgtf-side-menu-button-opener:hover',
				'.edgtf-side-menu a.edgtf-close-side-menu:hover',
				'.edgtf-side-menu a:hover',
				'nav.edgtf-fullscreen-menu ul li a:hover',
				'nav.edgtf-fullscreen-menu ul li ul li.current-menu-ancestor > a',
				'nav.edgtf-fullscreen-menu ul li ul li.current-menu-item > a',
				'nav.edgtf-fullscreen-menu > ul > li.edgtf-active-item > a',
				'.edgtf-search-opener:hover',
				'.edgtf-search-page-holder .edgtf-search-page-form .edgtf-form-holder .edgtf-search-submit:hover',
				'.edgtf-search-page-holder article.sticky .edgtf-post-title-area h3 a',
				'.edgtf-search-cover .edgtf-search-close a:hover',
				'.edgtf-blog-holder article.sticky .edgtf-post-title a',
				'.edgtf-blog-holder.edgtf-blog-masonry article .edgtf-post-info-top > div a:hover',
				'.edgtf-bl-standard-pagination ul li.edgtf-bl-pag-active a',
				'.edgtf-blog-single-navigation .edgtf-blog-single-prev-holder .edgtf-blog-single-prev:hover',
				'.edgtf-blog-single-navigation .edgtf-blog-single-prev-holder .edgtf-blog-single-next:hover',
				'.edgtf-blog-single-navigation .edgtf-blog-single-next-holder .edgtf-blog-single-prev:hover',
				'.edgtf-blog-single-navigation .edgtf-blog-single-next-holder .edgtf-blog-single-next:hover',
				'.edgtf-blog-list-holder .edgtf-bli-content .edgtf-btn',
				'.edgtf-blog-list-holder .edgtf-bli-content .edgtf-post-info-date > a',
				'.edgtf-blog-slider-holder .edgtf-blog-slider-item .edgtf-item-info-section > div a:hover',
				'.edgtf-blog-holder.edgtf-blog-single.edgtf-blog-single-standard article .edgtf-post-info-bottom .edgtf-blog-share .edgtf-list li a:hover',
				'aside.edgtf-sidebar .widget.widget_pages ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_archive ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_categories ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_meta ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_recent_comments ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_recent_entries ul li a:hover',
				'aside.edgtf-sidebar .widget.widget_nav_menu ul li a:hover',
				'.wpb_widgetised_column .widget.widget_pages ul li a:hover',
				'.wpb_widgetised_column .widget.widget_archive ul li a:hover',
				'.wpb_widgetised_column .widget.widget_categories ul li a:hover',
				'.wpb_widgetised_column .widget.widget_meta ul li a:hover',
				'.wpb_widgetised_column .widget.widget_recent_comments ul li a:hover',
				'.wpb_widgetised_column .widget.widget_recent_entries ul li a:hover',
				'.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
				'.edgtf-side-menu .widget.widget_pages ul li a:hover',
				'.edgtf-side-menu .widget.widget_archive ul li a:hover',
				'.edgtf-side-menu .widget.widget_categories ul li a:hover',
				'.edgtf-side-menu .widget.widget_meta ul li a:hover',
				'.edgtf-side-menu .widget.widget_recent_comments ul li a:hover',
				'.edgtf-side-menu .widget.widget_recent_entries ul li a:hover',
				'.edgtf-side-menu .widget.widget_nav_menu ul li a:hover',
				'.edgtf-top-bar .widget a:hover',
				'.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-tweet-text a:hover',
				'.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-twitter-icon i',
				'.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text a',
				'.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text span',
				'.edgtf-side-menu .widget.widget_icl_lang_sel_widget ul li a:not([class*="lang_sel"]):hover',
				'.edgtf-top-bar .widget_icl_lang_sel_widget #lang_sel ul li a:hover',
				'.edgtf-top-bar .widget_icl_lang_sel_widget #lang_sel_click ul li a:hover',
				'.edgtf-top-bar .widget_icl_lang_sel_widget .lang_sel_list_vertical ul li a:hover',
				'.edgtf-btn.edgtf-btn-outline',
				'.edgtf-image-slider-wrapper .edgtf-image-slider .owl-nav .owl-prev:hover .edgtf-prev-icon',
				'.edgtf-image-slider-wrapper .edgtf-image-slider .owl-nav .owl-prev:hover .edgtf-next-icon',
				'.edgtf-image-slider-wrapper .edgtf-image-slider .owl-nav .owl-next:hover .edgtf-prev-icon',
				'.edgtf-image-slider-wrapper .edgtf-image-slider .owl-nav .owl-next:hover .edgtf-next-icon',
				'.edgtf-social-share-holder.edgtf-dropdown .edgtf-social-share-dropdown-opener:hover',
				'.edgtf-pl-filter-holder ul li.edgtf-pl-current span',
				'.edgtf-pl-filter-holder ul li:hover span',
				'.edgtf-pl-standard-pagination ul li.edgtf-pl-pag-active a',
				'.edgtf-portfolio-slider-holder .owl-nav .owl-prev:hover .edgtf-prev-icon',
				'.edgtf-portfolio-slider-holder .owl-nav .owl-prev:hover .edgtf-next-icon',
				'.edgtf-portfolio-slider-holder .owl-nav .owl-next:hover .edgtf-prev-icon',
				'.edgtf-portfolio-slider-holder .owl-nav .owl-next:hover .edgtf-next-icon',
				'.edgtf-portfolio-list-holder.edgtf-pl-gallery-overlay article .edgtf-pli-text .edgtf-pli-category-holder a:hover',
				'.edgtf-portfolio-single-holder .edgtf-ps-info-holder .edgtf-ps-info-item a:hover',
	            '.edgtf-main-menu ul li a .edgtf-menu-featured-icon.edgtf-new-text',
	            '.edgtf-team .edgtf-team-info-tc .edgtf-icon-shortcode:hover'
            );

            $woo_color_selector = array();
            if(fluid_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
					'.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
					'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
					'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
	                '.edgtf-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
	                '.edgtf-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
	                '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
	                '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
	                '.widget.woocommerce.widget_layered_nav_filters a:hover',
	                '.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .remove:hover',
	                '.widget.woocommerce.widget_products ul li a:hover',
	                '.widget.woocommerce.widget_product_categories ul li a:hover',
	                '.wpb_widgetised_column .widget ul li a:hover',
	                '.select2-container .select2-choice:hover',
	                '.select2-container .select2-choice:hover .select2-arrow',
	                '.select2-drop .select2-results .select2-highlighted',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.edgtf-product-info .edgtf-pi-rating',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-rating',
	                '.edgtf-plc-holder .owl-nav .owl-prev:hover .edgtf-prev-icon',
	                '.edgtf-plc-holder .owl-nav .owl-prev:hover .edgtf-next-icon',
					'.edgtf-plc-holder .owl-nav .owl-next:hover .edgtf-prev-icon',
					'.edgtf-plc-holder .owl-nav .owl-next:hover .edgtf-next-icon',
	                '.edgtf-pls-holder .edgtf-pls-text .edgtf-pls-rating',
	                '.edgtf-pl-holder .edgtf-pli .edgtf-pli-rating'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.edgtf-fullscreen-menu-opener:hover',
		        '.edgtf-fullscreen-menu-opener.edgtf-fm-opened',
		        '.edgtf-blog-slider-holder .edgtf-blog-slider-item .edgtf-section-button-holder a:hover',
		        '.edgtf-btn.edgtf-btn-simple'
	        );

            $background_color_selector = array(
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1', 
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes > div',
                '.edgtf-st-loader .wave > div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .container1 > div',
                '.edgtf-st-loader .five_rotating_circles .container2 > div',
                '.edgtf-st-loader .five_rotating_circles .container3 > div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .fussion .ball-1',
                '.edgtf-st-loader .fussion .ball-2',
                '.edgtf-st-loader .fussion .ball-3',
                '.edgtf-st-loader .fussion .ball-4',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment',
				'.post-password-form input[type=\'submit\']',
                'input.wpcf7-form-control.wpcf7-submit',
                '#edgtf-back-to-top > span',
	            '.vc_row .edgtf-row-animated-bg',
	            '.edgtf-main-menu > ul > li > a > span.item_outer .item_text:after',
	            '.edgtf-blog-holder article.format-quote .edgtf-post-text',
	            '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls > .mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls > a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.edgtf-blog-holder.edgtf-blog-standard article.format-quote .edgtf-post-text',
	            '.edgtf-blog-single-navigation .edgtf-blog-single-prev-holder .edgtf-blog-single-nav-thumb:after',
				'.edgtf-blog-single-navigation .edgtf-blog-single-next-holder .edgtf-blog-single-nav-thumb:after',
	            '.widget.widget_search button:hover',
	            '.widget.widget_tag_cloud a:hover',
	            '.edgtf-side-menu .widget.widget_search button',
	            '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-title-holder.ui-state-active',
				'.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-title-holder.ui-state-hover',
	            '.edgtf-accordion-holder.edgtf-ac-standard .edgtf-title-holder.ui-state-active .edgtf-accordion-mark',
				'.edgtf-accordion-holder.edgtf-ac-standard .edgtf-title-holder.ui-state-hover .edgtf-accordion-mark',
	            '.edgtf-btn.edgtf-btn-solid',
	            '.edgtf-icon-shortcode.edgtf-circle',
				'.edgtf-icon-shortcode.edgtf-square',
				'.edgtf-icon-shortcode.edgtf-dropcaps.edgtf-circle',
	            '.edgtf-progress-bar .edgtf-pb-content-holder .edgtf-pb-content',
	            '.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-active a',
				'.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-hover a',
	            '.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-active a',
				'.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-hover a',
	            '.edgtf-image-gallery .edgtf-ig-grid .edgtf-ig-image .edgtf-ig-image-mark'
            );

            $woo_background_color_selector = array();
            if(fluid_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .edgtf-content a.button',
					'.woocommerce-page .edgtf-content a.added_to_cart',
					'.woocommerce-page .edgtf-content input[type="submit"]',
					'.woocommerce-page .edgtf-content button[type="submit"]',
					'div.woocommerce a.button',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce input[type="submit"]',
					'div.woocommerce button[type="submit"]',
	                '.woocommerce-page .edgtf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                '.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-view-cart',
	                'div.woocommerce > .single-product .woocommerce-tabs ul.tabs > li.active a:after',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover',
	                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover',
	                '.edgtf-woo-pl-info-below-image ul.products > .product .edgtf-pl-text-outer .edgtf-pl-text-inner .add_to_cart_button:hover',
	                '.edgtf-woo-pl-info-below-image ul.products > .product .edgtf-pl-text-outer .edgtf-pl-text-inner .button:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .button:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .added_to_cart:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .button:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .added_to_cart:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .button:hover',
	                '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .button:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .added_to_cart:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .button:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .added_to_cart:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

	        $background_color_important_selector = array(
		        '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-bg):hover',
		        '.edgtf-price-table.edgtf-pt-button-dark .edgtf-pt-inner .edgtf-btn.edgtf-btn-solid:hover',
		        '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range'
	        );

            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '#edgtf-back-to-top > span',
	            '.edgtf-btn.edgtf-btn-outline',
	            '.edgtf-shopping-cart-dropdown'
            );

	        $border_color_important_selector = array(
		        '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-border-hover):hover',
		        '.edgtf-price-table.edgtf-pt-button-dark .edgtf-pt-inner .edgtf-btn.edgtf-btn-solid:hover'
	        );

            echo fluid_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo fluid_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo fluid_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo fluid_edge_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo fluid_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo fluid_edge_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }

        $page_background_color = fluid_edge_options()->getOptionValue('page_background_color');
		if (!empty($page_background_color)) {
			$background_color_selector = array(
				'.edgtf-wrapper-inner',
				'.edgtf-content'
			);
			echo fluid_edge_dynamic_css($background_color_selector, array('background-color' => $page_background_color));
		}

		$selection_color = fluid_edge_options()->getOptionValue('selection_color');
		if (!empty($selection_color)) {
			echo fluid_edge_dynamic_css('::selection', array('background' => $selection_color));
			echo fluid_edge_dynamic_css('::-moz-selection', array('background' => $selection_color));
		}

		$boxed_background_style = array();
	    $boxed_page_background_color = fluid_edge_options()->getOptionValue('page_background_color_in_box');
		if (!empty($boxed_page_background_color)) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
	
	    $boxed_page_background_image = fluid_edge_options()->getOptionValue('boxed_background_image');
		if (!empty($boxed_page_background_image)) {
			$boxed_background_style['background-image'] = 'url('.esc_url($boxed_page_background_image).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}
	
	    $boxed_page_background_pattern_image = fluid_edge_options()->getOptionValue('boxed_pattern_background_image');
		if (!empty($boxed_page_background_pattern_image)) {
			$boxed_background_style['background-image'] = 'url('.esc_url($boxed_page_background_pattern_image).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}
	
	    $boxed_page_background_attachment = fluid_edge_options()->getOptionValue('boxed_background_image_attachment');
		if (!empty($boxed_page_background_attachment)) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}

		echo fluid_edge_dynamic_css('.edgtf-boxed .edgtf-wrapper', $boxed_background_style);

        $paspartu_style = array();
	    $paspartu_color = fluid_edge_options()->getOptionValue('paspartu_color');
        if (!empty($paspartu_color)) {
            $paspartu_style['background-color'] = $paspartu_color;
        }
	
	    $paspartu_width = fluid_edge_options()->getOptionValue('paspartu_width');
        if ($paspartu_width !== '') {
            $paspartu_style['padding'] = $paspartu_width.'%';
        }

        echo fluid_edge_dynamic_css('.edgtf-paspartu-enabled .edgtf-wrapper', $paspartu_style);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_design_styles');
}

if(!function_exists('fluid_edge_content_styles')) {
    /**
     * Generates content custom styles
     */
    function fluid_edge_content_styles() {
        $content_style = array();
	    
	    $padding_top = fluid_edge_options()->getOptionValue('content_top_padding');
	    if ($padding_top !== '') {
            $content_style['padding-top'] = fluid_edge_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
        );

        echo fluid_edge_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
	    
	    $padding_top_in_grid = fluid_edge_options()->getOptionValue('content_top_padding_in_grid');
	    if ($padding_top_in_grid !== '') {
            $content_style_in_grid['padding-top'] = fluid_edge_filter_px($padding_top_in_grid).'px';
        }

        $content_selector_in_grid = array(
            '.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
        );

        echo fluid_edge_dynamic_css($content_selector_in_grid, $content_style_in_grid);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_content_styles');
}

if (!function_exists('fluid_edge_h1_styles')) {

    function fluid_edge_h1_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h1_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h1_margin_bottom');
	    
	    $item_styles = fluid_edge_get_typography_styles('h1');
	    
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	    
	    $item_selector = array(
		    'h1'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h1_styles');
}

if (!function_exists('fluid_edge_h2_styles')) {

    function fluid_edge_h2_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h2_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h2_margin_bottom');
	
	    $item_styles = fluid_edge_get_typography_styles('h2');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h2'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h2_styles');
}

if (!function_exists('fluid_edge_h3_styles')) {

    function fluid_edge_h3_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h3_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h3_margin_bottom');
	
	    $item_styles = fluid_edge_get_typography_styles('h3');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h3'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h3_styles');
}

if (!function_exists('fluid_edge_h4_styles')) {

    function fluid_edge_h4_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h4_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h4_margin_bottom');
	
	    $item_styles = fluid_edge_get_typography_styles('h4');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h4',
		    '.edgtf-testimonials-holder.edgtf-testimonials-standard .edgtf-testimonial-text',
		    '.edgtf-testimonials-holder .edgtf-testimonial-position'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h4_styles');
}

if (!function_exists('fluid_edge_h5_styles')) {

    function fluid_edge_h5_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h5_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h5_margin_bottom');
	
	    $item_styles = fluid_edge_get_typography_styles('h5');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h5'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h5_styles');
}

if (!function_exists('fluid_edge_h6_styles')) {

    function fluid_edge_h6_styles() {
	    $margin_top = fluid_edge_options()->getOptionValue('h6_margin_top');
	    $margin_bottom = fluid_edge_options()->getOptionValue('h6_margin_bottom');
	
	    $item_styles = fluid_edge_get_typography_styles('h6');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = fluid_edge_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h6'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_h6_styles');
}

if (!function_exists('fluid_edge_text_styles')) {

    function fluid_edge_text_styles() {
	    $item_styles = fluid_edge_get_typography_styles('text');
	
	    $item_selector = array(
		    'p'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_text_styles');
}

if (!function_exists('fluid_edge_link_styles')) {

    function fluid_edge_link_styles() {
        $link_styles = array();

        if(fluid_edge_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = fluid_edge_options()->getOptionValue('link_color');
        }
        if(fluid_edge_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = fluid_edge_options()->getOptionValue('link_fontstyle');
        }
        if(fluid_edge_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = fluid_edge_options()->getOptionValue('link_fontweight');
        }
        if(fluid_edge_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = fluid_edge_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo fluid_edge_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_link_styles');
}

if (!function_exists('fluid_edge_link_hover_styles')) {

    function fluid_edge_link_hover_styles() {
        $link_hover_styles = array();

        if(fluid_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = fluid_edge_options()->getOptionValue('link_hovercolor');
        }
        if(fluid_edge_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = fluid_edge_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo fluid_edge_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(fluid_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = fluid_edge_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo fluid_edge_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_link_hover_styles');
}

if (!function_exists('fluid_edge_smooth_page_transition_styles')) {

    function fluid_edge_smooth_page_transition_styles($style) {
	    $id = fluid_edge_get_page_id();
	    $loader_style = array();
	    $current_style = '';

        if(fluid_edge_get_meta_field_intersect('smooth_pt_bgnd_color', $id) !== '') {
            $loader_style['background-color'] = fluid_edge_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.edgtf-smooth-transition-loader');

        if (!empty($loader_style)) {
	        $current_style .= fluid_edge_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(fluid_edge_get_meta_field_intersect('smooth_pt_bgnd_color', $id) !== '') {
            $spinner_style['background-color'] = fluid_edge_get_meta_field_intersect('smooth_pt_bgnd_color', $id);
        }

        $spinner_selectors = array(
            '.edgtf-st-loader .edgtf-rotate-circles > div', 
            '.edgtf-st-loader .pulse', 
            '.edgtf-st-loader .double_pulse .double-bounce1', 
            '.edgtf-st-loader .double_pulse .double-bounce2', 
            '.edgtf-st-loader .cube', 
            '.edgtf-st-loader .rotating_cubes .cube1', 
            '.edgtf-st-loader .rotating_cubes .cube2', 
            '.edgtf-st-loader .stripes > div', 
            '.edgtf-st-loader .wave > div', 
            '.edgtf-st-loader .two_rotating_circles .dot1', 
            '.edgtf-st-loader .two_rotating_circles .dot2', 
            '.edgtf-st-loader .five_rotating_circles .container1 > div', 
            '.edgtf-st-loader .five_rotating_circles .container2 > div', 
            '.edgtf-st-loader .five_rotating_circles .container3 > div', 
            '.edgtf-st-loader .atom .ball-1:before', 
            '.edgtf-st-loader .atom .ball-2:before', 
            '.edgtf-st-loader .atom .ball-3:before', 
            '.edgtf-st-loader .atom .ball-4:before', 
            '.edgtf-st-loader .clock .ball:before', 
            '.edgtf-st-loader .mitosis .ball', 
            '.edgtf-st-loader .lines .line1', 
            '.edgtf-st-loader .lines .line2', 
            '.edgtf-st-loader .lines .line3', 
            '.edgtf-st-loader .lines .line4', 
            '.edgtf-st-loader .fussion .ball', 
            '.edgtf-st-loader .fussion .ball-1', 
            '.edgtf-st-loader .fussion .ball-2', 
            '.edgtf-st-loader .fussion .ball-3', 
            '.edgtf-st-loader .fussion .ball-4', 
            '.edgtf-st-loader .wave_circles .ball', 
            '.edgtf-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
	        $current_style .= fluid_edge_dynamic_css($spinner_selectors, $spinner_style);
        }

	    $current_style = $current_style . $style;

	    return $current_style;
    }

	add_filter('fluid_edge_filter_add_page_custom_style', 'fluid_edge_smooth_page_transition_styles');
}