<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Tabs extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	public static $tabs_to_remove = array();
	public static function remove_tabs( $tabs ){
		if( count( self::$tabs_to_remove ) ){

			foreach( self::$tabs_to_remove as $tab ){
				unset( $tabs[$tab] );
			}
		}
		return $tabs;
	}
	function init() {
		$this->name             = esc_html__( 'Woo Product Tabs', 'wc-builder-divi' );
		$this->slug             = 'et_pb_woopro_tabs';
		$this->post_types 		= apply_filters( 'woo_tabs_module_post_types', array( 'page', 'project' ) ); // this will remove the module from the product description builder

		$this->fields_defaults = array( 
			'show_desc' 					=> array( 'on' ),
			'show_add_info' 				=> array( 'on' ),
			'show_reviews' 					=> array( 'on' ),
			'remove_default_style' 			=> array( 'off' ),
			'tabs_head_text_orientation' 	=> array( 'left' ),
		);

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Module Options', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'misc'	=> esc_html__( 'Colors', 'wc-builder-divi' ),
					'tabs_labels'	=> esc_html__( 'Tabs Headers', 'wc-builder-divi' ),
					'active_tab_label'	=> esc_html__( 'Active Tab Header', 'wc-builder-divi' ),
					'hover_tab_label'	=> esc_html__( 'Hover Tab Header', 'wc-builder-divi' ),
					'text' => array(
						'title'    => esc_html__( 'Product Description', 'et_builder' ),
						'priority' => 45,
						'tabbed_subtoggles' => true,
						'bb_icons_support' => true,
						'sub_toggles' => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
							'ul'    => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol'    => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
					),
					'header' => array(
						'title'    => esc_html__( 'Product Description Heading', 'et_builder' ),
						'priority' => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles' => array(
							'h1' => array(
								'name' => 'H1',
								'icon' => 'text-h1',
							),
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h4' => array(
								'name' => 'H4',
								'icon' => 'text-h4',
							),
							'h5' => array(
								'name' => 'H5',
								'icon' => 'text-h5',
							),
							'h6' => array(
								'name' => 'H6',
								'icon' => 'text-h6',
							),
						),
					),
					'width' => array(
						'title'    => esc_html__( 'Sizing', 'et_builder' ),
						'priority' => 65,
					),
				),
			),
			
		);

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'header'   => array(
					'label'    => esc_html__( 'Tabs Header', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header,
							body.et-fb %%order_class%% div.woocommerce div.product .woocommerce-tabs ul.tabs li a",

						'color' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header .title,
							body.woocommerce div.product %%order_class%% .extra-woocommerce-details-accordion .ui-accordion-header-icon:before, 
							body.woocommerce-page div.product %%order_class%% .extra-woocommerce-details-accordion .ui-accordion-header-icon:before,
							body.et-fb %%order_class%% div.woocommerce div.product .woocommerce-tabs ul.tabs li a,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header .title,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .ui-accordion-header-icon:before",
						
					),
					'font_size' => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
					'important' => array(),
					'toggle_slug' => 'tabs_labels',
				),
				'active_tab'   => array(
					'label'    => esc_html__( 'Active Tab Header', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header.ui-accordion-header-active span::before, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title,							
							body.et-fb %%order_class%% div.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, 
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active span::before, 
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title",

						'color' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header.ui-accordion-header-active span::before, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title,
							body.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active .ui-accordion-header-icon:before, 
							body.woocommerce-page div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active .ui-accordion-header-icon:before,
							body.et-fb %%order_class%% div.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active span::before, 
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header.ui-accordion-header-active .ui-accordion-header-icon:before",

						'important' => 'all',
					),
					'font_size' => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
					'toggle_slug' => 'active_tab_label',
				),
				'tab_header_hover'   => array(
					'label'    => esc_html__( 'Tab Header Hover', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
							body.woo_product_divi_layout %%order_class%% .extra-woocommerce-details-accordion .header:hover,
							body.et-fb %%order_class%% div.woocommerce div.product .extra-woocommerce-details-accordion .header:hover,
							body.et-fb %%order_class%% div.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover",
						'important' => "all",
						
					),
					'font_size' => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
					'toggle_slug' => 'hover_tab_label',
				),
				'text'   => array(
					'label'    => esc_html__( 'Text', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description p",
					),
					'line_height' => array(
						'default' => floatval( et_get_option( 'body_font_height', '1.7' ) ) . 'em',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'p',
					'hide_text_align' => true,
				),
				'link'   => array(
					'label'    => esc_html__( 'Link', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description a",
						'color' => "%%order_class%% .woocommerce-Tabs-panel--description a",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'a',
				),
				'ul'   => array(
					'label'    => esc_html__( 'Unordered List', 'et_builder' ),
					'css'      => array(
						'main'        => "%%order_class%% .woocommerce-Tabs-panel--description ul",
						'color'       => "%%order_class%% .woocommerce-Tabs-panel--description ul",
						'line_height' => "%%order_class%% .woocommerce-Tabs-panel--description ul li",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'ul',
				),
				'ol'   => array(
					'label'    => esc_html__( 'Ordered List', 'et_builder' ),
					'css'      => array(
						'main'        => "%%order_class%% .woocommerce-Tabs-panel--description ol",
						'color'       => "%%order_class%% .woocommerce-Tabs-panel--description ol",
						'line_height' => "%%order_class%% .woocommerce-Tabs-panel--description ol li",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'ol',
				),
				'quote'   => array(
					'label'    => esc_html__( 'Blockquote', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description blockquote, %%order_class%% .woocommerce-Tabs-panel--description blockquote p",
						'color' => "%%order_class%% .woocommerce-Tabs-panel--description blockquote, %%order_class%% .woocommerce-Tabs-panel--description blockquote p",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'quote',
				),
				'header_1'   => array(
					'label'    => esc_html__( 'Heading', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h1",
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h1',
				),
				'header_2'   => array(
					'label'    => esc_html__( 'Heading 2', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h2",
					),
					'font_size' => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h2',
				),
				'header_3'   => array(
					'label'    => esc_html__( 'Heading 3', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h3",
					),
					'font_size' => array(
						'default' => '22px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h3',
				),
				'header_4'   => array(
					'label'    => esc_html__( 'Heading 4', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h4",
					),
					'font_size' => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h4',
				),
				'header_5'   => array(
					'label'    => esc_html__( 'Heading 5', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h5",
					),
					'font_size' => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h5',
				),
				'header_6'   => array(
					'label'    => esc_html__( 'Heading 6', 'et_builder' ),
					'css'      => array(
						'main' => "%%order_class%% .woocommerce-Tabs-panel--description h6",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h6',
				),
				'attribute_name' => array(
					'label'    => esc_html__( 'Attribute Name', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "%%order_class%% table.shop_attributes th",
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
						'main' => "%%order_class%% table.shop_attributes td p, %%order_class%% table.shop_attributes td a",
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
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Submit Review Button', 'wc-builder-divi' ),
					'css' => array(
						'main' => "%%order_class%% #review_form #respond .form-submit input",
					),
					'box_shadow' => array(
						'css' => array(
							'main' =>  "%%order_class%% #review_form #respond .form-submit input",
						),
					),
				),
			),
		);

		$this->custom_css_fields = array(
			'header' => array(
				'label' => esc_html__( 'Tabs Headers', 'wc-builder-divi' ),
				'selector' => "body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a, body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a, .woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header",
			),
			'active_tab' => array(
				'label' => esc_html__( 'Active Tab Header', 'wc-builder-divi' ),
				'selector' => "
					body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a,
					body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a,
					.woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title",
			),
			'hover_tab' => array(
				'label' => esc_html__( 'On Tabs Headers Hover', 'wc-builder-divi' ),
				'selector' => "
					body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
					body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
					.woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header:hover",
			),
		);
	}

	function get_fields() {
		$fields = array(
			'show_desc' => array(
				'label' => esc_html__( 'Show Description', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'default' => 'on',
				'toggle_slug' => 'main_content',
			),
			'show_add_info' => array(
				'label' => esc_html__( 'Show Additional Info.', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'default' => 'on',
				'toggle_slug' => 'main_content',
			),
			'show_reviews' => array(
				'label' => esc_html__( 'Show Reviews', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'options_category' => 'configuration',
				'options' => array( 
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'default' => 'on',
				'toggle_slug' => 'main_content',
			),
			'remove_default_style' => array(
				'label' => esc_html__( 'Remove Default Style', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'description' => esc_html__( 'This will remove borders and heading background FOR Divi Theme ONLY', 'wc-builder-divi' ),
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'default' => 'off',
				'toggle_slug' => 'main_content',
			),
			'remove_tabs_labels' => array(
				'label' => esc_html__( 'Remove Tabs Title', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'description' => esc_html__( 'Inside each tab content, there is a title like Description, Additional Information ...', 'wc-builder-divi' ),
				'options_category' => 'configuration',
				'options' => array( 
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'default' => 'off',
				'toggle_slug' => 'main_content',
			),
			'stars_color' => array(
				'label'             => esc_html__( 'Reviews Stars Color', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'default' => '#2ea3f2',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
			'tab_label_bg' => array(
				'label'             => esc_html__( 'Tab Background', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'default' => '#ffffff',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
			'active_tab_label_bg' => array(
				'label'             => esc_html__( 'Active Tab Background', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'default' => '#ffffff',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
			'hover_tab_label_bg' => array(
				'label'             => esc_html__( 'Hover Tab Background', 'wc-builder-divi' ),
				'type'     => 'color-alpha',
				'default' => '#ffffff',
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
			'tabs_head_text_orientation' => array(
				'label'             => esc_html__( 'Tabs Headers Orientation', 'wc-builder-divi' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => et_builder_get_text_orientation_options(),
				'description'       => esc_html__( 'This controls how your tabs headings are aligned within the module.', 'wc-builder-divi' ),
				'tab_slug' => 'advanced',
				'toggle_slug' => 'misc',
			),
			'ul_type' => array(
				'label'             => esc_html__( 'Unordered List Style Type', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'disc'    => esc_html__( 'Disc', 'et_builder' ),
					'circle'  => esc_html__( 'Circle', 'et_builder' ),
					'square'  => esc_html__( 'Square', 'et_builder' ),
					'none'    => esc_html__( 'None', 'et_builder' ),
				),
				'priority'          => 80,
				'default'           => 'disc',
				'default_on_front' => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'sub_toggle'        => 'ul',
			),
			'ul_position' => array(
				'label'             => esc_html__( 'Unordered List Style Position', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'outside' => esc_html__( 'Outside', 'et_builder' ),
					'inside'  => esc_html__( 'Inside', 'et_builder' ),
				),
				'priority'          => 85,
				'default'           => 'outside',
				'default_on_front' => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'sub_toggle'        => 'ul',
			),
			'ul_item_indent' => array(
				'label'           => esc_html__( 'Unordered List Item Indent', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text',
				'sub_toggle'      => 'ul',
				'priority'        => 90,
				'default'         => '0px',
				'default_on_front' => '',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
			),
			'ol_type' => array(
				'label'             => esc_html__( 'Ordered List Style Type', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'decimal'              => 'decimal',
					'armenian'             => 'armenian',
					'cjk-ideographic'      => 'cjk-ideographic',
					'decimal-leading-zero' => 'decimal-leading-zero',
					'georgian'             => 'georgian',
					'hebrew'               => 'hebrew',
					'hiragana'             => 'hiragana',
					'hiragana-iroha'       => 'hiragana-iroha',
					'katakana'             => 'katakana',
					'katakana-iroha'       => 'katakana-iroha',
					'lower-alpha'          => 'lower-alpha',
					'lower-greek'          => 'lower-greek',
					'lower-latin'          => 'lower-latin',
					'lower-roman'          => 'lower-roman',
					'upper-alpha'          => 'upper-alpha',
					'upper-greek'          => 'upper-greek',
					'upper-latin'          => 'upper-latin',
					'upper-roman'          => 'upper-roman',
					'none'                 => 'none',
				),
				'priority'          => 80,
				'default'           => 'decimal',
				'default_on_front' => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'sub_toggle'        => 'ol',
			),
			'ol_position' => array(
				'label'             => esc_html__( 'Ordered List Style Position', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'outside' => esc_html__( 'Outside', 'et_builder' ),
					'inside'  => esc_html__( 'Inside', 'et_builder' ),
				),
				'priority'          => 85,
				'default'           => 'outside',
				'default_on_front' => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'sub_toggle'        => 'ol',
			),
			'ol_item_indent' => array(
				'label'           => esc_html__( 'Ordered List Item Indent', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text',
				'sub_toggle'      => 'ol',
				'priority'        => 90,
				'default'         => '0px',
				'default_on_front' => '',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
			),
			'quote_border_weight' => array(
				'label'           => esc_html__( 'Blockquote Border Weight', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text',
				'sub_toggle'      => 'quote',
				'priority'        => 85,
				'default'         => '5px',
				'default_unit'    => 'px',
				'default_on_front' => '',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
			),
			'quote_border_color' => array(
				'label'           => esc_html__( 'Blockquote Border Color', 'et_builder' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text',
				'sub_toggle'      => 'quote',
				'field_template'  => 'color-alpha',
				'priority'        => 90,
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$show_desc						= $this->props['show_desc'];
		$show_add_info					= $this->props['show_add_info'];
		$show_reviews					= $this->props['show_reviews'];
		$remove_default_style			= $this->props['remove_default_style'];
		$remove_tabs_labels				= $this->props['remove_tabs_labels'];
		$tabs_head_text_orientation		= $this->props['tabs_head_text_orientation'];

		$stars_color      				= $this->props['stars_color'];
		$tab_label_bg      				= $this->props['tab_label_bg'];
		$active_tab_label_bg      		= $this->props['active_tab_label_bg'];
		$hover_tab_label_bg      		= $this->props['hover_tab_label_bg'];

		$button_bg_color       			= $this->props['button_bg_color'];

		$ul_type              = $this->props['ul_type'];
		$ul_position          = $this->props['ul_position'];
		$ul_item_indent       = $this->props['ul_item_indent'];
		$ol_type              = $this->props['ol_type'];
		$ol_position          = $this->props['ol_position'];
		$ol_item_indent       = $this->props['ol_item_indent'];
		$quote_border_weight  = $this->props['quote_border_weight'];
		$quote_border_color   = $this->props['quote_border_color'];

		$this->add_classname( 'wcbd_module' );
		
		$data = '';
		if( function_exists( 'is_product' ) && is_product() ){
			
			// check if the content has the tabs module
			global $post;

			if( has_shortcode( $post->post_content, 'et_pb_woopro_tabs' ) ){
				return;
			}

			$tabs_head_text_orientation != '' ? $this->add_classname('tabs-head-' . esc_attr( $tabs_head_text_orientation ) ) : '';
			$remove_default_style == 'on' ?  $this->add_classname('remove-default-style') : '';

			if( $show_desc == 'off' ){
				self::$tabs_to_remove[] = 'description';
			}

			if( $show_add_info == 'off' ){
				self::$tabs_to_remove[] = 'additional_information';
			}

			if( $show_reviews == 'off' ){
				self::$tabs_to_remove[] = 'reviews';
			}

			add_filter( 'woocommerce_product_tabs', array( $this, 'remove_tabs' ), 98 );

			$data = WCBD_INIT::content_buffer( 'woocommerce_output_product_data_tabs' );

			if( $remove_tabs_labels == 'on' ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-Tabs-panel--description > h2, %%order_class%% .woocommerce-Tabs-panel--additional_information > h2, %%order_class%% .woocommerce-Reviews-title',
					'declaration' => "display:none !important;",
				) );
			}

			if( !empty( $stars_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce %%order_class%% .star-rating span:before, body.woocommerce-page %%order_class%% .star-rating span:before, body.woocommerce %%order_class%% p.stars a',
					'declaration' => "color: ". esc_attr( $stars_color ) ."!important;",
				) );
			}

			if( !empty( $tab_label_bg ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a, body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a, .woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header',
					'declaration' => "background-color: ". esc_attr( $tab_label_bg ) ."!important;",
				) );
			}

			if( !empty( $active_tab_label_bg ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li.active a, .woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header.ui-accordion-header-active span::before, .woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header.ui-accordion-header-active .title',
					'declaration' => "background-color: ". esc_attr( $active_tab_label_bg ) ."!important;",
				) );
			}

			if( !empty( $hover_tab_label_bg ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body.woocommerce div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
							body.woocommerce #content-area div.product %%order_class%% .woocommerce-tabs ul.tabs li a:hover, 
							.woo_product_divi_layout .et_pb_woopro_tabs .extra-woocommerce-details-accordion .header:hover',
					'declaration' => "background-color: ". esc_attr( $hover_tab_label_bg ) ."!important;",
				) );
			}
			
			if( !empty( $button_bg_color ) ){

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => 'body #page-container %%order_class%% #review_form #respond .form-submit input',
					'declaration' => "background:". esc_attr( $button_bg_color ) ."!important;",
				) );
			}

			if ( '' !== $ul_type || '' !== $ul_position || '' !== $ul_item_indent ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-Tabs-panel--description ul',
					'declaration' => sprintf(
						'%1$s
						%2$s
						%3$s',
						'' !== $ul_type ? sprintf( 'list-style-type: %1$s !important;', esc_html( $ul_type ) ) : '',
						'' !== $ul_position ? sprintf( 'list-style-position: %1$s !important;', esc_html( $ul_position ) ) : '',
						'' !== $ul_item_indent ? sprintf( 'padding-left: %1$s !important;', esc_html( $ul_item_indent ) ) : ''
					),
				) );
			}

			if ( '' !== $ol_type || '' !== $ol_position || '' !== $ol_item_indent ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-Tabs-panel--description ol',
					'declaration' => sprintf(
						'%1$s
						%2$s
						%3$s',
						'' !== $ol_type ? sprintf( 'list-style-type: %1$s !important;', esc_html( $ol_type ) ) : '',
						'' !== $ol_position ? sprintf( 'list-style-position: %1$s !important;', esc_html( $ol_position ) ) : '',
						'' !== $ol_item_indent ? sprintf( 'padding-left: %1$s !important;', esc_html( $ol_item_indent ) ) : ''
					),
				) );
			}

			if ( '' !== $quote_border_weight || '' !== $quote_border_color ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .woocommerce-Tabs-panel--description blockquote',
					'declaration' => sprintf(
						'%1$s
						%2$s',
						'' !== $quote_border_weight ? sprintf( 'border-width: %1$s;', esc_html( $quote_border_weight ) ) : '',
						'' !== $quote_border_color ? sprintf( 'border-color: %1$s;', esc_html( $quote_border_color ) ) : ''
					),
				) );
			}


			return $data;			
		}

	}
}
new ET_Builder_Module_WooPro_Tabs;