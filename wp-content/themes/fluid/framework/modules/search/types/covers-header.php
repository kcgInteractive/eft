<?php

if( !function_exists('fluid_edge_search_body_class') ) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function fluid_edge_search_body_class($classes) {

        $classes[] = 'edgtf-search-covers-header';

        return $classes;

    }

    add_filter('body_class', 'fluid_edge_search_body_class');
}

if ( ! function_exists('fluid_edge_get_search') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function fluid_edge_get_search() {

        $containing_sidebar = fluid_edge_active_widget( false, false, 'edgtf_search_opener' );

        foreach ($containing_sidebar as $sidebar) {

            if ( strpos( $sidebar, 'top-bar' ) !== false ) {
                add_action( 'fluid_edge_action_after_header_top_html_open', 'fluid_edge_load_search_template');
            } else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
                add_action( 'fluid_edge_action_after_header_menu_area_html_open', 'fluid_edge_load_search_template');
            } else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
                add_action( 'fluid_edge_action_after_mobile_header_html_open', 'fluid_edge_load_search_template');
            } else if ( strpos( $sidebar, 'logo' ) !== false ) {
                add_action( 'fluid_edge_action_after_header_logo_area_html_open', 'fluid_edge_load_search_template');
            } else if ( strpos( $sidebar, 'sticky' ) !== false ) {
                add_action( 'fluid_edge_action_after_sticky_menu_html_open', 'fluid_edge_load_search_template');
            }
            else {
                add_action( 'fluid_edge_action_after_header_menu_area_html_open', 'fluid_edge_load_search_template');
            }

        }
    }

    add_action('fluid_edge_action_before_page_header', 'fluid_edge_get_search', 9);
}

if ( ! function_exists('fluid_edge_load_search_template') ) {
    /**
     * Loads search HTML based on search type option.
     */
	function fluid_edge_load_search_template() {
		    $search_icon       = '';
		    $search_icon_close = '';

		    $search_in_grid   = fluid_edge_options()->getOptionValue( '$search_in_grid' ) == 'yes' ? true : false;
		    $search_icon_pack = fluid_edge_options()->getOptionValue( 'search_icon_pack' );

		    if ( ! empty( $search_icon_pack ) ) {
			    $search_icon       = fluid_edge_icon_collections()->getSearchIcon( $search_icon_pack, true );
			    $search_icon_close = fluid_edge_icon_collections()->getSearchClose( $search_icon_pack, true );
		    }

		    $parameters = array(
			    'search_in_grid'    => $search_in_grid,
			    'search_icon'       => $search_icon,
			    'search_icon_close' => $search_icon_close
		    );

		    fluid_edge_get_module_template_part( 'templates/types/covers-header', 'search', '', $parameters );
    }
}