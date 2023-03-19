<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class WPeducation_Elementor_Widget_Gallery extends Widget_Base {


    public function get_name() {
        return 'wpeducation-gallery-addons';
    }
    
    public function get_title() {
        return __( 'Education : Gallery', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-instagram-gallery';
    }

    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'wpeducation-gallery',
            [
                'label' => esc_html__( 'Gallery', 'wpeducation' ),
            ]
        );

            $this->add_control(
                'filttering_title',
                [
                    'label' => __( 'Filtter Options', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'filter_show_hide',
                [
                    'label' => esc_html__( 'Filter Menu Show/Hide', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                    
            $this->add_control(
                'wpeducation_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpeducation_gallery_categories(),
                ]
            );
            $this->add_control(
                'all_btn_show_hide',
                [
                    'label' => esc_html__( 'All Menu Show/Hide', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'all_btn_text',
                [
                    'label' => __( 'All Button Text', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'All',
                    'title' => __( 'Enter All Button Text', 'wpeducation' ),
                    'condition' => [
                        'all_btn_show_hide' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'item_title',
                [
                    'label' => __( 'Item  Options', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );  
            $this->add_control(
              'wpeducation_all_item',
              [
                 'label'   => __( 'Show All Item Number', 'wpeducation' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 6,
                 'min'     => 2,
                 'max'     => 1000,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'wpeducation_item_column',
                [
                    'label' => esc_html__( 'Show Columns', 'wpeducation' ),
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
                ]
            ); 
            $this->add_control(
                'wpeducation_item_column_md',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Tab)', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'wpeducation' ),
                        '2' => esc_html__( '2', 'wpeducation' ),
                        '3' => esc_html__( '3', 'wpeducation' ),
                        '4' => esc_html__( '4', 'wpeducation' ),
                    ],
                ]
            );

            $this->add_control(
                'wpeducation_item_column_sm',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Large Mobile)', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( '1', 'wpeducation' ),
                        '2' => esc_html__( '2', 'wpeducation' ),
                        '3' => esc_html__( '3', 'wpeducation' ),
                        '4' => esc_html__( '4', 'wpeducation' ),
                    ],
                ]
            );
           $this->add_control(
                'wpeducation_item_order',
                [
                    'label' => esc_html__( 'Order By', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'recent-products',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'wpeducation' ),
                        'DESC' => esc_html__( 'Descending', 'wpeducation' ),
                    ],
                ]
            );
            $this->add_control(
              'wpeducation_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'wpeducation' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 20,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'icon_show_hide',
                [
                    'label' => esc_html__( 'Icon Show/Hide', 'wpeducation' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 

           $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wpeducation' ),
                        'image' => esc_html__( 'Image', 'wpeducation' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'link_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wpeducation' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'wpeducation' ),
                    'type' => Controls_Manager::ICONS,
                    'default' =>array( 'value'=> 'eicon-image', 'library'=>'solid' ),
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );



        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
                    ]
                );
                    $this->add_control(
                        'filter_box_style',
                        [
                            'label' => __( 'Filter Box  Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'filter_box_bg_color',
                        [
                            'label' => __( 'Filter Box BG COlor', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'filter_box_border',
                            'label' => __( 'Box Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-filter-menu-list',
                        ]
                    ); 
                    $this->add_control(
                        'filter_box_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_padding',
                        [
                            'label' => __( 'Padding', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_margin',
                        [
                            'label' => __( 'Margin', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_alignment',
                        [
                            'label' => __( 'Alignment', 'wpeducation' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'wpeducation' ),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'wpeducation' ),
                                    'icon' => 'eicon-v-align-middle',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'wpeducation' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'default' => 'center',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );

                    // Filtter Button Style
                    $this->add_control(
                        'filter_style',
                        [
                            'label' => __( 'Filter Button Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_color',
                        [
                            'label' => __( 'Button Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'fillter_buttion_bg_color',
                        [
                            'label' => __( 'Button BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-filter-menu-list button',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_padding',
                        [
                            'label' => __( 'Button Padding', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_margin',
                        [
                            'label' => __( 'Buttio Margin', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'selector' => '{{WRAPPER}} .education-filter-menu-list button',
                        ]
                    );

                    $this->add_control(
                        'item_box_style',
                        [
                            'label' => __( 'Item Box Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_color',
                        [
                            'label' => __( 'Box Bg Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'item_icon_style_heading',
                        [
                            'label' => __( 'Item Link Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Link Icon Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education_item_image a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link' => 'width: {{VALUE}}px;',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .education_item_image a.icon_link',
                        ]
                    );

                    $this->add_control(
                        'category_style',
                        [
                            'label' => __( 'Item Title Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'category_link_color',
                        [
                            'label' => __( 'Category Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education-cat-wrapper,.education-cat-wrapper > a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'category_link_hvr_color',
                        [
                            'label' => __( 'Category Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education-cat-wrapper > a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'selector' => '{{WRAPPER}} .education-cat-wrapper,.education-cat-wrapper > a',
                        ]
                    );

                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );
                    $this->add_control(
                        'filter_style_hover',
                        [
                            'label' => __( 'Filter Button Hover/Acitive Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_color',
                        [
                            'label' => __( 'Button Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button:hover, {{WRAPPER}} .education-filter-menu-list button.is-checked ' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                     $this->add_control(
                        'fillter_buttion_dot_color',
                        [
                            'label' => __( 'Button Dot Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button.is-checked::after' => 'background: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'fillter_buttion_hover_bg_color',
                        [
                            'label' => __( 'Button Hover BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'fillter_buttion_hover_act_bg_color',
                        [
                            'label' => __( 'Button Active BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .education-filter-menu-list button.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education-filter-menu-list button',
                        ]
                    ); 

                    $this->add_control(
                        'item_box_style_hover',
                        [
                            'label' => __( 'Item Box Hover Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_hover_color',
                        [
                            'label' => __( 'Box Bg Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0.4)',
                            'selectors' => [
                                '{{WRAPPER}} .education-grid-item:hover .education_item_image::before' => 'background: {{VALUE}};',
                            ],
                        ]
                    );  
                    $this->add_control(
                        'item_icon_style',
                        [
                            'label' => __( 'Item Link Hover Style', 'wpeducation' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Link Icon Hover Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG Color', 'wpeducation' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#1bb4b9',
                            'selectors' => [
                                '{{WRAPPER}} .education_item_image a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'wpeducation' ),
                            'selector' => '{{WRAPPER}} .education_item_image a.icon_link:hover',
                        ]
                    ); 

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $filter_show_hide   = $this->get_settings_for_display('filter_show_hide');
        $all_btn_show_hide  = $this->get_settings_for_display('all_btn_show_hide');
        $wpeducation_all_item       = $this->get_settings_for_display('wpeducation_all_item');
        $wpeducation_item_column    = $this->get_settings_for_display('wpeducation_item_column');
        $wpeducation_item_column_md = $this->get_settings_for_display('wpeducation_item_column_md');
        $wpeducation_item_column_sm = $this->get_settings_for_display('wpeducation_item_column_sm');
        $wpeducation_item_order    = $this->get_settings_for_display('wpeducation_item_order');
        $wpeducation_item_gutter  = $this->get_settings_for_display('wpeducation_item_gutter');
        $icon_show_hide   = $this->get_settings_for_display('icon_show_hide');
        $link_icon_type   = $this->get_settings_for_display('link_icon_type');
        $link_icon_font   = $this->get_settings_for_display('link_icon_font');
        $link_icon_iamge  =   $settings['link_icon_iamge'];

        $wpeducation_item_gutter = $wpeducation_item_gutter/2;
        if( $wpeducation_item_column !='' ){
            $wpeducation_item_column = round(100/$wpeducation_item_column);
        }

        if( $wpeducation_item_column_md !='' ){
            $wpeducation_item_column_md = round(100/$wpeducation_item_column_md);
        }

        if( $wpeducation_item_column_sm !='' ){
            $wpeducation_item_column_sm = round(100/$wpeducation_item_column_sm);
        }

        $args = array(
            'post_type'             => 'gallery',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $wpeducation_all_item,
        );


        $get_item_categories = $settings['wpeducation_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        $gallery_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($gallery_cats) && count($gallery_cats) > 0 ){
                $field_name = is_numeric($gallery_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'gallery_cat',
                        'terms' => $gallery_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        ?>
            <div class="filter-area">
                <?php if($filter_show_hide=='yes'){ ?>
                    <div class="education-filter-menu-list">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button class="is-checked " data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>
                        <?php  if($get_item_categories) { 
                            foreach( $get_item_categories as $selected_categorys_array_single ):
                                $term_info = get_term_by('slug', $selected_categorys_array_single, 'gallery_cat');
                            ?>
                        <?php $catagories_name = str_replace('-', ' ', $selected_categorys_array_single);?>
                        <button data-filter=".<?php echo $selected_categorys_array_single; ?>"><?php echo $term_info->name; ?></button>
                        <?php endforeach; } ?>
                    </div>
                <?php } ?>
                <div class="ft_item-style">
                    <div class="all_item_wrapper grid-active">
                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'gallery',
                                'posts_per_page' =>$wpeducation_all_item,
                                'gallery_cat' => $get_item_categories,
                                'order' => $wpeducation_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'gallery_cat');

                         $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>
                        <div class="education_filter_item_box education-grid-item <?php if( $terms ){  foreach($terms as $term ){ echo $term->slug .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){?>  
                            <div class="education_item_image">
                                <?php if($icon_show_hide == 'yes'){ ?>
                                <a class="icon_link"  data-fancybox="images"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                    <?php
                                        if( $link_icon_type == 'image' ){
                                            echo wp_get_attachment_image( $link_icon_iamge['id'] );
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail();?>
                                <?php }else{ ?>
                                <a  data-fancybox="images"  href="<?php echo esc_attr( $full_image[0] ) ; ?>"><?php the_post_thumbnail();?> </a> <?php } ?>
                                <span class="education-cat-wrapper">
                                    <?php echo get_the_title(); ?>
                                </span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; 
                        ?>
                    </div>
                </div>
            </div>

    <style>
        .all_item_wrapper{
            margin: -<?php echo $wpeducation_item_gutter ?>px;
        }
        .education_filter_item_box{
            width:<?php echo $wpeducation_item_column ?>%;
            padding:<?php echo $wpeducation_item_gutter ?>px;
        }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .education_filter_item_box{
                width:<?php echo $wpeducation_item_column_md ?>%;
            }
        }
        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .education_filter_item_box{
                width:<?php echo $wpeducation_item_column_sm ?>%;
            }
        }
    </style>



        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                // images have loaded
                $('.filter-area').imagesLoaded( function() {

                  // Isotop Active
                  $('.education-filter-menu-list').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active').isotope({
                    itemSelector: '.education-grid-item',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.education-grid-item',
                    }
                  });

                  // Isotop Menu Active
                  $('.education-filter-menu-list button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });

                  // Image Popup Fancy Active
                  $(".popup-gallery").fancybox();

                });
                
            });

        </script>

        <?php

    }

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Gallery() );