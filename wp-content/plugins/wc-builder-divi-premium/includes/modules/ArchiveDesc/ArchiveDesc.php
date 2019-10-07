<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class Divi_WC_Builder_Module_Archive_Desc extends ET_Builder_Module {
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	function init() {
		$this->name       	= esc_html__( 'Woo Archive Description', 'divi-wc-builder' );
        $this->slug       	= 'et_pb_wcbd_archive_desc';
        $this->vb_support   = 'on';

        $this->main_css_element = '%%order_class%%';
        
		$this->advanced_fields = array(
			'fonts' => array(
				'desc'   => array(
					'label'    => esc_html__( 'Description', 'divi-wc-builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element}",
                    ),
                    'font_size' => array(
                        'default' => '14px',
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
		$output = '';
		
        if( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ){
			$tax = get_queried_object();
			$output = term_description( $tax->term_id, $tax->taxonomy );
        }
		
		return $output;			

	}
}
new Divi_WC_Builder_Module_Archive_Desc;
