<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Teachers extends Widget_Base {

    public function get_name() {
        return 'teachers-post';
    }
    
    public function get_title() {
        return __( 'Education : Teachers Post', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-person';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'teachers_setting',
            [
                'label' => esc_html__( 'Teachers', 'wpeducation' ),
            ]
        );
            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Teachers Show Option', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 2,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 5,
                ]
            );            
            $this->add_control(
                'item_style',
                [
                    'label' => esc_html__( 'Select Style', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'carosul',
                    'options' => [
                        'carosul' => esc_html__( 'Style One Carousel', 'wpeducation' ),
                        'grid' => esc_html__( 'Style Two Grid', 'wpeducation' ),
                    ],
                ]
            );

            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 1000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'item_style' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'itemmargin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'default' => 30,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 2,
                    'max' => 6,
                    'step' => 1,
                    'default' => 4,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'wpeducation' ),
                        '2' => esc_html__( '2', 'wpeducation' ),
                        '3' => esc_html__( '3', 'wpeducation' ),
                        '4' => esc_html__( '4', 'wpeducation' ),
                        '5' => esc_html__( '5', 'wpeducation' ),
                        '6' => esc_html__( '6', 'wpeducation' ),
                    ],
                    'condition' => [
                        'item_style' => 'grid',
                    ]
                ]
            );          

            $this->add_control(
                'content_show_title',
                [
                    'label' => __( 'Content Show Option', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 
            $this->add_control(
                'show_name',
                [
                    'label' => esc_html__( 'Show/Hide Name', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'show_degination',
                [
                    'label' => esc_html__( 'Show/Hide Designation', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 
            $this->add_control(
                'show_profile_button',
                [
                    'label' => esc_html__( 'Show/Hide Profile Button', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );            
            $this->add_control(
                'show_content',
                [
                    'label' => esc_html__( 'Show/Hide Content', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,
                    'condition' =>[

                        'show_content' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'socila_icon_show',
                [
                    'label' => esc_html__( 'Show/Hide Social Icon', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_hover',
                [
                    'label' => __( 'Title Hover color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#1bb4b9',
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text h4 a:hover,.education-single-teachers-column:hover .education-teacher-column-carousel-text h4' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-single-teachers-column:hover .education-teacher-column-carousel-text h4' => 'color: {{VALUE}};'
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text h4',
                ]
            );
            $this->add_responsive_control(
                'margin_title',
                [
                    'label' => __( 'Title Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Designation  Style
            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Designation color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#909090',
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'designation_hvr_color',
                [
                    'label' => __( 'Designation Hover Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#909090',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column:hover .education-teacher-column-carousel-text span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text span',
                ]
            );

            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Designation Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .education-teacher-column-carousel-text > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'item_content_hvr_color',
                [
                    'label' => __( 'Content hover color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column:hover .education-teacher-column-carousel-text > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text > p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Social Icon Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Icon Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#909090',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_hvr_color',
                        [
                            'label' => __( 'Icon Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#909090',
                            'selectors' => [
                                '{{WRAPPER}} .education-single-teachers-column:hover .education-teacher-column-carousel-text .social-links ul li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Icon BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border',
                            'label' => __( 'Icon Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'icon_width',
                        [
                            'label' => __( 'Icon Width', 'wpeducation' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => ' ',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'icon_height',
                        [
                            'label' => __( 'Icon Height', 'wpeducation' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => ' ',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a',
                        ]
                    );

                    $this->add_control(
                        'item_icon_hover_heading',
                        [
                            'label' => __( 'Social Icon Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Icon Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Icon Hover BG COlor', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_hover',
                            'label' => __( 'Icon Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-teacher-column-carousel-text .social-links ul li a:hover',
                        ]
                    ); 

        $this->end_controls_section();

        /* Image Box Style */
        $this->start_controls_section(
            'image_box_style',
            [
                'label' => __( 'Image Box Style', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'image_overlay_style',
                [
                    'label' => __( 'Overlay Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'image_box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(0, 0, 0, 0.2)',
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-image-column > a::after' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_image',
                    'label' => __( 'Image Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-teachers-image-column img',
                ]
            ); 
            $this->add_control(
                'icon_radius',
                [
                    'label' => __( 'Image Radius', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-image-column img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'box_overlay_style',
                [
                    'label' => __( 'Overlay Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'box_overlay_hover_color',
                [
                    'label' => __( 'Overlay Hover Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0.1)',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-teachers-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'arrow_color',
                [
                    'label' => __( 'Button Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#d4d4d4',
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-column-carousel .slick-arrow' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow_color_hover',
                [
                    'label' => __( 'Button Hover Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-column-carousel .slick-arrow:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow__bg_color',
                [
                    'label' => __( 'Button BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-column-carousel .slick-arrow' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow_bg_color_hover',
                [
                    'label' => __( 'Button BG Hover Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#1BB4B9',
                    'selectors' => [
                        '{{WRAPPER}} .education-teachers-column-carousel .slick-arrow:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_button_border',
                    'label' => __( 'Button Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-teachers-column-carousel .slick-arrow',
                ]
            );
   
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $item_style = $settings['item_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $itemmargin = $settings['itemmargin'];


        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('grid_column_number');
        $show_name = $this->get_settings_for_display('show_name');
        $show_degination = $this->get_settings_for_display('show_degination');
        $show_profile_button = $this->get_settings_for_display('show_profile_button');
        $socila_icon_show = $this->get_settings_for_display('socila_icon_show');
        $show_content = $this->get_settings_for_display('show_content');
        $sectionid =  $this-> get_id();
        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
        <?php
            $args = array(
                'post_type'            => 'teachers',
                'post_status'          => 'publish',
                'ignore_sticky_posts'  => 1,
                'posts_per_page'       => $per_page,
                'order'                => 'DESC',
            );

            ?>

        <div class="education-teachers-column-carousel">
            <div class="<?php if($item_style == 'carosul'){ echo 'responsive '.$sectionid; if($caselarrows==2){ echo ' education-indicator-style-two';} } else echo 'row'; ?>">
            
                <?php
                 $posts = new \WP_Query($args);
                while($posts->have_posts()):$posts->the_post();
                    /**
                    * Set Individual Column CSS
                    */
                    ?>                                                                          
                <!-- Team Single -->
                <?php if($item_style == 'grid') { echo '<div class="'.$collumval.'">'; } ?>
                <div class="education-single-teachers-column text-center">
					<div class="education-teachers-image-column">
						<?php if(has_post_thumbnail()){ ?>
							<a href="<?php the_permalink(); ?>">
							<?php if( $show_profile_button =='yes' ) { ?>
							<span class="education-image-hover">
								<span><i class="fa fa-edit"></i><?php esc_html_e( 'View Profile','wpeducation' ) ?></span>
							</span>
							<?php } //end show title ?>
                        <?php the_post_thumbnail(); ?></a>
                        <?php } ?>
					</div>
					<div class="education-teacher-column-carousel-text">

						<?php if( $show_name =='yes' ) { ?>
	                        <h4>
	                        <a href="<?php the_permalink(); ?>">
	                            <?php the_title() ;?> </a>
	                        </h4>
                        <?php } //end show title ?>

						<?php if( $show_degination == 'yes' ) { ?>
                            <?php  $help_teamdeg  = get_post_meta( get_the_ID(),'_wpeducation_teamdeg', true );?>
                            
                            <?php 
                            if( !empty($help_teamdeg) ){?>
                                <span>
                                    <?php echo esc_html( $help_teamdeg ); ?>
                                </span>
                            <?php } ?>
                        <?php } // end degignation ?>
                        

                        <?php if( $show_content == 'yes' ) { ?>
                            <?php  $teachers_content  = get_post_meta( get_the_ID(),'_wpeducation_sortcontent', true );?>
                            
                            <?php 
                            if( !empty($teachers_content) ){?>
                                <p>
                                    <?php echo esc_html( $teachers_content ); ?>
                                </p>
                            <?php } ?>
                        <?php } // end degignation ?>

						
						
						<?php if( $socila_icon_show == 'yes' ) {
							$help_teachersicon  = get_post_meta( get_the_ID(),'_wpeducation_teachersicon', true );
							if( $help_teachersicon ){
						 ?>
						<div class="social-links">
							<ul>
                                <?php   
                                
                                foreach( (array) $help_teachersicon as $ticonskey => $ticons ){
                                    $ticons1 = $ticons2 ='';
                                    if ( isset( $ticons['_wpeducation_turl'] ) ) {
                                        $ticons1 =  $ticons['_wpeducation_turl']; 
                                    }
                                    if ( isset( $ticons['_wpeducation_ticon'] ) ) {
                                        $ticons2 =  $ticons['_wpeducation_ticon'];    
                                    }?>
                                    <li><a href="<?php echo $ticons1;?>"><i class="<?php echo $ticons2;?>"></i></a></li>
                                <?php } ?>
                            </ul>
						</div>
						<?php } } // end show social ?>

					</div>
				</div>
                <?php if($item_style == 'grid'){echo '</div> ';}?>

                <?php endwhile; // while have_posts ?>
            </div>

        </div>

        <script type="text/javascript">
            (function($){

                var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(4); }; ?>;
                var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(1); }; ?>;
                var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(1); }; ?>;
                var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;

 
            /*------ Our Team Slick Slider ------*/
            	$('.responsive.<?php echo $sectionid;?>').slick({
				  dots: false,
				  infinite: false,
				  speed: 300,
				  arrows: _arrows_set,
				  margin:_itemmarginset,
				  slidesToShow: _showitem_set,
				  speed:_autoplay_speed,
                  infinite:_autoplay_set,
                  prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
                  nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
				  slidesToScroll: 4,
				  responsive: [
				    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: false,
                        dots: false
                      }
                    },
                    {
				      breakpoint: 970,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2,
				        infinite: false,
				        dots: false
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: _showitemtablet_set,
				        slidesToScroll: 1,
                        infinite: false,
                        dots: false
				      }
				    },
				    {
				      breakpoint: 480,
				      settings: {
				        slidesToShow: _showitemmobile_set,
				        slidesToScroll: 1,
                        infinite: false,
                        dots: false
				      }
				    }
				    // You can unslick at a given breakpoint now by adding:
				    // settings: "unslick"
				    // instead of a settings object
				  ]
				});
            })(jQuery);
            
        </script>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Teachers() );