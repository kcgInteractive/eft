<?php

class FluidEdgeClassRawHTMLWidget extends FluidEdgeClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'edgtf_raw_html_widget',
			esc_html__( 'Edge Raw HTML Widget', 'fluid' ),
			array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'fluid' ) )
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
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'fluid' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'fluid' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'widget_grid',
				'title'   => esc_html__('Widget Grid', 'fluid'),
				'options' => array(
					''     => esc_html__('Full Width', 'fluid'),
					'auto' => esc_html__('Auto', 'fluid')
				)
			),
			array(
				'type'  => 'textarea',
				'name'  => 'content',
				'title' => esc_html__( 'Content', 'fluid' )
			)
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$extra_class   = array();
		$extra_class[] = !empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$extra_class[] = !empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'edgtf-grid-auto-width' : '';
		?>
		
		<div class="widget edgtf-raw-html-widget <?php echo esc_attr( implode( $extra_class ) ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				print $args['before_title'] . esc_html( $instance['widget_title'] ) . $args['after_title'];
			}
			if ( ! empty( $instance['content'] ) ) {
				echo wp_kses( $instance['content'], array(
					'div'    => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'p'      => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'span'   => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'a'      => array(
						'class'  => true,
						'style'  => true,
						'id'     => true,
						'href'   => true,
						'target' => true
					),
					'br'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array()
				) );
			}
			?>
		</div>
		<?php
	}
}