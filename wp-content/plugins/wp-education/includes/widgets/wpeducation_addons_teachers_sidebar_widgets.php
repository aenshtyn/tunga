<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Teachers_Sidebar extends Widget_Base {

    public function get_name() {
        return 'teacherss-post';
    }
    
    public function get_title() {
        return __( 'Education : Teachers Sidebar', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-sidebar';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'teacherss_setting',
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
                    'max' => 10,
                    'step' => 1,
                    'default' => 2,
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
                        '{{WRAPPER}} .education-widget-infos h4 a' => 'color: {{VALUE}};',
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
                        '{{WRAPPER}} .education-widget-infos h4 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .education-widget-infos h4 a',
                ]
            );
            $this->add_responsive_control(
                'margin_title',
                [
                    'label' => __( 'Title Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-widget-infos h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .education-widget-infos > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'selector' => '{{WRAPPER}} .education-widget-infos > p',
                ]
            );

            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Designation Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-widget-infos > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .education-widget-infos > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .education-widget-infos > p',
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
                        '{{WRAPPER}} .education-widget-image' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_image',
                    'label' => __( 'Image Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-widget-image img',
                ]
            ); 
            $this->add_control(
                'icon_radius',
                [
                    'label' => __( 'Image Radius', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-widget-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .education-teacher-info-widget' => 'background: {{VALUE}};',
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
                        '{{WRAPPER}} .education-teacher-info-widget:hover' => 'background: {{VALUE}};',
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
                        '{{WRAPPER}} .education-teacher-info-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .education-teacher-info-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();


        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('grid_column_number');
        $show_name = $this->get_settings_for_display('show_name');
        $show_degination = $this->get_settings_for_display('show_degination');
        $socila_icon_show = $this->get_settings_for_display('socila_icon_show');
        $show_content = $this->get_settings_for_display('show_content');

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
            <div class="educationsingle-widget-container">
                <?php
                 $posts = new \WP_Query($args);
                while($posts->have_posts()):$posts->the_post();
                    /**
                    * Set Individual Column CSS
                    */
                    ?>
                <div class="education-teacher-info-widget">
                    <div class="education-widget-image">
                        <?php if(has_post_thumbnail()){ ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wpeducation_img100x100'); ?></a>
                        <?php } ?>
                    </div>
                    <div class="education-widget-infos">
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
                                <p>
                                    <?php echo esc_html( $help_teamdeg ); ?>
                                </p>
                            <?php } ?>
                        <?php } // end degignation ?>
                    </div>
                </div>
                <!-- Team Single -->
                <?php endwhile; // while have_posts ?>
            </div>
        </div>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }

    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Teachers_Sidebar() );