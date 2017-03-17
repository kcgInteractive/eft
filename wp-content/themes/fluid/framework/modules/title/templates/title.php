<?php do_action('fluid_edge_action_before_page_title'); ?>
<div class="edgtf-title <?php echo fluid_edge_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
    <?php if(!empty($title_background_image_src)) { ?>
        <div class="edgtf-title-image">
            <img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="<?php esc_html_e('Title Image', 'fluid'); ?>" />
        </div>
    <?php } ?>
    <div class="edgtf-title-holder" <?php fluid_edge_inline_style($title_holder_height); ?>>
        <div class="edgtf-container clearfix">
            <div class="edgtf-container-inner">
                <div class="edgtf-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                    <div class="edgtf-title-subtitle-holder-inner">
                        <?php switch ($type){
                            case 'standard': ?>
                                <?php if(fluid_edge_get_title_text() !== '') { ?>
                                    <<?php echo esc_attr($title_tag); ?> class="edgtf-page-title entry-title" <?php fluid_edge_inline_style($title_color); ?>><span><?php fluid_edge_title_text(); ?></span></<?php echo esc_attr($title_tag); ?>>
                                <?php } ?>
                                <?php if($has_subtitle){ ?>
                                    <span class="edgtf-subtitle" <?php fluid_edge_inline_style($subtitle_styles); ?>><span><?php fluid_edge_subtitle_text(); ?></span></span>
                                <?php } ?>
                                <?php if($enable_breadcrumbs){ ?>
                                    <div class="edgtf-breadcrumbs-holder"> <?php fluid_edge_custom_breadcrumbs(); ?></div>
                                <?php } ?>
                            <?php break;
                            case 'breadcrumb': ?>
                                <div class="edgtf-breadcrumbs-holder"> <?php fluid_edge_custom_breadcrumbs(); ?></div>
                            <?php break;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('fluid_edge_action_after_page_title'); ?>
