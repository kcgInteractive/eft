<?php

if (!function_exists('fluid_edge_register_widgets')) {
	function fluid_edge_register_widgets() {
		$widgets = array(
			'FluidEdgeClassBlogListWidget',
			'FluidEdgeClassButtonWidget',
			'FluidEdgeClassImageWidget',
			'FluidEdgeClassImageSliderWidget',
			'FluidEdgeClassRawHTMLWidget',
			'FluidEdgeClassSearchOpener',
			'FluidEdgeClassSeparatorWidget',
			'FluidEdgeClassSideAreaOpener',
			'FluidEdgeClassSocialIconWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
	
	add_action('widgets_init', 'fluid_edge_register_widgets');
}