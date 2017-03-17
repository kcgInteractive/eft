<?php

if(!function_exists('fluid_edge_contact_form7_text_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function fluid_edge_contact_form7_text_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = fluid_edge_get_typography_styles('cf7_style_1_text');

		$placeholder_color = fluid_edge_options()->getOptionValue('cf7_style_1_text_color');
		if(!empty($placeholder_color)) {
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_1 input.wpcf7-text::-webkit-input-placeholder',
					'.cf7_custom_style_1 textarea.wpcf7-textarea::-webkit-input-placeholder'
				),
				array('color' => $placeholder_color)
			);
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_1_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_1_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		$border_width = fluid_edge_options()->getOptionValue('cf7_style_1_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}

		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_1_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}

		$padding_top = fluid_edge_options()->getOptionValue('cf7_style_1_padding_top');
		if($padding_top !== ''){
			$styles['padding-top'] = fluid_edge_filter_px($padding_top) . 'px';
		}

		$padding_right = fluid_edge_options()->getOptionValue('cf7_style_1_padding_right');
		if($padding_right !== ''){
			$styles['padding-right'] = fluid_edge_filter_px($padding_right) . 'px';
		}

		$padding_bottom = fluid_edge_options()->getOptionValue('cf7_style_1_padding_bottom');
		if($padding_bottom !== ''){
			$styles['padding-bottom'] = fluid_edge_filter_px($padding_bottom) . 'px';
		}

		$padding_left = fluid_edge_options()->getOptionValue('cf7_style_1_padding_left');
		if($padding_left !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left) . 'px';
		}

		$margin_top = fluid_edge_options()->getOptionValue('cf7_style_1_margin_top');
		if($margin_top !== ''){
			$styles['margin-top'] = fluid_edge_filter_px($margin_top) . 'px';
		}

		$margin_bottom = fluid_edge_options()->getOptionValue('cf7_style_1_margin_bottom');
		if($margin_bottom !== ''){
			$styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom) . 'px';
		}

		if(fluid_edge_options()->getOptionValue('cf7_style_1_textarea_height')) {
			$textarea_height = fluid_edge_options()->getOptionValue('cf7_style_1_textarea_height');
			echo fluid_edge_dynamic_css(
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			array('height' => fluid_edge_filter_px($textarea_height).'px')
			);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_text_styles_1');
}

if(!function_exists('fluid_edge_contact_form7_focus_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function fluid_edge_contact_form7_focus_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles = array();

		$color = fluid_edge_options()->getOptionValue('cf7_style_1_focus_text_color');
		if($color !== ''){
			$styles['color'] = $color;
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus::-webkit-input-placeholder',
					'.cf7_custom_style_1 textarea:focus::-webkit-input-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus:-moz-placeholder',
					'.cf7_custom_style_1 textarea:focus:-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus::-moz-placeholder',
					'.cf7_custom_style_1 textarea:focus::-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus:-ms-input-placeholder',
					'.cf7_custom_style_1 textarea:focus:-ms-input-placeholder'
				),
				array('color' => $color)
			);
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_1_focus_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_focus_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_focus_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_1_focus_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_focus_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_focus_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_focus_styles_1');
}

