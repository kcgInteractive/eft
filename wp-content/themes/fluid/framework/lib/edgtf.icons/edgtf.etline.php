<?php

class FluidEdgeClassEtLine implements iFluidEdgeInterfaceIconCollection {

	public $icons;
    public $title;
	public $param;
	public $styleUrl;

	function __construct($title = "", $param = "") {
		$this->icons = array();
		$this->socialIcons = array();
		$this->title = $title;
		$this->param = $param;
		$this->setIconsArray();
		$this->styleUrl = EDGE_ASSETS_ROOT . "/css/et-line/css/et-line.min.css";
	}

	public function setIconsArray() {
		$this->icons = array(
			'' => '',
			'icon-adjustments' => '\e01d',
		    'icon-alarmclock' => '\e059',
		    'icon-anchor' => '\e03f',
		    'icon-aperture' => '\e056',
		    'icon-attachment' => '\e02e',
		    'icon-bargraph' => '\e018',
		    'icon-basket' => '\e027',
		    'icon-beaker' => '\e03c',
		    'icon-bike' => '\e042',
		    'icon-book-open' => '\e00b',
		    'icon-briefcase' => '\e015',
		    'icon-browser' => '\e00c',
		    'icon-calendar' => '\e00d',
		    'icon-camera' => '\e012',
		    'icon-caution' => '\e03d',
		    'icon-chat' => '\e049',
		    'icon-circle-compass' => '\e038',
		    'icon-clipboard' => '\e008',
		    'icon-clock' => '\e055',
		    'icon-cloud' => '\e04b',
		    'icon-compass' => '\e053',
		    'icon-desktop' => '\e002',
		    'icon-dial' => '\e048',
		    'icon-document' => '\e005',
		    'icon-documents' => '\e006',
		    'icon-download' => '\e04d',
		    'icon-dribbble' => '\e063',
		    'icon-edit' => '\e01c',
		    'icon-envelope' => '\e028',
		    'icon-expand' => '\e01a',
		    'icon-facebook' => '\e05d',
		    'icon-flag' => '\e024',
		    'icon-focus' => '\e01b',
		    'icon-gears' => '\e02b',
		    'icon-genius' => '\e046',
		    'icon-gift' => '\e017',
		    'icon-global' => '\e052',
		    'icon-globe' => '\e045',
		    'icon-googleplus' => '\e05f',
		    'icon-grid' => '\e019',
		    'icon-happy' => '\e05b',
		    'icon-hazardous' => '\e04f',
		    'icon-heart' => '\e04a',
		    'icon-hotairballoon' => '\e044',
		    'icon-hourglass' => '\e01f',
		    'icon-key' => '\e02c',
		    'icon-laptop' => '\e001',
		    'icon-layers' => '\e031',
		    'icon-lifesaver' => '\e054',
		    'icon-lightbulb' => '\e030',
		    'icon-linegraph' => '\e039',
		    'icon-linkedin' => '\e062',
		    'icon-lock' => '\e020',
		    'icon-magnifying-glass' => '\e037',
		    'icon-map' => '\e025',
		    'icon-map-pin' => '\e047',
		    'icon-megaphone' => '\e021',
		    'icon-mic' => '\e03a',
		    'icon-mobile' => '\e000',
		    'icon-newspaper' => '\e009',
		    'icon-notebook' => '\e00a',
		    'icon-paintbrush' => '\e036',
		    'icon-paperclip' => '\e02d',
		    'icon-pencil' => '\e032',
		    'icon-phone' => '\e004',
		    'icon-picture' => '\e00f',
		    'icon-pictures' => '\e010',
		    'icon-piechart' => '\e050',
		    'icon-presentation' => '\e00e',
		    'icon-pricetags' => '\e02f',
		    'icon-printer' => '\e013',
		    'icon-profile-female' => '\e041',
		    'icon-profile-male' => '\e040',
		    'icon-puzzle' => '\e026',
		    'icon-quote' => '\e057',
		    'icon-recycle' => '\e03e',
		    'icon-refresh' => '\e05a',
		    'icon-ribbon' => '\e01e',
		    'icon-rss' => '\e060',
		    'icon-sad' => '\e05c',
		    'icon-scissors' => '\e035',
		    'icon-scope' => '\e058',
		    'icon-search' => '\e007',
		    'icon-shield' => '\e022',
		    'icon-speedometer' => '\e051',
		    'icon-strategy' => '\e03b',
		    'icon-streetsign' => '\e029',
		    'icon-tablet' => '\e003',
		    'icon-target' => '\e04e',
		    'icon-telescope' => '\e02a',
		    'icon-toolbox' => '\e014',
		    'icon-tools' => '\e033',
		    'icon-tools-2' => '\e034',
		    'icon-trophy' => '\e023',
		    'icon-tumblr' => '\e061',
		    'icon-twitter' => '\e05e',
		    'icon-upload' => '\e04c',
		    'icon-video' => '\e011',
		    'icon-wallet' => '\e016',
		    'icon-wine' => '\e043'
		);

		$et_icons = array();
		$et_icons[""] = "";
		foreach ($this->icons as $key => $value) {
			$et_icons[$key] = $key;
		}

		$this->icons = $et_icons;
	}

	public function getIconsArray() {
		return $this->icons;
	}

	public function render($icon, $params = array()) {
		$html = '';
		extract($params);
		$iconAttributesString = '';
		$iconClass = '';
		if (isset($icon_attributes) && count($icon_attributes)) {
			foreach ($icon_attributes as $icon_attr_name => $icon_attr_val) {
				if ($icon_attr_name === 'class') {
					$iconClass = $icon_attr_val;
					unset($icon_attributes[$icon_attr_name]);
				} else {
					$iconAttributesString .= $icon_attr_name . '="' . $icon_attr_val . '" ';
				}
			}
		}

		if (isset($before_icon) && $before_icon !== '') {
			$beforeIconAttrString = '';
			if (isset($before_icon_attributes) && count($before_icon_attributes)) {
				foreach ($before_icon_attributes as $before_icon_attr_name => $before_icon_attr_val) {
					$beforeIconAttrString .= $before_icon_attr_name . '="' . $before_icon_attr_val . '" ';
				}
			}

			$html .= '<' . $before_icon . ' ' . $beforeIconAttrString . '>';
		}

		$html .= '<i class="edgtf-icon-et-line ' . $icon . ' ' . $iconClass . '" ' . $iconAttributesString . '></i>';

		if (isset($before_icon) && $before_icon !== '') {
			$html .= '</' . $before_icon . '>';
		}

		return $html;
	}

	public function getSearchIcon() {

		return $this->render('icon-search');
	}

    /**
     * Checks if icon collection has social icons
     * @return mixed
     */
    public function hasSocialIcons() {
        return false;
    }

}