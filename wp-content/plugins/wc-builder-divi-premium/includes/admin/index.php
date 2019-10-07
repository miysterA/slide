<?php if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly ?>
<div class="wrap admin_settings_page">
	<h1>
		<span class="dashicons dashicons-cart"></span>
		<?php echo WCBD_PLUGIN_NAME . ' Settings'; ?>
	</h1>

	<?php WCBD_INIT::woo_divi_are_required_notice(); ?>

	<?php include WCBD_PLUGIN_PATH . 'includes/admin/pages/settings.php'; ?>
	
	<div class="postbox wcbp_admin_section important-links" style="padding: 10px">

		<p>
			<b>
				Important Links: 
				<br>
				<a href="https://docs.divikingdom.com/" target="_blank">
					<span class="dashicons dashicons-welcome-learn-more"></span> Documentations
				</a> | 
				<a href="https://www.divikingdom.com/wc-builder-changelog" target="_blank">
					<span class="dashicons dashicons-list-view"></span> Changelog
				</a> | 
				<a href="https://www.divikingdom.com/contact" target="_blank">
					<span class="dashicons dashicons-admin-comments"></span> Contact Me
				</a> | 
				<a href="https://www.divikingdom.com/account" target="_blank">
					<span class="dashicons dashicons-businessman"></span> Account
				</a> | 
				<a href="https://www.divikingdom.com/newsletter-signup/" target="_blank">
					<span class="dashicons dashicons-email"></span> Newsletter
				</a>
			</b>
		</p>
	</div><!-- /.wcbp_admin_section -->

</div><!-- /.wrap -->