if(!function_exists('fluid_edge_contact_form7_label_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function fluid_edge_contact_form7_label_styles_1() {
		$item_styles = fluid_edge_get_typography_styles('cf7_style_1_label');
		
		$item_selector = array(
			'.cf7_custom_style_1 p'
		);

		echo fluid_edge_dynamic_css($item_selector, $item_styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_label_styles_1');
}

if(!function_exists('fluid_edge_contact_form7_button_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit'
		);

		$styles = fluid_edge_get_typography_styles('cf7_style_1_button');
		
		$height = fluid_edge_options()->getOptionValue('cf7_style_1_button_height');
		if($height !== ''){
			$styles['padding-top'] = '0';
			$styles['padding-bottom'] = '0';
			$styles['height'] = fluid_edge_filter_px($height) . 'px';
			$styles['line-height'] = fluid_edge_filter_px($height) . 'px';
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_1_button_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_button_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_button_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_1_button_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_button_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_button_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		$border_width = fluid_edge_options()->getOptionValue('cf7_style_1_button_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}

		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_1_button_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}

		$padding_left_right = fluid_edge_options()->getOptionValue('cf7_style_1_button_padding');
		if($padding_left_right !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left_right) . 'px';
			$styles['padding-right'] = fluid_edge_filter_px($padding_left_right) . 'px';
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_styles_1');
}

if(!function_exists('fluid_edge_contact_form7_button_hover_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_hover_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles = array();

		$color = fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_color');
		if($color !== ''){
			$styles['color'] = $color;
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_bckg_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_1_button_hover_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_hover_styles_1');
}

if(!function_exists('fluid_edge_contact_form7_text_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function fluid_edge_contact_form7_text_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = fluid_edge_get_typography_styles('cf7_style_2_text');

		$placeholder_color = fluid_edge_options()->getOptionValue('cf7_style_2_text_color');
		if(!empty($placeholder_color)) {
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_2 input.wpcf7-text::-webkit-input-placeholder',
					'.cf7_custom_style_2 textarea.wpcf7-textarea::-webkit-input-placeholder'
				),
				array('color' => $placeholder_color)
			);
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_2_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_2_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		$border_width = fluid_edge_options()->getOptionValue('cf7_style_2_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}

		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_2_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}

		$padding_top = fluid_edge_options()->getOptionValue('cf7_style_2_padding_top');
		if($padding_top !== ''){
			$styles['padding-top'] = fluid_edge_filter_px($padding_top) . 'px';
		}

		$padding_right = fluid_edge_options()->getOptionValue('cf7_style_2_padding_right');
		if($padding_right !== ''){
			$styles['padding-right'] = fluid_edge_filter_px($padding_right) . 'px';
		}

		$padding_bottom = fluid_edge_options()->getOptionValue('cf7_style_2_padding_bottom');
		if($padding_bottom !== ''){
			$styles['padding-bottom'] = fluid_edge_filter_px($padding_bottom) . 'px';
		}

		$padding_left = fluid_edge_options()->getOptionValue('cf7_style_2_padding_left');
		if($padding_left !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left) . 'px';
		}

		$margin_top = fluid_edge_options()->getOptionValue('cf7_style_2_margin_top');
		if($margin_top !== ''){
			$styles['margin-top'] = fluid_edge_filter_px($margin_top) . 'px';
		}

		$margin_bottom = fluid_edge_options()->getOptionValue('cf7_style_2_margin_bottom');
		if($margin_bottom !== ''){
			$styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom) . 'px';
		}

		if(fluid_edge_options()->getOptionValue('cf7_style_2_textarea_height')) {
			$textarea_height = fluid_edge_options()->getOptionValue('cf7_style_2_textarea_height');
			echo fluid_edge_dynamic_css(
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			array('height' => fluid_edge_filter_px($textarea_height).'px')
			);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_text_styles_2');
}

if(!function_exists('fluid_edge_contact_form7_focus_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function fluid_edge_contact_form7_focus_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles = array();

		$color = fluid_edge_options()->getOptionValue('cf7_style_2_focus_text_color');
		if($color !== ''){
			$styles['color'] = $color;
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus::-webkit-input-placeholder',
					'.cf7_custom_style_2 textarea:focus::-webkit-input-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus:-moz-placeholder',
					'.cf7_custom_style_2 textarea:focus:-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus::-moz-placeholder',
					'.cf7_custom_style_2 textarea:focus::-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus:-ms-input-placeholder',
					'.cf7_custom_style_2 textarea:focus:-ms-input-placeholder'
				),
				array('color' => $color)
			);
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_2_focus_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_focus_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_focus_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_2_focus_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_focus_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_focus_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_focus_styles_2');
}

if(!function_exists('fluid_edge_contact_form7_label_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function fluid_edge_contact_form7_label_styles_2() {
		$item_styles = fluid_edge_get_typography_styles('cf7_style_2_label');
		
		$item_selector = array(
			'.cf7_custom_style_2 p'
		);

		echo fluid_edge_dynamic_css($item_selector, $item_styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_label_styles_2');
}

if(!function_exists('fluid_edge_contact_form7_button_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = fluid_edge_get_typography_styles('cf7_style_2_button');
		
		$height = fluid_edge_options()->getOptionValue('cf7_style_2_button_height');
		if($height !== ''){
			$styles['padding-top'] = '0';
			$styles['padding-bottom'] = '0';
			$styles['height'] = fluid_edge_filter_px($height) . 'px';
			$styles['line-height'] = fluid_edge_filter_px($height) . 'px';
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_2_button_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_button_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_button_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_2_button_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_button_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_button_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		$border_width = fluid_edge_options()->getOptionValue('cf7_style_2_button_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}

		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_2_button_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}

		$padding_left_right = fluid_edge_options()->getOptionValue('cf7_style_2_button_padding');
		if($padding_left_right !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left_right) . 'px';
			$styles['padding-right'] = fluid_edge_filter_px($padding_left_right) . 'px';
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_styles_2');
}

if(!function_exists('fluid_edge_contact_form7_button_hover_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_hover_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles = array();

		$color = fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_color');
		if($color !== ''){
			$styles['color'] = $color;
		}

		$background_color = fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_bckg_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}

		$border_color = fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_2_button_hover_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}

		echo fluid_edge_dynamic_css($selector, $styles);
	}

	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_hover_styles_2');
}

if(!function_exists('fluid_edge_contact_form7_text_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 elements
     */
    function fluid_edge_contact_form7_text_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date',
            '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
            '.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz'
        );
	    
	    $styles = fluid_edge_get_typography_styles('cf7_style_3_text');

	    $placeholder_color = fluid_edge_options()->getOptionValue('cf7_style_3_text_color');
	    if(!empty($placeholder_color)) {
		    echo fluid_edge_dynamic_css(
			    array(
				    '.cf7_custom_style_3 input.wpcf7-text::-webkit-input-placeholder',
				    '.cf7_custom_style_3 textarea.wpcf7-textarea::-webkit-input-placeholder'
			    ),
			    array('color' => $placeholder_color)
		    );
	    }

        $background_color = fluid_edge_options()->getOptionValue('cf7_style_3_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_background_transparency') !== ''){
                $background_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_background_transparency');
            }
            $styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
        }

        $border_color = fluid_edge_options()->getOptionValue('cf7_style_3_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_border_transparency') !== ''){
                $border_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_border_transparency');
            }
            $styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
        }

        $border_width = fluid_edge_options()->getOptionValue('cf7_style_3_border_width');
        if($border_width !== ''){
            $styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
        }

        $border_radius = fluid_edge_options()->getOptionValue('cf7_style_3_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
        }

        $padding_top = fluid_edge_options()->getOptionValue('cf7_style_3_padding_top');
        if($padding_top !== ''){
            $styles['padding-top'] = fluid_edge_filter_px($padding_top) . 'px';
        }

        $padding_right = fluid_edge_options()->getOptionValue('cf7_style_3_padding_right');
        if($padding_right !== ''){
            $styles['padding-right'] = fluid_edge_filter_px($padding_right) . 'px';
        }

        $padding_bottom = fluid_edge_options()->getOptionValue('cf7_style_3_padding_bottom');
        if($padding_bottom !== ''){
            $styles['padding-bottom'] = fluid_edge_filter_px($padding_bottom) . 'px';
        }

        $padding_left = fluid_edge_options()->getOptionValue('cf7_style_3_padding_left');
        if($padding_left !== ''){
            $styles['padding-left'] = fluid_edge_filter_px($padding_left) . 'px';
        }

        $margin_top = fluid_edge_options()->getOptionValue('cf7_style_3_margin_top');
        if($margin_top !== ''){
            $styles['margin-top'] = fluid_edge_filter_px($margin_top) . 'px';
        }

        $margin_bottom = fluid_edge_options()->getOptionValue('cf7_style_3_margin_bottom');
        if($margin_bottom !== ''){
            $styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom) . 'px';
        }

        if(fluid_edge_options()->getOptionValue('cf7_style_3_textarea_height')) {
            $textarea_height = fluid_edge_options()->getOptionValue('cf7_style_3_textarea_height');
            echo fluid_edge_dynamic_css(
                '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
                array('height' => fluid_edge_filter_px($textarea_height).'px')
            );
        }

        echo fluid_edge_dynamic_css($selector, $styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_text_styles_3');
}

if(!function_exists('fluid_edge_contact_form7_focus_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 elements focus
     */
    function fluid_edge_contact_form7_focus_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date:focus',
            '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea:focus',
            '.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz:focus'
        );
        $styles = array();

        $color = fluid_edge_options()->getOptionValue('cf7_style_3_focus_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo fluid_edge_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_3 textarea:focus::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo fluid_edge_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus:-moz-placeholder',
                    '.cf7_custom_style_3 textarea:focus:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo fluid_edge_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus::-moz-placeholder',
                    '.cf7_custom_style_3 textarea:focus::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo fluid_edge_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus:-ms-input-placeholder',
                    '.cf7_custom_style_3 textarea:focus:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $background_color = fluid_edge_options()->getOptionValue('cf7_style_3_focus_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_focus_background_transparency') !== ''){
                $background_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_focus_background_transparency');
            }
            $styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
        }

        $border_color = fluid_edge_options()->getOptionValue('cf7_style_3_focus_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_focus_border_transparency') !== ''){
                $border_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_focus_border_transparency');
            }
            $styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
        }

        echo fluid_edge_dynamic_css($selector, $styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_focus_styles_3');
}

