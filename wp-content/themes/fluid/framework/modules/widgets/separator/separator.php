<?php

class FluidEdgeClassSeparatorWidget extends FluidEdgeClassWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_separator_widget',
	        esc_html__('Edge Separator Widget', 'fluid'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'fluid'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'name' => 'type',
                'title' => esc_html__('Type', 'fluid'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'fluid'),
                    'full-width' => esc_html__('Full Width', 'fluid')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'fluid'),
                'options' => array(
                    'center' => esc_html__('Center', 'fluid'),
                    'left' => esc_html__('Left', 'fluid'),
                    'right' => esc_html__('Right', 'fluid')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'fluid'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'fluid'),
                    'dashed' => esc_html__('Dashed', 'fluid'),
                    'dotted' => esc_html__('Dotted', 'fluid')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'fluid')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'fluid')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'fluid')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'fluid')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'fluid')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-separator-widget">';
            echo do_shortcode("[edgtf_separator $params]"); // XSS OK
        echo '</div>';
    }
}