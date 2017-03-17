<div class="edgtf-price-table <?php echo esc_attr($holder_classes); ?>">
	<div class="edgtf-pt-inner">
		<ul>
			<li class="edgtf-pt-title-holder">
				<span class="edgtf-pt-title"><?php echo esc_html($title); ?></span>
			</li>
			<li class="edgtf-pt-prices">
				<span class="edgtf-pt-value"><?php echo esc_html($currency); ?></span>
				<span class="edgtf-pt-price"><?php echo esc_html($price); ?></span>
				<span class="edgtf-pt-mark"><?php echo esc_html($price_period); ?></span>
			</li>
			<li class="edgtf-pt-content">
				<?php echo do_shortcode($content); ?>
			</li>
			<?php 
			if(!empty($button_text)) { ?>
				<li class="edgtf-pt-button">
					<?php echo fluid_edge_get_button_html(array(
						'link' => $link,
						'text' => $button_text,
						'type' => 'solid'
					)); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
</div>