if(!function_exists('fluid_edge_contact_form7_label_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 label
     */
    function fluid_edge_contact_form7_label_styles_3() {
	    $item_styles = fluid_edge_get_typography_styles('cf7_style_3_label');
	
	    $item_selector = array(
		    '.cf7_custom_style_3 p'
	    );
	
	    echo fluid_edge_dynamic_css($item_selector, $item_styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_label_styles_3');
}

if(!function_exists('fluid_edge_contact_form7_button_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function fluid_edge_contact_form7_button_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit'
        );
	
	    $styles = fluid_edge_get_typography_styles('cf7_style_3_button');
	    
	    $height = fluid_edge_options()->getOptionValue('cf7_style_3_button_height');
	    if($height !== ''){
		    $styles['padding-top'] = '0';
		    $styles['padding-bottom'] = '0';
		    $styles['height'] = fluid_edge_filter_px($height) . 'px';
		    $styles['line-height'] = fluid_edge_filter_px($height) . 'px';
	    }

        $background_color = fluid_edge_options()->getOptionValue('cf7_style_3_button_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_button_background_transparency') !== ''){
                $background_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_button_background_transparency');
            }
            $styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
        }

        $border_color = fluid_edge_options()->getOptionValue('cf7_style_3_button_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_button_border_transparency') !== ''){
                $border_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_button_border_transparency');
            }
            $styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
        }

        $border_width = fluid_edge_options()->getOptionValue('cf7_style_3_button_border_width');
        if($border_width !== ''){
            $styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
        }

        $border_radius = fluid_edge_options()->getOptionValue('cf7_style_3_button_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
        }

        $padding_left_right = fluid_edge_options()->getOptionValue('cf7_style_3_button_padding');
        if($padding_left_right !== ''){
            $styles['padding-left'] = fluid_edge_filter_px($padding_left_right) . 'px';
            $styles['padding-right'] = fluid_edge_filter_px($padding_left_right) . 'px';
        }

        echo fluid_edge_dynamic_css($selector, $styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_styles_3');
}

