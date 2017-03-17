<?php

if(!function_exists('fluid_edge_map_post_gallery_meta')) {

    function fluid_edge_map_post_gallery_meta() {
        $gallery_post_format_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' =>	array('post'),
                'title' => esc_html__('Gallery Post Format', 'fluid'),
                'name' 	=> 'post_format_gallery_meta'
            )
        );

        fluid_edge_add_multiple_images_field(
            array(
                'name'        => 'edgtf_post_gallery_images_meta',
                'label'       => esc_html__('Gallery Images', 'fluid'),
                'description' => esc_html__('Choose your gallery images', 'fluid'),
                'parent'      => $gallery_post_format_meta_box,
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_post_gallery_meta', 21);
}
