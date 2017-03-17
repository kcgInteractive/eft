<?php

if(!function_exists('edgtf_core_map_team_single_meta')) {
    function edgtf_core_map_team_single_meta() {

        $meta_box = fluid_edge_add_meta_box(array(
            'scope' => 'team-member',
            'title' => esc_html__('Team Member Info', 'edgtf-core'),
            'name'  => 'team_meta'
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_position',
            'type'        => 'text',
            'label'       => esc_html__('Position', 'edgtf-core'),
            'description' => esc_html__('The members\'s role within the team', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_birth_date',
            'type'        => 'date',
            'label'       => esc_html__('Birth date', 'edgtf-core'),
            'description' => esc_html__('The members\'s birth date', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_email',
            'type'        => 'text',
            'label'       => esc_html__('Email', 'edgtf-core'),
            'description' => esc_html__('The members\'s email', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_phone',
            'type'        => 'text',
            'label'       => esc_html__('Phone', 'edgtf-core'),
            'description' => esc_html__('The members\'s phone', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_address',
            'type'        => 'text',
            'label'       => esc_html__('Address', 'edgtf-core'),
            'description' => esc_html__('The members\'s addres', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_education',
            'type'        => 'text',
            'label'       => esc_html__('Education', 'edgtf-core'),
            'description' => esc_html__('The members\'s education', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_team_member_resume',
            'type'        => 'file',
            'label'       => esc_html__('Resume', 'edgtf-core'),
            'description' => esc_html__('Upload members\'s resume', 'edgtf-core'),
            'parent'      => $meta_box
        ));

        for($x = 1; $x < 6; $x++) {

            $social_icon_group = fluid_edge_add_admin_group(array(
                'name'   => 'edgtf_team_member_social_icon_group'.$x,
                'title'  => esc_html__('Social Link ', 'edgtf-core').$x,
                'parent' => $meta_box
            ));

                $social_row1 = fluid_edge_add_admin_row(array(
                    'name'   => 'edgtf_team_member_social_icon_row1'.$x,
                    'parent' => $social_icon_group
                ));

                    FluidEdgeClassIconCollections::get_instance()->getSocialIconsMetaBoxOrOption(array(
                        'label' => esc_html__('Icon ', 'edgtf-core').$x,
                        'parent' => $social_row1,
                        'name' => 'edgtf_team_member_social_icon_pack_'.$x,
                        'defaul_icon_pack' => '',
                        'type' => 'meta-box',
                        'field_type' => 'simple'
                    ));

                $social_row2 = fluid_edge_add_admin_row(array(
                    'name'   => 'edgtf_team_member_social_icon_row2'.$x,
                    'parent' => $social_icon_group
                ));

                    fluid_edge_add_meta_box_field(array(
                        'type'            => 'textsimple',
                        'label'           => esc_html__('Link', 'edgtf-core'),
                        'name'            => 'edgtf_team_member_social_icon_'.$x.'_link',
                        'hidden_property' => 'edgtf_team_member_social_icon_pack_'.$x,
                        'hidden_value'    => '',
                        'parent'          => $social_row2
                    ));
	
			        fluid_edge_add_meta_box_field(array(
				        'type'          => 'selectsimple',
				        'label'         => esc_html__('Target', 'edgtf-core'),
				        'name'          => 'edgtf_team_member_social_icon_'.$x.'_target',
				        'options'       => fluid_edge_get_link_target_array(),
				        'hidden_property' => 'edgtf_team_member_social_icon_'.$x.'_link',
				        'hidden_value'    => '',
				        'parent'          => $social_row2
			        ));
        }
    }

    add_action('fluid_edge_action_meta_boxes_map', 'edgtf_core_map_team_single_meta', 46);
}