if(!function_exists('fluid_edge_contact_form7_button_hover_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function fluid_edge_contact_form7_button_hover_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
        );
        $styles = array();

        $color = fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $background_color = fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_bckg_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_bckg_transparency') !== ''){
                $background_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_bckg_transparency');
            }
            $styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
        }

        $border_color = fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_border_transparency') !== ''){
                $border_opacity = fluid_edge_options()->getOptionValue('cf7_style_3_button_hover_border_transparency');
            }
            $styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
        }

        echo fluid_edge_dynamic_css($selector, $styles);
    }

    add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_hover_styles_3');
}

if(!function_exists('fluid_edge_contact_form7_text_styles_4')) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function fluid_edge_contact_form7_text_styles_4() {
		$selector = array(
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_4 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_4 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = fluid_edge_get_typography_styles('cf7_style_4_text');
		
		$placeholder_color = fluid_edge_options()->getOptionValue('cf7_style_4_text_color');
		if(!empty($placeholder_color)) {
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_4 input.wpcf7-text::-webkit-input-placeholder',
					'.cf7_custom_style_4 textarea.wpcf7-textarea::-webkit-input-placeholder'
				),
				array('color' => $placeholder_color)
			);
		}
		
		$background_color = fluid_edge_options()->getOptionValue('cf7_style_4_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}
		
		$border_color = fluid_edge_options()->getOptionValue('cf7_style_4_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}
		
		$border_width = fluid_edge_options()->getOptionValue('cf7_style_4_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}
		
		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_4_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}
		
		$padding_top = fluid_edge_options()->getOptionValue('cf7_style_4_padding_top');
		if($padding_top !== ''){
			$styles['padding-top'] = fluid_edge_filter_px($padding_top) . 'px';
		}
		
		$padding_right = fluid_edge_options()->getOptionValue('cf7_style_4_padding_right');
		if($padding_right !== ''){
			$styles['padding-right'] = fluid_edge_filter_px($padding_right) . 'px';
		}
		
		$padding_bottom = fluid_edge_options()->getOptionValue('cf7_style_4_padding_bottom');
		if($padding_bottom !== ''){
			$styles['padding-bottom'] = fluid_edge_filter_px($padding_bottom) . 'px';
		}
		
		$padding_left = fluid_edge_options()->getOptionValue('cf7_style_4_padding_left');
		if($padding_left !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left) . 'px';
		}
		
		$margin_top = fluid_edge_options()->getOptionValue('cf7_style_4_margin_top');
		if($margin_top !== ''){
			$styles['margin-top'] = fluid_edge_filter_px($margin_top) . 'px';
		}
		
		$margin_bottom = fluid_edge_options()->getOptionValue('cf7_style_4_margin_bottom');
		if($margin_bottom !== ''){
			$styles['margin-bottom'] = fluid_edge_filter_px($margin_bottom) . 'px';
		}
		
		if(fluid_edge_options()->getOptionValue('cf7_style_4_textarea_height')) {
			$textarea_height = fluid_edge_options()->getOptionValue('cf7_style_4_textarea_height');
			echo fluid_edge_dynamic_css(
				'.cf7_custom_style_4 textarea.wpcf7-form-control.wpcf7-textarea',
				array('height' => fluid_edge_filter_px($textarea_height).'px')
			);
		}
		
		echo fluid_edge_dynamic_css($selector, $styles);
	}
	
	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_text_styles_4');
}

