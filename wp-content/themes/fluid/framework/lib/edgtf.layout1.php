<?php

/*
   Interface: iFluidEdgeInterfaceLayoutNode
   A interface that implements Layout Node methods
*/
interface iFluidEdgeInterfaceLayoutNode {
	public function hasChidren();
	public function getChild($key);
	public function addChild($key, $value);
}

/*
   Interface: iFluidEdgeInterfaceRender
   A interface that implements Render methods
*/
interface iFluidEdgeInterfaceRender {
	public function render($factory);
}

/*
   Class: FluidEdgeClassPanel
   A class that initializes Edge Panel
*/
class FluidEdgeClassPanel implements iFluidEdgeInterfaceLayoutNode, iFluidEdgeInterfaceRender {

	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (fluid_edge_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (fluid_edge_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div class="edgtf-page-form-section-holder" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<h3 class="edgtf-page-section-title"><?php echo esc_html($this->title); ?></h3>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iFluidEdgeInterfaceRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: FluidEdgeClassContainer
   A class that initializes Edge Container
*/
class FluidEdgeClassContainer implements iFluidEdgeInterfaceLayoutNode, iFluidEdgeInterfaceRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;

		if (!empty($this->hidden_property)){
			if (fluid_edge_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (fluid_edge_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div class="edgtf-page-form-container-holder" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iFluidEdgeInterfaceRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: FluidEdgeClassContainerNoStyle
   A class that initializes Edge Container without css classes
*/
class FluidEdgeClassContainerNoStyle implements iFluidEdgeInterfaceLayoutNode, iFluidEdgeInterfaceRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (fluid_edge_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (fluid_edge_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iFluidEdgeInterfaceRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: FluidEdgeClassGroup
   A class that initializes Edge Group
*/
class FluidEdgeClassGroup implements iFluidEdgeInterfaceLayoutNode, iFluidEdgeInterfaceRender {

	public $children;
	public $title;
	public $description;

	function __construct($title="",$description="") {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) { ?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<?php foreach ($this->children as $child) {
						$this->renderChild($child, $factory);
					} ?>
				</div>
			</div>
		</div>
	<?php
	}

	public function renderChild(iFluidEdgeInterfaceRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: FluidEdgeClassNotice
   A class that initializes Edge Notice
*/
class FluidEdgeClassNotice implements iFluidEdgeInterfaceRender {

	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (fluid_edge_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (fluid_edge_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>

		<div class="edgtf-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo esc_html($this->notice); ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

/*
   Class: FluidEdgeClassRow
   A class that initializes Edge Row
*/
class FluidEdgeClassRow implements iFluidEdgeInterfaceLayoutNode, iFluidEdgeInterfaceRender {

	public $children;
	public $next;

	function __construct($next=false) {
		$this->children = array();
		$this->next = $next;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) { ?>
		
		<div class="row<?php if ($this->next) echo " next-row"; ?>">
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iFluidEdgeInterfaceRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: FluidEdgeClassTitle
   A class that initializes Edge Title
*/
class FluidEdgeClassTitle implements iFluidEdgeInterfaceRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (fluid_edge_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			}
		}
		?>
		<h5 class="edgtf-page-section-subtitle" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
	<?php
	}
}

/*
   Class: FluidEdgeClassField
   A class that initializes Edge Field
*/
class FluidEdgeClassField implements iFluidEdgeInterfaceRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();

	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $fluid_edge_global_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$fluid_edge_global_Framework->edgtOptions->addOption($this->name,$this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (fluid_edge_option_get_value($this->hidden_property)==$value) {
					$hidden = true;
				}
			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: FluidEdgeClassMetaField
   A class that initializes Edge Meta Field
*/
class FluidEdgeClassMetaField implements iFluidEdgeInterfaceRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();
	
	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $fluid_edge_global_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$fluid_edge_global_Framework->edgtMetaBoxes->addOption($this->name,$this->default_value);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (fluid_edge_option_get_value($this->hidden_property)==$value) {
					$hidden = true;
				}
			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class FluidEdgeClassFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );
}

class FluidEdgeClassFieldText extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 12;
		if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false; ?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if($suffix) : ?>
                            <div class="input-group">
                            <?php endif; ?>
                                <input type="text" class="form-control edgtf-input edgtf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars(fluid_edge_option_get_value($name))); ?>" />
                                <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                            <?php if($suffix) : ?>
                            </div>
                            <?php endif; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldTextSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false; ?>

		<div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<?php if($suffix) : ?>
			<div class="input-group">
            <?php endif; ?>
				<input type="text" class="form-control edgtf-input edgtf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars(fluid_edge_option_get_value($name))); ?>" />
				<?php if($suffix) : ?>
					<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
				<?php endif; ?>
			<?php if($suffix) : ?>
			</div>
			<?php endif; ?>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldTextArea extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control edgtf-form-element" name="<?php echo esc_attr($name); ?>" rows="5"><?php echo esc_html(htmlspecialchars(fluid_edge_option_get_value($name))); ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldTextAreaSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>

		<div class="col-lg-3">
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control edgtf-form-element" name="<?php echo esc_attr($name); ?>" rows="5"><?php echo esc_html(fluid_edge_option_get_value($name)); ?></textarea>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldColor extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldColorSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>

		<div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>" class="my-color-field"/>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldImage extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="edgtf-media-uploader">
								<div<?php if (!fluid_edge_option_has_value($name)) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
									<img src="<?php if (fluid_edge_option_has_value($name)) { echo esc_url(fluid_edge_get_attachment_thumb_url(fluid_edge_option_get_value($name))); } ?>" alt="" class="edgtf-media-image img-thumbnail" />
								</div>
								<div style="display: none" class="edgtf-media-meta-fields">
									<input type="hidden" class="edgtf-media-upload-url" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
								</div>
								<a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
								<a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldImageSimple extends FluidEdgeClassFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>
	    
        <div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <div class="edgtf-media-uploader">
                <div<?php if (!fluid_edge_option_has_value($name)) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
                    <img src="<?php if (fluid_edge_option_has_value($name)) { echo esc_url(fluid_edge_get_attachment_thumb_url(fluid_edge_option_get_value($name))); } ?>" alt="" class="edgtf-media-image img-thumbnail"/>
                </div>
                <div style="display: none" class="edgtf-media-meta-fields">
                    <input type="hidden" class="edgtf-media-upload-url" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
                </div>
                <a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e('Select Image', 'fluid'); ?>" data-frame-button-text="<?php esc_html_e('Select Image', 'fluid'); ?>"><?php esc_html_e('Upload', 'fluid'); ?></a>
                <a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'fluid'); ?></a>
            </div>
        </div>
    <?php
    }
}

class FluidEdgeClassFieldFont extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $fluid_edge_global_fonts_array;
		?>

		<div class="edgtf-page-form-section">
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control edgtf-form-element"	name="<?php echo esc_attr($name); ?>">
								<option value="-1">Default</option>
								<?php foreach($fluid_edge_global_fonts_array as $fontArray) { ?>
									<option <?php if (fluid_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldFontSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $fluid_edge_global_fonts_array;
		?>

		<div class="col-lg-3">
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<select class="form-control edgtf-form-element" name="<?php echo esc_attr($name); ?>">
				<option value="-1">Default</option>
				<?php foreach($fluid_edge_global_fonts_array as $fontArray) { ?>
					<option <?php if (fluid_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
				<?php } ?>
			</select>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldSelect extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$show = array();
		if(isset($args["show"])) {
			$show = $args["show"];
		}
		
		$hide = array();
		if(isset($args["hide"])) {
			$hide = $args["hide"];
		}
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (fluid_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldSelectBlank extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$show = array();
		if(isset($args["show"])) {
			$show = $args["show"];
		}
		
		$hide = array();
		if(isset($args["hide"])) {
			$hide = $args["hide"];
		}
		?>

		<div class="edgtf-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<option <?php if (fluid_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (fluid_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldSelectSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
        $dependence = false;
        if(isset($args["dependence"])) {
	        $dependence = true;
        }
        
        $show = array();
        if(isset($args["show"])) {
	        $show = $args["show"];
        }
        
        $hide = array();
        if(isset($args["hide"])) {
	        $hide = $args["hide"];
        }
        ?>
		
		<div class="col-lg-3">
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (fluid_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (fluid_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldSelectBlankSimple extends FluidEdgeClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
        $dependence = false;
        if(isset($args["dependence"])) {
	        $dependence = true;
        }
        
        $show = array();
        if(isset($args["show"])) {
	        $show = $args["show"];
        }
        
        $hide = array();
        if(isset($args["hide"])) {
	        $hide = $args["hide"];
        }
        ?>

		<div class="col-lg-3">
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (fluid_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (fluid_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldYesNo extends FluidEdgeClassFieldType {

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
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if (fluid_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldYesNoSimple extends FluidEdgeClassFieldType {

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

		<div class="col-lg-3">
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<p class="field switch">
				<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
					   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'fluid') ?></span></label>
				<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
					   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'fluid') ?></span></label>
				<input type="checkbox" id="checkbox" class="checkbox"
					   name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if (fluid_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
				<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
			</p>
		</div>
	<?php
	}
}

class FluidEdgeClassFieldOnOff extends FluidEdgeClassFieldType {

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
									   class="cb-enable<?php if (fluid_edge_option_get_value($name) == "on") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('On', 'fluid') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (fluid_edge_option_get_value($name) == "off") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Off', 'fluid') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if (fluid_edge_option_get_value($name) == "on") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(fluid_edge_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}