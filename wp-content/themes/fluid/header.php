<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * fluid_edge_action_header_meta hook
     *
     * @see fluid_edge_header_meta() - hooked with 10
     * @see fluid_edge_user_scalable_meta - hooked with 10
     */
    do_action('fluid_edge_action_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
    <?php
    /**
     * fluid_edge_action_after_body_tag hook
     *
     * @see fluid_edge_get_side_area() - hooked with 10
     * @see fluid_edge_smooth_page_transitions() - hooked with 10
     */
    do_action('fluid_edge_action_after_body_tag'); ?>

    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            <?php fluid_edge_get_header(); ?>
	
	        <?php
	        /**
	         * fluid_edge_action_after_header_area hook
	         *
	         * @see fluid_edge_back_to_top_button() - hooked with 10
	         * @see fluid_edge_get_full_screen_menu() - hooked with 10
	         */
	        do_action('fluid_edge_action_after_header_area'); ?>
	        
            <div class="edgtf-content" <?php fluid_edge_content_elem_style_attr(); ?>>
                <div class="edgtf-content-inner">