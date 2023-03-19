<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Info_Box extends Widget_Base {

    public function get_name() {
        return 'info-addons';
    }
    
    public function get_title() {
        return __( 'Education : Info Box', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'info-setting',
            [
                'label' => esc_html__( 'Info Settings', 'wpeducation' ),
            ]
        );
        
            $this->add_control(
                'infoiconty',
                [
                    'label' => esc_html__( 'Info Icon type', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'wpeducation' ),
                        '2' => esc_html__( 'image', 'wpeducation' ),
                    ],
                ]
            );

            $this->add_control(
                'infoimage',
                [
                    'label' => __( 'Info image', 'wpeducation' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'infoiconty' => '2',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'infoimagesize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'infoiconty' => '2',
                    ]
                ]
            );

            $this->add_control(
                'infoicon',
                [
                    'label' => __( 'Info icon', 'wpeducation' ),
                    'type' => Controls_Manager::ICONS,
					'default' => array(
						'value'=> 'eicon-meetup',
						'library'=>'solid',
					),
                    'condition' => [
                        'infoiconty' => '1',
                    ]
                ]
            );

            $this->add_control(
                'infotitle',
                [
                    'label' => __( 'Info Title', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
					'default' => 'Your Title',
                    'placeholder' => __( 'Info Title', 'wpeducation' ),
                ]
            );

            $this->add_control(
                'infocontent',
                [
                    'label' => __( 'Info description', 'wpeducation' ),
                    'type' => Controls_Manager::TEXTAREA,
					'default' => 'Fusce pretium, est at aliquam semper, leo ante facilisis in feugiat ipsum augue pellent metu.',
                    'rows' => 10,
                    'placeholder' => __( 'Type your description here', 'wpeducation' ),
                ]
            );

        $this->end_controls_section();

        // info Box Style
        $this->start_controls_section(
            'section_area_style',
            [
                'label' => __( 'Info Box Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sectionmargin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sectionpadding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'single-info-box-background',
                [
                    'label' => __( 'BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .education-info' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'single-info-box-background-hover',
                [
                    'label' => __( 'Bg Color Hover', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    
                    'selectors' => [
                        '{{WRAPPER}} .education-info:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Box Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-info',
                ]
            );

            $this->add_responsive_control(
                'info_aligntitle',
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
                        '{{WRAPPER}} .education-info' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // info Section Title
        $this->start_controls_section(
            'section_info_title_style',
            [
                'label' => __( 'Title Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'info_title_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-info h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'info_title_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-info:hover .education-info h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_titletypography',
                'selector' => '{{WRAPPER}} .education-info h4',
            ]
        );

        $this->add_responsive_control(
            'info_titlenmargin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_titlepadding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // info Section Description
        $this->start_controls_section(
            'section_info_description_style',
            [
                'label' => __( 'Description Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'info_desc_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .education-info > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'info_desc_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .education-info > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desctypography',
                'selector' => '{{WRAPPER}} .education-info > p',
            ]
        );

        $this->add_responsive_control(
            'descnmargin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'descpadding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Info Icon Style
        $this->start_controls_section(
            'info_icon_style',
            [
                'label' => __( 'Icon Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'info_icon_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'info_icon_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-info:hover .education-info-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single-info-background',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single-info-background-hover',
            [
                'label' => __( 'Bg Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .education-info:hover .education-info-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'infoicontypography',
                'selector' => '{{WRAPPER}} .education-info-icon',
            ]
        );

        $this->add_responsive_control(
            'info_icon_margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_icon_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'info_border',
                'label' => __( 'Icon Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-info-icon',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'info_border_hvr',
                'label' => __( 'Icon Border Hover', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-info:hover .education-info-icon',
            ]
        ); 

        $this->add_control(
            'info_icon_border_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'info_icon_width',
            [
                'label' => __( 'Icon Width', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => ' ',
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_icon_height',
            [
                'label' => __( 'Icon Height', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => ' ',
                'selectors' => [
                    '{{WRAPPER}} .education-info-icon' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings        = $this->get_settings_for_display();
        $infoiconty      = $this->get_settings_for_display('infoiconty');
        $infotitle       = $this->get_settings_for_display('infotitle');
        $infocontent     = $this->get_settings_for_display('infocontent');

        ?>

            <div class="education-info text-center">
                <div class="education-info-icon">
                    <?php
                        if( $infoiconty == 2 ){
                            echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'infoimagesize', 'infoimage' );
                        }else{
                            \Elementor\Icons_Manager::render_icon( $settings['infoicon'], [ 'aria-hidden' => 'true' ] );
                        }
                    ?>
                </div>
                <?php
                    if( !empty($infotitle) ){
                        echo '<h4>'.esc_attr($infotitle).'</h4>';
                    }
                    if( !empty($infocontent) ){
                        echo '<p>'.$infocontent.'</p>';
                    }
                ?>
            </div>

        <?php

    }

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Info_Box() );