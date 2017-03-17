<?php

if (!function_exists('edgtf_core_map_portfolio_meta')) {
    function edgtf_core_map_portfolio_meta() {
        global $fluid_edge_global_Framework;

        $edgt_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $edgt_pages[$page->ID] = $page->post_title;
        }

        //Portfolio Images

        $edgtPortfolioImages = new FluidEdgeClassMetaBox('portfolio-item', esc_html__('Portfolio Images (multiple upload)', 'edgtf-core'), '', '', 'portfolio_images');
        $fluid_edge_global_Framework->edgtMetaBoxes->addMetaBox('portfolio_images', $edgtPortfolioImages);

        $edgtf_portfolio_image_gallery = new FluidEdgeClassMultipleImages('edgtf-portfolio-image-gallery', esc_html__('Portfolio Images', 'edgtf-core'), esc_html__('Choose your portfolio images', 'edgtf-core'));
        $edgtPortfolioImages->addChild('edgtf-portfolio-image-gallery', $edgtf_portfolio_image_gallery);

        //Portfolio Images/Videos 2

        $edgtPortfolioImagesVideos2 = new FluidEdgeClassMetaBox('portfolio-item', esc_html__('Portfolio Images/Videos (single upload)', 'edgtf-core'));
        $fluid_edge_global_Framework->edgtMetaBoxes->addMetaBox('portfolio_images_videos2', $edgtPortfolioImagesVideos2);

        $edgtf_portfolio_images_videos2 = new FluidEdgeClassImagesVideosFramework('', '');
        $edgtPortfolioImagesVideos2->addChild('edgt_portfolio_images_videos2', $edgtf_portfolio_images_videos2);

        //Portfolio Additional Sidebar Items

        $edgtAdditionalSidebarItems = fluid_edge_add_meta_box(
            array(
                'scope' => array('portfolio-item'),
                'title' => esc_html__('Additional Portfolio Sidebar Items', 'edgtf-core'),
                'name' => 'portfolio_properties'
            )
        );

        $edgt_portfolio_properties = fluid_edge_add_options_framework(
            array(
                'label' => esc_html__('Portfolio Properties', 'edgtf-core'),
                'name' => 'edgt_portfolio_properties',
                'parent' => $edgtAdditionalSidebarItems
            )
        );
    }

    add_action('fluid_edge_action_meta_boxes_map', 'edgtf_core_map_portfolio_meta', 40);
}