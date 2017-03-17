<?php

//top header bar
add_action('fluid_edge_action_before_page_header', 'fluid_edge_get_header_top');

//mobile header
add_action('fluid_edge_action_after_page_header', 'fluid_edge_get_mobile_header');