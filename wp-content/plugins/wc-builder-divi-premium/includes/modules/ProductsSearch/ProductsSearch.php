<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * @since 2.1.0
  */

class Divi_WC_Builder_Module_Products_Search extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);

	function init() {
		$this->name       = esc_html__( 'Woo Products Search', 'wc-builder-divi' );
		$this->slug       = 'et_pb_wcbd_products_search';	

        $this->main_css_element = '%%order_class%%';
        
        $this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Content', 'wc-builder-divi' ),
				),
            ),
            'advanced' => array(
                'toggles' => array(
                    'misc' => esc_html__( 'Miscellaneous', 'wc-builder-divi' ),
                    'search_field_border' => esc_html__( 'Search Field Border', 'wc-builder-divi' ),
                ),
            ),
        );
        
		$this->advanced_fields = array(
			'fonts' => array(
				'search_field'   => array(
					'label'    => esc_html__( 'Search Field', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .search-field, {$this->main_css_element} .search-field::placeholder",
						'important' => 'all',
					),
					'font_size' => array(
						'default' => '20px',
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
			'borders'               => array(
				'default' => array(),
				'image'   => array(
					'css'             => array(
						'main' => array(
							'border_radii' => "%%order_class%% .search-field",
							'border_styles' => "%%order_class%% .search-field",
						)
					),
					'defaults' => array(
						'border_radii' => 'on|3|3|3|3',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#bbbbbb',
							'style' => 'solid',
						),
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'search_field_border',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Search Button', 'wc-builder-divi' ),
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
            'text' => false,
		);
		$this->custom_css_fields = array(
			'search_input' => array(
				'label' => esc_html__( 'Search Field', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .search-field",
			),
			'search_button' => array(
				'label' => esc_html__( 'Search Button', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} .button",
			),
		);
	}

	function get_fields() {
		$fields = array(
            'enable_button' => array(
                'label'           => esc_html__( 'Show Search Button', 'wc-builder-divi' ),
                'type'            => 'yes_no_button',
                'options' => array(
                    'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
                    'off' => esc_html__( 'No', 'wc-builder-divi' ),
                ),
                'default' => 'on',
                'toggle_slug'       => 'main_content',
                'affects' => array(
                    'search_button_text',
                    'fullwidth_elements',
                ),
            ),
			'search_button_text' => array(
				'label'           => esc_html__( 'Button Text', 'wc-builder-divi' ),
				'type'            => 'text',
				'default'			=> esc_html_x( 'Search', 'submit button', 'woocommerce' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text. Default is: Search, or leav empty if you want to use just an icon.', 'wc-builder-divi' ),
                'toggle_slug'       => 'main_content',
                'dependes_show_if' => 'on',
			),
			'search_field_placeholder' => array(
				'label'           => esc_html__( 'Search Field Placeholder', 'wc-builder-divi' ),
				'type'            => 'text',
				'default'			=> esc_attr__( 'Search products...', 'wc-builder-divi' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Search input placeholder.', 'wc-builder-divi' ),
				'toggle_slug'       => 'main_content',
            ),
			'fullwidth_elements' => array(
				'label'           => esc_html__( 'Full-width Elements', 'wc-builder-divi' ),
                'type'            => 'yes_no_button',
                'options' => array(
                    'off' => esc_html__( 'No', 'wc-builder-divi' ),
                    'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
                ),
				'default'			=> 'off',
				'description'     => esc_html__( 'If you enable this, both the search field and the button will be full-width.', 'wc-builder-divi' ),
                'tab_slug'       => 'advanced',
                'toggle_slug'       => 'misc',
                'depends_show_if' => 'on',
            ),
            'search_field_bg' => array(
                'label' => esc_html__( 'Search Field Background', 'wc-divi-builder' ),
                'type' => 'color-alpha',
                'default' => '#ffffff',
                'tab_slug' => 'advanced',
                'toggle_slug'       => 'misc',
            )
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
        $enable_button              = $this->props['enable_button'];
        $search_button_text         = $this->props['search_button_text'];
        $search_field_placeholder   = $this->props['search_field_placeholder'];
        $fullwidth_elements         = $this->props['fullwidth_elements'];
        $search_field_bg            = $this->props['search_field_bg'];

        $custom_button  			= $this->props['custom_button'];
        $button_bg_color  			= $this->props['button_bg_color'];
        $button_use_icon  			= $this->props['button_use_icon'];
		$button_icon 				= $this->props['button_icon'];
		$button_icon_placement 		= $this->props['button_icon_placement'];

		$this->add_classname( 'wcbd_module' );
		
        /* button html */
        $button_html = '';
        if( $enable_button == 'on' ){

            if( $fullwidth_elements == 'on' ){
                $this->add_classname( 'fullwidth-elements' );
            }

            $button_text = esc_attr( $search_button_text );
            $button_html = "<button type='submit' class='button'>". esc_attr( $search_button_text ) ."</button>";

            // button icon and background
            if( $custom_button == 'on' ){

                // button icon
                if( $button_icon !== '' ){
                    $iconContent = WCBD_INIT::et_icon_css_content( esc_attr($button_icon) );

                    $iconSelector = '';
                    if( $button_icon_placement == 'right' ){
                        $iconSelector = '%%order_class%% .button:after';
                    }elseif( $button_icon_placement == 'left' ){
                        $iconSelector = '%%order_class%% .button:before';
                    }

                    if( !empty( $iconContent ) && !empty( $iconSelector ) ){
                        ET_Builder_Element::set_style( $render_slug, array(
                            'selector' => $iconSelector,
                            'declaration' => "content: '{$iconContent}'!important;font-family:ETmodules!important;"
                            )
                        );					
                    }						
				}
				
				// fix the button padding if has no icon
				if( $button_use_icon == 'off' ){
					ET_Builder_Element::set_style( $render_slug, array(
						'selector' => 'body.woocommerce %%order_class%% .button',
						'declaration' => "padding: 0.3em 1em!important"
						)
					);
				}

                // button background
                if( !empty( $button_bg_color ) ){
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => 'body #page-container %%order_class%% .button',
                        'declaration' => "background-color:". esc_attr( $button_bg_color ) ."!important;",
                    ) );
                }
            }
        }else{
            $this->add_classname( 'no-button' );
        }

        // search field bg
        if( !empty( $search_field_bg ) ){
            ET_Builder_Element::set_style( $render_slug, array(
                'selector' => '%%order_class%% .search-field',
                'declaration' => "background:". esc_attr( $search_field_bg ) ."!important;"
                )
            );
        }

        $output = "
            <form role='search' method='get' action='". esc_url( home_url( '/' ) ) ."'>
                <input type='search' class='search-field' placeholder='". esc_attr( $search_field_placeholder )."' value='". get_search_query() ."' name='s' />
                {$button_html}
                <input type='hidden' name='post_type' value='product' />
            </form>
        ";
        
        return $output;
	}
}
new Divi_WC_Builder_Module_Products_Search;
