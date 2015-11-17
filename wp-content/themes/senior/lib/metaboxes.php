<?php


add_filter( 'rwmb_meta_boxes', 'wheels_register_meta_boxes' );

function wheels_register_meta_boxes( $meta_boxes ) {
	$meta_boxes = array();
	$prefix     = 'wheels_';


//	if ( wheels_is_page_template( 'page-home.php' ) ) {
//
//		// 1st meta box
//		$meta_boxes[] = array(
//			'id'       => 'personal',
//			'title'    => 'Personal Information',
//			'pages'    => array( 'post', 'page' ),
//			'context'  => 'normal',
//			'priority' => 'high',
//			'fields'   => array(
//				array(
//					'name'  => 'Full name',
//					'desc'  => 'Format: First Last',
//					'id'    => $prefix . 'fname',
//					'type'  => 'text',
//					'std'   => 'Anh Tran',
//					'class' => 'custom-class',
//					'clone' => true,
//				),
//			)
//		);
//
//	}

	// $meta_boxes[] = array(
	// 	'title'  => 'Course Custom Fields',
	// 	'pages'  => array( 'course' ), // can be used on multiple CPTs
	// 	'fields' => array(
	// 		array(
	// 			'id'   => $prefix . 'sidebar_text',
	// 			'type' => 'wysiwyg',
	// 			'name' => __( 'Sidebar Text', 'wheels' ),
	// 			'desc' => sprintf( __( 'Link to all lined icons available %s. Just copy the class name.', 'wheels' ), '<a target="_blank" href="' . get_template_directory_uri() . '/assets/iconsmind-doc/demo.html' . '" title="' . __( 'Iconsmind', 'wheels' ) . '">' . __( 'Iconsmind', 'wheels' ) . '</a>' ),
	// 		),
	// 	)
	// );

	$menus       = get_registered_nav_menus();
	$menus_array = array();

	foreach ( $menus as $location => $description ) {
		$menus_array[ $location ] = $description;
	}


	$meta_boxes[] = array(
		'title'  => 'Page Settings',
		'pages'  => array( 'page' ), // can be used on multiple CPTs
		'fields' => array(
			array(
				'id'   => $prefix . 'use_one_page_menu',
				'type' => 'checkbox',
				'name' => __( 'Use One Page Menu', 'wheels' ),
				'desc' => __( 'When using one page menu functionality you need to add an extra class on each vc row you want to link to a menu item. Also you need to create a menu in Appearance/Menus and create custom links where each link url has the same name as the row class prefixed with # sign', 'wheels' ),
			),
			array(
				'id'          => $prefix . 'one_page_menu_location',
				'type'        => 'select',
				'name'        => __( 'Select One Page Menu Location', 'wheels' ),
				'desc'        => __( 'Used only if Use One Page Menu is checked.', 'wheels' ),
				'options'     => $menus_array,
				'placeholder' => 'Select Menu Location',
			),
		)
	);

	return $meta_boxes;
}