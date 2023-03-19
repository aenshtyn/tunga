<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Service extends Widget_Base {

    public function get_name() {
        return 'services-post';
    }
    
    public function get_title() {
        return __( 'Education : Course Box', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-image-rollover';
    }

    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        // Course Area Start
        $this->start_controls_section(
            'service_setting',
            [
                'label' => esc_html__( 'Course', 'wpeducation' ),
            ]
        );
        $this->start_controls_tabs(
                'wpeducation_tabs'
            );
                $this->start_controls_tab(
                    'wpeducation_content_tab',
                    [
                        'label' => __( 'Content', 'wpeducation' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'wpeducation_categories',
                [
                    'label' => esc_html__( 'Select Service Category', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpeducation_categories(),                   
                ]
            );

            $this->add_control(
                'wpwducation_custom_order',
                [
                    'label' => esc_html__( 'Custom order', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label' => esc_html__( 'Orderby', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'          => esc_html__('None','wpeducation'),
                        'ID'            => esc_html__('ID','wpeducation'),
                        'date'          => esc_html__('Date','wpeducation'),
                        'name'          => esc_html__('Name','wpeducation'),
                        'title'         => esc_html__('Title','wpeducation'),
                        'comment_count' => esc_html__('Comment Count','wpeducation'),
                        'rand'          => esc_html__('Random','wpeducation'),
                    ],
                    'condition' => [
                        'wpwducation_custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_html__( 'Order', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'DESC'  => esc_html__('Descending','wpeducation'),
                        'ASC'   => esc_html__('Ascending','wpeducation'),
                    ],
                    'condition' => [
                        'wpwducation_custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 5,
                ]
            );
            $this->add_control(
                'title_link_show',
                [
                    'label' => esc_html__( 'Title Link Show/Hide', 'wpeducation' ),
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
                    'default' => 20,
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'wpeducation_option_tab',
                [
                    'label' => __( 'Option', 'wpeducation' ),
                ]
            );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iteam_layout',
                [
                    'label' => esc_html__( 'Select layout', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'carosul',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'wpeducation' ),
                        'grid' => esc_html__( 'Grid', 'wpeducation' ),
                    ],
                ]
            );               
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 4,
                    'max' => 100,
                    'step' => 1,
                    'default' => 4,
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
                        'iteam_layout' => 'carosul',
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
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'iteam_layout' => 'carosul',
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
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style Middle/Top', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Arrow Middle', 'wpeducation' ),
                        2 => esc_html__( 'Arrow Top', 'wpeducation' ),
                    ],
                     'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'wpeducation' ),
                    'type' => Controls_Manager::ICONS,
                    'default' =>array( 'value'=> 'fa fa-angle-right', 'library'=>'solid' ),
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'wpeducation' ),
                    'type' => Controls_Manager::ICONS,
                    'default' =>array( 'value'=> 'fa fa-angle-left', 'library'=>'solid' ),
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 3,
                    'condition' => [
                        'iteam_layout' => 'carosul',
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
                        'iteam_layout' => 'carosul',
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
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'wpeducation' ),
                        '2' => esc_html__( '2', 'wpeducation' ),
                        '3' => esc_html__( '3', 'wpeducation' ),
                        '4' => esc_html__( '4', 'wpeducation' ),
                        '5' => esc_html__( '5', 'wpeducation' ),
                        '6' => esc_html__( '6', 'wpeducation' ),
                    ],
                    'condition' => [
                        'iteam_layout' => 'grid',
                    ]
                ]
            );  

            $this->add_control(
                'read_more_btn_txt',
                [
                    'label' => __( 'Read more button Text', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter button text', 'wpeducation' ),
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
                'wpeducation_style_tabs'
            );
                $this->start_controls_tab(
                    'wpeducation_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
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
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .education-class-des a,{{WRAPPER}} .education-class-des > h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .education-class-des a,{{WRAPPER}} .education-class-des > h4',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-class-des a,{{WRAPPER}} .education-class-des > h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .education-class-des > p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .education-class-des > p',
                ]
            );
            // Meta Style
            $this->add_control(
                'meta_icon_heading',
                [
                    'label' => __( 'Meta Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color',
                [
                    'label' => __( 'Meta color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .education-class-schedule span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'icontypography',
                    'selector' => '{{WRAPPER}} .education-class-schedule span',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_icone',
                    'label' => __( 'Meta Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-class-schedule span',
                ]
            );  
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Meta margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-class-schedule span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Meta Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-class-schedule span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'wpeducation_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wpeducation' ),
                ]
            );
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#1bb4b9',
                    'selectors' => [
                        '{{WRAPPER}} .education-class-des a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading_hover',
                [
                    'label' => __( 'Content Hover Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color_hover',
                [
                    'label' => __( 'Content Hover color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .excerpt:hover p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_icon_heading_hover',
                [
                    'label' => __( 'Meta Hover Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color_hover',
                [
                    'label' => __( 'Icon Hover color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wp-education-box:hover .wp-education-image i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'wpeducation_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
                    ]
                );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Overlay Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-class-image,.education-single-class' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_alignment',
                [
                    'label' => __( 'Content Alignment', 'wpeducation' ),
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
                    ],
                    'default' => 'Left',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-class' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .education-single-class' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .education-single-class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-class' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-single-class',
                ]
            ); 
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Box Style', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Content Box Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-class-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Content Box Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-class-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                    'item_box_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );
                $this->add_control(
                    'box_overlay_hover_color',
                    [
                        'label' => __( 'Overlay Hover BG Color', 'wpeducation' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .education-single-class:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'wpeducation' ),
                        'selector' => '{{WRAPPER}} .education-single-class:hover',
                    ]
                ); 
            $this->end_controls_tab();
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Course Date Style
        $this->start_controls_section(
            'ourcourse_date_style',
            [
                'label' => __( 'Course Date', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ourcourse_date_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ourcourse_date__typography',
                'selector' => '{{WRAPPER}} .class-date, .gallery-icon',
            ]
        );

        $this->add_control(
            'ourcourse_date_bg_color',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourcourse_date_border',
            [
                'label' => __( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ourcourse_date_border',
                'label' => __( 'Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .class-date, .gallery-icon',
            ]
        );

        $this->add_responsive_control(
            'ourcourse_date_width',
            [
                'label' => __( 'Width', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourcourse_date_height',
            [
                'label' => __( 'Height', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourcourse_date_margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourcourse_date_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-class-date, .gallery-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Read More Button Style
        $this->start_controls_section(
            'ourcourse_button_style',
            [
                'label' => __( 'Read More Button', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ourcourse_button_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#666',
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourcourse_button_color_hvr',
            [
                'label' => __( 'Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-single-class:hover span.education-arrow > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ourcourse_button__typography',
                'selector' => '{{WRAPPER}} span.education-arrow > a',
            ]
        );

        $this->add_control(
            'ourcourse_button_bg_color',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'rgba(0,0,0,0)',
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourcourse_button_bg_color_hover',
            [
                'label' => __( 'BG Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-single-class:hover span.education-arrow > a::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourcourse_button_border',
            [
                'label' => __( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __( 'Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} span.education-arrow > a',
            ]
        );

        $this->add_control(
            'ourcourse_button_border_radius',
            [
                'label' => __( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'ourcourse_button_border_radius_hover',
            [
                'label' => __( 'Border Radius Hover', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'ourcourse_button__margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourcourse_button__padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} span.education-arrow > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'wpeducation_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wpeducation_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#d4d4d4',
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'wpeducation' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'wpeducation' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'wpeducation' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => 50,
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wpeducation_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1BB4B9',
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-our-course-area.carousel-style-one .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $iteam_layout = $settings['iteam_layout'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];
        $title_link_show = $settings['title_link_show'];
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = WPEDUCATION_Icon_manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );
        $arrow_icon_next        = WPEDUCATION_Icon_manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );
        $slarrowsstyle = $settings['slarrowsstyle'];
        $get_item_categories = $settings['wpeducation_categories'];

        $custom_order_ck    = $this->get_settings_for_display('wpwducation_custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order              = $this->get_settings_for_display('order');

        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();
        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
            <div class="education-our-course-area carousel-style-one">
                <div class="<?php if($iteam_layout == 'carosul'){ echo 'education-course-active '.$sectionid; if($slarrowsstyle==2){ echo ' education-indicator-style-two';} } else echo 'row'; ?>">
                    <?php
                    $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'wpeducation',
                            'posts_per_page'       => $per_page, 
                            'ignore_sticky_posts'  => 1,
                            'order'                => 'DESC',
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'wpeducation_category',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }

                        // Custom Order
                        if( $custom_order_ck == 'yes' ){
                            $htsargs['orderby'] = $orderby;
                            $htsargs['order'] = $order;
                        }

                        $htspost = new \WP_Query($htsargs);
                        while($htspost->have_posts()):$htspost->the_post();
                        $short_des = get_post_meta( get_the_ID(),'_wpeducation_course_short_des', true );
                        $age_calculate = get_post_meta( get_the_ID(),'_wpeducation_course_age_calculate', true );
                        $class_size = get_post_meta( get_the_ID(),'_wpeducation_course_class_size', true );
                        $class_date = get_post_meta( get_the_ID(),'_wpeducation_course_class_date', true );
                    ?>
                    <!-- Single Item --> 
                    <?php if($iteam_layout == 'grid') { echo '<div class="'.$collumval.'">'; } ?>
                    <div class="education-single-class">
                        <div class="education-single-class-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('wpeducation_img375x348');?>
                                <?php if( $class_date ){ ?>
                                <span class="education-class-date"><?php echo esc_html__(' ','wpeducation'); echo esc_html($class_date)?></span>
                           		<?php } ?>
                            </a>
                        </div>
                        <div class="education-single-class-text">
                            <div class="education-class-des">
                                <h4>
                                    <?php if( $title_link_show == 'yes' ){?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                        </a>
                                    <?php } else{ echo wp_trim_words( get_the_title(), $titlelength, '' );}?>
                                </h4>
                                <?php echo '<p>'.wp_trim_words( $short_des, $contetnlength, '' ).'</p>';?>
                            </div>
                            <div class="education-class-schedule">
                                <span><?php echo esc_html__(' ','wpeducation'); echo esc_html($age_calculate)?></span>
                                <span><?php echo esc_html__(' ','wpeducation'); echo esc_html($class_size)?></span>
                                <span class="education-arrow"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->

                    <?php if($iteam_layout == 'grid'){echo '</div> ';}?>
                <?php endwhile; ?>
                </div>
            </div>

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(1); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(1); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;
                    $('.education-course-active.<?php echo $sectionid;?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        prevArrow: '<div class="btn-prev"><?php echo $arrow_icon_prev;?></div>',
                        nextArrow: '<div><?php echo $arrow_icon_next;?></div>',
                        responsive: [
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
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 480,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                }
                              ]
                        });
                    
                })(jQuery);

            </script>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }

    protected function content_template() {

    }

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Service() );