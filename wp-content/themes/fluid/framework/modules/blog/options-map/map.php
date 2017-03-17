<?php

if ( ! function_exists('fluid_edge_blog_options_map') ) {

	function fluid_edge_blog_options_map() {

		fluid_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'fluid'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = fluid_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'fluid')
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'fluid'),
			'description' => esc_html__('Choose a default blog layout for archived blog post lists', 'fluid'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'masonry'               => esc_html__('Blog: Masonry', 'fluid'),
                'standard'              => esc_html__('Blog: Standard', 'fluid'),
			)
		));

		fluid_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout for Archive Pages', 'fluid'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists', 'fluid'),
			'default_value' => '',
			'parent'      => $panel_blog_lists,
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
			fluid_edge_add_admin_field(array(
				'name' => 'archive_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display for Archive Pages', 'fluid'),
				'description' => esc_html__('Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'fluid'),
				'parent' => $panel_blog_lists,
				'options' => fluid_edge_get_custom_sidebars()
			));
		}

        fluid_edge_add_admin_field(array(
            'name'        => 'blog_masonry_layout',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Layout', 'fluid'),
            'default_value' => 'in-grid',
            'description' => esc_html__('Set masonry layout. Default is in grid.', 'fluid'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'in-grid'    => esc_html__('In Grid', 'fluid'),
                'full-width' => esc_html__('Full Width', 'fluid')
            )
        ));
		
		fluid_edge_add_admin_field(array(
			'name'        => 'blog_masonry_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Number of Columns', 'fluid'),
			'default_value' => 'four',
			'description' => esc_html__('Set number of columns for your masonry blog lists. Default value is 4 columns', 'fluid'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'two'   => esc_html__('2 Columns', 'fluid'),
				'three' => esc_html__('3 Columns', 'fluid'),
				'four'  => esc_html__('4 Columns', 'fluid'),
				'five'  => esc_html__('5 Columns', 'fluid')
			)
		));
		
		fluid_edge_add_admin_field(array(
			'name'        => 'blog_masonry_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Space Between Items', 'fluid'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between posts for your masonry blog lists. Default value is normal', 'fluid'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'normal'  => esc_html__('Normal', 'fluid'),
				'small'   => esc_html__('Small', 'fluid'),
				'tiny'    => esc_html__('Tiny', 'fluid'),
				'no'      => esc_html__('No Space', 'fluid')
			)
		));

        fluid_edge_add_admin_field(array(
            'name'        => 'blog_list_featured_image_proportion',
            'type'        => 'select',
            'label'       => esc_html__('Featured Image Proportion', 'fluid'),
            'default_value' => 'fixed',
            'description' => esc_html__('Choose type of proportions you want to use for featured images on blog lists.', 'fluid'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'fixed'    => esc_html__('Fixed', 'fluid'),
                'original' => esc_html__('Original', 'fluid')
            )
        ));

		fluid_edge_add_admin_field(array(
			'name'        => 'blog_pagination_type',
			'type'        => 'select',
			'label'       => esc_html__('Pagination Type', 'fluid'),
			'description' => esc_html__('Choose a pagination layout for Blog Lists', 'fluid'),
			'parent'      => $panel_blog_lists,
			'default_value' => 'standard',
			'options'     => array(
				'standard'		  => esc_html__('Standard', 'fluid'),
				'load-more'		  => esc_html__('Load More', 'fluid'),
				'infinite-scroll' => esc_html__('Infinite Scroll', 'fluid'),
				'no-pagination'   => esc_html__('No Pagination', 'fluid')
			)
		));
	
		fluid_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '40',
				'label' => esc_html__('Number of Words in Excerpt', 'fluid'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'fluid'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = fluid_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'fluid')
			)
		);

		fluid_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'fluid'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'fluid'),
			'default_value'	=> '',
			'parent'      => $panel_blog_single,
			'options'     => array(
				''		            => esc_html__('Default', 'fluid'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'fluid'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'fluid'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'fluid'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'fluid'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'fluid')
			)
		));

		if(count($fluid_custom_sidebars) > 0) {
			fluid_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'fluid'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'fluid'),
				'parent' => $panel_blog_single,
				'options' => fluid_edge_get_custom_sidebars()
			));
		}
		
		fluid_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'show_title_area_blog',
				'default_value' => '',
				'label'       => esc_html__('Show Title Area', 'fluid'),
				'description' => esc_html__('Enabling this option will show title area on single post pages', 'fluid'),
				'parent'      => $panel_blog_single,
                'options' => array(
                    '' => esc_html__('Default', 'fluid'),
                    'yes' => esc_html__('Yes', 'fluid'),
                    'no' => esc_html__('No', 'fluid')
                ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'fluid'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'fluid'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		fluid_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'fluid'),
			'description'   => esc_html__('Enabling this option will show related posts on single post pages', 'fluid'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		fluid_edge_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'fluid'),
			'description'   => esc_html__('Enabling this option will show comments form on single post pages', 'fluid'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'fluid'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'fluid'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = fluid_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'fluid'),
				'description' => esc_html__('Limit your navigation only through current category', 'fluid'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'fluid'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on single post pages', 'fluid'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = fluid_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'fluid'),
				'description' => esc_html__('Enabling this option will show author email', 'fluid'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		fluid_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'fluid'),
				'description' => esc_html__('Enabling this option will show author social icons on single post pages', 'fluid'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'fluid_edge_action_options_map', 'fluid_edge_blog_options_map', 13);
}