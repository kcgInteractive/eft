<?php

if(!function_exists('fluid_edge_map_woocommerce_meta')) {
    function fluid_edge_map_woocommerce_meta() {
        $woocommerce_meta_box = fluid_edge_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'fluid'),
                'name' => 'woo_product_meta'
            )
        );

        fluid_edge_add_meta_box_field(array(
            'name'        => 'edgtf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'fluid'),
            'description' => esc_html__('Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'fluid'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'edgtf-woo-image-normal-width' => esc_html__('Default', 'fluid'),
                'edgtf-woo-image-large-width'  => esc_html__('Large Width', 'fluid')
            )
        ));

        fluid_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'fluid'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'fluid'),
                'parent'        => $woocommerce_meta_box,
                'options'       => fluid_edge_get_yes_no_select_array()
            )
        );

        fluid_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_disable_page_content_top_padding_meta',
                'type'        => 'select',
                'label'       => esc_html__('Disable Content Top Padding', 'fluid'),
                'description' => esc_html__('Enabling this option will disable content top padding', 'fluid'),
                'parent'      => $woocommerce_meta_box,
                'options'     => fluid_edge_get_yes_no_select_array()
            )
        );
    }
	
    add_action('fluid_edge_action_meta_boxes_map', 'fluid_edge_map_woocommerce_meta', 99);
}