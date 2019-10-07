<?php 

// exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * get current theme details
 * @since 2.0.0
*/

function dwcb_get_current_theme_details(){

	$theme = wp_get_theme(get_template());

	if( !defined( 'DIVIKINGDOM_THEME_NAME' ) ){
        define( 'DIVIKINGDOM_THEME_NAME', strtolower($theme->Name) );
	}
	if( !defined( 'DIVIKINGDOM_THEME_VERSION' ) ){
        define( 'DIVIKINGDOM_THEME_VERSION', $theme->version );
	}
}

dwcb_get_current_theme_details();

// product page start html wrapper
function wcbd_woocommerce_output_content_wrapper(){

	// Divi theme
	if( DIVIKINGDOM_THEME_NAME == 'divi' ){
		echo 
			'<div id="main-content">
				<div class="container">
					<div id="content-area" class="clearfix">
						<div id="left-area">';
	}

	// Extra theme
	if( DIVIKINGDOM_THEME_NAME == 'extra' ){
		echo '
			<div id="main-content">
				<div class="container">
					<div id="content-area" class="clearfix">
						<div class="et_pb_extra_column_main">';
	}

}

// product page end html wrapper
function wcbd_woocommerce_output_content_wrapper_end(){

	// Divi theme
	if( strtolower( DIVIKINGDOM_THEME_NAME ) == 'divi' ){
		echo 
			'
						</div> <!-- #left-area -->
					</div> <!-- #content-area -->
				</div> <!-- .container -->
			</div> <!-- #main-content -->';
	}

	// Extra theme
	if( strtolower( DIVIKINGDOM_THEME_NAME ) == 'extra' ){
		echo '
						</div> <!-- .et_pb_extra_column_main -->
					</div> <!-- #content-area -->
				</div> <!-- .container -->
			</div> <!-- #main-content -->';
	}

}

