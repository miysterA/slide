<?php

class ET_Builder_Module_WooPro_Image extends ET_Builder_Module {
	
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
		
	function init() {
		$this->name       = esc_html__( 'Woo Product Image', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_image';
		$this->vb_support = 'on';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'et_builder' ),
					'link'         => esc_html__( 'Link', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'overlay'    => esc_html__( 'Overlay', 'et_builder' ),
					'alignment'  => esc_html__( 'Alignment', 'et_builder' ),
					'width'      => array(
						'title'    => esc_html__( 'Sizing', 'et_builder' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'et_builder' ),
						'priority' => 90,
					),
					'attributes' => array(
						'title'    => esc_html__( 'Attributes', 'et_builder' ),
						'priority' => 95,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ),
				),
			),
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "%%order_class%% .et_pb_image_wrap",
							'border_styles' => "%%order_class%% .et_pb_image_wrap",
						),
					),
				),
			),
			'box_shadow'            => array(
				'default' => array(
					'css' => array(
						'main'         => '%%order_class%% .et_pb_image_wrap',
						'custom_style' => true,
					),
				),
			),
			'max_width'             => array(
				'options' => array(
					'max_width' => array(
						'depends_show_if' => 'off',
					),
				),
			),
			'fonts'                 => false,
			'text'                  => false,
			'button'                => false,
		);
	}

	function get_fields() {
		$fields = array(
			'show_in_lightbox' => array(
				'label'             => esc_html__( 'Open in Lightbox', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'default_on_front' => 'off',
				'affects'           => array(
					'use_overlay',
				),
				'toggle_slug'       => 'link',
				'description'       => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'et_builder' ),
			),
			'use_overlay' => array(
				'label'             => esc_html__( 'Image Overlay', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'off' => esc_html__( 'Off', 'et_builder' ),
					'on'  => esc_html__( 'On', 'et_builder' ),
				),
				'default_on_front' => 'off',
				'affects'           => array(
					'overlay_icon_color',
					'hover_overlay_color',
					'hover_icon',
				),
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
				'description'       => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'et_builder' ),
			),
			'overlay_icon_color' => array(
				'label'             => esc_html__( 'Overlay Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
				'description'       => esc_html__( 'Here you can define a custom color for the overlay icon', 'et_builder' ),
			),
			'hover_overlay_color' => array(
				'label'             => esc_html__( 'Hover Overlay Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
				'description'       => esc_html__( 'Here you can define a custom color for the overlay', 'et_builder' ),
			),
			'hover_icon' => array(
				'label'               => esc_html__( 'Hover Icon Picker', 'et_builder' ),
				'type'                => 'select_icon',
				'option_category'     => 'configuration',
				'default'			=> 'P',
				'class'               => array( 'et-pb-font-icon' ),
				'depends_show_if'     => 'on',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'overlay',
				'description'         => esc_html__( 'Here you can define a custom icon for the overlay', 'et_builder' ),
			),
			'show_bottom_space' => array(
				'label'             => esc_html__( 'Show Space Below The Image', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'on'      => esc_html__( 'Yes', 'et_builder' ),
					'off'     => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front' => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'margin_padding',
				'description'       => esc_html__( 'Here you can choose whether or not the image should have a space below it.', 'et_builder' ),
			),
			'align' => array(
				'label'           => esc_html__( 'Image Alignment', 'et_builder' ),
				'type'            => 'text_align',
				'option_category' => 'layout',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can choose the image alignment.', 'et_builder' ),
				'options_icon'    => 'module_align',
			),
			'force_fullwidth' => array(
				'label'             => esc_html__( 'Force Fullwidth', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'default_on_front' => 'off',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
				'affects' => array(
					'max_width',
				),
			),
			'always_center_on_mobile' => array(
				'label'             => esc_html__( 'Always Center Image On Mobile', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front' => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'alignment',
			),
		);

		return $fields;
	}

	public function get_alignment() {
		$alignment = isset( $this->props['align'] ) ? $this->props['align'] : '';

		return et_pb_get_alignment( $alignment );
	}

	function render( $attrs, $content = null, $render_slug ) {
		$show_in_lightbox        = $this->props['show_in_lightbox'];
		$show_bottom_space       = $this->props['show_bottom_space'];
		$align                   = $this->get_alignment();
		$force_fullwidth         = $this->props['force_fullwidth'];
		$always_center_on_mobile = $this->props['always_center_on_mobile'];
		$overlay_icon_color      = $this->props['overlay_icon_color'];
		$hover_overlay_color     = $this->props['hover_overlay_color'];
		$hover_icon              = $this->props['hover_icon'];
		$use_overlay             = $this->props['use_overlay'];
		$animation_style         = $this->props['animation_style'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$this->add_classname( 'wcbd_module' );
		
		if( !is_product() ){
			return;
		}
			
		$title_text = get_the_title();
		$alt = '';
		
		if( has_post_thumbnail() ){
			$src = get_the_post_thumbnail_url();
			$thumbnail_id = get_post_thumbnail_id();
			$alt = esc_attr( get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ) );
		}else{
			$src = esc_url( wc_placeholder_img_src() );
		}

		if(empty( $alt ) ){
			$alt = $title_text;
		}

		// Handle svg image behaviour
		$src_pathinfo = pathinfo( $src );
		$is_src_svg = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		// overlay can be applied only if image has link or if lightbox enabled
		$is_overlay_applied = 'on' === $use_overlay && 'on' === $show_in_lightbox  ? 'on' : 'off';

		if ( 'on' === $force_fullwidth ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%',
				'declaration' => 'max-width: 100% !important;',
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
				'declaration' => 'width: 100%;',
			) );
		}

		if ( ! $this->_is_field_default( 'align', $align ) ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%',
				'declaration' => sprintf(
					'text-align: %1$s;',
					esc_html( $align )
				),
			) );
		}

		if ( 'center' !== $align ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%',
				'declaration' => sprintf(
					'margin-%1$s: 0;',
					esc_html( $align )
				),
			) );
		}

		if ( 'on' === $is_overlay_applied ) {
			if ( '' !== $overlay_icon_color ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .et_overlay:before',
					'declaration' => sprintf(
						'color: %1$s !important;',
						esc_html( $overlay_icon_color )
					),
				) );
			}

			if ( '' !== $hover_overlay_color ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .et_overlay',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $hover_overlay_color )
					),
				) );
			}

			$data_icon = '' !== $hover_icon
				? sprintf(
					' data-icon="%1$s"',
					esc_attr( et_pb_process_font_icon( $hover_icon ) )
				)
				: '';

			$overlay_output = sprintf(
				'<span class="et_overlay%1$s"%2$s></span>',
				( '' !== $hover_icon ? ' et_pb_inline_icon' : '' ),
				$data_icon
			);
		}

		// Set display block for svg image to avoid disappearing svg image
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .et_pb_image_wrap',
				'declaration' => 'display: block;',
			) );
		}

		$output = sprintf(
			'<span class="et_pb_image_wrap"><img src="%1$s" alt="%2$s"%3$s />%4$s</span>',
			esc_attr( $src ),
			esc_attr( $alt ),
			( '' !== $title_text ? sprintf( ' title="%1$s"', esc_attr( $title_text ) ) : '' ),
			'on' === $is_overlay_applied ? $overlay_output : ''
		);

		if ( 'on' === $show_in_lightbox ) {
			$output = sprintf( '<a href="%1$s" class="et_pb_lightbox_image" title="%3$s">%2$s</a>',
				esc_attr( $src ),
				$output,
				esc_attr( $title_text )
			);
		}

		// Module classnames
		if ( ! in_array( $animation_style, array( '', 'none' ) ) ) {
			$this->add_classname( 'et-waypoint' );
		}

		if ( 'on' !== $show_bottom_space ) {
			$this->add_classname( 'et_pb_image_sticky' );
		}

		if ( 'on' === $is_overlay_applied ) {
			$this->add_classname( 'et_pb_has_overlay' );
		}

		if ( 'on' === $always_center_on_mobile ) {
			$this->add_classname( 'et_always_center_on_mobile' );
        }
        
        // add the built-in image module class
        $this->add_classname( 'et_pb_image' );

		return $output;
	}
}

new ET_Builder_Module_WooPro_Image;
