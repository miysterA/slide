<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Rating extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);	
	function init() {
		$this->name            = esc_html__( 'Woo Product Rating', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_rating';

		$this->settings_modal_toggles = array(

			'advanced' => array(
				'toggles' => array(
					'misc'	=> esc_html__( 'Miscellaneous', 'wc-builder-divi' ),
				),
			),
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Content', 'wc-builder-divi' ),
				)
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'reviews_count'   => array(
					'label'    => esc_html__( 'Rating', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-product-rating, {$this->main_css_element} .woocommerce-product-rating a.woocommerce-review-link",
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
		);	
	}

	function get_fields() {
		$fields = array(
			'rating_placeholder' => array(
				'label' => esc_html__( 'Placeholder', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'description' => esc_html__( 'Activating this will add gray stars as a placeholder if the product has no rating', 'wc-builder-divi' ),
				'options' => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'affects' => array(
					'placeholder_stars_color',
				),
				'tab_slug' => 'general',
				'toggle_slug' => 'main_content',
			),
			'placeholder_stars_color' => array(
				'label'             => esc_html__( 'Placeholder Stars Color', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'default' => '#d3ced2',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
				'depends_show_if' => 'on',
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
		$rating_placeholder      = $this->props['rating_placeholder'];
		$placeholder_stars_color      = $this->props['placeholder_stars_color'];
		$stars_color      = $this->props['stars_color'];
		
		$this->add_classname( 'wcbd_module' );

		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			$data = WCBD_INIT::content_buffer( 'woocommerce_template_single_rating' );

			// placeholder
			if( $data == '' && $rating_placeholder == 'on' ){
				$data = '<div class="woocommerce-product-rating placeholder"><a href="#reviews"><div class="star-rating"></div></a></div>';

				if( !empty( $placeholder_stars_color ) ){

					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .placeholder .star-rating:before',
						'declaration' => "color: ". esc_attr( $placeholder_stars_color ) ."!important;",
					) );
				}
			}
		}

		if( $data == '' ){
			return $data;
		}else{

			if( !empty( $stars_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before',
					'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
				) );
			}

			return $data;			
		}
	}
}
new ET_Builder_Module_WooPro_Rating;