<?php

if(!function_exists('fluid_edge_map_post_video_meta')) {
    function fluid_edge_map_post_video_meta() {
        $video_post_format_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' =>	array('post'),
                'title' => esc_html__('Video Post Format', 'fluid'),
                'name' 	=> 'post_format_video_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_video_type_meta',
                'type'        => 'select',
                'label'       => esc_html__('Video Type', 'fluid'),
                'description' => esc_html__('Choose video type', 'fluid'),
                'parent'      => $video_post_format_meta_box,
                'default_value' => 'social_networks',
                'options'     => array(
                    'social_networks' => esc_html__('Video Service', 'fluid'),
                    'self' => esc_html__('Self Hosted', 'fluid')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'social_networks' => '#edgtf_edgtf_video_self_hosted_container',
                        'self' => '#edgtf_edgtf_video_embedded_container'
                    ),
                    'show' => array(
                        'social_networks' => '#edgtf_edgtf_video_embedded_container',
                        'self' => '#edgtf_edgtf_video_self_hosted_container')
                )
            )
        );

        $edgtf_video_embedded_container = fluid_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_embedded_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $edgtf_video_self_hosted_container = fluid_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_self_hosted_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'social_networks'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_post_video_link_meta',
                'type'        => 'text',
                'label'       => esc_html__('Video URL', 'fluid'),
                'description' => esc_html__('Enter Video URL', 'fluid'),
                'parent'      => $edgtf_video_embedded_container,
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_post_video_custom_meta',
                'type'        => 'text',
                'label'       => esc_html__('Video MP4', 'fluid'),
                'description' => esc_html__('Enter video URL for MP4 format', 'fluid'),
                'parent'      => $edgtf_video_self_hosted_container,
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_post_video_meta', 22);
}