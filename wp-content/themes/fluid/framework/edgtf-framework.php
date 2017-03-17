<?php

require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.kses.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.layout1.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.layout2.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.layout3.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.optionsapi.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.framework.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.functions.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgtf.icons/edgtf.icons.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/admin/options/edgtf-options-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/admin/meta-boxes/edgtf-meta-boxes-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/modules/edgtf-modules-loader.php";

if(!function_exists('fluid_edge_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function fluid_edge_admin_scripts_init() {
        /**
         * @see EdgeSkinAbstract::registerScripts - hooked with 10
         * @see EdgeSkinAbstract::registerStyles - hooked with 10
         */
        do_action('fluid_edge_action_admin_scripts_init');
	}

	add_action('admin_init', 'fluid_edge_admin_scripts_init');
}

if(!function_exists('fluid_edge_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function fluid_edge_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');

        /**
         * @see EdgeSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('fluid_edge_action_enqueue_admin_styles');
	}
}

if(!function_exists('fluid_edge_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function fluid_edge_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script("edgtf-dependence", get_template_directory_uri().'/framework/admin/assets/js/edgtf-ui/edgtf-dependence.js', array(), false, true);
        wp_enqueue_script("edgtf-twitter-connect", get_template_directory_uri().'/framework/admin/assets/js/edgtf-twitter-connect.js', array(), false, true);

        /**
         * @see EdgeSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('fluid_edge_action_enqueue_admin_scripts');
	}
}

if(!function_exists('fluid_edge_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function fluid_edge_enqueue_meta_box_styles() {
        global $post;
		wp_enqueue_style( 'wp-color-picker' );
        if($post->post_type == 'team-member'){
            wp_enqueue_style("edgtf-jquery-ui", get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
        }

        /**
         * @see EdgeSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('fluid_edge_action_enqueue_meta_box_styles');
	}
}

if(!function_exists('fluid_edge_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function fluid_edge_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('edgtf-dependence');

        /**
         * @see EdgeSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('fluid_edge_action_enqueue_meta_box_scripts');
	}
}

if(!function_exists('fluid_edge_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 * @param $hook string current page hook to check
	 */
	function fluid_edge_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('edgtf-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/edgtf-nav-menu.js');
			wp_enqueue_style('edgtf-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/edgtf-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'fluid_edge_enqueue_nav_menu_script');
}

if(!function_exists('fluid_edge_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 * @param $hook string current page hook to check
	 */
	function fluid_edge_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('edgtf-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'fluid_edge_enqueue_widgets_admin_script');
}

if(!function_exists('fluid_edge_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function fluid_edge_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			fluid_edge_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'fluid_edge_enqueue_styles_slider_taxonomy');
}

if(!function_exists('fluid_edge_init_theme_options_array')) {
	/**
	 * Function that merges $fluid_edge_global_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function fluid_edge_init_theme_options_array() {
        global $fluid_edge_global_options, $fluid_edge_global_Framework;

		$db_options = get_option('edgt_options_fluid');

		//does edgt_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$fluid_edge_global_options  = array_merge($fluid_edge_global_Framework->edgtOptions->options, get_option('edgt_options_fluid'));
		} else {
			//options don't exists in db, take default ones
			$fluid_edge_global_options = $fluid_edge_global_Framework->edgtOptions->options;
		}
	}

	add_action('fluid_edge_action_after_options_map', 'fluid_edge_init_theme_options_array', 0);
}

if(!function_exists('fluid_edge_init_theme_options')) {
	/**
	 * Function that sets $fluid_edge_global_options variable if it does'nt exists
	 */
	function fluid_edge_init_theme_options() {
		global $fluid_edge_global_options;
		global $fluid_edge_global_Framework;
		if(isset($fluid_edge_global_options['reset_to_defaults'])) {
			if( $fluid_edge_global_options['reset_to_defaults'] == 'yes' ) delete_option( "edgt_options_fluid");
		}

		if (!get_option("edgt_options_fluid")) {
			add_option( "edgt_options_fluid",
				$fluid_edge_global_Framework->edgtOptions->options
			);

			$fluid_edge_global_options = $fluid_edge_global_Framework->edgtOptions->options;
		}
	}
}

if(!function_exists('fluid_edge_register_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function fluid_edge_register_theme_settings() {
		register_setting( 'fluid_edge_theme_menu', 'edgt_options' );
	}

	add_action('admin_init', 'fluid_edge_register_theme_settings');
}

if(!function_exists('fluid_edge_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function fluid_edge_get_admin_tab(){
		return isset($_GET['page']) ? fluid_edge_strafter($_GET['page'],'tab') : NULL;
	}
}

if(!function_exists('fluid_edge_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 * @param $string string where to search
	 * @param $substring string what to search for
	 * @return null|string string that comes after found string
	 */
	function fluid_edge_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if ($pos === false) {
			return NULL;
		}

		return(substr($string, $pos+strlen($substring)));
	}
}

if(!function_exists('fluid_edge_save_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_edgtf_save_options action.
	 */
	function fluid_edge_save_options() {
		global $fluid_edge_global_options;

		$_REQUEST = stripslashes_deep($_REQUEST);

        unset($_REQUEST['action']);

		$fluid_edge_global_options = array_merge($fluid_edge_global_options, $_REQUEST);

		update_option( 'edgt_options_fluid', $fluid_edge_global_options );

		do_action('fluid_edge_action_after_theme_option_save');
		echo esc_html__('Saved', 'fluid');

		die();
	}

	add_action('wp_ajax_fluid_edge_save_options', 'fluid_edge_save_options');
}

if(!function_exists('fluid_edge_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function fluid_edge_meta_box_add() {
		global $fluid_edge_global_Framework;
		
		foreach ($fluid_edge_global_Framework->edgtMetaBoxes->metaBoxes as $key=>$box ) {
			$hidden = false;
			if (!empty($box->hidden_property)) {
				foreach ($box->hidden_values as $value) {
					if (fluid_edge_option_get_value($box->hidden_property) == $value) {
						$hidden = true;
					}
				}
			}

			if(is_string($box->scope)) {
				$box->scope = array($box->scope);
			}

			if(is_array($box->scope) && count($box->scope)) {
				foreach($box->scope as $screen) {
					add_meta_box(
						'edgtf-meta-box-'.$key,
						$box->title,
                        'fluid_edge_render_meta_box',
						$screen,
						'advanced',
						'high',
						array( 'box' => $box)
					);

					if ($hidden) {
						add_filter('postbox_classes_'.$screen.'_edgtf-meta-box-'.$key, 'fluid_edge_meta_box_add_hidden_class');
					}
				}
			}
		}

		add_action('admin_enqueue_scripts', 'fluid_edge_enqueue_meta_box_styles');
		add_action('admin_enqueue_scripts', 'fluid_edge_enqueue_meta_box_scripts');
	}

	add_action('add_meta_boxes', 'fluid_edge_meta_box_add');
}

if(!function_exists('fluid_edge_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function fluid_edge_meta_box_save( $post_id, $post ) {
		global $fluid_edge_global_Framework;

		$nonces_array = array();
		$meta_boxes = fluid_edge_framework()->edgtMetaBoxes->getMetaBoxesByScope($post->post_type);

		if(is_array($meta_boxes) && count($meta_boxes)) {
			foreach($meta_boxes as $meta_box) {
				$nonces_array[] = 'fluid_edge_meta_box_'.$meta_box->name.'_save';
			}
		}

		if(is_array($nonces_array) && count($nonces_array)) {
			foreach($nonces_array as $nonce) {
				if(!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
					return;
				}
			}
		}
		
		$postTypes = apply_filters('fluid_edge_filter_meta_box_post_types_save', array('post', 'page'));

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!isset( $_POST[ '_wpnonce' ])) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach ($fluid_edge_global_Framework->edgtMetaBoxes->options as $key=>$box ) {

			if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

				$value = $_POST[$key];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}

		$portfolios = false;
		if (isset($_POST['optionLabel'])) {
			foreach ($_POST['optionLabel'] as $key => $value) {
				$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]);
				$portfolios = true;

			}
		}

		if ($portfolios) {
			update_post_meta( $post_id,  'edgt_portfolios', $portfolios_val );
		} else {
			delete_post_meta( $post_id, 'edgt_portfolios' );
		}

		$portfolio_images = false;
		if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
				$portfolio_images = true;
			}
		}

		if ($portfolio_images) {
			update_post_meta( $post_id,  'edgt_portfolio_images', $portfolio_images_val );
		} else {
			delete_post_meta( $post_id,  'edgt_portfolio_images' );
		}
	}

	add_action( 'save_post', 'fluid_edge_meta_box_save', 1, 2 );
}

