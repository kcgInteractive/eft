<?php

if (!function_exists('fluid_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function fluid_edge_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'fluid'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'fluid'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="edgtf-widget-title-holder"><h4 class="edgtf-widget-title">',
            'after_title' => '</h4></div>'
        ));
    }

    add_action('widgets_init', 'fluid_edge_register_sidebars', 1);
}

if (!function_exists('fluid_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates FluidEdgeClassSidebar object
     */
    function fluid_edge_add_support_custom_sidebar() {
        add_theme_support('FluidEdgeClassSidebar');
        if (get_theme_support('FluidEdgeClassSidebar')) new FluidEdgeClassSidebar();
    }

    add_action('after_setup_theme', 'fluid_edge_add_support_custom_sidebar');
}