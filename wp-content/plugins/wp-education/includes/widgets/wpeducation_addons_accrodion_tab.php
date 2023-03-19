<?php 
namespace Elementor;


if( !defined ( 'ABSPATH' ) )exit;

class WPeducation_Elementor_Widget_Accrodion extends Widget_Base{
	public function get_name(){
		return 'education_accrodion';
	}
	public function get_title(){
		return __('Education : Accrodion','wpeducation');
	}
	public function get_icon(){
		return 'eicon-sitemap';
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
            'wpeducation-accrodion',
            [
                'label' => __( 'Accordion', 'wpeducation' ),
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
            'icon',
            [
                'label' => __( 'Icon', 'wpeducation' ),
                'type' => Controls_Manager::ICONS,
                'default' =>array( 'value'=> 'fa fa-graduation-cap', 'library'=>'solid' ),
                'label_block' => true,
            ]
        );
         
        $repeater->add_control(
            'list_desc', [
                'label'         => __( 'Description', 'wpeducation' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Accordion List', 'wpeducation' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_desc'     => __( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'wpeducation' ),
                        'list_title'     => __( 'Title one', 'wpeducation' ),
                    ],
                    [
                        'list_desc'     => __( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'wpeducation' ),
                        'list_title'     => __( 'Title Two', 'wpeducation' ),
                    ],
                ],

                'title_field' => '{{{ list_title }}}',
            ]
        );
    
        $this->end_controls_section();

        // style tab start
        $this->start_controls_section(
            'wpeducation_accroding_style',
            [
                'label'     => __( 'Style', 'wpeducation' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'hevent_accroding_style_tabs');

                // Normal tab start
                $this->start_controls_tab(
                    'accroding_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpeducation' ),
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
                                '{{WRAPPER}} .education-class-details-tab-menu li a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .education-class-details-tab-menu li a i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .education.nav-tab a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .education.nav-tab-two a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'title_typography',
                            'selector' => '{{WRAPPER}} .education-class-details-tab-menu li a, .wpeducation-accordion-header-two h5 a, .education.nav-tab a, .education.nav-tab-two a',
                        ]
                    );
                    $this->add_control(
                        'title_bg_color',
                        [
                            'label'     => __( 'Background', 'wpeducation' ),
                            'type'      => Controls_Manager::COLOR,                            
                            'condition' =>[
                                'wpeducation_accrodion_style'      => array('1','2'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .wpeducation-accordion-header h5 a.collapsed' => 'background-color: {{VALUE}}',
                                '{{WRAPPER}} .wpeducation-accordion-header-two h5 a.collapsed' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_control(
                        'title_bg_active_color',
                        [
                            'label'     => __( 'Active Background', 'wpeducation' ),
                            'type'      => Controls_Manager::COLOR,
                            'condition' =>[
                                'wpeducation_accrodion_style'      => array('1','2'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .wpeducation-accordion-header h5 a' => 'background-color: {{VALUE}}',
                                '{{WRAPPER}} .wpeducation-accordion-header-two h5 a' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );

                    //end title
                    //start content
                    $this->add_control(
                        'content_options',
                        [
                            'label'     => __( 'Content', 'wpeducation' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                     $this->add_control(
                        'content_color',
                        [
                            'label'     => __( 'Color', 'wpeducation' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .education-class-details-tab .tab-pane p' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .tab-pane p' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'content_typography',
                            'selector' => '{{WRAPPER}} .education-class-details-tab .tab-pane p',
                        ]
                    );

                    $this->add_responsive_control(
                        'content_padding',
                        [
                            'label'         => __( 'Padding', 'wpeducation' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .accordion-body p,.tab-pane p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
                    //end content

                $this->end_controls_tab(); // Normal tab end

                // Hover tab start
                $this->start_controls_tab(
                    'style_accrodion_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpeducation' ),
                    ]
                );

                    //title start
                    $this->add_control(
                        'title_hover_options',
                        [
                            'label'     => __( 'Title', 'wpeducation' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $this->add_control(
                        'title_hover_color',
                        [
                            'label'     => __( 'Color', 'wpeducation' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpeducation-accordion-header h5 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .wpeducation-accordion-header-two h5 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .education.nav-tab a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .education.nav-tab-two a:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    //end title

                $this->end_controls_tab(); // Hover tab end
            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end

	}
	protected function render(){ 

		$settings = $this->get_settings_for_display();

		?>
<div class="row">
     
        <div class="col-12">
            <?php 
	        	if( $settings['list'] ): 
	        ?>
            
            <div class="education-class-details-tab">
                <div class="education-class-details-tab-menu">
                    <ul class="nav nav-tab">
                    	<?php 
                    		$i = 0;
        	        		foreach( $settings['list'] as $item ):
        	        		$i++; ?>

                           <li><a <?php if($i == 1){echo 'class="active"'; } ?> data-toggle="tab" href="#tabOne-<?php echo $i; ?>">

                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>

                                <?php echo $item['list_title']; ?>
                           	</a></li>
                       <?php endforeach;  ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php 
                		$i = 0;
    	        		foreach( $settings['list'] as $item ):
    	        		$i++; 
    	        	?>
                    <div class="tab-pane fade <?php if($i == 1){echo 'show active'; } ?>" id="tabOne-<?php echo $i; ?>">
                        <p><?php echo $item['list_desc']; ?></p>
                    </div>
                    <?php endforeach;  ?>
                </div>
            </div>

        </div>
	   <?php endif; ?>  

</div>

    <?php 

	}
	protected function content_template(){

	}

}
wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Accrodion() );