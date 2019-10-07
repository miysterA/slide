<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_AddToCart extends ET_Builder_Module {

	public static $button_text, $p;
	public static function change_button_text( $btn_text ){
		if( !empty( self::$button_text ) ){
			$btn_text = esc_attr( self::$button_text );
		}
		return $btn_text;
	}

	public $vb_support = 'on';
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	function init() {
		$this->name       = esc_html__( 'Woo Add To Cart Button', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_add_to_cart';

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'add_to_cart_button' => esc_html__( 'Add to Cart Button', 'wc-builder-divi' ),
					'quantity' => esc_html__( 'Quantity', 'wc-builder-divi' ),
					'variations' => esc_html__( 'Variations', 'wc-builder-divi' ),
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
							"body.woocommerce {$this->main_css_element} .woocommerce-variation-price, body.woocommerce {$this->main_css_element} .woocommerce-variation-price .price, {$this->main_css_element} .woocommerce-variation-price, {$this->main_css_element} .woocommerce-variation-price .price",
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
			'button' => array(
				'label'    => esc_html__( 'Button', 'wc-builder-divi' ),
				'selector' => "body #page-container {$this->main_css_element} .cart .button",
				'no_space_before_selector' => true,
			),
			'quantity_input' => array(
				'label'    => esc_html__( 'Quantity', 'wc-builder-divi' ),
				'selector' => "body.woocommerce .product {$this->main_css_element} .cart .quantity input.qty, 
				body.woocommerce .product {$this->main_css_element} .cart .quantity,
				body.woocommerce-page .product {$this->main_css_element} .cart .quantity input.qty,
				body.woocommerce-page .product {$this->main_css_element} .cart .quantity",
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
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {

		self::$button_text      	= $this->props['button_text'];

		$show_quantity				= $this->props['show_quantity'];
		$hide_variation_price		= $this->props['hide_variation_price'];
		$button_use_icon          	= $this->props['button_use_icon'];
		$custom_icon          		= $this->props['button_icon'];
		$button_custom        		= $this->props['custom_button'];
		$button_bg_color       		= $this->props['button_bg_color'];
		$button_icon_placement       		= $this->props['button_icon_placement'];

		$data = '';

		$this->add_classname( 'wcbd_module' );

		if( !is_product() ){
			return;
		}

		if( $show_quantity == 'off' ){
			$this->add_classname( 'hide-quantity' );
		}

		add_filter( 'woocommerce_product_single_add_to_cart_text', array( $this, 'change_button_text' ) );
		$data = WCBD_INIT::content_buffer( 'woocommerce_template_single_add_to_cart' );

		if( empty( $data ) ) return;

		if( $button_use_icon == 'on' && $custom_icon != '' && $button_custom == 'on' ){
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

		return $output;			
	}
}
new ET_Builder_Module_WooPro_AddToCart;
