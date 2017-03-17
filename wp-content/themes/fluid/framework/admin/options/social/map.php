<?php

if (!function_exists('fluid_edge_social_options_map')) {

    function fluid_edge_social_options_map() {

        fluid_edge_add_admin_page(
            array(
                'slug' => '_social_page',
                'title' => esc_html__('Social Networks', 'fluid'),
                'icon' => 'fa fa-share-alt'
            )
        );

        /**
         * Enable Social Share
         */
        $panel_social_share = fluid_edge_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_social_share',
            'title' => esc_html__('Enable Social Share', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Social Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow social share on networks of your choice', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_panel_social_networks, #edgtf_panel_show_social_share_on'
            ),
            'parent' => $panel_social_share
        ));

        $panel_show_social_share_on = fluid_edge_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_show_social_share_on',
            'title' => esc_html__('Show Social Share On', 'fluid'),
            'hidden_property' => 'enable_social_share',
            'hidden_value' => 'no'
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share_on_post',
            'default_value' => 'no',
            'label' => esc_html__('Posts', 'fluid'),
            'description' => esc_html__('Show Social Share on Blog Posts', 'fluid'),
            'parent' => $panel_show_social_share_on
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share_on_page',
            'default_value' => 'no',
            'label' => esc_html__('Pages', 'fluid'),
            'description' => esc_html__('Show Social Share on Pages', 'fluid'),
            'parent' => $panel_show_social_share_on
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_social_share_on_portfolio-item',
            'default_value' => 'no',
            'label' => esc_html__('Portfolio Item', 'fluid'),
            'description' => esc_html__('Show Social Share for Portfolio Items', 'fluid'),
            'parent' => $panel_show_social_share_on
        ));

        if (fluid_edge_is_woocommerce_installed()) {
            fluid_edge_add_admin_field(array(
                'type' => 'yesno',
                'name' => 'enable_social_share_on_product',
                'default_value' => 'no',
                'label' => esc_html__('Product', 'fluid'),
                'description' => esc_html__('Show Social Share for Product Items', 'fluid'),
                'parent' => $panel_show_social_share_on
            ));
        }

        /**
         * Social Share Networks
         */
        $panel_social_networks = fluid_edge_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_social_networks',
            'title' => esc_html__('Social Networks', 'fluid'),
            'hidden_property' => 'enable_social_share',
            'hidden_value' => 'no'
        ));

        /**
         * Facebook
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'facebook_title',
            'title' => esc_html__('Share on Facebook', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_facebook_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via Facebook', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_facebook_share_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_facebook_share_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_facebook_share_container',
            'hidden_property' => 'enable_facebook_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'facebook_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_facebook_share_container
        ));

        /**
         * Twitter
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'twitter_title',
            'title' => esc_html__('Share on Twitter', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_twitter_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via Twitter', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_twitter_share_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_twitter_share_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_twitter_share_container',
            'hidden_property' => 'enable_twitter_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'twitter_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_twitter_share_container
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'text',
            'name' => 'twitter_via',
            'default_value' => '',
            'label' => esc_html__('Via', 'fluid'),
            'parent' => $enable_twitter_share_container
        ));

        /**
         * Google Plus
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'google_plus_title',
            'title' => esc_html__('Share on Google Plus', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_google_plus_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via Google Plus', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_google_plus_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_google_plus_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_google_plus_container',
            'hidden_property' => 'enable_google_plus_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'google_plus_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_google_plus_container
        ));

        /**
         * Linked In
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'linkedin_title',
            'title' => esc_html__('Share on LinkedIn', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_linkedin_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via LinkedIn', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_linkedin_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_linkedin_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_linkedin_container',
            'hidden_property' => 'enable_linkedin_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'linkedin_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_linkedin_container
        ));

        /**
         * Tumblr
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'tumblr_title',
            'title' => esc_html__('Share on Tumblr', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_tumblr_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via Tumblr', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_tumblr_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_tumblr_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_tumblr_container',
            'hidden_property' => 'enable_tumblr_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'tumblr_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_tumblr_container
        ));

        /**
         * Pinterest
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'pinterest_title',
            'title' => esc_html__('Share on Pinterest', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_pinterest_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via Pinterest', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_pinterest_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_pinterest_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_pinterest_container',
            'hidden_property' => 'enable_pinterest_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'pinterest_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_pinterest_container
        ));

        /**
         * VK
         */
        fluid_edge_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name' => 'vk_title',
            'title' => esc_html__('Share on VK', 'fluid')
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_vk_share',
            'default_value' => 'no',
            'label' => esc_html__('Enable Share', 'fluid'),
            'description' => esc_html__('Enabling this option will allow sharing via VK', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_vk_container'
            ),
            'parent' => $panel_social_networks
        ));

        $enable_vk_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_vk_container',
            'hidden_property' => 'enable_vk_share',
            'hidden_value' => 'no',
            'parent' => $panel_social_networks
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'vk_icon',
            'default_value' => '',
            'label' => esc_html__('Upload Icon', 'fluid'),
            'parent' => $enable_vk_container
        ));

        if (defined('EDGEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = fluid_edge_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'fluid'),
                'name' => 'panel_twitter',
                'page' => '_social_page'
            ));

            fluid_edge_add_admin_twitter_button(array(
                'name' => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if (defined('EDGEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = fluid_edge_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'fluid'),
                'name' => 'panel_instagram',
                'page' => '_social_page'
            ));

            fluid_edge_add_admin_instagram_button(array(
                'name' => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }

        /**
         * Open Graph
         */
        $panel_open_graph = fluid_edge_add_admin_panel(array(
            'page' => '_social_page',
            'name' => 'panel_open_graph',
            'title' => esc_html__('Open Graph', 'fluid'),
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'yesno',
            'name' => 'enable_open_graph',
            'default_value' => 'no',
            'label' => esc_html__('Enable Open Graph', 'fluid'),
            'description' => esc_html__('Enabling this option will allow usage of Open Graph protocol on your site', 'fluid'),
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#edgtf_enable_open_graph_container'
            ),
            'parent' => $panel_open_graph
        ));

        $enable_open_graph_container = fluid_edge_add_admin_container(array(
            'name' => 'enable_open_graph_container',
            'hidden_property' => 'enable_open_graph',
            'hidden_value' => 'no',
            'parent' => $panel_open_graph
        ));

        fluid_edge_add_admin_field(array(
            'type' => 'image',
            'name' => 'open_graph_image',
            'default_value' => EDGE_ASSETS_ROOT . '/img/open_graph.jpg',
            'label' => esc_html__('Default Share Image', 'fluid'),
            'parent' => $enable_open_graph_container,
            'description' => esc_html('Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'fluid'),
        ));

    }

    add_action('fluid_edge_action_options_map', 'fluid_edge_social_options_map', 18);
}