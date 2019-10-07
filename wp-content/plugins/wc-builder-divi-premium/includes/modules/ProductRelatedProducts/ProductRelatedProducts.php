<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Related extends ET_Builder_Module {

	public $vb_support = 'on';

    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
		
	public static $products_count, $products_columns;
	public static function change_pro_count( $args ){

		if( is_numeric( self::$products_count ) && self::$products_count > 0 ){
			$args['posts_per_page'] = self::$products_count;
		}
		return $args;
	}

	public static function change_columns_count( $args ){

		if( is_numeric( self::$products_columns ) && self::$products_columns > 0 ){
			$args['columns'] = self::$products_columns;
		}
		return $args;
	}

	function init() {
		$this->name            = esc_html__( 'Woo Related Products', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_related_products';

		$this->fields_defaults = array(
			'use_overlay' => array('on'),
			'show_heading' => array( 'on' ),
			'products_columns' => array( '3' ),
			'products_count' => array( '3' ),
		);
		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Header', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .related > h2, body.et_extra {$this->main_css_element} .related > h2",
						'important' => array( 'size', 'font-size', 'plugin_all' ),
					),
					'font_size' => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'product_title' => array(
					'label'    => esc_html__( 'Product Title', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce {$this->main_css_element} ul.products li.product h2.woocommerce-loop-product__title, {$this->main_css_element} ul.products li.product h2.woocommerce-loop-product__title",
						'important' => array( 'size', 'font-size' ),
					),
					'font_size' => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'product_price' => array(
					'label'    => esc_html__( 'Price', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce {$this->main_css_element} ul.products li.product .price, {$this->main_css_element} ul.products li.product .price",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
				),
			),
			'background' => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'button' => array(
				'add_to_cart_button' => array(
					'label' => esc_html__( 'Add To Cart Button', 'wc-builder-divi' ),
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
		);

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'module_heading' => esc_html__( 'Module Heading', 'wc-builder-divi' ),
					'main_content' => esc_html__( 'Related Products', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'overlay' => esc_html__( 'Product Image Overlay', 'wc-builder-divi' ),
					'misc'	=> esc_html__( 'Miscellaneous', 'wc-builder-divi' ),
				),
			),
			
		);

		$this->custom_css_fields = array(
			'header' => array(
				'label' => esc_html__( 'Header', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .related > h2, body.et_extra {$this->main_css_element} .related > h2",
			),
			'product_title' => array(
				'label' => esc_html__( 'Product Title', 'wc-builder-divi' ),
				'selector' => "body.woocommerce {$this->main_css_element} ul.products li.product h2.woocommerce-loop-product__title, {$this->main_css_element} ul.products li.product h2.woocommerce-loop-product__title",
			),
			'product_price' => array(
				'label' => esc_html__( 'Product Price', 'wc-builder-divi' ),
				'selector' => "body.woocommerce {$this->main_css_element} ul.products li.product .price, {$this->main_css_element} ul.products li.product .price",
			),
		);
	}

	function get_fields() {
		$fields = array(
			'show_heading' => array(
				'label' => esc_html__( 'Show Heading', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'module_heading',
			),
			'products_count' => array(
				'label'			=> esc_html__( 'Products count', 'wc-builder-divi' ),
				'type'			=> 'number',
				'default' 		=> 3,
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Products Count: Default is 3', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'computed_affects' => array(
					'__related_products',
				),
			),
			'products_columns' => array(
				'label'			=> esc_html__( 'Products Columns', 'wc-builder-divi' ),
				'type'			=> 'select',
				'option_category' => 'layout',
				'options' => array(
					'0' => esc_html__( '-- Columns --', 'wc-builder-divi' ),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				),
				'description'     => esc_html__( 'Products Columns: Default is 3', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'computed_affects' => array(
					'__related_products',
				),
			),
			'show_add_to_cart' => array(
				'label' => esc_html__( 'Show Add To Cart', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options' => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'description'     => esc_html__( 'Enable this to display add to cart button under each product.', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'computed_affects' => array(
					'__related_products',
				),
			),
			'use_overlay' => array(
				'label'             => esc_html__( 'Image Overlay', 'wc-builder-divi' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'on' => esc_html__( 'On', 'wc-builder-divi' ),
					'off'  => esc_html__( 'Off', 'wc-builder-divi' ),
				),
				'affects'           => array(
					'overlay_icon_color',
					'hover_overlay_color',
					'hover_icon',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'overlay',
				'description'       => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'wc-builder-divi' ),
			),
			'overlay_icon_color' => array(
				'label'             => esc_html__( 'Overlay Icon Color', 'wc-builder-divi' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'on',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'overlay',
				'description'       => esc_html__( 'Here you can define a custom color for the overlay icon', 'wc-builder-divi' ),
			),
			'hover_overlay_color' => array(
				'label'             => esc_html__( 'Hover Overlay Color', 'wc-builder-divi' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'on',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'overlay',
				'description'       => esc_html__( 'Here you can define a custom color for the overlay', 'wc-builder-divi' ),
			),
			'hover_icon' => array(
				'label'               => esc_html__( 'Hover Icon Picker', 'wc-builder-divi' ),
				'type'                => 'select_icon',
				'option_category'     => 'configuration',
				'default' 				=> 'P',
				'class'               => array( 'et-pb-font-icon' ),
				'depends_show_if'     => 'on',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'overlay',
				'description'       => esc_html__( 'Here you can define a custom icon for the overlay', 'wc-builder-divi' ),
			),
			'stars_color' => array(
				'label'             => esc_html__( 'Rating Stars Color', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'toggle_slug' => 'misc',
				'tab_slug' => 'advanced',
			),
			'sale_badge_color' => array(
				'label'             => esc_html__( 'Sale Badge Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'toggle_slug' => 'misc',
				'tab_slug'          => 'advanced',
			),
			'__related_products' => array(
				'type' => 'computed',
				'computed_callback' => array( 'ET_Builder_Module_WooPro_Related', 'get_related_products' ),
				'computed_depends_on' => array(
					'products_count',
					'products_columns',
					'show_add_to_cart',
				),
			),
		);

		return $fields;
	}

	static function get_related_products( $args = array(), $conditional_tags = array(), $current_page = array() ){
		global $product, $post;

		// for visual builder
		$post_id = wcbd_get_post_id_for_vb();
		if( $post_id ){
			$product = wc_get_product( $post_id );
			if( !$product ){
				/**
				 * This means the module is used on the visual builder on none product pages
				 * So, we will use the [products] shortcode
				 */

				$limit 		= is_numeric( $args['products_count'] ) && (int) $args['products_count'] > 0 ? (int) $args['products_count'] : 3;
				$columns 	= is_numeric( $args['products_columns'] ) && (int) $args['products_columns'] <= 6 ? (int) $args['products_columns'] : 3;
				// show add to cart
				if( $args['show_add_to_cart'] == 'on' ){
					// add th button
					add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
				}

				$related = do_shortcode( "[products paginate='false' limit='{$limit}' columns='{$columns}']" );
				$heading = '<h2>' . esc_html__( 'Related products', 'woocommerce' ) . '</h2>';
				return '<div class="woocommerce">
							<div class="product">
								<section class="related products">' . $heading . $related . '</section>
							</div>
						</div>';
			}
		}

		$defaults = array(
			'products_count' 	=> '3',
			'products_columns' 	=> '3',
			'show_add_to_cart' 	=> 'off',
		);

		$args = wp_parse_args( $args, $defaults );

		// set products count
		self::$products_count = $args['products_count'];
		add_filter( 'woocommerce_output_related_products_args', array( 'ET_Builder_Module_WooPro_Related', 'change_pro_count' ), 99 );

		// set products columns
		self::$products_columns = $args['products_columns'];
		if( !is_numeric( self::$products_columns ) || self::$products_columns <= 0 ){
			self::$products_columns = 3;
		}
		add_filter( 'woocommerce_output_related_products_args', array( 'ET_Builder_Module_WooPro_Related', 'change_columns_count' ), 99 );
		
		// show add to cart
		if( $args['show_add_to_cart'] == 'on' ){
			// add th button
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
		}

		// get the content
		ob_start();
		woocommerce_output_related_products();
		$data = ob_get_clean();

		// cleaning in case the module used twice
		remove_filter( 'woocommerce_output_related_products_args', array( 'ET_Builder_Module_WooPro_Related', 'change_pro_count' ), 99 );
		remove_filter( 'woocommerce_output_related_products_args', array( 'ET_Builder_Module_WooPro_Related', 'change_columns_count' ), 99 );
		if( $args['show_add_to_cart'] == 'on' ){
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
		}

		return $data;
	}

	function render( $attrs, $content = null, $render_slug ) {

		self::$products_count 		= $this->props['products_count'];
		self::$products_columns 			= $this->props['products_columns'];
		$sale_badge_color        	= $this->props['sale_badge_color'];
		$show_heading     			= $this->props['show_heading'];
		$overlay_icon_color  		= $this->props['overlay_icon_color'];
		$hover_overlay_color 		= $this->props['hover_overlay_color'];
		$hover_icon          		= $this->props['hover_icon'];
		$use_overlay         		= $this->props['use_overlay'];
		$stars_color      			= $this->props['stars_color'];

		$show_add_to_cart 						= $this->props['show_add_to_cart'];
		$custom_add_to_cart_button  			= $this->props['custom_add_to_cart_button'];
		$add_to_cart_button_icon 				= $this->props['add_to_cart_button_icon'];
		$add_to_cart_button_icon_placement 		= $this->props['add_to_cart_button_icon_placement'];
		$add_to_cart_button_bg_color 			= $this->props['add_to_cart_button_bg_color'];
		$add_to_cart_button_use_icon 			= $this->props['add_to_cart_button_use_icon'];
		$add_to_cart_button_on_hover 			= $this->props['add_to_cart_button_on_hover'];

		$data = '';
		
		$this->add_classname( 'wcbd_module' );

		// add products list class
		$this->add_classname( 'wcbd_loop' );
		
		// text orientation class
		$text_orientation = isset( $this->props['text_orientation'] ) ? esc_attr( $this->props['text_orientation'] ) : '';
		if( $text_orientation ){
			$this->add_classname( "et_pb_text_align_{$text_orientation}" );
		}
		
		if( function_exists( 'is_product' ) && is_product() ){	

			$data = self::get_related_products( array(
				'products_count' 	=> absint(self::$products_count),
				'products_columns' 	=> absint( self::$products_columns ),
				'show_add_to_cart' 	=> esc_attr( $show_add_to_cart ),
			) );

			if( !$data ){
				return '';
			}
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

					$icon_color = !( empty( $overlay_icon_color ) ) ? 'color: ' . esc_attr( $overlay_icon_color ) . ';' : '';

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
					'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before',
					'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
				) );
			}

			if( $show_heading == 'off' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .related > h2',
					'declaration' => "display: none !important;",
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
			if( !is_numeric( self::$products_columns ) || self::$products_columns <= 0 ){
				self::$products_columns = 3;
			}

			$output = "<div class='woocommerce columns-". (int)self::$products_columns ."'>" . $data . "</div>";
			return $output;			
		}
		
	}
}
new ET_Builder_Module_WooPro_Related;