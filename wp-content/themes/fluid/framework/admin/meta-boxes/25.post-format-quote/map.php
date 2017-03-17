<?php

if(!function_exists('fluid_edge_map_post_quote_meta')) {
    function fluid_edge_map_post_quote_meta() {
        $quote_post_format_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' =>	array('post'),
                'title' => esc_html__('Quote Post Format', 'fluid'),
                'name' 	=> 'post_format_quote_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_post_quote_text_meta',
                'type'        => 'text',
                'label'       => esc_html__('Quote Text', 'fluid'),
                'description' => esc_html__('Enter Quote text', 'fluid'),
                'parent'      => $quote_post_format_meta_box,

            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_post_quote_author_meta',
                'type'        => 'text',
                'label'       => esc_html__('Quote Author', 'fluid'),
                'description' => esc_html__('Enter Quote author', 'fluid'),
                'parent'      => $quote_post_format_meta_box,
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_post_quote_meta', 25);
}