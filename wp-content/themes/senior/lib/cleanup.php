<?php

add_filter( 'language_attributes', 'wheels_language_attributes' );
// add_filter( 'wp_title', 'wheels_wp_title', 10 );
add_filter( 'excerpt_length', 'wheels_excerpt_length' );
add_filter( 'excerpt_more', 'wheels_excerpt_more' );
add_filter( 'request', 'wheels_request_filter' );
add_filter( 'get_search_form', 'wheels_get_search_form' );

/**
 * Clean up language_attributes() used in <html> tag
 *
 * Remove dir="ltr"
 */
function wheels_language_attributes() {
	$attributes = array();
	$output     = '';

	if ( is_rtl() ) {
		$attributes[] = 'dir="rtl"';
	}

	$lang = get_bloginfo( 'language' );

	if ( $lang ) {
		$attributes[] = "lang=\"$lang\"";
	}

	$output = implode( ' ', $attributes );
	$output = apply_filters( 'wheels_language_attributes', $output );

	return $output;
}

/**
 * Manage output of wp_title()
 */
function wheels_wp_title( $title ) {
	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name' );

	return $title;
}

/**
 * Clean up the_excerpt()
 */
function wheels_excerpt_length( $length ) {
	$post_excerpt_length = wheels_get_option('post-excerpt-length', POST_EXCERPT_LENGTH);
	return $post_excerpt_length;
}

function wheels_excerpt_more( $more ) {
	return '&nbsp;<a href="' . get_permalink() . '">[&hellip;]</a>';
}


/**
 * Fix for empty search queries redirecting to home page
 *
 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
 * @link http://core.trac.wordpress.org/ticket/11330
 */
function wheels_request_filter( $query_vars ) {
	if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) && ! is_admin() ) {
		$query_vars['s'] = ' ';
	}

	return $query_vars;
}


/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function wheels_get_search_form( $form ) {
	$form = '';
	locate_template( '/templates/searchform.php', true, false );

	return $form;
}

