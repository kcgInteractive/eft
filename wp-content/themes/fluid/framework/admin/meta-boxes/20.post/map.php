<?php

/*** Post Settings ***/

if(!function_exists('fluid_edge_map_post_meta')) {
    function fluid_edge_map_post_meta() {

        $post_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Post', 'fluid'),
                'name' => 'post-meta'
            )
        );
	
	    fluid_edge_add_meta_box_field(array(
		    'name'        => 'edgtf_blog_single_sidebar_layout_meta',
		    'type'        => 'select',
		    'label'       => esc_html__('Sidebar Layout', 'fluid'),
		    'description' => esc_html__('Choose a sidebar layout for Blog single page', 'fluid'),
		    'default_value'	=> '',
		    'parent'      => $post_meta_box,
		    'options'     => array(
			    ''		            => esc_html__('Default', 'fluid'),
			    'no-sidebar'		=> esc_html__('No Sidebar', 'fluid'),
			    'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'fluid'),
			    'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'fluid'),
			    'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'fluid'),
			    'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'fluid')
		    )
	    ));
	
	    $fluid_custom_sidebars = fluid_edge_get_custom_sidebars();
	    if(count($fluid_custom_sidebars) > 0) {
		    fluid_edge_add_meta_box_field(array(
			    'name' => 'edgtf_blog_single_custom_sidebar_area_meta',
			    'type' => 'selectblank',
			    'label' => esc_html__('Sidebar to Display', 'fluid'),
			    'description' => esc_html__('Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'fluid'),
			    'parent' => $post_meta_box,
			    'options' => fluid_edge_get_custom_sidebars()
		    ));
	    }

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_blog_list_featured_image_meta',
                'type' => 'image',
                'label' => esc_html__('Blog List Image', 'fluid'),
                'description' => esc_html__('Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'fluid'),
                'parent' => $post_meta_box
            )
        );

        fluid_edge_add_meta_box_field(array(
            'name' => 'edgtf_blog_masonry_gallery_fixed_dimensions_meta',
            'type' => 'select',
            'label' => esc_html__('Dimensions for Fixed Proportion', 'fluid'),
            'description' => esc_html__('Choose image layout when it appears in Masonry lists in fixed proportion', 'fluid'),
            'default_value' => 'default',
            'parent' => $post_meta_box,
            'options' => array(
                'default' => esc_html__('Default', 'fluid'),
                'large-width' => esc_html__('Large Width', 'fluid'),
                'large-height' => esc_html__('Large Height', 'fluid'),
                'large-width-height' => esc_html__('Large Width/Height', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(array(
            'name' => 'edgtf_blog_masonry_gallery_original_dimensions_meta',
            'type' => 'select',
            'label' => esc_html__('Dimensions for Original Proportion', 'fluid'),
            'description' => esc_html__('Choose image layout when it appears in Masonry lists in original proportion', 'fluid'),
            'default_value' => 'default',
            'parent' => $post_meta_box,
            'options' => array(
                'default' => esc_html__('Default', 'fluid'),
                'large-width' => esc_html__('Large Width', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_blog_meta',
                'type' => 'select',
                'default_value' => '',
                'label'       => esc_html__('Show Title Area', 'fluid'),
                'description' => esc_html__('Enabling this option will show title area on your single post page', 'fluid'),
                'parent'      => $post_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'yes' => esc_html__('Yes', 'fluid'),
                    'no' => esc_html__('No', 'fluid')
                )
            )
        );
    }
    
    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_post_meta', 20);
}
