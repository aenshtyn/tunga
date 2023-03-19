<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Countdown extends Widget_Base {

    public function get_name() {
        return 'education-countdown';
    }
    
    public function get_title() {
        return __( 'Education : Countdown', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-countdown';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    public function get_script_depends() {
        return [
            'education-countdown',
            'education-widgets-active',
        ];
    }

    protected function register_controls() {

        // Start Date option tab 
        $this->start_controls_section(
            'countdown_content',
            [
                'label' => __( 'Countdown', 'wpeducation' ),
            ]
        );

            $this->add_control(
                'target_date',
                [
                    'label'       => esc_html__( 'Due Date', 'wpeducation' ),
                    'type'        => Controls_Manager::DATE_TIME,
                    'picker_options'=>array(
                        'dateFormat' =>"Y/m/d",
                    ),
                    'default'     => date( 'Y/m/d', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
                ]
            );

        $this->end_controls_section(); // Date Optiin end

        //$this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'education_countdown_style',
            [
                'label' => __( 'Count Area', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'time_color',
                [
                    'label'     => __( ' Color', 'ene' ),
                    'type'      => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'time_typography',
                    'selector'  => '{{WRAPPER}} .education-about-countdown > div',
                ]
            );

            $this->add_control(
                'time_border_rads',
                [
                    'label' => __( 'Border Radius', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

             $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'time_border',
                    'label' => __( 'Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-about-countdown > div',
                ]
            );

            $this->add_responsive_control(
                'time_width',
                [
                    'label' => __( 'Width', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'width: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'time_height',
                [
                    'label' => __( 'Height', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'time_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'time_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'hour_count',
                [
                    'label'     => __( 'Label', 'wpeducation' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'minute_color',
                [
                    'label'     => __( ' Color', 'ene' ),
                    'type'      => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown > div span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'minute_typography',
                    'selector'  => '{{WRAPPER}} .education-about-countdown > div span',
                   
                ]
            );

            $this->add_control(
                'box_count',
                [
                    'label'     => __( 'Counter Box', 'wpeducation' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'counter_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown .cdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'counter_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-about-countdown .cdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section(); // Section style tab end

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        ?>
            <div class="education-about-countdown" data-countdown="<?php echo date_format( date_create( $settings['target_date']),"Y/m/d"); ?>"></div>
        <?php
    }

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Countdown() );