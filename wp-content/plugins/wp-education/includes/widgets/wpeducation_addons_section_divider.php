<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Divider Widget
 */
class WPeducation_Elementor_Widget_Divider extends Widget_Base {
    
    /**
     * Retrieve divider widget name.
     */
    public function get_name() {
        return 'education-divider';
    }

    /**
     * Retrieve divider widget title.
     */
    public function get_title() {
        return __( 'Education : Divider', 'wpeducation' );
    }

    /**
     * Retrieve the list of categories the divider widget belongs to.
     */
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    /**
     * Retrieve divider widget icon.
     */
    public function get_icon() {
        return 'eicon-divider';
    }

    /**
     * Register divider widget controls.
     */
    protected function register_controls() {

        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Content Tab: Divider
         */
        $this->start_controls_section(
            'section_buton',
            [
                'label'                 => __( 'Divider', 'wpeducation' ),
            ]
        );
        
        $this->add_control(
            'divider_type',
            [
                'label'                 => esc_html__( 'Type', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'label_block'           => false,
                'options'               => [
                    'plain'        => [
                        'title'    => esc_html__( 'Plain', 'wpeducation' ),
                        'icon'     => 'eicon-ellipsis-h',
                    ],
                    'text'         => [
                        'title'    => esc_html__( 'Text', 'wpeducation' ),
                        'icon'     => 'eicon-document-file',
                    ],
                    'icon'         => [
                        'title'    => esc_html__( 'Icon', 'wpeducation' ),
                        'icon'     => 'eicon-document-file',
                    ],
                    'image'        => [
                        'title'    => esc_html__( 'Image', 'wpeducation' ),
                        'icon'     => 'eicon-image-hotspot',
                    ],
                ],
                'default'               => 'plain',
            ]
        );

        $this->add_control(
            'divider_direction',
            [
                'label'                 => __( 'Direction', 'wpeducation' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'horizontal',
                'options'               => [
                   'horizontal'     => __( 'Horizontal', 'wpeducation' ),
                   'vertical'       => __( 'Vertical', 'wpeducation' ),
                ],
                'condition'             => [
                    'divider_type'    => 'plain',
                ],
            ]
        );

        $this->add_control(
            'divider_text',
            [
                'label'                 => __( 'Text', 'wpeducation' ),
                'type'                  => Controls_Manager::TEXT,
                'default'               => __( 'Divider Text', 'wpeducation' ),
                'condition'             => [
                    'divider_type'    => 'text',
                ],
            ]
        );

        $this->add_control(
            'divider_icon',
            [
                'label'                 => __( 'Icon', 'wpeducation' ),
                'type'                  => Controls_Manager::ICONS,
                'default' =>array( 'value'=> 'eicon-custom', 'library'=>'solid' ),
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
            ]
        );

        $this->add_control(
            'text_html_tag',
            [
                'label'                 => __( 'HTML Tag', 'wpeducation' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'span',
                'options'               => [
                    'h1'            => __( 'H1', 'wpeducation' ),
                    'h2'            => __( 'H2', 'wpeducation' ),
                    'h3'            => __( 'H3', 'wpeducation' ),
                    'h4'            => __( 'H4', 'wpeducation' ),
                    'h5'            => __( 'H5', 'wpeducation' ),
                    'h6'            => __( 'H6', 'wpeducation' ),
                    'div'           => __( 'div', 'wpeducation' ),
                    'span'          => __( 'span', 'wpeducation' ),
                    'p'             => __( 'p', 'wpeducation' ),
                ],
                'condition'             => [
                    'divider_type'    => 'text',
                ],
            ]
        );
        
        $this->add_control(
            'divider_image',
            [
                'label'                 => __( 'Image', 'wpeducation' ),
                'type'                  => Controls_Manager::MEDIA,
                'default'               => [
                    'url'           => Utils::get_placeholder_image_src(),
                ],
                'condition'             => [
                    'divider_type'    => 'image',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'align',
            [
                'label'                 => __( 'Alignment', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'default'               => 'center',
                'options'               => [
                    'left'          => [
                        'title'     => __( 'Left', 'wpeducation' ),
                        'icon'      => 'eicon-h-align-left',
                    ],
                    'center'        => [
                        'title'     => __( 'Center', 'wpeducation' ),
                        'icon'      => 'eicon-v-align-middle',
                    ],
                    'right'         => [
                        'title'     => __( 'Right', 'wpeducation' ),
                        'icon'      => 'eicon-h-align-right',
                    ],
                ],
                'selectors'             => [
                    '{{WRAPPER}}'   => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Style Tab: Divider
         */
        $this->start_controls_section(
            'section_divider_style',
            [
                'label'                 => __( 'Divider', 'wpeducation' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_control(
            'divider_vertical_align',
            [
                'label'                 => __( 'Vertical Alignment', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'label_block'           => false,
                'default'               => 'middle',
                'options'               => [
                    'top'          => [
                        'title'    => __( 'Top', 'wpeducation' ),
                        'icon'     => 'eicon-arrow-up',
                    ],
                    'middle'       => [
                        'title'    => __( 'Center', 'wpeducation' ),
                        'icon'     => 'eicon-h-align-stretch',
                    ],
                    'bottom'       => [
                        'title'    => __( 'Bottom', 'wpeducation' ),
                        'icon'     => 'eicon-arrow-down',
                    ],
                ],
                'selectors'             => [
                    '{{WRAPPER}} .divider-text-wrap'   => 'align-items: {{VALUE}};',
                ],
                'selectors_dictionary'  => [
                    'top'          => 'flex-start',
                    'middle'       => 'center',
                    'bottom'       => 'flex-end',
                ],
                'condition'             => [
                    'divider_type!'   => 'plain',
                ],
            ]
        );

        $this->add_control(
            'divider_style',
            [
                'label'                 => __( 'Style', 'wpeducation' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'solid',
                'options'               => [
                   'solid'          => __( 'Solid', 'wpeducation' ),
                   'dashed'         => __( 'Dashed', 'wpeducation' ),
                   'dotted'         => __( 'Dotted', 'wpeducation' ),
                   'double'         => __( 'Double', 'wpeducation' ),
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider, {{WRAPPER}} .divider-border' => 'border-style: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'horizontal_height',
            [
                'label'                 => __( 'Height', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px'       => [
                        'min'  => 1,
                        'max'  => 60,
                    ],
                ],
                'default'               => [
                    'size'     => 3,
                    'unit'     => 'px',
                ],
                'tablet_default'    => [
                    'unit'     => 'px',
                ],
                'mobile_default'    => [
                    'unit'     => 'px',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider.horizontal' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
                ],
                'condition'             => [
                    'divider_direction'    => 'horizontal',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'vertical_height',
            [
                'label'                 => __( 'Height', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px'           => [
                        'min'      => 1,
                        'max'      => 500,
                    ],
                ],
                'default'               => [
                    'size'         => 80,
                    'unit'         => 'px',
                ],
                'tablet_default'   => [
                    'unit'         => 'px',
                ],
                'mobile_default'   => [
                    'unit'         => 'px',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider.vertical' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
                ],
                'condition'             => [
                    'divider_direction'    => 'vertical',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'horizontal_width',
            [
                'label'                 => __( 'Width', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px'           => [
                        'min'      => 1,
                        'max'      => 1200,
                    ],
                ],
                'default'               => [
                    'size'         => 300,
                    'unit'         => 'px',
                ],
                'tablet_default'   => [
                    'unit'         => 'px',
                ],
                'mobile_default'   => [
                    'unit'         => 'px',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider.horizontal' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition'             => [
                    'divider_direction'    => 'horizontal',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'vertical_width',
            [
                'label'                 => __( 'Width', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px'           => [
                        'min'      => 1,
                        'max'      => 100,
                    ],
                ],
                'default'               => [
                    'size'         => 3,
                    'unit'         => 'px',
                ],
                'tablet_default'   => [
                    'unit'         => 'px',
                ],
                'mobile_default'   => [
                    'unit'         => 'px',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider.vertical' => 'border-left-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition'             => [
                    'divider_direction'    => 'vertical',
                ],
            ]
        );

        $this->add_control(
            'divider_border_color',
            [
                'label'                 => __( 'Divider Color', 'wpeducation' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .education-divider, {{WRAPPER}} .divider-border' => 'border-color: {{VALUE}};',
                ],
                'condition'             => [
                    'divider_type'    => 'plain',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_before_after_style' );

        $this->start_controls_tab(
            'tab_before_style',
            [
                'label'                 => __( 'Before', 'wpeducation' ),
                'condition'             => [
                    'divider_type!'   => 'plain',
                ],
            ]
        );

        $this->add_control(
            'divider_before_color',
            [
                'label'                 => __( 'Divider Color', 'wpeducation' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'condition'             => [
                    'divider_type!'   => 'plain',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .divider-border-left .divider-border' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_after_style',
            [
                'label'                 => __( 'After', 'wpeducation' ),
                'condition'             => [
                    'divider_type!'   => 'plain',
                ],
            ]
        );

        $this->add_control(
            'divider_after_color',
            [
                'label'                 => __( 'Divider Color', 'wpeducation' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'condition'             => [
                    'divider_type!'   => 'plain',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .divider-border-right .divider-border' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Text
         */
        $this->start_controls_section(
            'section_text_style',
            [
                'label'                 => __( 'Text', 'wpeducation' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'divider_type'    => 'text',
                ],
            ]
        );
        
        $this->add_control(
            'text_position',
            [
                'label'                 => __( 'Position', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'options'               => [
                    'left'         => [
                        'title'    => __( 'Left', 'wpeducation' ),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'       => [
                        'title'    => __( 'Center', 'wpeducation' ),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'        => [
                        'title'    => __( 'Right', 'wpeducation' ),
                        'icon'     => 'eicon-text-align-right',
                    ],
                ],
                'default'               => 'center',
                'prefix_class'          => 'education-divider-'
            ]
        );

        $this->add_control(
            'divider_text_color',
            [
                'label'                 => __( 'Color', 'wpeducation' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'condition'             => [
                    'divider_type'    => 'text',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'typography',
                'label'                 => __( 'Typography', 'wpeducation' ),
                'selector'              => '{{WRAPPER}} .education-divider-text',
                'condition'             => [
                    'divider_type'    => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'                  => 'divider_text_shadow',
                'selector'              => '{{WRAPPER}} .education-divider-text',
            ]
        );
        
        $this->add_responsive_control(
            'text_spacing',
            [
                'label'                 => __( 'Spacing', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 200,
                    ],
                ],
                'condition'             => [
                    'divider_type'    => 'text',
                ],
                'selectors'             => [
                    '{{WRAPPER}}.education-divider-center .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-left .education-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-right .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        /**
         * Style Tab: Icon
         */
        $this->start_controls_section(
            'section_icon_style',
            [
                'label'                 => __( 'Icon', 'wpeducation' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
            ]
        );
        
        $this->add_control(
            'icon_position',
            [
                'label'                 => __( 'Position', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'options'               => [
                    'left'         => [
                        'title'    => __( 'Left', 'wpeducation' ),
                        'icon'     => 'eicon-h-align-left',
                    ],
                    'center'       => [
                        'title'    => __( 'Center', 'wpeducation' ),
                        'icon'     => 'eicon-v-align-middle',
                    ],
                    'right'        => [
                        'title'    => __( 'Right', 'wpeducation' ),
                        'icon'     => 'eicon-h-align-right',
                    ],
                ],
                'default'               => 'center',
                'prefix_class'          => 'education-divider-'
            ]
        );

        $this->add_control(
            'divider_icon_color',
            [
                'label'                 => __( 'Color', 'wpeducation' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_size',
            [
                'label'                 => __( 'Size', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default'               => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_rotation',
            [
                'label'                 => __( 'Icon Rotation', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 360,
                    ],
                ],
                'default'               => [
                    'unit' => 'px',
                ],
                'tablet_default'    => [
                    'unit' => 'px',
                ],
                'mobile_default'    => [
                    'unit' => 'px',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-icon .fa' => 'transform: rotate( {{SIZE}}deg );',
                ],
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_spacing',
            [
                'label'                 => __( 'Spacing', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 200,
                    ],
                ],
                'condition'             => [
                    'divider_type'    => 'icon',
                ],
                'selectors'             => [
                    '{{WRAPPER}}.education-divider-center .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-left .education-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-right .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        /**
         * Style Tab: Image
         */
        $this->start_controls_section(
            'section_image_style',
            [
                'label'                 => __( 'Image', 'wpeducation' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'divider_type'    => 'image',
                ],
            ]
        );
        
        $this->add_control(
            'image_position',
            [
                'label'                 => __( 'Position', 'wpeducation' ),
                'type'                  => Controls_Manager::CHOOSE,
                'options'               => [
                    'left'      => [
                        'title' => __( 'Left', 'wpeducation' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'wpeducation' ),
                        'icon'  => 'eicon-v-align-middle',
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'wpeducation' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default'               => 'center',
                'prefix_class'          => 'education-divider-'
            ]
        );
        
        $this->add_responsive_control(
            'image_width',
            [
                'label'                 => __( 'Width', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 1200,
                    ],
                ],
                'default'               => [
                    'size' => 80,
                    'unit' => 'px',
                ],
                'tablet_default'    => [
                    'unit' => 'px',
                ],
                'mobile_default'    => [
                    'unit' => 'px',
                ],
                'condition'             => [
                    'divider_type'    => 'image',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label'                 => __( 'Border Radius', 'wpeducation' ),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => [ 'px', '%' ],
                'condition'             => [
                    'divider_type'    => 'image',
                ],
                'selectors'             => [
                    '{{WRAPPER}} .education-divider-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'image_spacing',
            [
                'label'                 => __( 'Spacing', 'wpeducation' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ '%', 'px' ],
                'range'                 => [
                    'px' => [
                        'max' => 200,
                    ],
                ],
                'condition'             => [
                    'divider_type'    => 'image',
                ],
                'selectors'             => [
                    '{{WRAPPER}}.education-divider-center .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-left .education-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.education-divider-right .education-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

    }

    /**
     * Render divider widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'divider', 'class', 'education-divider' );

        if ( $settings['divider_direction'] ) {
            $this->add_render_attribute( 'divider', 'class', $settings['divider_direction'] );
        }

        if ( $settings['divider_style'] ) {
            $this->add_render_attribute( 'divider', 'class', $settings['divider_style'] );
        }
        
        $this->add_render_attribute( 'divider-content', 'class', 'education-divider-' . $settings['divider_type'] );
        
        $this->add_inline_editing_attributes( 'divider_text', 'none' );
        $this->add_render_attribute( 'divider_text', 'class', 'education-divider-' . $settings['divider_type'] );
        
        ?>
        <div class="education-divider-wrap">
            <?php
            if ( $settings['divider_type'] == 'plain' ) { ?>
                <div <?php echo $this->get_render_attribute_string( 'divider' ); ?>></div>
                <?php
            }
            else { ?>
                <div class="divider-text-container">
                    <div class="divider-text-wrap">
                        <span class="divider-border-wrap divider-border-left">
                            <span class="divider-border"></span>
                        </span>
                        <span class="education-divider-content">
                            <?php if ( $settings['divider_type'] == 'text' && $settings['divider_text'] ) { ?>
                                <?php
                                    printf('<%1$s %2$s>%3$s</%1$s>', $settings['text_html_tag'], $this->get_render_attribute_string( 'divider_text' ), $settings['divider_text'] );
                                ?>
                            <?php } elseif ( $settings['divider_type'] == 'icon' && $settings['divider_icon'] ) { ?>
                                <span <?php echo $this->get_render_attribute_string( 'divider-content' ); ?>>
									<span><?php \Elementor\Icons_Manager::render_icon( $settings['divider_icon'], [ 'aria-hidden' => 'true' ] );?></span>
                                </span>
                            <?php } elseif ( $settings['divider_type'] == 'image' ) { ?>
                                <span <?php echo $this->get_render_attribute_string( 'divider-content' ); ?>>
                                    <?php
                                        $image = $settings['divider_image'];
                                        if ( $image['url'] ) { ?>
                                            <img src="<?php echo esc_url( $image['url'] ); ?>">
                                    <?php } ?>
                                </span>
                            <?php } ?>
                        </span>
                        <span class="divider-border-wrap divider-border-right">
                            <span class="divider-border"></span>
                        </span>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>    
        <?php
    }

    /**
     * Render divider widget output in the editor.
     */
    protected function content_template() {
        ?>
        <div class="education-divider-wrap">
            <# if ( settings.divider_type == 'plain' ) { #>
                <div class="education-divider {{ settings.divider_direction }} {{ settings.divider_style }} "></div>
            <# } else { #>
                <div class="divider-text-container">
                    <div class="divider-text-wrap">
                        <span class="divider-border-wrap divider-border-left">
                            <span class="divider-border"></span>
                        </span>
                        <span class="education-divider-content">
                            <# if ( settings.divider_type == 'text' && settings.divider_text != '' ) { #>
                                <{{ settings.text_html_tag }} class="education-divider-{{ settings.divider_type }} elementor-inline-editing" data-elementor-setting-key="divider_text" data-elementor-inline-editing-toolbar="none">
                                    {{ settings.divider_text }}
                                </{{ settings.text_html_tag }}>
                            <# } else if ( settings.divider_type == 'icon' && settings.divider_icon != '' ) { #>
                                <span class="education-divider-{{ settings.divider_type }}">
                                    <span class="{{ settings.divider_icon }}" aria-hidden="true"></span>
                                </span>
                            <# } else if ( settings.divider_type == 'image' ) { #>
                                <span class="education-divider-{{ settings.divider_type }}">
                                    <img src="{{ settings.divider_image.url }}">
                                </span>
                            <# } #>
                        </span>
                        <span class="divider-border-wrap divider-border-right">
                            <span class="divider-border"></span>
                        </span>
                    </div>
                </div>
            <# } #>
        </div>
        <?php
    }
}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Divider() );