if(!function_exists('fluid_edge_contact_form7_focus_styles_4')) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function fluid_edge_contact_form7_focus_styles_4() {
		$selector = array(
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_4 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_4 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles = array();
		
		$color = fluid_edge_options()->getOptionValue('cf7_style_4_focus_text_color');
		if($color !== ''){
			$styles['color'] = $color;
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_4 input:focus::-webkit-input-placeholder',
					'.cf7_custom_style_4 textarea:focus::-webkit-input-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_4 input:focus:-moz-placeholder',
					'.cf7_custom_style_4 textarea:focus:-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_4 input:focus::-moz-placeholder',
					'.cf7_custom_style_4 textarea:focus::-moz-placeholder'
				),
				array('color' => $color)
			);
			echo fluid_edge_dynamic_css(
				array(
					'.cf7_custom_style_4 input:focus:-ms-input-placeholder',
					'.cf7_custom_style_4 textarea:focus:-ms-input-placeholder'
				),
				array('color' => $color)
			);
		}
		
		$background_color = fluid_edge_options()->getOptionValue('cf7_style_4_focus_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_focus_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_focus_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}
		
		$border_color = fluid_edge_options()->getOptionValue('cf7_style_4_focus_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_focus_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_focus_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}
		
		echo fluid_edge_dynamic_css($selector, $styles);
	}
	
	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_focus_styles_4');
}

