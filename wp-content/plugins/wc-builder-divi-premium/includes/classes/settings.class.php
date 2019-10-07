<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class WCBD_SETTINGS{

	public function __construct(){
		add_action( 'admin_menu', array( $this, 'settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_plugin_settings' ) );
		add_action( 'init', array( $this, 'register_my_post_types' ) );

		// add divi builder for products and archive layouts
		add_filter( 'et_builder_post_types', array( $this, 'divi_builder_post_types' ) );
		add_filter( 'et_fb_post_types', array( $this, 'divi_builder_post_types' ) );
		add_filter( 'et_builder_fb_enabled_for_post', array( $this, 'maybe_filter_fb_enabled_for_post' ), 10, 2 );

		// admin columns
		add_filter( 'manage_' . WCBD_ARCHIVES_POST_TYPE . '_posts_columns', array( $this, 'add_archive_admin_columns' ) );
		add_action( 'manage_' . WCBD_ARCHIVES_POST_TYPE . '_posts_custom_column', array( $this, 'archive_admin_columns_content' ), 10, 2 );
	
		// filtering layouts
		add_action( 'restrict_manage_posts', array( $this, 'restrict_manage_posts' ) );
	}

	// add settings menu page
	public function settings_page(){
		add_menu_page( WCBD_PLUGIN_NAME, 'Wc Builder', 'manage_options', 'wc-builder-divi', array( $this, 'settings_admin_page' ), 'dashicons-cart', 999 );
		add_submenu_page( 'wc-builder-divi', WCBD_PLUGIN_NAME, 'Settings', 'manage_options', 'wc-builder-divi' );
		add_submenu_page( 'wc-builder-divi', 'Archive Builder', 'Archive Builder', 'manage_options', 'edit.php?post_type=' . WCBD_ARCHIVES_POST_TYPE );
	}

	// settings page callback
	public function settings_admin_page(){
		// load admin panel 
		require_once WCBD_PLUGIN_PATH . 'includes/admin/index.php';
	}

	// register plugin setting
	public function register_plugin_settings(){
		// plugin settings
		register_setting( 'divi_woo_settings', 'divi_woo_settings', array( 'sanitize_callback' => array( $this, 'validate_plugin_settings' ) ) );
	}

	// validate plugin settings
	public function validate_plugin_settings( $s ){

		// products under archive layout
		$products_under_archive_layout = array(); // [tax_id] => [layout_id]

		if( isset( $s['products_under_archive_layout'] ) && is_array( $s['products_under_archive_layout'] ) && count( $s['products_under_archive_layout'] ) ){
			foreach( $s['products_under_archive_layout'] as $tax_id => $layout_id ){

				$tax_id 	= esc_html( $tax_id );
				$layout_id 	= esc_html( $layout_id );
				$products_under_archive_layout[$tax_id] = $layout_id;
			}
		}

		$settings = array(
			'default_product_layout' 			=> isset( $s['default_product_layout'] ) && is_numeric( $s['default_product_layout'] ) ? (int)$s['default_product_layout'] : 0,
			'default_categories_layout' 		=> isset( $s['default_categories_layout'] ) && is_numeric( $s['default_categories_layout'] ) ? (int)$s['default_categories_layout'] : 0,
			'default_tags_layout' 				=> isset( $s['default_tags_layout'] ) && is_numeric( $s['default_tags_layout'] ) ? (int)$s['default_tags_layout'] : 0,
			'shop_layout' 						=> isset( $s['shop_layout'] ) && is_numeric( $s['shop_layout'] ) ? (int)$s['shop_layout'] : 0,
			'products_search_layout' 			=> isset( $s['products_search_layout'] ) && is_numeric( $s['products_search_layout'] ) ? (int)$s['products_search_layout'] : 0,
			'products_under_archive_layout' 	=> $products_under_archive_layout,
			'fullwidth_row_fix'					=> isset( $s['fullwidth_row_fix'] ) && $s['fullwidth_row_fix'] == 1 ? 1 : 0,
			'fullwidth_row_fix_archive'			=> isset( $s['fullwidth_row_fix_archive'] ) && $s['fullwidth_row_fix_archive'] == 1 ? 1 : 0,
		);

		return $settings;
	}

	public function divi_builder_post_types( $post_types ){
		$post_types[] = 'product';
		$post_types[] = WCBD_ARCHIVES_POST_TYPE;
		
		return $post_types;
	}
	
	/**
	 * For Divi 3.10+
	 */
	public function maybe_filter_fb_enabled_for_post( $enabled, $post_id ) {
		$post_type = get_post_type( $post_id );

		if ( $post_type === WCBD_ARCHIVES_POST_TYPE ) {
			$enabled = true;
		}

		return $enabled;
	}

	public static function register_my_post_types() {

		// archive
		$archive_labels = array(
			'name'               => esc_html__( 'Archive Layouts', 'et_builder' ),
			'singular_name'      => esc_html__( 'Archive Layout', 'et_builder' ),
			'add_new'            => esc_html__( 'Add New', 'et_builder' ),
			'add_new_item'       => esc_html__( 'Add New Archive Layout', 'et_builder' ),
			'edit_item'          => esc_html__( 'Edit Archive Layout', 'et_builder' ),
			'new_item'           => esc_html__( 'New Archive Layout', 'et_builder' ),
			'all_items'          => esc_html__( 'All Archive Layouts', 'et_builder' ),
			'view_item'          => esc_html__( 'View Archive Layout', 'et_builder' ),
			'search_items'       => esc_html__( 'Search Layouts', 'et_builder' ),
			'not_found'          => esc_html__( 'Nothing found', 'et_builder' ),
			'not_found_in_trash' => esc_html__( 'Nothing found in Trash', 'et_builder' ),
			'parent_item_colon'  => '',
		);

		$archive_args = array(
			'labels'          	=> $archive_labels,
			'public'          	=> false,
			'show_ui'         	=> true,
			'show_in_menu'    	=> false,
			'publicly_queryable' => isset( $_GET['et_fb'] ) && $_GET['et_fb'] == 1 ? true : false,
			'taxonomies'		=> wcbd_supported_archive_taxonomies(),
			'can_export'      	=> true,
			'query_var'       	=> false,
			'has_archive'     	=> false,
			'capability_type' 	=> 'post',
			'hierarchical'    	=> false,
			'menu_position'   	=> null,
			'supports'        	=> array(
				'title',
				'editor',
				'revisions',
			),
		);

		// register post types
		register_post_type( WCBD_ARCHIVES_POST_TYPE, $archive_args );
	}

	// add used for column for wc pages builder
	public function add_archive_admin_columns( $columns ){

		$x = 0;
		foreach( $columns as $index => $value ){
			$new_columns[$index] = $value;

			if( $x == 1 ){
				$new_columns['cats'] = esc_html__( 'Categories', 'divi-wc-builder' );
				$new_columns['layout_tags'] = esc_html__( 'Tags', 'divi-wc-builder' );
			}
			$x++;
		}
		return $new_columns;
	}

	// archive columns content
	public function archive_admin_columns_content( $column, $post_id ){
		
		// categories
		if( $column == 'cats' ){
			
			$cats = get_the_terms( $post_id, 'product_cat' );
			
			if( is_array( $cats ) && count( $cats ) ){
				for( $i = 0; $i < count( $cats ); $i++ ){
					if( !is_object( $cats[$i] ) ){
						return '';
					}
					echo "<a href='". admin_url( 'edit.php?post_type=wcbd_archive_layout&product_cat='. esc_attr( $cats[$i]->slug ) ) ."'>". esc_attr( $cats[$i]->name ) ."</a>";

					if( $i < count($cats) - 1 ){
						echo ", ";
					}
				}
			}else{
				echo "—";
			}
		}
		// tags
		if( $column == 'layout_tags' ){
			
			$tags = get_the_terms( $post_id, 'product_tag' );
			
			if( is_array( $tags ) && count( $tags ) ){
				for( $i = 0; $i < count( $tags ); $i++ ){
					if( !is_object( $tags[$i] ) ){
						return '';
					}
					echo "<a href='". admin_url( 'edit.php?post_type=wcbd_archive_layout&product_tag='. esc_attr( $tags[$i]->slug ) ) ."'>". esc_attr( $tags[$i]->name ) ."</a>";

					if( $i < count($tags) - 1 ){
						echo ", ";
					}
				}
			}else{
				echo "—";
			}
		}
	}

	// filter by categories drop down menu
	public function restrict_manage_posts(){
	    $screen = get_current_screen();
	    global $wp_query;
	    if ( $screen->post_type == WCBD_ARCHIVES_POST_TYPE ) {
	        wp_dropdown_categories( array(
	            'show_option_all' 	=> 'All Categories',
	            'taxonomy' 			=> 'product_cat',
	            'name' 				=> 'product_cat',
	            'orderby' 			=> 'name',
	            'selected' 			=> ( isset( $wp_query->query['product_cat'] ) ? $wp_query->query['product_cat'] : '' ),
	            'value_field'		=> 'slug',
	            'hierarchical' 		=> 0,
	            'depth' 			=> 3,
	            'show_count' 		=> false,
	            'hide_if_empty' 	=> false,
	        ) );
	    }
	}
}

new WCBD_SETTINGS();