<?php 
namespace Elementor;


if( !defined ( 'ABSPATH' ) )exit;

class WPeducation_Elementor_Widget_Progress extends Widget_Base{
	public function get_name(){
		return 'education_progress';
	}
	public function get_title(){
		return __('Education : Progress Bar','wpeducation');
	}
	public function get_icon(){
		return 'eicon-user-preferences';
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
            'education_prgress_bar',
            [
                'label' => __( 'Progress', 'wpeducation' ),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'list_title', [
                'label'         => __( 'Title', 'wpeducation' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'list_percent', [
                'label'         => __( 'Percent (please type % )', 'wpeducation' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'list_color', [
                'label'         => __( 'Background', 'wpeducation' ),
                'type'          => Controls_Manager::COLOR,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Progress List', 'wpeducation' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title'     => __( 'Title', 'wpeducation' ),
                        'list_percent'   => __( '70%', 'wpeducation' ),
                        'list_color'   	 => '#1A1A1A ',
                    ],
                ],

                'title_field' => '{{{ list_title }}}',
            ]
        );
    
        $this->end_controls_section();

        // style tab start
        $this->start_controls_section(
            'education_accroding_style',
            [
                'label'     => __( 'Style', 'wpeducation' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            //start title
            $this->add_control(
                'title_options',
                [
                    'label'     => __( 'Title', 'wpeducation' ),
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
                        '{{WRAPPER}} .education-single-skill .education-title' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .education-single-skill .education-percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .education-single-skill .education-title,.education-single-skill .education-percent',
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
		<div class="education-single-skill clearfix">
            <span class="education-title"><?php echo esc_html( $item['list_title'] ); ?></span>
            <span class="education-percent">(<?php echo esc_html( $item['list_percent'] ); ?>)</span>
            <div class="education-progress progress"><div class="wow fadeInLeft bar bg-dark" style="width: <?php echo esc_html( $item['list_percent'] ); ?>; background-color:<?php echo esc_html( $item['list_color'] ); ?>!important;"></div></div>
        </div>
    <?php } endif; ?>
                
    <?php 

	}
	protected function content_template(){

	}

}
wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Progress() );