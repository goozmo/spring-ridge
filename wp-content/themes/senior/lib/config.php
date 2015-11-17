<?php
/**
 * Configuration values
 */
define( 'WHEELS_THEME_OPTION_NAME', 'senior_options' );
// Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)
// This is just theme default value - it is overridden from theme options
define( 'POST_EXCERPT_LENGTH', 40 );

add_theme_support( 'title-tag' );

/**
 * Enable theme features
 */
// add_theme_support( 'wheels-gallery' ); // Custom [gallery]

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980;
}

/**
 * Sensei Support Declaration
 */
//add_action( 'after_setup_theme', 'wheels_declare_sensei_support' );
//function wheels_declare_sensei_support() {
//	add_theme_support( 'sensei' );
//}

/**
 * Woocommerce Support Declaration
 */
//add_theme_support( 'woocommerce' );

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'wheels_vc_set_as_theme' );
function wheels_vc_set_as_theme() {
	vc_set_as_theme();
}
