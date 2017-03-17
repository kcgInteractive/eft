<?php

if(!function_exists('fluid_edge_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function fluid_edge_get_vc_version() {
		if(fluid_edge_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}