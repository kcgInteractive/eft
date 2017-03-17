<section class="edgtf-side-menu">
	<div class="edgtf-close-side-menu-holder">
		<a class="edgtf-close-side-menu" href="#" target="_self">
			<?php echo fluid_edge_icon_collections()->renderIcon('ion-android-close', 'ion_icons'); ?>
		</a>
	</div>
	<?php if(is_active_sidebar('sidearea')) {
		dynamic_sidebar('sidearea');
	} ?>
</section>