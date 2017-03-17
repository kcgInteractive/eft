<?php

if(!function_exists('edgtf_core_map_portfolio_settings_meta')) {
    function edgtf_core_map_portfolio_settings_meta() {
        $meta_box = fluid_edge_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'edgtf-core'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'edgtf-core'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'edgtf-core'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'edgtf-core'),
                'huge-images'       => esc_html__('Portfolio Full Width Images', 'edgtf-core'),
                'images'            => esc_html__('Portfolio Images', 'edgtf-core'),
                'small-images'      => esc_html__('Portfolio Small Images', 'edgtf-core'),
                'slider'            => esc_html__('Portfolio Slider', 'edgtf-core'),
                'small-slider'      => esc_html__('Portfolio Small Slider', 'edgtf-core'),
                'gallery'           => esc_html__('Portfolio Gallery', 'edgtf-core'),
                'small-gallery'     => esc_html__('Portfolio Small Gallery', 'edgtf-core'),
                'masonry'           => esc_html__('Portfolio Masonry', 'edgtf-core'),
                'small-masonry'     => esc_html__('Portfolio Small Masonry', 'edgtf-core'),
                'custom'            => esc_html__('Portfolio Custom', 'edgtf-core'),
                'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'edgtf-core')
            ),
            'args' => array(
	            'dependence' => true,
	            'show' => array(
		            ''                  => '',
	            	'huge-images'       => '',
		            'images'            => '',
		            'small-images'      => '',
		            'slider'            => '',
		            'small-slider'      => '',
		            'gallery'           => '#edgtf_edgtf_gallery_type_meta_container',
		            'small-gallery'     => '#edgtf_edgtf_gallery_type_meta_container',
		            'masonry'           => '#edgtf_edgtf_masonry_type_meta_container',
		            'small-masonry'     => '#edgtf_edgtf_masonry_type_meta_container',
		            'custom'            => '',
		            'full-width-custom' => ''
	            ),
	            'hide' => array(
		            ''                  => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
	            	'huge-images'       => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'images'            => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'small-images'      => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'slider'            => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'small-slider'      => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'gallery'           => '#edgtf_edgtf_masonry_type_meta_container',
		            'small-gallery'     => '#edgtf_edgtf_masonry_type_meta_container',
		            'masonry'           => '#edgtf_edgtf_gallery_type_meta_container',
		            'small-masonry'     => '#edgtf_edgtf_gallery_type_meta_container',
		            'custom'            => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container',
		            'full-width-custom' => '#edgtf_edgtf_gallery_type_meta_container, #edgtf_edgtf_masonry_type_meta_container'
	            )
            )
        ));
	
	    /***************** Gallery Layout *****************/
	
	    $gallery_type_meta_container = fluid_edge_add_admin_container(
		    array(
			    'parent' => $meta_box,
			    'name' => 'edgtf_gallery_type_meta_container',
			    'hidden_property' => 'edgtf_portfolio_single_template_meta',
			    'hidden_values' => array(
				    'huge-images',
				    'images',
				    'small-images',
				    'slider',
				    'small-slider',
				    'masonry',
				    'small-masonry',
				    'custom',
				    'full-width-custom'
			    )
		    )
	    );
	
	        fluid_edge_add_meta_box_field(array(
			    'name'        => 'edgtf_portfolio_single_gallery_columns_number_meta',
			    'type'        => 'select',
			    'label'       => esc_html__('Number of Columns', 'edgtf-core'),
			    'default_value' => '',
			    'description' => esc_html__('Set number of columns for portfolio gallery type', 'edgtf-core'),
			    'parent'      => $gallery_type_meta_container,
			    'options'     => array(
				    ''      => esc_html__('Default', 'edgtf-core'),
				    'two'   => esc_html__('2 Columns', 'edgtf-core'),
				    'three' => esc_html__('3 Columns', 'edgtf-core'),
				    'four'  => esc_html__('4 Columns', 'edgtf-core')
			    )
		    ));
	
	        fluid_edge_add_meta_box_field(array(
			    'name'        => 'edgtf_portfolio_single_gallery_space_between_items_meta',
			    'type'        => 'select',
			    'label'       => esc_html__('Space Between Items', 'edgtf-core'),
			    'default_value' => '',
			    'description' => esc_html__('Set space size between columns for portfolio gallery type', 'edgtf-core'),
			    'parent'      => $gallery_type_meta_container,
			    'options'     => array(
				    ''          => esc_html__('Default', 'edgtf-core'),
				    'normal'    => esc_html__('Normal', 'edgtf-core'),
				    'small'     => esc_html__('Small', 'edgtf-core'),
				    'tiny'      => esc_html__('Tiny', 'edgtf-core'),
				    'no'        => esc_html__('No Space', 'edgtf-core')
			    )
		    ));
	
	    /***************** Gallery Layout *****************/
	
	    /***************** Masonry Layout *****************/
	
	    $masonry_type_meta_container = fluid_edge_add_admin_container(
		    array(
			    'parent' => $meta_box,
			    'name' => 'edgtf_masonry_type_meta_container',
			    'hidden_property' => 'edgtf_portfolio_single_template_meta',
			    'hidden_values' => array(
				    'huge-images',
				    'images',
				    'small-images',
				    'slider',
				    'small-slider',
				    'gallery',
				    'small-gallery',
				    'custom',
				    'full-width-custom'
			    )
		    )
	    );
	
		    fluid_edge_add_meta_box_field(array(
			    'name'        => 'edgtf_portfolio_single_masonry_columns_number_meta',
			    'type'        => 'select',
			    'label'       => esc_html__('Number of Columns', 'edgtf-core'),
			    'default_value' => '',
			    'description' => esc_html__('Set number of columns for portfolio masonry type', 'edgtf-core'),
			    'parent'      => $masonry_type_meta_container,
			    'options'     => array(
				    ''      => esc_html__('Default', 'edgtf-core'),
				    'two'   => esc_html__('2 Columns', 'edgtf-core'),
				    'three' => esc_html__('3 Columns', 'edgtf-core'),
				    'four'  => esc_html__('4 Columns', 'edgtf-core')
			    )
		    ));
		
		    fluid_edge_add_meta_box_field(array(
			    'name'        => 'edgtf_portfolio_single_masonry_space_between_items_meta',
			    'type'        => 'select',
			    'label'       => esc_html__('Space Between Items', 'edgtf-core'),
			    'default_value' => '',
			    'description' => esc_html__('Set space size between columns for portfolio masonry type', 'edgtf-core'),
			    'parent'      => $masonry_type_meta_container,
			    'options'     => array(
				    ''          => esc_html__('Default', 'edgtf-core'),
				    'normal'    => esc_html__('Normal', 'edgtf-core'),
				    'small'     => esc_html__('Small', 'edgtf-core'),
				    'tiny'      => esc_html__('Tiny', 'edgtf-core'),
				    'no'        => esc_html__('No Space', 'edgtf-core')
			    )
		    ));
	
	    /***************** Masonry Layout *****************/

        fluid_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_portfolio_single_meta',
                'type' => 'select',
                'default_value' => '',
                'label'       => esc_html__('Show Title Area', 'edgtf-core'),
                'description' => esc_html__('Enabling this option will show title area on your single portfolio page', 'edgtf-core'),
                'parent'      => $meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'edgtf-core'),
                    'yes' => esc_html__('Yes', 'edgtf-core'),
                    'no' => esc_html__('No', 'edgtf-core')
                )
            )
        );

	    fluid_edge_add_meta_box_field(array(
		    'name'        => 'portfolio_info_top_padding',
		    'type'        => 'text',
		    'label'       => esc_html__('Portfolio Info Top Padding', 'edgtf-core'),
		    'description' => esc_html__('Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'edgtf-core'),
		    'parent'      => $meta_box,
		    'args'        => array(
			    'col_width' => 3,
			    'suffix' => 'px'
		    )
	    ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        fluid_edge_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'edgtf-core'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'edgtf-core'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        fluid_edge_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'edgtf-core'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'edgtf-core'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));
	
	    fluid_edge_add_meta_box_field(array(
		    'name' => 'edgtf_portfolio_masonry_fixed_dimensions_meta',
		    'type' => 'select',
		    'label' => esc_html__('Dimensions for Masonry - Image Fixed Proportion', 'edgtf-core'),
		    'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists whre image proportion is fixed', 'edgtf-core'),
		    'default_value' => 'default',
		    'parent' => $meta_box,
		    'options' => array(
			    'default' => esc_html__('Default', 'edgtf-core'),
			    'large-width' => esc_html__('Large Width', 'edgtf-core'),
			    'large-height' => esc_html__('Large Height', 'edgtf-core'),
			    'large-width-height' => esc_html__('Large Width/Height', 'edgtf-core')
		    )
	    ));
	
	    fluid_edge_add_meta_box_field(array(
		    'name' => 'edgtf_portfolio_masonry_original_dimensions_meta',
		    'type' => 'select',
		    'label' => esc_html__('Dimensions for Masonry - Image Original Proportion', 'edgtf-core'),
		    'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists whre image proportion is original', 'edgtf-core'),
		    'default_value' => 'default',
		    'parent' => $meta_box,
		    'options' => array(
			    'default' => esc_html__('Default', 'edgtf-core'),
			    'large-width' => esc_html__('Large Width', 'edgtf-core')
		    )
	    ));
    }

    add_action('fluid_edge_action_meta_boxes_map', 'edgtf_core_map_portfolio_settings_meta', 41);
}