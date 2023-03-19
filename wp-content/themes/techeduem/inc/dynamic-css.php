<?php

/**
 * Add custom style from theme option and meta box 
 */
if (!function_exists('techeduem_styles_method')) {
	function techeduem_styles_method()
	{

		$techeduem_opt = techeduem_get_opt();

		wp_enqueue_style(
			'techeduem-dynamic-style',
			get_template_directory_uri() . '/css/dynamic-style.css'
		);
		/**
		 * Menu Typography 
		 */
		$techeduem_menu_typography = isset($techeduem_opt['techeduem_menufont']) ? $techeduem_opt['techeduem_menufont'] : '';
		$font_family = $font_weight = $text_transform = $font_style = $font_size = $line_height = $letter_spacing = '';
		if (isset($techeduem_menu_typography)) {
			$font_family = (isset($techeduem_menu_typography['font-family'])) ? $techeduem_menu_typography['font-family'] : '';
			$font_weight = (isset($techeduem_menu_typography['font-weight'])) ? $techeduem_menu_typography['font-weight'] : '';
			$text_transform = (isset($techeduem_menu_typography['text-transform'])) ? $techeduem_menu_typography['text-transform'] : '';
			$font_style = (isset($techeduem_menu_typography['font-style'])) ? $techeduem_menu_typography['font-style'] : '';
			$font_size = (isset($techeduem_menu_typography['font-size'])) ? $techeduem_menu_typography['font-size'] : '';
			$line_height = (isset($techeduem_menu_typography['line-height'])) ? $techeduem_menu_typography['line-height'] : '';
			$letter_spacing = (isset($techeduem_menu_typography['letter-spacing'])) ? $techeduem_menu_typography['letter-spacing'] : '';
		}

		$pnmff = $pnmfw = $pnmtt = $pnmfs = $pnmfsz = $pnmlh = $pnmls = '';
		if ($font_family) {
			$pnmff = '.primary-nav-wrap.default-menu nav ul li a{
			font-family:' . $font_family . ';
		}';
		}

		if ($font_weight) {
			$pnmfw = '.primary-nav-wrap.default-menu nav ul li a{
			font-weight:' . $font_weight . ';
		}';
		}

		if ($text_transform) {
			$pnmtt = '.primary-nav-wrap.default-menu nav ul li a{
			text-transform:' . $text_transform . ';
		}';
		}

		if ($font_style) {
			$pnmfs = '.primary-nav-wrap.default-menu nav ul li a{
			font-style:' . $font_style . ';
		}';
		}

		if ($font_size) {
			$pnmfsz = '.primary-nav-wrap.default-menu nav ul li a{
			font-size:' . $font_size . '; 
		}';
		}

		if ($line_height) {
			$pnmlh = '.primary-nav-wrap.default-menu nav ul li a{
			line-height:' . $line_height . '; 
		}';
		}

		if ($letter_spacing) {
			$pnmls = '.primary-nav-wrap.default-menu nav ul li a{
			letter-spacing:' . $letter_spacing . '; 
		}';
		}

		/**
		 * Page title color
		 */
		$page_title_color = get_post_meta(get_the_ID(), '_techeduem_page_title_color', true);
		/**
		 * Page Title 
		 */
		$techeduem_page_title_typography = get_post_meta(get_the_id(), '_techeduem_title_typography', true);
		$techeduem_theme_title_typography = isset($techeduem_opt['techeduem_title_typography']) ? $techeduem_opt['techeduem_title_typography'] : '';

		/**
		 * Start page Title
		 */
		$ptp_font_family = $ptp_font_weight = $ptp_text_transform = $ptp_font_style = $ptp_font_size = $ptp_line_height = $ptp_letter_spacing = $ptp_font_color = $ptt_font_family = $ptt_font_weight = $ptt_text_transform = $ptt_font_style = $ptt_font_size = $ptt_line_height = $ptt_letter_spacing = $ptt_font_color = '';

		if (!empty($techeduem_page_title_typography)) {
			$ptp_font_family = $techeduem_page_title_typography['font-family'];
			$ptp_font_weight = $techeduem_page_title_typography['font-weight'];
			$ptp_text_transform = $techeduem_page_title_typography['text-transform'];
			$ptp_font_style = $techeduem_page_title_typography['font-style'];
			$ptp_font_size = $techeduem_page_title_typography['font-size'];
			$ptp_line_height = $techeduem_page_title_typography['line-height'];
			$ptp_letter_spacing = $techeduem_page_title_typography['letter-spacing'];
			$ptp_font_color = $techeduem_page_title_typography['font-color'];
		}

		if (isset($techeduem_theme_title_typography)) {
			$ptt_font_family = (isset($techeduem_theme_title_typography['font-family'])) ? $techeduem_theme_title_typography['font-family'] : '';
			$ptt_font_weight = (isset($techeduem_theme_title_typography['font-weight'])) ? $techeduem_theme_title_typography['font-weight'] : '';
			$ptt_text_transform = (isset($techeduem_theme_title_typography['text-transform'])) ? $techeduem_theme_title_typography['text-transform'] : '';
			$ptt_font_style = (isset($techeduem_theme_title_typography['font-style'])) ? $techeduem_theme_title_typography['font-style'] : '';
			$ptt_font_size = (isset($techeduem_theme_title_typography['font-size'])) ? $techeduem_theme_title_typography['font-size'] : '';
			$ptt_line_height = (isset($techeduem_theme_title_typography['line-height'])) ? $techeduem_theme_title_typography['line-height'] : '';
			$ptt_letter_spacing = (isset($techeduem_theme_title_typography['letter-spacing'])) ? $techeduem_theme_title_typography['letter-spacing'] : '';
			$ptt_font_color = (isset($techeduem_theme_title_typography['color'])) ? $techeduem_theme_title_typography['color'] : '';
		}


		$ptff = $ptfw = $pttt = $ptfs = $ptfsz = $ptlh = $ptls = $ptcl = '';
		if ($ptp_font_family) {
			$ptff = '.page__title__inner .page-title, .page__title__inner h2{
			font-family:' . $ptp_font_family . ';
		}';
		} else {
			if ($ptt_font_family) {
				$ptff = '.page__title__inner .page-title, .page__title__inner h2{
				font-family:' . $ptt_font_family . ';
			}';
			}
		}
		if ($ptp_font_weight) {
			$ptfw = '.page__title__inner .page-title, .page__title__inner h2{
			font-weight:' . $ptp_font_weight . ';
		}';
		} else {
			if ($ptt_font_weight) {
				$ptfw = '.page__title__inner .page-title, .page__title__inner h2{
				font-weight:' . $ptt_font_weight . ';
			}';
			}
		}
		if ($ptp_text_transform) {
			$pttt = '.page__title__inner .page-title, .page__title__inner h2{
			text-transform:' . $ptp_text_transform . ';
		}';
		} else {
			if ($ptt_text_transform) {
				$pttt = '.page__title__inner .page-title, .page__title__inner h2{
				text-transform:' . $ptt_text_transform . ';
			}';
			}
		}
		if ($ptp_font_style) {
			$ptfs = '.page__title__inner .page-title, .page__title__inner h2{
			font-style:' . $ptp_font_style . ';
		}';
		} else {
			if ($ptt_font_style) {
				$ptfs = '.page__title__inner .page-title, .page__title__inner h2{
				font-style:' . $ptt_font_style . ';
			}';
			}
		}
		if ($ptp_font_size) {
			$ptfsz = '.page__title__inner .page-title, .page__title__inner h2{
			font-size:' . $ptp_font_size . 'px; 
		}';
		} else {
			if ($ptt_font_size) {
				$ptfsz = '.page__title__inner .page-title, .page__title__inner h2{
				font-size:' . $ptt_font_size . '; 
			}';
			}
		}
		if ($ptp_line_height) {
			$ptlh = '.page__title__inner .page-title, .page__title__inner h2{
			line-height:' . $ptp_line_height . 'px; 
		}';
		} else {
			if ($ptt_line_height) {
				$ptlh = '.page__title__inner .page-title, .page__title__inner h2{
				line-height:' . $ptt_line_height . '; 
			}';
			}
		}
		if ($ptp_letter_spacing) {
			$ptls = '.page__title__inner .page-title, .page__title__inner h2{
			line-height:' . $ptp_letter_spacing . 'px; 
		}';
		} else {
			if ($ptt_letter_spacing) {
				$ptls = '.page__title__inner .page-title, .page__title__inner h2{
				letter-spacing:' . $ptt_letter_spacing . '; 
			}';
			}
		}
		if ($ptp_font_color) {
			$ptcl = '.page__title__inner .page-title, .page__title__inner h2{
			color: ' . $ptp_font_color . '; 
		}';
		} else {
			if ($ptt_font_color) {
				$ptcl = '.page__title__inner .page-title, .page__title__inner h2{
				color: ' . $ptt_font_color . '; 
			}';
			}
		}
		/**
		 * End page Title
		 */

		/**
		 * Start Sub Title
		 */
		$techeduem_page_sub_title_typography = get_post_meta(get_the_id(), '_techeduem_sub_title_typography', true);
		$techeduem_theme_sub_title_typography = isset($techeduem_opt['techeduem_sub_title_typography']) ? $techeduem_opt['techeduem_sub_title_typography'] : '';
		$pstp_font_family = $pstp_font_weight = $pstp_text_transform = $pstp_font_style = $pstp_font_size = $pstp_line_height = $pstp_letter_spacing = $pstp_font_color = $pstt_font_family = $pstt_font_weight = $pstt_font_weight = $pstt_text_transform = $pstt_font_style = $pstt_font_size = $pstt_line_height = $pstt_letter_spacing = $pstt_font_color = '';
		if (!empty($techeduem_page_sub_title_typography)) {
			$pstp_font_family = $techeduem_page_sub_title_typography['font-family'];
			$pstp_font_weight = $techeduem_page_sub_title_typography['font-weight'];
			$pstp_text_transform = $techeduem_page_sub_title_typography['text-transform'];
			$pstp_font_style = $techeduem_page_sub_title_typography['font-style'];
			$pstp_font_size = $techeduem_page_sub_title_typography['font-size'];
			$pstp_line_height = $techeduem_page_sub_title_typography['line-height'];
			$pstp_letter_spacing = $techeduem_page_sub_title_typography['letter-spacing'];
			$pstp_font_color = $techeduem_page_sub_title_typography['font-color'];
		}
		if (isset($techeduem_theme_sub_title_typography)) {
			$pstt_font_family = (isset($techeduem_theme_sub_title_typography['font-family'])) ? $techeduem_theme_sub_title_typography['font-family'] : '';
			$pstt_font_weight = (isset($techeduem_theme_sub_title_typography['font-weight'])) ? $techeduem_theme_sub_title_typography['font-weight'] : '';
			$pstt_text_transform = (isset($techeduem_theme_sub_title_typography['text-transform'])) ? $techeduem_theme_sub_title_typography['text-transform'] : '';
			$pstt_font_style = (isset($techeduem_theme_sub_title_typography['font-style'])) ? $techeduem_theme_sub_title_typography['font-style'] : '';
			$pstt_font_size = (isset($techeduem_theme_sub_title_typography['font-size'])) ? $techeduem_theme_sub_title_typography['font-size'] : '';
			$pstt_line_height = (isset($techeduem_theme_sub_title_typography['line-height'])) ? $techeduem_theme_sub_title_typography['line-height'] : '';
			$pstt_letter_spacing = (isset($techeduem_theme_sub_title_typography['letter-spacing'])) ? $techeduem_theme_sub_title_typography['letter-spacing'] : '';
			$pstt_font_color = (isset($techeduem_theme_sub_title_typography['color'])) ? $techeduem_theme_sub_title_typography['color'] : '';
		}


		$page_sub_title_style_page_option = '.page__title__inner .page-sub-title{
		font-family:' . $pstp_font_family . '; 
		font-weight:' . $pstp_font_weight . '; 
		text-transform:' . $pstp_text_transform . '; 
		font-style:' . $pstp_font_style . '; 
		font-size:' . $pstp_font_size . 'px; 
		line-height:' . $pstp_line_height . 'px; 
		letter-spacing:' . $pstp_letter_spacing . 'px; 
		color: ' . $pstp_font_color . ';  
	}';

		$page_sub_title_style_theme_option = '.page__title__inner .page-sub-title{
		font-family:' . $pstt_font_family . '; 
		font-weight:' . $pstt_font_weight . '; 
		text-transform:' . $pstt_text_transform . '; 
		font-style:' . $pstt_font_style . '; 
		font-size:' . $pstt_font_size . '; 
		line-height:' . $pstt_line_height . '; 
		letter-spacing:' . $pstt_letter_spacing . '; 
		color: ' . $pstt_font_color . ';  
	}';

		$pstff = $pstfw = $psttt = $pstfs = $pstfsz = $pstlh = $pstls = $pstcl = '';
		if ($pstp_font_family) {
			$pstff = '.page__title__inner .page-sub-title{
			font-family:' . $pstp_font_family . ';
		}';
		} else {
			if ($pstt_font_family) {
				$pstff = '.page__title__inner .page-sub-title{
				font-family:' . $pstt_font_family . ';
			}';
			}
		}
		if ($pstp_font_weight) {
			$pstfw = '.page__title__inner .page-sub-title{
			font-weight:' . $pstp_font_weight . ';
		}';
		} else {
			if ($pstt_font_weight) {
				$pstfw = '.page__title__inner .page-sub-title{
				font-weight:' . $pstt_font_weight . ';
			}';
			}
		}
		if ($pstp_text_transform) {
			$psttt = '.page__title__inner .page-sub-title{
			text-transform:' . $pstp_text_transform . ';
		}';
		} else {
			if ($pstt_text_transform) {
				$psttt = '.page__title__inner .page-sub-title{
				text-transform:' . $pstt_text_transform . ';
			}';
			}
		}
		if ($pstp_font_style) {
			$pstfs = '.page__title__inner .page-sub-title{
			font-style:' . $pstp_font_style . ';
		}';
		} else {
			if ($pstt_font_style) {
				$pstfs = '.page__title__inner .page-sub-title{
				font-style:' . $pstt_font_style . ';
			}';
			}
		}
		if ($pstp_font_size) {
			$pstfsz = '.page__title__inner .page-sub-title{
			font-size:' . $pstp_font_size . 'px; 
		}';
		} else {
			if ($pstt_font_size) {
				$pstfsz = '.page__title__inner .page-sub-title{
				font-size:' . $pstt_font_size . '; 
			}';
			}
		}
		if ($pstp_line_height) {
			$pstlh = '.page__title__inner .page-sub-title{
			line-height:' . $pstp_line_height . 'px; 
		}';
		} else {
			if ($pstt_line_height) {
				$pstlh = '.page__title__inner .page-sub-title{
				line-height:' . $pstt_line_height . '; 
			}';
			}
		}
		if ($pstp_letter_spacing) {
			$pstls = '.page__title__inner .page-sub-title{
			line-height:' . $pstp_letter_spacing . 'px; 
		}';
		} else {
			if ($pstt_letter_spacing) {
				$pstls = '.page__title__inner .page-sub-title{
				letter-spacing:' . $pstt_letter_spacing . '; 
			}';
			}
		}
		if ($pstp_font_color) {
			$pstcl = '.page__title__inner .page-sub-title{
			color: ' . $pstp_font_color . '; 
		}';
		} else {
			if ($pstt_font_color) {
				$pstcl = '.page__title__inner .page-sub-title{
				color: ' . $pstt_font_color . '; 
			}';
			}
		}


		/**
		 * End Sub Title
		 */

		/**
		 * Page Title Padding
		 */

		$techeduem_page_title_wrapper_padding = get_post_meta(get_the_id(), '_techeduem_title_wrapper_padding', true);

		$techeduem_theme_title_wrap_padding = (isset($techeduem_opt['techeduem_title_wrap_padding'])) ? $techeduem_opt['techeduem_title_wrap_padding'] : '';
		$ppt = (!empty($techeduem_page_title_wrapper_padding['padding-top'])) ? $techeduem_page_title_wrapper_padding['padding-top'] : '';
		$ppr = (!empty($techeduem_page_title_wrapper_padding['padding-right'])) ? $techeduem_page_title_wrapper_padding['padding-right'] : '';
		$ppb = (!empty($techeduem_page_title_wrapper_padding['padding-bottom'])) ? $techeduem_page_title_wrapper_padding['padding-bottom'] : '';
		$ppl = (!empty($techeduem_page_title_wrapper_padding['padding-left'])) ? $techeduem_page_title_wrapper_padding['padding-left'] : '';
		$tpt = (isset($techeduem_theme_title_wrap_padding['padding-top'])) ? $techeduem_theme_title_wrap_padding['padding-top'] : '';
		$tpr = (isset($techeduem_theme_title_wrap_padding['padding-right'])) ? $techeduem_theme_title_wrap_padding['padding-right'] : '';
		$tpb = (isset($techeduem_theme_title_wrap_padding['padding-bottom'])) ? $techeduem_theme_title_wrap_padding['padding-bottom'] : '';
		$tpl = (isset($techeduem_theme_title_wrap_padding['padding-left'])) ? $techeduem_theme_title_wrap_padding['padding-left'] : '';
		/**
		 * Page Title Padding Large Screen
		 */

		$phpt = '';
		if (!empty($ppt)) {
			$phpt = '.page__title__wrapper .page__title__inner{
			padding-top:' . $ppt . 'px; 
		}';
		} else {
			if (!empty($tpt)) {
				$phpt = '.page__title__wrapper .page__title__inner{
				padding-top:' . $tpt . '; 
			}';
			}
		}

		$phpr = '';
		if (!empty($ppr)) {
			$phpr = '.page__title__wrapper .page__title__inner{
			padding-right:' . $ppr . 'px; 
		}';
		} else {
			if (!empty($tpr)) {
				$phpr = '.page__title__wrapper .page__title__inner{
				padding-right:' . $tpr . '; 
			}';
			}
		}

		$phpb = '';
		if (!empty($ppb)) {
			$phpb = '.page__title__wrapper .page__title__inner{
			padding-bottom:' . $ppb . 'px; 
		}';
		} else {
			if (!empty($tpb)) {
				$phpb = '.page__title__wrapper .page__title__inner{
				padding-bottom:' . $tpb . '; 
			}';
			}
		}

		$phpl = '';
		if (!empty($ppl)) {
			$phpl = '.page__title__wrapper .page__title__inner{
			padding-left:' . $ppl . 'px; 
		}';
		} else {
			if (!empty($tpl)) {
				$phpl = '.page__title__wrapper .page__title__inner{
				padding-left:' . $tpl . '; 
			}';
			}
		}
		/**
		 * Page Title Padding Responsive Screen
		 */
		$techeduem_page_title_wrapper_padding_on_phone = get_post_meta(get_the_id(), '_techeduem_title_wrapper_padding_on_phone', true);

		$techeduem_theme_title_wrap_padding_on_phone = (isset($techeduem_opt['techeduem_title_wrap_padding_on_phone'])) ? $techeduem_opt['techeduem_title_wrap_padding_on_phone'] : '';
		$rppt = (!empty($techeduem_page_title_wrapper_padding_on_phone['padding-top'])) ? $techeduem_page_title_wrapper_padding_on_phone['padding-top'] : '';
		$rppr = (!empty($techeduem_page_title_wrapper_padding_on_phone['padding-right'])) ? $techeduem_page_title_wrapper_padding_on_phone['padding-right'] : '';
		$rppb = (!empty($techeduem_page_title_wrapper_padding_on_phone['padding-bottom'])) ? $techeduem_page_title_wrapper_padding_on_phone['padding-bottom'] : '';
		$rppl = (!empty($techeduem_page_title_wrapper_padding_on_phone['padding-left'])) ? $techeduem_page_title_wrapper_padding_on_phone['padding-left'] : '';
		$rtpt = (isset($techeduem_theme_title_wrap_padding_on_phone['padding-top'])) ? $techeduem_theme_title_wrap_padding_on_phone['padding-top'] : '';
		$rtpr = (isset($techeduem_theme_title_wrap_padding_on_phone['padding-right'])) ? $techeduem_theme_title_wrap_padding_on_phone['padding-right'] : '';
		$rtpb = (isset($techeduem_theme_title_wrap_padding_on_phone['padding-bottom'])) ? $techeduem_theme_title_wrap_padding_on_phone['padding-bottom'] : '';
		$rtpl = (isset($techeduem_theme_title_wrap_padding_on_phone['padding-left'])) ? $techeduem_theme_title_wrap_padding_on_phone['padding-left'] : '';

		$rphpt = '';
		if ($rppt) {
			$rphpt = '.page__title__wrapper .page__title__inner{
			padding-top:' . $rppt . 'px; 
		}';
		} else {
			if ($rtpt) {
				$rphpt = '.page__title__wrapper .page__title__inner{
				padding-top:' . $rtpt . '; 
			}';
			}
		}

		$rphpr = '';
		if ($rppr) {
			$rphpr = '.page__title__wrapper .page__title__inner{
			padding-right:' . $rppr . 'px; 
		}';
		} else {
			if ($rtpr) {
				$rphpr = '.page__title__wrapper .page__title__inner{
				padding-right:' . $rtpr . '; 
			}';
			}
		}

		$rphpb = '';
		if ($rppb) {
			$rphpb = '.page__title__wrapper .page__title__inner{
			padding-bottom:' . $rppb . 'px; 
		}';
		} else {
			if ($rtpb) {
				$rphpb = '.page__title__wrapper .page__title__inner{
				padding-bottom:' . $rtpb . '; 
			}';
			}
		}

		$rphpl = '';
		if ($rppl) {
			$rphpl = '.page__title__wrapper .page__title__inner{
			padding-left:' . $rppl . 'px; 
		}';
		} else {
			if ($rtpl) {
				$rphpl = '.page__title__wrapper .page__title__inner{
				padding-left:' . $rtpl . '; 
			}';
			}
		}
		/**
		 * Page Header Background Options
		 */
		$techeduem_page_title_wrapper_background = get_post_meta(get_the_id(), '_techeduem_title_wrapper_background', true);
		$page_header_bg_color = $po_background_color = $to_background_color = $page_header_bg_repeat = $po_background_repeat = $to_background_repeat = $page_header_bg_size = $po_background_size = $to_background_size = $page_header_bg_attachment = $po_background_attachment = $to_background_attachment = $to_background_position = $page_header_bg_image = $po_background_image = $to_background_image = $page_header_bg_position = '';

		if (isset($techeduem_page_title_wrapper_background)) {
			$po_background_color = (!empty($techeduem_page_title_wrapper_background['background-color'])) ? $techeduem_page_title_wrapper_background['background-color'] : '';
			$po_background_repeat = (!empty($techeduem_page_title_wrapper_background['background-repeat'])) ? $techeduem_page_title_wrapper_background['background-repeat'] : '';
			$po_background_size = (!empty($techeduem_page_title_wrapper_background['background-size'])) ? $techeduem_page_title_wrapper_background['background-size'] : '';
			$po_background_attachment = (!empty($techeduem_page_title_wrapper_background['background-attachment'])) ? $techeduem_page_title_wrapper_background['background-attachment'] : '';
			$po_background_position = (!empty($techeduem_page_title_wrapper_background['background-position'])) ? $techeduem_page_title_wrapper_background['background-position'] : '';
			$po_background_image = (!empty($techeduem_page_title_wrapper_background['background-image'])) ? $techeduem_page_title_wrapper_background['background-image'] : '';
		}

		if (isset($techeduem_opt['techeduem_title_wrap_background'])) {
			$to_background_color = (isset($techeduem_opt['techeduem_title_wrap_background']['background-color'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-color'] : '';
			$to_background_repeat = (isset($techeduem_opt['techeduem_title_wrap_background']['background-repeat'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-repeat'] : '';
			$to_background_size = (isset($techeduem_opt['techeduem_title_wrap_background']['background-size'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-size'] : '';
			$to_background_attachment = (isset($techeduem_opt['techeduem_title_wrap_background']['background-attachment'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-attachment'] : '';
			$to_background_position = (isset($techeduem_opt['techeduem_title_wrap_background']['background-position'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-position'] : '';
			$to_background_image = (isset($techeduem_opt['techeduem_title_wrap_background']['background-image'])) ? $techeduem_opt['techeduem_title_wrap_background']['background-image'] : '';
		}

		/**
		 * Background Color
		 */
		if ($po_background_color) {
			$page_header_bg_color = 'section.page__title__wrapper{
			background-color:' . $po_background_color . '; 
		}';
		} else {
			if ($to_background_color) {
				$page_header_bg_color = 'section.page__title__wrapper{
				background-color:' . $to_background_color . '; 
			}';
			}
		}
		/**
		 * Background Repeat
		 */
		if ($po_background_repeat) {
			$page_header_bg_repeat = 'section.page__title__wrapper{
			background-repeat:' . $po_background_repeat . '; 
		}';
		} else {
			if ($to_background_repeat) {
				$page_header_bg_repeat = 'section.page__title__wrapper{
				background-repeat:' . $to_background_repeat . '; 
			}';
			}
		}
		/**
		 * Background Size
		 */
		if ($po_background_size) {
			$page_header_bg_size = 'section.page__title__wrapper{
			background-size:' . $po_background_size . '; 
		}';
		} else {
			if ($to_background_size) {
				$page_header_bg_size = 'section.page__title__wrapper{
				background-size:' . $to_background_size . '; 
			}';
			}
		}
		/**
		 * Background Attachment
		 */
		if ($po_background_attachment) {
			$page_header_bg_attachment = 'section.page__title__wrapper{
			background-attachment:' . $po_background_attachment . '; 
		}';
		} else {
			if ($to_background_attachment) {
				$page_header_bg_attachment = 'section.page__title__wrapper{
				background-attachment:' . $to_background_attachment . '; 
			}';
			}
		}
		/**
		 * Background Position
		 */
		if ($po_background_position) {
			$page_header_bg_position = 'section.page__title__wrapper{
			background-position:' . $po_background_position . '; 
		}';
		} else {
			if ($to_background_position) {
				$page_header_bg_position = 'section.page__title__wrapper{
				background-position:' . $to_background_position . '; 
			}';
			}
		}
		/**
		 * Background Image
		 */
		if ($po_background_image) {
			$page_header_bg_image = 'section.page__title__wrapper{
			background-image: url( ' . $po_background_image . '); 
		}';
		} else {
			if ($to_background_image) {
				$page_header_bg_image = 'section.page__title__wrapper{
				background-image: url( ' . $to_background_image . '); 
			}';
			}
		}
		/**
		 * Page Header Overlay
		 */
		$techeduem_page_title_wrapper_overlay = get_post_meta(get_the_id(), '_techeduem_title_wrapper_overlay', true);
		$page_header_overlay_color = $po_overlay_color = $to_overlay_color = '';

		if (isset($techeduem_page_title_wrapper_overlay)) {
			$po_overlay_color = (!empty($techeduem_page_title_wrapper_overlay['color'])) ? $techeduem_page_title_wrapper_overlay['color'] : '';
		}
		if (isset($techeduem_opt['techeduem_title_wrap_background_overlay'])) {
			$to_overlay_color = ($techeduem_opt['techeduem_title_wrap_background_overlay']) ? $techeduem_opt['techeduem_title_wrap_background_overlay']['rgba'] : '';
		}
		if ($po_overlay_color) {
			$page_header_overlay_color = 'section.page__title__wrapper:before{
			background-color: ' . $po_overlay_color . '; 
		}';
		} else {
			if ($to_overlay_color) {
				$page_header_overlay_color = 'section.page__title__wrapper:before{
				background-color: ' . $to_overlay_color . '; 
			}';
			}
		}
		/**
		 * Container width
		 */

		$container_width = (isset($techeduem_opt['techeduem_layout_page']) && !empty($techeduem_opt['techeduem_layout_page'])) ? $techeduem_opt['techeduem_layout_page'] : '';
		$container_width_value = '';
		if ($container_width) {
			$container_width_value = '.wide-layout .container {
			width: ' . $container_width . 'px;
		 }';
		}

		/**
		 * Container width
		 */
		$boxlayout_box_width = $boxlayout_container_width = $boxlayout_container_width_value = $boxlayout_box_width_value = '';
		$boxlayout_container_width = '';
		if (isset($techeduem_opt['techeduem_boxlayout_box_width'])) {
			$boxlayout_box_width = $techeduem_opt['techeduem_boxlayout_box_width'];
			$boxlayout_container_width = $boxlayout_box_width;
		}

		if ('' != $boxlayout_box_width) {
			$boxlayout_box_width_value = '.site-wrapper.boxed-layout, .boxed-layout .is-sticky{
		    max-width: ' . $boxlayout_box_width . 'px;
		}';
		}

		if ('' != $boxlayout_box_width) {
			$boxlayout_container_width_value = '.site-wrapper.boxed-layout .container, 
		.boxed-layout .is-sticky .container{
		    width: calc( ' . $boxlayout_container_width . 'px - 30px );
		}';
		}


		/**  
		 * Page content padding
		 */
		$techeduem_po_content_padding = get_post_meta(get_the_id(), '_techeduem_content_padding', true);
		$techeduem_to_content_padding = (isset($techeduem_opt['techeduem_page_layout_padding'])) ? $techeduem_opt['techeduem_page_layout_padding'] : '';
		$pcpt = (!empty($techeduem_po_content_padding['padding-top'])) ? $techeduem_po_content_padding['padding-top'] : '';
		$pcpr = (!empty($techeduem_po_content_padding['padding-right'])) ? $techeduem_po_content_padding['padding-right'] : '';
		$pcpb = (!empty($techeduem_po_content_padding['padding-bottom'])) ? $techeduem_po_content_padding['padding-bottom'] : '';
		$pcpl = (!empty($techeduem_po_content_padding['padding-left'])) ? $techeduem_po_content_padding['padding-left'] : '';
		$tcpt = (isset($techeduem_to_content_padding['padding-top'])) ? $techeduem_to_content_padding['padding-top'] : '';
		$tcpr = (isset($techeduem_to_content_padding['padding-right'])) ? $techeduem_to_content_padding['padding-right'] : '';
		$tcpb = (isset($techeduem_to_content_padding['padding-bottom'])) ? $techeduem_to_content_padding['padding-bottom'] : '';
		$tcpl = (isset($techeduem_to_content_padding['padding-left'])) ? $techeduem_to_content_padding['padding-left'] : '';

		$pcptv = '';
		if (!empty($pcpt)) {
			$pcptv = '.page-wrapper{
			padding-top:' . $pcpt . 'px; 
		}';
		} else {
			if (!empty($tcpt)) {
				$pcptv = '.page-wrapper{
				padding-top:' . $tcpt . '; 
			}';
			}
		}

		$pcprv = '';
		if (!empty($pcpr)) {
			$pcprv = '.page-wrapper{
			padding-right:' . $pcpr . 'px; 
		}';
		} else {
			if (!empty($tcpr)) {
				$pcprv = '.page-wrapper{
				padding-right:' . $tcpr . '; 
			}';
			}
		}

		$pcpbv = '';
		if (!empty($pcpb)) {
			$pcpbv = '.page-wrapper{
			padding-bottom:' . $pcpb . 'px; 
		}';
		} else {
			if (!empty($tcpb)) {
				$pcpbv = '.page-wrapper{
				padding-bottom:' . $tcpb . '; 
			}';
			}
		}

		$pcplv = '';
		if (!empty($pcpl)) {
			$pcplv = '.page-wrapper{
			padding-left:' . $pcpl . 'px; 
		}';
		} else {
			if (!empty($tcpl)) {
				$pcplv = '.page-wrapper{
				padding-left:' . $tcpl . '; 
			}';
			}
		}

		/**
		 * Page Content Width
		 */
		$page_content_width = '';
		if (isset($techeduem_opt['techeduem_enable_page_content_full_width']) && 'yes' == $techeduem_opt['techeduem_enable_page_content_full_width']) {
			$page_content_width = '
			.site-content .page-wrapper > .container
			{ 
				width: 100%;
    			max-width: 100%;
			}';
		}

		/**
		 * Default Footer Background Overlay
		 */
		$default_foo_overlay_color = $default_foo_overlay_color_rgba = '';
		if (isset($techeduem_opt['techeduem_footer_overlay_color']['rgba'])) {
			$default_foo_overlay_color_rgba = $techeduem_opt['techeduem_footer_overlay_color']['rgba'];
		}
		if ($default_foo_overlay_color_rgba) {
			$default_foo_overlay_color = '.footer-top-section{
			background-color:' . $default_foo_overlay_color_rgba . '; 
		}';
		}

		/**
		 * Layout Background
		 */
		$page_body_background = get_post_meta(get_the_id(), '_techeduem_page_background', true);

		if (isset($page_body_background)) {
			$pob_background_color = (!empty($page_body_background['background-color'])) ? $page_body_background['background-color'] : '';
			$pob_background_repeat = (!empty($page_body_background['background-repeat'])) ? $page_body_background['background-repeat'] : '';
			$pob_background_size = (!empty($page_body_background['background-size'])) ? $page_body_background['background-size'] : '';
			$pob_background_attachment = (!empty($page_body_background['background-attachment'])) ? $page_body_background['background-attachment'] : '';
			$pob_background_position = (!empty($page_body_background['background-position'])) ? $page_body_background['background-position'] : '';
			$pob_background_image = (!empty($page_body_background['background-image'])) ? $page_body_background['background-image'] : '';
		}
		/**
		 * Background Color
		 */
		$pob_background_color_var = '';
		if ('' != $pob_background_color) {
			$pob_background_color_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-color:' . $pob_background_color . '; 
		}';
		}
		/**
		 * Background Repeat
		 */
		$pob_background_repeat_var = '';
		if ('' != $pob_background_repeat) {
			$pob_background_repeat_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-repeat:' . $pob_background_repeat . '; 
		}';
		}
		/**
		 * Background Size
		 */
		$pob_background_size_var = '';
		if ('' != $pob_background_size) {
			$pob_background_size_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-size:' . $pob_background_size . '; 
		}';
		}
		/**
		 * Background Attachment
		 */
		$pob_background_attachment_var = '';
		if ('' != $pob_background_attachment) {
			$pob_background_attachment_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-attachment:' . $pob_background_attachment . '; 
		}';
		}
		/**
		 * Background Position
		 */
		$pob_background_position_var = '';
		if ('' != $pob_background_position) {
			$pob_background_position_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-position:' . $pob_background_position . '; 
		}';
		}
		/**
		 * Background Image
		 */
		$pob_background_image_var = '';
		if ('' != $pob_background_image) {
			$pob_background_image_var = 'hrml body, html body.wide-layout-active, html body.boxed-layout-active {
			background-image: url( ' . $pob_background_image . '); 
		}';
		}
		/**
		 * Preloader Element Color
		 */
		$preloader_element_color = (isset($techeduem_opt['techeduem_preloader_element_color'])) ? $techeduem_opt['techeduem_preloader_element_color'] : '';
		$preloader_element_bd_colors = $preloader_element_bg_colors = '';
		if ('' != $preloader_element_color) {
			$preloader_element_bd_colors = ' .pre_object{
			border-left-color: ' . $preloader_element_color . '; 
			border-top-color: ' . $preloader_element_color . '; 
		}';
		}

		if ('' != $preloader_element_color) {
			$preloader_element_bg_colors = ' .object2{
			background-color: ' . $preloader_element_color . ';
		}';
		}

		/**
		 * Blog Title Wrapper Overlay
		 */
		$blog_title_wrap_overlay_color = $blog_title_wrap_overlay = '';
		if (isset($techeduem_opt['techeduem_blog_banner_overlay_color'])) {
			$blog_title_wrap_overlay = ($techeduem_opt['techeduem_blog_banner_overlay_color']) ? $techeduem_opt['techeduem_blog_banner_overlay_color']['rgba'] : '';
		}
		if ('' != $blog_title_wrap_overlay) {
			$blog_title_wrap_overlay_color = 'section.page__title__wrapper.blog-page:before{
			background-color: ' . $blog_title_wrap_overlay . '; 
		}';
		}

		/**
		 * Single Post Title Wrapper Overlay
		 */
		$single_post_title_wrap_overlay_color = $single_post_title_wrap_overlay = '';
		if (isset($techeduem_opt['techeduem_single_post_title_wrap_overlay'])) {
			$single_post_title_wrap_overlay = ($techeduem_opt['techeduem_single_post_title_wrap_overlay']) ? $techeduem_opt['techeduem_single_post_title_wrap_overlay']['rgba'] : '';
		}
		if ('' != $single_post_title_wrap_overlay) {
			$single_post_title_wrap_overlay_color = 'section.page__title__wrapper.single-post:before{
			background-color: ' . $single_post_title_wrap_overlay . '; 
		}';
		}

		/**
		 * Enable Breadcrumbs Mobile
		 */
		$enable_breadcrumbs_mobile = (isset($techeduem_opt['techeduem_breadcrumbs_mobile'])) ? $techeduem_opt['techeduem_breadcrumbs_mobile'] : '';
		$enable_breadcrumbs_on_mobile = '';
		if (false == $enable_breadcrumbs_mobile) {
			$enable_breadcrumbs_on_mobile = '@media (max-width: 767px) {
			.breadcrumbs_wrap{
				display: none;
			}
		}';
		}

		/**
		 * Logo Height
		 */
		$logo_height_val = '';
		$logo_height = isset($techeduem_opt['techeduem_logo_max_height']) ? $techeduem_opt['techeduem_logo_max_height'] : '';
		if ('' != $logo_height) {
			$logo_height_val = '.header-menu-wrap .site-title a img{
			max-height: ' . $logo_height . 'px; 
		}';
		}

		/**
		 * Theme Color Options
		 */
		$primary_color = (isset($techeduem_opt['techeduem_primary_color'])) ? $techeduem_opt['techeduem_primary_color'] : '';
		$courses_color = (isset($techeduem_opt['techeduem_courses_color'])) ? $techeduem_opt['techeduem_courses_color'] : '';
		$menu_hover_active_color = (isset($techeduem_opt['techeduem_menu_hover_color'])) ? $techeduem_opt['techeduem_menu_hover_color'] : '';

		/**
		 * Primary Color 
		 */
		$theme_pri_color = '';
		if ($primary_color) {
			$theme_pri_color = '
			.blog-meta a:hover,.post-pagination .nav-links > ul > li > span.current,.post-pagination .nav-links > ul > li:hover a,.pagination > a:hover,.page-links > span:not(.page-links-title):hover,.page-links > a:hover,.type-post.tag-sticky-2 .blog-content:before,.header-info a:hover, .header-social ul li a:hover,.sticky .blog-item .content .title a, .tag-sticky-2 .blog-item .content .title a,.sticky .blog-item .content .title:before, .tag-sticky-2 .blog-item .content .title:before,.blog-item .content .read-more,.blog-item .content .title a:hover,.education-image-hover span:hover,.education-teacher-column-carousel-text .social-links ul li a:hover i , .education-event-features-info h3.title,.education-event-features-info ul li i,span.education-schedule-time,.blog-item .content .meta li a:hover,a:hover, a:focus,.footer-widget ul li a:hover,.footer-widget .sub-menu li.active > a, .footer-widget .sub-menu li:hover > a, .footer-widget.widget_calendar tbody td#today,.footer-widget .sub-menu li.active > a, .footer-widget .sub-menu li:hover > a, .footer-widget.widget_calendar tbody td#today,.single-blog-item .content .meta li a:hover , .breadcrumbs_wrap ul li a:hover, .breadcrumbs_wrap ul li:last-child,.single-blog-item .content .blog-footer .post-tags .tag li a:hover,.product-item .product-inner .content .title a:hover,.product-details .share-icons a:hover,a.meanmenu-reveal:hover, a.meanmenu-reveal:focus,.mean-nav a.mean-expand:hover
			{
				color:' . $primary_color . '; 
			}';
		}
		/**
		 * Primary Background Color 
		 */
		$theme_pri_bg_color = '';
		if ($primary_color) {
			$theme_pri_bg_color = '
		.footer-wrapper .default-footer,.education-teachers-image-column a span span,.education-single-teachers-column:hover .education-teacher-column-carousel-text:after,.education-filter-menu-list button.is-checked:after,.education-newsletter-container .button-default,.education-event-features-info .book-btn a,.sidebar h3.title::before,.tagcloud a:hover,.header-search-icon-default .sidebar-trigger-search,.next-prev a:hover,.comment-form input[type="submit"]:hover,.woocommerce button.button.alt.single_add_to_cart_button,.education-newsletter-container .button-default,.education-class-details-tab table thead,::selection
		{
			background-color:' . $primary_color . ' !important; 
		}';
		}
		/**
		 * Primary Border Color 
		 */
		$theme_pri_border_color = '';
		if ($primary_color) {
			$theme_pri_border_color = '
			.type-post.tag-sticky-2 .blog-content, .post-pagination .nav-links > ul > li > span.current, .post-pagination .nav-links > ul > li:hover a,.pagination > a:hover,.page-links > span:not(.page-links-title):hover,.page-links > a:hover,article.singel_blog_items.sticky, article.singel_blog_items.tag-sticky-2,.tagcloud a:hover,.woocommerce button.button.alt.single_add_to_cart_button,.sidebar-title::after
			{
				border-color:' . $primary_color . '; 
			}';
		}


		/**
		 * Courses Color
		 */
		$theme_cour_color = '';
		if ($courses_color) {
			$theme_cour_color = '
			.education-class-details-tab span.icon:after,.wp-education-box h3 a:hover
			{
				color:' . $courses_color . ' !important; 
			}';
		}
		/**
		 * Primary Background Color 
		 */
		$theme_cour_bg_color = '';
		if ($courses_color) {
			$theme_cour_bg_color = '
		.education-section-title-one.border-bg h1::before,.education-class-details-tab-menu li > a.active:after,.education-single-widget-container .button-default,.education-indicator-style-two .slick-arrow:hover
		{
			background-color:' . $courses_color . '; 
		}';
		}
		/**
		 * Primary Border Color 
		 */
		$theme_cour_border_color = '';
		if ($courses_color) {
			$theme_cour_border_color = '
			.education-indicator-style-two .slick-arrow:hover
			{
				border-color:' . $courses_color . '; 
			}';
		}

		/**
		 * Menu Hover and Active Color
		 */
		$menu_active_color = '';
		if ($menu_hover_active_color) {
			$menu_active_color = '
			.primary-nav-wrap nav ul > li:hover > a,.primary-nav-wrap.default-menu nav > ul > li > a:hover,.primary-nav-wrap.default-menu nav > ul > li.current-menu-item > a , .primary-nav-wrap.default-menu nav ul li ul.sub-menu li.current-menu-item > a , .primary-nav-wrap.default-menu nav > ul > li.current-menu-parent > a,.primary-nav-wrap .sub-menu li.active > a, .primary-nav-wrap .sub-menu li:hover > a,.mobile-menu .mean-bar .mean-nav > ul li a:hover
			{
				color:' . $menu_hover_active_color . '; 
			}';
		}
		/**
		 * Secondary Background Color 
		 */
		$menu_active_bg_color = '';
		if ($menu_hover_active_color) {
			$menu_active_bg_color = '
			
			{
				background-color:' . $menu_hover_active_color . '; 
			}';
		}
		/**
		 * Secondary Border Color 
		 */
		$menu_active_border_color = '';
		if ($menu_hover_active_color) {
			$menu_active_border_color = '
				.primary-nav-wrap .sub-menu
				{
					border-color:' . $menu_hover_active_color . '; 
				}';
		}

		/**
		 * Reader Style 
		 */
		$custom_css = "
		$container_width_value
		$page_content_width
		$boxlayout_box_width_value
		$boxlayout_container_width_value

		$pcptv
		$pcprv
		$pcpbv
		$pcplv
		
		$pnmff
		$pnmfw
		$pnmtt
		$pnmfs
		$pnmfsz
		$pnmlh
		$pnmls

		$ptff
		$ptfw
		$pttt
		$ptfs
		$ptfsz
		$ptlh
		$ptls
		$ptcl

		$pstff
		$pstfw
		$psttt
		$pstfs
		$pstfsz
		$pstlh
		$pstls
		$pstcl

		$phpt 
		$phpr 
		$phpb 
		$phpl 
		@media (max-width: 767px) { 
			$rphpt 
			$rphpr 
			$rphpb 
			$rphpl
		}
		$page_header_bg_color
		$page_header_bg_repeat
		$page_header_bg_size
		$page_header_bg_attachment
		$page_header_bg_position
		$page_header_bg_image
		$page_header_overlay_color
		$default_foo_overlay_color
		
		$theme_pri_color
		$theme_pri_bg_color
		$theme_pri_border_color
		
		$theme_cour_color
		$theme_cour_bg_color
		$theme_cour_border_color
		
		$menu_active_color
		$menu_active_bg_color
		$menu_active_border_color
		
		$pob_background_color_var
		$pob_background_repeat_var
		$pob_background_size_var
		$pob_background_attachment_var
		$pob_background_position_var
		$pob_background_image_var
		$preloader_element_bd_colors
		$preloader_element_bg_colors
		$blog_title_wrap_overlay_color
		$single_post_title_wrap_overlay_color
		$enable_breadcrumbs_on_mobile
		$logo_height_val
		
		";
		wp_add_inline_style('techeduem-dynamic-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'techeduem_styles_method', 200);
