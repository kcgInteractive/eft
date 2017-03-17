<?php

class FluidEdgeClassFieldPortfolioFollow extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (fluid_edge_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldZeroOne extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "1") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "0") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (fluid_edge_option_get_value($name) == "1") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldImageVideo extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		
		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch switch-type">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "image") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Image', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "video") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Video', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (fluid_edge_option_get_value($name) == "image") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldYesEmpty extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (fluid_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFlagPage extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (fluid_edge_option_get_value($name) == "page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFlagPost extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "post") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (fluid_edge_option_get_value($name) == "post") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFlagMedia extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "attachment") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (fluid_edge_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFlagPortfolio extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "portfolio_page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (fluid_edge_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFlagProduct extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "product") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (fluid_edge_option_get_value($name) == "product") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldRange extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$range_min = 0;
		$range_max = 1;
		$range_step = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"])) {
			$range_min = $args["range_min"];
		}
		
		if(isset($args["range_max"])) {
			$range_max = $args["range_max"];
		}
		
		if(isset($args["range_step"])) {
			$range_step = $args["range_step"];
		}
		
		if(isset($args["range_decimals"])) {
			$range_decimals = $args["range_decimals"];
		}
		?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="edgtf-slider-range-wrapper">
								<div class="form-inline">
									<input type="text" class="form-control edgtf-form-element edgtf-form-element-xsmall pull-left edgtf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
									<div class="edgtf-slider-range small" data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldRangeSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>

		<div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-slider-range-wrapper">
				<div class="form-inline">
					<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
					<input type="text" class="form-control edgtf-form-element edgtf-form-element-xxsmall pull-left edgtf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
					<div class="edgtf-slider-range xsmall" data-step="0.01" data-max="1" data-start="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"></div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldRadio extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value) {
			$checked = "checked";
		}
		
		$html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class FluidEdgeClassFieldRadioGroup extends FluidEdgeClassFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();
        $hide = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = fluid_edge_option_get_value($name);
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="edgtf-radio-group-holder <?php if($use_images) echo "with-images"; ?>">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if($dependence) {
                                            if(array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if(array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                    ?>
                                        <label class="radio-inline">
                                            <input <?php echo fluid_edge_get_inline_attr($show_val, 'data-show'); ?> <?php echo fluid_edge_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if($selected) echo "checked"; ?> <?php fluid_edge_inline_style($hide_radios); ?>
                                                type="radio" name="<?php echo esc_attr($name);  ?>" value="<?php echo esc_attr($key); ?>"
                                                <?php if($dependence) fluid_edge_class_attribute("dependence"); ?>> <?php if(!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

class FluidEdgeClassFieldCheckBoxGroup extends FluidEdgeClassFieldType {

	public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
		if(!(is_array($options) && count($options))) {
			return;
		}

		$saved_value = fluid_edge_option_get_value($name); ?>
		
		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="edgtf-checkbox-group-holder">
									<div class="checkbox-inline" style="display: none">
										<label>
											<input checked type="checkbox" value="" name="<?php echo esc_attr($name.'[]'); ?>">
										</label>
									</div>
								<?php foreach($options as $option_key => $option_label) : ?>
									<?php
									$i = 1;
									$checked = is_array($saved_value) && in_array($option_key, $saved_value);
									$checked_attr = $checked ? 'checked' : '';
									?>
									<div class="checkbox-inline">
										<label>
											<input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="<?php echo esc_attr($option_key).'-'.$i; ?>" value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name.'[]'); ?>">
											<label for="<?php echo esc_attr($option_key).'-'.$i; ?>"><?php echo esc_html($option_label); ?></label>  
										</label>
									</div>
								<?php $i++; endforeach; ?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class FluidEdgeClassFieldCheckBox extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value) {
			$checked = "checked";
		}
		
		$html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class FluidEdgeClassFieldDate extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<input type="text" id="portfolio_date" class="datepicker form-control edgtf-input edgtf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFile extends FluidEdgeClassFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $value = fluid_edge_option_get_value($name);
        $has_value = fluid_edge_option_has_value($name);
        ?>

        <div class="edgtf-page-form-section">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgtf-media-uploader">
                                <div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
                                    class="edgtf-media-image-holder">
                                    <img src="<?php if ($has_value) { echo esc_url(fluid_edge_option_get_uploaded_file_icon($value)); } ?>" alt=""
                                         class="edgtf-media-image img-thumbnail"/>
                                    <?php if ($has_value) { ?> <h4 class="edgtf-media-title"><?php echo fluid_edge_option_get_uploaded_file_title($value) ?></h4> <?php } ?>
                                </div>
                                <div style="display: none"
                                     class="edgtf-media-meta-fields">
                                    <input type="hidden" class="edgtf-media-upload-url"
                                           name="<?php echo esc_attr($name); ?>"
                                           value="<?php echo esc_attr($value); ?>"/>
                                </div>
                                <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                   href="javascript:void(0)"
                                   data-frame-title="<?php esc_html_e('Select File', 'fluid'); ?>"
                                   data-frame-button-text="<?php esc_html_e('Select File', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
                                <a style="display: none;" href="javascript: void(0)"
                                   class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class FluidEdgeClassFieldFactory {

	public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new FluidEdgeClassFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textsimple':
				$field = new FluidEdgeClassFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textarea':
				$field = new FluidEdgeClassFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textareasimple':
				$field = new FluidEdgeClassFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'color':
				$field = new FluidEdgeClassFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'colorsimple':
				$field = new FluidEdgeClassFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'image':
				$field = new FluidEdgeClassFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'imagesimple':
				$field = new FluidEdgeClassFieldImageSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'font':
				$field = new FluidEdgeClassFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'fontsimple':
				$field = new FluidEdgeClassFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'select':
				$field = new FluidEdgeClassFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectblank':
				$field = new FluidEdgeClassFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectsimple':
				$field = new FluidEdgeClassFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectblanksimple':
				$field = new FluidEdgeClassFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesno':
				$field = new FluidEdgeClassFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesnosimple':
				$field = new FluidEdgeClassFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'onoff':
				$field = new FluidEdgeClassFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'portfoliofollow':
				$field = new FluidEdgeClassFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'zeroone':
				$field = new FluidEdgeClassFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'imagevideo':
				$field = new FluidEdgeClassFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesempty':
				$field = new FluidEdgeClassFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'file':
                $field = new FluidEdgeClassFieldFile();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
			case 'flagpost':
				$field = new FluidEdgeClassFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagpage':
				$field = new FluidEdgeClassFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagmedia':
				$field = new FluidEdgeClassFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagportfolio':
				$field = new FluidEdgeClassFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagproduct':
				$field = new FluidEdgeClassFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'range':
				$field = new FluidEdgeClassFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'rangesimple':
				$field = new FluidEdgeClassFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'radio':
				$field = new FluidEdgeClassFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'checkbox':
				$field = new FluidEdgeClassFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'date':
				$field = new FluidEdgeClassFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'radiogroup':
                $field = new FluidEdgeClassFieldRadioGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;
            case 'checkboxgroup':
                $field = new FluidEdgeClassFieldCheckBoxGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;    
			default:
				break;
		}
	}
}