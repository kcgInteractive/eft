<div class="edgtf-testimonial-content">
	<div class="edgtf-testimonial-content-inner" <?php fluid_edge_inline_style($box_styles); ?>>
		<?php if(has_post_thumbnail()) { ?>
			<div class="edgtf-testimonial-image">
				<?php echo get_the_post_thumbnail(get_the_ID(), array(116, 116)); ?>
			</div>
		<?php } ?>
		<div class="edgtf-testimonial-text-holder">
			<?php if(!empty($text)) { ?>
				<p class="edgtf-testimonial-text"><?php echo esc_html($text); ?></p>
			<?php } ?>
			<?php if(!empty($author)) { ?>
				<span class="edgtf-testimonial-author">
		            <span class="edgtf-testimonial-author-label"><?php echo esc_html($author); ?></span>
					<?php if(!empty($position)) { ?>
						<span class="edgtf-testimonial-position"><?php echo esc_html($position); ?></span>
					<?php } ?>
	            </span>
			<?php } ?>
		</div>
	</div>
</div>