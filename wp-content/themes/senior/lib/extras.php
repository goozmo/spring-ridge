<?php
/**
 * Custom functions
 */

add_action( 'wp_head', 'wheels_favicon' );
add_action( 'wp_head', 'wheels_custom_css' );
add_action( 'wp_head', 'wheels_custom_js_code' );
add_action( 'wp_head', 'wheels_google_analytics_code' );
add_action( 'wp_head', 'wheels_responsive_menu_scripts' );

// add_filter( 'wp_page_menu_args', 'wheels_filter_wp_page_menu_args' );

if ( function_exists( 'vc_add_param' ) ) {

	vc_add_param( 'vc_row', array(
		'type'        => 'textfield',
		'class'       => '',
		'heading'     => __( 'id', 'wheels' ),
		'param_name'  => 'row_id',
		'value'       => '',
		'description' => __( 'HTML id attribute.', 'wheels' ),
	) );

	vc_add_param( 'vc_row', array(
		'type'        => 'dropdown',
		'class'       => '',
		'heading'     => __( 'Is Container?', 'wheels' ),
		'param_name'  => 'is_container',
		'value'       => array(
			__( 'Yes', 'wheels' ) => '1',
			__( 'No', 'wheels' )  => '0',
		),
		'description' => __( 'If is not a container then if will occupy 100% width.', 'wheels' ),
	) );
}

function wheels_filter_wp_page_menu_args($args) {



	// $args['menu_class']      = wheels_class( 'main-menu' );
	// $args['container_class'] = wheels_class( 'main-menu-container' );

	return $args;


}


function wheels_register_custom_thumbnail_sizes() {
	$string = wheels_get_option( 'custom-thumbnail-sizes' );

	if ( $string ) {

		$pattern     = '/[^a-zA-Z0-9\-\|\:]/';
		$replacement = '';
		$string      = preg_replace( $pattern, $replacement, $string );

		$resArr = explode( '|', $string );
		$thumbs = array();

		foreach ( $resArr as $thumbString ) {
			if ( ! empty( $thumbString ) ) {
				$parts               = explode( ':', trim( $thumbString ) );
				$thumbs[ $parts[0] ] = explode( 'x', $parts[1] );
			}
		}

		foreach ( $thumbs as $name => $sizes ) {
			add_image_size( $name, (int) $sizes[0], (int) $sizes[1], true );
		}
	}
}


if ( ! function_exists( 'wheels_entry_meta' ) ) {

	/**
	 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
	 *
	 * @return void
	 */
	function wheels_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'wheels' ) . '</span>';
		}

		if ( ! has_post_format( 'link' ) && 'post' == get_post_type() ) {
			wheels_entry_date();
		}

		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'wheels' ) );
		if ( $categories_list ) {
			echo '/<span class="categories-links">' . $categories_list . '</span>';
		}

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'wheels' ) );
		if ( $tag_list ) {
			echo '/<span class="tags-links">' . $tag_list . '</span>';
		}

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '/<span class="author vcard">%1$s <a class="url fn n" href="%2$s" title="%3$s" rel="author">%4$s</a></span>',
				__( 'by', 'wheels'),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'wheels' ), get_the_author() ) ),
				get_the_author()
			);

			$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

				if ( $num_comments == 0 ) {

				} else {

				 if ( $num_comments > 1 ) {
						$comments = $num_comments . __(' Comments', 'wheels');
					} else {
						$comments = __('1 Comment', 'wheels');
					}
					echo $write_comments = '/<span class="comments-count"><a href="' . get_comments_link() .'">'. $comments.'</a></span>';
				}

		}


	}
}

if ( ! function_exists( 'wheels_entry_date' ) ) {

	/**
	 * Prints HTML with date information for current post.
	 *
	 * @param boolean $echo Whether to echo the date. Default true.
	 *
	 * @return string The HTML-formatted post date.
	 */
	function wheels_entry_date( $echo = true ) {
		if ( has_post_format( array( 'chat', 'status' ) ) ) {
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'wheels' );
		} else {
			$format_prefix = '%2$s';
		}

		$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', esc_url( get_permalink() ), esc_attr( sprintf( __( 'Permalink to %s', 'wheels' ), the_title_attribute( 'echo=0' ) ) ), esc_attr( get_the_date( 'c' ) ), esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		if ( $echo ) {
			echo $date;
		}

		return $date;
	}

}

