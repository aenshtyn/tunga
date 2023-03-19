(function($){
	"use strict"; 

	var PostFormatID = jQuery('input[name="post_format"]:checked').attr('id');

	if ( PostFormatID == 'post-format-video' ) {
		jQuery('.cmb2-id--techeduem-video-url').show();
		jQuery('.cmb2-id--techeduem-local-video-url').show();
	}else{
		jQuery('.cmb2-id--techeduem-video-url').hide();
		jQuery('.cmb2-id--techeduem-local-video-url').hide();
	}
	if ( PostFormatID == 'post-format-audio' ) {
		jQuery('.cmb2-id--techeduem-audio-url').show();
	}else{
		jQuery('.cmb2-id--techeduem-audio-url').hide();
	}
	if ( PostFormatID == 'post-format-gallery' ) {
		jQuery('.cmb2-id--techeduem-gallery-slider').show();
	}else{
		jQuery('.cmb2-id--techeduem-gallery-slider').hide();
	}
	if ( PostFormatID == 'post-format-quote' ) {
		jQuery('.cmb2-id--techeduem-city-text').show();
	}else{
		jQuery('.cmb2-id--techeduem-city-text').hide();
	}

	// Post Format aditional field
	if ( PostFormatID == 'post-format-0' || PostFormatID == 'post-format-link' ) {
		jQuery('#_techeduem__techeduem_post_format_optons').hide();
	}else{
		jQuery('#_techeduem__techeduem_post_format_optons').show();
	}

	jQuery( 'input[name="post_format"]' ).change(function(){

		jQuery('.cmb2-id--techeduem-video-url').hide();
		jQuery('.cmb2-id--techeduem-audio-url').hide();
		jQuery('.cmb2-id--techeduem-city-text').hide();
		jQuery('.cmb2-id--techeduem-gallery-slider').hide();
		jQuery('.cmb2-id--techeduem-local-video-url').hide();

		var PostFormatID = jQuery('input[name="post_format"]:checked').attr('id');

		if ( PostFormatID == 'post-format-video' ) {
			jQuery('.cmb2-id--techeduem-video-url').show();
			jQuery('.cmb2-id--techeduem-local-video-url').show();
		}else{
			jQuery('.cmb2-id--techeduem-video-url').hide();
			jQuery('.cmb2-id--techeduem-local-video-url').hide();
		}
		if ( PostFormatID == 'post-format-audio' ) {
			jQuery('.cmb2-id--techeduem-audio-url').show();
		}else{
			jQuery('.cmb2-id--techeduem-audio-url').hide();
		}
		if ( PostFormatID == 'post-format-gallery' ) {
			jQuery('.cmb2-id--techeduem-gallery-slider').show();
		}else{
			jQuery('.cmb2-id--techeduem-gallery-slider').hide();
		}
		if ( PostFormatID == 'post-format-quote' ) {
			jQuery('.cmb2-id--techeduem-city-text').show();
		}else{
			jQuery('.cmb2-id--techeduem-city-text').hide();
		}

		// Post Format aditional field
		if ( PostFormatID == 'post-format-0' || PostFormatID == 'post-format-link' ) {
			jQuery('#_techeduem__techeduem_post_format_optons').hide();
		}else{
			jQuery('#_techeduem__techeduem_post_format_optons').show();
		}

	})

})(jQuery);