<?php

class FluidEdgeClassButtonWidget extends FluidEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_button_widget',
			esc_html__('Edge Button Widget', 'fluid'),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'fluid'))
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__('Type', 'fluid'),
				'options' => array(
					'solid'   => esc_html__('Solid', 'fluid'),
					'outline' => esc_html__('Outline', 'fluid'),
					'simple'  => esc_html__('Simple', 'fluid')
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'size',
				'title'   => esc_html__('Size', 'fluid'),
				'options' => array(
					'small'  => esc_html__('Small', 'fluid'),
					'medium' => esc_html__('Medium', 'fluid'),
					'large'  => esc_html__('Large', 'fluid'),
					'huge'   => esc_html__('Huge', 'fluid')
				),
				'description' => esc_html__('This option is only available for solid and outline button type', 'fluid')
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__('Text', 'fluid'),
				'default' => esc_html__('Button Text', 'fluid')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__('Link', 'fluid')
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__('Link Target', 'fluid'),
				'options' => fluid_edge_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__('Color', 'fluid')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__('Hover Color', 'fluid')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__('Background Color', 'fluid'),
				'description' => esc_html__('This option is only available for solid button type', 'fluid')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__('Hover Background Color', 'fluid'),
				'description' => esc_html__('This option is only available for solid button type', 'fluid')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__('Border Color', 'fluid'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'fluid')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__('Hover Border Color', 'fluid'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'fluid')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__('Margin', 'fluid'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fluid')
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
		$params = '';

		if (!is_array($instance)) { $instance = array(); }

		// Filter out all empty params
		$instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget edgtf-button-widget">';
			echo do_shortcode("[edgtf_button $params]"); // XSS OK
		echo '</div>';
	}
}