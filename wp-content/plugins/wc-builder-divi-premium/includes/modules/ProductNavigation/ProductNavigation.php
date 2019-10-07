<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Navigation extends ET_Builder_Module {

	public $vb_support = 'on';
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	function init() {
		$this->name            = esc_html__( 'Woo Product Navigation', 'wc-builder-divi' );
		$this->slug            = 'et_pb_woopro_navigation';

		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Navigation Options', 'wc-builder-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'icon_settings' => esc_html__( 'Icons Settings', 'wc-builder-divi' ),
				),
			),
		);

		$this->main_css_element = '%%order_class%%';

		$this->fields_defaults = array(
			'nav_type' 			=> array( 'links' ),
			'next_icon' 			=> array( '$' ),
			'prev_icon' 			=> array( '#' ),
			'from_same_cat' 			=> array( 'off' ),
			'nav_text_orientation' 		=> array( 'center' ),
		);

		$this->advanced_fields = array(
			'fonts' => array(
				'nav_links' => array(
					'label'    => esc_html__( 'Navigation', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} a",
					),
					'font_size' => array(
						'default' => '15px',
					),
					'line_height' => array(
						'default' => '1.3em',
					),
				),
				'nav_links_on_hover' => array(
					'label'    => esc_html__( 'On Hover', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} a:hover",
					),
					'font_size' => array(
						'default' => '15px',
					),
					'line_height' => array(
						'default' => '1.3em',
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
			'nav_links' => array(
				'label' => esc_html__( 'Navigation Links', 'wc-builder-divi' ),
				'selector' => "{$this->main_css_element} a",
			),
		);
	}

	function get_fields() {
		$fields = array(
			'nav_type' => array(
				'label' => esc_html__( 'Navigation Type', 'wc-builder-divi' ),
				'type' => 'select',
				'options_category' => 'basic_option',
				'options' => array( 
					'links'  		=> esc_html__( 'Links', 'wc-builder-divi' ),
					'icons' 		=> esc_html__( 'Icons', 'wc-builder-divi' ),
				),
				'default' => 'links',
				'affects' => array(
					'link_next_text',
					'link_prev_text',
					'next_icon',
					'prev_icon',
					'icon_background',
					'icon_hover_background',
					'icon_font_size',
				),
				'computed_affects' => array(
					'__navigation',
				),
				'toggle_slug' => 'main_content',
			),
			'link_prev_text' => array(
				'label'       => esc_html__( 'Previous Product Text', 'wc-builder-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'If you leave this empty, the product title will be used', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'depends_show_if' => 'links',
				'computed_affects' => array(
					'__navigation',
				),
			),
			'link_next_text' => array(
				'label'       => esc_html__( 'Next Product Text', 'wc-builder-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'If you leave this empty, the product title will be used', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'depends_show_if' => 'links',
				'computed_affects' => array(
					'__navigation',
				),
			),
			'prev_icon' => array(
				'label'               => esc_html__( 'Previous Icon', 'wc-builder-divi' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'default'				=> '#',
				'toggle_slug'         => 'main_content',
				'depends_show_if'     => 'icons',
				'computed_affects' => array(
					'__navigation',
				),
			),
			'next_icon' => array(
				'label'               => esc_html__( 'Next Icon', 'wc-builder-divi' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'default'				=> '$',
				'toggle_slug'         => 'main_content',
				'depends_show_if'     => 'icons',
				'computed_affects' => array(
					'__navigation',
				),
			),
			'icon_font_size' => array(
				'label'           => esc_html__( 'Icons Font Size', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'default'         => '20px',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'depends_default' => true,
				'depends_show_if'     => 'icons',
			),
			'icon_font_size_tablet' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size_phone' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size_last_edited' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_background' => array(
				'label' 			=> esc_html__( 'Icon Background', 'wc-builder-divi' ), 
				'type'        		=> 'color-alpha',
				'tab_slug'    		=> 'advanced',
				'toggle_slug' 		=> 'icon_settings',
				'depends_show_if'   => 'icons',
			),
			'icon_hover_background' => array(
				'label' 			=> esc_html__( 'Icon Hover Background', 'wc-builder-divi' ), 
				'type'        		=> 'color-alpha',
				'tab_slug'    		=> 'advanced',
				'toggle_slug' 		=> 'icon_settings',
				'depends_show_if'   => 'icons',
			),
			'from_same_cat' => array(
				'label'           => esc_html__( 'From The Same Category', 'wc-builder-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option','options' => array( 
					'off' 		=> esc_html__( 'No', 'wc-builder-divi' ),
					'on'  		=> esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug' => 'main_content',
				'computed_affects' => array(
					'__navigation',
				),
			),
			'nav_text_orientation' => array(
				'label'             => esc_html__( 'Nav Floating', 'wc-builder-divi' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'left' => esc_html__( 'left', 'wc-builder-divi' ),
					'right' => esc_html__( 'Right', 'wc-builder-divi' ),
					'center' => esc_html__( 'Center', 'wc-builder-divi' ),
					'edge_to_edge' => esc_html__( 'Edge to Edge', 'wc-builder-divi' ),
				),
				'description'       => esc_html__( 'This controls the how your text is aligned within the module.', 'wc-builder-divi' ),
				'toggle_slug' => 'main_content',
				'default'	=> 'center',
			),
			'__navigation' => array(
				'type' => 'computed',
				'computed_callback' => array( 'ET_Builder_Module_WooPro_Navigation', 'get_navigation' ),
				'computed_depends_on' => array(
					'nav_type',
					'link_next_text',
					'link_prev_text',
					'next_icon',
					'prev_icon',
					'from_same_cat',
				),
			),
		);

		return $fields;
	}

	static function get_navigation( $args = array(), $conditional_tags = array(), $current_page = array() ){

		global $product, $post;
		
		$post_id = wcbd_get_post_id_for_vb();
		if( $post_id ){
			$product 	= wc_get_product( $post_id );
			$post 		= get_post( $post_id );
		}

		$defaults = array(
			'link_next_text' 	=> '%title',
			'link_prev_text' 	=> '%title',
			'from_same_cat' 	=> 'off',
		);

		$args = wp_parse_args( $args, $defaults );

		if( !$product || !is_object( $product )){
			/**
			 * Send dummy navigation
			 */
			$next = new stdClass();
			$next->title = $args['link_next_text'] == '' ? esc_html__( 'Next Product Title', 'wc-builder-divi' ) : esc_attr( $args['link_next_text'] );
			$next->permalink = '#';

			$prev = new stdClass();
			$prev->title = $args['link_prev_text'] == '' ? esc_html__( 'Previous Product Title', 'wc-builder-divi' ) : esc_attr( $args['link_prev_text'] );
			$prev->permalink = '#';

			$posts_navigation = array(
				'next' => $next,
				'prev' => $prev,
			);

			return $posts_navigation;
		}

		$from_same_cat = ! $args['from_same_cat'] || 'off' === $args['from_same_cat'] ? false : true;

		// Get next post
		$next_post = get_next_post( $from_same_cat, '', 'product_cat' );

		$next = new stdClass();

		if ( ! empty( $next_post ) ) {

			$next_title = isset($next_post->post_title) ? esc_html( $next_post->post_title ) : esc_html__( 'Next Product', 'wc-builder-divi' );
			$next_title = '' === $args['link_next_text'] ? $next_title : esc_attr( $args['link_next_text'] );

			$next_permalink = isset($next_post->ID) ? esc_url( get_the_permalink( $next_post->ID ) ) : '';

			$next->title = $next_title;
			$next->permalink = $next_permalink;
		}

		// Get prev post
		$prev_post = get_previous_post( $from_same_cat, '', 'product_cat' );

		$prev = new stdClass();

		if ( ! empty( $prev_post ) ) {

			$prev_title = isset($prev_post->post_title) ? esc_html( $prev_post->post_title ) : esc_html__( 'Previous Product', 'wc-builder-divi' );
			$prev_title = '' === $args['link_prev_text'] ? $prev_title : esc_attr( $args['link_prev_text'] );

			$prev_permalink = isset($prev_post->ID) ? esc_url( get_the_permalink( $prev_post->ID ) ) : '';

			$prev->title = $prev_title;
			$prev->permalink = $prev_permalink;
		}		

		// Formatting returned value
		$posts_navigation = array(
			'next' => $next,
			'prev' => $prev,
		);

		return $posts_navigation;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$nav_type 					= $this->props['nav_type'];
		$link_next_text 			= $this->props['link_next_text'];
		$link_prev_text 			= $this->props['link_prev_text'];

		$next_icon 					= $this->props['next_icon'];
		$prev_icon 					= $this->props['prev_icon'];

		$icon_background 			= $this->props['icon_background'];
		$icon_hover_background 		= $this->props['icon_hover_background'];
		
		$icon_font_size 			= $this->props['icon_font_size'];
		$icon_font_size_tablet 		= $this->props['icon_font_size_tablet'];
		$icon_font_size_phone  		= $this->props['icon_font_size_phone'];
		$icon_font_size_last_edited  = $this->props['icon_font_size_last_edited'];

		$from_same_cat 				= $this->props['from_same_cat'];
		
		$nav_text_orientation 		= $this->props['nav_text_orientation'];

		$this->add_classname( 'wcbd_module' );
		
		if( function_exists( 'is_product' ) && is_product() ){
			
			$nav = self::get_navigation( array(
				'link_next_text' 	=> $link_next_text,
				'link_prev_text' 	=> $link_prev_text,
				'from_same_cat' 	=> $from_same_cat,				
			) );
			
			$next_content = $prev_content = '';

			$data = '';	
			$nav_text_orientation = esc_attr( $nav_text_orientation );

			if( !empty( $nav_text_orientation ) ){
				$this->add_classname( "et_pb_text_align_{$nav_text_orientation}" );
			}

			// links navigation
			if( $nav_type == 'links' ){

				if( !empty( $nav['next']->permalink ) && !empty( $nav['next']->title ) ){
					$next_content = "<a href='{$nav['next']->permalink}' title='{$nav['next']->title}'><span class='wcbd_nav_title'>{$nav['next']->title}</span></a>";
					
				}
				if( !empty( $nav['prev']->permalink ) && !empty( $nav['prev']->title ) ){
					$prev_content = "<a href='{$nav['prev']->permalink}' title='{$nav['prev']->title}'><span class='wcbd_nav_title'>{$nav['prev']->title}</span></a>";
				}

			}

			// links navigation
			if( $nav_type == 'icons' ){
				$this->add_classname( 'icons_nav' );

				if( !empty( $nav['next']->permalink ) && !empty( $nav['next']->title ) ){
					$next_content = "<a href='{$nav['next']->permalink}' title='{$nav['next']->title}'><span class='et-pb-icon'>" . esc_attr( et_pb_process_font_icon( $next_icon ) ) . "</span></a>";
				}
				if( !empty( $nav['prev']->permalink ) && !empty( $nav['prev']->title ) ){
					$prev_content = "<a href='{$nav['prev']->permalink}' title='{$nav['prev']->title}'><span class='et-pb-icon'>" . esc_attr( et_pb_process_font_icon( $prev_icon ) ) . "</span></a>";
				}

				$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

				$font_size_values = array(
					'desktop' => $icon_font_size,
					'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
					'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
				);

				et_pb_generate_responsive_css( $font_size_values, '%%order_class%% .et-pb-icon', 'font-size', $render_slug );

				if( !empty( $icon_background ) ){

					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => '%%order_class%% a',
						'declaration' => "background: ". esc_attr( $icon_background ) .";",
					) );
				}

				if( !empty( $icon_hover_background ) ){

					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => '%%order_class%% a:hover',
						'declaration' => "background: ". esc_attr( $icon_hover_background ) .";",
					) );
				}				

			}		

			// collecting data
			ob_start();
				?>

				<span class='wcbd_prev_product'>
					<?php echo $prev_content; ?>
				</span>

				<span class='wcbd_next_product'>
					<?php echo $next_content; ?>
				</span>
				
				<?php
			$data = ob_get_clean();
			
			return $data;			
		}

	}
}
new ET_Builder_Module_WooPro_Navigation;