<?php

if ( ! function_exists('fluid_edge_like') ) {
	/**
	 * Returns FluidEdgeClassLike instance
	 *
	 * @return FluidEdgeClassLike
	 */
	function fluid_edge_like() {
		return FluidEdgeClassLike::get_instance();
	}
}

function fluid_edge_get_like() {

	echo wp_kses(fluid_edge_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('fluid_edge_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function fluid_edge_like_latest_posts() {
		return fluid_edge_like()->add_like();
	}
}

if ( ! function_exists('fluid_edge_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function fluid_edge_like_portfolio_list($portfolio_project_id) {
		return fluid_edge_like()->add_like_portfolio_list($portfolio_project_id);
	}
}