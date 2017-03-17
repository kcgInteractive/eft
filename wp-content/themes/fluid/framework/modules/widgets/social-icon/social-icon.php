<?php

class FluidEdgeClassSocialIconWidget extends FluidEdgeClassWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_social_icon_widget',
            esc_html__('Edge Social Icon Widget', 'fluid'),
            array( 'description' => esc_html__( 'Add social network icons to widget areas', 'fluid'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            fluid_edge_icon_collections()->getSocialIconWidgetParamsArray(),
            array(
                array(
                    'type' => 'textfield',
                    'name' => 'link',
                    'title' => esc_html__('Link', 'fluid')
                ),
                array(
                    'type' => 'dropdown',
                    'name' => 'target',
                    'title' => esc_html__('Target', 'fluid'),
                    'options' => array(
                        '_self' => esc_html__('Same Window', 'fluid'),
                        '_blank' => esc_html__('New Window', 'fluid')
                    )
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'icon_size',
                    'title' => esc_html__('Icon Size (px)', 'fluid')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'color',
                    'title' => esc_html__('Color', 'fluid')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'hover_color',
                    'title' => esc_html__('Hover Color', 'fluid')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'margin',
                    'title' => esc_html__('Margin', 'fluid'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fluid')
                ),
	            array(
		            'type' => 'textfield',
		            'name' => 'padding',
		            'title' => esc_html__('Padding', 'fluid'),
		            'description' => esc_html__('Insert padding in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fluid')
	            ),
	            array(
		            'type' => 'textfield',
		            'name' => 'border',
		            'title' => esc_html__('Border Right', 'fluid'),
		            'description' => esc_html__('Insert border right width (e.g 1px). Leave empty to exclude border.', 'fluid')
	            ),
	            array(
		            'type' => 'textfield',
		            'name' => 'border_color',
		            'title' => esc_html__('Border Color', 'fluid')
	            ),
	            array(
		            'type' => 'textfield',
		            'name' => 'text',
		            'title' => esc_html__('Text', 'fluid'),
		            'description' => esc_html__('Insert text that will appear next to the icon.', 'fluid')
	            ),
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
        $icon_styles = array();
	    $holder_styles = array();
	    $text_styles = array();
	    $has_border = false;

        if (!empty($instance['color'])) {
            $icon_styles[] = 'color: '.$instance['color'].';';
        }

        if (!empty($instance['icon_size'])) {
            $icon_styles[] = 'font-size: '.fluid_edge_filter_px($instance['icon_size']).'px;';
        }

        if (!empty($instance['margin'])) {
            $icon_styles[] = 'margin: '.$instance['margin'].';';
        }

	    if (!empty($instance['padding'])) {
		    $holder_styles[] = 'padding: '.$instance['padding'].';';
	    }

	    if (!empty($instance['border']) && !empty($instance['border_color']) ) {
		    $holder_styles[] = 'border-right: '.$instance['border'].' solid '.$instance['border_color'].';';
		    $has_border = true;
	    } else if( !empty($instance['border']) ) {
		    $holder_styles[] = 'border-right: '.$instance['border'].' solid #ddd;';
		    $has_border = true;
	    }

	    if (!empty($instance['icon_size'])) {
		    $text_styles[] = 'font-size: '.fluid_edge_filter_px($instance['icon_size']-3).'px;';
	    }

        $link = '#';
        if (!empty($instance['link'])) {
            $link = $instance['link'];
        }

        $target = '_self';
        if (!empty($instance['target'])) {
            $target = $instance['target'];
        }

        $original_color = '';
        if (!empty($instance['color'])) {
            $original_color = $instance['color'];
        }

        $hover_color = '';
        if (!empty($instance['hover_color'])) {
            $hover_color = $instance['hover_color'];
        }

        $icon_html = 'fa-facebook';
        $icon_holder_html = '';
        if (!empty($instance['icon_pack']) && $instance['icon_pack'] !== '') {
            if (!empty($instance['fa_icon']) && $instance['fa_icon'] !== '' && $instance['icon_pack'] === 'font_awesome') {
                $icon_html = $instance['fa_icon'];
                $icon_holder_html = '<i class="edgtf-social-icon-widget fa '.$icon_html.'" '.fluid_edge_get_inline_style($holder_styles).'></i>';
            } else if (!empty($instance['fe_icon']) && $instance['fe_icon'] !== '' && $instance['icon_pack'] === 'font_elegant') {
                $icon_html = $instance['fe_icon'];
                $icon_holder_html = '<span class="edgtf-social-icon-widget '.$icon_html.'" '.fluid_edge_get_inline_style($holder_styles).'></span>';
            } else if (!empty($instance['ion_icon']) && $instance['ion_icon'] !== '' && $instance['icon_pack'] === 'ion_icons') {
                $icon_html = $instance['ion_icon'];
                $icon_holder_html = '<span class="edgtf-social-icon-widget '.$icon_html.'" '.fluid_edge_get_inline_style($holder_styles).'></span>';
            } else if (!empty($instance['simple_line_icons']) && $instance['simple_line_icons'] !== '' && $instance['icon_pack'] === 'simple_line_icons') {
                $icon_html = $instance['simple_line_icons'];
                $icon_holder_html = '<span class="edgtf-social-icon-widget '.$icon_html.'" '.fluid_edge_get_inline_style($holder_styles).'></span>';
            } else {
                $icon_holder_html = '<i class="edgtf-social-icon-widget fa '.$icon_html.'" '.fluid_edge_get_inline_style($holder_styles).'></i>';
            }
        }

	    if (!empty($instance['text'])) {
		    $icon_holder_html .= '<span class="edgtf-social-icon-text" '.fluid_edge_get_inline_style($text_styles).'>'.$instance['text'].'</span>';
	    }
        ?>

        <a class="edgtf-social-icon-widget-holder edgtf-icon-has-hover <?php echo ($has_border ? 'edgtf-si-has-border' : '')?>" <?php echo fluid_edge_get_inline_attr($hover_color, 'data-hover-color'); ?> <?php echo fluid_edge_get_inline_attr($original_color, 'data-original-color'); ?> <?php fluid_edge_inline_style($icon_styles); ?> href="<?php echo esc_html($link); ?>" target="<?php echo esc_attr($target); ?>">
            <?php print $icon_holder_html; ?>
        </a>
    <?php
    }
}