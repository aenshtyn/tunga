<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPeducation_Elementor_Widget_Testimonial_Slider extends Widget_Base {

    public function get_name() {
        return 'education-testimonial-slider';
    }

    public function get_title() {
        return esc_html__( 'Education : Testimonial Slider', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

   public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {


        $this->start_controls_section(
            'education_section_testimonial_content',
            [
                'label' => esc_html__( 'Testimonial Content', 'wpeducation' )
            ]
        );
        $this->add_control(
            'testimoniallayout',
            [
                'label' => __( 'Slider Layout', 'wpeducation' ),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    '1' => __( 'Layout One', 'wpeducation' ),
                    '2' => __( 'Layout Two', 'wpeducation' ),
                ]
            ]
        );
		
        $this->add_control(
            'education_testimonial_slider_item',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'education_testimonial_name' => 'John Doe',
                    ],
                    [
                        'education_testimonial_name' => 'Jane Doe',
                    ],
                    [
                        'education_testimonial_facility_name' => 'Good Facility',
                    ],

                ],
                'fields' => [

                    [
                        'name' => 'education_testimonial_enable_avatar',
                        'label' => esc_html__( 'Display Avatar?', 'wpeducation' ),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'yes',
                    ],
					[
                        'name' => 'education_testimonial_client_rating',
						'label' => __( 'Client Rating', 'wpeducation' ),
						'type' => Controls_Manager::NUMBER,
						'min' => 1,
						'max' => 5,
						'step' => 1,
					],
                    [
                        'name' => 'education_testimonial_image',
                        'label' => esc_html__( 'Testimonial Avatar', 'wpeducation' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' => [
                            'education_testimonial_enable_avatar' => 'yes',
                        ],
                    ],
                    [
                        'name' => 'education_testimonial_name',
                        'label' => esc_html__( 'User Name', 'wpeducation' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__( 'John Doe', 'wpeducation' ),
                        'dynamic' => [ 'active' => true ]
                    ],
                    [
                        'name' => 'education_testimonial_facility_name',
                        'label' => esc_html__( 'Facility Name', 'wpeducation' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Good Facility', 'wpeducation' ),
                        'dynamic' => [ 'active' => true ]
                    ],
                    [
                        'name' => 'education_testimonial_company_title',
                        'label' => esc_html__( 'Company Name', 'wpeducation' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Codetic', 'wpeducation' ),
                        'dynamic' => [ 'active' => true ]
                    ],
                    [
                        'name' => 'education_testimonial_description',
                        'label' => esc_html__( 'Testimonial Description', 'wpeducation' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'wpeducation' ),
                    ],

                ],
                'title_field' => 'Testimonial Item',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'education_section_testimonial_slider_settings',
            [
                'label' => esc_html__( 'Testimonial Slider Settings', 'wpeducation' ),
            ]
        );

        $this->add_control(
          'education_testimonial_max_item',
          [
             'label'   => __( 'Max Visible Item', 'wpeducation' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 1,
             'min'     => 1,
             'max'     => 100,
             'step'    => 1,
          ]
        );

        $this->add_control(
          'education_testimonial_slide_item',
          [
             'label'   => __( 'Slide to Scroll', 'wpeducation' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 1,
             'min'     => 1,
             'max'     => 100,
             'step'    => 1,
          ]
        );

        $this->add_control(
          'education_testimonial_max_tab_item',
          [
             'label'   => __( 'Max Visible Items for Tablet', 'wpeducation' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 1,
             'min'     => 1,
             'max'     => 100,
             'step'    => 1,
          ]
        );

        $this->add_control(
          'education_testimonial_max_mobile_item',
          [
             'label'   => __( 'Max Visible Items for Mobile', 'wpeducation' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 1,
             'min'     => 1,
             'max'     => 100,
             'step'    => 1,
          ]
        );

        $this->add_control(
          'education_testimonial_slide_speed',
          [
             'label'   => __( 'Slide Speed', 'wpeducation' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 300,
             'min'     => 100,
             'max'     => 3000,
             'step'    => 100,
          ]
        );


        $this->add_control(
            'education_testimonial_slider_autoplay',
            [
                'label' => esc_html__( 'Autoplay?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control(
            'education_testimonial_slider_infinite',
            [
                'label' => esc_html__( 'Infinite Loop?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control(
            'education_testimonial_slider_pause_hover',
            [
                'label' => esc_html__( 'Pause on Hover?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control(
            'education_testimonial_slide_draggable',
            [
                'label' => esc_html__( 'Draggable?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control(
            'education_testimonial_slide_variable_width',
            [
                'label' => esc_html__( 'Variable Width?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control(
            'education_testimonial_slider_navigation',
            [
                'label' => esc_html__( 'Navigation & Pagination', 'wpeducation' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__( 'None', 'wpeducation' ),
                    'dots' => esc_html__( 'Dots Only', 'wpeducation' ),
                    'prev-next' => esc_html__( 'Prev/Next Only', 'wpeducation' ),
                    'dots-nav' => esc_html__( 'Dots & Prev/Next', 'wpeducation' ),
                ],
            ]
        );

        $this->add_control(
            'education_testimonial_slider_navigation_position',
            [
                'label' => esc_html__( 'Navigation & Pagination', 'wpeducation' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'nav-left-right',
                'options' => [
                    'nav-left-right' => esc_html__( 'Normal (Left Right)', 'wpeducation' ),
                    'nav-top-left' => esc_html__( 'Navigation Top Left', 'wpeducation' ),
                    'nav-top-right' => esc_html__( 'Navigation Top Right', 'wpeducation' ),
                ],
                'condition' => [
                    'education_testimonial_slider_navigation!' => 'none',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'education_section_testimonial_styles_general',
            [
                'label' => esc_html__( 'Testimonial Styles', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'education_testimonial_background',
            [
                'label' => esc_html__( 'Testimonial Background Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-item,.education-testimonial-carousel-text' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'education_testimonial_alignment',
            [
                'label' => esc_html__( 'Set Alignment', 'wpeducation' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'education-testimonial-align-default' => [
                        'title' => __( 'Default', 'wpeducation' ),
                        'icon' => 'eicon-h-align-stretch',
                    ],
                    'education-testimonial-align-left' => [
                        'title' => esc_html__( 'Left', 'wpeducation' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'education-testimonial-align-centered' => [
                        'title' => esc_html__( 'Center', 'wpeducation' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'education-testimonial-align-right' => [
                        'title' => esc_html__( 'Right', 'wpeducation' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'education-testimonial-align-centered,.education-testimonial-carousel-text',
            ]
        );

        $this->add_control(
            'education_testimonial_user_display_block',
            [
                'label' => esc_html__( 'Display User & Company Block?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_margin',
            [
                'label' => esc_html__( 'Margin', 'wpeducation' ),
                'description' => 'Need to refresh the page to see the change properly',
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-item,.education-testimonial-carousel-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_padding',
            [
                'label' => esc_html__( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-item,.education-testimonial-carousel-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_testimonial_border',
                'label' => esc_html__( 'Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-testimonial-item,.education-testimonial-carousel-text',
            ]
        );

        $this->add_control(
            'education_testimonial_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-item,.education-testimonial-carousel-text' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'education_section_testimonial_image_styles',
            [
                'label' => esc_html__( 'Testimonial Image Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_image_width',
            [
                'label' => esc_html__( 'Image Width', 'wpeducation' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 150,
                    'unit' => 'px',
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'size_units' => [ '%', 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-image img,.education-testimonial-images > img' => 'width:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_image_margin',
            [
                'label' => esc_html__( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-image img,.education-testimonial-images > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_image_padding',
            [
                'label' => esc_html__( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-image img,.education-testimonial-images > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'education_testimonial_image_border',
                'label' => esc_html__( 'Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-testimonial-image img,.education-testimonial-images > img',
            ]
        );

        $this->add_control(
            'education_testimonial_image_rounded',
            [
                'label' => esc_html__( 'Rounded Avatar?', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'education-testimonial-avatar-rounded',
                'default' => '',
            ]
        );

        $this->add_control(
            'education_testimonial_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-image img,.education-testimonial-images > img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'condition' => [
                    'education_testimonial_image_rounded!' => 'education-testimonial-avatar-rounded',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'education_section_testimonial_typography',
            [
                'label' => esc_html__( 'Color &amp; Typography', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'education_testimonial_name_heading',
            [
                'label' => __( 'User Name', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_name_color',
            [
                'label' => esc_html__( 'User Name Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-content .education-testimonial-user,.education-testimonial-name > h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
             'name' => 'education_testimonial_name_typography',
                'selector' => '{{WRAPPER}} .education-testimonial-content .education-testimonial-user,.education-testimonial-name > h4',
            ]
        );

        $this->add_control(
            'education_testimonial_company_heading',
            [
                'label' => __( 'Company Name', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_company_color',
            [
                'label' => esc_html__( 'Company Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-content .education-testimonial-user-company,.education-testimonial-name > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
             'name' => 'education_testimonial_position_typography',
                'selector' => '{{WRAPPER}} .education-testimonial-content .education-testimonial-user-company,.education-testimonial-name > span',
            ]
        );

        $this->add_control(
            'education_testimonial_description_heading',
            [
                'label' => __( 'Testimonial Text', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_description_color',
            [
                'label' => esc_html__( 'Testimonial Text Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#7a7a7a',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-content .education-testimonial-text,.education-testimonial-carousel-text > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
             'name' => 'education_testimonial_description_typography',
                'selector' => '{{WRAPPER}} .education-testimonial-content .education-testimonial-text,.education-testimonial-carousel-text > p',
            ]
        );

        $this->add_control(
            'education_testimonial_quotation_heading',
            [
                'label' => __( 'Quotation Mark', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_quotation_color',
            [
                'label' => esc_html__( 'Quotation Mark Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.15)',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
             'name' => 'education_testimonial_quotation_typography',
                'selector' => '{{WRAPPER}} .education-testimonial-quote',
            ]
        );

         $this->add_control(
            'education_testimonial_facility_heading',
            [
                'label' => __( 'Facility Text', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_facility_color',
            [
                'label' => esc_html__( 'Facility Text Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#7a7a7a',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-carousel-text > h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
             'name' => 'education_testimonial_facility_typography',
                'selector' => '{{WRAPPER}} .education-testimonial-carousel-text > h4',
            ]
        );

         $this->add_control(
            'education_testimonial_rating_heading',
            [
                'label' => __( 'Client Rating', 'wpeducation' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'education_testimonial_rating_color',
            [
                'label' => esc_html__( 'Client Rating Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#F5B120',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-star-rating li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'education_section_testimonial_navigation_style',
            [
                'label' => esc_html__( 'Navigation/Pagination Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'education_testimonial_navigation_color',
            [
                'label' => esc_html__( 'Navigation Color (Arrows & Bullets)', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-slider .slick-prev::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .education-testimonial-slider .slick-next::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'education_testimonial_navigation_bg',
            [
                'label' => esc_html__( 'Navigation Background Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-slider .slick-dots li button::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .education-testimonial-slider .slick-dots li.slick-active button::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .education-testimonial-slider .slick-prev' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .education-testimonial-slider .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'education_testimonial_slider_bullet_size',
            [
                'label' => esc_html__( 'Bullet Size', 'wpeducation' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 12,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-slider .slick-dots li button::before' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'education_testimonial_slider_active_bullet_size',
            [
                'label' => esc_html__( 'Active Bullet Size', 'wpeducation' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .education-testimonial-slider .slick-dots li.slick-active button::before' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {

      $settings = $this->get_settings_for_display();
      $testimonial_classes = $this->get_settings('education_testimonial_image_rounded') . " " . $this->get_settings('education_testimonial_alignment');
      $navigation_type = $this->get_settings('education_testimonial_slider_navigation');


    // Pagination type
    switch ( $navigation_type ) {
      case 'dots':
        $dots = 'true';
        $nav  = 'false';
        break;

      case 'prev-next':
        $dots = 'false';
        $nav  = 'true';
        break;

      case 'dots-nav':
        $dots = 'true';
        $nav  = 'true';
        break;

      default: // NONE
        $nav  = 'false';
        $dots = 'false';
        break;
    }

    $auto_play        = ( ($settings['education_testimonial_slider_autoplay']      == 'true') ? "true" : "false" );
    $infinite         = ( ($settings['education_testimonial_slider_infinite']      == 'true') ? "true" : "false" );
    $pause_hover      = ( ($settings['education_testimonial_slider_pause_hover']   == 'true') ? "true" : "false" );
    $draggable        = ( ($settings['education_testimonial_slide_draggable']      == 'true') ? "true" : "false" );
    $variable_width   = ( ($settings['education_testimonial_slide_variable_width'] == 'true') ? "true" : "false" );
    $testimoniallayout = $settings['testimoniallayout'];

    ?>

    <?php if( $testimoniallayout == 1 ):?>
    <div id="education-testimonial-<?php echo esc_attr($this->get_id()); ?>" class="education-testimonial-slider <?php echo $settings['education_testimonial_slider_navigation_position'];?>">
        <?php foreach ( $settings['education_testimonial_slider_item'] as $item ) : ?>
        <div class="education-testimonial-item clearfix <?php echo $testimonial_classes; ?>">

            <?php if ( $item['education_testimonial_enable_avatar'] == 'yes' ) : ?>
            <div class="education-testimonial-image">
                <span class="education-testimonial-quote"></span>
                <figure>
                    <?php $image = $item['education_testimonial_image']; ?>
                    <img src="<?php echo $image['url'];?>" alt="<?php echo esc_attr( $item['education_testimonial_name'] ); ?>">
                </figure>
            </div>
            <?php endif; ?>
            <div class="education-testimonial-content" <?php if ( $item['education_testimonial_enable_avatar'] == '' ) : ?> style="width: 100%;" <?php endif; ?>>
                <span class="education-testimonial-quote"></span>
                <p class="education-testimonial-text"><?php echo $item['education_testimonial_description']; ?></p>
				 <?php 
					// Rating
					if( !empty( $item['education_testimonial_client_rating'] ) ){
						$rating = $item['education_testimonial_client_rating'];
						$rating_whole = floor( $item['education_testimonial_client_rating'] );
						$rating_fraction = $rating - $rating_whole;
						echo '<ul class="education-testimonial-star-rating">';
							for($i = 1; $i <= 5; $i++){
								if( $i <= $rating_whole ){
									echo '<li><i class="eicon-star"></i></li>';
								} else {
									if( $rating_fraction != 0 ){
										echo '<li><i class="fa fa-star-half"></i></li>';
										$rating_fraction = 0;
									} else {
										echo '<li><i class="eicon-star-o"></i></li>';
									}
								}
							}
						echo '</ul>';
					}
				 ?>
                <p class="education-testimonial-user" <?php if ( ! empty( $settings['education_testimonial_user_display_block'] ) ) : ?> style="display: block; float: none;"<?php endif;?>><?php echo esc_attr( $item['education_testimonial_name'] ); ?></p>
                <p class="education-testimonial-user-company"><?php echo esc_attr( $item['education_testimonial_company_title'] ); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php elseif( $testimoniallayout == 2 ):?>
    <div id="education-testimonial-<?php echo esc_attr($this->get_id()); ?>" class="education-testimonial-slider <?php echo $settings['education_testimonial_slider_navigation_position'];?>">
        <?php foreach ( $settings['education_testimonial_slider_item'] as $item ) : ?>
        <div class="education-testimonial-item clearfix <?php echo $testimonial_classes; ?>">
            <div class="education-testimonial-carousel-text">
                <h4><?php echo esc_attr( $item['education_testimonial_facility_name'] ); ?></h4>
                <p><?php echo $item['education_testimonial_description']; ?></p>
            </div>
            <div class="education-testimonial-information">
                <?php if ( $item['education_testimonial_enable_avatar'] == 'yes' ) : ?>
                <div class="education-testimonial-images">
                    <?php $image = $item['education_testimonial_image']; ?>
                    <img src="<?php echo $image['url'];?>" alt="<?php echo esc_attr( $item['education_testimonial_name'] ); ?>">
                </div>
                <?php endif; ?>
                <div class="education-testimonial-name">
                    <h4><?php echo esc_attr( $item['education_testimonial_name'] ); ?></h4>
                    <span><?php echo esc_attr( $item['education_testimonial_company_title'] ); ?></span>
					 <?php 
						// Rating
						if( !empty( $item['education_testimonial_client_rating'] ) ){
							$rating = $item['education_testimonial_client_rating'];
							$rating_whole = floor( $item['education_testimonial_client_rating'] );
							$rating_fraction = $rating - $rating_whole;
							echo '<ul class="education-testimonial-star-rating">';
								for($i = 1; $i <= 5; $i++){
									if( $i <= $rating_whole ){
										echo '<li><i class="fa fa-star"></i></li>';
									} else {
										if( $rating_fraction != 0 ){
											echo '<li><i class="fa fa-star-half"></i></li>';
											$rating_fraction = 0;
										} else {
											echo '<li><i class="fa fa-star-o"></i></li>';
										}
									}
								}
							echo '</ul>';
						}
					 ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif;?>

<script type="text/javascript">

jQuery(document).ready(function($) {
    $("#education-testimonial-<?php echo esc_attr($this->get_id()); ?>").slick({
        autoplay: <?php echo $auto_play;?>,
        infinite: <?php echo $infinite;?>,
        speed: <?php echo $settings['education_testimonial_slide_speed'];?>,
        slidesToShow: <?php echo $settings['education_testimonial_max_item'];?>,
        slidesToScroll: <?php echo $settings['education_testimonial_slide_item'];?>,
        arrows: <?= $nav ?>,
        dots: <?= $dots ?>,
        pauseOnHover: <?php echo $pause_hover;?>,
        draggable: <?php echo $draggable;?>,
        variableWidth: <?php echo $variable_width;?>,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: <?php echo $settings['education_testimonial_max_tab_item'];?>,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: <?php echo $settings['education_testimonial_max_mobile_item'];?>,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
</script>

    <?php

    }

}


wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Testimonial_Slider() );