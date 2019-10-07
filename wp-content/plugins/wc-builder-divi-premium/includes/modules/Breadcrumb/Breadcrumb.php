<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Breadcrumb extends ET_Builder_Module {

	public $vb_support = 'on';
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	function init() {
		$this->name       = esc_html__( 'Woo Breadcrumb', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_breadcrumb';

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'header'   => array(
					'label'    => esc_html__( 'Breadcrumb', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-breadcrumb, {$this->main_css_element} .woocommerce-breadcrumb a",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.1em',
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
		return WCBD_INIT::content_buffer( 'woocommerce_breadcrumb' );

	}
}
new ET_Builder_Module_WooPro_Breadcrumb;
