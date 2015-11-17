<?php
/**
 * Cause Post Type
 *
 * @package   CausePostType
 * @author    Devin Price
 * @license   GPL-2.0+
 * @link      http://wptheming.com/cause-post-type/
 * @copyright 2011-2013 Devin Price
 *
 * @wordpress-plugin
 * Plugin Name: Cause Post Type
 * Plugin URI:  http://wptheming.com/cause-post-type/
 * Description: Enables a cause post type and taxonomies.
 * Version:     0.6.1
 * Author:      Devin Price
 * Author URI:  http://www.wptheming.com/
 * Text Domain: causeposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

if ( ! class_exists( 'Cause_Post_Type' ) ) :

class Cause_Post_Type {

	public function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_textdomain' ) );

		// Run when the plugin is activated
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );

		// Add the cause post type and taxonomies
		add_action( 'init', array( $this, 'cause_init' ) );

		// Thumbnail support for cause posts
		add_theme_support( 'post-thumbnails', array( 'cause' ) );

		// Add thumbnails to column view
		add_filter( 'manage_edit-cause_columns', array( $this, 'add_thumbnail_column'), 10, 1 );
		add_action( 'manage_posts_custom_column', array( $this, 'display_thumbnail' ), 10, 1 );

		// Allow filtering of posts by taxonomy in the admin view
		add_action( 'restrict_manage_posts', array( $this, 'add_taxonomy_filters' ) );

		// Show cause post counts in the dashboard
		add_action( 'right_now_content_table_end', array( $this, 'add_cause_counts' ) );

		// Give the cause menu item a unique icon
//		add_action( 'admin_head', array( $this, 'cause_icon' ) );

		// Add taxonomy terms as body classes
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_textdomain() {

		$domain = 'causeposttype';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Flushes rewrite rules on plugin activation to ensure cause posts don't 404.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/flush_rewrite_rules
	 *
	 * @uses Cause_Post_Type::cause_init()
	 */
	public function plugin_activation() {
		$this->load_textdomain();
		$this->cause_init();
		flush_rewrite_rules();
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Cause_Post_Type::register_post_type()
	 * @uses Cause_Post_Type::register_taxonomy_tag()
	 * @uses Cause_Post_Type::register_taxonomy_category()
	 */
	public function cause_init() {
		$this->register_post_type();
		$this->register_taxonomy_category();
		$this->register_taxonomy_tag();
	}

	/**
	 * Get an array of all taxonomies this plugin handles.
	 *
	 * @return array Taxonomy slugs.
	 */
	protected function get_taxonomies() {
		return array( 'cause_category', 'cause_tag' );
	}

	/**
	 * Enable the Cause custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Causes', 'causeposttype' ),
			'singular_name'      => __( 'Cause', 'causeposttype' ),
			'add_new'            => __( 'Add New Item', 'causeposttype' ),
			'add_new_item'       => __( 'Add New Cause', 'causeposttype' ),
			'edit_item'          => __( 'Edit Cause', 'causeposttype' ),
			'new_item'           => __( 'Add New Cause', 'causeposttype' ),
			'view_item'          => __( 'View Item', 'causeposttype' ),
			'search_items'       => __( 'Search Cause', 'causeposttype' ),
			'not_found'          => __( 'No cause items found', 'causeposttype' ),
			'not_found_in_trash' => __( 'No cause items found in trash', 'causeposttype' ),
		);

		$args = array(
			'labels'          => $labels,
			'public'          => true,
			'supports'        => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'comments',
				'author',
				'custom-fields',
				'revisions',
			),
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'cause' ), // Permalinks format
			'menu_position'   => 5,
			'has_archive'     => true,
                        'menu_icon'		=> 'dashicons-universal-access',
		);

		$args = apply_filters( 'causeposttype_args', $args );

		register_post_type( 'cause', $args );
	}

	/**
	 * Register a taxonomy for Cause Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_tag() {
		$labels = array(
			'name'                       => __( 'Cause Tags', 'causeposttype' ),
			'singular_name'              => __( 'Cause Tag', 'causeposttype' ),
			'menu_name'                  => __( 'Cause Tags', 'causeposttype' ),
			'edit_item'                  => __( 'Edit Cause Tag', 'causeposttype' ),
			'update_item'                => __( 'Update Cause Tag', 'causeposttype' ),
			'add_new_item'               => __( 'Add New Cause Tag', 'causeposttype' ),
			'new_item_name'              => __( 'New Cause Tag Name', 'causeposttype' ),
			'parent_item'                => __( 'Parent Cause Tag', 'causeposttype' ),
			'parent_item_colon'          => __( 'Parent Cause Tag:', 'causeposttype' ),
			'all_items'                  => __( 'All Cause Tags', 'causeposttype' ),
			'search_items'               => __( 'Search Cause Tags', 'causeposttype' ),
			'popular_items'              => __( 'Popular Cause Tags', 'causeposttype' ),
			'separate_items_with_commas' => __( 'Separate cause tags with commas', 'causeposttype' ),
			'add_or_remove_items'        => __( 'Add or remove cause tags', 'causeposttype' ),
			'choose_from_most_used'      => __( 'Choose from the most used cause tags', 'causeposttype' ),
			'not_found'                  => __( 'No cause tags found.', 'causeposttype' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'cause-tag' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'causeposttype_tag_args', $args );

		register_taxonomy( 'cause_tag', array( 'cause' ), $args );

	}

	/**
	 * Register a taxonomy for Cause Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Cause Categories', 'causeposttype' ),
			'singular_name'              => __( 'Cause Category', 'causeposttype' ),
			'menu_name'                  => __( 'Cause Categories', 'causeposttype' ),
			'edit_item'                  => __( 'Edit Cause Category', 'causeposttype' ),
			'update_item'                => __( 'Update Cause Category', 'causeposttype' ),
			'add_new_item'               => __( 'Add New Cause Category', 'causeposttype' ),
			'new_item_name'              => __( 'New Cause Category Name', 'causeposttype' ),
			'parent_item'                => __( 'Parent Cause Category', 'causeposttype' ),
			'parent_item_colon'          => __( 'Parent Cause Category:', 'causeposttype' ),
			'all_items'                  => __( 'All Cause Categories', 'causeposttype' ),
			'search_items'               => __( 'Search Cause Categories', 'causeposttype' ),
			'popular_items'              => __( 'Popular Cause Categories', 'causeposttype' ),
			'separate_items_with_commas' => __( 'Separate cause categories with commas', 'causeposttype' ),
			'add_or_remove_items'        => __( 'Add or remove cause categories', 'causeposttype' ),
			'choose_from_most_used'      => __( 'Choose from the most used cause categories', 'causeposttype' ),
			'not_found'                  => __( 'No cause categories found.', 'causeposttype' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'cause-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'causeposttype_category_args', $args );

		register_taxonomy( 'cause_category', array( 'cause' ), $args );
	}

	/**
	 * Add taxonomy terms as body classes.
	 *
	 * If the taxonomy doesn't exist (has been unregistered), then get_the_terms() returns WP_Error, which is checked
	 * for before adding classes.
	 *
	 * @param array $classes Existing body classes.
	 *
	 * @return array Amended body classes.
	 */
	public function add_body_classes( $classes ) {

		// Only single posts should have the taxonomy body classes
		if ( is_single() ) {
			$taxonomies = $this->get_taxonomies();
			foreach( $taxonomies as $taxonomy ) {
				$terms = get_the_terms( get_the_ID(), $taxonomy );
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach( $terms as $term ) {
						$classes[] = sanitize_html_class( str_replace( '_', '-', $taxonomy ) . '-' . $term->slug );
					}
				}
			}
		}

		return $classes;
	}

	/**
	 * Add columns to Cause list screen.
	 *
	 * @link http://wptheming.com/2010/07/column-edit-pages/
	 *
	 * @param array $columns Existing columns.
	 *
	 * @return array Amended columns.
	 */
	public function add_thumbnail_column( $columns ) {
		$column_thumbnail = array( 'thumbnail' => __( 'Thumbnail', 'causeposttype' ) );
		return array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, null, true );
	}

	/**
	 * Custom column callback
	 *
	 * @global stdClass $post Post object.
	 *
	 * @param string $column Column ID.
	 */
	public function display_thumbnail( $column ) {
		global $post;
		switch ( $column ) {
			case 'thumbnail':
				echo get_the_post_thumbnail( $post->ID, array(35, 35) );
				break;
		}
	}

	/**
	 * Add taxonomy filters to the cause admin page.
	 *
	 * Code artfully lifted from http://pippinsplugins.com/
	 *
	 * @global string $typenow
	 */
	public function add_taxonomy_filters() {
		global $typenow;

		// An array of all the taxonomies you want to display. Use the taxonomy name or slug
		$taxonomies = $this->get_taxonomies();

		// Must set this to the post type you want the filter(s) displayed on
		if ( 'cause' != $typenow ) {
			return;
		}

		foreach ( $taxonomies as $tax_slug ) {
			$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj          = get_taxonomy( $tax_slug );
			$tax_name         = $tax_obj->labels->name;
			$terms            = get_terms( $tax_slug );
			if ( 0 == count( $terms ) ) {
				return;
			}
			echo '<select name="' . esc_attr( $tax_slug ) . '" id="' . esc_attr( $tax_slug ) . '" class="postform">';
			echo '<option>' . esc_html( $tax_name ) .'</option>';
			foreach ( $terms as $term ) {
				printf(
					'<option value="%s"%s />%s</option>',
					esc_attr( $term->slug ),
					selected( $current_tax_slug, $term->slug ),
					esc_html( $term->name . '(' . $term->count . ')' )
				);
			}
			echo '</select>';
		}
	}

	/**
	 * Add Cause count to "Right Now" dashboard widget.
	 *
	 * @return null Return early if cause post type does not exist.
	 */
	public function add_cause_counts() {
		if ( ! post_type_exists( 'cause' ) ) {
			return;
		}

		$num_posts = wp_count_posts( 'cause' );

		// Published items
		$href = 'edit.php?post_type=cause';
		$num  = number_format_i18n( $num_posts->publish );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Cause', 'Causes', intval( $num_posts->publish ) );
		$text = $this->link_if_can_edit_posts( $text, $href );
		$this->display_dashboard_count( $num, $text );

		if ( 0 == $num_posts->pending ) {
			return;
		}

		// Pending items
		$href = 'edit.php?post_status=pending&amp;post_type=cause';
		$num  = number_format_i18n( $num_posts->pending );
		$num  = $this->link_if_can_edit_posts( $num, $href );
		$text = _n( 'Cause Pending', 'Causes Pending', intval( $num_posts->pending ) );
		$text = $this->link_if_can_edit_posts( $text, $href );
		$this->display_dashboard_count( $num, $text );
	}

	/**
	 * Wrap a dashboard number or text value in a link, if the current user can edit posts.
	 *
	 * @param  string $value Value to potentially wrap in a link.
	 * @param  string $href  Link target.
	 *
	 * @return string        Value wrapped in a link if current user can edit posts, or original value otherwise.
	 */
	protected function link_if_can_edit_posts( $value, $href ) {
		if ( current_user_can( 'edit_posts' ) ) {
			return '<a href="' . esc_url( $href ) . '">' . $value . '</a>';
		}
		return $value;
	}

	/**
	 * Display a number and text with table row and cell markup for the dashboard counters.
	 *
	 * @param  string $number Number to display. May be wrapped in a link.
	 * @param  string $label  Text to display. May be wrapped in a link.
	 */
	protected function display_dashboard_count( $number, $label ) {
		?>
		<tr>
			<td class="first b b-cause"><?php echo $number; ?></td>
			<td class="t cause"><?php echo $label; ?></td>
		</tr>
		<?php
	}

	/**
	 * Display the custom post type icon in the dashboard.
	 */
	public function cause_icon() {
		$plugin_dir_url = plugin_dir_url( __FILE__ );
		?>
		<style>
			#menu-posts-cause .wp-menu-image {
				background: url(<?php echo $plugin_dir_url; ?>images/cause-icon.png) no-repeat 6px 6px !important;
			}
			#menu-posts-cause:hover .wp-menu-image, #menu-posts-cause.wp-has-current-submenu .wp-menu-image {
				background-position: 6px -16px !important;
			}
			#icon-edit.icon32-posts-cause {
				background: url(<?php echo $plugin_dir_url; ?>images/cause-32x32.png) no-repeat;
			}
		</style>
		<?php
	}

}

new Cause_Post_Type;

endif;