// remove WC and Divi HTML Markup
function wcbd_remove_wc_divi_html_wrappers(){
	// some cleaning for items that have their own modules and the page marckup
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	remove_action( 'woocommerce_before_main_content', 'et_divi_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'et_divi_output_content_wrapper_end', 10 );

	remove_action( 'woocommerce_before_main_content', 'extra_woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'extra_woocommerce_output_content_wrapper_end', 10 );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_before_single_product', 'wc_print_notices' );

	// fix the iPad issue
	add_filter( 'woocommerce_style_smallscreen_breakpoint', array( 'WCBD_HELPERS', 'change_wc_smallscreen_breakpoint' ) );
	// fix shop module pagination issue
	add_action( 'woocommerce_before_main_content', array( 'WCBD_HELPERS', 'fix_shop_module_pagination' ) );

	/**
	 * clean & restore woocommerce notices 
	 * This will allow using the notices module more than once on the same page
	 * */
	WCBD_INIT::wc_notices();
}

// get the current product for visual builder
function wcbd_get_product_for_vb(){

	if( !defined( 'DOING_AJAX' ) || !DOING_AJAX ){
		return false;
	}
	if( isset( $_REQUEST['et_post_id'] ) ){
		$post_id = absint( $_REQUEST['et_post_id'] );
	}elseif( isset( $_REQUEST['current_page']['id'] ) ){
		$post_id = absint( $_REQUEST['current_page']['id'] );
	}else{
		$post_id = false;
	}

	$product = false;

	if( $post_id ){
		$product = wc_get_product( $post_id );
	}

	return $product;
}

// get post id for vb
function wcbd_get_post_id_for_vb(){

	if( isset( $_REQUEST['et_post_id'] ) ){
		$post_id = absint( $_REQUEST['et_post_id'] );
	}elseif( isset( $_REQUEST['current_page']['id'] ) ){
		$post_id = absint( $_REQUEST['current_page']['id'] );
	}else{
		$post_id = false;
	}
	return $post_id;
}

// get all cats and tags with divi layouts for backend
function wcbd_get_product_archives_and_divi_layouts( $taxonomy = 'product_cat' ){
	
	/**
	 * WPML
	 * Change the language to all to display all terms from all languages
	 */
	WCBD_HELPERS::wpml_switch_lang( 'all' );

	// get the terms
	$terms = get_terms( 
		array( 
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
		) 
	);

	/**
	 * WPML
	 * Roll back to original/current language
	 */
	WCBD_HELPERS::wpml_switch_lang( 'original' );

	if( is_array( $terms ) && count( $terms ) ){

		// all layouts
		$layouts = WCBD_INIT::get_divi_library_layouts();

		// add the default woocommerce layout to the layouts array
		array_unshift( $layouts, array( 
			'id' 	=> "0", 
			'name' 	=> esc_html__( '-- Default WooCommerce Layout --', 'wc-builder-divi' ) 
			) 
		);

		$saved_settings = WCBD_INIT::plugin_settings();
		$products_under_archive_layout = $saved_settings['products_under_archive_layout'];
		
		foreach( $terms as $term ){
			$term_name 	= esc_attr( $term->name );
			$term_id 	= esc_attr($term->term_id);

			/**
			 * WPML
			 * get term language code
			 */
			$language_code = WCBD_HELPERS::wpml_get_lang_code( $term_id, 'product_cat' );
			$language_code = $language_code ? "[" . esc_html( strtoupper( $language_code ) ) . "] " : '';
		?>	
			<p>
				<label>
					<b>- <?php echo $language_code . $term_name; ?></b>
					<br>	
					<select name="divi_woo_settings[products_under_archive_layout][<?php echo $term_id; ?>]">
						<option value="general_default"><?php esc_html_e( '-- General Default Layout --', 'wc-builder-divi' ); ?></option>
						<?php
							if( count( $layouts ) ){
								foreach( $layouts as $layout ){

									$selected = '';
									if( isset( $products_under_archive_layout[$term_id] ) && ( $products_under_archive_layout[$term_id] == $layout['id'] ) ){
										$selected = 'selected';
									}
									
									echo "<option value='{$layout['id']}' {$selected}>{$layout['name']}</option>";
								}
							}
						?>
					</select>					
				</label>
			</p>
			<?php
		}
	}else{
		echo "<h3>No Categories Found!</h3>";
	}
}

// get archive builder layouts and divi library layouts for the backend
function wcbd_select_saved_divi_and_archive_layouts( $input_name = '', $selected_value = 0 ){
	$archive_layouts 		= WCBD_INIT::get_archive_layouts();
	$divi_library_layouts 	= WCBD_INIT::get_divi_library_layouts();

	ob_start();
	?>

		<select name="<?php echo esc_attr( $input_name ); ?>">
			<option value="0" <?php echo absint($selected_value) == 0 ? 'selected' : ''; ?>><?php esc_html_e( '-- Default WooCommerce Layout --', 'wc-builder-divi' ); ?></option>

			<!-- A list of all archive builder layouts -->
			<?php if( count( $archive_layouts ) ): ?>

				<option disabled><?php esc_html_e( '- Archive Builder Layouts -', 'wc-builder-divi' ); ?></option>

				<?php foreach( $archive_layouts as $layout ): ?>

					<option value="<?php echo esc_attr($layout['id']) ?>" <?php echo $layout['id'] == absint($selected_value) ? 'selected' : ''; ?>><?php echo esc_attr($layout['name']) ?></option>

				<?php endforeach; ?>
			<?php endif; ?>

			<!-- A list of all divi library layouts -->
			<?php if( count( $divi_library_layouts ) ): ?>

				<option disabled><?php esc_html_e( '- Divi Library Layouts -', 'wc-builder-divi' ); ?></option>

				<?php foreach( $divi_library_layouts as $layout ): ?>

					<option value="<?php echo esc_attr($layout['id']) ?>" <?php echo $layout['id'] == absint($selected_value) ? 'selected' : ''; ?>><?php echo esc_attr($layout['name']) ?></option>

				<?php endforeach; ?>
			<?php endif; ?>

		</select>

	<?php
	return ob_get_clean();
}

// supported archive taxonomies to be included in the archive builder
function wcbd_supported_archive_taxonomies(){
	$supported_taxonomies = array(
		'product_cat',
		'product_tag',
	);

	$supported_taxonomies = apply_filters( 'wcbd_supported_archive_taxonomies', $supported_taxonomies );

	return $supported_taxonomies;
}

/**
 * Allow to remove method for an hook when, it's a class method used and class don't have variable, but you know the class name :)
 * @see https://github.com/herewithme/wp-filters-extras
 */
function wcbd_remove_filters_for_anonymous_class( $hook_name = '', $class_name = '', $method_name = '', $priority = 0 ) {
	global $wp_filter;
	// Take only filters on right hook name and priority
	if ( ! isset( $wp_filter[ $hook_name ][ $priority ] ) || ! is_array( $wp_filter[ $hook_name ][ $priority ] ) ) {
		return false;
	}
	// Loop on filters registered
	foreach ( (array) $wp_filter[ $hook_name ][ $priority ] as $unique_id => $filter_array ) {
		// Test if filter is an array ! (always for class/method)
		if ( isset( $filter_array['function'] ) && is_array( $filter_array['function'] ) ) {
			// Test if object is a class, class and method is equal to param !
			if ( is_object( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) == $class_name && $filter_array['function'][1] == $method_name ) {
				// Test for WordPress >= 4.7 WP_Hook class (https://make.wordpress.org/core/2016/09/08/wp_hook-next-generation-actions-and-filters/)
				if ( is_a( $wp_filter[ $hook_name ], 'WP_Hook' ) ) {
					unset( $wp_filter[ $hook_name ]->callbacks[ $priority ][ $unique_id ] );
				} else {
					unset( $wp_filter[ $hook_name ][ $priority ][ $unique_id ] );
				}
			}
		}
	}
	return false;
}
