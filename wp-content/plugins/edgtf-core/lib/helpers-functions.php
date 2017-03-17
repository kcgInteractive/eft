<?php

if(!function_exists('edgtf_core_get_cpt_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function edgtf_core_get_cpt_shortcode_module_template_part($shortcode, $template, $slug = '', $params = array(), $additional_params = array()) {
		
		//HTML Content from template
		$html = '';
		$template_path = EDGE_CORE_CPT_PATH.'/'.$shortcode.'/shortcodes/templates';
		
		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		if(is_array($additional_params) && count($additional_params)) {
			extract($additional_params);
		}
		
		$template = '';
		
		if (!empty($temp)) {
			if (!empty($slug)) {
				$template = "{$temp}-{$slug}.php";
				
				if(!file_exists($template)) {
					$template = $temp.'.php';
				}
			} else {
				$template = $temp.'.php';
			}
		}
		
		if ($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if(!function_exists('edgtf_core_get_cpt_single_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $cpt_name name of the cpt folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function edgtf_core_get_cpt_single_module_template_part($template, $cpt_name, $slug = '', $params = array()) {
		
		//HTML Content from template
		$html = '';
		$template_path = EDGE_CORE_CPT_PATH.'/'.$cpt_name;
		
		$temp = $template_path.'/'.$template;
		
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$template = '';
		
		if (!empty($temp)) {
			if (!empty($slug)) {
				$template = "{$temp}-{$slug}.php";
				
				if(!file_exists($template)) {
					$template = $temp.'.php';
				}
			} else {
				$template = $temp.'.php';
			}
		}
		
		if (!empty($template)) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}
		
		print $html;
	}
}

if(!function_exists('edgtf_core_get_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $shortcode name of the shortcode folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function edgtf_core_get_shortcode_module_template_part($template, $shortcode, $slug = '', $params = array()) {
		
		//HTML Content from template
		$html          = '';
		$template_path = EDGE_CORE_SHORTCODES_PATH.'/'.$shortcode;
		
		$temp = $template_path.'/'.$template;
		
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$template = '';
		
		if (!empty($temp)) {
			if (!empty($slug)) {
				$template = "{$temp}-{$slug}.php";
				
				if(!file_exists($template)) {
					$template = $temp.'.php';
				}
			} else {
				$template = $temp.'.php';
			}
		}
		
		if ($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if(!function_exists('fluid_edge_add_user_custom_fields')) {
	/**
	 * Function creates custom social fields for users
	 *
	 * return $user_contact
	 */
	function fluid_edge_add_user_custom_fields($user_contact) {
		/**
		 * Function that add custom user fields
		 **/
		$user_contact['facebook']   = esc_html__('Facebook', 'edgtf-core');
		$user_contact['twitter']    = esc_html__('Twitter', 'edgtf-core');
		$user_contact['linkedin']   = esc_html__('Linkedin', 'edgtf-core');
		$user_contact['instagram']  = esc_html__('Instagram', 'edgtf-core');
		$user_contact['pinterest']  = esc_html__('Pinterest', 'edgtf-core');
		$user_contact['tumblr']     = esc_html__('Tumbrl', 'edgtf-core');
		$user_contact['googleplus'] = esc_html__('Google Plus', 'edgtf-core');
		
		return $user_contact;
	}
	
	add_filter('user_contactmethods', 'fluid_edge_add_user_custom_fields');
}

if( ! function_exists( 'edgtf_core_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function edgtf_core_ajax_status($status, $message, $data = NULL) {
		$response = array (
			'status' => $status,
			'message' => $message,
			'data' => $data
		);

		$output = json_encode($response);

		exit($output);
	}
}