<?php

$this->sections[] = array(
	'title'  => __( 'General Settings', 'wheels' ),
	'icon'   => 'el-icon-home',
	// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(

		array(
			'id'       => 'favicon',
			'type'     => 'media',
			'title'    => __( 'Favicon', 'wheels' ),
			'url'      => true,
			'mode'     => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'subtitle' => __( 'Upload favicon (16px x 16px ico format)', 'wheels' ),
		),
		array(
			'id'       => 'google-analytics-code',
			'type'     => 'ace_editor',
			'title'    => __( 'Tracking Code', 'wheels' ),
			'subtitle' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the head of your theme.',
				'wheels' ),
			'mode'     => 'plain_text',
			'theme'    => 'monokai',
		),
		array(
			'id'       => 'custom-js-code',
			'type'     => 'ace_editor',
			'title'    => __( 'JS Code', 'wheels' ),
			'subtitle' => __( 'Paste your JS code here.', 'wheels' ),
			'mode'     => 'javascript',
			'theme'    => 'monokai',
			'default'  => "jQuery(document).ready(function(){\n\n});"
		),
		array(
			'id'          => 'custom-thumbnail-sizes',
			'type'        => 'ace_editor',
			'title'       => __( 'Custom Thumbnail Sizes', 'wheels' ),
			'subtitle'    => __( 'Pipe separated list of custom thumbnail size names and sizes.', 'wheels' ),
			'description' => __( 'Please use this format: <br><strong>custom-thumbnail-size:500x500|another-custom-thumbnail-size:320x150</strong>. <br>No spaces allowed. Thumnail Sizes you register here will only be applied to any new image from now on. If you wish to apply them on any of the old images we recomend using <a href="http://wordpress.org/plugins/regenerate-thumbnails/">Regenerate Thumbnails Plugin</a>',
				'wheels' ),
			'mode'        => 'text',
			'theme'       => 'monokai',
			'default'     => ""
		),
	),
);


// $color_scheme_stylesheets = array(
// 	'stylesheets' => array(
// 		'default.css'       => 'Default',
// 		'grey-turquise.css' => 'Grey Turquise',
// 		'peach-blue.css'    => 'Peach Blue',
// 		'purple.css'        => 'Purple',
// 		'red-grey.css'      => 'Red Grey',
// 	),
// 	'default' => 'default.css',	
// );

// $color_scheme_stylesheets = apply_filters( 'wheels_filter_color_scheme_stylesheets', $color_scheme_stylesheets );

// Take only what we need
// Take default first so we can reassign the $color_scheme_stylesheets variable
// $default_color_scheme_stylesheet = isset( $color_scheme_stylesheets['default'] ) ? $color_scheme_stylesheets['default'] : '';

// $color_scheme_stylesheets = isset( $color_scheme_stylesheets['stylesheets'] ) ? $color_scheme_stylesheets['stylesheets'] : array();

/**
 * Load presets only in admin area
 */
// $presets = array();
// if (is_admin()) {

// 	$preset_blue = include 'presets/blue.php';

// 	// var_dump($preset_blue);

// 	$presets = array(
// 		'1' => array(
// 			'alt'     => 'Default',
// 			'img'     => 'http://placehold.it/50/8676C4/fff&text=Default',
// 			'presets' => array(
// 				'body-background' => array(
// 					'background-color' => '#000'
// 				),
// 			)
// 		),
// 		'2' => array(
// 			'alt'     => 'Blue',
// 			'img'     => 'http://placehold.it/50/D45D55/fff&text=Blue',
// 			'presets' => $preset_blue
// 		),

// 	);
// }


$this->sections[] = array(
	'icon'   => 'el-icon-website',
	'title'  => __( 'Styling', 'wheels' ),
	'fields' => array(
		// array(
		// 	'id'      => 'color-scheme',
		// 	'type'    => 'image_select',
		// 	'presets' => true,
		// 	'title'   => __( 'Color Scheme', 'wheels' ),
		// 	'desc'    => __( 'Choose one color scheme preset below. You are free to alter the preset to your liking. Whenever you wish to return to original preset colors just click on one of the preset icons again. Beware that all settings will be reset to preset colors selected (excerpt for logo and any textarea content).',
		// 		'wheels' ),
		// 	'options' => $presets,
		// 	'default' => '1'
		// ),
		// array(
		// 	'id'      => 'color-scheme-stylesheet',
		// 	'type'    => 'select',
		// 	'title'   => __( 'Stylesheet', 'wheels' ),
		// 	'desc'    => __( 'Select which stylesheet you want to include.', 'wheels' ),
		// 	'options' => $color_scheme_stylesheets,
		// 	'default' => $default_color_scheme_stylesheet,
		// ),
		array(
			'id'       => 'custom-css',
			'type'     => 'ace_editor',
			'title'    => __( 'Custom CSS Code', 'wheels' ),
			'subtitle' => __( 'Paste your CSS code here.', 'wheels' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => '',
			'options'  => array(
				'minLines'=> 50
			),
		),
	)
);

$this->sections[] = array(
	'title'  => __( 'Body', 'wheels' ),
	'icon'   => 'el-icon-check-empty',
	'fields' => array(
		array(
			'id'       => 'container-width',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'title'    => __( 'Container Width', 'wheels' ),
			'compiler' => array( '.cbp-container', '#tribe-events-pg-template' ),
			'height'   => false,
			'mode'     => 'max-width',
			'default'  => array(
				'width' => '980',
				'units' => 'px',
			),
		),
		array(
			'id'       => 'boxed-outer-container-width',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'title'    => __( 'Boxed Outer Container Width', 'wheels' ),
			'subtitle' => __( 'This is only applicable when "Boxed" page template is used.', 'wheels' ),
			'compiler' => array( '.wh-main-wrap' ),
			'height'   => false,
			'default'  => array(
				'width' => '1100',
				'units' => 'px',
			),
		),
		array(
			'id'       => 'body-background',
			'type'     => 'background',
			'compiler' => array( 'body' ),
			'title'    => __( 'Background', 'wheels' ),
		),
		array(
			'id'         => 'body-typography',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify the body font properties.', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'body' ),
			'default'    => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '20px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'       => 'body-link-color',
			'type'     => 'link_color',
			'title'    => __( 'Link Color', 'wheels' ),
			'compiler' => array( 'a' ),
			'default'  => array(
				'regular' => '#353434',
				'hover'   => '#585757',
				'active'  => '#353434',
			)
		),
		array(
			'id'       => 'body-hr-bg-color',
			'type'     => 'color',
			'mode'     => 'border-top-color',
			'compiler' => array( 'hr' ),
			'title'    => __( 'HR Color', 'wheels' ),
			'default'  => '#333',
			'validate' => 'color',
		),
		array(
			'id'             => 'main-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-padding' , '#tribe-events-pg-template'),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Padding', 'wheels' ),
			'desc'    => __( 'This is where you select a padding for all layout elements. For widgets compiled from a page you need to set the padding on each widget.',
				'wheels' ),
			'default'        => array(
				'padding-top'    => '20px',
				'padding-right'  => '20px',
				'padding-bottom' => '20px',
				'padding-left'   => '20px',
				'units'          => 'px',
			)
		),
		// array(
		//     'id'       => 'bricklayer-box-widget-padding-override',
		//     'type'     => 'switch', 
		//     'title'    => __('Override Bricklayer Box Widget Padding', 'wheels'),
		//     'default'  => false,
		//     'on'  => 'Yes',
		//     'off'  => 'No',
		// ),
		// array(
		//     'id'             => 'bricklayer-box-widget-padding',
		//     'type'           => 'spacing',
		//     'compiler'         => array('.cbp_widget_box'),
		//     'mode'           => 'padding',
		//     'units'          => array('em', 'px'),
		//     'units_extended' => 'false',
		//     'title'          => __('Bricklayer Box Widget Padding', 'wheels'),
		//     'default'            => array(
		//         'padding-top'     => '0',
		//         'padding-right'   => '0',
		//         'padding-bottom'  => '0',
		//         'padding-left'    => '0px',
		//         'units'          => 'px',
		//     ),
		//     'required' => array( 
		//         array('bricklayer-box-widget-padding-override','equals','1'), 
		//     ),

		// ),
	)
);

