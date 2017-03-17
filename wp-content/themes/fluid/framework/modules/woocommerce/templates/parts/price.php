<?php
$product = fluid_edge_return_woocommerce_global_variable();

if ($display_price === 'yes' &&  $price_html = $product->get_price_html()) { ?>
	<div class="edgtf-<?php echo esc_attr($class_name); ?>-price"><?php print $price_html; ?></div>
<?php } ?>