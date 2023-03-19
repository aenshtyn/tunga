<?php

/**
 * Get Custom Post Type 
 */
function techeduemget_posttype_options($argument)
{
	$get_post_args = array(
		'post_type' => $argument,
	);
	$options = array();
	array_push($options, esc_html__('--- Select ---', 'techeduem'));
	foreach (get_posts($get_post_args) as $post) {
		$title = get_the_title($post->ID);
		$options[$post->ID] =  $title;
	}
	return $options;
}

/**
 * Start Meta fields
 */

add_filter('cmb2_init', 'techeduem_metaboxes');
function techeduem_metaboxes()
{
	$prefix = '_techeduem_';

	/**
	 * Post Format
	 */
	$posts_format = new_cmb2_box(array(
		'id'           		 => $prefix . '_techeduem_post_format_optons',
		'title'        		 => esc_html__('Post Format Additional Fields', 'techeduem'),
		'object_types' 		 => array('post'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	));

	$posts_format->add_field(array(
		'name'               => esc_html__('Video URL', 'techeduem'),
		'id'                 => $prefix . 'video_url',
		'type'        		 => 'oembed',
	));
	$posts_format->add_field(array(
		'name'               => esc_html__('Upload Video', 'techeduem'),
		'desc'				 => esc_html__('Use this option when the video does not come from URL', 'techeduem'),
		'id'                 => $prefix . 'local_video_url',
		'type'        		 => 'file',
		'text'    			 => array(
			'add_upload_file_text' => esc_html__('Upload Video', 'techeduem'),
		),
	));

	$posts_format->add_field(array(
		'name'               => esc_html__('Audio URL', 'techeduem'),
		'desc'    			 => esc_html__('Insert your Audio file URL', 'techeduem'),
		'id'                 => $prefix . 'audio_url',
		'type'        		 => 'oembed',
	));

	$posts_format->add_field(array(
		'name'               => esc_html__('Quote Cite', 'techeduem'),
		'desc'    			 => esc_html__('Insert your Cite', 'techeduem'),
		'id'                 => $prefix . 'city_text',
		'type'        		 => 'text',
	));

	$posts_format->add_field(array(
		'name'               => esc_html__('Gallery Slider', 'techeduem'),
		'id'                 => $prefix . 'gallery_slider',
		'type'        		 => 'file_list',
		'preview_size' 		 => array(150, 150),
	));

	/** 
	 * Post Extra Options
	 */
	$posts = new_cmb2_box(array(
		'id'           		 => $prefix . '_techeduem_post_extra_optons',
		'title'        		 => esc_html__('Post Settings', 'techeduem'),
		'object_types' 		 => array('post'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	));

	$posts->add_field(array(
		'name'               =>  esc_html__('Select Page Layout', 'techeduem'),
		'id'                 => $prefix . 'post_layout',
		'type'        		 => 'select',
		'default'     		 => 'default',
		'options'     		 => array(
			''     	 		=> esc_html__('Select Layout', 'techeduem'),
			'full'     	 	=> esc_html__('Full Width', 'techeduem'),
			'left'       	=> esc_html__('Left Sidebar', 'techeduem'),
			'right'       	=> esc_html__('Right Sidebar', 'techeduem'),
		),
	));

	/**
	 * Start Page options [tab]
	 */
	$page_metabox_options = array(
		'id'           		 => $prefix . '_page_optons',
		'title'        		 => esc_html__('Page Options', 'techeduem'),
		'object_types' 		 => array('post', 'page'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	);

	// Setup meta box
	$page_options = new_cmb2_box($page_metabox_options);


	// Setting tabs
	$tabs_setting      = array(
		'config' 	=> $page_metabox_options,
		'layout' 	=> 'vertical', // Default : horizontal
		'tabs'  	=> array()
	);

	// Page Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix . 'page',
		'title'  => esc_html__('Page', 'techeduem'),
		'fields' => array(
			array(
				'name'    		=> esc_html__('Layout Width', 'techeduem'),
				'desc'    		=> esc_html__('Select the site layout. if the default is chosen the theme options will work.', 'techeduem'),
				'id'      		=> $prefix . 'layout_width',
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 				=> esc_html__('Default', 'techeduem'),
					'boxed' 		=> esc_html__('Boxed', 'techeduem'),
					'full-width' 	=> esc_html__('Full Width', 'techeduem'),
				),
				'default' 		=> 'default',
			),
			array(
				'id'      		=> $prefix . 'content_padding',
				'name'    		=> esc_html__('Content Padding', 'techeduem'),
				'type'    		=> 'padding',
			),
			array(
				'id'      		=> $prefix . 'page_background',
				'name'    		=> esc_html__('Background', 'techeduem'),
				'type'    		=> 'background',
			),
		)
	);
	// Header Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix . 'header',
		'title'  => esc_html__('Header', 'techeduem'),
		'fields' => array(
			array(
				'id'      		=> $prefix . 'enable_topbar',
				'name'    		=> esc_html__('Top Bar', 'techeduem'),
				'desc'    		=> esc_html__('Enable or disable top bar. if the default is chosen the theme options will work.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__('Default', 'techeduem'),
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
				'default' 		=> 'default',
			),
			array(
				'id'      		=> $prefix . 'enable_header',
				'name'    		=> esc_html__('Enable Header', 'techeduem'),
				'desc'    		=> esc_html__('Enable or disable header. if the default is chosen the theme options will work.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__('Default', 'techeduem'),
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
			),
			array(
				'id' 			=> $prefix . 'select_header_style_type',
				'name' 			=> esc_html__('Header Type', 'techeduem'),
				'desc'    		=> esc_html__('Select header type, if the default is chosen the existing options below will work, or choose the custom option to get headers from header post type.', 'techeduem'),
				'type' 			=> 'radio_inline',
				'options'         => array(
					'default'     => esc_html__('Default', 'techeduem'),
					'custom'      => esc_html__('Custom', 'techeduem'),
				),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'enable_header',
					'data-conditional-value' => 'yes',
				),
			),
			array(
				'id' 		=> $prefix . 'header_default_layout_style',
				'name' 		=> esc_html__('Header Layout', 'techeduem'),
				'desc' 		=> esc_html__('Choose the header layout.', 'techeduem'),
				'type' 		=> 'image_select',
				'options' => array(
					'style_1' => array(
						'title'		=> 'Header Layout One',
						'alt' 		=> 'Header Layout One',
						'img' 		=> get_template_directory_uri() . '/images/optionframework/header/style1.png'
					),
					'style_2' => array(
						'title' 	=> 'Header Layout Two',
						'alt' 		=> 'Header Layout Two',
						'img' 		=> get_template_directory_uri() . '/images/optionframework/header/style2.png'
					),
					'style_3' => array(
						'title' 	=> 'Header Layout Three',
						'alt' 		=> 'Header Layout Three',
						'img' 		=> get_template_directory_uri() . '/images/optionframework/header/style3.png'
					),
					'style_4' => array(
						'title' 	=> 'Header Layout Four',
						'alt' 		=> 'Header Layout Four',
						'img' 		=> get_template_directory_uri() . '/images/optionframework/header/style4.png'
					),
					'style_5' => array(
						'title' 	=> 'Header Layout Five',
						'alt' 		=> 'Header Layout Five',
						'img' 		=> get_template_directory_uri() . '/images/optionframework/header/style5.png'
					),
				),
				'default' => '',
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_header_style_type',
					'data-conditional-value' => 'default',
				),
			),
			array(
				'id' 			=> $prefix . 'select_menu',
				'name' 			=> esc_html__('Select Menu', 'techeduem'),
				'desc' 			=> esc_html__('Override the primary menu by selecting one of these. if nothing is selected primary menu will work.', 'techeduem'),
				'type' 			=> 'select',
				'options' 		=> techeduem_get_terms_gb('nav_menu'),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_header_style_type',
					'data-conditional-value' => 'default',
				),
			),
			array(
				'id' 			=> $prefix . 'select_header_template',
				'name' 			=> esc_html__('Select Header Style', 'techeduem'),
				'desc' 			=> esc_html__('Select the header template/style that you made in the header post type.', 'techeduem'),
				'type' 			=> 'select',
				'options' 		=> techeduemget_posttype_options('techeduem_header'),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_header_style_type',
					'data-conditional-value' => 'custom',
				),
			),
			array(
				'id' 			=> $prefix . 'header_full_width',
				'name' 			=> esc_html__('Header Full Width', 'techeduem'),
				'desc' 			=> esc_html__('Enable full width of the header.', 'techeduem'),
				'type' 			=> 'radio_inline',
				'options'         => array(
					'yes'     => esc_html__('Yes', 'techeduem'),
					'no'      => esc_html__('No', 'techeduem'),
				),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_header_style_type',
					'data-conditional-value' => 'default',
				),
			),

		)
	);
	// Page Title Wrapper
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix . 'title_wrapper',
		'title'  => esc_html__('Title Wrapper', 'techeduem'),
		'fields' => array(
			array(
				'id'      		=> $prefix . 'title_wrapper_enable',
				'name'    		=> esc_html__('Title Wrapper Enable', 'techeduem'),
				'desc'    		=> esc_html__('Enable or Disable the page title area.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				)
			),
			array(
				'id'      		=> $prefix . 'title_enable',
				'name'    		=> esc_html__('Title Enable', 'techeduem'),
				'desc'    		=> esc_html__('Enable or Disable the page title.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
			),
			array(
				'id'                 => $prefix . 'custom_title',
				'name'               => esc_html__('Custom Title', 'techeduem'),
				'desc'               => esc_html__('If this field is empty, then default page/post title will be showed', 'techeduem'),
				'type'               => 'text',
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'title_enable',
					'data-conditional-value' => 'yes',
				),
			),
			array(
				'id'                 => $prefix . 'title_typography',
				'name'               => esc_html__('Title Typography', 'techeduem'),
				'desc'               => esc_html__('Controls the typography settings of the page title.', 'techeduem'),
				'type'               => 'typography',
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'title_enable',
					'data-conditional-value' => 'yes',
				),
			),
			array(
				'id'      		=> $prefix . 'sub_title_enable',
				'name'    		=> esc_html__('Sub Title Enable', 'techeduem'),
				'desc'    		=> esc_html__('Enable or Disable the page subtitle.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
			),
			array(
				'id'                 => $prefix . 'custom_sub_title',
				'name'               => esc_html__('Custom Sub Title', 'techeduem'),
				'desc'               => esc_html__('Set the custom sub title of the page.', 'techeduem'),
				'type'               => 'wysiwyg',
				'options' 			 => array(
					'wpautop'    => 	false,
					'textarea_rows'    => 	get_option('default_post_edit_rows', 10),
				),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'sub_title_enable',
					'data-conditional-value' => 'yes',
				),
			),
			array(
				'id'                 => $prefix . 'sub_title_typography',
				'name'               => esc_html__('Sub Title Typography', 'techeduem'),
				'desc'               => esc_html__('Controls the typography settings of the page subtitle.', 'techeduem'),
				'type'               => 'typography',
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'sub_title_enable',
					'data-conditional-value' => 'yes',
				),
			),
			array(
				'id'      		=> $prefix . 'breadcrumbs_enable',
				'name'    		=> esc_html__('Breadcrumbs Enable', 'techeduem'),
				'desc'    		=> esc_html__('Enable or Disable the breadcrumbs.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
			),
			array(
				'id'      		=> $prefix . 'breadcrumbs_enable_on_phone',
				'name'    		=> esc_html__('Breadcrumbs Mobile Devices Enable', 'techeduem'),
				'desc'    		=> esc_html__('Enable or disable to display breadcrumb on mobile devices.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
				'default' 		=> 'yes',
			),
			array(
				'id'                 => $prefix . 'breadcrumbs_separator',
				'name'               => esc_html__('Breadcrumb Separator', 'techeduem'),
				'desc'               => esc_html__('Set the breadcrumb separator here.', 'techeduem'),
				'type'               => 'text',
			),
			array(
				'id'                 => $prefix . 'breadcrumbs_typography',
				'name'               => esc_html__('Breadcrumbs Typography', 'techeduem'),
				'desc'               => esc_html__('Controls the typography settings of the page breadcrumbs.', 'techeduem'),
				'type'               => 'typography',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_content_aligment',
				'name'               => esc_html__('Content Alignment', 'techeduem'),
				'desc'               => esc_html__('Controls the content alignment of the page title. if the default is chosen the theme options will work.', 'techeduem'),
				'type'               => 'radio_inline',
				'options' 			=> array(
					'text-default' 		=> esc_html__('Default', 'techeduem'),
					'text-left' 		=> esc_html__('Left', 'techeduem'),
					'text-center' 		=> esc_html__('Center', 'techeduem'),
					'text-right' 		=> esc_html__('Right', 'techeduem'),
				),
				'default' 		=> 'text-default',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_full_width',
				'name'               => esc_html__('Title Wrapper Full Width', 'techeduem'),
				'desc'               => esc_html__('Enable to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'techeduem'),
				'type'               => 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__('Default', 'techeduem'),
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
				'default' 		=> 'default',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_height',
				'name'               => esc_html__('Title Wrapper Height', 'techeduem'),
				'type'               => 'select',
				'options'               => array(
					'default-height'         => esc_html__('Default', 'techeduem'),
					'half-height'            => esc_html__('Half Height', 'techeduem'),
					'full-height'            => esc_html__('Full Height', 'techeduem'),
				),
				'default'               => 'default-height',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_padding',
				'name'               => esc_html__('Title Wrapper Padding', 'techeduem'),
				'desc'               => esc_html__('Controls the height of the page title area. Enter value excluding any valid CSS unit, ex: 100', 'techeduem'),
				'type'               => 'padding',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_padding_on_phone',
				'name'               => esc_html__('Title Wrapper Padding On Phone', 'techeduem'),
				'desc'               => esc_html__('Controls the height of the page title area on mobile device. Enter value excluding any valid CSS unit, ex: 80', 'techeduem'),
				'type'               => 'padding',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_background',
				'name'               => esc_html__('Title Wrapper Background', 'techeduem'),
				'desc'               => esc_html__('Controls the background of the page title area.', 'techeduem'),
				'type'               => 'background',
			),
			array(
				'id'                 => $prefix . 'title_wrapper_overlay',
				'name'               => esc_html__('Title Wrapper Overlay', 'techeduem'),
				'desc'               => esc_html__('Controls the background overlay of the page title area.', 'techeduem'),
				'type'               => 'hash_colorpicker',
			),

		)
	);

	// Footer Tab
	$tabs_setting['tabs'][] = array(
		'id'     => $prefix . 'footer',
		'title'  => esc_html__('Footer', 'techeduem'),
		'fields' => array(
			array(
				'id'      		=> $prefix . 'footer_enable',
				'name'    		=> esc_html__('Footer', 'techeduem'),
				'desc'    		=> esc_html__('Enable or disable footer. if the default is chosen the theme options will work.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 	=> esc_html__('Default', 'techeduem'),
					'yes' 		=> esc_html__('Yes', 'techeduem'),
					'no' 		=> esc_html__('No', 'techeduem'),
				),
			),
			array(
				'id'      		=> $prefix . 'select_footer_style_type',
				'name'    		=> esc_html__('Footer Type', 'techeduem'),
				'desc'    		=> esc_html__('Select footer type, if the default is chosen the existing design will work, or choose the custom option to get headers from footer post type.', 'techeduem'),
				'type'    		=> 'radio_inline',
				'options' 		=> array(
					'default' 		=> esc_html__('Default', 'techeduem'),
					'custom' 		=> esc_html__('Custom', 'techeduem'),
				),
			),
			// Footer Custom Template
			array(
				'id' 			=> $prefix . 'select_footer_template',
				'name' 			=> esc_html__('Select Footer Style', 'techeduem'),
				'desc' 			=> esc_html__('Select the footer template/style that you made in the footer post type.', 'techeduem'),
				'type' 			=> 'select',
				'options' 		=> techeduemget_posttype_options('techeduem_footer'),
				'attributes' => array(
					'data-conditional-id'    => $prefix . 'select_footer_style_type',
					'data-conditional-value' => 'custom',
				),
			),

		)
	);

	// Set tabs
	$page_options->add_field(array(
		'id'   => $prefix . 'tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	));

	/**
	 * Footer Options
	 */
	$footer_options = new_cmb2_box(array(
		'id'           		 => $prefix . '_techeduem_footer_options',
		'title'        		 => esc_html__('Techedu Footer Options', 'techeduem'),
		'object_types' 		 => array('techeduem_footer'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	));
	$footer_options->add_field(array(
		'id'                 => $prefix . 'fixed_footer_enable',
		'name'               => esc_html__('Fixed Footer', 'techeduem'),
		'desc'               => esc_html__('If yes, this footer will be fixed', 'techeduem'),
		'type'    				=> 'radio_inline',
		'options' 				=> array(
			'yes' 				=> esc_html__('Yes', 'techeduem'),
			'no' 				=> esc_html__('No', 'techeduem'),
		),
		'default' 				=> 'no',
	));

	/**
	 * Header Options
	 */
	$header_options = new_cmb2_box(array(
		'id'           		 => $prefix . '_techeduem_header_options',
		'title'        		 => esc_html__('Techedu Header Options', 'techeduem'),
		'object_types' 		 => array('techeduem_header'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	));
	$header_options->add_field(array(
		'id' 			=> $prefix . 'header_sticky',
		'name' 			=> esc_html__('Header Sticky', 'techeduem'),
		'desc'               => esc_html__('If yes, this header will be sticky', 'techeduem'),
		'type' 			=> 'radio_inline',
		'options'         => array(
			'yes'     => esc_html__('Yes', 'techeduem'),
			'no'      => esc_html__('No', 'techeduem'),
		),
		'default' 				=> 'no',
	));
	$header_options->add_field(array(
		'id' 			=> $prefix . 'header_transparent',
		'name' 			=> esc_html__('Transparent Header', 'techeduem'),
		'desc'               => esc_html__('If yes, to make the header area transparent', 'techeduem'),
		'type' 			=> 'radio_inline',
		'options'         => array(
			'yes'     => esc_html__('Yes', 'techeduem'),
			'no'      => esc_html__('No', 'techeduem'),
		),
		'default' 				=> 'no',
	));
}
