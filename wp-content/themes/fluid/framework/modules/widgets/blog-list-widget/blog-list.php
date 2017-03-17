<?php

class FluidEdgeClassBlogListWidget extends FluidEdgeClassWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_blog_list_widget',
            esc_html__('Edge Blog List Widget', 'fluid'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'fluid'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'fluid')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'type',
                'title'   => esc_html__('Type', 'fluid'),
                'options' => array(
                    'simple'  => esc_html__('Simple', 'fluid'),
                    'minimal' => esc_html__('Minimal', 'fluid')
                )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'fluid')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'space_between_columns',
                'title'   => esc_html__('Space Between items', 'fluid'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'fluid'),
                    'small'  => esc_html__('Small', 'fluid'),
                    'tiny'   => esc_html__('Tiny', 'fluid'),
                    'no'     => esc_html__('No Space', 'fluid')
                )
            ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order_by',
		        'title'   => esc_html__('Order By', 'fluid'),
		        'options' => fluid_edge_get_query_order_by_array()
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order',
		        'title'   => esc_html__('Order', 'fluid'),
		        'options' => fluid_edge_get_query_order_array()
	        ),
            array(
                'type'        => 'textfield',
                'name'        => 'category',
                'title'       => esc_html__('Category Slug', 'fluid'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'fluid')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_tag',
                'title'   => esc_html__('Title Tag', 'fluid'),
                'options' => fluid_edge_get_title_tag(true)
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_transform',
                'title'   => esc_html__('Title Text Transform', 'fluid'),
                'options' => fluid_edge_get_text_transform_array(true)
            ),
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $params = '';

        if (!is_array($instance)) { $instance = array(); }

        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        $available_types = array('simple', 'classic');

        if (!in_array($instance['type'], $available_types)) {
            $instance['type'] = 'simple';
        }

        echo '<div class="widget edgtf-blog-list-widget">';
            if(!empty($instance['widget_title'])) {
                print $args['before_title'].$instance['widget_title'].$args['after_title'];
            }

            echo do_shortcode("[edgtf_blog_list $params]"); // XSS OK
        echo '</div>';
    }
}