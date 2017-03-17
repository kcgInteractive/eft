<?php
namespace EdgeCore\CPT\Shortcodes\ProductList;

use EdgeCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_product_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Edge Product List', 'fluid' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by EDGE', 'fluid' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'fluid' ),
							'value'       => array(
								esc_html__( 'Standard', 'fluid' ) => 'standard',
								esc_html__( 'Masonry', 'fluid' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'fluid' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'fluid' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'fluid' )    => 'info-below-image'
							),
							'admin_label' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'fluid' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'fluid' ),
							'value'       => array(
								esc_html__( 'One', 'fluid' )   => '1',
								esc_html__( 'Two', 'fluid' )   => '2',
								esc_html__( 'Three', 'fluid' ) => '3',
								esc_html__( 'Four', 'fluid' )  => '4',
								esc_html__( 'Five', 'fluid' )  => '5',
								esc_html__( 'Six', 'fluid' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'space_between_items',
							'heading'    => esc_html__( 'Space Between Items', 'fluid' ),
							'value'      => array(
								esc_html__( 'Normal', 'fluid' )   => 'normal',
								esc_html__( 'Small', 'fluid' )    => 'small',
								esc_html__( 'Tiny', 'fluid' )     => 'tiny',
								esc_html__( 'No Space', 'fluid' ) => 'no'
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__( 'Order By', 'fluid' ),
							'value'       => array_flip( fluid_edge_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'fluid' ),
							'value'       => array_flip( fluid_edge_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'fluid' ),
							'value'       => array(
								esc_html__( 'Category', 'fluid' ) => 'category',
								esc_html__( 'Tag', 'fluid' )      => 'tag',
								esc_html__( 'Id', 'fluid' )       => 'id'
							),
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'fluid' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'fluid' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'fluid' ),
							'value'      => array(
								esc_html__( 'Default', 'fluid' )        => '',
								esc_html__( 'Original', 'fluid' )       => 'full',
								esc_html__( 'Square', 'fluid' )         => 'square',
								esc_html__( 'Landscape', 'fluid' )      => 'landscape',
								esc_html__( 'Portrait', 'fluid' )       => 'portrait',
								esc_html__( 'Medium', 'fluid' )         => 'medium',
								esc_html__( 'Large', 'fluid' )          => 'large',
								esc_html__( 'Shop Catalog', 'fluid' )   => 'shop_catalog',
								esc_html__( 'Shop Single', 'fluid' )    => 'shop_single',
								esc_html__( 'Shop Thumbnail', 'fluid' ) => 'shop_thumbnail'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'fluid' ),
							'value'      => array(
								esc_html__( 'Default', 'fluid' ) => 'default',
								esc_html__( 'Light', 'fluid' )   => 'light',
								esc_html__( 'Dark', 'fluid' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'fluid' ),
							'description' => esc_html__( 'Number of characters', 'fluid' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'fluid' ),
							'value'      => array_flip( fluid_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'fluid' ),
							'value'      => array(
								esc_html__( 'Default', 'fluid' ) => 'default',
								esc_html__( 'Light', 'fluid' )   => 'light',
								esc_html__( 'Dark', 'fluid' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'fluid' ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'fluid' ),
							'value'      => array(
								esc_html__( 'Default', 'fluid' ) => '',
								esc_html__( 'Left', 'fluid' )    => 'left',
								esc_html__( 'Center', 'fluid' )  => 'center',
								esc_html__( 'Right', 'fluid' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'fluid' ),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fluid' )
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'type'					  => 'standard',
			'info_position'			  => 'info-on-image',
            'number_of_posts' 		  => '8',
            'number_of_columns' 	  => '4',
            'space_between_items'	  => 'normal',
            'order_by' 				  => 'date',
            'order' 				  => 'ASC',
            'taxonomy_to_display' 	  => 'category',
            'taxonomy_values' 		  => '',
            'image_size'			  => 'full',
            'display_title' 		  => 'yes',
			'product_info_skin'       => '',
            'title_tag'				  => 'h5',
            'title_transform'		  => '',
			'display_category'        => 'no',
            'display_excerpt' 		  => 'no',
            'excerpt_length' 		  => '20',
			'display_rating' 		  => 'yes',
			'display_price' 		  => 'yes',
            'display_button' 		  => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
            'info_bottom_margin' 	  => ''
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['class_name'] = 'pli';
		
		$params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
		
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);
		
		$params['shader_styles'] = $this->getShaderStyles($params);

		$params['text_wrapper_styles'] = $this->getTextWrapperStyles($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;

		$html = fluid_edge_get_woo_shortcode_module_template_part('templates/product-list-'.$params['type'], 'product-list', '', $params);
		
		return $html;
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getHolderClasses($params){
		$holderClasses = '';

		$productListType = !empty($params['type']) ? 'edgtf-'.$params['type'].'-layout' : 'edgtf-standard-layout';

        $columnsSpace = !empty($params['space_between_items']) ? 'edgtf-'.$params['space_between_items'].'-space' : 'edgtf-normal-space';

        $columnNumber = $this->getColumnNumberClass($params);

		$infoPosition = !empty($params['info_position']) ? 'edgtf-'.$params['info_position'] : 'edgtf-info-on-image';
		
		$productInfoClasses = !empty($params['product_info_skin']) ? 'edgtf-product-info-'.$params['product_info_skin'] : '';

        $holderClasses .= $productListType . ' ' . $columnsSpace . ' ' . $columnNumber . ' ' . $infoPosition . ' ' . $productInfoClasses;
		
		return $holderClasses;
	}

    /**
     * Generates columns number classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnNumberClass($params){
        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'edgtf-one-column';
                break;
            case 2:
                $columnsNumber = 'edgtf-two-columns';
                break;
            case 3:
                $columnsNumber = 'edgtf-three-columns';
                break;
            case 4:
                $columnsNumber = 'edgtf-four-columns';
                break;
            case 5:
                $columnsNumber = 'edgtf-five-columns';
                break;
            case 6:
                $columnsNumber = 'edgtf-six-columns';
                break;        
            default:
                $columnsNumber = 'edgtf-four-columns';
                break;
        }

        return $columnsNumber;
    }

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateProductQueryArray($params){
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order']
		);

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
	}

	/**
     * Return Style for Title
     *
     * @param $params
     * @return string
     */
    public function getTitleStyles($params) {
        $styles = array();
	
	    if (!empty($params['title_transform'])) {
		    $styles[] = 'text-transform: '.$params['title_transform'];
	    }

		return implode(';', $styles);
    }

    /**
     * Return Style for Shader
     *
     * @param $params
     * @return string
     */
	public function getShaderStyles($params) {
	    $styles = array();
	
	    if (!empty($params['shader_background_color'])) {
		    $styles[] = 'background-color: '.$params['shader_background_color'];
	    }

		return implode(';', $styles);
    }

    /**
     * Return Style for Text Wrapper Holder
     *
     * @param $params
     * @return string
     */
	public function getTextWrapperStyles($params) {
	    $styles = array();
	
	    if (!empty($params['info_bottom_text_align'])) {
		    $styles[] = 'text-align: '.$params['info_bottom_text_align'];
	    }
		
        if ($params['info_bottom_margin'] !== '') {
	        $styles[] = 'margin-bottom: '.fluid_edge_filter_px($params['info_bottom_margin']).'px';
        }

		return implode(';', $styles);
    }
}