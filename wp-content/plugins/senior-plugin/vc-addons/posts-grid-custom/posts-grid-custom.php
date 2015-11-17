<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Check if Visual Composer is installed
if ( ! defined( 'WPB_VC_VERSION' ) ) {
	// Display notice that Visual Compser is required
	add_action( 'admin_notices', 'scp_posts_grid_custom_vc_not_installed_notice' );

	return;
}

/*
Show notice if your plugin is activated but Visual Composer is not
*/
function scp_posts_grid_custom_vc_not_installed_notice() {
	$plugin_data = get_plugin_data( __FILE__ );
	echo '
        <div class="updated">
          <p>' . sprintf( __( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend' ), $plugin_data['Name'] ) . '</p>
        </div>';
}

$parent_file_path = SCP_PLUGIN_PATH . '../js_composer/include/classes/shortcodes/vc-posts-grid.php';

if ( file_exists( $parent_file_path ) && ! class_exists( 'SCP_Posts_Grid_Custom' ) ) {


	require_once SCP_PLUGIN_PATH . '../js_composer/include/classes/shortcodes/vc-posts-grid.php';

	class SCP_Posts_Grid_Custom extends WPBakeryShortCode_VC_Posts_Grid {

		protected $textdomain = SCP_TEXT_DOMAIN;
		protected $namespace = 'scp_posts_grid';


		function __construct() {
			// We safely integrate with VC with this hook
			add_action( 'init', array( $this, 'integrateWithVC' ) );

			// Use this when creating a shortcode addon
			add_shortcode( $this->namespace, array( $this, 'render' ) );

			// Register CSS and JS
			add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
		}

		public function integrateWithVC() {


			$target_arr = array(
				__( 'Same window', $this->textdomain ) => '_self',
				__( 'New window', $this->textdomain )  => "_blank"
			);

			$vc_layout_sub_controls = array(
				array( 'link_post', __( 'Link to post', $this->textdomain ) ),
				array( 'no_link', __( 'No link', $this->textdomain ) ),
				array( 'link_image', __( 'Link to bigger image', $this->textdomain ) )
			);
			vc_map( array(
				'name'        => __( 'Custom Posts Grid', $this->textdomain ),
				'base'        => $this->namespace,
				'class'       => '',
				'controls'    => 'full',
				'icon'        => plugins_url( 'assets/aislin-vc-icon.png', __FILE__ ),
				'description' => __( 'Posts in grid view', $this->textdomain ),
				'params'      => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Widget title', $this->textdomain ),
						'param_name'  => 'title',
						'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', $this->textdomain )
					),
					array(
						'type'        => 'loop',
						'heading'     => __( 'Grids content', $this->textdomain ),
						'param_name'  => 'loop',
						'settings'    => array(
							'size'     => array( 'hidden' => false, 'value' => 10 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => __( 'Create WordPress loop, to populate content from your site.', $this->textdomain )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Columns count', $this->textdomain ),
						'param_name'  => 'grid_columns_count',
						'value'       => array( 6, 4, 3, 2, 1 ),
						'std'         => 3,
						'admin_label' => true,
						'description' => __( 'Select columns count.', $this->textdomain )
					),
					array(
						'type'        => 'sorted_list',
						'heading'     => __( 'Teaser layout', $this->textdomain ),
						'param_name'  => 'grid_layout',
						'description' => __( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', $this->textdomain ),
						'value'       => 'title,image,text',
						'options'     => array(
							array( 'image', __( 'Thumbnail', $this->textdomain ), $vc_layout_sub_controls ),
							array( 'title', __( 'Title', $this->textdomain ), $vc_layout_sub_controls ),
							array( 'meta_data', __( 'Meta data', $this->textdomain ) ),
							array(
								'text',
								__( 'Text', $this->textdomain ),
								array(
									array( 'excerpt', __( 'Teaser/Excerpt', $this->textdomain ) ),
									array( 'text', __( 'Full content', $this->textdomain ) )
								)
							),
							array( 'link', __( 'Read more link', $this->textdomain ) )
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Date Format', $this->textdomain ),
						'param_name'  => 'date_format',
						'value'       => array(
							date('M j, Y') => 'M j, Y',
							date('j M, Y')  => 'j M, Y',
							date('F j, Y')  => 'F j, Y',
							date('j F, Y')  => 'j F, Y',
						),
						'std'         => 3,
						'admin_label' => true,
						'description' => __( 'For meta data.', $this->textdomain )
					),
					array(
						'type'       => 'dropdown',
						'heading'    => __( 'Link target', $this->textdomain ),
						'param_name' => 'grid_link_target',
						'value'      => $target_arr,
						// 'dependency' => array(
						//     'element' => 'grid_link',
						//     'value' => array( 'link_post', 'link_image_post' )
						// )
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Show filter', $this->textdomain ),
						'param_name'  => 'filter',
						'value'       => array( __( 'Yes, please', $this->textdomain ) => 'yes' ),
						'description' => __( 'Select to add animated category filter to your posts grid.', $this->textdomain )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Layout mode', $this->textdomain ),
						'param_name'  => 'grid_layout_mode',
						'value'       => array(
							__( 'Fit rows', $this->textdomain ) => 'fitRows',
							__( 'Masonry', $this->textdomain )  => 'masonry'
						),
						'description' => __( 'Teaser layout template.', $this->textdomain )
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Thumbnail size', $this->textdomain ),
						'param_name'  => 'grid_thumb_size',
						'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', $this->textdomain )
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Extra class name', $this->textdomain ),
						'param_name'  => 'el_class',
						'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', $this->textdomain )
					)
				)
			) );
		}

		/*
		Shortcode logic how it should be rendered
		*/
		public function render( $atts, $content = null ) {

			global $vc_teaser_box;
			$grid_link = $grid_layout_mode = $title = $filter = $shows_date_class = '';
			$posts     = array();
			extract( shortcode_atts( array(
				'title'              => '',
				'grid_columns_count' => 4,
				'grid_teasers_count' => 8,
				'grid_layout'        => 'title,thumbnail,text',
				// title_thumbnail_text, thumbnail_title_text, thumbnail_text, thumbnail_title, thumbnail, title_text
				'grid_link_target'   => '_self',
				'filter'             => '',
				//grid,
				'grid_thumb_size'    => 'thumbnail',
				'grid_layout_mode'   => 'fitRows',
				'el_class'           => '',
				'teaser_width'       => '12',
				'orderby'            => null,
				'order'              => 'DESC',
				'loop'               => '',
				'date_format'        => 'M j, Y',
			), $atts ) );
			$this->resetTaxonomies();
			if ( empty( $loop ) ) {
				return;
			}
			$this->getLoop( $loop );
			$my_query      = $this->query;
			$args          = $this->loop_args;
			$teaser_blocks = vc_sorted_list_parse_value( $grid_layout );
			while ( $my_query->have_posts() ) {
				$my_query->the_post(); // Get post from query
				$post       = new stdClass(); // Creating post object.
				$post->id   = get_the_ID();
				$post->link = get_permalink( $post->id );
				if ( $vc_teaser_box->getTeaserData( 'enable', $post->id ) === '1' ) {
					$post->custom_user_teaser = true;
					$data                     = $vc_teaser_box->getTeaserData( 'data', $post->id );
					if ( ! empty( $data ) ) {
						$data = json_decode( $data );
					}
					$post->bgcolor              = $vc_teaser_box->getTeaserData( 'bgcolor', $post->id );
					$post->custom_teaser_blocks = array();
					$post->title_attribute      = the_title_attribute( 'echo=0' );
					if ( ! empty( $data ) ) {
						foreach ( $data as $block ) {
							$settings = array();
							if ( $block->name === 'title' ) {
								$post->title = the_title( "", "", false );
							} elseif ( $block->name === 'image' ) {
								if ( $block->image === 'featured' ) {
									$post->thumbnail_data = $this->getPostThumbnail( $post->id, $grid_thumb_size );
								} elseif ( ! empty( $block->image ) ) {
									$post->thumbnail_data = wpb_getImageBySize( array(
										'attach_id'  => (int) $block->image,
										'thumb_size' => $grid_thumb_size
									) );
								} else {
									$post->thumbnail_data = false;
								}
								$post->thumbnail  = $post->thumbnail_data && isset( $post->thumbnail_data['thumbnail'] ) ? $post->thumbnail_data['thumbnail'] : '';
								$post->image_link = empty( $video ) && $post->thumbnail && isset( $post->thumbnail_data['p_img_large'][0] ) ? $post->thumbnail_data['p_img_large'][0] : $video;
							} elseif ( $block->name === 'text' ) {
								if ( $block->mode === 'custom' ) {
									$settings[]    = 'text';
									$post->content = $block->text;
								} elseif ( $block->mode === 'excerpt' ) {
									$settings[]    = $block->mode;
									$post->excerpt = $this->getPostExcerpt();
								} else {
									$settings[]    = $block->mode;
									$post->content = $this->getPostContent();
								}
							}
							if ( isset( $block->link ) ) {
								if ( $block->link === 'post' ) {
									$settings[] = 'link_post';
								} elseif ( $block->link === 'big_image' ) {
									$settings[] = 'link_image';
								} else {
									$settings[] = 'no_link';
								}
								$settings[] = '';
							}
							$post->custom_teaser_blocks[] = array( $block->name, $settings );
						}
					}
				} else {
					$post->custom_user_teaser = false;
					$post->title              = the_title( "", "", false );
					$post->title_attribute    = the_title_attribute( 'echo=0' );
					$post->post_type          = get_post_type();
					$post->content            = $this->getPostContent();
					$post->excerpt            = $this->getPostExcerpt();
					$post->thumbnail_data     = $this->getPostThumbnail( $post->id, $grid_thumb_size );
					$post->thumbnail          = $post->thumbnail_data && isset( $post->thumbnail_data['thumbnail'] ) ? $post->thumbnail_data['thumbnail'] : '';
					$video                    = get_post_meta( $post->id, "_p_video", true );
					$post->imae_link          = empty( $video ) && $post->thumbnail && isset( $post->thumbnail_data['p_img_large'][0] ) ? $post->thumbnail_data['p_img_large'][0] : $video;
					$post->comment_count      = get_comments_number($post->id);

					$posttags = get_the_tags($post->id);

					$tags = '';

					if ($posttags) {
						foreach ( $posttags as $tag ) {
							$tags .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
						}

						$tags .= ' |';
					}
					$post->tags = $tags;
				}

				$post->categories_css = $this->getCategoriesCss( $post->id );

				$posts[] = $post;
			}
			wp_reset_query();

			/**
			 * Css classes for grid and teasers.
			 * {{
			 */
			$post_types_teasers = '';
			if ( ! empty( $args['post_type'] ) && is_array( $args['post_type'] ) ) {
				foreach ( $args['post_type'] as $post_type ) {
					$post_types_teasers .= 'wpb_teaser_grid_' . $post_type . ' ';
				}
			}
			$el_class      = $this->getExtraClass( $el_class );
			$li_span_class = $this->spanClass( $grid_columns_count );

			$css_class = 'wpb_row wpb_teaser_grid wpb_content_element scp_teaser_grid_custom ' .
			             $this->getMainCssClass( $filter ) . // Css class as selector for isotope plugin
			             ' columns_count_' . $grid_columns_count . // Custom margin/padding for different count of columns in grid
			             ' columns_count_' . $grid_columns_count . // Combination of layout and column count
			             // ' post_grid_'.$li_span_class .
			             ' ' . $post_types_teasers . // Css classes by selected post types
			             $el_class; // Custom css class from shortcode attributes
			// }}

			$this->setLinktarget( $grid_link_target );
			ob_start();
			?>
			<div
				class="<?php echo apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $css_class, $this->settings['base'], $atts ) ?>">
				<div class="wpb_wrapper">
					<?php echo wpb_widget_title( array(
						'title'      => $title,
						'extraclass' => 'wpb_teaser_grid_heading'
					) ) ?>
					<div class="teaser_grid_container">
						<?php if ( $filter === 'yes' && ! empty( $this->filter_categories ) ):
							$categories_array = $this->getFilterCategories();
							?>
							<ul class="categories_filter vc_col-sm-12 vc_clearfix">
								<li class="active"><a href="#"
								                      data-filter="*"><?php _e( 'All', $this->textdomain ) ?></a>
								</li>
								<?php foreach ( $this->getFilterCategories() as $cat ): ?>
									<li><a href="#"
									       data-filter=".grid-cat-<?php echo $cat->term_id ?>"><?php echo esc_attr( $cat->name ) ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
							<div class="vc_clearfix"></div>
						<?php endif; ?>
						<ul class="wpb_thumbnails wpb_thumbnails-fluid vc_clearfix"
						    data-layout-mode="<?php echo $grid_layout_mode ?>">
							<?php
							/**
							 * Enqueue js/css
							 * {{
							 */
							wp_enqueue_style( 'isotope-css' );
							wp_enqueue_script( 'isotope' );
							?>
							<?php if ( count( $posts ) > 0 ): ?>
								<?php foreach ( $posts as $post ): ?>
									<?php
									$blocks_to_build = $post->custom_user_teaser === true ? $post->custom_teaser_blocks : $teaser_blocks;
									$block_style     = isset( $post->bgcolor ) ? ' style="background-color: ' . $post->bgcolor . '"' : '';
									?>
									<li
										class="isotope-item <?php echo apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $li_span_class, 'vc_teaser_grid_li', $atts ) . $post->categories_css ?>"<?php echo $block_style ?>>

										<div class="isotope-inner<?php echo $shows_date_class; ?>">
											<?php foreach ( $blocks_to_build as $block_data ): ?>

												<?php if ( file_exists( SCP_PLUGIN_PATH . 'vc-addons/posts-grid-custom/templates/_item.php' ) ): ?>
													<?php include SCP_PLUGIN_PATH . 'vc-addons/posts-grid-custom/templates/_item.php'; ?>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									</li> <?php echo $this->endBlockComment( 'single teaser' ); ?>
								<?php endforeach; ?>
							<?php else: ?>
								<li class="<?php echo $this->spanClass( 1 ); ?>"><?php _e( "Nothing found.", "js_composer" ) ?></li>
							<?php endif; ?>
						</ul>
					</div>
				</div> <?php echo $this->endBlockComment( '.wpb_wrapper' ) ?>
				<div class="clear"></div>
			</div> <?php echo $this->endBlockComment( '.wpb_teaser_grid' ) ?>

		<?php
		$content = ob_get_clean();

		return $content;
		}

		/*
		Load plugin css and javascript files which you may need on front end of your site
		*/
		public function loadCssAndJs() {
			wp_register_style( 'scp-posts-grid-custom-style', plugins_url( 'assets/scp-posts-grid-custom.css', __FILE__ ) );
			wp_enqueue_style( 'scp-posts-grid-custom-style' );

			// If you need any javascript files on front end, here is how you can load them.
			//wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
		}


	}

	new SCP_Posts_Grid_Custom();

}