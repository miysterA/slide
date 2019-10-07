<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Images_Slider extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	function init() {
		$this->name       = esc_html__( 'Woo Product Images Slider', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_images_slider';

		$this->fields_defaults = array( 
			'hide_thumbnails' 	=> array( 'off' ),
			'disable_lightbox' 	=> array( 'off' ),
		);

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Slider Options', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'general' => esc_html__( 'General', 'wc-builder-divi' ),
				),
			),
			
		);		

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'background' => array(
				'css' => array(
					'main' => "{$this->main_css_element}",
				),
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(
				'css' => array(
					'main' => "{$this->main_css_element}",
					'important' => 'all'
				),
			),
			'fonts' => false,
			'text' => false,
		);
	}

	function get_fields() {
		$fields = array(
			'hide_thumbnails' => array(
				'label' => esc_html__( 'Hide Thumbnails', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'disable_lightbox' => array(
				'label' => esc_html__( 'Disable Lightbox', 'wc-builder-divi' ),
				'description' => esc_html__( 'Enabling this option will hide the magnifying glass over the image.', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'sale_badge_background' => array(
				'label' => esc_html__( 'Sale Badge Background', 'wc-builder-divi' ),
				'type' => 'color-alpha',
				'default' => '#ef8f61',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'general',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$hide_thumbnails      = $this->props['hide_thumbnails'];
		$disable_lightbox     = $this->props['disable_lightbox'];
		$sale_badge_background     = $this->props['sale_badge_background'];

		$this->add_classname( 'wcbd_module' );
		
		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){

			if( $hide_thumbnails == 'on' ){
				add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

				// to remove the padding and margin created by the ol
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .flex-control-thumbs',
					'declaration' => 'display:none;',
				) );
			}

			if( $disable_lightbox == 'on' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-product-gallery__trigger',
					'declaration' => 'display:none !important;',
				) );
			}

			if( !empty($sale_badge_background) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% span.onsale',
					'declaration' => 'background:'. esc_attr( $sale_badge_background ) .' !important;',
				) );
			}

			ob_start();
			/* Fix issue caused by Divi 3.2.1 */
			remove_action( 'woocommerce_before_single_product_summary', 'et_divi_output_product_wrapper', 0  );
			remove_action( 'woocommerce_after_single_product_summary', 'et_divi_output_product_wrapper_end', 0  );

			do_action( 'woocommerce_before_single_product_summary' );
			$data = ob_get_clean();

		}else{
			return '';
		}

		return $data;			
	}
}
new ET_Builder_Module_WooPro_Images_Slider;