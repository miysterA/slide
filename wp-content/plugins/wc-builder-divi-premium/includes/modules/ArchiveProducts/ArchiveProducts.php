<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_Archive_Products extends ET_Builder_Module {

	public $columns = 3;
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	function init() {
		$this->name       = esc_html__( 'Woo Archive Products', 'et_builder' );
		$this->slug       = 'et_pb_wcbd_archive_products';
		$this->vb_support = 'on';

		$this->main_css_element = '%%order_class%%';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'et_builder' ),
					'components' => esc_html__( 'Components', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'overlay' => esc_html__( 'Overlay', 'et_builder' ),
					'misc'   => esc_html__( 'Miscellaneous', 'et_builder' ),
					'pagination'   => esc_html__( 'Pagination', 'et_builder' ),
					'product' => esc_html__( 'Product', 'et_builder' ),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts' => array(
				'title' => array(
					'label'    => esc_html__( 'Title', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} ul.products li.product .woocommerce-loop-product__title, {$this->main_css_element} ul.products li.product .woocommerce-loop-category__title, {$this->main_css_element} ul.products li.product .woocommerce-loop-product__title a, {$this->main_css_element} ul.products li.product .woocommerce-loop-category__title a",
						'important' => 'plugin_only',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'price' => array(
					'label'    => esc_html__( 'Price', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} ul.products li.product .price, {$this->main_css_element} ul.products li.product .price .amount, body.et_extra {$this->main_css_element} ul.products li.product .price, body.et_extra {$this->main_css_element} ul.products li.product .price .amount",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'default' => '1.7em',
					),
				),
				'excerpt' => array(
					'label'    => esc_html__( 'Excerpt', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} ul.products li.product .woocommerce-product-details__short-description",
						'important' => 'plugin_only',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
			),
			'button' => array(
				'add_to_cart_button' => array(
					'label' => esc_html__( 'Add To Cart Button', 'et_builder' ),
					'css' => array(
						'main' => "{$this->main_css_element} ul.products li.product .button",
						'important' => 'all',
					),
					'box_shadow' => array(
						'css' => array(
							'main' => "{$this->main_css_element} ul.products li.product .button",
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(),
				'product' => array(
					'label' => esc_html__( 'Product Box Shadow', 'et_builder' ),
					'css' => array(
						'main' => "body.et_divi_theme {$this->main_css_element} .products .product, body.et_extra {$this->main_css_element} .products .product .product-wrapper",
					),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'product',
				),
			),
		);

		$this->custom_css_fields = array(
			'product' => array(
				'label'    => esc_html__( 'Product', 'et_builder' ),
				'selector' => '%%order_class%% li.product',
			),
			'onsale' => array(
				'label'    => esc_html__( 'Onsale', 'et_builder' ),
				'selector' => '%%order_class%% li.product .onsale',
			),
			'image' => array(
				'label'    => esc_html__( 'Image', 'et_builder' ),
				'selector' => '%%order_class%% .et_shop_image',
			),
			'overlay' => array(
				'label'    => esc_html__( 'Overlay', 'et_builder' ),
				'selector' => '%%order_class%% .et_overlay, %%order_class%% .et_pb_extra_overlay',
			),
			'title' => array(
				'label'    => esc_html__( 'Title', 'et_builder' ),
				'selector' => '%%order_class%% .woocommerce-loop-product__title',
			),
			'rating' => array(
				'label'    => esc_html__( 'Rating', 'et_builder' ),
				'selector' => '%%order_class%% .star-rating',
			),
			'price' => array(
				'label'    => esc_html__( 'Price', 'et_builder' ),
				'selector' => "body.woocommerce {$this->main_css_element} ul.products li.product .price, {$this->main_css_element} ul.products li.product .price",
			),
			'price_old' => array(
				'label'    => esc_html__( 'Old Price', 'et_builder' ),
				'selector' => '%%order_class%% li.product .price del span.amount',
			),
			'excerpt' => array(
				'label'    => esc_html__( 'Product Excerpt', 'et_builder' ),
				'selector' => '%%order_class%% li.product .woocommerce-product-details__short-description',
			),
			'add_to_cart' => array(
				'label'    => esc_html__( 'Add To Cart Button', 'et_builder' ),
				'selector' => '%%order_class%% li.product a.button',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'display_type' => array(
				'label'             => esc_html__( 'Display Type', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'grid' => esc_html__( 'Grid', 'et_builder' ),
					'list_view' => esc_html__( 'Classic Blog', 'et_builder' ),
				),
				'default' => 'grid',
				'affects' => array(
					'columns_number',
				),
				'toggle_slug'       => 'main_content',
			),
			'columns_number' => array(
				'label'             => esc_html__( 'Columns Number', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'0' => esc_html__( '-- Default --', 'et_builder' ),
					'6' => sprintf( esc_html__( '%1$s Columns', 'et_builder' ), esc_html( '6' ) ),
					'5' => sprintf( esc_html__( '%1$s Columns', 'et_builder' ), esc_html( '5' ) ),
					'4' => sprintf( esc_html__( '%1$s Columns', 'et_builder' ), esc_html( '4' ) ),
					'3' => sprintf( esc_html__( '%1$s Columns', 'et_builder' ), esc_html( '3' ) ),
					'2' => sprintf( esc_html__( '%1$s Columns', 'et_builder' ), esc_html( '2' ) ),
					'1' => esc_html__( '1 Column', 'et_builder' ),
				),
				'computed_affects' => array(
					'__products',
				),
				'depends_show_if' => 'grid',
				'default' => '3',
				'description'       => esc_html__( 'Choose how many columns to display. Default is 3.', 'et_builder' ),
				'toggle_slug'       => 'main_content',
			),
			'show_sorting_menu' => array(
				'label' => esc_html__( 'Show OrderBy Menu', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'basic_option',
				'options' => array(
					'on' => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default' => 'on',
				'description' => esc_html__( 'Show/Hide the sorting dropdown menu in the frontend.', 'et_builder' ),
				'toggle_slug' => 'components',
			),
			'show_results_count' => array(
				'label' => esc_html__( 'Show Results Count', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'basic_option',
				'options' => array(
					'on' => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default' => 'on',
				'description' => esc_html__( 'Show/Hide products count.', 'et_builder' ),
				'toggle_slug' => 'components',
			),
			'show_rating' => array(
				'label' => esc_html__( 'Show Rating', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'divi-wc-builder' ),
					'off' => esc_html__( 'No', 'divi-wc-builder' ),
				),
				'default' => 'on',
				'toggle_slug' => 'components',
				'affects' => array(
					'stars_color',
				),
			),
			'show_price' => array(
				'label' => esc_html__( 'Show Price', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'divi-wc-builder' ),
					'off' => esc_html__( 'No', 'divi-wc-builder' ),
				),
				'default' => 'on',
				'toggle_slug' => 'components',
			),
			'show_excerpt' => array(
				'label' => esc_html__( 'Show Excerpt', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'divi-wc-builder' ),
					'on'  => esc_html__( 'Yes', 'divi-wc-builder' ),
				),
				'toggle_slug' => 'components',
				'computed_affects' => array(
					'__products',
				),
			),
			'show_add_to_cart' => array(
				'label' => esc_html__( 'Show Add To Cart Button', 'et_builder' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'divi-wc-builder' ),
					'on'  => esc_html__( 'Yes', 'divi-wc-builder' ),
				),
				'toggle_slug' => 'components',
				'computed_affects' => array(
					'__products',
				),
			),
			'enable_pagination' => array(
				'label'             => esc_html__( 'Enable Pagination', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default' => 'on',
				'toggle_slug'       => 'components',
			),
			'active_nav_bg' => array(
				'label'             => esc_html__( 'Current Item Background', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'show_if'						=> array(
					'enable_pagination' => 'on',
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'pagination',
			),
			'active_nav_color' => array(
				'label'             => esc_html__( 'Current Item Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'show_if'						=> array(
					'enable_pagination' => 'on',
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'pagination',
			),
			'sale_badge_color' => array(
				'label'             => esc_html__( 'Sale Badge Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'misc',
			),
			'stars_color' => array(
				'label'             => esc_html__( 'Rating Stars Color', 'divi-wc-builder' ),
				'type'     => 'color-alpha',
				'toggle_slug' => 'misc',
				'tab_slug' => 'advanced',
			),
			'use_overlay' => array(
				'label' => esc_html__( 'Use Overlay', 'et_builder' ),
				'type' => 'yes_no_button',
				'options' => array(
					'on' => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default' => 'on',
				'affects' => array(
					'icon_hover_color',
					'hover_overlay_color',
					'hover_icon',
				),
				'tab_slug' => 'advanced',
				'toggle_slug' => 'overlay',
			),
			'icon_hover_color' => array(
				'label'             => esc_html__( 'Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if' 	=> 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
			),
			'hover_overlay_color' => array(
				'label'             => esc_html__( 'Overlay Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if' 	=> 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
			),
			'hover_icon' => array(
				'label'               => esc_html__( 'Icon Picker', 'et_builder' ),
				'type'                => 'select_icon',
				'option_category'     => 'configuration',
				'class'               => array( 'et-pb-font-icon' ),
				'default'			=> 'P',
				'depends_show_if' 	=> 'on',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'overlay',
			),
			'product_background' => array(
				'label'             => esc_html__( 'Product Background', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'product',
			),
			'product_padding' => array(
				'label'             => esc_html__( 'Product Padding', 'et_builder' ),
				'type'              => 'range',
				'default'			=> '0px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'product',
			),
			'__products' => array(
				'type' => 'computed',
				'computed_callback' => array( 'ET_Builder_Module_Archive_Products', 'get_products' ),
				'computed_depends_on' => array(
					'columns_number',
					'show_add_to_cart',
					'show_excerpt',
				),
			),
		);
		return $fields;
	}

	public static function get_products( $args = array(), $conditional_tags = array(), $current_page = array() ){
		global $post, $columns;

		$term 				= false;
		$shortcode_options	= '';
		$post_id 			= wcbd_get_post_id_for_vb();
		$post 				= get_post( $post_id );
		$columns			= isset( $args['columns_number'] ) && absint( $args['columns_number'] ) > 0 ? absint( $args['columns_number'] ) : 3;
		
		/**
		 * If building the layout using the archive builder post type, get this post/layout term/product_cat/product_tag to display real products
		  */

		if( $post && $post->post_type == WCBD_ARCHIVES_POST_TYPE ){
			$terms = get_the_terms( $post_id, 'product_cat' );	
			
			if( is_array( $terms ) && count( $terms ) ){
				$term = $terms[0]->term_slug;
				$shortcode_options .= " category={$term}";
			}else{
				$terms = get_the_terms( $post_id, 'product_tag' );
				if( is_array( $terms ) && count( $terms ) ){
					$term = $terms[0]->term_slug;
					$shortcode_options .= " tag={$term}";
				}
			}
		}
		
		// columns
		add_filter( 'loop_shop_columns', function($c){
			global $columns;
			return $columns;
		}, 9999 );

		// get the current posts per page
		$limit = et_get_option( DIVIKINGDOM_THEME_NAME . '_woocommerce_archive_num_posts', 9 );

		// add to cart
		if( isset( $args['show_add_to_cart'] ) && $args['show_add_to_cart'] == 'on' ){
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
		}

		if( isset( $args['show_excerpt'] ) && $args['show_excerpt'] == 'on' ){
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 8 );
		}
		
		// collect everything is an html wrapper
		add_action( 'woocommerce_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );
		add_action( 'woocommerce_shop_loop_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );

		add_action( 'woocommerce_after_shop_loop_item', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );
		add_action( 'woocommerce_after_subcategory', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );

		// image wrapper
		add_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );
		add_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );

		add_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );
		add_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );

		/**
		 * Fix a conflict with FB-for-WooCommerce plugin
		 */
		remove_all_actions('woocommerce_after_shop_loop');
		$shortcode = "[products paginate='true' limit='{$limit}' {$shortcode_options}]";
		$shop = do_shortcode( $shortcode );
		
		return $shop;
	}

	public function change_columns_number( $c ){

		$columns = 3;
		if( absint( $this->columns ) > 0 ){
			$columns = absint( $this->columns );

			if( isset( $GLOBALS['woocommerce_loop']['columns'] ) ){
				$GLOBALS['woocommerce_loop']['columns'] = $this->columns;
			}
		}
		return $columns;
	}

	public static function product_details_wrapper_start(){
		echo "<div class='wcbd_product_details'>";
	}
	public static function product_details_wrapper_end(){
		echo "</div>";
	}
	public static function product_image_wrapper_start(){
		echo "<div class='wcbd_product_image'>";
	}
	public static function product_image_wrapper_end(){
		echo "</div>";
	}

	function render( $attrs, $content = null, $render_slug ) {

		$display_type		 					= $this->props['display_type'];
		$show_sorting_menu		 				= $this->props['show_sorting_menu'];
		$show_results_count		 				= $this->props['show_results_count'];
		$show_rating        					= $this->props['show_rating'];
		$show_price        						= $this->props['show_price'];
		$show_excerpt            				= $this->props['show_excerpt'];
		$show_add_to_cart        				= $this->props['show_add_to_cart'];

		$enable_pagination         				= $this->props['enable_pagination'];
		$this->columns                 			= $this->props['columns_number'];
		$sale_badge_color        				= $this->props['sale_badge_color'];
		$stars_color      		 				= $this->props['stars_color'];
		$active_nav_bg      		 				= $this->props['active_nav_bg'];
		$active_nav_color      		 				= $this->props['active_nav_color'];
		$use_overlay        					= $this->props['use_overlay'];
		$icon_hover_color        				= $this->props['icon_hover_color'];
		$hover_overlay_color     				= $this->props['hover_overlay_color'];
		$hover_icon              				= $this->props['hover_icon'];
		$product_background              		= $this->props['product_background'];
		$product_padding              			= $this->props['product_padding'];

		$custom_add_to_cart_button  			= $this->props['custom_add_to_cart_button'];
		$add_to_cart_button_bg_color  			= $this->props['add_to_cart_button_bg_color'];
		$add_to_cart_button_icon 				= $this->props['add_to_cart_button_icon'];
		$add_to_cart_button_icon_placement 		= $this->props['add_to_cart_button_icon_placement'];
		$add_to_cart_button_use_icon 			= $this->props['add_to_cart_button_use_icon'];
		$add_to_cart_button_on_hover 			= $this->props['add_to_cart_button_on_hover'];

		$this->add_classname( 'wcbd_module' );
		
		$loop = '';
		if( is_admin() ) return;

		// add products list class
		$this->add_classname( 'wcbd_loop' );

		// text orientation class
		$text_orientation = isset( $this->props['text_orientation'] ) ? esc_attr( $this->props['text_orientation'] ) : '';
		if( $text_orientation ){
			$this->add_classname( "et_pb_text_align_{$text_orientation}" );
		}

		if( $show_sorting_menu == 'off' ){
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		}
		if( $show_results_count == 'off' ){
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		}
		if( $show_rating == 'off' ){
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		}
		if( $show_price == 'off' ){
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		}
		if( $show_excerpt == 'on' ){
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 8 );
		}
		if( $show_add_to_cart == 'on' ){
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
		}
		if( $enable_pagination == 'off' ){
			remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
		}

		// collect everything is an html wrapper
		add_action( 'woocommerce_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );
		add_action( 'woocommerce_shop_loop_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );

		add_action( 'woocommerce_after_shop_loop_item', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );
		add_action( 'woocommerce_after_subcategory', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );
		
		// image wrapper
		add_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );
		add_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );

		add_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );
		add_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );

		// list view
		if( $display_type == 'list_view' ){
			$this->add_classname( 'wcbd_list_view' );
			$this->columns = 1;
		}

		// columns
		add_filter( 'loop_shop_columns', array( $this, 'change_columns_number' ), 9999 );

		// show add to cart
		if( $show_add_to_cart == 'on' ){

			// add to cart button icon and background
			if( $custom_add_to_cart_button == 'on' ){

				// button icon
				if( $add_to_cart_button_use_icon == 'on' && $add_to_cart_button_icon != '' ){
					$addToCartIconContent = WCBD_INIT::et_icon_css_content( esc_attr($add_to_cart_button_icon) );

					$addToCartIconSelector = '';
					if( $add_to_cart_button_icon_placement == 'right' ){
						$addToCartIconSelector = '%%order_class%% li.product .button:after';
					}elseif( $add_to_cart_button_icon_placement == 'left' ){
						$addToCartIconSelector = '%%order_class%% li.product .button:before';
					}

					if( !empty( $addToCartIconContent ) && !empty( $addToCartIconSelector ) ){
						ET_Builder_Element::set_style( $render_slug, array(
							'selector' => $addToCartIconSelector,
							'declaration' => "content: '{$addToCartIconContent}'!important;font-family:ETmodules!important;"
							)
						);	
						
						// extra theme
						if( $add_to_cart_button_on_hover == 'off' ){
							// show the icon
							ET_Builder_Element::set_style( $render_slug, array(
								'selector'    => 'body.et_extra #page-container %%order_class%% ul.products li.product .button:after, body.et_extra #page-container %%order_class%% ul.products li.product .button:before',
								'declaration' => "opacity: 1 !important;",
							) );
							if( $add_to_cart_button_icon_placement == 'right' ){
								ET_Builder_Element::set_style( $render_slug, array(
									'selector'    => 'body.et_extra #page-container %%order_class%% ul.products li.product .button',
									'declaration' => "padding-right: 2em; padding-left:.7em;",
								) );				
							}elseif( $add_to_cart_button_icon_placement == 'left' ){
								ET_Builder_Element::set_style( $render_slug, array(
									'selector'    => 'body.et_extra #page-container %%order_class%% ul.products li.product .button',
									'declaration' => "padding-right: .7em; padding-left:2em;",
								) );				
							}
						}
					}						
				}else{
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => 'body #page-container %%order_class%% ul.products li.product .button:hover',
						'declaration' => "padding-right:1em; padding-left:1em;",
					) );
				}

				// button background
				if( !empty( $add_to_cart_button_bg_color ) ){
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => 'body #page-container %%order_class%% .button',
						'declaration' => "background-color:". esc_attr( $add_to_cart_button_bg_color ) ."!important;",
					) );
				}
			}
		}

		if( $use_overlay == 'off' ){
			$this->add_classname( 'hide_overlay' );

		}elseif( $use_overlay == 'on' ){

		// icon
		if( !empty( $hover_icon ) ){

			$icon_color = !( empty( $icon_hover_color ) ) ? 'color: ' . esc_attr( $icon_hover_color ) . ';' : '';

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .et_overlay:before, %%order_class%% .et_pb_extra_overlay:before',
				'declaration' => "content: '". esc_attr( WCBD_INIT::et_icon_css_content( $hover_icon ) ) ."'; font-family: 'ETmodules' !important; {$icon_color}",
			) );

		}

		// hover background color
		if( !empty( $hover_overlay_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .et_overlay, %%order_class%% .et_pb_extra_overlay',
					'declaration' => "background: ". esc_attr( $hover_overlay_color ) .";",
				) );

			}
		}

		// stars color
		if( !empty( $stars_color ) ){

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before, %%order_class%% .star-rating span:before',
				'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
			) );
		}
		
		if ( '' !== $sale_badge_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% span.onsale',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $sale_badge_color )
				),
			) );
		}

		if ( $enable_pagination == 'on' ) {

			// bg
			if( $active_nav_bg != '' ){
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% nav.woocommerce-pagination ul li span.current, %%order_class%% nav.woocommerce-pagination ul li a:hover, %%order_class%% nav.woocommerce-pagination ul li a:focus',
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_html( $active_nav_bg )
					),
				) );				
			}

			// color
			if( $active_nav_color != '' ){
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% nav.woocommerce-pagination ul li span.current, %%order_class%% nav.woocommerce-pagination ul li a:hover, %%order_class%% nav.woocommerce-pagination ul li a:focus',
					'declaration' => sprintf(
						'color: %1$s !important;',
						esc_html( $active_nav_color )
					),
				) );				
			}
		}

		if ( '' !== $product_background ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => ".et_divi_theme {$this->main_css_element} .products .product, .et_extra {$this->main_css_element} .products .product .product-wrapper",
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $product_background )
				),
			) );
		}

		if ( '' !== $product_padding ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "body.et_divi_theme {$this->main_css_element} .products .product, body.et_extra {$this->main_css_element} .products .product .product-wrapper",
				'declaration' => sprintf(
					'padding: %1$s !important;',
					esc_html( $product_padding )
				),
			) );
		}		

		/** 
		 * Products Loop Start 
		 * If the module is used inside a product archive page, load the default loop to maintain compatibility with 3rd party plugins
		 * But if the module is used in any other page, use the [products] shortcode
		 * */
		if( ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) || ( function_exists( 'is_shop' ) && is_shop() ) ){
			ob_start();
				/**
				 * This loop is from archive-product.php
				 * @version 3.4.0 => WC
				 */
				if ( have_posts() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( function_exists( 'wc_get_loop_prop' ) && wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}else{
						// for WooCommerce Versions before 3.3
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
			$loop = ob_get_clean();
			$loop = "<div class='woocommerce columns-". (int)$this->columns ."'>" . $loop . "</div>";
		}else{
			$columns = esc_attr($this->columns);
			global $shortname; // theme name
			$limit = function_exists( 'et_get_option' ) ? (int) et_get_option( $shortname . '_woocommerce_archive_num_posts', '9' ) : 9;
			$pagination = $enable_pagination == 'on' ? 'true' : 'false';
			
			$shortcode = "[products columns='{$columns}' limit='{$limit}' paginate='{$pagination}']";
			$loop = do_shortcode( $shortcode );
		}
		/* Products Loop Start */
		
		/* reset in case the module used twice start */
		if( $show_sorting_menu == 'off' ){
			add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		}
		if( $show_results_count == 'off' ){
			add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		}
		if( $show_rating == 'off' ){
			add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		}
		if( $show_price == 'off' ){
			add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		}
		if( $show_excerpt == 'on' ){
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 8 );
		}
		if( $show_add_to_cart == 'on' ){
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
		}
		if( $enable_pagination == 'off' ){
			add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
		}
		remove_filter( 'loop_shop_columns', array( $this, 'change_columns_number' ), 9999 );
		
		// collect everything is an html wrapper
		remove_action( 'woocommerce_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );
		remove_action( 'woocommerce_shop_loop_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_start' ), 0 );

		remove_action( 'woocommerce_after_shop_loop_item', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );
		remove_action( 'woocommerce_after_subcategory', array( 'ET_Builder_Module_Archive_Products', 'product_details_wrapper_end' ), 10 );

		// image wrapper
		remove_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );
		remove_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_start' ), 0 );

		remove_action( 'woocommerce_before_shop_loop_item_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );
		remove_action( 'woocommerce_before_subcategory_title', array( 'ET_Builder_Module_Archive_Products', 'product_image_wrapper_end' ), 20 );
		/* reset in case the module used twice End */

		$output = $loop;

		return $output;
	}
}
new ET_Builder_Module_Archive_Products;