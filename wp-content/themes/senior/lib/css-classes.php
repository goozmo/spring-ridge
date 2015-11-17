<?php
/**
 * @param string $namespace
 * @param array $options
 *
 * @return mixed|void
 */
function wheels_class( $namespace, $options = array() ) {

	$class           = '';
	$padding_class   = 'wh-padding';
	$row_class       = 'cbp-row';
	$container_class = 'cbp-container';
	
	/**
	 * Main Wrapper
	 */
	if ( $namespace == 'main-wrapper' ) {
		$use_embellishments = wheels_get_option( 'content-embellishments-enable', false );

		$embellishment_class = '';
		if ( $use_embellishments ) {

			$embellishment_top_img     = wheels_get_option( 'content-embellishment-background-top', array() );
			$embellishment_top_img_url = isset( $embellishment_top_img['background-image'] ) && $embellishment_top_img['background-image'] ? $embellishment_top_img['background-image'] : '';

			$embellishment_bottom_img     = wheels_get_option( 'content-embellishment-background-bottom', array() );
			$embellishment_bottom_img_url = isset( $embellishment_bottom_img['background-image'] ) && $embellishment_bottom_img['background-image'] ? $embellishment_bottom_img['background-image'] : '';

			$embellishment_class = ' wh-has-embellishment';

			if ( $embellishment_top_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-content-top';
			}
			if ( $embellishment_bottom_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-content-bottom';
			}
		}

		$class = $row_class . ' wh-content' . $embellishment_class;

		/**
		 * Row
		 */
	} elseif ( $namespace == 'row' ) {
		$class = $row_class;

		/**
		 * Container
		 */
	} elseif ( $namespace == 'container' ) {
		$class = $container_class;

		/**
		 * Container
		 */
	} elseif ( $namespace == 'container_home_content' ) {
		$class = $container_class . ' ' . $padding_class;

		/**
		 * Strecher
		 */
	} elseif ( $namespace == 'strecher' ) {
		$class = 'cbp-strecher';

		/**
		 * Content
		 */
	} elseif ( $namespace == 'content' ) {
		$content_width       = wheels_get_option( 'content-width', 9 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $content_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Content - Fullwidth
		 */
	} elseif ( $namespace == 'content-fullwidth' ) {
		$class = 'entry-content one whole ' . $padding_class;

		/**
		 * Sidebar
		 */
	} elseif ( $namespace == 'sidebar' ) {
		$sidebar_width       = wheels_get_option( 'sidebar-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = 'wh-sidebar ' . $mapped_grid_classes[ $sidebar_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Logo Wrapper
		 */
	} elseif ( $namespace == 'logo-wrapper' ) {
		$logo_width          = wheels_get_option( 'logo-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $logo_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Logo
		 */
	} elseif ( $namespace == 'logo' ) {
		$logo_alignment = wheels_get_option( 'logo-alignment', 'left' );
		$class          = 'wh-logo';
		switch ( $logo_alignment ) {
			case 'left':
				$class .= ' align-left';
				break;
			case 'right':
				$class .= ' align-right';
				break;
			case 'center':
				$class .= ' align-center';
				break;
		}

		/**
		 * Main Bar Wrapper
		 */
	} elseif ( $namespace == 'main-menu-bar-wrapper' ) {
		$enable_sticky = wheels_get_option( 'main-menu-use-menu-is-sticky', 1 );

		$class = 'wh-main-menu-bar-wrapper';

		if ($enable_sticky) {
			$class .= ' wh-sticky-header-enabled';
		}

		/**
		 * Main Menu Wrapper
		 */
	} elseif ( $namespace == 'main-menu-wrapper' ) {
		$logo_width          = wheels_get_option( 'logo-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $logo_width - 1 ][1] . ' ' . $padding_class;

		/**
		 * Main Menu Wrapper
		 */
	} elseif ( $namespace == 'mega-main-menu-wrapper' ) {
		$class = 'mega-main-menu-wrapper';

		/**
		 * Main Menu
		 */
	} elseif ( $namespace == 'main-menu' ) {
		$menu_alignment = wheels_get_option( 'main-menu-alignment', 'left' );
		$class          = 'sf-menu wh-menu-main';
		switch ( $menu_alignment ) {
			case 'left':
				$class .= ' pull-left';
				break;
			case 'right':
				$class .= ' pull-right';
				break;
		}

		/**
		 * Main Menu Container
		 */
	} elseif ( $namespace == 'main-menu-container' ) {
		$menu_alignment = wheels_get_option( 'main-menu-alignment' );
		if ( $menu_alignment && $menu_alignment == 'center' ) {
			$class = 'wh-ul-center';
		}

		/**
		 * Bottom Widgets
		 */
	} elseif ( $namespace == 'bottom-widgets' ) {
		$class = $row_class . ' wh-footer';

		/**
		 * Footer
		 */
	} elseif ( $namespace == 'footer' ) {
		$class = $row_class . ' wh-footer-bottom';

		/**
		 * Footer Widgets
		 */
	} elseif ( $namespace == 'widget-footer' ) {
		$widget_width        = wheels_get_option( 'footer-widget-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $widget_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Footer Menu Wrap
		 */
	} elseif ( $namespace == 'footer-menu-wrap' ) {
		$widget_width        = wheels_get_option( 'footer-elements-grid', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $widget_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Footer Menu
		 */
	} elseif ( $namespace == 'footer-menu' ) {
		$menu_alignment = wheels_get_option( 'footer-menu-alignment', 'left' );
		$class          = 'sf-menu wh-menu-footer';
		switch ( $menu_alignment ) {
			case 'left':
				$class .= ' pull-left';
				break;
			case 'right':
				$class .= ' pull-right';
				break;
		}

		/**
		 * Footer Menu Container
		 */
	} elseif ( $namespace == 'footer-menu-container' ) {
		$menu_alignment = wheels_get_option( 'footer-menu-alignment' );
		$class          = 'wh-footer-menu-wrap';
		if ( $menu_alignment && $menu_alignment == 'center' ) {
			$class = 'wh-ul-center';
		}

		/**
		 * Footer Text
		 */
	} elseif ( $namespace == 'footer-text' ) {
		$widget_width        = wheels_get_option( 'footer-elements-grid', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $widget_width - 1 ][1] . ' ' . $padding_class;
		$menu_alignment      = wheels_get_option( 'footer-text-alignment', 'left' );
		$alignment_class     = '';

		switch ( $menu_alignment ) {
			case 'left':
				$alignment_class = ' align-left';
				break;
			case 'right':
				$alignment_class = ' align-right';
				break;
			case 'center':
				$alignment_class = ' align-center';
				break;
		}
		$class .= $alignment_class;

		/**
		 * Header
		 */
	} elseif ( $namespace == 'header' ) {
		$use_sticky_menu     = wheels_get_option( 'use-sticky-menu', true );
		$use_embellishments  = wheels_get_option( 'header-embellishments-enable', false );
		$embellishment_class = '';

		if ( $use_embellishments ) {

			$embellishment_top_img     = wheels_get_option( 'header-embellishment-background-top', array() );
			$embellishment_top_img_url = isset( $embellishment_top_img['background-image'] ) && $embellishment_top_img['background-image'] ? $embellishment_top_img['background-image'] : '';

			$embellishment_bottom_img     = wheels_get_option( 'header-embellishment-background-bottom', array() );
			$embellishment_bottom_img_url = isset( $embellishment_bottom_img['background-image'] ) && $embellishment_bottom_img['background-image'] ? $embellishment_bottom_img['background-image'] : '';

			$embellishment_class = ' wh-has-embellishment';

			if ( $embellishment_top_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-header-top';
			}
			if ( $embellishment_bottom_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-header-bottom';
			}
		}
		$class = $row_class . ' wh-header wh-header-inner ' . $embellishment_class;

		/**
		 * Pagination
		 */
	} elseif ( $namespace == 'pagination' ) {
		$class = 'double-pad-top';

		/**
		 * Post
		 */
	} elseif ( $namespace == 'post-item' ) {
		$class = 'one whole wh-post-item';

		/**
		 * Post one half
		 */
	} elseif ( $namespace == 'post-item-one-half' ) {
		$class = 'one whole wh-post-item one half';

		/**
		 * Page Title Row
		 */
	} elseif ( $namespace == 'page-title-row' ) {

		$use_embellishments  = wheels_get_option( 'page-title-embellishments-enable', false );
		$embellishment_class = '';

		if ( $use_embellishments ) {

			$embellishment_top_img     = wheels_get_option( 'page-title-embellishment-background-top', array() );
			$embellishment_top_img_url = isset( $embellishment_top_img['background-image'] ) && $embellishment_top_img['background-image'] ? $embellishment_top_img['background-image'] : '';

			$embellishment_bottom_img     = wheels_get_option( 'page-title-embellishment-background-bottom', array() );
			$embellishment_bottom_img_url = isset( $embellishment_bottom_img['background-image'] ) && $embellishment_bottom_img['background-image'] ? $embellishment_bottom_img['background-image'] : '';

			$embellishment_class = ' wh-has-embellishment';

			if ( $embellishment_top_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-page-title-top';
			}
			if ( $embellishment_bottom_img_url ) {
				$embellishment_class .= ' wh-embellishment-type-page-title-bottom';
			}
		}
		$class = $row_class . ' wh-page-title-bar' . $embellishment_class;

		/**
		 * Page Title Grid Wrapper
		 */
	} elseif ( $namespace == 'page-title-grid-wrapper' ) {
		$class = 'one whole ' . $padding_class . ' wh-page-title-wrapper';

		/**
		 * Page Title
		 */
	} elseif ( $namespace == 'page-title' ) {

		$class = 'page-title';

		/**
		 * Breadcrumbs
		 */
	} elseif ( $namespace == 'breadcrumbs' ) {
		$menu_alignment  = wheels_get_option( 'page-title-breadcrumbs-alignment', 'left' );
		$alignment_class = '';
		switch ( $menu_alignment ) {
			case 'left':
				$alignment_class = 'align-left';
				break;
			case 'right':
				$alignment_class = 'align-right';
				break;
			case 'center':
				$alignment_class = 'align-center';
				break;
		}
		$class = 'wh-breadcrumbs ' . $alignment_class;

		/**
		 * Top Bar Menu Wrap
		 */
	} elseif ( $namespace == 'top-bar' ) {
		$class = $row_class . ' wh-top-bar';

		/**
		 * Top Bar Menu Wrap
		 */
	} elseif ( $namespace == 'top-bar-menu-wrap' ) {
		$widget_width        = wheels_get_option( 'top-bar-menu-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $widget_width - 1 ][0] . ' ' . $padding_class;

		/**
		 * Top Bar Text
		 */
	} elseif ( $namespace == 'top-bar-text' ) {
		$widget_width        = wheels_get_option( 'top-bar-text-width', 3 );
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ $widget_width - 1 ][0] . ' ' . $padding_class;

		$menu_alignment  = wheels_get_option( 'top-bar-text-alignment', 'left' );
		$alignment_class = '';

		switch ( $menu_alignment ) {
			case 'left':
				$alignment_class = ' align-left';
				break;
			case 'right':
				$alignment_class = ' align-right';
				break;
			case 'center':
				$alignment_class = ' align-center';
				break;
		}
		$class .= $alignment_class;

		/**
		 * Top Bar Additional
		 */
	} elseif ( $namespace == 'top-bar-additional' ) {
		$class = $row_class . ' wh-top-bar-additional';



		/**
		 * Top Bar Additional Text
		 */
	} elseif ( $namespace == 'top-bar-additional-text' ) {
		$mapped_grid_classes = wheels_grid_class_map();
		$class               = $mapped_grid_classes[ 12 - 1 ][0] . ' ' . $padding_class;

		$menu_alignment  = wheels_get_option( 'top-bar-additional-text-alignment', 'left' );
		$alignment_class = '';

		switch ( $menu_alignment ) {
			case 'left':
				$alignment_class = ' align-left';
				break;
			case 'right':
				$alignment_class = ' align-right';
				break;
			case 'center':
				$alignment_class = ' align-center';
				break;
		}
		$class .= $alignment_class;


		/**
		 * Top Menu
		 */
	} elseif ( $namespace == 'top-menu' ) {
		$menu_alignment = wheels_get_option( 'top-bar-menu-alignment', 'left' );
		$class          = 'sf-menu wh-menu-top';

		switch ( $menu_alignment ) {
			case 'left':
				$class .= ' pull-left';
				break;
			case 'right':
				$class .= ' pull-right';
				break;
		}

		/**
		 * Top Menu Container
		 */
	} elseif ( $namespace == 'top-menu-container' ) {
		$menu_alignment = wheels_get_option( 'top-bar-menu-alignment' );
		$class          = 'wh-top-menu-wrap';
		if ( $menu_alignment && $menu_alignment == 'center' ) {
			$class = 'wh-ul-center';
		}

		/**
		 * Top Menu Container
		 */
	} elseif ( $namespace == 'dntp-featured-courses-item-img-is-rounded' ) {
		$is_rounded = wheels_get_option( 'dntp-featured-courses-item-img-is-rounded' );

		if ( $is_rounded ) {
			$class = 'wh-rounded';
		}

	} else {
		$class = $namespace;
	}

	return apply_filters( 'wheels_filter_class', $class, $namespace );
}