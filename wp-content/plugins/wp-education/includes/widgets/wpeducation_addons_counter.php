<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_counter extends Widget_Base {

    public function get_name() {
        return 'counter_box';
    }
    
    public function get_title() {
        return __( 'Education : Counter Box', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'counter_title_content',
            [
                'label' => esc_html__( 'Counter Content', 'wpeducation' ),
            ]
        );
        
            $this->add_control(
                'counter_label',
                [
                    'label' => __( 'Counter Title', 'wpeducation' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Counter Title',
                    'title' => __( 'Enter Counter Title', 'wpeducation' ),
                ]
            );
            
            $this->add_control(
                'counter_number',
                [
                    'label' => __( 'Counter Number', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => '300',
                    'title' => __( 'Counter Number', 'wpeducation' ),
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

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'accrotabsize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'link_icon_type' => '2',
                    ]
                ]
            );

            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'wpeducation' ),
                    'type' => Controls_Manager::ICONS,
                    'default' =>array( 'value'=> 'eicon-library-download', 'library'=>'solid' ),
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'counter_title_style',
            [
                'label' => __( 'Counter Title', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'Title_colorone',
                [
                    'label' => __( 'Title color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-fun-factor h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
        
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography',
                    'selector' => '{{WRAPPER}} .education-single-fun-factor h3',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-fun-factor h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Title Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-fun-factor h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'aligntitle',
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
                        '{{WRAPPER}} .education-single-fun-factor h3' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab title section end
        

        // Description Style in Title
        $this->start_controls_section(
            'counter_number_style',
            [
                'label' => __( 'Number', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'number_color',
            [
                'label' => __( 'Number color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .education-single-fun-factor span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .education-single-fun-factor span',
            ]
        );
        $this->add_responsive_control(
            'number_align',
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
                    '{{WRAPPER}} .education-single-fun-factor span' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'margin_margin',
            [
                'label' => __( 'Number margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-fun-factor span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => __( 'Number Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-fun-factor span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Icon Style in Title
        $this->start_controls_section(
            'counter_icon_style',
            [
                'label' => __( 'Icon / Image', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .education-fun-factor-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'selector' => '{{WRAPPER}} .education-fun-factor-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_align',
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
                    '{{WRAPPER}} .education-fun-factor-icon' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __( 'Icon margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-fun-factor-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Icon Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-fun-factor-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $title = !empty( $settings['counter_label'] ) ? $settings['counter_label'] : '';
        $number = !empty( $settings['counter_number'] ) ? $settings['counter_number'] : '';
        $icon_show_hide   = $this->get_settings_for_display('icon_show_hide');
        $link_icon_type   = $this->get_settings_for_display('link_icon_type');
        $link_icon_iamge  =   $settings['link_icon_iamge'];
        
        ?>

        <div class="education-single-fun-factor text-center">
            <?php if($icon_show_hide == 'yes'){ ?>
            <div class="education-fun-factor-icon">
                <?php
                    if( $link_icon_type == 'image' ){
                       ?>
                        <img src="<?php echo $link_icon_iamge['url']; ?>" alt="" />
                        <?php
                    }else{
                        \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                    }
                ?>
            </div>
            <?php } ?>
            <?php if(!empty($number)): ?>
                <span class="counter"><?php echo esc_attr($number); ?></span>
            <?php endif; ?>
            <?php if(!empty($title)): ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
        </div>

        <?php
    
    }

    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_counter() );