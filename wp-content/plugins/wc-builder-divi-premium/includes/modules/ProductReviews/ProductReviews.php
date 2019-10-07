<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Reviews extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
		
	function init() {
		$this->name            = esc_html__( 'Woo Product Reviews', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_reviews';

		$this->fields_defaults = array(
			'show_heading' => array( 'on' ),
		);

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'module_heading' => esc_html__( 'Module Heading', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'misc'	=> esc_html__( 'Miscellaneous', 'wc-builder-divi' ),
				),
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Heading', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-Reviews-title, body.et_extra {$this->main_css_element} .woocommerce-Reviews-title",
					),
					'font_size' => array(
						'default' => '26px',
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
					'label' => esc_html__( 'Submit Button', 'wc-builder-divi' ),
					'css' => array(
						'main' => "%%order_class%% #review_form #respond .form-submit [name='submit']",
					),
					'box_shadow'  => array(
						'css' => array(
							'main' => "%%order_class%% #review_form #respond .form-submit [name='submit']",
						),
					),
				),
			),
		);

		$this->custom_css_fields = array(
			'header' => array(
				'label' => esc_html__( 'Heading', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .woocommerce-Reviews-title",
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
			'stars_color' => array(
				'label'             => esc_html__( 'Stars Color', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'toggle_slug' => 'misc',
				'tab_slug' => 'advanced',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$stars_color      				= $this->props['stars_color'];
		$show_heading     				= $this->props['show_heading'];
		$button_bg_color       			= $this->props['button_bg_color'];

		$this->add_classname( 'wcbd_module' );
		
		$data = '';
		if( function_exists( 'is_product' ) && is_product() && comments_open( get_the_ID() ) ){
			$data = WCBD_INIT::content_buffer( 'comments_template' );

			if( !empty( $stars_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before, body.woocommerce %%order_class%% p.stars a',
					'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
				) );
			}

			if( !empty( $button_bg_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body #page-container %%order_class%% #review_form #respond .form-submit input',
					'declaration' => "background:". esc_attr( $button_bg_color ) ."!important;",
				) );
			}

			if( $show_heading == 'off' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-Reviews-title',
					'declaration' => "display: none !important;",
				) );
			}
			
			return $data;			
		}
	}
}
new ET_Builder_Module_WooPro_Reviews;