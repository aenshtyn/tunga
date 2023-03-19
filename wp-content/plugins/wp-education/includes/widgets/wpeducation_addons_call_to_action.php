<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPeducation_Elementor_Widget_Cta_Box extends Widget_Base {

	public function get_name() {
		return 'education-cta-box';
	}

	public function get_title() {
		return esc_html__( 'Education : Call to Action', 'wpeducation' );
	}

	public function get_icon() {
		return 'eicon-custom';
	}

   public function get_categories() {
		return [ 'wpeducation' ];
	}

	protected function register_controls() {

  		/**
  		 * Call to Action Content Settings
  		 */
  		$this->start_controls_section(
  			'education_section_cta_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'wpeducation' )
  			]
  		);

  		$this->add_control(
		  'education_cta_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'wpeducation' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-basic',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-basic'  		=> esc_html__( 'Basic', 'wpeducation' ),
		     		'cta-flex' 			=> esc_html__( 'Flex Grid', 'wpeducation' ),
		     		'cta-icon-flex' 	=> esc_html__( 'Flex Grid with Icon', 'wpeducation' ),
		     	],
		  	]
		);

  		/**
  		 * Condition: 'education_cta_type' => 'cta-basic'
  		 */
		$this->add_control(
		  'education_cta_content_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Type', 'wpeducation' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-default'  	=> esc_html__( 'Left', 'wpeducation' ),
		     		'cta-center' 		=> esc_html__( 'Center', 'wpeducation' ),
		     		'cta-right' 		=> esc_html__( 'Right', 'wpeducation' ),
		     	],
		     	'condition'    => [
		     		'education_cta_type' => 'cta-basic'
		     	]
		  	]
		);

		$this->add_control(
		  'education_cta_color_type',
		  	[
		   	'label'       	=> esc_html__( 'Color Style', 'wpeducation' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-bg-color',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-bg-color'  		=> esc_html__( 'Background Color', 'wpeducation' ),
		     		'cta-bg-img' 			=> esc_html__( 'Background Image', 'wpeducation' ),
		     		'cta-bg-img-fixed' 	=> esc_html__( 'Background Fixed Image', 'wpeducation' ),
		     	],
		  	]
		);

		/**
		 * Condition: 'education_cta_type' => 'cta-icon-flex'
		 */
		$this->add_control(
			'education_cta_flex_grid_icon',
			[
				'label' => esc_html__( 'Icon', 'wpeducation' ),
				'type' => Controls_Manager::ICONS,
					'default' => array(
						'value'=> 'fa fa-bullhorn',
						'library'=>'solid',
					),
				'condition' => [
					'education_cta_type' => 'cta-icon-flex'
				]
			]
		);

		$this->add_control(
			'education_cta_title',
			[
				'label' => esc_html__( 'Title', 'wpeducation' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'The Ultimate Addons For Elementor', 'wpeducation' ),
				'dynamic' => [ 'active' => true ]
			]
		);
		$this->add_control(
            'education_cta_title_content_type',
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
			'education_cta_content',
			[
				'label' => esc_html__( 'Content', 'wpeducation' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Add a strong one liner supporting the heading above and giving users a reason to click on the button below.', 'wpeducation' ),
				'separator' => 'after',
				'condition' => [
					'education_cta_title_content_type' => 'content'
				]
			]
		);

		$this->add_control(
			'education_cta_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'wpeducation' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Button Text', 'wpeducation' )
			]
		);

		$this->add_control(
			'education_cta_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'wpeducation' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => 'http://',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'separator' => 'after'
			]
		);

		/**
		 * Condition: 'education_cta_color_type' => 'cta-bg-img' && 'education_cta_color_type' => 'cta-bg-img-fixed',
		 */
		$this->add_control(
			'education_cta_bg_image',
			[
				'label' => esc_html__( 'Background Image', 'wpeducation' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
            	'{{WRAPPER}} .education-call-to-action.bg-img' => 'background-image: url({{URL}});',
            	'{{WRAPPER}} .education-call-to-action.bg-img-fixed' => 'background-image: url({{URL}});',
        		],
				'condition' => [
					'education_cta_color_type' => [ 'cta-bg-img', 'cta-bg-img-fixed' ],
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Cta Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_cta_style_settings',
			[
				'label' => esc_html__( 'Call to Action Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'education_cta_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'wpeducation' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'wpeducation' ),
				'label_off' => __( 'no', 'wpeducation' ),
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'education_cta_container_width_value',
			[
				'label' => __( 'Container Max Width (% or px)', 'wpeducation' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1170,
					'unit' => 'px',
				],
				'size_units' => [ 'px', '%' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1500,
		                'step' => 5,
		            ],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'education_cta_container_width' => 'yes',
				],
			]
		);

		$this->add_control(
			'education_cta_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'education_cta_container_padding',
			[
				'label' => esc_html__( 'Padding', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'education_cta_container_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-call-to-action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'education_cta_border',
				'label' => esc_html__( 'Border', 'wpeducation' ),
				'selector' => '{{WRAPPER}} .education-call-to-action',
			]
		);

		$this->add_control(
			'education_cta_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpeducation' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'education_cta_shadow',
				'selector' => '{{WRAPPER}} .education-call-to-action',
			]
		);


		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Cta Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_cta_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography ', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'education_cta_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'wpeducation' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'education_cta_title_color',
			[
				'label' => esc_html__( 'Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'education_cta_title_typography',
				'selector' => '{{WRAPPER}} .education-call-to-action .title',
			]
		);

		$this->add_control(
			'education_cta_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'wpeducation' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'education_cta_content_color',
			[
				'label' => esc_html__( 'Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#666',
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'education_cta_content_typography',
				'selector' => '{{WRAPPER}} .education-call-to-action p',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_cta_btn_style_settings',
			[
				'label' => esc_html__( 'Button Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
		  'education_cta_btn_effect_type',
		  	[
		   	'label'       	=> esc_html__( 'Effect', 'wpeducation' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'default'  			=> esc_html__( 'Default', 'wpeducation' ),
		     		'top-to-bottom'  	=> esc_html__( 'Top to Bottom', 'wpeducation' ),
		     		'left-to-right'  	=> esc_html__( 'Left to Right', 'wpeducation' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'education_cta_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-call-to-action .cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'education_cta_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'wpeducation' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .education-call-to-action .cta-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'education_cta_btn_typography',
				'selector' => '{{WRAPPER}} .education-call-to-action .cta-button',
			]
		);

		$this->start_controls_tabs( 'education_cta_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'education_cta_btn_normal', [ 'label' => esc_html__( 'Normal', 'wpeducation' ) ] );

			$this->add_control(
				'education_cta_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'wpeducation' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'education_cta_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'wpeducation' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#1bb4b9',
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'education_cat_btn_normal_border',
					'label' => esc_html__( 'Border', 'wpeducation' ),
					'selector' => '{{WRAPPER}} .education-call-to-action .cta-button',
				]
			);

			$this->add_control(
				'education_cta_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'wpeducation' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'education_cta_btn_hover', [ 'label' => esc_html__( 'Hover', 'wpeducation' ) ] );

			$this->add_control(
				'education_cta_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'wpeducation' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'education_cta_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'wpeducation' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f5b120',
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button:after' => 'background: {{VALUE}};',
						'{{WRAPPER}} .education-call-to-action .cta-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'education_cta_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'wpeducation' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .education-call-to-action .cta-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'education_cta_button_shadow',
				'selector' => '{{WRAPPER}} .education-call-to-action .cta-button',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'education_section_cta_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'wpeducation' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'education_cta_type' => 'cta-icon-flex'
				]
			]
		);

		$this->add_control(
			'education_section_cta_icon_size',
			[
				'label' => esc_html__( 'Font Size', 'wpeducation' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 160,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action.cta-icon-flex .icon' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'education_section_cta_icon_color',
			[
				'label' => esc_html__( 'Color', 'wpeducation' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .education-call-to-action.cta-icon-flex .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {

   		$settings = $this->get_settings_for_display();
	  	$target = $settings['education_cta_btn_link']['is_external'] ? 'target="_blank"' : '';
	  	$nofollow = $settings['education_cta_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
	  	if( 'cta-bg-color' == $settings['education_cta_color_type'] ) {
	  		$cta_class = 'bg-lite';
	  	}else if( 'cta-bg-img' == $settings['education_cta_color_type'] ) {
	  		$cta_class = 'bg-img';
	  	}else if( 'cta-bg-img-fixed' == $settings['education_cta_color_type'] ) {
	  		$cta_class = 'bg-img bg-fixed';
	  	}else {
	  		$cta_class = '';
	  	}
	  	// Is Basic Cta Content Center or Not
	  	if( 'cta-center' === $settings['education_cta_content_type'] ) {
	  		$cta_alignment = 'cta-center';
	  	}elseif( 'cta-right' === $settings['education_cta_content_type'] ) {
	  		$cta_alignment = 'cta-right';
	  	}else {
	  		$cta_alignment = 'cta-left';
	  	}
	  	// Button Effect
	  	if( 'left-to-right' == $settings['education_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-2';
	  	}elseif( 'top-to-bottom' == $settings['education_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-1';
	  	}else {
	  		$cta_btn_effect = '';
	  	}

	?>
	<?php if( 'cta-basic' == $settings['education_cta_type'] ) : ?>
	<div class="education-call-to-action <?php echo esc_attr( $cta_class ); ?> <?php echo esc_attr( $cta_alignment ); ?>">
	    <h2 class="title"><?php echo $settings['education_cta_title']; ?></h2>
	    <?php if( 'content' == $settings['education_cta_title_content_type'] ) : ?>
	    <p><?php echo $settings['education_cta_content']; ?></p>
		<?php elseif( 'template' == $settings['education_cta_title_content_type'] ) : ?>
			<?php
				if ( !empty( $settings['education_primary_templates'] ) ) {
                    $education_template_id = $settings['education_primary_templates'];
                    $education_frontend = new Frontend;
					echo $education_frontend->get_builder_content( $education_template_id, true );
                }
			?>
		<?php endif; ?>
	    <a href="<?php echo esc_url( $settings['education_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['education_cta_btn_text'], 'wpeducation' ); ?></a>
	</div>
	<?php endif; ?>
	<?php if( 'cta-flex' == $settings['education_cta_type'] ) : ?>
	<div class="education-call-to-action cta-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="content">
	        <h2 class="title"><?php echo $settings['education_cta_title']; ?></h2>
	        <?php if( 'content' == $settings['education_cta_title_content_type'] ) : ?>
		    <p><?php echo $settings['education_cta_content']; ?></p>
			<?php elseif( 'template' == $settings['education_cta_title_content_type'] ) : ?>
				<?php
					if ( !empty( $settings['education_primary_templates'] ) ) {
	                    $education_template_id = $settings['education_primary_templates'];
	                    $education_frontend = new Frontend;
						echo $education_frontend->get_builder_content( $education_template_id, true );
	                }
				?>
			<?php endif; ?>
	    </div>
	    <div class="action">
	        <a href="<?php echo esc_url( $settings['education_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['education_cta_btn_text'], 'wpeducation' ); ?></a>
	    </div>
	</div>
	<?php endif; ?>
	<?php if( 'cta-icon-flex' == $settings['education_cta_type'] ) : ?>
	<div class="education-call-to-action cta-icon-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="icon">
	        <?php \Elementor\Icons_Manager::render_icon( $settings['education_cta_flex_grid_icon'], [ 'aria-hidden' => 'true' ] ); ?>
	    </div>
	    <div class="content">
	        <h2 class="title"><?php echo $settings['education_cta_title']; ?></h2>
	        <?php if( 'content' == $settings['education_cta_title_content_type'] ) : ?>
		    <p><?php echo $settings['education_cta_content']; ?></p>
			<?php elseif( 'template' == $settings['education_cta_title_content_type'] ) : ?>
				<?php
					if ( !empty( $settings['education_primary_templates'] ) ) {
	                    $education_template_id = $settings['education_primary_templates'];
	                    $education_frontend = new Frontend;
						echo $education_frontend->get_builder_content( $education_template_id, true );
	                }
				?>
			<?php endif; ?>
	    </div>
	    <div class="action">
	       <a href="<?php echo esc_url( $settings['education_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['education_cta_btn_text'], 'wpeducation' ); ?></a>
	    </div>
	</div>
	<?php endif; ?>
	<?php
	}

}


wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Cta_Box() );