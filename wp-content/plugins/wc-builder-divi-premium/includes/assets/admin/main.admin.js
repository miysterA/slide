jQuery(document).ready(function($){

	// upload product cover image
	var frame;
	var uploadCoverBTN 		= $('#wpdb_pro_cover_img #upload_cover_img_btn'),
		coverImgContainer 	= $('#wpdb_pro_cover_img #product_cover_image_container'),
		coverImgURL			= $('#wpdb_pro_cover_img #product_cover_img_url'),
		removeCoverImg		= $('#wpdb_pro_cover_img #remove_cover_img');

	uploadCoverBTN.on( 'click', function(e){
		e.preventDefault();
		
		if( frame ){
			frame.open();
			return;
		}

		frame = wp.media({
			title : 'Choose/Upload Product Cover Image',
			button : {
				text: 'Use this image'
			},
			multiple : false
		});

		frame.on( 'select', function(){
			// get selection
			var attachment = frame.state().get('selection').first().toJSON();
			// append image preview
			coverImgContainer.html( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );
			// update hidden input
			coverImgURL.val( attachment.url );
			// hide updload button
			uploadCoverBTN.addClass('hidden');
			// show remove image link
			removeCoverImg.removeClass('hidden');
		} );

		frame.open();

	} );

	// remove product cover image
	removeCoverImg.on( 'click', function(e){
		e.preventDefault();
		coverImgContainer.html('');
		coverImgURL.val('');
		$(this).addClass('hidden');
		uploadCoverBTN.removeClass('hidden');
	} );

	$('.wcbd_product_metabox .tab').click(function () {
		if ($(this).find('input[type=radio]').is(':checked')) {
			$(this).siblings('.tab').find('.tab_content').slideUp();
			$(this).find('.tab_content').slideDown();
		}
	});

	// settings page tabs
	$('.dk_admin_settings_menu a').on('click', function (e) {
		$('html, body').animate({
			scrollTop: 0
		}); 
		e.preventDefault();
		$('.admin_settings_group').hide();

		$('.dk_admin_settings_menu a').removeClass('active');
		$(this).addClass('active');
		
		var target = $(this).attr('href'),
			settingsForm = $('#wcbd_settings_form');

		location.hash = target;
		settingsForm.attr('action', 'options.php' + target);
		
		$(target).show();

		return false;
	});

	if(location.hash && $('.dk_admin_settings_menu a[href="' + location.hash + '"]').length){
		$('.dk_admin_settings_menu a[href="'+location.hash+'"]').trigger('click');
	}

	// activate the archive menu item while editing archive layouts
	$('body.post-type-wcbd_archive_layout #toplevel_page_wc-builder-divi')
		.removeClass('wp-not-current-submenu')
		.addClass('wp-menu-open wp-has-current-submenu');

	$('body.post-type-wcbd_archive_layout #toplevel_page_wc-builder-divi > a')
		.addClass('wp-has-current-submenu wp-menu-open')
		.removeClass('wp-not-current-submenu')
		.attr('aria-haspopup', 'false');
});