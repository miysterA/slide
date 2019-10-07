<?php 
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class WCBD_METABOX{

	public function __construct(){

		// don't show this metabox if divi or woocommerce is not active or the current user can't manage woocommerce
		if( ! WCBD_INIT::is_woo_active() || ! WCBD_INIT::is_divi_active() ){
			return;
		}
		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'save_post_product', array( $this, 'save_product_layout_metabox' ) );

	}

	// add choose layout metabox
	function add_metabox(){
		add_meta_box( 'woo_divi_produc_layout', WCBD_PLUGIN_NAME, array( $this, 'woo_divi_product_layout_cb' ), 'product', 'side', 'high' );
	}

	// metabox callback
	public function woo_divi_product_layout_cb( $post ){

		// append extra layouts
		$extra_layouts = array(
			array(
				'id' => 'cat_default',
				'name' => esc_html__( '-- Category Default Layout --' , 'wc-builder-divi'),
			),
			array(
				'id' => 'general_default',
				'name' => esc_html__( '-- General Default Layout --' , 'wc-builder-divi'),
			),
			array(
				'id' => '0',
				'name' => esc_html__( '-- WooCommerce Default Layout --' , 'wc-builder-divi'),
			),
		);

		$layouts 				= WCBD_INIT::get_divi_library_layouts();
		$layouts 				= array_merge( $extra_layouts, $layouts );
		$layout_id 				= WCBD_INIT::get_product_layout_meta( $post->ID );
		$main_product_builder 	= WCBD_INIT::get_product_builder_used( $post->ID );

		wp_nonce_field( 'single_product_layout_nonce', 'single_product_layout_nonce' );
		?>	

			<div class="wcbd_product_metabox">
				<p>
					<label>
						<span class="dashicons dashicons-editor-kitchensink"></span> 
						<b>The Product Builder:</b>
					</label>
				</p>
				<div class="tab">
					<div class="tab_header">
						<label>
							<input type="radio" name="main_product_builder" value="description" <?php echo $main_product_builder == 'description' ? 'checked' : ''; ?>> <b>Use the Description Builder</b>
						</label>
					</div><!-- tab_header -->
					<div class="tab_content<?php echo $main_product_builder == 'description' ? ' active' : ''; ?>">
						<p class="description">The description builder will work as the entire product page builder, not just the description (Like Pages).</p>

						<p class="description">
							<b class="red_text">PS:</b> Make sure to fill all the product details like title, price ... before you use the Visual Builder.
						</p>				
					</div><!-- tab_content -->
				</div> <!-- .tab -->

				<div class="tab">
					<div class="tab_header">
						<label>
							<input type="radio" name="main_product_builder" value="divi_library" <?php echo $main_product_builder == 'divi_library' || $main_product_builder == '' ? 'checked' : ''; ?>> <b>Select a Layout</b>
						</label>
					</div><!-- tab_header -->

					<div class="tab_content<?php echo $main_product_builder == 'divi_library' || $main_product_builder == '' ? ' active' : ''; ?>">
						<p class="description">Select an already saved layout to be used for the entire page, in this case, the description builder will output the product description only.</p>

						<select name="single_product_divi_layout" id="single_product_divi_layout">
							<?php
								if( count( $layouts ) ){
									foreach( $layouts as $layout ){
										$selected = $layout_id == $layout['id'] ? 'selected' : '';
										echo "<option value='{$layout['id']}' {$selected}>{$layout['name']}</option>";
									}
								}
							?>
						</select>
						<p class="description">This layout will override the default layout set on <a href="<?php echo esc_url( admin_url( 'options-general.php?page=wc-builder-divi' ) ); ?>" target="_blank">plugin settings page</a></p>
					</div><!-- tab_content -->
				</div> <!-- .tab -->

				<div id="wpdb_pro_cover_img">
					<?php
						$product_cover_img_url = get_post_meta( $post->ID, '_product_cover_img_url', true );
					?>
					<p>
						<span class="dashicons dashicons-format-image"></span>
						<b>Product Cover Image:</b>
					</p>
					<p id="product_cover_image_container">
						<?php 
							$hide_remove_class = 'hidden';
							$hide_upload_class = 'hidden';

							if( $product_cover_img_url ){
								$hide_remove_class = '';
								echo '<img src="'. esc_attr( $product_cover_img_url ) .'" alt="" style="max-width: 100%">';
							}else{
								$hide_upload_class = '';
							} 
						?>
					</p>
					<a href="#" id="remove_cover_img" class="<?php echo $hide_remove_class; ?>">Remove this image</a>
					<a href="#" id="upload_cover_img_btn" class="<?php echo $hide_upload_class; ?> button">Choose/Upload an image</a>
					<input type="hidden" id="product_cover_img_url" name="product_cover_img_url" value="<?php echo esc_attr( $product_cover_img_url ); ?>">
					<p class="description">This image will be used by product cover module as a background</p>
				</div>
			</div>	<!-- wcbd_product_metabox -->
		<?php
	}	

	// save metabox
	function save_product_layout_metabox( $post_id ){

		$is_valid_nonce = ( isset( $_POST['single_product_layout_nonce'] ) && wp_verify_nonce( $_POST['single_product_layout_nonce'], 'single_product_layout_nonce' ) ) ? true : false;
		$is_user_can 	= ( current_user_can( 'edit_post', $post_id ) ) ? true : false;

		if( !$is_valid_nonce || !$is_user_can ){
			return;
		}

		$builders = array( 'description', 'divi_library' );

		// update layout
		$new_layout 	= isset( $_POST['single_product_divi_layout'] ) ? sanitize_text_field( $_POST['single_product_divi_layout']  ) : 'general_default' ;
		$builder_used 	= isset( $_POST['main_product_builder'] ) && in_array( $_POST['main_product_builder'], $builders ) ? sanitize_text_field( $_POST['main_product_builder'] ) : 'divi_library';
		$cover_img_url 	= !empty( $_POST['product_cover_img_url'] ) ? esc_url( $_POST['product_cover_img_url'] ) : '';

		update_post_meta( $post_id, WCBD_PRODUCT_LAYOUT_KEY, $new_layout );
		update_post_meta( $post_id, '_main_product_builder', $builder_used );
		update_post_meta( $post_id, '_product_cover_img_url', $cover_img_url );
	}

}

new WCBD_METABOX();