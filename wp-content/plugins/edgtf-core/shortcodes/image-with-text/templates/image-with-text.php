<div class="edgtf-image-with-text-holder">
    <div class="edgtf-iwt-image">
        <?php if ($enable_lightbox) { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo fluid_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        <?php if ($enable_lightbox) { ?>
            </a>
        <?php } ?>
    </div>
    <div class="edgtf-iwt-text-holder">
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="edgtf-iwt-title" <?php echo fluid_edge_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="edgtf-iwt-text" <?php echo fluid_edge_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
</div>