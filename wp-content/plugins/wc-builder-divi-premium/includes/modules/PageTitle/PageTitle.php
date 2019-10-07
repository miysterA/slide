<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class Divi_WC_Builder_Module_Page_Title extends ET_Builder_Module {
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);

	function init() {
		$this->name       	= esc_html__( 'Woo Page Title', 'divi-wc-builder' );
        $this->slug       	= 'et_pb_wcbd_page_title';
        $this->vb_support   = 'on';

        $this->main_css_element = '%%order_class%%';
        
        $this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'general' => esc_html__( 'General', 'wc-builder-divi' ),
				),
			),
			
        );

        $this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Title', 'wc-builder-divi' ),
				'selector' => '%%order_class%% .woo-page-title',
			),
        );
        
		$this->advanced_fields = array(
			'fonts' => array(
				'title'   => array(
					'label'    => esc_html__( 'Title', 'divi-wc-builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woo-page-title, body.et_extra {$this->main_css_element} .woo-page-title",
						),
						'font_size' => array(
								'default' => '20px',
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

	function get_fields() {
		$fields = array(
			'heading_level' => array(
				'label'           => esc_html__( 'Heading Level', 'divi-wc-builder' ),
				'type'            => 'select',
				'options'         => array(
					'h1'   => 'H1',
					'h2'  => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
                ),
                'default' => 'h1',
				'option_category' => 'configuration',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'general',
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$this->add_classname( 'wcbd_module' );

		$headings = array( 'h1', 'h2', 'h3', 'h4', 'h5','h6' );
		$title = get_the_title();

		// taxonomies
		if( function_exists( 'woocommerce_page_title' ) && woocommerce_page_title( false ) ){
			$title = woocommerce_page_title( false ); // false to return,  not echo
		}
		
		if( in_array( $this->props['heading_level'], $headings ) ){
				$tag = esc_attr( $this->props['heading_level'] );
				$output = "<$tag class='woo-page-title'>" . $title . "</$tag>";
		}

		return $output;			

	}
}
new Divi_WC_Builder_Module_Page_Title;
