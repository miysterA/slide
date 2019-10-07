<?php

if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

if( !class_exists( 'WCBD_ShortCodes' ) ){

	class WCBD_ShortCodes{

		public function __construct(){

			add_shortcode( 'wcbd_shortcode', array( $this, 'shortcode_type' ) );

			// for backward compatibility with WCPB
			add_shortcode( 'wcpb_shortcode', array( $this, 'shortcode_type' ) ); 

			// to fix the missing after summary hook
			add_shortcode( 'wc_after_summary_hook', array( $this, 'after_summary_hook' ) );

		}

		public function shortcode_type( $atts ){

			global $post, $product;

			if( $post->post_type !== 'product' || is_admin() ){
				return;
			}

			$atts = shortcode_atts( 
				array(

					'type' 				=> '',
					'gallery_columns' 	=> 3,
					'size'				=> 'thumbnail',
					'link'				=> 'file',
					'lightbox'			=> 'yes',
					'heading'			=> 'yes',

				), 
				$atts );

			$func = $output = '';

			switch ( $atts['type'] ) {

				case 'title':
					$output = get_the_title();
					break;

				case 'meta':
					$func = 'woocommerce_template_single_meta';
					break;

				case 'slider':
					ob_start();
					/* Fix issue caused by Divi 3.2.1 */
					remove_action( 'woocommerce_before_single_product_summary', 'et_divi_output_product_wrapper', 0  );
					remove_action( 'woocommerce_after_single_product_summary', 'et_divi_output_product_wrapper_end', 0  );	

					do_action( 'woocommerce_before_single_product_summary' );
					$output = ob_get_clean();
					break;	

				case 'rating':
					$func = 'woocommerce_template_single_rating';
					break;

				case 'add_to_cart':
					$func = 'woocommerce_template_single_add_to_cart';
					break;

				case 'description':
					$hide_heaing = isset( $atts['heading'] ) && $atts['heading'] == 'no' ? ' hide_heading' : '';
					ob_start();
					echo "<div class='wcpb_shortcode wcbd_shortcode{$hide_heaing}'>";
					woocommerce_product_description_tab();
					echo "</div>";
					$output = ob_get_clean();
					break;
				
				case 'excerpt':
					$func = 'woocommerce_template_single_excerpt';
					break;

				case 'additional_info':

					$hide_heaing = isset( $atts['heading'] ) && $atts['heading'] == 'no' ? ' hide_heading' : '';
					ob_start();
					echo "<div class='wcpb_shortcode wcbd_shortcode{$hide_heaing}'>";
					woocommerce_product_additional_information_tab();
					echo "</div>";
					$output = ob_get_clean();
					break;	
					
				case 'reviews':

					$hide_heaing = isset( $atts['heading'] ) && $atts['heading'] == 'no' ? ' hide_heading' : '';
					ob_start();
					echo "<div class='wcpb_shortcode wcbd_shortcode{$hide_heaing}'>";
					comments_template();
					echo "</div>";
					$output = ob_get_clean();
					break;		

				case 'price':
					$func = 'woocommerce_template_single_price';
					break;

				case 'related':

					$hide_heaing = isset( $atts['heading'] ) && $atts['heading'] == 'no' ? ' hide_heading' : '';
					ob_start();
					echo "<div class='wcpb_shortcode wcbd_shortcode{$hide_heaing}'>";
					woocommerce_output_related_products();
					echo "</div>";
					$output = ob_get_clean();
					break;		

				case 'upsells':

					$hide_heaing = isset( $atts['heading'] ) && $atts['heading'] == 'no' ? ' hide_heading' : '';
					ob_start();
					echo "<div class='wcpb_shortcode wcbd_shortcode{$hide_heaing}'>";
					woocommerce_upsell_display();
					echo "</div>";
					$output = ob_get_clean();
					break;	

				case 'image':
			
					$alt = $title_text = get_the_title();
					
					if( has_post_thumbnail() ){
						$src = get_the_post_thumbnail_url();
					}else{
						$src = esc_url( wc_placeholder_img_src() );
					}

					$output = "<img src='{$src}' alt='{$alt}' title='{$title_text}'>";
					break;

				case 'gallery':
					if( version_compare( WC()->version, '3.0.0', '>=' ) ){
						$attachment_ids = $product->get_gallery_image_ids();
					}else{
						$attachment_ids = $product->get_gallery_attachment_ids();
					}

					if( count( $attachment_ids ) ){

						$gallery_ids = implode(',', $attachment_ids);

						if( is_numeric( $atts['gallery_columns'] ) ){
							$gallery_columns = $atts['gallery_columns'];
						}else{
							$gallery_columns = 3;
						}

						$size 		= esc_attr( $atts['size'] );
						$link 		= esc_attr( $atts['link'] );
						$lightbox 	= esc_attr( $atts['lightbox'] );

						$class = '';
						if( $lightbox == 'yes' ){
							$class = ' lightbox';
						}

						$output = "<div class='wcpb_gallery_shortcode et_post_gallery{$class}'>" . do_shortcode( '[gallery ids="'. $gallery_ids .'" columns="'. $gallery_columns .'" link="'.$link.'" size="'. $size .'"]' ) . "</div>";

					}
					break;
			}

			if( $func ){

				$output = WCBD_INIT::content_buffer( $func );

			}

			if( $output ){
				return $output;
			}
			
		}

		public function after_summary_hook(){
			if( is_admin() || !in_array( 'woo_product_divi_layout', get_body_class() ) ){
				return;
			}

			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

			ob_start();
			do_action( 'woocommerce_after_single_product_summary' );
			return ob_get_clean();			
		}

	}

	$wcbd_shortcodes = new WCBD_ShortCodes();
}

