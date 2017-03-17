<div class="edgtf-testimonial-content">
	<?php if(has_post_thumbnail()) { ?>
		<div class="edgtf-testimonial-image">
			<?php echo the_post_thumbnail(); ?>
		</div>
	<?php } ?>
    <div class="edgtf-testimonial-text-holder">
        <?php if(!empty($title)) { ?>
            <h4 class="edgtf-testimonial-title"><?php echo esc_html($title); ?></h4>
        <?php } ?>
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