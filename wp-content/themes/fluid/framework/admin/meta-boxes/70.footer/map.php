<?php

if(!function_exists('fluid_edge_map_footer_meta')) {
    function fluid_edge_map_footer_meta() {
        $footer_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'team-member'),
                'title' => esc_html__('Footer', 'fluid'),
                'name' => 'footer_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'fluid'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'fluid'),
                'parent' => $footer_meta_box
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_show_footer_top_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Top', 'fluid'),
                'description' => esc_html__('Enabling this option will show Footer Top area', 'fluid'),
                'parent' => $footer_meta_box,
                'options' => fluid_edge_get_yes_no_select_array()
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_show_footer_bottom_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Bottom', 'fluid'),
                'description' => esc_html__('Enabling this option will show Footer Bottom area', 'fluid'),
                'parent' => $footer_meta_box,
                'options' => fluid_edge_get_yes_no_select_array()
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_footer_meta', 70);
}