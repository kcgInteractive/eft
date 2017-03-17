<div class="edgtf-social-share-holder edgtf-list">
	<?php if(!empty($title)) { ?>
		<p class="edgtf-social-title"><?php echo esc_html($title); ?></p>
	<?php } ?>
	<ul>
		<?php foreach ($networks as $net) {
			print $net;
		} ?>
	</ul>
</div>