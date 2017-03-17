<?php

if($display_category === 'yes') {
	$product = fluid_edge_return_woocommerce_global_variable();
	$product_categories = $product->get_categories(', ');
	
	if (!empty($product_categories)) { ?>
		<p class="edgtf-<?php echo esc_attr($class_name); ?>-category"><?php print $product_categories; ?></p>
	<?php } ?>
<?php } ?>