<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Price extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);	
	function init() {
		$this->name       = esc_html__( 'Woo Product Price', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_price';

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Module Options', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => esc_html__( 'Text', 'wc-builder-divi' ),
				),
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'price_text'   => array(
					'label'    => esc_html__( 'Price', 'wc-builder-divi' ),
					'css'      => array(
						'line_height' => "{$this->main_css_element} p",
						'color' => "{$this->main_css_element} .price",
					),
					'font_size' => array(
						'default' => '17px',
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
		);
	}

	function get_fields() {
		$fields = array(
			'change_to_variation_price' => array(
				'label'             => esc_html__( 'Change to selected variable price', 'wc-builder-divi' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
				'description'       => __( 'When you enable this, the price will change to the selected variation. <b>Works only with variable products</b>', 'wc-builder-divi' ),
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {

		$change_to_variation_price  = $this->props['change_to_variation_price'];
		
		$this->add_classname( 'wcbd_module' );

		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			global $product;

			if( $change_to_variation_price == 'on' && $product->is_type( 'variable' ) ){
				$this->add_classname( 'change_to_variation_price' );

				$data .= "<div class='wcbd_selected_variation_price'></div>";
			}

			$data .= WCBD_INIT::content_buffer( 'woocommerce_template_single_price' );
		}

		return $data;

	}
}
new ET_Builder_Module_WooPro_Price;