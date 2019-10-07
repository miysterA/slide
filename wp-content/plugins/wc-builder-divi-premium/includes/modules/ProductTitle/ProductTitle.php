<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Title extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
		
	function init() {
		$this->name       = esc_html__( 'Woo Product Title', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_title';

		$this->fields_defaults = array(
			'background_layout' => array( 'light' ),
		);

		$this->settings_modal_toggles = array(

			'advanced' => array(
				'toggles' => array(
					'text' => esc_html__( 'Text', 'wc-builder-divi' ),
				),
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'header'   => array(
					'label'    => esc_html__( 'Title', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .product_title, body.et_extra {$this->main_css_element} .product_title",
					),
					'font_size' => array(
						'default' => '30px',
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
		);
	}

	function render( $attrs, $content = null, $render_slug ) {

		$this->add_classname( 'wcbd_module' );
		
		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			$data = WCBD_INIT::content_buffer( 'woocommerce_template_single_title' );
		}

		return $data;

	}
}
new ET_Builder_Module_WooPro_Title;
