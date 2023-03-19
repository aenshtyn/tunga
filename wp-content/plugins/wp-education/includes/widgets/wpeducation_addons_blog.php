<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPeducation_Elementor_Widget_Lastest_Blog extends Widget_Base {

    public function get_name() {
        return 'latest-blog-post';
    }
    
    public function get_title() {
        return __( 'Education : Our Blog', 'wpeducation' );
    }

    public function get_icon() {
        return 'eicon-pencil';
    }
    public function get_categories() {
        return [ 'wpeducation' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'blog_setting',
            [
                'label' => esc_html__( 'Latest Blog', 'wpeducation' ),
            ]
        );

            $this->add_control(
                'sllayout',
                [
                    'label' => __( 'Slider Layout', 'wpeducation' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 1,
                    'options' => [
                        '1' => __( 'Layout One', 'insurersem' ),
                        '2' => __( 'Layout Two', 'insurersem' ),
                    ]
                ]
            );
        
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Number Of blog', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 3,
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
                'content_length',
                [
                    'label' => __( 'Content Length', 'wpeducation' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,
                ]
            );
            $this->add_control(
                'insurersem_blog_grid_column',
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
            

        $this->end_controls_section();

        // Blog Meta Style
        $this->start_controls_section(
            'blog_meta_style',
            [
                'label' => __( 'Meta Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
                'blog_meta',
                [
                    'label' => __( 'Meta Box', 'wpeducation' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'blog_meta_color',
                [
                    'label' => __( 'Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .education-blog-date > span i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'blog_meta_tygraphy',
                    'selector' => '{{WRAPPER}} .education-blog-date > span i',
                ]
            );

            $this->add_responsive_control(
                'blog_meta_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-blog-date > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_meta_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-blog-date > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

        // Blog Date Style
        $this->start_controls_section(
            'ourblog_date_style',
            [
                'label' => __( 'Blog Date', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ourblog_date_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ourblog_date__typography',
                'selector' => '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2',
            ]
        );

        $this->add_control(
            'ourblog_date_bg_color',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourblog_divider_bg_color',
            [
                'label' => __( 'Divider Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-item .education-blog-meta-date-2::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourblog_date_border',
            [
                'label' => __( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ourblog_date_border',
                'label' => __( 'Border', 'wpeducation' ),
                'selector' => '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2',
            ]
        );

        $this->add_responsive_control(
            'ourblog_date_width',
            [
                'label' => __( 'Width', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourblog_date_height',
            [
                'label' => __( 'Height', 'wpeducation' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourblog_date_margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourblog_date_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-blog-meta-date,.education-single-blog-item .education-blog-meta-date-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

         // Blog Title Style
        $this->start_controls_section(
            'blog_title_style',
            [
                'label' => __( 'Title Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_title_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_color_hvr',
            [
                'label' => __( 'Hover Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_title_typography',
                'selector' => '{{WRAPPER}} .education-single-blog-text h4 a',
            ]
        );

        $this->add_responsive_control(
            'blog_title_margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_title_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Blog Description Style
        $this->start_controls_section(
            'blog_desc_style',
            [
                'label' => __( 'Description Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_desc_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#555',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_desc_typography',
                'selector' => '{{WRAPPER}} .education-single-blog-text > p',
            ]
        );

        $this->add_responsive_control(
            'blog_desc_margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_desc_padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Blog Button Style
        $this->start_controls_section(
            'blog_button_style',
            [
                'label' => __( 'Button Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_button_color',
            [
                'label' => __( 'Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#1bb4b9',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_button_color_hvr',
            [
                'label' => __( 'Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#f5b120',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_button__typography',
                'selector' => '{{WRAPPER}} .education-single-blog-text > a',
            ]
        );

        $this->add_control(
            'blog_button_bg_color',
            [
                'label' => __( 'BG Color', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'rgba(255,255,255,0)',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_button_bg_color_hover',
            [
                'label' => __( 'BG Color Hover', 'wpeducation' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'rgba(255,255,255,0)',
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_button_border_radius',
            [
                'label' => __( 'Border Radius', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'blog_button_border_radius_hover',
            [
                'label' => __( 'Border Radius Hover', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'blog_button__margin',
            [
                'label' => __( 'Margin', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_button__padding',
            [
                'label' => __( 'Padding', 'wpeducation' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .education-single-blog-text > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Box Style
        $this->start_controls_section(
            'blog_content_box_style',
            [
                'label' => __( 'Blog Content Box Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'blog_content_box_bg_color',
                [
                    'label' => __( 'BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-text' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'blog_content_box_bg_color_hvr',
                [
                    'label' => __( 'BG Color Hover', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-text:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_content_box_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_content_box_padding',
                [
                    'label' => __( 'Content Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'contentborder',
                    'label' => __( 'Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-single-blog-text',
                ]
            ); 

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'contentborderhvr',
                    'label' => __( 'Border Hover Color', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-single-blog-text:hover',
                ]
            ); 

        $this->end_controls_section();

        // Blog Box Style
        $this->start_controls_section(
            'blog_box_style',
            [
                'label' => __( 'Blog Box Style', 'wpeducation' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'blog_box_bg_color',
                [
                    'label' => __( 'BG Color', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-item' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'blog_box_bg_color_hvr',
                [
                    'label' => __( 'BG Color Hover', 'wpeducation' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-item:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_box_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_box_padding',
                [
                    'label' => __( 'Content Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-single-blog-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-single-blog-item',
                ]
            ); 

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'borderhvr',
                    'label' => __( 'Border Hover Color', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-single-blog-item:hover',
                ]
            ); 

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 2;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 5;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('insurersem_blog_grid_column');
        $sllayout = $settings['sllayout'];

        $collumval = 'col-lg-4 col-md-6 col-sm-12';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-md-6 col-sm-12';
        }

        ?>
            <div class="latest-blog-area">
                <div class="row">
                    <?php

                        $args = array(
                            'post_type'            => 'post',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $per_page,
                            'order'                => 'DESC',
                        );
                        
                        $posts = new \WP_Query($args);
                        while($posts->have_posts()):$posts->the_post();
                    ?>

                        <div class="<?php echo $collumval;?>">

                            <?php if( $sllayout == 1 ):?>
                            <!-- Single Blog Start -->
                            <div class="education-single-blog-item overlay-hover">
                                <div class="education-single-blog-image">
                                    <div class="overlay-effect">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('wpeducation_img375x348');?>
                                            <span class="education-blog-meta-date"><?php echo the_time('j M') ?><span><?php echo the_time(' Y ') ?></span></span>
                                        </a>
                                    </div>    
                                </div>
                                <div class="education-single-blog-text">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                        </a>
                                    </h4>
                                    <div class="education-blog-date">
                                        <span><i class="fas fa-calendar-alt"></i><?php echo the_time('j M, Y') ?></span>
                                    </div>
                                    <?php echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';?>
                                    <a href="<?php the_permalink(); ?>"><?php echo ($btntext); ?></a>
                                </div>
                            </div>
                            <!-- Single Blog End -->

                            <?php elseif( $sllayout == 2 ):?>
                            <div class="education-single-blog-item two text-center border overlay-hover">
                                <div class="education-single-blog-image">
                                    <div class="overlay-effect">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('wpeducation_img375x348');?>
                                            <span class="education-blog-meta-date-2"><?php echo the_time('j M') ?><span><?php echo the_time(' Y ') ?></span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="education-single-blog-text">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                        </a>
                                    </h4>
                                    <?php echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';?>
                                    <a href="<?php the_permalink(); ?>"><?php echo ($btntext); ?></a>
                                </div>
                            </div>
                            <?php endif;?>

                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        <?php

        wp_reset_query(); wp_reset_postdata();

    }

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Lastest_Blog() );