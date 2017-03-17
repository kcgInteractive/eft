<div class="edgtf-team-single-info-holder">
	<div class="edgtf-grid-row">
		<div class="edgtf-ts-image-holder edgtf-grid-col-6">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="edgtf-ts-details-holder edgtf-grid-col-6">
			<h3 itemprop="name" class="edgtf-name entry-title"><?php the_title(); ?></h3>
			<p class="edgtf-position"><?php echo esc_html($position); ?>
				<?php foreach ($social_icons as $social_icon) {
					print $social_icon;
				} ?>
			</p>
			<div class="edgtf-ts-bio-holder">
				<?php if(!empty($birth_date)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_calendar edgtf-ts-bio-icon"></span>
						<span class="edgtf-ts-bio-info"><?php echo esc_html__('born on: ', 'edgtf-core').esc_html($birth_date); ?></span>
					</div>
				<?php } ?>
				<?php if(!empty($email)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_mail_alt edgtf-ts-bio-icon"></span>
						<span itemprop="email" class="edgtf-ts-bio-info"><?php echo esc_html__('email: ', 'edgtf-core').sanitize_email(esc_html($email)); ?></span>
					</div>
				<?php } ?>
				<?php if(!empty($phone)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_phone edgtf-ts-bio-icon"></span>
						<span class="edgtf-ts-bio-info"><?php echo esc_html__('phone: ', 'edgtf-core').esc_html($phone); ?></span>
					</div>
				<?php } ?>
				<?php if(!empty($address)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_building_alt edgtf-ts-bio-icon"></span>
						<span class="edgtf-ts-bio-info"><?php echo esc_html__('lives in: ', 'edgtf-core').esc_html($address); ?></span>
					</div>
				<?php } ?>
				<?php if(!empty($education)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_ribbon_alt edgtf-ts-bio-icon"></span>
						<span class="edgtf-ts-bio-info"><?php echo esc_html__('education: ', 'edgtf-core').esc_html($education); ?></span>
					</div>
				<?php } ?>
				<?php if(!empty($resume)) { ?>
					<div class="edgtf-ts-info-row">
						<span aria-hidden="true" class="icon_document_alt edgtf-ts-bio-icon"></span>
						<a href="<?php echo esc_url($resume); ?>" download target="_blank"><span class="edgtf-ts-bio-info"><?php echo esc_html__('Download Resume', 'edgtf-core'); ?></span></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>