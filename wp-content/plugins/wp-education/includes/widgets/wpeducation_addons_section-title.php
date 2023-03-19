<?php 
namespace Elementor;


if( !defined ( 'ABSPATH' ) )exit;

class WPeducation_Elementor_Widget_Section_Title extends Widget_Base{
	public function get_name(){
		return 'sectiontitle_title';
	}
	public function get_title(){
		return __('Education : Section Title','wpeducation');
	}
	public function get_icon(){
		return 'eicon-archive-title';
	}
	public function get_categories(){
		return ['wpeducation'];
	}
     public function get_style_depends() {
        return [];
    }

    public function get_script_depends() {
        return [];
    }
	protected function register_controls(){
		$this->start_controls_section(
            'education-title',
            [
                'label' => __( 'Title', 'wpeducation' ),
            ]
        );
       $this->add_control(
            'title_style',
            [
                'label'     => __( 'Title Position', 'wpeducation' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'left',
                'options'   => [
                    'left'    => __( 'Text Left', 'wpeducation' ),
                    'center'  => __( 'Text Center', 'wpeducation' ),
                    'right'   => __( 'Text Right', 'wpeducation' ),
                ],
            ]
        );
       $this->add_control(
            'show_border',
            [
                'label'     => __( 'Show Border', 'wpeducation' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value'  => 'border-bg',
                'default' => 'border-bg',
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'     => __( 'Title', 'wpeducation' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __('Section Title','wpeducation'),
            ]
        );
        $this->add_control(
            'section_desc',
            [
                'label'     => __( 'Description', 'wpeducation' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,','wpeducation'),
            ]
        );
        //style one style end
        $this->end_controls_section();

        //style css one start
        $this->start_controls_section(
            'sectiontitle_style1',
            [
                'label'     => __( 'Style', 'wpeducation' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs( 'sectiontitle_style1_tabs' );

                //title start
                $this->add_control(
                    'title_options',
                    [
                        'label' => __( 'Title', 'wpeducation' ),
                        'type' =>Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'title_color',
                    [
                        'label'         => __( 'Color', 'wpeducation' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '#23252a',
                        'selectors'     => [
                            '{{WRAPPER}} .education-section-title-one h1' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border',
                        'label' => __( 'Title Border', 'wpeducation' ),
                        'selector' => '{{WRAPPER}} .education-section-title-one h1',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography',
                        'label'     => __( 'Typography', 'wpeducation' ),
                        'selector'  => '{{WRAPPER}} .education-section-title-one h1',
                    ]
                );
                $this->add_responsive_control(
                    'sectitle_margin',
                    [
                        'label' => __( 'Margin', 'wpeducation' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
                $this->add_responsive_control(
                    'sectitle_padding',
                    [
                        'label' => __( 'Padding', 'wpeducation' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
                //title end

                //highlight border start
                $this->add_control(
                    'highlight_border_options',
                    [
                        'label' => __( 'Highlight Border', 'wpeducation' ),
                        'type' =>Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'highlight_color_border',
                    [
                        'label'         => __( 'Highlight Border Color', 'wpeducation' ),
                        'type'          => Controls_Manager::COLOR,
                        'default' => '#f5b120',
                        'selectors'     => [
                            '{{WRAPPER}} .education-section-title-one.border-bg h1::before' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'highlighttitle_margin',
                    [
                        'label' => __( 'Margin', 'wpeducation' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one.border-bg h1::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
                $this->add_responsive_control(
                    'highlighttitle_padding',
                    [
                        'label' => __( 'Padding', 'wpeducation' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one.border-bg h1::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
                $this->add_responsive_control(
                    'highlight_boder_width',
                    [
                        'label' => __( 'Icon Width', 'wpeducation' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                        'default' => ' ',
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one.border-bg h1::before' => 'width: {{VALUE}}px;',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'highlight_boder_height',
                    [
                        'label' => __( 'Icon Height', 'wpeducation' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                        'default' => ' ',
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one.border-bg h1::before' => 'height: {{VALUE}}px;',
                        ],
                    ]
                );
                //highlight boder end

                //description start
                $this->add_control(
                    'desc_options',
                    [
                        'label' => __( 'Description', 'wpeducation' ),
                        'type' =>Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'desc_color',
                    [
                        'label'         => __( ' Color', 'wpeducation' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .education-section-title-one p' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'desctypography',
                        'label'     => __( 'Typography', 'wpeducation' ),
                        'selector'  => '{{WRAPPER}} .education-section-title-one p',
                    ]
                );

                $this->add_responsive_control(
                    'desc_margin',
                    [
                        'label' => __( 'Margin', 'wpeducation' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .education-section-title-one p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );

                //description end


            $this->end_controls_tabs();

        $this->end_controls_section(); 
        //style one end


	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();

		?>
        
      
        <div class="education-section-title-one <?php echo esc_attr( $settings['show_border'] ); ?> <?php echo esc_attr( $settings['title_style'] ); ?>">
            <?php 
                if( !empty( $settings['section_title'] )){
                    echo sprintf('<h1>%s</h1>',esc_html( $settings['section_title'] ));
                } 
                if( !empty( $settings['section_desc'] )){
                    echo sprintf('<p>%s</p>',esc_html( $settings['section_desc'] ));
                } 
            ?>
        </div>


   
        <?php 
	}
	protected function content_template(){
	}
}
wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Section_Title() );