<?php

if(!function_exists('fluid_edge_map_post_link_meta')) {
    function fluid_edge_map_post_link_meta() {
        $link_post_format_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'fluid'),
                'name' => 'post_format_link_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_post_link_link_meta',
                'type'        => 'text',
                'label'       => esc_html__('Link', 'fluid'),
                'description' => esc_html__('Enter link', 'fluid'),
                'parent'      => $link_post_format_meta_box,

            )
        );


    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_post_link_meta', 24);
}