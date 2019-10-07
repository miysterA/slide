<?php 
	
/**
* @since 2.0.0
*/
get_header('shop'); 

$builder_used 	= WCBD_INIT::$product_builder_used;

?>

<?php do_action( 'woocommerce_before_main_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php
		 do_action( 'woocommerce_before_single_product' );

		 if ( post_password_required() ) {
		 	echo get_the_password_form();
		 	return;
		 }
	?>					
	<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php 
				// product schema data
				if( class_exists( 'WC_Structured_Data' ) ){
					$wc_str_data = new WC_Structured_Data();
				 	$wc_str_data->generate_product_data();					
				}
			?>
			<?php

				if( $builder_used == 'divi_library' ){
					// get the layout content 
					$layout_id 	= WCBD_INIT::$product_layout_id;
					echo "<div id='et-boc' class='et-boc'>";
						WCBD_INIT::get_divi_layout_content( $layout_id );	
					echo "</div>";			
				}else{
					the_content();
				}
 
			?>
		</div><!-- /.entry-content -->
	</div> <!-- #product- -->					
	<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php endwhile; ?>
				
<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer('shop'); ?>