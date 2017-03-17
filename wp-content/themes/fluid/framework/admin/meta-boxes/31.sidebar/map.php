<?php

if(!function_exists('fluid_edge_map_sidebar_meta')) {
    function fluid_edge_map_sidebar_meta() {
        $edgtf_sidebar_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'team-member'),
                'title' => esc_html__('Sidebar', 'fluid'),
                'name' => 'sidebar_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_sidebar_layout_meta',
                'type'        => 'select',
                'label'       => esc_html__('Layout', 'fluid'),
                'description' => esc_html__('Choose the sidebar layout', 'fluid'),
                'parent'      => $edgtf_sidebar_meta_box,
                'options'     => array(
                    ''			        => esc_html__('Default', 'fluid'),
                    'no-sidebar'		=> esc_html__('No Sidebar', 'fluid'),
                    'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'fluid'),
                    'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'fluid'),
                    'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'fluid'),
                    'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'fluid')
                )
            )
        );

        $edgtf_custom_sidebars = fluid_edge_get_custom_sidebars();
        if(count($edgtf_custom_sidebars) > 0) {
            fluid_edge_add_meta_box_field(array(
                'name' => 'edgtf_custom_sidebar_area_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'fluid'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'fluid'),
                'parent' => $edgtf_sidebar_meta_box,
                'options' => $edgtf_custom_sidebars
            ));
        }
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_sidebar_meta', 31);
}