<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Slider extends Widget_Base {

    public function get_name() {
        return 'education-slider';
    }
    
    public function get_title() {
        return __( 'Education : Slider', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'slider_content_setting',
            [
                'label' => esc_html__( 'Slider Content', 'wpeducation' ),
            ]
        );
        
        $this->add_control(
            'sllayout',
            [
                'label' => __( 'Slider Layout', 'wpeducation' ),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    '1' => __( 'Layout One', 'wpeducation' ),
                    '2' => __( 'Layout Two', 'wpeducation' ),
                    '3' => __( 'Layout Three', 'wpeducation' ),
                ]
            ]
        );

        $repeater = new Repeater();
             $repeater->add_control(
                'slimage',
                [
                    'label' => __( 'Slider Background Image', 'wpeducation' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'slimagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
            $repeater->add_control(
                'slsubtitle',
                [
                    'label' => __( 'Slider title', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Slider Title',
                    'label_block' => 'true',
                    'title' => __( 'Enter slider title', 'wpeducation' ),
                ]
            );

            $repeater->add_control(
                'sltitle',
                [
                    'label' => __( 'Slider Title Two', 'wpeducation' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Slider Title Two.',
                    'title' => __( 'Enter Slider Title Two', 'wpeducation' ),
                ]
            );

            $repeater->add_control(
                'sdescription',
                [
                    'label' => __( 'Slider Desc', 'wpeducation' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Slider Description.',
                    'title' => __( 'Enter slider Description', 'wpeducation' ),
                ]
            );

            $repeater->add_control(
                'slbutton',
                [
                    'label' => __( 'Button Text', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter slider button text', 'wpeducation' ),
                ]
            );

            $repeater->add_control(
                'slbuttonlink',
                [
                    'label' => __( 'Link', 'wpeducation' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'wpeducation' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            $this->add_control(
                'sliders_list',
                [
                    'label' => __( 'Slider', 'wpeducation' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'slsubtitle' => __( 'Slider Title.', 'wpeducation' ),
                            'sltitle' => __( 'Slider Description Title', 'wpeducation' ),
                            'slbutton' => __( 'READ MORE', 'wpeducation' ),
                            'slbuttonlink' => __( '#', 'wpeducation' ),
                        ],
                    ],
                    'title_field' => '{{{ sltitle }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__( 'Slider Option', 'wpeducation' ),
            ]
        );
            $this->add_control(
                'slautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'slautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'min' => 1000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'slautoplay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Dots', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

             $this->add_responsive_control(
                'sliders_aligntitle',
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
                        '{{WRAPPER}} .education-hero-content-2' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-3' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Title Style tab section
        $this->start_controls_section(
            'slider_style',
            [
                'label' => __( 'Title style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'slider_title_heading',
                [
                    'label' => __( 'Title', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#454545',
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content h1' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-2 h1' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-3 h1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .education-hero-content h1,.education-hero-content-2 h1,.education-hero-content-3 h1',
                ]
            );

            $this->add_responsive_control(
                'titlemargin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-2 h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3 h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Content Box Style
        $this->start_controls_section(
            'slider_content_box_style',
            [
                'label' => __( 'Content Box Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'slider_content_box_heading',
                [
                    'label' => __( 'Content Box', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'slider_content_box_height',
                [
                    'label' => __( 'Height', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 600,
                    'step' => 1,
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-slider .education-slide-item' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Description Style Slider
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => __( 'Description style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );  

            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Description Title color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content-2 p' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-3 p' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-2 h2' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .education-hero-content-3 h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitletypography',
                    'selector' => '{{WRAPPER}} .education-hero-content-2 p,.education-hero-content-3 p,.education-hero-content-2 h2,.education-hero-content-3 h2',
                ]
            );

            $this->add_responsive_control(
                'subtitlemargin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content-2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitlepadding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-hero-content-2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .education-hero-content-3 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Button style tab section
        $this->start_controls_section(
            'slbutton_style',
            [
                'label' => __( 'Button style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


            $this->start_controls_tabs(
                'btnstyle_tabs'
            );

                $this->start_controls_tab(
                    'btnstyle_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
                    ]
                );
                    $this->add_control(
                        'slbtext_color',
                        [
                            'label' => __( 'Button Text color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-2 a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-3 > a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'slbtn_color',
                        [
                            'label' => __( 'Button background color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-2 a' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-3 > a' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'btntypography',
                            'selector' => '{{WRAPPER}} .education-hero-content a,.education-hero-content-2 a,.education-hero-content-3 > a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border',
                            'label' => __( 'Button Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-hero-content a,.education-hero-content-2 a,.education-hero-content-3 > a',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'wpeducation' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .education-hero-content-2 a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .education-hero-content-3 > a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'buttonpadding',
                        [
                            'label' => __( 'Padding', 'wpeducation' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .education-hero-content-2 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .education-hero-content-3 > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'buttonmargin',
                        [
                            'label' => __( 'Margin', 'wpeducation' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .education-hero-content-2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .education-hero-content-3 > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover tab for button
                $this->start_controls_tab(
                    'btnstyle_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );

                    $this->add_control(
                        'slbtnhov_color',
                        [
                            'label' => __( 'Button background color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#f5b120',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-2 a:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-3 a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slbtnhov_bordercolor',
                        [
                            'label' => __( 'Button border color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#373b3e',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a:hover' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-2 a:hover' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-3 > a:hover' => 'border-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slbtn_hvr_color',
                        [
                            'label' => __( 'Title color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-content a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-2 a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .education-hero-content-3 > a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();// End tab hover

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();
		
		
		

        // Arrow style tab section
        $this->start_controls_section(
            'arrowbutton_style',
            [
                'label' => __( 'Arrow style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


            $this->start_controls_tabs(
                'arrow_btnstyle_tabs'
            );

                $this->start_controls_tab(
                    'arrow_btnstyle_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
                    ]
                );
                    $this->add_control(
                        'arrow_slbtext_color',
                        [
                            'label' => __( 'Arrow Button Icon color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-slider .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'arrow_slbtn_color',
                        [
                            'label' => __( 'Arrow Button background color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-slider .slick-arrow' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'arrow_button_border_radius',
                        [
                            'label' => esc_html__( 'Arrow Border Radius', 'wpeducation' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-slider .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover tab for button
                $this->start_controls_tab(
                    'arrow_btnstyle_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );

                    $this->add_control(
                        'arrow_slbtnhov_color',
                        [
                            'label' => __( 'Arrow Button background color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#f5b120',
                            'selectors' => [
                                '{{WRAPPER}} .education-hero-slider .slick-arrow:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
					
                $this->end_controls_tab();// End tab hover

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $sllayout = $settings['sllayout'];
        $slautoplay = $settings['slautoplay'];
        $slarrows = $settings['slarrows'];
        $sldots = $settings['sldots'];
        $slautoplayspeed = $settings['slautoplayspeed'];
        ?>
            <!-- Hero Section Start -->
            <div class="education-hero-section bg-gray fix">
                
                <?php if( $sllayout == 1 ):?>
                <div class="education-hero-slider">
                    <?php 
                        foreach ( $settings['sliders_list'] as $item ) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                    ?>
                        <div class="education-slide-item" style="background-image: url(<?php echo $images['url']; ?>);">
                            <div class="container">
                                <div class="row">
                                    <?php
                                        echo '<div class="education-hero-content-2 col-lg-6 col-md-10 col-12 text-center">';

                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h1>'.$item['slsubtitle'].'</h1>';
                                            }
                                            if( !empty( $item['sltitle'] ) ){
                                                echo '<p>'.$item['sltitle'].'</p>';
                                            }
                                            if( !empty($item['slbuttonlink']) ){
                                                echo '<a href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '.esc_attr($item['slbutton']).'</a>';
                                            }

                                        echo'</div>';
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php elseif( $sllayout == 2 ):?>
                <div class="education-hero-slider slider_lyout_three">
                    <?php 
                        foreach ( $settings['sliders_list'] as $item ) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                    ?>
                        <div class="education-slide-item" style="background-image: url(<?php echo $images['url']; ?>);">
                            <div class="container">
                                <div class="row">
                                    <?php

                                        echo '<div class="col-lg-6 col-12 order-2 order-lg-2 text-center"><div class="education-hero-content-2">';

                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }
                                            if( !empty( $item['sltitle'] ) ){
                                                echo '<h1>'.$item['sltitle'].'</h1>';
                                            }
                                            if( !empty( $item['sdescription'] ) ){
                                                echo '<p>'.$item['sdescription'].'</p>';
                                            }
                                            if( !empty($item['slbuttonlink']) ){
                                                echo '<a href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '.esc_attr($item['slbutton']).'</a>';
                                            }

                                        echo'</div></div>';
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php elseif( $sllayout == 3 ):?>
                <div class="education-hero-slider slider_lyout_three">
                    <?php 
                        foreach ( $settings['sliders_list'] as $item ) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                    ?>
                        <div class="education-slide-item" style="background-image: url(<?php echo $images['url']; ?>);">
                            <div class="container">
                                <div class="row">
                                    <?php

                                        echo '<div class="col-lg-12 text-center"><div class="education-hero-content-3">';

                                            if( !empty( $item['slsubtitle'] ) ){
                                                echo '<h2>'.$item['slsubtitle'].'</h2>';
                                            }
                                            if( !empty( $item['sltitle'] ) ){
                                                echo '<h1>'.$item['sltitle'].'</h1>';
                                            }
                                            if( !empty( $item['sdescription'] ) ){
                                                echo '<p>'.$item['sdescription'].'</p>';
                                            }
                                            if( !empty($item['slbuttonlink']) ){
                                                echo '<a href="' . esc_url($item['slbuttonlink']['url']) . '"' . $target . $nofollow . '> '.esc_attr($item['slbutton']).'</a>';
                                            }

                                        echo'</div></div>';
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif;?>
            </div><!-- Hero Section End -->

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $slarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $slautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($slautoplayspeed) ){ echo esc_js($slautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _dots_set = <?php echo esc_js( $sldots ) == 'yes' ? 'true': 'false'; ?>;

                <?php if( $sllayout == 1 || $sllayout == 2 || $sllayout == 3 ):?>

                    var heroSlider = $('.education-hero-slider');
                    heroSlider.slick({
                        arrows: _arrows_set,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        dots: _dots_set,
                        pauseOnFocus: false,
                        pauseOnHover: false,
                        fade: true,
                        infinite: true,
                        slidesToShow: 1,
                        customPaging : function(slider, i) {
                        var thumb = $(slider.$slides[i]).data();
                        return '<a>'+(i+1)+'</a>';},
                        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                    });

                <?php else:?>

                    var heroImageSlider = $('.education-hero-image-slider');
                    heroImageSlider.slick({
                        arrows: _arrows_set,
                        dots: _dots_set,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        pauseOnFocus: false,
                        pauseOnHover: false,
                        infinite: true,
                        slidesToShow: 1,
                        asNavFor: '.hero-content-slider',
                        appendArrows: '.hero-slider-controls',
                        appendDots: '.hero-slider-controls',
                    });
                        
                    var heroContentSlider = $('.education-hero-content-slider');
                    heroContentSlider.slick({
                        arrows: false,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        pauseOnFocus: false,
                        pauseOnHover: false,
                        infinite: true,
                        slidesToShow: 1,
                        prevArrow: '<button type="button" class="slick-prev"><i class="eicon-angle-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="eicon-angle-right"></i></button>',
                        asNavFor: '.hero-image-slider',
                    });
                <?php endif;?>
                    
                })(jQuery);

            </script>

        <?php

    }

    public function render_plain_content( $instance = [] ) {
        ?>

        <?php
    }

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Slider() );