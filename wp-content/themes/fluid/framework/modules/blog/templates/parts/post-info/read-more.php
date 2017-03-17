<div class="edgtf-post-read-more-button">
<?php
    if(fluid_edge_core_plugin_installed()) {
        echo fluid_edge_get_button_html(
            apply_filters(
                'fluid_edge_filter_blog_template_read_more_button',
                array(
                    'type'          => 'simple',
                    'size'          => 'medium',
                    'link'          => get_the_permalink(),
                    'text'          => esc_html__('Read more', 'fluid'),
	                'icon_pack'     => 'ion_icons',
                    'ion_icon'      => 'ion-android-arrow-forward',
                    'custom_class'  => 'edgtf-blog-list-button'
                )
            )
        );
    } else { ?>
        <a itemprop="url" href="<?php echo esc_attr(get_the_permalink()); ?>" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-simple edgtf-blog-list-button">
            <span class="edgtf-btn-text">
                <?php echo esc_html__('Read more', 'fluid'); ?>
	            <i class="edgtf-icon-ion-icon ion-android-arrow-forward"></i>
            </span>
        </a>
<?php } ?>
</div>
