<?php

/*
   Class: FluidEdgeClassMultipleImages
   A class that initializes Edge Multiple Images
*/
class FluidEdgeClassMultipleImages implements iFluidEdgeInterfaceRender {
	private $name;
	private $label;
	private $description;
	
	function __construct($name,$label="",$description="") {
		global $fluid_edge_global_Framework;
		$this->name = $name;
		$this->label = $label;
		$this->description = $description;
		$fluid_edge_global_Framework->edgtMetaBoxes->addOption($this->name,"");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($this->label); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="edgt-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name , true );
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):
									foreach($image_gallery_array as $gimg_id):
										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="edgt-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';
									endforeach;
								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $this->name) ?>" name="<?php echo esc_attr( $this->name) ?>">
							<div class="edgtf-gallery-uploader">
								<a class="edgtf-gallery-upload-btn btn btn-sm btn-primary" href="javascript:void(0)"><?php esc_html_e('Upload', 'fluid'); ?></a>
								<a class="edgtf-gallery-clear-btn btn btn-sm btn-default pull-right" href="javascript:void(0)"><?php esc_html_e('Remove All', 'fluid'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

/*
   Class: FluidEdgeClassImagesVideos
   A class that initializes Edge Images Videos
*/
class FluidEdgeClassImagesVideos implements iFluidEdgeInterfaceRender {
	private $label;
	private $description;
	
	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		
		<div class="edgtf_hidden_portfolio_images" style="display: none">
			<div class="edgtf-page-form-section">
				<div class="edgtf-field-desc">
					<h4><?php echo esc_html($this->label); ?></h4>
					<p><?php echo esc_html($this->description); ?></p>
				</div>
				<div class="edgtf-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
								<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="edgtf-field-description"><?php esc_html_e('Image', 'fluid'); ?></em>
								<div class="edgtf-media-uploader">
									<div style="display: none" class="edgtf-media-image-holder">
										<img src="" alt="" class="edgtf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="edgtf-media-meta-fields">
										<input type="hidden" class="edgtf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x" />
										<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="" />
									</div>
									<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="edgtf-field-description"><?php esc_html_e('Video Type', 'fluid'); ?></em>
								<select class="form-control edgtf-form-element edgtf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e('YouTube', 'fluid'); ?></option>
									<option value="vimeo"><?php esc_html_e('Vimeo', 'fluid'); ?></option>
									<option value="self"><?php esc_html_e('Self Hosted', 'fluid'); ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="edgtf-field-description"><?php esc_html_e('Video ID', 'fluid'); ?></em>
								<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="edgtf-field-description">Video image</em>
								<div class="edgtf-media-uploader">
									<div style="display: none" class="edgtf-media-image-holder">
										<img src="" alt="" class="edgtf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="edgtf-media-meta-fields">
										<input type="hidden" class="edgtf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x" />
										<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="" />
									</div>
									<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'fluid'); ?></em>
								<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="edgtf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'fluid'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'edgt_portfolio_images', true );
		if (count($portfolio_images)>1 && fluid_edge_core_plugin_installed()) {
			usort($portfolio_images, "edgtf_core_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			?>
			
			<div class="edgtf_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">
				<div class="edgtf-page-form-section">
					<div class="edgtf-field-desc">
						<h4><?php echo esc_html($this->label); ?></h4>
						<p><?php echo esc_html($this->description); ?></p>
					</div>
					<div class="edgtf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="edgtf-field-description"><?php esc_html_e('Image', 'fluid'); ?></em>
									<div class="edgtf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(fluid_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="" class="edgtf-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="edgtf-media-meta-fields">
											<input type="hidden" class="edgtf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="" />
											<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="" />
										</div>
										<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="edgtf-field-description"><?php esc_html_e('Video Type', 'fluid'); ?></em>
									<select class="form-control edgtf-form-element edgtf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
										<option value=""></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('YouTube', 'fluid'); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'fluid'); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self Hosted', 'fluid'); ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="edgtf-field-description"><?php esc_html_e('Video ID', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="edgtf-field-description">Video image</em>
									<div class="edgtf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(fluid_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="" class="edgtf-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="edgtf-media-meta-fields">
											<input type="hidden" class="edgtf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="edgtf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'fluid'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br />
		<a class="edgtf_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e('Add portfolio image/video', 'fluid'); ?></a>
	<?php
	}
}

