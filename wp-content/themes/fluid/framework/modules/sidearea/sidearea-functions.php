<?php
if (!function_exists('fluid_edge_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function fluid_edge_register_side_area_sidebar() {

        register_sidebar(array(
            'name' => esc_html__('Side Area', 'fluid'),
            'id' => 'sidearea', //TODO Change name of sidebar
            'description' => esc_html__('Side Area', 'fluid'),
            'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="edgtf-widget-title-holder"><h4 class="edgtf-widget-title">',
            'after_title' => '</h4></div>'
        ));
    }

    add_action('widgets_init', 'fluid_edge_register_side_area_sidebar');
}

if (!function_exists('fluid_edge_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function fluid_edge_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            $classes[] = 'edgtf-side-menu-slide-from-right';
        }

        return $classes;
    }

    add_filter('body_class', 'fluid_edge_side_menu_body_class');
}

if (!function_exists('fluid_edge_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function fluid_edge_get_side_area() {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            fluid_edge_get_module_template_part('templates/sidearea', 'sidearea');
        }
    }
	
	add_action('fluid_edge_action_after_body_tag', 'fluid_edge_get_side_area', 10);
}

