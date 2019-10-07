<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_SUMMARY extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	public static $button_text;
	public static function change_button_text( $btn_text ){
		if( !empty( self::$button_text ) ){
			$btn_text = esc_attr( self::$button_text );
		}
		return $btn_text;
	}

	function init() {
		$this->name       = esc_html__( 'Woo Product Summary', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_summary';

		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'add_to_cart_button' => esc_html__( 'Add to Cart Button', 'wc-builder-divi' ),
					'quantity' => esc_html__( 'Quantity', 'wc-builder-divi' ),
					'variations' => esc_html__( 'Variations', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'misc'	=> esc_html__( 'Miscellaneous', 'wc-builder-divi' ),
				),
			),
			
		);		

		$this->main_css_element = '%%order_class%%';
		$this->fields_defaults = array(
			'show_quantity' 		=> array( 'on' ),
			'hide_variation_price' 	=> array( 'off' ),
		);

		$this->advanced_fields = array(
			'fonts' => array(
				'header'   => array(
					'label'    => esc_html__( 'Title', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .product_title",
					),
					'font_size' => array(
						'default' => '30px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'rating'   => array(
					'label'    => esc_html__( 'Rating', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-product-rating, {$this->main_css_element} .woocommerce-product-rating .woocommerce-review-link",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
				),
				'price'   => array(
					'label'    => esc_html__( 'Price', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce div.product {$this->main_css_element} p.price, {$this->main_css_element} p.price",
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '17px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'excerpt'   => array(
					'label'    => esc_html__( 'Excerpt', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-product-details__short-description",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.4em',
					),
				),
				'quantity_input'   => array(
					'label'    => esc_html__( 'Quantity', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"body.woocommerce {$this->main_css_element} .quantity input.qty, {$this->main_css_element} .quantity input.qty",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '20px',
					),
					'line_height' => array(
						'default' => '2em',
					),
				),
				'variation_description'   => array(
					'label'    => esc_html__( 'Variation Description', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"body.woocommerce {$this->main_css_element} .woocommerce-variation-description, {$this->main_css_element} .woocommerce-variation-description",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.3em',
					),
				),
				'variation_prices'   => array(
					'label'    => esc_html__( 'Variation Price', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"body.woocommerce {$this->main_css_element} .woocommerce-variation-price, body.woocommerce {$this->main_css_element} .woocommerce-variation-price .price, {$this->main_css_element} .woocommerce-variation-price .price",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '17px',
					),
					'line_height' => array(
						'default' => '1.3em',
					),
				),
				'variations_labels'   => array(
					'label'    => esc_html__( 'Variations Labels', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"{$this->main_css_element} .variations .label label",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.3em',
					),
				),
				'in_stock'   => array(
					'label'    => esc_html__( 'In Stock', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"{$this->main_css_element} .stock.in-stock",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '13px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'out_stock'   => array(
					'label'    => esc_html__( 'Out Of Stock', 'wc-builder-divi' ),
					'css'      => array(
						'main' => array(
							"{$this->main_css_element} .stock.out-of-stock",
						),
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '13px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'meta'   => array(
					'label'    => esc_html__( 'Product Meta', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .product_meta, {$this->main_css_element} .product_meta a",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.3em',
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
				'button' => array(
					'label' => esc_html__( 'Button', 'wc-builder-divi' ),
					'css' => array(
						'main' => "{$this->main_css_element} .cart .button",
						'important' => 'all',
					),
					'box_shadow'  => array(
						'css' => array(
							'main' => 'body #page-container %%order_class%% .cart .button',
						),
					),
				),
			),
		);
		$this->custom_css_fields = array(
			'title' => array(
				'label' => esc_html__( 'Title', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .product_title",
			),
			'price' => array(
				'label' => esc_html__( 'Price', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .price",
			),
			'rating' => array(
				'label' => esc_html__( 'Rating', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .woocommerce-product-rating .woocommerce-review-link",
			),
			'excerpt' => array(
				'label' => esc_html__( 'Excerpt', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .woocommerce-product-details__short-description",
			),
			'quantity' => array(
				'label' => esc_html__( 'Quantity', 'wc-builder-divi' ),
				'selector' => "body.woocommerce-page div.product {$this->main_css_element} form.cart .quantity, body.woocommerce-page div.product {$this->main_css_element} form.cart .quantity input.qty, {$this->main_css_element} form.cart .quantity, {$this->main_css_element} form.cart .quantity input.qty",
			),
			'variation_description' => array(
				'label' => esc_html__( 'Variation Description', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .woocommerce-variation-description",
			),
			'variation_prices' => array(
				'label' => esc_html__( 'Variation Prices', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .woocommerce-variation-price .price",
			),
			'product_meta' => array(
				'label' => esc_html__( 'Product Meta', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .product_meta, {$this->main_css_element} .product_meta a",
			),
			'button' => array(
				'label'    => esc_html__( 'Add To Cart Button', 'wc-builder-divi' ),
				'selector' => "body #page-container {$this->main_css_element} .cart .button",
				'no_space_before_selector' => true,
			),
		);
	}

	function get_fields() {
		$fields = array(
			'button_text' => array(
				'label'           => esc_html__( 'Button Text', 'wc-builder-divi' ),
				'type'            => 'text',
				'default'			=> esc_html__( 'Add to cart', 'woocommerce' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text. Default is: Add to cart', 'wc-builder-divi' ),
				'toggle_slug'       => 'add_to_cart_button',
			),
			'show_quantity' => array(
				'label' => esc_html__( 'Show Quantity Input', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug'       => 'quantity',
			),
			'hide_variation_price' => array(
				'label' => esc_html__( 'Hide Variation Price', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug'       => 'variations',
			),
			'stars_color' => array(
				'label'             => esc_html__( 'Stars Color', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {

		self::$button_text      = $this->props['button_text'];
		$show_quantity			= $this->props['show_quantity'];
		$hide_variation_price	= $this->props['hide_variation_price'];
		$stars_color      		= $this->props['stars_color'];

		$custom_icon          	= $this->props['button_icon'];
		$button_custom        	= $this->props['custom_button'];
		$button_bg_color       	= $this->props['button_bg_color'];
		$button_icon_placement       	= $this->props['button_icon_placement'];

		$data = '';
		$hide_qty = '';
		
		$this->add_classname( 'wcbd_module' );

		if( function_exists( 'is_product' ) && is_product() ){

			/**
			 * Remove schema method from the summary hook because it's already loaded before 
			 * and if the excerpt in empty and the summary module is used in the description buider,
			 * the generate product data methid will load the description instead which will break the page.
			*/

			wcbd_remove_filters_for_anonymous_class( 'woocommerce_single_product_summary', 'WC_Structured_Data', 'generate_product_data', 60 );
			
			if( $show_quantity == 'off' ){
				$this->add_classname( 'hide-quantity' );
			}

			// to prevent confliction with add to cart module
			remove_all_filters( 'woocommerce_product_single_add_to_cart_text' );
			add_filter( 'woocommerce_product_single_add_to_cart_text', array( $this, 'change_button_text' ) );
			
			ob_start();
			do_action( 'woocommerce_single_product_summary' );
			$data = ob_get_clean();

			remove_all_filters( 'woocommerce_product_single_add_to_cart_text' );
		}

		if( $data == '' ){
			return $data;
		}else{

			if( $custom_icon != '' && $button_custom == 'on' ){
				$custom_icon = 'data-icon="'. esc_attr( et_pb_process_font_icon( $custom_icon ) ) .'"';
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body #page-container %%order_class%% .cart .button:after',
					'declaration' => "content: attr(data-icon);",
				) );

				// extra theme
				if( $button_icon_placement == 'right' ){
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => 'body #page-container %%order_class%% .cart .button:hover',
						'declaration' => "padding-right: 2em; padding-left:.7em;",
					) );				
				}
			}else{
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body #page-container %%order_class%% .cart .button:hover',
					'declaration' => "padding-right:1em; padding-left:1em;",
				) );
			}

			if( $hide_variation_price == 'on' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-variation-price',
					'declaration' => "display:none;",
				) );
			}

			if( !empty( $button_bg_color ) && $button_custom == 'on' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body #page-container %%order_class%% .cart .button',
					'declaration' => "background-color:". esc_attr( $button_bg_color ) ."!important;",
				) );
			}

			$output = str_replace(
				'class="single_add_to_cart_button button alt"',
				'class="single_add_to_cart_button button alt"' . $custom_icon 
				, $data
			);	

			if( !empty( $stars_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before',
					'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
				) );
			}

			return $output;			
		}

	}
}
new ET_Builder_Module_WooPro_SUMMARY;
