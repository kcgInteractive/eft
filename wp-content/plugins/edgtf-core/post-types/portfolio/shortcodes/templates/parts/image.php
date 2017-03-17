<?php
$thumb_size = $this_object->getImageSize($params);
?>
<div class="edgtf-pli-image">
	<?php if(has_post_thumbnail()) { ?>
		<?php echo get_the_post_thumbnail(get_the_ID(), $thumb_size); ?>
	<?php } else { ?>
		<img itemprop="image" class="edgtf-pl-original-image" width="800" height="600" src="<?php echo EDGE_CORE_CPT_URL_PATH.'/portfolio/assets/img/portfolio_featured_image.jpg'; ?>" alt="<?php esc_html_e('Portfolio Featured Image', 'edgtf-core'); ?>" />
	<?php } ?>
</div>