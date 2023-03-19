<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPeducation_Elementor_Widget_Service_Box extends Widget_Base {

	public function get_name() {
		return 'education-service-box';
	}

	public function get_title() {
		return esc_html__( 'Education : Service Box', 'wpeducation' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

   public function get_categories() {
		return [ 'wpeducation' ];
	}

	protected function register_controls() {

  		/**
  		 * Servicebox Image Settings
  		 */
  		$this->start_controls_section(
  			'education_section_servicebox_content_settings',
  			[
  				'label' => esc_html__( 'Servicebox Image', 'wpeducation' )
  			]
  		);

  		$this->add_control(
		  'education_servicebox_img_type',
		  	[
		   	'label'       	=> esc_html__( 'Servicebox Type', 'wpeducation' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'img-on-top',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'img-on-top'  	=> esc_html__( 'Image/Icon On Top', 'wpeducation' ),
		     		'img-on-left' 	=> esc_html__( 'Image/Icon On Left', 'wpeducation' ),
		     		'img-on-right' 	=> esc_html__( 'Image/Icon On Right', 'wpeducation' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'education_servicebox_img_or_icon',
			[
				'label' => esc_html__( 'Image or Icon', 'wpeducation' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'img' => [
						'title' => esc_html__( 'Image', 'wpeducation' ),
						'icon' => 'eicon-image-bold',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'wpeducation' ),
						'icon' => 'eicon-star',
					],
				],
				'default' => 'icon',
			]
		);
		/**
		 * Condition: 'education_servicebox_img_or_icon' => 'img'
		 */
		$this->add_control(
			'education_servicebox_image',
			[
				'label' => esc_html__( 'Servicebox Image', 'wpeducation' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'education_servicebox_img_or_icon' => 'img'
				]
			]
		);


		/**
		 * Condition: 'education_servicebox_img_or_icon' => 'icon'
		 */
		$this->add_control(
			'education_servicebox_icon',
			[
				'label' => esc_html__( 'Icon', 'wpeducation' ),
				'type' => Controls_Manager::ICONS,
                'default' =>array( 'value'=> 'eicon-site-identity', 'library'=>'solid' ),
				'condition' => [
					'education_servicebox_img_or_icon' => 'icon'
				]
			]
		);

		$this->add_control(
			'education_show_servicebox_clickable',
			[
				'label' => __( 'Servicebox Clickable', 'wpeducation' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'wpeducation' ),
				'label_off' => __( 'No', 'wpeducation' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'education_show_servicebox_clickable_link',
			[
				'label' => esc_html__( 'Servicebox Link', 'wpeducation' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => 'http://',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'condition' => [
     				'education_show_servicebox_clickable' => 'yes'
     			]
			]
		);

		$this->end_controls_section();

		/**
		 * Servicebox Content
		 */
		$this->start_controls_section(
			'education_servicebox_content',
			[
				'label' => esc_html__( 'Servicebox Content', 'wpeducation' ),
			]
		);
		$this->add_control(
			'education_servicebox_title',
			[
				'label' => esc_html__( 'Servicebox Title', 'wpeducation' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true
				],
				'default' => esc_html__( 'This is an icon box', 'wpeducation' )
			]
		);
		$this->add_control(
            'education_servicebox_text_type',
            [
                'label'                 => __( 'Content Type', 'wpeducation' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                    'content'       => __( 'Content', 'wpeducation' ),
                    'template'      => __( 'Saved Templates', 'wpeducation' ),
                ],
                'default'               => 'content',
            ]
        );
		$this->add_control(
			'education_servicebox_text',
			[
				'label' => esc_html__( 'Servicebox Content', 'wpeducation' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic' => [
					'active' => true
				],
				'default' => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'wpeducation' ),
				'condition'             => [
					'education_servicebox_text_type'      => 'content',
				],
			]
		);
		$this->add_control(
			'education_show_servicebox_content',
			[
				'label' => __( 'Show Content', 'wpeducation' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'wpeducation' ),
				'label_off' => __( 'Hide', 'wpeducation' ),
				'return_value' => 'yes',
			]
		);
		$this->add_responsive_control(
			'education_servicebox_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'wpeducation' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpeducation' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpeducation' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpeducation' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'education-servicebox-content-align-',
				'condition' => [
					'education_servicebox_img_type' => 'img-on-top'
				]
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_servicebox_style_settings',
			[
				'label' => esc_html__( 'Info Box Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'education_servicebox_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .education-servicebox' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'education_servicebox_container_padding',
			[
				'label' => esc_html__( 'Padding', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-servicebox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'education_servicebox_container_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-servicebox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'education_servicebox_border',
					'label' => esc_html__( 'Border', 'wpeducation' ),
					'selector' => '{{WRAPPER}} .education-servicebox',
				]
		);

		$this->add_control(
			'education_servicebox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpeducation' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .education-servicebox' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'education_servicebox_shadow',
				'selector' => '{{WRAPPER}} .education-servicebox',
			]
		);

		$this->end_controls_section();
		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Image)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_servicebox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'education_servicebox_img_or_icon' => 'img'
		     	]
			]
		);

		$this->add_control(
			'education_servicebox_image_resizer',
			[
				'label' => esc_html__( 'Image Resizer', 'wpeducation' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .education-servicebox .servicebox-icon img' => 'width: {{SIZE}}px;',
					'{{WRAPPER}} .education-servicebox.icon-on-left .servicebox-icon' => 'width: {{SIZE}}px;',
					'{{WRAPPER}} .education-servicebox.icon-on-right .servicebox-icon' => 'width: {{SIZE}}px;',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'education_servicebox_image[url]!' => '',
				],
				'condition' => [
					'education_servicebox_img_or_icon' => 'img',
				]
			]
		);

		$this->add_control(
            'education_servicebox_img_background',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'education_servicebox_img_hover',
            [
                'label' => __( 'Bg Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox:hover .servicebox-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_servicebox_img_aligntitle',
            [
                'label' => __( 'Alignment', 'wpeducation' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'wpeducation' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'wpeducation' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'wpeducation' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'wpeducation' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox.icon-on-left .servicebox-icon .servicebox-icon-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_service_iamge_width',
            [
                'label' => __( 'Icon Width', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => ' ',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_servicebox_image_height',
            [
                'label' => __( 'Icon Height', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => ' ',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'height: {{VALUE}}px;',
                ],
            ]
        );

		$this->add_responsive_control(
			'education_servicebox_image_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-servicebox .servicebox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

        $this->add_responsive_control(
            'education_servicebox_image_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'education_servicebox_img_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_servicebox_img_border',
                'label' => __( 'Icon Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-servicebox .servicebox-icon',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_servicebox_img_hvr',
                'label' => __( 'Icon Border Hover', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-servicebox .servicebox-icon',
            ]
        );

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_servicebox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'education_servicebox_img_or_icon' => 'icon'
		     	]
			]
		);

		$this->add_control(
    		'education_servicebox_icon_size',
    		[
        		'label' => __( 'Icon Size', 'wpeducation' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 30,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .education-servicebox .servicebox-icon i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_responsive_control(
            'education_servicebox_icon_width',
            [
                'label' => __( 'Icon Width', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => '95px',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_servicebox_icon_height',
            [
                'label' => __( 'Icon Height', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => '95px',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'height: {{VALUE}}px;',
                ],
            ]
        );

		$this->add_control(
			'education_servicebox_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .education-servicebox .servicebox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .education-servicebox.icon-beside-title .servicebox-content .title figure i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
            'education_servicebox_icon_hvr',
            [
                'label' => __( 'Hover Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#f5b120',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox:hover .servicebox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .education-servicebox.icon-beside-title .servicebox-content .title figure i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infoicontypography',
                'selector' => '{{WRAPPER}} .education-servicebox .servicebox-icon',
            ]
        );

        $this->add_control(
            'education_servicebox_icon_background',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#f5b120',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'education_servicebox_icon_hover',
            [
                'label' => __( 'Bg Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox:hover .servicebox-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_servicebox_icon_aligntitle',
            [
                'label' => __( 'Alignment', 'wpeducation' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'wpeducation' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'wpeducation' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'wpeducation' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'wpeducation' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox.icon-on-left .servicebox-icon .servicebox-icon-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
			'education_servicebox_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-servicebox .servicebox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

        $this->add_responsive_control(
            'education_servicebox_icon_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'education_servicebox_icon_border_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-servicebox .servicebox-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_servicebox_icon_border',
                'label' => __( 'Icon Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-servicebox .servicebox-icon',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_servicebox_icon_border_hvr',
                'label' => __( 'Icon Border Hover', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-servicebox .servicebox-icon',
            ]
        );

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Info Box Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_servicebox_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'education_servicebox_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'wpeducation' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'education_servicebox_title_color',
			[
				'label' => esc_html__( 'Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .education-servicebox .servicebox-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'education_servicebox_title_typography',
				'selector' => '{{WRAPPER}} .education-servicebox .servicebox-content .title',
			]
		);

		$this->add_responsive_control(
			'education_servicebox_title_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-servicebox .servicebox-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_control(
			'education_servicebox_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'wpeducation' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'education_servicebox_content_color',
			[
				'label' => esc_html__( 'Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .education-servicebox .servicebox-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'education_servicebox_content_typography',
				'selector' => '{{WRAPPER}} .education-servicebox .servicebox-content p',
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {

   		$settings = $this->get_settings_for_display();
      	$servicebox_image = $this->get_settings( 'education_servicebox_image' );
	  	$servicebox_image_url = Group_Control_Image_Size::get_attachment_image_src( $servicebox_image['id'], 'thumbnail', $settings );
	  	if( empty( $servicebox_image_url ) ) : $servicebox_image_url = $servicebox_image['url']; else: $servicebox_image_url = $servicebox_image_url; endif;

	  	if( 'yes' == $settings['education_show_servicebox_clickable'] ){
	  		$target = $settings['education_show_servicebox_clickable_link']['is_external'] ? 'target="_blank"' : '';
	  		$nofollow = $settings['education_show_servicebox_clickable_link']['nofollow'] ? 'rel="nofollow"' : '';
	  	}

	?>
		<?php if( 'img-on-top' == $settings['education_servicebox_img_type'] ) : ?>
		<div class="education-servicebox servicebox-top-style">
			<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?><a href="<?php echo esc_url( $settings['education_show_servicebox_clickable_link']['url'] ) ?>" 
				<?php echo $target; ?> <?php echo $nofollow; ?>> <?php endif;?>
			<div class="servicebox-icon">
				<?php if( 'img' == $settings['education_servicebox_img_or_icon'] ) : ?>
					<img src="<?php echo esc_url( $servicebox_image_url ); ?>" alt="Icon Image">
				<?php endif; ?>
				<?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : ?>
				<div class="servicebox-icon-wrap">
					<?php \Elementor\Icons_Manager::render_icon( $settings['education_servicebox_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="servicebox-content">
				<h4 class="title"><?php echo $settings['education_servicebox_title']; ?></h4>
				<?php if( 'yes' == $settings['education_show_servicebox_content'] ) : ?>
					<?php if( 'content' === $settings['education_servicebox_text_type'] ) : ?>
						<?php if ( ! empty( $settings['education_servicebox_text'] ) ) : ?>
							<p><?php echo $settings['education_servicebox_text']; ?></p>
						<?php endif; ?>
					<?php elseif( 'template' === $settings['education_servicebox_text_type'] ) :
						if ( !empty( $settings['education_primary_templates'] ) ) {
                            $education_template_id = $settings['education_primary_templates'];
                            $education_frontend = new Frontend;

                            echo $education_frontend->get_builder_content( $education_template_id, true );
                        }
					endif; ?>
				<?php endif; ?>
			</div>
			<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?></a><?php endif; ?>
		</div>
		<?php endif; ?>
		<?php if( 'img-on-left' == $settings['education_servicebox_img_type'] ) : ?>
		<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?><a href="<?php echo esc_url( $settings['education_show_servicebox_clickable_link']['url'] ) ?>" 
			<?php echo $target; ?> <?php echo $nofollow; ?>> <?php endif;?>
		<div class="education-servicebox icon-on-left">
			<div class="servicebox-icon <?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : echo esc_attr( 'education-icon-only', 'wpeducation' ); endif; ?>">
				<?php if( 'img' == $settings['education_servicebox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $servicebox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : ?>
				<div class="servicebox-icon-wrap">
					<?php \Elementor\Icons_Manager::render_icon( $settings['education_servicebox_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="servicebox-content <?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : echo esc_attr( 'education-icon-only', 'wpeducation' ); endif; ?>">
				<h4 class="title"><?php echo $settings['education_servicebox_title']; ?></h4>
				<?php if( 'yes' == $settings['education_show_servicebox_content'] ) : ?>
					<?php if( 'content' === $settings['education_servicebox_text_type'] ) : ?>
						<?php if ( ! empty( $settings['education_servicebox_text'] ) ) : ?>
							<p><?php echo $settings['education_servicebox_text']; ?></p>
						<?php endif; ?>
					<?php elseif( 'template' === $settings['education_servicebox_text_type'] ) :
						if ( !empty( $settings['education_primary_templates'] ) ) {
                            $education_template_id = $settings['education_primary_templates'];
                            $education_frontend = new Frontend;

                            echo $education_frontend->get_builder_content( $education_template_id, true );
                        }
					endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?></a><?php endif; ?>
		<?php endif; ?>
		<?php if( 'img-on-right' == $settings['education_servicebox_img_type'] ) : ?>
		<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?><a href="<?php echo esc_url( $settings['education_show_servicebox_clickable_link']['url'] ) ?>" 
			<?php echo $target; ?> <?php echo $nofollow; ?>> <?php endif;?>
		<div class="education-servicebox icon-on-right">
			<div class="servicebox-icon <?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : echo esc_attr( 'education-icon-only', 'wpeducation' ); endif; ?>">
				<?php if( 'img' == $settings['education_servicebox_img_or_icon'] ) : ?>
				<figure>
					<img src="<?php echo esc_url( $servicebox_image_url ); ?>" alt="Icon Image">
				</figure>
				<?php endif; ?>
				<?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : ?>
				<div class="servicebox-icon-wrap">
					<?php \Elementor\Icons_Manager::render_icon( $settings['education_servicebox_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="servicebox-content <?php if( 'icon' == $settings['education_servicebox_img_or_icon'] ) : echo esc_attr( 'education-icon-only', 'wpeducation' ); endif; ?>">
				<h4 class="title"><?php echo $settings['education_servicebox_title']; ?></h4>
				<?php if( 'yes' == $settings['education_show_servicebox_content'] ) : ?>
					<?php if( 'content' === $settings['education_servicebox_text_type'] ) : ?>
						<?php if ( ! empty( $settings['education_servicebox_text'] ) ) : ?>
							<p><?php echo $settings['education_servicebox_text']; ?></p>
						<?php endif; ?>
					<?php elseif( 'template' === $settings['education_servicebox_text_type'] ) :
						if ( !empty( $settings['education_primary_templates'] ) ) {
                            $education_template_id = $settings['education_primary_templates'];
                            $education_frontend = new Frontend;

                            echo $education_frontend->get_builder_content( $education_template_id, true );
                        }
					endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if( 'yes' == $settings['education_show_servicebox_clickable'] ) : ?></a><?php endif; ?>
		<?php endif; ?>
	<?php
	}

}


wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Service_Box() );