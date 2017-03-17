<?php

if(!function_exists('fluid_edge_woocommerce_products_per_page')) {
    /**
     * Function that sets number of products per page. Default is 9
     * @return int number of products to be shown per page
     */
    function fluid_edge_woocommerce_products_per_page() {

        $products_per_page = 12;

        if(fluid_edge_options()->getOptionValue('edgtf_woo_products_per_page')) {
            $products_per_page = fluid_edge_options()->getOptionValue('edgtf_woo_products_per_page');
        }
        if(isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
            $products_per_page = 9999;
        }

        return $products_per_page;
    }
}


if(!function_exists('fluid_edge_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 4
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function fluid_edge_woocommerce_related_products_args($args) {

		$args['posts_per_page'] = 4;

		return $args;
	}
}

if(!function_exists('fluid_edge_woocommerce_thumbnails_per_row')) {
    /**
     * Function that sets number of thumbnails on single product page per row. Default is 4
     * @return int number of thumbnails to be shown on single product page per row
     */
    function fluid_edge_woocommerce_thumbnails_per_row() {

        return 4;
    }
}

if(!function_exists('fluid_edge_woocommerce_template_loop_product_title')) {
    /**
     * Function for overriding product title template in Product List Loop
     */
    function fluid_edge_woocommerce_template_loop_product_title() {

        $tag = fluid_edge_options()->getOptionValue('edgtf_products_list_title_tag');
        if($tag === '') {
            $tag = 'h5';
        }
        the_title('<'.$tag.' class="edgtf-product-list-title"><a href="'.get_the_permalink().'">', '</a></'.$tag.'>');
    }
}

if(!function_exists('fluid_edge_woocommerce_template_single_title')) {
    /**
     * Function for overriding product title template in Single Product template
     */
    function fluid_edge_woocommerce_template_single_title() {

        $tag = fluid_edge_options()->getOptionValue('edgtf_single_product_title_tag');
        if($tag === '') {
            $tag = 'h1';
        }
        the_title('<'.$tag.'  itemprop="name" class="edgtf-single-product-title">', '</'.$tag.'>');
    }
}

if(!function_exists('fluid_edge_woocommerce_sale_flash')) {
    /**
     * Function for overriding Sale Flash Template
     *
     * @return string
     */
    function fluid_edge_woocommerce_sale_flash() {

        return '<span class="edgtf-onsale">'.esc_html__('SALE', 'fluid').'</span>';
    }
}

if(!function_exists('fluid_edge_woocommerce_product_out_of_stock')) {
    /**
     * Function for adding Out Of Stock Template
     *
     * @return string
     */
    function fluid_edge_woocommerce_product_out_of_stock() {

        global $product;

        if(!$product->is_in_stock()) {
            print '<span class="edgtf-out-of-stock">'.esc_html__('SOLD OUT', 'fluid').'</span>';
        }
    }
}

if(!function_exists('fluid_edge_woocommerce_view_all_pagination')) {
    /**
     * Function for adding New WooCommerce Pagination Template
     *
     * @return string
     */
    function fluid_edge_woocommerce_view_all_pagination() {

        global $wp_query;

        if($wp_query->max_num_pages <= 1) {
            return;
        }

        $html = '';

        if(get_option('woocommerce_shop_page_id')) {
            $html .= '<div class="edgtf-woo-view-all-pagination">';
            $html .= '<a href="'.get_permalink(get_option('woocommerce_shop_page_id')).'?woo-products-count=view-all">'.esc_html__('Show All', 'fluid').'</a>';
            $html .= '</div>';
        }

        print $html;
    }
}

if(!function_exists('fluid_edge_woo_view_all_pagination_additional_tag_before')) {
    function fluid_edge_woo_view_all_pagination_additional_tag_before() {

        print '<div class="edgtf-woo-pagination-holder"><div class="edgtf-woo-pagination-inner">';
    }
}

if(!function_exists('fluid_edge_woo_view_all_pagination_additional_tag_after')) {
    function fluid_edge_woo_view_all_pagination_additional_tag_after() {

        print '</div></div>';
    }
}

if(!function_exists('fluid_edge_woocommerce_product_thumbnail_column_size')) {
    function fluid_edge_woocommerce_product_thumbnail_column_size() {

        return 3;
    }
}

if(!function_exists('fluid_edge_single_product_content_additional_tag_before')) {
    function fluid_edge_single_product_content_additional_tag_before() {

        print '<div class="edgtf-single-product-content">';
    }
}

if(!function_exists('fluid_edge_single_product_content_additional_tag_after')) {
    function fluid_edge_single_product_content_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_single_product_summary_additional_tag_before')) {
    function fluid_edge_single_product_summary_additional_tag_before() {

        print '<div class="edgtf-single-product-summary">';
    }
}

if(!function_exists('fluid_edge_single_product_summary_additional_tag_after')) {
    function fluid_edge_single_product_summary_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_pl_holder_additional_tag_before')) {
    function fluid_edge_pl_holder_additional_tag_before() {

        print '<div class="edgtf-pl-main-holder">';
    }
}

if(!function_exists('fluid_edge_pl_holder_additional_tag_after')) {
    function fluid_edge_pl_holder_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_pl_inner_additional_tag_before')) {
    function fluid_edge_pl_inner_additional_tag_before() {

        print '<div class="edgtf-pl-inner">';
    }
}

if(!function_exists('fluid_edge_pl_inner_additional_tag_after')) {
    function fluid_edge_pl_inner_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_pl_image_additional_tag_before')) {
    function fluid_edge_pl_image_additional_tag_before() {

        print '<div class="edgtf-pl-image">';
    }
}

if(!function_exists('fluid_edge_pl_image_additional_tag_after')) {
    function fluid_edge_pl_image_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_pl_inner_text_additional_tag_before')) {
    function fluid_edge_pl_inner_text_additional_tag_before() {

        print '<div class="edgtf-pl-text"><div class="edgtf-pl-text-outer"><div class="edgtf-pl-text-inner">';
    }
}

if(!function_exists('fluid_edge_pl_inner_text_additional_tag_after')) {
    function fluid_edge_pl_inner_text_additional_tag_after() {

        print '</div></div></div>';
    }
}

if(!function_exists('fluid_edge_pl_text_wrapper_additional_tag_before')) {
    function fluid_edge_pl_text_wrapper_additional_tag_before() {

        print '<div class="edgtf-pl-text-wrapper">';
    }
}

if(!function_exists('fluid_edge_pl_text_wrapper_additional_tag_after')) {
    function fluid_edge_pl_text_wrapper_additional_tag_after() {

        print '</div>';
    }
}

if(!function_exists('fluid_edge_pl_rating_additional_tag_before')) {
    function fluid_edge_pl_rating_additional_tag_before() {
        global $product;

        if(get_option('woocommerce_enable_review_rating') !== 'no') {

            $rating_html = $product->get_rating_html();

            if($rating_html !== '') {
                print '<div class="edgtf-pl-rating-holder">';
            }
        }
    }
}

if(!function_exists('fluid_edge_pl_rating_additional_tag_after')) {
    function fluid_edge_pl_rating_additional_tag_after() {
        global $product;

        if(get_option('woocommerce_enable_review_rating') !== 'no') {

            $rating_html = $product->get_rating_html();

            if($rating_html !== '') {
                print '</div>';
            }
        }
    }
}

if(!function_exists('fluid_edge_woocommerce_shop_loop_categories')) {
    function fluid_edge_woocommerce_shop_loop_categories() {
        global $product;
        $categories = $product->get_categories(', ');
	
	    $html = '';
        if(!empty($categories)) {
	        $html .= '<div class="edgtf-product-list-categories">';
	        $html .= $categories;
	        $html .= '</div>';
        }

        print $html;
    }
}