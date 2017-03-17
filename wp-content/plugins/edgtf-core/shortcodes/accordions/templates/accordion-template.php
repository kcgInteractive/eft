<<?php echo esc_attr($title_tag); ?> class="edgtf-title-holder">
    <span class="edgtf-accordion-mark">
		<span class="edgtf-icon-plus ion-ios-plus-empty"></span>
		<span class="edgtf-icon-minus ion-ios-minus-empty"></span>
	</span>
	<span class="edgtf-tab-title"><?php echo esc_html($title); ?></span>
</<?php echo esc_attr($title_tag); ?>>
<div class="edgtf-accordion-content">
	<div class="edgtf-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>