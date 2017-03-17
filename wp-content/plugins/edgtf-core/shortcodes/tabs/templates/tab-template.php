<div class="edgtf-tabs <?php echo esc_attr($holder_classes); ?>">
	<ul class="edgtf-tabs-nav clearfix">
		<?php if($tabs_titles != '' && is_array($tabs_titles)) {  ?>
			<?php $count = count($tabs_titles); ?>
			<?php for ($n = 0; $n < $count; $n++) { ?>
			<li>
				<?php if($type === 'simple' ) { ?>
					<?php if(isset($title_metas[$n])) { ?>
						<div class="edgtf-tabs-title-image"><img src="<?php echo esc_url($title_metas[$n]['url']); ?>" alt="<?php echo esc_attr($title_metas[$n]['title']); ?>" width="<?php echo esc_attr($title_metas[$n]['width']); ?>" height="<?php echo esc_attr($title_metas[$n]['height']); ?>"></div>
					<?php } ?>
				<?php } ?>
				<?php if(isset($tabs_titles[$n])) { ?>
					<a href="#tab-<?php echo sanitize_title($tabs_titles[$n])?>">
						<?php echo esc_html($tabs_titles[$n]); ?>
						<?php if(isset($tabs_titles_description) && !empty($tabs_titles_description[$n])) { ?>
							<span class="edgtf-tab-title-description"><?php echo esc_html($tabs_titles_description[$n]); ?></span>
						<?php } ?>
					</a>
				<?php } ?>
			</li>
			<?php } ?>
			<?php if($type === 'simple' || $type === 'vertical') { ?>
				<li class="edgtf-tabs-nav-line"></li>
			<?php } ?>
		<?php } ?>
	</ul>
	<?php echo do_shortcode($content); ?>
</div>