/*
   Class: FluidEdgeClassImagesVideos
   A class that initializes Edge Images Videos
*/
class FluidEdgeClassImagesVideosFramework implements iFluidEdgeInterfaceRender {
	private $label;
	private $description;

	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		
		<div class="edgtf-hidden-portfolio-images"  style="display: none">
			<div class="edgtf-portfolio-toggle-holder">
				<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
					<span class="number">1</span><span class="edgtf-toggle-inner"><?php esc_html_e('Image - ', 'fluid'); ?><em><?php esc_html_e('Order Number', 'fluid'); ?></em></span>
				</div>
				<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="edgtf-portfolio-toggle-content">
				<div class="edgtf-page-form-section">
					<div class="edgtf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="edgtf-media-uploader">
										<em class="edgtf-field-description"><?php esc_html_e('Image', 'fluid'); ?></em>
										<div style="display: none" class="edgtf-media-image-holder">
											<img src="" alt="" class="edgtf-media-image img-thumbnail">
										</div>
										<div class="edgtf-media-meta-fields">
											<input type="hidden" class="edgtf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
											<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
										</div>
										<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="edgtf-hidden-portfolio-videos"  style="display: none">
			<div class="edgtf-portfolio-toggle-holder">
				<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
					<span class="number">2</span><span class="edgtf-toggle-inner"><?php esc_html_e('Video - ', 'fluid'); ?><em><?php esc_html_e('Order Number', 'fluid'); ?></em></span>
				</div>
				<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="edgtf-portfolio-toggle-content">
				<div class="edgtf-page-form-section">
					<div class="edgtf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="edgtf-media-uploader">
										<em class="edgtf-field-description"><?php esc_html_e('Cover Video Image', 'fluid'); ?></em>
										<div style="display: none" class="edgtf-media-image-holder">
											<img src="" alt="" class="edgtf-media-image img-thumbnail">
										</div>
										<div style="display: none" class="edgtf-media-meta-fields">
											<input type="hidden" class="edgtf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
											<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
										</div>
										<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="edgtf-field-description"><?php esc_html_e('Video Type', 'fluid'); ?></em>
											<select class="form-control edgtf-form-element edgtf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e('YouTube', 'fluid'); ?></option>
												<option value="vimeo"><?php esc_html_e('Vimeo', 'fluid'); ?></option>
												<option value="self"><?php esc_html_e('Self Hosted', 'fluid'); ?></option>
											</select>
										</div>
										<div class="col-lg-2 edgtf-video-id-holder">
											<em class="edgtf-field-description" id="videoId"><?php esc_html_e('Video ID', 'fluid'); ?></em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x">
										</div>
									</div>
									<div class="row next-row edgtf-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'fluid'); ?></em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'edgt_portfolio_images', true );
		if (count($portfolio_images)>1 && fluid_edge_core_plugin_installed()) {
			usort($portfolio_images, "edgtf_core_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			if (isset($portfolio_image['portfolioimgtype']))
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			else {
				if (stripslashes($portfolio_image['portfolioimg']) == true)
					$portfolio_img_type = "image";
				else
					$portfolio_img_type = "video";
			}
			if ($portfolio_img_type == "image") {
				?>

				<div class="edgtf-portfolio-images edgtf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="edgtf-portfolio-toggle-holder">
						<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Image - ', 'fluid'); ?><em><?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?></em></span>
						</div>
						<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="edgtf-portfolio-toggle-content" style="display: none">
						<div class="edgtf-page-form-section">
							<div class="edgtf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="edgtf-media-uploader">
												<em class="edgtf-field-description"><?php esc_html_e('Image', 'fluid'); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(fluid_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="" class="edgtf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="edgtf-media-meta-fields">
													<input type="hidden" class="edgtf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} else {
				?>
				<div class="edgtf-portfolio-videos edgtf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="edgtf-portfolio-toggle-holder">
						<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Video - ', 'fluid'); ?><em><?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?></em></span>
						</div>
						<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="edgtf-portfolio-toggle-content" style="display: none">
						<div class="edgtf-page-form-section">
							<div class="edgtf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="edgtf-media-uploader">
												<em class="edgtf-field-description"><?php esc_html_e('Cover Video Image', 'fluid'); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(fluid_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="" class="edgtf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="edgtf-media-meta-fields">
													<input type="hidden" class="edgtf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
													<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="edgtf-field-description"><?php esc_html_e('Video Type', 'fluid'); ?></em>
													<select class="form-control edgtf-form-element edgtf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
														<option value=""></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('YouTube', 'fluid'); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'fluid'); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self Hosted', 'fluid'); ?></option>
													</select>
												</div>
												<div class="col-lg-2 edgtf-video-id-holder">
													<em class="edgtf-field-description"><?php esc_html_e('Video ID', 'fluid'); ?></em>
													<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
												</div>
											</div>
											<div class="row next-row edgtf-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'fluid'); ?></em>
													<input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			$no++;
		}
		?>

		<div class="edgtf-portfolio-add">
			<a class="edgtf-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e('Add Image', 'fluid'); ?></a>
			<a class="edgtf-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e('Add Video', 'fluid'); ?></a>
			<a class="edgtf-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All', 'fluid'); ?></a>
		</div>
	<?php
	}
}

class FluidEdgeClassTwitterFramework implements  iFluidEdgeInterfaceRender {
    public function render($factory) {
        $twitterApi = EdgefTwitterApi::getInstance();
        $message = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'fluid');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'fluid') : esc_html__('Connect with Twitter', 'fluid');
    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgtf-page-form-section" id="edgtf_enable_social_share">
            <div class="edgtf-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'fluid'); ?></h4>
                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'fluid'); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="edgtf-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

class FluidEdgeClassInstagramFramework implements  iFluidEdgeInterfaceRender {
    public function render($factory) {
        $instagram_api = EdgefInstagramApi::getInstance();
        $message = '';

        //if code wasn't saved to database
		if(!get_option('edgtf_instagram_code')) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if(!empty($_GET['code'])) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'fluid');
				
			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'fluid') : esc_html__('Connect with Instagram', 'fluid');

    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgtf-page-form-section" id="edgtf_enable_social_share">
            <div class="edgtf-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'fluid'); ?></h4>
                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'fluid'); ?></p>
            </div>
            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/*
   Class: FluidEdgeClassImagesVideos
   A class that initializes Edge Images Videos
*/
class FluidEdgeClassOptionsFramework implements iFluidEdgeInterfaceRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="edgtf-portfolio-additional-item-holder" style="display: none">
			<div class="edgtf-portfolio-toggle-holder">
				<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
					<span class="number">1</span><span class="edgtf-toggle-inner">Additional Sidebar Item <em><?php esc_html_e('(Order Number, Item Title)', 'fluid'); ?></em></span>
				</div>
				<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="edgtf-portfolio-toggle-content">
				<div class="edgtf-page-form-section">
					<div class="edgtf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x">
								</div>
								<div class="col-lg-10">
									<em class="edgtf-field-description"><?php esc_html_e('Item Title', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionLabel_x" name="optionLabel_x">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="edgtf-field-description"><?php esc_html_e('Item Text', 'fluid'); ?></em>
									<textarea class="form-control edgtf-input edgtf-form-element" id="optionValue_x" name="optionValue_x"></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="edgtf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'fluid'); ?></em>
									<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionUrl_x" name="optionUrl_x">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no = 1;
		$portfolios = get_post_meta( $post->ID, 'edgt_portfolios', true );
		if (count($portfolios)>1 && fluid_edge_core_plugin_installed()) {
			usort($portfolios, "edgtf_core_compare_portfolio_options");
		}
		while (isset($portfolios[$no-1])) {
			$portfolio = $portfolios[$no-1];
			?>
			<div class="edgtf-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
				<div class="edgtf-portfolio-toggle-holder">
					<div class="edgtf-portfolio-toggle edgtf-toggle-desc">
						<span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner">Additional Sidebar Item - <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="edgtf-portfolio-toggle edgtf-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="edgtf-portfolio-toggle-content" style="display: none">
					<div class="edgtf-page-form-section">
						<div class="edgtf-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-2">
										<em class="edgtf-field-description"><?php esc_html_e('Order Number', 'fluid'); ?></em>
										<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>">
									</div>
									<div class="col-lg-10">
										<em class="edgtf-field-description"><?php esc_html_e('Item Title', 'fluid'); ?></em>
										<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="edgtf-field-description"><?php esc_html_e('Item Text', 'fluid'); ?></em>
										<textarea class="form-control edgtf-input edgtf-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]"><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="edgtf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'fluid'); ?></em>
										<input type="text" class="form-control edgtf-input edgtf-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="edgtf-portfolio-add">
			<a class="edgtf-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e('Add New Item', 'fluid'); ?></a>
			<a class="edgtf-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All', 'fluid'); ?></a>
		</div>
	<?php
	}
}