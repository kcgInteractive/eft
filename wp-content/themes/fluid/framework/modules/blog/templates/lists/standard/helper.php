<?php

if( !function_exists('fluid_edge_get_blog_holder_params') ) {
    /**
     * Function that generates params for holders on blog templates
     */
    function fluid_edge_get_blog_holder_params($params) {
        $params_list = array();

        $params_list['holder'] = 'edgtf-container';
        $params_list['inner'] = 'edgtf-container-inner clearfix';

        return $params_list;
    }

    add_filter( 'fluid_edge_filter_blog_holder_params', 'fluid_edge_get_blog_holder_params' );
}

if( !function_exists('fluid_edge_blog_part_params') ) {
    function fluid_edge_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h3';
        $part_params['link_tag'] = 'h5';
        $part_params['quote_tag'] = 'h5';
	
	    $featured_image_size = fluid_edge_get_meta_field_intersect('standard_featured_image_size', fluid_edge_get_page_id());
	    if(!empty($featured_image_size)) {
		    $part_params['featured_image_size'] = $featured_image_size;
	    }

        return array_merge($params, $part_params);
    }

    add_filter( 'fluid_edge_filter_blog_part_params', 'fluid_edge_blog_part_params' );
}