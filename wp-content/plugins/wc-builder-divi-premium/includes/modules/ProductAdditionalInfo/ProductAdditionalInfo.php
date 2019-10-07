<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Additional_Info extends ET_Builder_Module {

	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);

	function init() {
		$this->name            = esc_html__( 'Woo Product Additional Info.', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_additional_info';

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'module_heading' => esc_html__( 'Module Heading', 'wc-builder-divi' ),
				),
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->fields_defaults = array(
			'show_heading' => array( 'on' ),
		);
		$this->advanced_fields = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Heading', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} h2.module_title",
					),
					'font_size' => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'attribute_name' => array(
					'label'    => esc_html__( 'Attribute Name', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} table.shop_attributes th",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.5em',
					),
				),
				'attribute_values' => array(
					'label'    => esc_html__( 'Attribute Values', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} table.shop_attributes td p, {$this->main_css_element} table.shop_attributes td a",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.5em',
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
		$this->custom_css_fields = array(
			'header' => array(
				'label' => esc_html__( 'Heading', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} h2.module_title",
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
				'affects' => array(
					'heading',
					'heading_text_orientation',
				),
				'toggle_slug' => 'module_heading',
			),
			'heading' => array(
				'label'           => esc_html__( 'Custom Heading', 'wc-builder-divi' ),
				'type'            => 'text',
				'default'			=> esc_html__( 'Additional information', 'woocommerce' ),
				'option_category' => 'basic_option',
				'depends_show_if'   => 'on',
				'toggle_slug' => 'module_heading',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$show_heading		= $this->props['show_heading'];
		$heading 			= $this->props['heading'];

		$this->add_classname( 'wcbd_module' );
		
		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			// only load additional_information if the product has
			$all_tabs = woocommerce_default_product_tabs();
			
			if( isset( $all_tabs['additional_information'] ) ){

				// remove the default heading
				add_filter( 'woocommerce_product_additional_information_heading', function(){
					return false;
				} );

				// add my heading
				if( $show_heading == 'on' ){
					if( $heading == '' ){
						$heading = esc_html__( 'Additional information', 'woocommerce' );
					}
					$data = "<h2 class='module_title'>". esc_html( $heading ) ."</h2>";
				}

				$data .= WCBD_INIT::content_buffer( 'woocommerce_product_additional_information_tab' );
			}
			
			return $data;			
		}

	}
}
new ET_Builder_Module_WooPro_Additional_Info;