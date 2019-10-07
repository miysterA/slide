<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class ET_Builder_Module_WooPro_Gallery extends ET_Builder_Module {

	public $vb_support = 'on';

    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
		
	function init() {
		$this->name       = esc_html__( 'Woo Product Gallery', 'wc-builder-divi' );
		$this->slug       = 'et_pb_woopro_gallery';

		$this->fields_defaults = array(
			'inc_pro_img'			 => array( 'off' ),
			'fullwidth'              => array( 'off' ),
			'posts_number'           => array( 4, 'add_default_setting' ),
			'show_title_and_caption' => array( 'on' ),
			'show_pagination'        => array( 'on' ),
			'auto'                   => array( 'off' ),
			'auto_speed'             => array( '7000' ),
			'orientation'            => array( 'landscape' ),
		);

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Images', 'et_builder' ),
					'elements'     => esc_html__( 'Elements', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'  => esc_html__( 'Layout', 'et_builder' ),
					'overlay' => esc_html__( 'Overlay', 'et_builder' ),
					'text'    => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'et_builder' ),
						'priority' => 90,
					),
				),
			),
		);		

		$this->main_css_element = '%%order_class%%';
		$this->advanced_fields = array(
			'fonts' => array(
				'caption' => array(
					'label'    => esc_html__( 'Caption', 'wc-builder-divi' ),
					'use_all_caps' => true,
					'css'      => array(
						'main' => "{$this->main_css_element} .mfp-title, {$this->main_css_element} .et_pb_gallery_caption",
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1.7em',
					),
				),
				'title'   => array(
					'label'    => esc_html__( 'Title', 'wc-builder-divi' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .et_pb_gallery_item h3",
					),
					'font_size' => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1em',
					),
				),
			),
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .et_pb_gallery_item",
							'border_styles' => "{$this->main_css_element} .et_pb_gallery_item",
						),
					),
				),
				'image' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .et_pb_gallery_image",
							'border_styles' => "{$this->main_css_element} .et_pb_gallery_image",
						)
					),
					'label_prefix'    => esc_html__( 'Image', 'et_builder' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image',
					'depends_on'      => array( 'fullwidth' ),
					'depends_show_if' => 'off',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
		);

		$this->custom_css_fields = array(
			'gallery_item' => array(
				'label'    => esc_html__( 'Gallery Item', 'wc-builder-divi' ),
				'selector' => '.et_pb_gallery_item',
			),
			'overlay' => array(
				'label'    => esc_html__( 'Overlay', 'wc-builder-divi' ),
				'selector' => '.et_overlay',
			),
			'overlay_icon' => array(
				'label'    => esc_html__( 'Overlay Icon', 'wc-builder-divi' ),
				'selector' => '.et_overlay:before',
			),
			'gallery_item_title' => array(
				'label'    => esc_html__( 'Gallery Item Title', 'wc-builder-divi' ),
				'selector' => '.et_pb_gallery_title',
			),
			'gallery_item_caption' => array(
				'label'    => esc_html__( 'Gallery Item Caption', 'wc-builder-divi' ),
				'selector' => '.et_pb_gallery_caption',
			),
			'gallery_pagination' => array(
				'label'    => esc_html__( 'Gallery Pagination', 'wc-builder-divi' ),
				'selector' => '.et_pb_gallery_pagination',
			),
			'gallery_pagination_active' => array(
				'label'    => esc_html__( 'Pagination Active Page', 'wc-builder-divi' ),
				'selector' => '.et_pb_gallery_pagination a.active',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'inc_pro_img' => array(
				'label' => esc_html__( 'Include Product Image', 'wc-builder-divi' ),
				'description' => esc_html__( 'If you enable this, product image will be added to the gallery', 'wc-builder-divi' ),
				'type' => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'computed_affects'   => array(
					'__gallery',
				),
			),
			'gallery_orderby' => array(
				'label' => esc_html__( 'Gallery Images', 'wc-builder-divi' ),
				'type'  => 'hidden',
				'class' => array( 'et-pb-gallery-ids-field' ),
				'computed_affects'   => array(
					'__gallery',
				),
				'toggle_slug'     => 'main_content',
			),
			'fullwidth' => array(
				'label'             => esc_html__( 'Layout', 'wc-builder-divi' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'off' => esc_html__( 'Grid', 'wc-builder-divi' ),
					'on'  => esc_html__( 'Slider', 'wc-builder-divi' ),
				),
				'description'       => esc_html__( 'Toggle between the various blog layout types.', 'wc-builder-divi' ),
				'affects'           => array(
					'hover_icon',
					'zoom_icon_color',
					'hover_overlay_color',
					'auto',
					'posts_number',
					'show_title_and_caption',
					'orientation',
					'box_shadow_style_image',
					'border_radii_image',
					'border_styles_image',
				),
				'computed_affects'   => array(
					'__gallery',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'layout',
			),
			'posts_number' => array(
				'label'             => esc_html__( 'Images Number', 'wc-builder-divi' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Define the number of images that should be displayed per page.', 'wc-builder-divi' ),
				'depends_show_if'   => 'off',
				'toggle_slug'       => 'main_content',
				'computed_affects'   => array(
					'__gallery',
				),
			),
			'orientation'            => array(
				'label'              => esc_html__( 'Thumbnail Orientation', 'wc-builder-divi' ),
				'type'               => 'select',
				'options_category'   => 'configuration',
				'options'            => array(
					'landscape' => esc_html__( 'Landscape', 'wc-builder-divi' ),
					'portrait'  => esc_html__( 'Portrait', 'wc-builder-divi' ),
					'square'  => esc_html__( 'Square', 'wc-builder-divi' ),
				),
				'description'        => sprintf(
					'%1$s<br><small><em><strong>%2$s:</strong> %3$s <a href="//wordpress.org/plugins/force-regenerate-thumbnails" target="_blank">%4$s</a>.</em></small>',
					esc_html__( 'Choose the orientation of the gallery thumbnails.', 'wc-builder-divi' ),
					esc_html__( 'Note', 'wc-builder-divi' ),
					esc_html__( 'If this option appears to have no effect, you might need to', 'wc-builder-divi' ),
					esc_html__( 'regenerate your thumbnails', 'wc-builder-divi')
				),
				'depends_show_if'    => 'off',
				'computed_affects'   => array(
					'__gallery',
				),
				'tab_slug'           => 'advanced',
				'toggle_slug'        => 'layout',
			),
			'show_title_and_caption' => array(
				'label'              => esc_html__( 'Show Title and Caption', 'wc-builder-divi' ),
				'type'               => 'yes_no_button',
				'option_category'    => 'configuration',
				'options'            => array(
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'description'        => esc_html__( 'Whether or not to show the title and caption for images (if available).', 'wc-builder-divi' ),
				'depends_show_if'    => 'off',
				'toggle_slug'        => 'elements',
			),
			'show_pagination' => array(
				'label'             => esc_html__( 'Show Pagination', 'wc-builder-divi' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'wc-builder-divi' ),
					'off' => esc_html__( 'No', 'wc-builder-divi' ),
				),
				'toggle_slug'        => 'elements',
				'description'        => esc_html__( 'Enable or disable pagination for this feed.', 'wc-builder-divi' ),
			),
			'auto' => array(
				'label'           => esc_html__( 'Automatic Animation', 'wc-builder-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'Off', 'wc-builder-divi' ),
					'on'  => esc_html__( 'On', 'wc-builder-divi' ),
				),
				'affects' => array(
					'auto_speed',
				),
				'depends_show_if'   => 'on',
				'depends_to'        => array(
					'fullwidth',
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'animation',
				'description'       => esc_html__( 'If you would like the slider to slide automatically, without the visitor having to click the next button, enable this option and then adjust the rotation speed below if desired.', 'wc-builder-divi' ),
			),
			'auto_speed' => array(
				'label'             => esc_html__( 'Automatic Animation Speed (in ms)', 'wc-builder-divi' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'animation',
				'default'         	=> '7000',
				'depends_show_if' 	=> 'on',
				'description'       => esc_html__( "Here you can designate how fast the slider fades between each slide, if 'Automatic Animation' option is enabled above. The higher the number the longer the pause between each rotation.", 'wc-builder-divi' ),
			),
			'zoom_icon_color' => array(
				'label'             => esc_html__( 'Hover Icon Color', 'wc-builder-divi' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'off',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
			),
			'hover_overlay_color' => array(
				'label'             => esc_html__( 'Hover Overlay Color', 'wc-builder-divi' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'depends_show_if'   => 'off',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'overlay',
			),
			'hover_icon' => array(
				'label'               => esc_html__( 'Hover Icon Picker', 'wc-builder-divi' ),
				'type'                => 'select_icon',
				'option_category'     => 'configuration',
				'default'			=> 'P',
				'depends_show_if'   => 'off',
				'class'               => array( 'et-pb-font-icon' ),
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'overlay',
			),
			'__gallery' => array(
				'type' => 'computed',
				'computed_callback' => array( 'ET_Builder_Module_WooPro_Gallery', 'get_gallery' ),
				'computed_depends_on' => array(
					'inc_pro_img',
					'gallery_orderby',
					'fullwidth',
					'orientation',
					'posts_number',
				),
			),
		);

		return $fields;
	}

	/**
	 * Get attachment data for gallery module
	 *
	 * @param array $args {
	 *     Gallery Options
	 *
	 *     @type array  $gallery_ids     Attachment Ids of images to be included in gallery.
	 *     @type string $gallery_orderby `orderby` arg for query. Optional.
	 *     @type string $fullwidth       on|off to determine grid / slider layout
	 *     @type string $orientation     Orientation of thumbnails (landscape|portrait).
	 * }
	 * @param array $conditional_tags
	 * @param array $current_page
	 *
	 * @return array Attachments data
	 */
	static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {

		global $product, $post;

		$output 		= '';
		$module_class 	= '';
		$is_vb 			= false;

		// for visual builder
		$post_id = wcbd_get_post_id_for_vb();
		if( $post_id ){
			$is_vb 		= true;
			$product 	= wc_get_product( $post_id );
			$post 		= get_post( $post_id );
		}

		$defaults = array(
			'inc_pro_img'			=> 'off',
			'gallery_orderby' 		=> '',
			'fullwidth'       		=> 'off',
			'orientation'     		=> 'landscape',
			'show_title_and_caption' => 'on',
			'posts_number'			=> 4,
			'show_pagination' 		=> 'on',
			'hover_icon' 			=> 'P',
			'auto' 					=> 'on',
			'auto_speed' 			=> 7000,
		);

		$args = wp_parse_args( $args, $defaults );

		if( !$product || !is_object( $product )){
			
			/**
			 * Create a fake galley with placeholders
			 */

			$number 		= $args['posts_number'] + 1; // +1 for the pagination to work
			$attachments 	= array();

			// gallery image
			$gallery_image = new stdClass();
			$gallery_image->image_src_full 		= array( WCBD_PLUGIN_URL . 'includes/assets/images/gallery.png' );
			$gallery_image->image_src_thumb 	= array( WCBD_PLUGIN_URL . 'includes/assets/images/gallery.png' );
			$gallery_image->post_title 			= esc_html__( 'image title', 'wc-builder-divi' );
			$gallery_image->post_excerpt 		= esc_html__( 'image caption', 'wc-builder-divi' );

			// featured image
			$featured_image = new stdClass();
			$featured_image->image_src_full 	= array( WCBD_PLUGIN_URL . 'includes/assets/images/featured.png' );
			$featured_image->image_src_thumb 	= array( WCBD_PLUGIN_URL . 'includes/assets/images/featured.png' );
			$featured_image->post_title 		= esc_html__( 'image title', 'wc-builder-divi' );
			$featured_image->post_excerpt 		= esc_html__( 'image caption', 'wc-builder-divi' );

			// create the attachments array with the correct number of placeholders
			for( $i = 1; $i <= $number; $i++ ){
				$attachments[] = $gallery_image;
			}

			if( $args['inc_pro_img'] == 'on' ){
				array_unshift( $attachments, $featured_image );
			}

		}else{
			if( version_compare( WC()->version, '3.0.0', '>=' ) ){
				$attachment_ids = $product->get_gallery_image_ids();
			}else{
				$attachment_ids = $product->get_gallery_attachment_ids();
			}

			if( $args['inc_pro_img'] == 'on' && has_post_thumbnail() ){
				
				array_unshift( $attachment_ids, get_post_thumbnail_id() );
			}

			if( empty( $attachment_ids ) ){
				return '';
			}

			$attachments_args = array(
				'include'        => $attachment_ids,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'post__in',
			);

			if ( 'rand' === $args['gallery_orderby'] ) {
				$attachments_args['orderby'] = 'rand';
			}

			if ( 'on' === $args['fullwidth'] ) {
				$width  = 1080;
				$height = 9999;
			} else {
				$width  =  400;
				//$height = ( 'landscape' === $args['orientation'] ) ? 284 : 516;
				if( $args['orientation'] === 'landscape' ){
					$height = 284;
				}elseif( $args['orientation'] === 'square' ){
					$width = 300;
					$height = 300;
				}else{
					$height = 516;
				}
			}

			$width  = (int) apply_filters( 'et_pb_gallery_image_width', $width );
			$height = (int) apply_filters( 'et_pb_gallery_image_height', $height );

			$_attachments = get_posts( $attachments_args );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$key] = $_attachments[$key];
				$attachments[$key]->image_src_full  = wp_get_attachment_image_src( $val->ID, 'full' );
				$attachments[$key]->image_src_thumb = wp_get_attachment_image_src( $val->ID, array( $width, $height ) );
			}			
		}

		if ( empty( $attachments ) ) {
			return '';
		}
		wp_enqueue_script( 'hashchange' );

		$posts_number = 0 === intval( $args['posts_number'] ) ? 4 : intval( $args['posts_number'] );

		// special wrapper for visual builder
		if( $is_vb === true ){

			$module_class .= $args['fullwidth'] === 'on' ? ' et_pb_slider et_pb_gallery_fullwidth' : ' et_pb_gallery_grid';

			$module_class .= 'on' === $args['auto'] && 'on' === $args['fullwidth'] ? ' et_slider_auto et_slider_speed_' . esc_attr( $args['auto_speed'] ) : '';

			$output .= '<div class="et_pb_gallery clearfix'. $module_class .'">';
		}

		$output .= sprintf(
			'<div class="et_pb_gallery_items et_post_gallery clearfix" data-per_page="%1$d">',
			esc_attr( $posts_number )
		);

		$x = 1;
		foreach ( $attachments as $id => $attachment ) {
			$data_icon = '' !== $args['hover_icon']
				? sprintf(
					' data-icon="%1$s"',
					esc_attr( et_pb_process_font_icon( $args['hover_icon'] ) )
				)
				: '';

			$image_output = sprintf(
				'<a href="%1$s" title="%2$s">
					<img src="%3$s" alt="%2$s" />
					<span class="et_overlay%4$s"%5$s></span>
				</a>',
				esc_url( $attachment->image_src_full[0] ),
				esc_attr( $attachment->post_title ),
				esc_url( $attachment->image_src_thumb[0] ),
				( '' !== $args['hover_icon'] ? ' et_pb_inline_icon' : '' ),
				$data_icon
			);

			$output .= sprintf(
				'<div class="et_pb_gallery_item%1$s">',
				( 'on' !== $args['fullwidth'] ? ' et_pb_grid_item' : '' )
			);
			$output .= "
				<div class='et_pb_gallery_image {$args['orientation']}'>
					$image_output
				</div>";

			if ( 'on' !== $args['fullwidth'] && 'on' === $args['show_title_and_caption'] ) {
				if ( trim($attachment->post_title) ) {
					$output .= "
						<h3 class='et_pb_gallery_title'>
						" . wptexturize($attachment->post_title) . "
						</h3>";
				}
				if ( trim($attachment->post_excerpt) ) {
				$output .= "
						<p class='et_pb_gallery_caption'>
						" . wptexturize($attachment->post_excerpt) . "
						</p>";
				}
			}
			$output .= "</div>";

			// temporary: to display the correct numbers of products per page
			if( $is_vb && $x == $posts_number ){
				break;
			}
			$x++;
		}

		$output .= "</div><!-- .et_pb_gallery_items -->";

		if ( 'on' !== $args['fullwidth'] && 'on' === $args['show_pagination'] ) {
			
			// temporary: to display a demo pagination
			if( $is_vb && count($attachments) ){
				// get pages number
				$pages = ceil(count($attachments)/$posts_number);
				$items = '';
				if( $pages > 1 ){
					$items = '<ul><li class="prev" style="display: none;"><a href="#" data-page="prev" class="page-prev">Prev</a></li><li class="page page-1"><a href="#" data-page="1" class="page-1 active">1</a></li>';
					
					for( $i=2; $i <= $pages; $i++ ){
						$items .= "<li class='page page-{$i}'><a href='#' data-page='{$i}' class='page-{$i}'>{$i}</a></li>";
					}

					$items .= '<li class="next" style="display: inline-block;"><a href="#" data-page="next" class="page-next">Next</a></li></ul>';

					$output .= "<div class='et_pb_gallery_pagination'>{$items}</div>";
				}
								
			}else{
				$output .= '<div class="et_pb_gallery_pagination"></div>';
			}

		}

		// temporary: add slider controls
		if( $is_vb && $args['fullwidth'] === 'on' ){

			// arrows
			$output .= '<div class="et-pb-slider-arrows"><a class="et-pb-arrow-prev" href="#" style="color: inherit;"><span>Previous</span></a><a class="et-pb-arrow-next" href="#" style="color: inherit;"><span>Next</span></a></div>';

			// dots
			$output .= '<div class="et-pb-controllers"><a href="#" class="et-pb-active-control">1</a><a href="#" class="">2</a><a href="#">3</a><a href="#">4</a></div>';
		}

		if( $is_vb ){
			$output .= '</div>';
		}
		return $output;		
	}

	function render( $attrs, $content = null, $render_slug ) {
		$inc_pro_img			= $this->props['inc_pro_img'];
		$fullwidth              = $this->props['fullwidth'];
		$show_title_and_caption = $this->props['show_title_and_caption'];
		$posts_number           = $this->props['posts_number'];
		$show_pagination        = $this->props['show_pagination'];
		$gallery_orderby        = $this->props['gallery_orderby'];
		$zoom_icon_color        = $this->props['zoom_icon_color'];
		$hover_overlay_color    = $this->props['hover_overlay_color'];
		$hover_icon             = $this->props['hover_icon'];
		$auto                   = $this->props['auto'];
		$auto_speed             = $this->props['auto_speed'];
		$orientation            = $this->props['orientation'];

		$gallery = '';
		$this->add_classname( 'wcbd_module' );
		
		if( function_exists( 'is_product' ) && is_product() ){
			if ( '' !== $zoom_icon_color ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .et_overlay:before',
					'declaration' => sprintf(
						'color: %1$s !important;',
						esc_html( $zoom_icon_color )
					),
				) );
			}

			if ( '' !== $hover_overlay_color ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%% .et_overlay',
					'declaration' => sprintf(
						'background-color: %1$s;
						border-color: %1$s;',
						esc_html( $hover_overlay_color )
					),
				) );
			}

			// Get gallery item data
			$gallery = self::get_gallery( array(
				'inc_pro_img' 			=> esc_attr( $inc_pro_img ),
				'gallery_orderby' 		=> esc_attr( $gallery_orderby ),
				'fullwidth'       		=> esc_attr( $fullwidth ),
				'orientation'     		=> esc_attr( $orientation ),
				'show_title_and_caption' => esc_attr( $show_title_and_caption ),
				'posts_number'			=> esc_attr( $posts_number ),
				'show_pagination' 		=> esc_attr( $show_pagination ),
				'hover_icon' 			=> esc_attr( $hover_icon ),
				'auto' 					=> esc_attr( $auto ),
				'auto_speed' 			=> esc_attr( $auto_speed ),
			) );
			
			$this->add_classname('et_pb_gallery clearfix');

			if( $fullwidth === 'on' ){
				$this->add_classname('et_pb_slider et_pb_gallery_fullwidth');
			}else{
				$this->add_classname('et_pb_gallery_grid');
			}

			if( 'on' === $auto && 'on' === $fullwidth ){
				$this->add_classname( ' et_slider_auto et_slider_speed_' . esc_attr( $auto_speed ) );
			}
		}

		return $gallery;
	}
}
new ET_Builder_Module_WooPro_Gallery;