<?php

if(!function_exists('fluid_edge_map_blog_meta')) {
    function fluid_edge_map_blog_meta() {
        $edgt_blog_categories = array();
        $categories = get_categories();
        foreach($categories as $category) {
            $edgt_blog_categories[$category->slug] = $category->name;
        }

        $yesnoarray = array(
            'yes' => esc_html__('Yes', 'fluid'),
            'no' => esc_html__('No', 'fluid')
        );

        $blog_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'fluid'),
                'name' => 'blog_meta'
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_blog_category_meta',
                'type'        => 'selectblank',
                'label'       => esc_html__('Blog Category', 'fluid'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'fluid'),
                'parent'      => $blog_meta_box,
                'options'     => $edgt_blog_categories
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_show_posts_per_page_meta',
                'type'        => 'text',
                'label'       => esc_html__('Number of Posts', 'fluid'),
                'description' => esc_html__('Enter the number of posts to display', 'fluid'),
                'parent'      => $blog_meta_box,
                'options'     => $edgt_blog_categories,
                'args'        => array("col_width" => 3)
            )
        );

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_blog_masonry_layout_meta',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Layout', 'fluid'),
            'description' => esc_html__('Set masonry layout. Default is in grid.', 'fluid'),
            'parent'      => $blog_meta_box,
            'options'     => array(
                ''      => esc_html__('Default', 'fluid'),
                'in-grid'   => esc_html__('In Grid', 'fluid'),
                'full-width' => esc_html__('Full Width', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_blog_masonry_number_of_columns_meta',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Number of Columns', 'fluid'),
            'description' => esc_html__('Set number of columns for your masonry blog lists', 'fluid'),
            'parent'      => $blog_meta_box,
            'options'     => array(
                ''      => esc_html__('Default', 'fluid'),
                'two'   => esc_html__('2 Columns', 'fluid'),
                'three' => esc_html__('3 Columns', 'fluid'),
                'four'  => esc_html__('4 Columns', 'fluid'),
                'five'  => esc_html__('5 Columns', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_blog_masonry_space_between_items_meta',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Space Between Items', 'fluid'),
            'description' => esc_html__('Set space size between posts for your masonry blog lists', 'fluid'),
            'parent'      => $blog_meta_box,
            'options'     => array(
                ''        => esc_html__('Default', 'fluid'),
                'normal'  => esc_html__('Normal', 'fluid'),
                'small'   => esc_html__('Small', 'fluid'),
                'tiny'    => esc_html__('Tiny', 'fluid'),
                'no'      => esc_html__('No Space', 'fluid')
            )
        ));
	
	    fluid_edge_add_meta_box_field( array(
		    'name'          => 'edgtf_standard_featured_image_size_meta',
		    'type'          => 'select',
		    'label'         => esc_html__( 'Standard - Featured Image Proportion', 'fluid' ),
		    'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on blog standard lists.', 'fluid' ),
		    'parent'        => $blog_meta_box,
		    'default_value' => '',
		    'options'       => array(
			    ''                           => esc_html__( 'Default', 'fluid' ),
			    'full'                       => esc_html__( 'Original', 'fluid' ),
			    'fluid_edge_image_square'    => esc_html__( 'Square', 'fluid' ),
			    'fluid_edge_image_landscape' => esc_html__( 'Landscape', 'fluid' ),
			    'fluid_edge_image_portrait'  => esc_html__( 'Portrait', 'fluid' )
		    )
	    ) );

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_blog_list_featured_image_proportion_meta',
            'type'        => 'select',
            'label'       => esc_html__('Featured Image Proportion', 'fluid'),
            'description' => esc_html__('Choose type of proportions you want to use for featured images on blog lists.', 'fluid'),
            'parent'      => $blog_meta_box,
            'default_value' => '',
            'options'     => array(
                ''		   => esc_html__('Default', 'fluid'),
                'fixed'    => esc_html__('Fixed', 'fluid'),
                'original' => esc_html__('Original', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_blog_pagination_type_meta',
            'type'        => 'select',
            'label'       => esc_html__('Pagination Type', 'fluid'),
            'description' => esc_html__('Choose a pagination layout for Blog Lists', 'fluid'),
            'parent'      => $blog_meta_box,
            'default_value' => '',
            'options'     => array(
                ''                => esc_html__('Default', 'fluid'),
                'standard'		  => esc_html__('Standard', 'fluid'),
                'load-more'		  => esc_html__('Load More', 'fluid'),
                'infinite-scroll' => esc_html__('Infinite Scroll', 'fluid'),
                'no-pagination'   => esc_html__('No Pagination', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(
            array(
                'type' => 'text',
                'name' => 'edgtf_number_of_chars_meta',
                'default_value' => '',
                'label' => esc_html__('Number of Words in Excerpt', 'fluid'),
                'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'fluid'),
                'parent' => $blog_meta_box,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_blog_meta', 30);
}