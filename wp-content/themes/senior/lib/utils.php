<?php

/**
 * Utility functions
 */
function wheels_add_filters( $tags, $function ) {
	foreach ( $tags as $tag ) {
		add_filter( $tag, $function );
	}
}

function wheels_is_element_empty( $element ) {
	$element = trim( $element );

	return empty( $element ) ? true : false;
}

function wheels_get_thumbnail( $thumbnail = 'thumbnail', $echo = true ) {
	global $post_id;

	$img_url = '';
	if ( has_post_thumbnail( $post_id ) ) {
		$img_url = get_the_post_thumbnail( $post_id, $thumbnail, array(
			'class' => $thumbnail
		) );
	}
	$out = '';
	if ( '' != $img_url ) {
		$out = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $img_url . '</a>';
	}
	if ( $echo ) {
		echo $out;
	} else {
		return $out;
	}
}

function wheels_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='pagination'>";
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";
		}

		for ( $i = 1; $i <= $pages; $i ++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>";
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>&raquo;</a>";
		}
		echo "</div>\n";
	}
}

function wheels_grid_class_map() {

	return array(
		array( 'one twelfth', 'eleven twelfths' ), // 1/11
		array( 'one sixth', 'five sixths' ),     // 2/10
		array( 'one fourth', 'three fourths' ),   // 3/9
		array( 'one third', 'two thirds' ),      // 4/8
		array( 'five twelfths', 'seven twelfths' ),  // 5/7
		array( 'one half', 'one half' ),        // 6/6
		array( 'seven twelfths', 'five twelfths' ),   // 7/5
		array( 'two thirds', 'one third' ),       // 8/4
		array( 'three fourths', 'one fourth' ),      // 9/3
		array( 'five sixths', 'one sixth' ),       // 10/2
		array( 'eleven twelfths', 'one twelfth' ),     // 11/1
		array( 'one whole', 'one whole' ),       // 12/12
	);
}

function wheels_get_option( $option_name, $default = false ) {
	$options = isset($GLOBALS[ WHEELS_THEME_OPTION_NAME ]) ? $GLOBALS[ WHEELS_THEME_OPTION_NAME ] : false;

	if ( $options && is_string( $option_name ) ) {
		return isset( $options[ $option_name ] ) ? $options[ $option_name ] : $default;
	}

	return $default;
}

function wheels_get_page_template() {

	$post_id = null;
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( $post_id ) {
		return get_post_meta( $post_id, '_wp_page_template', true );
	}

}

function wheels_is_page_template( $template_file ) {
	return wheels_get_page_template() == $template_file;
}

function wheels_custom_css() {
	$custom_css = wheels_get_option( 'custom-css' );
	if ( ! wheels_is_element_empty( $custom_css ) ) {
		echo '<style>' . $custom_css . '</style>' . "\n";
	}
}

function wheels_favicon() {
	$favicon     = wheels_get_option( 'favicon', array() );
	$favicon_url = isset( $favicon['url'] ) && $favicon['url'] ? $favicon['url'] : '';
	if ( $favicon_url ) {
		echo '<link rel="shortcut icon" href="' . $favicon_url . '"/>' . "\n";
	}
}

function wheels_google_analytics_code() {
	$google_analytics_code = wheels_get_option( 'google-analytics-code', false );
	if ( $google_analytics_code ) {
		echo $google_analytics_code . "\n";
	}
}

function wheels_custom_js_code() {
	$customJsCode = wheels_get_option( 'custom-js-code', false );
	if ( $customJsCode ) {
		echo '<script id="wh-custom-js-code">' . "\n" . $customJsCode . "\n</script>\n";
	}
}

function wheels_responsive_menu_scripts() {

	$respmenu_use                      = (int) wheels_get_option( 'respmenu-use', 1 );
	$respmenu_show_start               = (int) wheels_get_option( 'respmenu-show-start', 767 );
	$respmenu_logo                     = wheels_get_option( 'respmenu-logo', array() );
	$respmenu_logo_url                 = isset( $respmenu_logo['url'] ) && $respmenu_logo['url'] ? $respmenu_logo['url'] : '';
	$respmenu_display_switch_logo      = wheels_get_option( 'respmenu-display-switch-img', array() );
	$top_bar_additional_show_on_mobile = wheels_get_option( 'top-bar-additional-show-on-mobile', false );
	$respmenu_display_switch_logo_url  = isset( $respmenu_display_switch_logo['url'] ) && $respmenu_display_switch_logo['url'] ? $respmenu_display_switch_logo['url'] : '';


	if ( $respmenu_use && $respmenu_show_start ) {
	?>
	<style>
		@media screen and (max-width: <?php echo $respmenu_show_start; ?>px) {
			#cbp-menu-main { width: 100%; }
			.respmenu-wrap { display:block }

			.wh-main-menu-bar-wrapper, .wh-top-bar { display: none; }
		<?php if ( ! $top_bar_additional_show_on_mobile ): ?>
			.wh-header { display: none; }
		<?php endif; ?>
		}
	</style>
	<script>
		var wheels  = wheels || {};
		wheels.data = wheels.data || {};

		wheels.data.respmenu = {
			id: 'cbp-menu-main',
			options: {
				id: 'cbp-menu-main-respmenu',
				submenuToggle: {
					className: 'cbp-respmenu-more',
					html: '<i class="fa fa-chevron-down"></i>'
				},
				logo: {
					src: '<?php echo $respmenu_logo_url; ?>',
					link: '<?php echo home_url(); ?>'
				},
				toggleSwitch: {
					src: '<?php echo $respmenu_display_switch_logo_url; ?>'
				},
				prependTo: 'body'
			}
		};
	</script>
	<?php
	}


}

function wheels_filter_array( $filter_name, $default = array() ) {

	$filtered = apply_filters( $filter_name, $default);

	if ( ! is_array( $filtered ) || ! count( $filtered ) ) {
		$filtered = $default;
	}

	return array_unique( $filtered );
}

function wheels_array_val_concat( $array = null, $postfix = '', $default ) {

	if ( is_array( $array ) ) {

		$res = array();

		foreach ( $array as $val) {
			$res[] = $val . $postfix;
		}

		return $res;
	}

	return $default;
}