if(!function_exists('fluid_edge_render_meta_box')) {
	/**
	 * Function that renders meta box
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function fluid_edge_render_meta_box($post, $metabox) {?>
		<div class="edgtf-meta-box edgtf-page">
			<div class="edgtf-meta-box-holder">
				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field('fluid_edge_meta_box_'.$metabox['args']['box']->name.'_save', 'fluid_edge_meta_box_'.$metabox['args']['box']->name.'_save'); ?>
			</div>
		</div>
	<?php
	}
}

if(!function_exists('fluid_edge_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 * @param array $classes array of classes
	 * @return array modified array of classes
	 */
	function fluid_edge_meta_box_add_hidden_class( $classes=array() ) {
		if( !in_array( 'edgtf-meta-box-hidden', $classes ) )
			$classes[] = 'edgtf-meta-box-hidden';

		return $classes;
	}
}

if(!function_exists('fluid_edge_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function fluid_edge_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( apply_filters('fluid_edge_filter_meta_box_post_types_remove', array( 'post', 'page')) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action('do_meta_boxes', 'fluid_edge_remove_default_custom_fields');
}

if(!function_exists('fluid_edge_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function fluid_edge_generate_icon_pack_options() {
        global $fluid_edge_global_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $fluid_edge_global_IconCollections->getIconCollection($icon_pack);

        if($collections_object) {
            $icons = $collections_object->getIconsArray();
            if(is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'fluid_edge_generate_icon_pack_options');
}

if(!function_exists('fluid_edge_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function fluid_edge_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['edgt_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['edgt_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'fluid_edge_save_dismisable_notice');
}

if(!function_exists('fluid_edge_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_edgt_twitter_obtain_request_token ajax action
     *
     * @see EdgeTwitterApi::obtainRequestToken()
     */
    function fluid_edge_hook_twitter_request_ajax() {
        EdgefTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_edgt_twitter_obtain_request_token', 'fluid_edge_hook_twitter_request_ajax');
}

if (!function_exists('fluid_edge_comment')) {
    /**
     * Function which modify default wordpress comments
     *
     * @return comments html
     */
    function fluid_edge_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;

        global $post;

        $is_pingback_comment = $comment->comment_type == 'pingback';
        $is_author_comment  = $post->post_author == $comment->user_id;

        $comment_class = 'edgtf-comment clearfix';

        if($is_author_comment) {
            $comment_class .= ' edgtf-post-author-comment';
        }

        if($is_pingback_comment) {
            $comment_class .= ' edgtf-pingback-comment';
        }
        ?>

        <li>
        <div class="<?php echo esc_attr($comment_class); ?>">
            <?php if(!$is_pingback_comment) { ?>
                <div class="edgtf-comment-image"> <?php echo fluid_edge_kses_img(get_avatar($comment, 'thumbnail')); ?> </div>
            <?php } ?>
            <div class="edgtf-comment-text">
                <div class="edgtf-comment-date"><?php comment_time(get_option('date_format')); ?></div>
                <?php
                comment_reply_link( array_merge( $args, array('reply_text' => esc_html__('reply', 'fluid'), 'depth' => $depth, 'max_depth' => $args['max_depth'])));
                edit_comment_link(esc_html__('edit','fluid'));
                ?>
                <div class="edgtf-comment-info">
                    <h4 class="edgtf-comment-name">
                        <?php if($is_pingback_comment) { esc_html_e('Pingback:', 'fluid'); } ?>
                        <?php echo wp_kses_post(get_comment_author_link()); ?>
                    </h4>
                </div>
                <?php if(!$is_pingback_comment) { ?>
                    <div class="edgtf-text-holder" id="comment-<?php echo comment_ID(); ?>">
                        <?php comment_text(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php //li tag will be closed by WordPress after looping through child elements ?>
        <?php
    }
}
?>