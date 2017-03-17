<?php
	$i = 0;
	$t = 0;
	$im = 0;
	$p = isset($custom_titles_num_value) && $custom_titles_num_value !== '' ? intval($custom_titles_num_value) : 1;
?>

<div class="edgtf-image-gallery">
	<div class="edgtf-ig-grid <?php echo esc_attr($gallery_classes); ?>">
        <?php $rand = rand(0,1000); ?>
		<?php foreach ($images as $image) { $im = $im + 1; ?>
			<div class="edgtf-ig-image">
				<?php if(!empty($images_mark) && in_array($im, $images_mark)) { ?>
					<div class="edgtf-ig-image-mark"><?php esc_html_e('New', 'edgtf-core'); ?></div>
				<?php } ?>
				<?php if ($pretty_photo) { ?>
					<a itemprop="image" class="edgtf-ig-lightbox" href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['title']); ?>">
				<?php } else if($enable_links){ ?>
	                <a itemprop="url" class="edgtf-ig-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['title']); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
	            <?php } ?>
					<?php if(is_array($image_size) && count($image_size)) : ?>
						<?php echo fluid_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
					<?php else: ?>
						<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
					<?php endif; ?>
	            <?php if ($pretty_photo || $enable_links) { ?>
					</a>
				<?php } ?>
				<?php if(count($titles)): ?>
					<div class="edgtf-ig-image-title-holder">
						<?php if($custom_titles_num === 'yes'): ?>
							<span class="edgtf-ig-image-title-prefix"><?php echo str_pad($p++, 2, '0', STR_PAD_LEFT); ?></span>
						<?php endif; ?>
						<span class="edgtf-ig-image-title"><?php echo esc_html($titles[$t++]); ?></span>
					</div>
				<?php endif; ?>
			</div>
		<?php } ?>
	</div>
</div>