<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class WPeducation_Elementor_Widget_Schedule extends Widget_Base{
	public function get_name(){
		return 'education_schedule';
	}
	public function get_title(){
		return __('Education : Schedule','wpeducation');
	}
	public function get_icon(){
		return 'eicon-date';
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
            'education_my_schedule',
            [
                'label' => __( 'Schedule', 'wpeducation' ),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'schedule_title', [
                'label'         => __( 'Schedule Day', 'wpeducation' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'schedule_time', [
                'label'         => __( 'Schedule Time', 'wpeducation' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Schedule List', 'wpeducation' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'schedule_title'     => __( 'Schedule Day', 'wpeducation' ),
                        'schedule_time'   => __( '9AM - 3PM', 'wpeducation' ),
                        'list_color'   	 => '#1A1A1A ',
                    ],
                ],

                'title_field' => '{{{ schedule_title }}}',
            ]
        );
    
        $this->end_controls_section();

        // style tab start
        $this->start_controls_section(
            'education_accroding_style',
            [
                'label'     => __( 'Schedule Style', 'wpeducation' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            //start title
            $this->add_control(
                'title_options',
                [
                    'label'     => __( 'Schedule Day', 'wpeducation' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Color', 'wpeducation' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .education-schedule-text > span' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .education-schedule-text > span',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-schedule-text > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_padding',
                [
                    'label' => __( 'Padding', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .education-schedule-text > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Border', 'wpeducation' ),
                    'selector' => '{{WRAPPER}} .education-schedule-text > span',
                ]
            );
            //end title

            //start title
            $this->add_control(
                'time_options',
                [
                    'label'     => __( 'Schedule Time', 'wpeducation' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'time_color',
                [
                    'label'     => __( 'Color', 'wpeducation' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} span.education-schedule-time' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'time_typography',
                    'selector' => '{{WRAPPER}} span.education-schedule-time',
                ]
            );
            $this->add_responsive_control(
                'time_margin',
                [
                    'label' => __( 'Margin', 'wpeducation' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} span.education-schedule-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} span.education-schedule-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            //end title

            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end

	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();
	?>

	<?php if( $settings['list'] ):
		foreach ( $settings['list'] as $item ) {
			
	 ?>
        <div class="education-schedule-text"> 
            <span><?php echo esc_html( $item['schedule_title'] ); ?><span class="education-schedule-time"><?php echo esc_html( $item['schedule_time'] ); ?></span></span>   
        </div>
    <?php } endif; ?>
                
    <?php 

	}

}
wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Schedule() );