$this->sections[] = array(
	'title'      => __( 'Headings', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'         => 'headings-typography-h1',
			'type'       => 'typography',
			'title'      => __( 'H1', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h1', 'h1 a' ),
			'default'    => array(
				'font-size'   => '48px',
				'line-height' => '52px',
			),
		),
		array(
			'id'             => 'headings-margin-h1',
			'type'           => 'spacing',
			'compiler'       => array( 'h1', 'h1 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H1 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '33px',
				'margin-right'  => 0,
				'margin-bottom' => '33px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
		array(
			'id'         => 'headings-typography-h2',
			'type'       => 'typography',
			'title'      => __( 'H2', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h2', 'h2 a' ),
			'default'    => array(
				'font-size'   => '30px',
				'line-height' => '34px',
			),
		),
		array(
			'id'             => 'headings-margin-h2',
			'type'           => 'spacing',
			'compiler'       => array( 'h2', 'h2 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H2 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '25px',
				'margin-right'  => 0,
				'margin-bottom' => '25px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
		array(
			'id'         => 'headings-typography-h3',
			'type'       => 'typography',
			'title'      => __( 'H3', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h3', 'h3 a' ),
			'default'    => array(
				'font-size'   => '22px',
				'line-height' => '24px',
			),
		),
		array(
			'id'             => 'headings-margin-h3',
			'type'           => 'spacing',
			'compiler'       => array( 'h3', 'h3 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H3 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '22px',
				'margin-right'  => 0,
				'margin-bottom' => '22px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
		array(
			'id'         => 'headings-typography-h4',
			'type'       => 'typography',
			'title'      => __( 'H4', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h4', 'h4 a' ),
			'default'    => array(
				'font-size'   => '20px',
				'line-height' => '24px',
			),
		),
		array(
			'id'             => 'headings-margin-h4',
			'type'           => 'spacing',
			'compiler'       => array( 'h4', 'h4 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H4 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '25px',
				'margin-right'  => 0,
				'margin-bottom' => '25px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
		array(
			'id'         => 'headings-typography-h5',
			'type'       => 'typography',
			'title'      => __( 'H5', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h5', 'h5 a' ),
			'default'    => array(
				'font-size'   => '18px',
				'line-height' => '22px',
			),
		),
		array(
			'id'             => 'headings-margin-h5',
			'type'           => 'spacing',
			'compiler'       => array( 'h5', 'h5 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H5 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '30px',
				'margin-right'  => 0,
				'margin-bottom' => '30px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
		array(
			'id'         => 'headings-typography-h6',
			'type'       => 'typography',
			'title'      => __( 'H6', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( 'h6', 'h6 a' ),
			'default'    => array(
				'font-size'   => '16px',
				'line-height' => '20px',
			),
		),
		array(
			'id'             => 'headings-margin-h6',
			'type'           => 'spacing',
			'compiler'       => array( 'h6', 'h6 a' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'H6 Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '36px',
				'margin-right'  => 0,
				'margin-bottom' => '36px',
				'margin-left'   => 0,
				'units'         => 'px',
			)
		),
	)
);

$this->sections[] = array(
	'title'  => __( 'Header', 'wheels' ),
	'icon'   => 'el-icon-delicious',
	'fields' => array(
		// array(
		// 	'id'       => 'header-use-logo',
		// 	'type'     => 'switch',
		// 	'title'    => __( 'Use Logo', 'wheels' ),
		// 	'subtitle' => __( 'Disable this if you are using Mega Main Plugin that comes with this theme for displaying the logo as well.',
		// 		'wheels' ),
		// 	'default'  => 1,
		// ),
		array(
			'id'       => 'header-background',
			'type'     => 'background',
			'compiler' => array( '.wh-header, .respmenu-wrap' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the header', 'wheels' ),
			'default'  => array(
				'background-color' => '#bfbfbf'
			),
		),
		array(
			'id'       => 'logo',
			'type'     => 'media',
			'title'    => __( 'Logo', 'wheels' ),
			'url'      => true,
			'mode'     => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'subtitle' => __( 'Upload logo', 'wheels' ),

		),
		array(
			'id'            => 'logo-width',
			'type'          => 'slider',
			'title'         => __( 'Logo Width/ Menu Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change logo/menu width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps. Menu will take what is left up to 12. If logo is set to 12 menu will also take up 12 and will be put bellow it.',
				'wheels' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label',
		),
		array(
			'id'       => 'logo-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Logo Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'left',
		),
		array(
			'id'       => 'main-menu-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Menu Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'right',
		),
		array(
			'id'      => 'header-padding-override',
			'type'    => 'switch',
			'title'   => __( 'Override Header Padding', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'             => 'header-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-main-menu-bar-wrapper > .cbp-container > div' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Header Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '5px',
				'padding-right'  => '20px',
				'padding-bottom' => '5px',
				'padding-left'   => '20px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'header-padding-override', 'equals', '1' ),
			),

		),
	)
);

$this->sections[] = array(
	'title'      => __( 'Top Bar', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'top-bar-use',
			'type'     => 'switch',
			'title'    => __( 'Use Top Bar', 'wheels' ),
			'default'  => false,
			'compiler' => 'true',
			'on'       => 'Yes',
			'off'      => 'No',
		),
		array(
			'id'       => 'top-bar-background',
			'type'     => 'background',
			'compiler' => array( '.wh-top-bar' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the top bar', 'wheels' ),
			'default'  => array(),
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'         => 'top-bar-typography',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify font properties.', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( '.wh-top-bar' ),
			'default'    => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
			'required'   => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'top-bar-menu-typography',
			'type'           => 'typography',
			'title'          => __( 'Menu Font', 'wheels' ),
			'subtitle'       => __( 'Specify the top bar menu font properties.', 'wheels' ),
			'google'         => true,
			'text-align'     => false,
			'color'          => false,
			'text-transform' => true,
			'compiler'       => array( '.wh-top-bar a' ),
			'default'        => array(
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
			'required'       => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-menu-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Menu Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'right',
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-link-color',
			'type'     => 'link_color',
			'title'    => __( 'Link Color', 'wheels' ),
			'compiler' => array( '.wh-top-bar a' ),
			'default'  => array(
				'regular' => '#000',
				'hover'   => '#bbb',
				'active'  => '#ccc',
			),
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-text',
			'type'     => 'editor',
			'title'    => __( 'Text Block', 'wheels' ),
			'default'  => 'Demo Top Bar Text',
			'args'     => array(
				'teeny'         => false,
				'media_buttons' => false
			),
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-text-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Text Block Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'left',
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-layout',
			'type'     => 'sorter',
			'title'    => 'Layout Manager',
			'desc'     => 'Organize how you want the elements to appear in the top bar.',
			'options'  => array(
				'enabled'  => array(
					'text' => 'Top Bar Text',
					'menu' => 'Menu',
				),
				'disabled' => array(
				),
			),
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'            => 'top-bar-menu-width',
			'type'          => 'slider',
			'title'         => __( 'Menu Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change menu width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps.', 'wheels' ),
			'default'       => 6,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label',
			'required'      => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'            => 'top-bar-text-width',
			'type'          => 'slider',
			'title'         => __( 'Text Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change text width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps.', 'wheels' ),
			'default'       => 6,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label',
			'required'      => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-padding-override',
			'type'     => 'switch',
			'title'    => __( 'Override Top Bar Padding', 'wheels' ),
			'default'  => false,
			'on'       => 'Yes',
			'off'      => 'No',
			'required' => array(
				array( 'top-bar-use', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'top-bar-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-top-bar > .cbp-container > div' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Top Bar Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '5px',
				'padding-right'  => '20px',
				'padding-bottom' => '5px',
				'padding-left'   => '20px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'top-bar-use', 'equals', '1' ),
				array( 'top-bar-padding-override', 'equals', '1' ),
			),

		),
	)
);
$this->sections[] = array(
	'title'      => __( 'Top Bar Additional', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'top-bar-additional-use',
			'type'     => 'switch',
			'title'    => __( 'Use Top Bar', 'wheels' ),
			'default'  => false,
			'compiler' => 'true',
			'on'       => 'Yes',
			'off'      => 'No',
		),
		array(
			'id'       => 'top-bar-additional-show-on-mobile',
			'type'     => 'switch',
			'title'    => __( 'Show on Mobile Devices', 'wheels' ),
			'default'  => false,
			'compiler' => 'true',
			'on'       => 'Yes',
			'off'      => 'No',
		),
		array(
			'id'       => 'top-bar-additional-background',
			'type'     => 'background',
			'compiler' => array( '.wh-top-bar-additional' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the top bar', 'wheels' ),
			'default'  => array(),
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'         => 'top-bar-additional-typography',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify the footer font properties.', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( '.wh-top-bar-additional' ),
			'default'    => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
			'required'   => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-additional-link-color',
			'type'     => 'link_color',
			'title'    => __( 'Link Color', 'wheels' ),
			'compiler' => array( '.wh-top-bar-additional a' ),
			'default'  => array(
				'regular' => '#000',
				'hover'   => '#bbb',
				'active'  => '#ccc',
			),
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-additional-text',
			'type'     => 'editor',
			'title'    => __( 'Text Block', 'wheels' ),
			'default'  => 'Demo Top Bar Additional Text',
			'args'     => array(
				'teeny'         => false,
				'media_buttons' => false
			),
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-additional-text-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Text Block Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'left',
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'top-bar-additional-padding-override',
			'type'     => 'switch',
			'title'    => __( 'Override Top Bar Padding', 'wheels' ),
			'default'  => false,
			'on'       => 'Yes',
			'off'      => 'No',
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'top-bar-additional-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-top-bar-additional > .cbp-container > div' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Top Bar Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '5px',
				'padding-right'  => '20px',
				'padding-bottom' => '5px',
				'padding-left'   => '20px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
				array( 'top-bar-additional-padding-override', 'equals', '1' ),
			),

		),
	)
);



	$this->sections[] = array(
		'title'      => __( 'Main Menu', 'wheels' ),
		'subsection' => true,
		'fields'     => array(
			// array(
			//     'id'       => 'menu-type',
			//     'type'     => 'select',
			//     'title'    => __('Which menu to use?', 'wheels'), 
			//     'options'  => array(
			//         'default_menu'   => 'Default Theme Menu',
			//         'mega_menu_main' => 'Mega Menu Main (plugin included with the theme)',
			//     ),
			//     'default'  => 'default_menu',
			// ),
			// array(
			//     'id'        => 'use-menu-search',
			//     'type'      => 'switch',
			//     'title'     => __('Add Search to Menu', 'wheels'),
			//     'default'   => 1,
			//     'required' => array(
			//         array('menu-type','equals','default_menu'),
			//     ),
			// ),
			// array(
			//     'id'        => 'menu-custom-link-use',
			//     'type'      => 'switch',
			//     'title'     => __('Use Custom Link', 'wheels'),
			//     'default'   => 0,
			//     'required' => array(
			//         array('menu-type','equals','default_menu'),
			//     ),
			// ),
			// array(
			//     'id'       => 'menu-custom-link-image',
			//     'type'     => 'media',
			//     'url'      => true,
			//     'title'    => __('Custom Link Image', 'wheels'),
			//     'required' => array(
			//         array('menu-custom-link-use','equals','1'),
			//     ),
			// ),
			// array(
			//     'id'       => 'menu-custom-link-url',
			//     'type'     => 'text',
			//     'title'    => __('Custom Link Url', 'wheels'),
			//     'required' => array(
			//         array('menu-custom-link-use','equals','1'),
			//     ),
			// ),
			// array(
			//     'id'       => 'menu-custom-link-css-class',
			//     'type'     => 'text',
			//     'title'    => __('Custom Link CSS Class', 'wheels'),
			//     'required' => array(
			//         array('menu-custom-link-use','equals','1'),
			//     ),
			// ),
			// array(
			//     'id'       => 'menu-custom-link-dimensions',
			//     'type'     => 'dimensions',
			//     'units'    => array('em','px','%'),
			//     'title'    => __('Custom Link Dimensions', ''),
			//     'compiler'   => array('.wh-custom-link'),
			//     'default'  => array(
			//         'width'   => '54px',
			//         'height'  => '30px',
			//         'units'   => 'px',
			//     ),
			//     'required' => array(
			//         array('menu-custom-link-use','equals','1'),
			//     ),
			// ),
			array(
			    'id'             => 'menu-main-top-level-typography',
			    'type'           => 'typography',
			    'title'          => __('Top Level Items Typography', 'wheels'),
			    'google'         => true,    // Disable google fonts. Won't work if you haven't defined your google api key
			    'font-backup'    => true,    // Select a backup non-google font in addition to a google font
			    'color'          => false,
			    'text-transform' => true,
			    'all_styles'     => true,    // Enable all Google Font style/weight variations to be added to the page
			    'compiler'         => array('.sf-menu.wh-menu-main a, .respmenu li a'), // An array of CSS selectors to apply this font style to dynamically
			    'units'          => 'px', // Defaults to px
			    'default'        => array(
			        'font-style'    => '700',
			        'font-family'   => 'Abel',
			        'google'        => true,
			        'font-size'     => '18px',
			        'line-height'   => '24px'
			    ),
			),                    
			array(
			    'id'             => 'menu-main-sub-items-typography',
			    'type'           => 'typography',
			    'title'          => __('Subitems Typography', 'wheels'),
			    'google'         => true,    // Disable google fonts. Won't work if you haven't defined your google api key
			    'font-backup'    => true,    // Select a backup non-google font in addition to a google font
			    'color'          => false,
			    'text-transform' => true,
			    'all_styles'     => true,    // Enable all Google Font style/weight variations to be added to the page
			    'compiler'         => array('.sf-menu.wh-menu-main ul li a'), // An array of CSS selectors to apply this font style to dynamically
			    'units'          => 'px', // Defaults to px
			    'default'        => array(
			        'font-style'    => '700',
			        'font-family'   => 'Abel',
			        'google'        => true,
			        'font-size'     => '16px',
			        'line-height'   => '24px'
			    ),
			),
			array(
			    'id'        => 'main-menu-link-color',
			    'type'      => 'link_color',
			    'title'     => __('Menu Item Link Color', 'wheels'),
			    'active'    => false, // Disable Active Color
			    'compiler'     => array('.sf-menu.wh-menu-main .menu-item a', '.respmenu li a', '.cbp-respmenu-more'),
			    'default'   => array(
			        'regular'   => '#000',
			        'hover'     => '#333',
			    ),
			),
			array(
			    'id'        => 'main-menu-menu-item-hover-background',
			    'type'      => 'background',
			    'compiler'    => array('.sf-menu.wh-menu-main li:hover, .sf-menu.wh-menu-main li.sfHover, .sf-menu.wh-menu-main ul li, .sf-menu.wh-menu-main ul ul li'),
			    'title'     => __('Menu Item Hover Background', 'wheels'),
			    'subtitle'  => __('Pick a background color for the menu item on hover.', 'wheels'),
			),
			array(
			    'id'        => 'main-menu-current-item-background',
			    'type'      => 'background',
			    'compiler'    => array('.sf-menu.wh-menu-main .current-menu-item'),
			    'title'     => __('Current Menu Item Background', 'wheels'),
			    'subtitle'  => __('Pick a background color for the menu item on hover.', 'wheels'),
			),
			array(
			    'id'        => 'main-menu-current-item-link-color',
			    'type'      => 'link_color',
			    'title'     => __('Current Menu Item Link Color', 'wheels'),
			    'active'    => false, // Disable Active Color
			    'compiler'     => array('.sf-menu.wh-menu-main .current-menu-item a'),
			    'default'   => array(
			        'regular'   => '#000',
			        'hover'     => '#333',
			    ),
			),
			array(
			    'id'        => 'main-menu-submenu-item-background',
			    'type'      => 'background',
			    'compiler'    => array('.sf-menu.wh-menu-main ul li'),
			    'title'     => __('Submenu Menu Item Background', 'wheels'),
			    'default'   => array(
			        'background-color'   => '#fff',
			    ),
			),
			array(
			    'id'             => 'main-menu-padding',
			    'type'           => 'spacing',
			    'compiler'         => array('.wh-menu-main'),
			    'mode'           => 'padding',
			    'units'          => array('px'),
			    'units_extended' => 'false',
			    'title'          => __('Padding Top', 'wheels'),
			    'description'    => __('Use it to better vertical align the menu', 'wheels'),
			    'left' => false,
			    'right' => false,
			    'bottom' => false,
			    'default'            => array(
			        'padding-top'    => '0', 
			        'units'          => 'px', 
			    ),
			),
			array(
			    'id'        => 'main-menu-use-menu-is-sticky',
			    'type'      => 'switch',
			    'title'     => __('Enable Sticky Menu', 'wheels'),
			    'default'   => 1,
			),
			// this is manually concatonated in compiler action because of !important
			array(
				'id'       => 'main-menu-sticky-logo-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'compiler' => 'true',
				'title'    => __('Sticky Menu Logo Height', 'wheels'),
				'width'    => false,
				'default'  => array(
				),
			),
			array(
				'id'       => 'main-menu-sticky-background',
				'type'     => 'background',
				'title'    => __('Sticky Menu Background', 'wheels'),
				'compiler'         => array('.wh-sticky-header .wh-main-menu-bar-wrapper'),
				'default'  => array(
				   'background-color' => '#999',
				),
			    'required' => array(
					array( 'main-menu-use-menu-is-sticky', 'equals', '1' ),
				),
			),
			array(
				'id'             => 'main-menu-sticky-padding',
				'type'           => 'spacing',
				'compiler'         => array('.wh-sticky-header .wh-menu-main'),
				'mode'           => 'padding',
				'units'          => array('px'),
				'units_extended' => 'false',
				'title'          => __('Padding Top', 'wheels'),
				'description'    => __('Use it to better vertical align the menu', 'wheels'),
				'left' => false,
				'right' => false,
				'bottom' => false,
				'default'            => array(
					'padding-top'    => '0',
					'units'          => 'px',
				),
				'required' => array(
					array( 'main-menu-use-menu-is-sticky', 'equals', '1' ),
				)
			),
			array( 
			    'id'       => 'main-menu-sticky-border',
			    'type'     => 'border',
			    'title'    => __('Sticky Meny Border', 'wheels'),
			    'compiler' => array('.wh-sticky-header .wh-main-menu-bar-wrapper'),
			    'all'      => false,
			    'bottom'   => true,
			    'top'      => false,
			    'left'     => false,
			    'right'    => false,
			    'default'  => array(
			        'border-color'  => '#f5f5f5', 
			        'border-style'  => 'solid', 
			        'border-bottom' => '1px', 
			    )
			),
			array(
			    'id'          => 'main-menu-initial-waypoint-compensation',
			    'type'        => 'text',
			    'title'       => __('Initial Waypoint Scroll Compensation', 'wheels'),
			    'description' => __('Enter number only.', 'wheels'),
			    'validate'    => 'number',
			    'default'     => 120
			),
			// array(
			// 	'id'             => 'mega-main-menu-typography',
			// 	'type'           => 'typography',
			// 	'title'          => __( 'Mega Main Menu Typography', 'wheels' ),
			// 	'google'         => false,
			// 	// Disable google fonts. Won't work if you haven't defined your google api key
			// 	'font-backup'    => false,
			// 	// Select a backup non-google font in addition to a google font
			// 	'color'          => false,
			// 	'all_styles'     => false,
			// 	// Enable all Google Font style/weight variations to be added to the page
			// 	'text-transform' => true,
			// 	'font-family'    => false,
			// 	'font-style'     => false,
			// 	'font-size'      => false,
			// 	'font-weigh'     => false,
			// 	'line-height'    => false,
			// 	'text-align'     => false,
			// 	'compiler'       => array( '.primary_navigation .link_text' ),
			// 	// An array of CSS selectors to apply this font style to dynamically
			// 	'units'          => 'px',
			// 	// Defaults to px
			// 	'subtitle'       => __( 'This setting is missing form Mega Main Plugin styling so we are adding it here.',
			// 		'wheels' ),
			// 	'default'        => array(),
			// ),
			// array(
			// 	'id'             => 'mega-main-menu-wrapper-padding',
			// 	'type'           => 'spacing',
			// 	'compiler'       => array( '.mega-main-menu-wrapper' ),
			// 	'mode'           => 'padding',
			// 	'units'          => array( 'em', 'px' ),
			// 	'units_extended' => 'false',
			// 	'title'          => __( 'Wrapper Padding', 'wheels' ),
			// 	'default'        => array(
			// 		'padding-top'    => '0',
			// 		'padding-right'  => '0',
			// 		'padding-bottom' => '0',
			// 		'padding-left'   => '0',
			// 		'units'          => 'px',
			// 	),
			// ),
			// array(
			// 	'id'             => 'mega-main-menu-logo-padding',
			// 	'type'           => 'spacing',
			// 	'compiler'       => array( '#mega_main_menu.primary_navigation .logo_link' ),
			// 	'mode'           => 'padding',
			// 	'units'          => array( 'em', 'px' ),
			// 	'units_extended' => 'false',
			// 	'title'          => __( 'Logo Padding', 'wheels' ),
			// 	'default'        => array(
			// 		'padding-top'    => '0',
			// 		'padding-right'  => '0',
			// 		'padding-bottom' => '0',
			// 		'padding-left'   => '0',
			// 		'units'          => 'px',
			// 	),
			// ),
			// array(
			// 	'id'       => 'mega-main-sticky-bg-color-use',
			// 	'type'     => 'switch',
			// 	'title'    => __( 'Mega Main Menu Sticky Background Color', 'wheels' ),
			// 	'subtitle' => __( 'In case you set menu to be transparent.', 'wheels' ),
			// 	'compiler' => 'true',
			// 	'default'  => 1,
			// ),
//			array(
//				'id'       => 'mega-main-sticky-bg',
//				'type'     => 'background',
//				'title'    => __( 'Mega Menu Sticky Background', 'wheels' ),
//				'default'  => array(
//					'background-color' => '#1e73be',
//				),
//				'compiler' => array( '#mega_main_menu > .menu_holder.sticky_container > .mmm_fullwidth_container' ),
//				'required' => array(
//					array( 'mega-main-sticky-bg-color-use', 'equals', '1' ),
//				)
//			),
//			array(
//			    'id'       => 'mega-main-sticky-border-bottom',
//			    'type'     => 'border',
//			    'title'    => __('Mega Menu Sticky Border Bottom', 'wheels'),
//			    'compiler' => array( '#mega_main_menu > .menu_holder.sticky_container > .mmm_fullwidth_container' ),
//			    'left'     => false,
//			    'right'    => false,
//			    'top'      => false,
//			    'all'      => false,
//			    'default'  => array(
//			        'border-color'  => '#f5f5f5',
//			        'border-bottom' => '1px',
//			    )
//			),
		)
	);

$this->sections[] = array(
    'title'     => __('Responsive Menu', 'wheels'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'        => 'respmenu-use',
            'type'      => 'switch',
            'compiler'  => 'true',
            'title'     => __('Use Responsive Menu?', 'wheels'),                       
            'default'   => true,
        ),
        array(
            'id'        => 'respmenu-show-start',
            'type'      => 'spinner',
            'title'     => __('Display bellow', 'wheels'),
            'desc'      => __('Set the width of the screen in px bellow which the menu is shown.', 'wheels'),
            'default'   => '767',
            'min'   => '50',
            'max'   => '2000',
            'step'     => '1',
            'required' => array( 
                array('respmenu-use','equals','1'), 
            ),
        ),
        array(
            'id'        => 'respmenu-logo',
            'type'      => 'media',
            'title'     => __('Logo', 'wheels'),
            'url'       => true,
            'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'subtitle'  => __('Set logo image', 'wheels'),
            'required' => array( 
                array('respmenu-use','equals','1'), 
            ),
        ),
        array(
            'id'       => 'respmenu-logo-dimensions',
            'type'     => 'dimensions',
            'units'    => array('em','px','%'),
            'title'    => __('Logo Dimensions (Width/Height)', 'wheels'),
            'compiler' => array('.respmenu-header .respmenu-header-logo-link'),
            'required' => array( 
                array('respmenu-use','equals','1'), 
            ),
        ),
		array(
			'id'          => 'respmenu-display-switch-color',
			'type'        => 'color',
			'mode'        => 'border-color',
			'title'       => __( 'Display Toggle Color', 'wheels' ),
			'compiler'    => array('.respmenu-open hr'),
			'transparent' => false,
			'default'     => '#000',
			'validate'    => 'color',
		),
        array(
			'id'          => 'respmenu-display-switch-color-hover',
			'type'        => 'color',
			'mode'        => 'border-color',
			'title'       => __( 'Display Toggle Hover Color', 'wheels' ),
			'compiler'    => array('.respmenu-open:hover hr'),
			'transparent' => false,
			'default'     => '#999',
			'validate'    => 'color',
		),
        array(
            'id'        => 'respmenu-display-switch-img',
            'type'      => 'media',
            'title'     => __('Display Toggle Image', 'wheels'),
            'url'       => true,
            'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'subtitle'  => __('Set the image to replace default 3 lines for menu toggle button.', 'wheels'),
            'required' => array( 
                array('respmenu-use','equals','1'), 
            ),
        ),
        array(
            'id'       => 'respmenu-display-switch-img-dimensions',
            'type'     => 'dimensions',
            'units'    => array('em','px','%'),
            'title'    => __('Display Toggle Image Dimensions (Width/Height)', 'wheels'),
            'compiler' => array('.respmenu-header .respmenu-open img'),
            'required' => array( 
                array('respmenu-use','equals','1'), 
            ),
        ),
    )
);

$this->sections[] = array(
	'title'      => __( 'Embellishments', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'header-embellishments-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable', 'wheels' ),
			'default' => false,
		),
		array(
			'id'       => 'header-embellishment-background-top',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-header-top' ),
			'title'    => __( 'Embellishment Top Background', 'wheels' ),
			'required' => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'header-embellishment-background-top-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Top Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-header-top' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'header-embellishment-background-top-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-header-top' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Top Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative top margin to pull it up.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'header-embellishment-background-bottom',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-header-bottom' ),
			'title'    => __( 'Embellishment Bottom Background', 'wheels' ),
			'required' => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'header-embellishment-background-bottom-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Bottom Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-header-bottom' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'header-embellishment-background-bottom-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-header-bottom' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Bottom Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative bottom margin to pull it down.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'header-embellishments-enable', 'equals', '1' ),
			),
		),

	)
);

$this->sections[] = array(
	'title'  => __( 'Page Title', 'wheels' ),
	'icon'   => 'el-icon-font',
	'fields' => array(
		array(
			'id'       => 'page-title-background',
			'type'     => 'background',
			'compiler' => array( '.wh-page-title-bar' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the page title.', 'wheels' ),
			'default'  => array(
				'background-color' => '#bfbfbf'
			),
		),
		array(
			'id'             => 'page-title-typography',
			'type'           => 'typography',
			'title'          => __( 'Page Title Font', 'wheels' ),
			'subtitle'       => __( 'Specify the page title font properties.', 'wheels' ),
			'google'         => true,
			'text-align'     => true,
			'text-transform' => true,
			'compiler'       => array( 'h1.page-title' ),
			'default'        => array(
				'color'       => '#333',
				'font-size'   => '48px',
				'line-height' => '48px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'             => 'page-title-spacing',
			'type'           => 'spacing',
			'compiler'       => array( '.page-title' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Page Title Margin', 'wheels' ),
			'default'        => array(
				'margin-top'    => '33px',
				'margin-right'  => '0px',
				'margin-bottom' => '33px',
				'margin-left'   => '0px',
				'units'         => 'px',
			),

		),
		array(
			'id'       => 'page-title-wrapper-padding-override',
			'type'     => 'switch',
			'title'    => __( 'Override Top Bar Padding', 'wheels' ),
			'default'  => false,
			'on'       => 'Yes',
			'off'      => 'No',
			'required' => array(
				array( 'top-bar-additional-use', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'page-title-wrapper-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-page-title-wrapper' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Page Title Wrapper Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '5px',
				'padding-right'  => '20px',
				'padding-bottom' => '5px',
				'padding-left'   => '20px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'page-title-wrapper-padding-override', 'equals', '1' ),
			),

		),
	),
);

$this->sections[] = array(
	'title'      => __( 'Breadcrumbs', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'page-title-breadcrumbs-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable', 'wheels' ),
			'default' => true,
		),
		array(
			'id'       => 'page-title-breadcrumbs-position',
			'type'     => 'button_set',
			'title'    => __( 'Position', 'wheels' ),
			'options'  => array(
				'above_title'  => 'Above the title',
				'bellow_title' => 'Bellow the title',
			),
			'default'  => 'bellow_title',
			'required' => array(
				array( 'page-title-breadcrumbs-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'page-title-breadcrumbs-typography',
			'type'           => 'typography',
			'title'          => __( 'Font', 'wheels' ),
			'google'         => true,
			'font-backup'    => true,
			'text-transform' => true,
			'compiler'       => array( '.wh-breadcrumbs' ),
			'units'          => 'px',
			'default'        => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '14px',
				'line-height' => '10px'
			),
			'required'       => array(
				array( 'page-title-breadcrumbs-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'page-title-breadcrumbs-link-color',
			'type'     => 'link_color',
			'title'    => __( 'Links Color', 'wheels' ),
			'active'   => false,
			'compiler' => array( '.wh-breadcrumbs a' ),
			'default'  => array(
				'regular' => '#333',
				'hover'   => '#999',
			),
			'required' => array(
				array( 'page-title-breadcrumbs-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'page-title-breadcrumbs-alignment',
			'type'     => 'button_set',
			'title'    => __( 'Alignment', 'wheels' ),
			'options'  => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default'  => 'left',
			'required' => array(
				array( 'page-title-breadcrumbs-enable', 'equals', '1' ),
			),
		),
	)
);

$this->sections[] = array(
	'title'      => __( 'Embellishments', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'page-title-embellishments-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable', 'wheels' ),
			'default' => false,
		),
		array(
			'id'       => 'page-title-embellishment-background-top',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-page-title-top' ),
			'title'    => __( 'Embellishment Top Background', 'wheels' ),
			'required' => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'page-title-embellishment-background-top-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Top Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-page-title-top' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'page-title-embellishment-background-top-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-page-title-top' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Top Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative top margin to pull it up.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'page-title-embellishment-background-bottom',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-page-title-bottom' ),
			'title'    => __( 'Embellishment Bottom Background', 'wheels' ),
			'required' => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'page-title-embellishment-background-bottom-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Bottom Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-page-title-bottom' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'page-title-embellishment-background-bottom-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-page-title-bottom' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Bottom Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative bottom margin to pull it down.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'page-title-embellishments-enable', 'equals', '1' ),
			),
		),

	)
);

$this->sections[] = array(
	'title'  => __( 'Content', 'wheels' ),
	'icon'   => 'el-icon-file-edit',
	'fields' => array(
		array(
			'id'       => 'content-background',
			'type'     => 'background',
			'compiler' => array( '.wh-content' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the content', 'wheels' ),
		),
		array(
			'id'             => 'content-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-content' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Padding', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'bottom'         => false,
			'default'        => array(
				'padding-top' => '20',
				'units'       => 'px',
			)
		),
		array(
			'id'            => 'content-width',
			'type'          => 'slider',
			'title'         => __( 'Content Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change menu width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps.', 'wheels' ),
			'default'       => 9,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label'
		),
		array(
			'id'            => 'sidebar-width',
			'type'          => 'slider',
			'title'         => __( 'Sidebar Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change menu width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps.', 'wheels' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label'
		),

	),
);

$this->sections[] = array(
	'title'      => __( 'Embellishments', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'content-embellishments-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable', 'wheels' ),
			'default' => false,
		),
		array(
			'id'       => 'content-embellishment-background-top',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-content-top' ),
			'title'    => __( 'Embellishment Top Background', 'wheels' ),
			'required' => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'content-embellishment-background-top-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Top Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-content-top' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'content-embellishment-background-top-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-content-top' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Top Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative top margin to pull it up.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'content-embellishment-background-bottom',
			'type'     => 'background',
			'compiler' => array( '.wh-embellishment-content-bottom' ),
			'title'    => __( 'Embellishment Bottom Background', 'wheels' ),
			'required' => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'content-embellishment-background-bottom-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Embellishment Bottom Container Height', 'wheels' ),
			'compiler' => array( '.wh-embellishment-content-bottom' ),
			'width'    => false,
			'default'  => array(
				'height' => '20',
				'units'  => 'px'
			),
			'required' => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'content-embellishment-background-bottom-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-embellishment-content-bottom' ),
			'mode'           => 'margin',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Embellishment Bottom Container Margin', 'wheels' ),
			'desc'           => __( 'Use negative bottom margin to pull it up.', 'wheels' ),
			'left'           => false,
			'right'          => false,
			'default'        => array(
				'margin-top'    => '0',
				'margin-bottom' => '0',
				'units'         => 'px',
			),
			'required'       => array(
				array( 'content-embellishments-enable', 'equals', '1' ),
			),
		),

	)
);

$this->sections[] = array(
	'title'  => __( 'Blog/Archive', 'wheels' ),
	'icon'   => 'el-icon-file',
	'fields' => array(
		array(
			'id'       => 'post-excerpt-length',
			'type'     => 'text',
			'title'    => __('Post Excerpt Length', 'wheels'),
			'subtitle' => __('This setting will be applied to any section using post excerpt','wheels'),
			'validate' => 'numeric',
			'msg'      => 'You must enter a number.',
			'default'  => 20
		),
	)
);

$this->sections[] = array(
	'title'  => __( 'Blog/Archive Single', 'wheels' ),
	'subsection'   => true,
	'fields' => array(
		array(
			'id'      => 'single-post-is-boxed',
			'type'    => 'switch',
			'title'   => __( 'Is Boxed?', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'      => 'single-post-sidebar-left',
			'type'    => 'switch',
			'title'   => __( 'Sidebar on the Left?', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'      => 'archive-single-use-share-this',
			'type'    => 'switch',
			'title'   => __( 'Use Share This buttons?', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),

	)
);



$this->sections[] = array(
	'title'  => __( 'Search Page', 'wheels' ),
	'icon'   => 'el-icon-search',
	'fields' => array(
		array(
			'id'      => 'search-page-use-sidebar',
			'type'    => 'switch',
			'title'   => __( 'Use Sidebar?', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'       => 'search-page-items-per-page',
			'type'     => 'text',
			'title'    => __( 'Items Per Page', 'wheels' ),
			'validate' => 'numeric',
			'msg'      => 'You must enter a number.',
			'default'  => 10
		),

	)
);


$this->sections[] = array(
	'title'  => __( 'Footer', 'wheels' ),
	'icon'   => 'el-icon-credit-card',
	'fields' => array(
		array(
			'id'       => 'footer-background',
			'type'     => 'background',
			'compiler' => array( '.wh-footer-bottom' ),
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( 'Pick a background color for the footer.', 'wheels' ),
			'default'  => array(
				'background-color' => '#9e9e9e'
			),
		),
		array(
			'id'         => 'footer-typography',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify the footer font properties.', 'wheels' ),
			'google'     => true,
			'text-align' => false,
			'compiler'   => array( '.wh-footer-bottom' ),
			'default'    => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'             => 'footer-menu-typography',
			'type'           => 'typography',
			'title'          => __( 'Menu Font', 'wheels' ),
			'subtitle'       => __( 'Specify the footer menu font properties.', 'wheels' ),
			'google'         => true,
			'text-align'     => false,
			'color'          => false,
			'text-transform' => false,
			'compiler'       => array( '.wh-footer-bottom a' ),
			'default'        => array(
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-family' => 'Arial,Helvetica,sans-serif',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'      => 'footer-menu-alignment',
			'type'    => 'button_set',
			'title'   => __( 'Menu Alignment', 'wheels' ),
			'options' => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default' => 'left'
		),
		array(
			'id'       => 'footer-link-color',
			'type'     => 'link_color',
			'title'    => __( 'Link Color', 'wheels' ),
			'compiler' => array( '.wh-footer-bottom a' ),
			'default'  => array(
				'regular' => '#000',
				'hover'   => '#bbb',
				'active'  => '#ccc',
			)
		),
		array(
			'id'      => 'footer-text',
			'type'    => 'editor',
			'title'   => __( 'Text Block', 'wheels' ),
			'default' => 'Demo Footer Text',
			'args'    => array(
				'teeny'         => false,
				'media_buttons' => false
			),
		),
		array(
			'id'      => 'footer-text-alignment',
			'type'    => 'button_set',
			'title'   => __( 'Text Block Alignment', 'wheels' ),
			'options' => array(
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right',
			),
			'default' => 'right'
		),
		array(
			'id'      => 'footer-layout',
			'type'    => 'sorter',
			'title'   => 'Layout Manager',
			'desc'    => 'Organize how you want the elements to appear in the footer.',
			'options' => array(
				'enabled'  => array(
					'menu' => 'Menu',
					'text' => 'Footer Text',
				),
				'disabled' => array(),
			),
		),
		array(
			'id'            => 'footer-elements-grid',
			'type'          => 'slider',
			'title'         => __( 'Menu Width/ Text Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change menu/text width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps. The other will take what is left to 12.', 'wheels' ),
			'default'       => 6,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label'
		),
		array(
			'id'      => 'footer-bottom-padding-override',
			'type'    => 'switch',
			'title'   => __( 'Override Footer Bottom Padding', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'             => 'footer-bottom-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-footer-bottom > .cbp-container > div' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Footer Bottom Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '0',
				'padding-right'  => '0',
				'padding-bottom' => '0',
				'padding-left'   => '0px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'footer-bottom-padding-override', 'equals', '1' ),
			),

		),
	)
);

$this->sections[] = array(
	'title'      => __( 'Footer Widgets', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-widget-background',
			'type'     => 'background',
			'compiler' => array( '.wh-footer' ),
			'title'    => __( 'Background', 'wheels' ),
			'default'  => array(
				'background-color' => '#bfbfbf'
			),
		),
		array(
			'id'       => 'footer-widget-title-typography',
			'type'     => 'typography',
			'title'    => __( 'Title Font', 'wheels' ),
			'subtitle' => __( 'Specify the widget title font properties.', 'wheels' ),
			'google'   => true,
			'compiler' => array( '.wh-footer h3' ),
			'default'  => array(
				'color'       => '#333',
				'font-size'   => '20px',
				'line-height' => '22px',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'       => 'footer-widget-subtitle-typography',
			'type'     => 'typography',
			'title'    => __( 'Subtitle Font', 'wheels' ),
			'subtitle' => __( 'Specify the widget link font properties.', 'wheels' ),
			'google'   => true,
			'color'    => false,
			'compiler' => array(
				'.wh-footer h4',
				'.wh-footer h5',
				'.wh-footer h4 a',
				'.wh-footer h5 a'
			),
			'default'  => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'       => 'footer-widget-subtitle-color',
			'type'     => 'link_color',
			'title'    => __( 'Link Color', 'wheels' ),
			'active'   => false,
			'compiler' => array( '.wh-footer-top a' ),
			'default'  => array(
				'regular' => '#1e73be', // blue
				'hover'   => '#dd3333', // red
			)
		),
		array(
			'id'       => 'footer-widget-text-typography',
			'type'     => 'typography',
			'title'    => __( 'Font', 'wheels' ),
			'subtitle' => __( 'Specify the widget font properties.', 'wheels' ),
			'google'   => true,
			'compiler' => array( '.wh-footer', '.wh-footer p', '.wh-footer span' ),
			'default'  => array(
				'color'       => '#333',
				'font-size'   => '14px',
				'line-height' => '22px',
				'font-weight' => 'Normal',
			),
		),
		array(
			'id'            => 'footer-widget-width',
			'type'          => 'slider',
			'title'         => __( 'Footer Widget Width', 'wheels' ),
			'subtitle'      => __( 'Drag the slider to change widget width grid steps.', 'wheels' ),
			'desc'          => __( 'The grid has 12 steps.', 'wheels' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 12,
			'display_value' => 'label'
		),
		array(
			'id'       => 'footer-widget-min-height',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'title'    => __( 'Min Height', 'wheels' ),
			'compiler' => array( '.wh-footer .widget' ),
			'height'   => false,
			'mode'     => 'min-height',
			'default'  => array(
				'width' => '250',
				'units' => 'px',
			),
		),
		array(
			'id'      => 'footer-widget-padding-override',
			'type'    => 'switch',
			'title'   => __( 'Override Footer Widget Padding', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'             => 'footer-widget-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.wh-footer > .cbp-container > div' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Footer Widget Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '5px',
				'padding-right'  => '20px',
				'padding-bottom' => '5px',
				'padding-left'   => '20px',
				'units'          => 'px',
			),
			'required'       => array(
				array( 'footer-widget-padding-override', 'equals', '1' ),
			),

		),
	)
);

$this->sections[] = array(
	'icon'   => 'el-icon-website',
	'title'  => __( 'Forms', 'wheels' ),
	'fields' => array(
		array(
			'id'       => 'form-element-background',
			'type'     => 'background',
			'title'    => __( 'Background', 'wheels' ),
			'subtitle' => __( '(input, textarea)', 'wheels' ),
			'compiler' => array(
				'input, textarea',
				'input:focus, textarea:focus',
			),
			'default'  => array(
				'background-color' => '#fff',
			)
		),
		array(
			'id'       => 'form-element-input-width',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Element Width', 'wheels' ),
			'subtitle' => __( '(text, password, email, search)', 'wheels' ),
			'compiler' => array(
				'input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="url"]',
			),
			'height'   => false,
			'default'  => array(
				'width' => '80%',
				'units' => '%',
			),
		),
		array(
			'id'       => 'form-element-textarea-width',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Textarea Width', 'wheels' ),
			'compiler' => array(
				'textarea',
			),
			'height'   => false,
			'default'  => array(
				'width' => '100%',
				'units' => '%',
			),
		),
		array(
			'id'       => 'form-element-input-height',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'title'    => __( 'Element Height', 'wheels' ),
			'subtitle' => __( '(text, password, email, search, select)', 'wheels' ),
			'compiler' => array(
				'input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="url"], select',
			),
			'width'    => false,
			'default'  => array(
				'height' => '35px',
				'units'  => 'px',
			),
		),
		array(
			'id'       => 'form-element-input-border',
			'type'     => 'border',
			'title'    => __( 'Border', 'wheels' ),
			'all'      => false,
			'compiler' => array(
				'input[type="text"], input[type="password"], input[type="email"], input[type="search"], textarea',
				'input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, input[type="search"]:focus, input[type="url"]:focus, textarea:focus',
			),
			'default'  => array(),
		),
	)
);

$default_button_selectors = array(
	'button',
	'input[type="submit"]',
	'input[type="button"]',
	'input[type="reset"]',
	'.wh-button',
	'#tribe-events .tribe-events-button',
	'#tribe-bar-form .tribe-bar-submit input[type=submit]',
);

$default_button_selectors_hover = array(
	'button:hover',
	'input[type="submit"]:hover',
	'input[type="button"]:hover',
	'input[type="reset"]:hover',
	'.wh-button:hover',
	'#tribe-events .tribe-events-button:hover',
	'#tribe-bar-form .tribe-bar-submit input[type=submit]',
);

$button_selectors       = wheels_filter_array( 'wheels_filter_button_selectors', $default_button_selectors );
$button_selectors_hover = wheels_array_val_concat( $button_selectors, ':hover', $default_button_selectors_hover );

$this->sections[] = array(
	'title'   => __( 'Buttons', 'wheels' ),
	'heading' => 'Default Button Styling',
	'icon'    => 'el-icon-hand-up',
	'fields'  => array(
		array(
			'id'       => 'button-background',
			'type'     => 'background',
			'title'    => __( 'Background Color', 'wheels' ),
			'compiler' => $button_selectors,
			'default'  => array(
				'background-color' => '#1e73be',
			)
		),
		array(
			'id'       => 'button-background-hover',
			'type'     => 'background',
			'title'    => __( 'Background Hover Color', 'wheels' ),
			'compiler' => $button_selectors_hover,
			'default'  => array(
				'background-color' => '#56D879',
			)
		),
		array(
			'id'         => 'button-typography',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify font properties.', 'wheels' ),
			'google'     => true,
			'text-transform' => true,
			'compiler'   => $button_selectors,
			'default'    => array(

			),
		),
		// array(
		// 	'id'          => 'button-text-color',
		// 	'type'        => 'color',
		// 	'title'       => __( 'Text Color', 'wheels' ),
		// 	'compiler'    => $button_selectors,
		// 	'transparent' => false,
		// 	'default'     => '#FFFFFF',
		// 	'validate'    => 'color',
		// ),
		array(
			'id'          => 'button-text-color-hover',
			'type'        => 'color',
			'title'       => __( 'Text Hover Color', 'wheels' ),
			'compiler'    => $button_selectors_hover,
			'transparent' => false,
			'default'     => '#FFFFFF',
			'validate'    => 'color',
		),
		array(
			'id'       => 'button-border-radius',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'title'    => __( 'Border Radius', 'wheels' ),
			'mode'     => 'border-radius',
			'height'   => false,
			'compiler' => $button_selectors,
			'default'  => array(
				'width' => '2',
				'units' => 'px',
			),
		),
		array(
			'id'       => 'button-border-use',
			'type'     => 'switch',
			'title'    => __( 'Use Border', 'wheels' ),
			'default'  => true,
			'compiler' => true,
			'on'       => 'Yes',
			'off'      => 'No',
		),
		array(
			'id'       => 'button-border',
			'type'     => 'border',
			'title'    => __( 'Border', 'wheels' ),
			'compiler' => $button_selectors,
			'all'      => false,
			'default'  => array(
				'border-color'  => '#1e73be',
				'border-style'  => 'solid',
				'border-top'    => '1px',
				'border-right'  => '1px',
				'border-bottom' => '1px',
				'border-left'   => '1px'
			),
			'required' => array(
				array( 'button-border-use', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'button-border-hover',
			'type'     => 'border',
			'title'    => __( 'Border Hover', 'wheels' ),
			'compiler' => $button_selectors_hover,
			'all'      => false,
			'default'  => array(
				'border-color'  => '#56D879',
				'border-style'  => 'solid',
				'border-top'    => '1px',
				'border-right'  => '1px',
				'border-bottom' => '1px',
				'border-left'   => '1px'
			),
			'required' => array(
				array( 'button-border-use', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'button-padding',
			'type'           => 'spacing',
			'compiler'       => $button_selectors,
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Button Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '10px',
				'padding-right'  => '24px',
				'padding-bottom' => '10px',
				'padding-left'   => '24px',
				'units'          => 'px',
			)
		),
	)
);


$alt_buttons                = wheels_filter_array( 'wheels_filter_alt_button_selectors', array(' .wh-alt-button', '.tagcloud a' ) );
$alt_button_selectors_hover = wheels_array_val_concat( $alt_buttons, ':hover', array( '.wh-alt-button:hover' ) );


$this->sections[] = array(
	'title'      => __( 'Alternative Button', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'button-background-alt',
			'type'     => 'background',
			'title'    => __( 'Background Color', 'wheels' ),
			'compiler' => $alt_buttons,
			'default'  => array(
				'background-color' => '#1e73be',
			)
		),
		array(
			'id'       => 'button-background-hover-alt',
			'type'     => 'background',
			'title'    => __( 'Background Hover Color', 'wheels' ),
			'compiler' => $alt_button_selectors_hover,
			'default'  => array(
				'background-color' => '#56D879',
			)
		),
		array(
			'id'         => 'button-typography-alt',
			'type'       => 'typography',
			'title'      => __( 'Font', 'wheels' ),
			'subtitle'   => __( 'Specify font properties.', 'wheels' ),
			'google'     => true,
			'text-transform' => true,
			'compiler'   => $alt_buttons,
			'default'    => array(

			),
		),
		array(
			'id'          => 'button-text-color-hover-alt',
			'type'        => 'color',
			'title'       => __( 'Text Hover Color', 'wheels' ),
			'compiler'    => $alt_button_selectors_hover,
			'transparent' => false,
			'default'     => '#FFFFFF',
			'validate'    => 'color',
		),
		array(
			'id'       => 'button-border-radius-alt',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'title'    => __( 'Border Radius', 'wheels' ),
			'mode'     => 'border-radius',
			'height'   => false,
			'compiler' => $alt_buttons,
			'default'  => array(
				'width' => '2',
				'units' => 'px',
			),
		),
		array(
			'id'      => 'button-border-use-alt',
			'type'    => 'switch',
			'title'   => __( 'Use Border', 'wheels' ),
			'default' => true,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'       => 'button-border-alt',
			'type'     => 'border',
			'title'    => __( 'Border', 'wheels' ),
			'compiler' => $alt_buttons,
			'all'      => false,
			'default'  => array(
				'border-color'  => '#1e73be',
				'border-style'  => 'solid',
				'border-top'    => '1px',
				'border-right'  => '1px',
				'border-bottom' => '1px',
				'border-left'   => '1px'
			),
			'required' => array(
				array( 'button-border-use-alt', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'button-border-hover-alt',
			'type'     => 'border',
			'title'    => __( 'Border Hover', 'wheels' ),
			'compiler' => $alt_button_selectors_hover,
			'all'      => false,
			'default'  => array(
				'border-color'  => '#56D879',
				'border-style'  => 'solid',
				'border-top'    => '1px',
				'border-right'  => '1px',
				'border-bottom' => '1px',
				'border-left'   => '1px'
			),
			'required' => array(
				array( 'button-border-use-alt', 'equals', '1' ),
			),
		),
		array(
			'id'             => 'button-padding-alt',
			'type'           => 'spacing',
			'compiler'       => $alt_buttons,
			'mode'           => 'padding',
			'units'          => array( 'em', 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Button Padding', 'wheels' ),
			'default'        => array(
				'padding-top'    => '10px',
				'padding-right'  => '24px',
				'padding-bottom' => '10px',
				'padding-left'   => '24px',
				'units'          => 'px',
			)
		),
	)
);

$this->sections[] = array(
	'icon'   => 'el-icon-website',
	'title'  => __( 'Misc', 'wheels' ),
	'fields' => array()
);

$this->sections[] = array(
	'title'      => __( 'Scroll to Top Button', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'use-scroll-to-top',
			'type'    => 'switch',
			'title'   => __( 'Use Scroll to Top Button?', 'wheels' ),
			'default' => true,
			'on'      => 'Yes',
			'off'     => 'No',
		),
		array(
			'id'      => 'scroll-to-top-text',
			'type'    => 'text',
			'title'   => __( 'Scroll to Top Text', 'wheels' ),
			'default' => 'Scroll to top',
			'required' => array(
				array( 'use-scroll-to-top', 'equals', '1' ),
			),
		),
		array(
			'id'      => 'scroll-to-top-button-override',
			'type'    => 'switch',
			'title'   => __( 'Override Scroll to Top Button?', 'wheels' ),
			'default' => false,
			'on'      => 'Yes',
			'off'     => 'No',
			'required' => array(
				array( 'use-scroll-to-top', 'equals', '1' ),
			),
		),
		array(
			'id'       => 'scroll-to-top-button',
			'type'     => 'background',
			'compiler' => array( '#scrollUp' ),
			'title'    => __( 'Scroll to Top Button', 'wheels' ),
			'required' => array(
				array( 'use-scroll-to-top', 'equals', '1' ),
				array( 'scroll-to-top-button-override', 'equals', '1' ),
			),

		),
		array(
			'id'       => 'scroll-to-top-dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'compiler' => array( '#scrollUp' ),
			'title'    => __( 'Dimensions (Width/Height)', 'wheels' ),
			'default'  => array(
				'width'  => '70',
				'height' => '70'
			),
			'required' => array(
				array( 'use-scroll-to-top', 'equals', '1' ),
				array( 'scroll-to-top-button-override', 'equals', '1' ),
			),
		),
	)
);

$this->sections[] = array(
	'title'      => __( 'Text Direction', 'wheels' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'is-rtl',
			'type'    => 'switch',
			'title'   => __( 'Enable RTL?', 'wheels' ),
			'default' => false,
		),
	)
);



$this->sections[] = array(
	'icon'   => 'el-icon-website',
	'title'  => __( 'Visual Composer', 'wheels' ),
	'fields' => array(
		array(
			'id'             => 'vc-row-margin',
			'type'           => 'spacing',
			'compiler'       => array( '.cbp-container .vc_row'),
			'mode'           => 'margin',
			'units'          => array( 'px'),
			'units_extended' => 'false',
			'title'          => __( 'Row Margin', 'wheels' ),
			'desc'           => __( 'Visual Composer row margin.', 'wheels' ),
			'top'            => false,
			'bottom'         => false,
			'default'        => array(
				'margin-right'  => '-15px',
				'margin-left'   => '-15px',
				'units'          => 'px',
			)
		),
		array(
			'id'             => 'vc-column-padding',
			'type'           => 'spacing',
			'compiler'       => array( '.vc_column_container'),
			'mode'           => 'padding',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'title'          => __( 'Column Padding', 'wheels' ),
			'desc'    => __( 'Visual Composer column padding.', 'wheels' ),
			'default'        => array(
				'padding-top'    => '0',
				'padding-right'  => '15px',
				'padding-bottom' => '0',
				'padding-left'   => '15px',
				'units'          => 'px',
			)
		),
		array(
			'id'       => 'vc-accordion-title-color',
			'type'     => 'link_color',
			'title'    => __( 'Accordion Title Color', 'wheels' ),
			'compiler' => array( 
				'.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a',
			),
			'active'   => false,
			'default'  => array(
				'regular' => '#353434',
				'hover'   => '#585757',
				'active'  => '#353434',
			)
		),
		array(
			'id'       => 'vc-tabs-title-color',
			'type'     => 'link_color',
			'title'    => __( 'Tabs Title Color', 'wheels' ),
			'compiler' => array( 
				'.wpb_content_element .wpb_tabs_nav li a',
			),
			'active'   => false,
			'default'  => array(
				'regular' => '#353434',
				'hover'   => '#585757',
				'active'  => '#353434',
			)
		),
		array(
			'id'       => 'vc-tabs-title-color-active',
			'type'     => 'link_color',
			'title'    => __( 'Tabs Active Title Color', 'wheels' ),
			'compiler' => array( 
				'.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a',
			),
			'active'   => false,
			'default'  => array(
				'regular' => '#353434',
				'hover'   => '#585757',
				'active'  => '#353434',
			)
		),
	)
);


$this->sections[] = array(
	'icon'   => 'el-icon-website',
	'title'  => __( 'Events', 'wheels' ),
	'fields' => array(
		array(
			'id'       => 'tribe-events-title-color',
			'type'     => 'link_color',
			'title'    => __( 'Title Color', 'wheels' ),
			'compiler' => array( 
				'.tribe-events-list .type-tribe_events h2 a',
				'#tribe-events-content .tribe-events-tooltip h4',
			),
			'active'   => false,
			'default'  => array(
				'regular' => '#353434',
				'hover'   => '#585757',
				'active'  => '#353434',
			)
		),
		array(
		    'id'       => 'tribe-events-calendar-head-bg-color',
		    'type'     => 'color',
		    'mode'     => 'background-color',
		    'compiler' => array( 
				'.tribe-events-calendar thead th',
			),
		    'title'    => __('Calendar Head Bg Color', 'wheels'), 
		    'default'  => '#999',
		    'validate' => 'color',
		),
		// array(
		//     'id'       => 'tribe-events-calendar-head-border-color',
		//     'type'     => 'color',
		//     'compiler' => array( 
		// 		'.tribe-events-calendar thead th',
		// 	),
		//     'title'    => __('Calendar Head Border Color', 'wheels'), 
		//     'default'  => '#999',
		//     'validate' => 'color',
		// ),
		array(
			'id'       => 'tribe-events-calendar-head-border-color',
			'type'     => 'border',
			'title'    => __( 'Border', 'wheels' ),
			// 'all'      => false,
			'compiler' => array( 
				'.tribe-events-calendar thead th',
			),
			'default'  => array(
				'border-width' => '1px'
			),
		),
	)
);


//
//// VC Colors
//$vc_colors = array(
//	'Blue'        => 'blue',
//	'Turquoise'   => 'turquoise',
//	'Pink'        => 'pink',
//	'Violet'      => 'violet',
//	'Peacoc'      => 'peacoc',
//	'Chino'       => 'chino',
//	'Mulled Wine' => 'mulled_wine',
//	'Vista Blue'  => 'vista_blue',
//	'Black'       => 'black',
//	'Grey'        => 'grey',
//	'Orange'      => 'orange',
//	'Sky'         => 'sky',
//	'Green'       => 'green',
//	'Juicy pink'  => 'juicy_pink',
//	'Sandy brown' => 'sandy_brown',
//	'Purple'      => 'purple',
//	'White'       => 'white',
//);
//
//$button_color_fields = array();
//foreach ( $vc_colors as $name => $value ) {
//
//
//	$button_color_fields[] = array(
//		'id'       => 'vc-button-use-' . $value,
//		'type'     => 'switch',
//		'compiler' => 'true',
//		'title'    => 'Override ' . $name,
//		'default'  => false,
//	);
//	$button_color_fields[] = array(
//		'id'       => 'vc-button-color-' . $value,
//		'type'     => 'color',
//		'title'    => $name,
//		'compiler' => array( '.vc_btn_' . $value, '.vc_btn-' . $value ),
//		'default'  => '#FFFFFF',
//		'validate' => 'color',
//		'mode'     => 'background-color',
//		'required' => array(
//			array( 'vc-button-use-' . $value, 'equals', '1' ),
//		),
//	);
//	$button_color_fields[] = array(
//		'id'       => 'vc-button-hover-color-' . $value,
//		'type'     => 'color',
//		'title'    => $name . ' Hover',
//		'compiler' => array( '.vc_btn_' . $value . ':hover', '.vc_btn-' . $value . ':hover' ),
//		'default'  => '#FFFFFF',
//		'validate' => 'color',
//		'mode'     => 'background-color',
//		'required' => array(
//			array( 'vc-button-use-' . $value, 'equals', '1' ),
//		),
//	);
//
//
//}
//

////$this->sections[] = array(
//	'title'      => __( 'Button Colors', 'wheels' ),
//	'subsection' => true,
//	'fields'     => $button_color_fields
//);
//$this->sections[] = array(
//	'title'      => __( 'Accordion', 'wheels' ),
//	'subsection' => true,
//	'fields'     => array(
//		array(
//			'id'       => 'vc-accordion-background',
//			'type'     => 'background',
//			'title'    => __( 'Background Color', 'wheels' ),
//			'compiler' => array(
//				'.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header'
//			),
//			'default'  => array(
//				'background-color' => '#1e73be',
//			)
//		),
//		array(
//			'id'       => 'vc-accordion-link-color',
//			'type'     => 'link_color',
//			'title'    => __( 'Links Color', 'wheels' ),
//			'compiler' => array(
//				'.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a'
//			),
//			'default'  => array(
//				'regular' => '#1e73be', // blue
//				'hover'   => '#dd3333', // red
//				'active'  => '#8224e3',  // purple
//				'visited' => '#8224e3'  // purple
//			)
//		),
//		array(
//			'id'             => 'vc-accordion-padding',
//			'type'           => 'spacing',
//			'compiler'       => array( '.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header' ),
//			'mode'           => 'padding',
//			'units'          => array( 'em', 'px' ),
//			'units_extended' => 'false',
//			'title'          => __( 'Padding', 'wheels' ),
//			'default'        => array(
//				'padding-top'    => '20px',
//				'padding-right'  => '20px',
//				'padding-bottom' => '20px',
//				'padding-left'   => '20px',
//				'units'          => 'px',
//			)
//		),
//		array(
//			'id'       => 'vc-accordion-typography',
//			'type'     => 'typography',
//			'title'    => __( 'Font', 'wheels' ),
//			'google'   => true,
//			'color'    => false,
//			'compiler' => array( '.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header' ),
//			'default'  => array(),
//		),
//		array(
//			'id'       => 'vc-accordion-icon-background',
//			'type'     => 'background',
//			'title'    => __( 'Background Color', 'wheels' ),
//			'compiler' => array(
//				'.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header'
//			),
//			'default'  => array(
//				'background-color' => '#1e73be',
//			)
//		),
//		array(
//			'id'    => 'vc-accordion-open-replacement-image',
//			'type'  => 'media',
//			'title' => __( 'Open Icon Replacement', 'wheels' ),
//			'url'   => true,
//			'mode'  => false, // Can be set to false to allow any media type, or can also be set to any mime type.
//		),
//		array(
//			'id'       => 'vc-accordion-border',
//			'type'     => 'border',
//			'title'    => __( 'Border', 'wheels' ),
//			'compiler' => array(
//				'.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header'
//			),
//			'default'  => array()
//		)
//	)
//);