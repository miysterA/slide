<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Meta extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);	
	function init() {
		$this->name       = esc_html__( 'Woo Product Meta', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_meta';

		$this->fields_defaults = array(
			'show_cats'  		=> array( 'on' ),
			'show_tags'  		=> array( 'on' ),
			'show_sku'  		=> array( 'on' ),
			'single_line'  		=> array( 'off' ),
		);

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
				'meta'   => array(
					'label'    => esc_html__( 'Meta', 'wc-builder-divi' ),
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
		);
	}

	function get_fields() {
		$fields = array(
			'show_cats' => array(
				'label' => esc_html__( 'Show Categories', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'show_tags' => array(
				'label' => esc_html__( 'Show Tags', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'show_sku' => array(
				'label' => esc_html__( 'Show SKU', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'separate_line' => array(
				'label' => esc_html__( 'Show in separate lines', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'description' => esc_html__( 'Enabling this will show Categories, Tags and SKU each in a separate line', 'wc-builder-divi' ),
				'options' => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$show_cats			= $this->props['show_cats'];
		$show_tags			= $this->props['show_tags'];
		$show_sku			= $this->props['show_sku'];
		$separate_line		= $this->props['separate_line'];

		$this->add_classname( 'wcbd_module' );
		
		if( $show_cats == 'off' ){
			$this->add_classname('hide-cats');
		}

		if( $show_tags == 'off' ){
			$this->add_classname('hide-tags');
		}

		if( $show_sku == 'off' ){
			$this->add_classname('hide-sku');
		}

		if( $separate_line == 'on' ){
			$this->add_classname('separate-line');
		}

		// get product price
		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			$data = WCBD_INIT::content_buffer( 'woocommerce_template_single_meta' );
		}

		return $data;			
	}
}
new ET_Builder_Module_WooPro_Meta;