if(!function_exists('fluid_edge_contact_form7_label_styles_4')) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function fluid_edge_contact_form7_label_styles_4() {
		$item_styles = fluid_edge_get_typography_styles('cf7_style_4_label');
		
		$item_selector = array(
			'.cf7_custom_style_4 p'
		);
		
		echo fluid_edge_dynamic_css($item_selector, $item_styles);
	}
	
	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_label_styles_4');
}

if(!function_exists('fluid_edge_contact_form7_button_styles_4')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_styles_4() {
		$selector = array(
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = fluid_edge_get_typography_styles('cf7_style_4_button');
		
		$height = fluid_edge_options()->getOptionValue('cf7_style_4_button_height');
		if($height !== ''){
			$styles['padding-top'] = '0';
			$styles['padding-bottom'] = '0';
			$styles['height'] = fluid_edge_filter_px($height) . 'px';
			$styles['line-height'] = fluid_edge_filter_px($height) . 'px';
		}
		
		$background_color = fluid_edge_options()->getOptionValue('cf7_style_4_button_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_button_background_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_button_background_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}
		
		$border_color = fluid_edge_options()->getOptionValue('cf7_style_4_button_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_button_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_button_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}
		
		$border_width = fluid_edge_options()->getOptionValue('cf7_style_4_button_border_width');
		if($border_width !== ''){
			$styles['border-width'] = fluid_edge_filter_px($border_width) . 'px';
		}
		
		$border_radius = fluid_edge_options()->getOptionValue('cf7_style_4_button_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = fluid_edge_filter_px($border_radius) . 'px';
		}
		
		$padding_left_right = fluid_edge_options()->getOptionValue('cf7_style_4_button_padding');
		if($padding_left_right !== ''){
			$styles['padding-left'] = fluid_edge_filter_px($padding_left_right) . 'px';
			$styles['padding-right'] = fluid_edge_filter_px($padding_left_right) . 'px';
		}
		
		echo fluid_edge_dynamic_css($selector, $styles);
	}
	
	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_styles_4');
}

if(!function_exists('fluid_edge_contact_form7_button_hover_styles_4')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function fluid_edge_contact_form7_button_hover_styles_4() {
		$selector = array(
			'.cf7_custom_style_4 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles = array();
		
		$color = fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_color');
		if($color !== ''){
			$styles['color'] = $color;
		}
		
		$background_color = fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_bckg_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_bckg_transparency') !== ''){
				$background_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_bckg_transparency');
			}
			$styles['background-color'] = fluid_edge_rgba_color($background_color,$background_opacity);
		}
		
		$border_color = fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_border_transparency') !== ''){
				$border_opacity = fluid_edge_options()->getOptionValue('cf7_style_4_button_hover_border_transparency');
			}
			$styles['border-color'] = fluid_edge_rgba_color($border_color,$border_opacity);
		}
		
		echo fluid_edge_dynamic_css($selector, $styles);
	}
	
	add_action('fluid_edge_action_style_dynamic', 'fluid_edge_contact_form7_button_hover_styles_4');
}