<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Cover extends ET_Builder_Module {

	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);

	function init() {
		$this->name            = esc_html__( 'Woo Product Cover', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_cover';

		$this->fields_defaults = array(
			'show_title' => array( 'on' ),
			'show_breadcrumb' => array( 'off' ),
			'show_categories' => array( 'on' ),
			'cats_separator' => array( ' / ' ),
		);

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Options', 'wc-builder-divi' ),
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
				'breadcrumb'   => array(
					'label'    => esc_html__( 'Breadcrumb', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .woocommerce-breadcrumb, {$this->main_css_element} .woocommerce-breadcrumb a",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.1em',
					),
				),
				'title'   => array(
					'label'    => esc_html__( 'Title', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .product_title, body.et_extra {$this->main_css_element} .product_title",
					),
					'font_size' => array(
						'default' => '30px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
				'categories'   => array(
					'label'    => esc_html__( 'Categories', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .product_categories, {$this->main_css_element} .product_categories a",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
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
			'title' => array(
				'label'    => esc_html__( 'Product Title', 'et_builder' ),
				'selector' => "{$this->main_css_element} .product_title, body.et_extra {$this->main_css_element} .product_title",
			),
			'breadcrumb' => array(
				'label'    => esc_html__( 'Breadcrumb', 'et_builder' ),
				'selector' => "{$this->main_css_element} .woocommerce-breadcrumb",
			),
			'categories' => array(
				'label'    => esc_html__( 'Categories', 'et_builder' ),
				'selector' => "{$this->main_css_element} .product_categories",
			),
		);
	}

	function get_fields() {
		$fields = array(
			'default_bg_img' => array(
				'label' => esc_html__( 'Default Background Image', 'wc-builder-divi' ),
				'description' => esc_html__( 'This image will be used if no cover image has been chose for the product', 'wc-builder-divi' ),
				'type' => 'hidden', // for backward compatibility
				'toggle_slug' => 'main_content',
			),
			'show_breadcrumb' => array(
				'label' => esc_html__( 'Show Breadcrumb', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'show_title' => array(
				'label' => esc_html__( 'Show Title', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
			),
			'show_categories' => array(
				'label' => esc_html__( 'Show Categories', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category' => 'configuration',
				'options' => array(
					'on' => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'affects' => array(
					'cats_separator',
				),	
				'toggle_slug' => 'main_content',		
			),
			'cats_separator' => array(
				'label' => esc_html__( 'Categories Separator', 'wc-builder-divi' ),
				'description' => esc_html__( 'Default: /', 'wc-builder-divi' ),
				'type' => 'text',
				'option_category' => 'configuration',
				'depends_show_if'   => 'on',
				'toggle_slug' => 'main_content',
			),
		);

		return $fields;
	}

	function before_render(){
        if( function_exists( 'is_product' ) && is_product() ){
			$default_bg_img       = $this->props['default_bg_img'];

			global $post;
			// get cover image
			if( $cover_img = get_post_meta( $post->ID, '_product_cover_img_url', true ) ){
				$cover_img = esc_attr( $cover_img );
			}else{
				$cover_img = !empty( $default_bg_img ) ? esc_attr( $default_bg_img ) : '';
			}

            if( $cover_img ){
                $this->props['background_image'] = $cover_img;
            }            
        }
	}
	
	function render( $attrs, $content = null, $render_slug ) {
		$show_title           = $this->props['show_title'];
		$show_breadcrumb      = $this->props['show_breadcrumb'];
		$show_categories      = $this->props['show_categories'];
		$cats_separator       = $this->props['cats_separator'];

		$this->add_classname( 'wcbd_module' );
		
		if( !is_product() ){
			return;
		}
		
		global $post, $product;

		// get product title
		$title = '';
		if( $show_title == 'on' ){
			$title = WCBD_INIT::content_buffer( 'woocommerce_template_single_title' );
		}
		
		// get breadcrumb
		$breadcrumb = '';
		if( $show_breadcrumb == 'on' ){
			$breadcrumb = WCBD_INIT::content_buffer( 'woocommerce_breadcrumb' );
		}
		
		// get categories
		$categories = '';
		if( $show_categories == 'on' ){
			$sep = ' / ';
			if( !empty( $cats_separator ) ){
				$sep = esc_attr( $cats_separator );
			}

			if( version_compare( WC()->version, '3.0.0', '>=' ) ){
				$categories = wc_get_product_category_list( $post->ID, $sep, '<div class="product_categories"><span class="posted_in">', '</span></div>' );
			}else{
				$categories = $product->get_categories( $sep, '<div class="product_categories"><span class="posted_in">', '</span></div>' );
			}
		}

		ob_start(); ?>

			<div class="cover_container">
				<?php echo $breadcrumb . $title . $categories; ?>
			</div>

		<?php $content = ob_get_clean();

		return $content;
	}	
}
new ET_Builder_Module_WooPro_Cover;
