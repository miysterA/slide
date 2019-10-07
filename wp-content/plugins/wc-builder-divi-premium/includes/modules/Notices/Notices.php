<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Notices extends ET_Builder_Module {

	public $vb_support = 'on';
	
	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);

	function init() {
		$this->name       = esc_html__( 'Woo Notices', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_notices';

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'notice_text'   => array(
					'label'    => esc_html__( 'Notice', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce {$this->main_css_element} .woocommerce-message, body.woocommerce {$this->main_css_element} .woocommerce-error, body.woocommerce {$this->main_css_element} .woocommerce-info, body.et_pb_pagebuilder_layout {$this->main_css_element} .woocommerce-message, body.et_pb_pagebuilder_layout {$this->main_css_element} .woocommerce-error, body.et_pb_pagebuilder_layout {$this->main_css_element} .woocommerce-info",
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1.1em',
					),
				),
			),
			'box_shadow'            => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%'
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => "body.woocommerce {$this->main_css_element}, body.et_pb_pagebuilder_layout {$this->main_css_element}",
					'important' => 'all',
				),
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(
				'css' => array(
					'main' => "body.woocommerce {$this->main_css_element}, body.et_pb_pagebuilder_layout {$this->main_css_element}",
					'important' => 'all'
				),
			),
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Notice Button', 'wc-builder-divi' ),
					'css' => array(
						'main' => "{$this->main_css_element} .button",
						'important' => 'all',
					),
					'box_shadow'  => array(
						'css' => array(
							'main' => 'body #page-container %%order_class%% .button, body #page-container-bfb %%order_class%% .button',
						),
					),
				),
			),
		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$custom_icon          = $this->props['button_icon'];
		$button_use_icon          	= $this->props['button_use_icon'];
		$button_custom        = $this->props['custom_button'];
		$button_icon_placement 		= $this->props['button_icon_placement'];
		$button_bg_color      = $this->props['button_bg_color'];

		//$data = WCBD_INIT::content_buffer( 'wc_print_notices' );

		$this->add_classname( 'wcbd_module' );
		
		$data = WCBD_INIT::$notices;

		if( $data == '' ){

			// in case Divi 3.1+ the module wrapper will be outputed no matter what
			$this->add_classname('no_content');			
			return '';
		}else{

			if( $button_custom == 'on' ){						
					
				if( $button_use_icon == 'on' && $custom_icon != '' ){
					$IconContent = WCBD_INIT::et_icon_css_content( esc_attr($custom_icon) );

					$IconSelector = '';
					if( $button_icon_placement == 'right' ){
						$IconSelector = '%%order_class%% .button:after';
					}elseif( $button_icon_placement == 'left' ){
						$IconSelector = '%%order_class%% .button:before';
					}

					if( !empty( $IconContent ) && !empty( $IconSelector ) ){
						ET_Builder_Element::set_style( $render_slug, array(
							'selector' => $IconSelector,
							'declaration' => "content: '{$IconContent}'!important;font-family:ETmodules!important;"
							)
						);
						// extra theme
						if( $button_icon_placement == 'right' ){
							ET_Builder_Element::set_style( $render_slug, array(
								'selector'    => 'body #page-container %%order_class%% .button:hover',
								'declaration' => "padding-right: 2em; padding-left:.7em;",
							) );				
						}		
					}					
				}else{
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => 'body #page-container %%order_class%% .button:hover',
						'declaration' => "padding-right:1em; padding-left:1em;",
					) );
				}

				if( !empty( $button_bg_color ) ){

					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => 'body #page-container %%order_class%% .button',
						'declaration' => "background:". esc_attr( $button_bg_color ) ."!important;",
					) );
				}
	
			}

			return $data;			
		}

	}
}
new ET_Builder_Module_WooPro_Notices;
