<?php

add_action( 'after_setup_theme', 'wheels_setup' );
add_action( 'widgets_init', 'wheels_widgets_init' );
add_filter( 'widget_text', 'do_shortcode' );

if ( ! function_exists( 'wheels_setup' ) ) {

	function wheels_setup() {


		add_filter('wheels_alt_buttons', 'wheels_add_to_alt_button_list');

		require_once 'redux/redux-theme-options.php';
		require_once 'metaboxes.php';

		// Make theme available for translation
		load_theme_textdomain( 'wheels', get_template_directory() . '/languages' );

		// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
		register_nav_menus( array(
			'primary_navigation' => __( 'Primary Navigation', 'wheels' ),
		) );
		register_nav_menus( array(
			'secondary_navigation' => __( 'Secondary Navigation', 'wheels' ),
		) );
		register_nav_menus( array(
			'top_navigation' => __( 'Top Navigation', 'wheels' ),
		) );
		register_nav_menus( array(
			'one_page_navigation_1' => __( 'One Page Navigation 1', 'wheels' ),
		) );
		register_nav_menus( array(
			'one_page_navigation_2' => __( 'One Page Navigation 2', 'wheels' ),
		) );
		register_nav_menus( array(
			'one_page_navigation_3' => __( 'One Page Navigation 3', 'wheels' ),
		) );

		// Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, false );

		// Add_image_size('wh-medium', 300, 9999); // 300px wide (and unlimited height)
		add_image_size( 'wh-big', 1140, 500, true );
		add_image_size( 'wh-featured-image', 835, 365, true );
		add_image_size( 'wh-medium', 768, 515, true );
		add_image_size( 'wh-thumb-third', 296, 216, true );
		add_image_size( 'wh-thumb-fourth', 260, 190, true );


		// Add post formats (http://codex.wordpress.org/Post_Formats)
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		) );
		add_theme_support( 'automatic-feed-links' );

		// Tell the TinyMCE editor to use a custom stylesheet
		// add_editor_style('/assets/css/editor-style.css');

		wheels_register_custom_thumbnail_sizes();

	}
}

function wheels_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary', 'wheels' ),
		'id'            => 'wheels-sidebar-primary',
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'wheels' ),
		'id'            => 'wheels-sidebar-footer',
		'before_widget' => '<div class="widget %1$s %2$s ' . wheels_class( 'widget-footer' ) . '">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Courses', 'wheels' ),
		'id'            => 'wheels-sidebar-courses',
		'before_widget' => '<div class="widget %1$s %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}

function wheels_add_to_alt_button_list($alt_button_arr) {

	$alt_button_arr[] = '.yith-wcwl-add-button a';

	return $alt_button_arr;

}
