<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class WPeducation_Elementor_Widget_Maps extends Widget_Base {
    public function get_name() {
        return 'education-addon-maps';
    }

    public function get_title() {
        return __( 'Education : Maps', 'wpeducation' );
    }
    
    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'wpeducation' ];
    }

    public function get_script_depends() {
        return [
            'education-maps-api-js' ,
            'education-maps-js'
        ];
    }

    // This will controls the animation, colors and background, dimensions etc
    protected function register_controls() {

        /* Start Map Settings Section */
        $this->start_controls_section('education_maps_map_settings',
                [
                    'label'         => esc_html__('Center Location', 'wpeducation'),
                    ]
                );
        if(isset( get_option( 'pa_maps_save_settings' )['education-map-api'])){
        $map_api = get_option( 'pa_maps_save_settings' )['education-map-api'];

        
        if( ! isset( $map_api ) || empty( $map_api ) ){
            $this->add_control('education_maps_api_url',
                [
                    'label'         => '<span style="line-height: 1.4em;">Premium Maps requires an API key. Get your API key from <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">here</a> and add it to Premium Addons admin page. Go to Dashboard -> Premium Addons for Elementor -> Google Maps API</span>',
                    'type'          => Controls_Manager::RAW_HTML,
                ]
            );
        }

   	 }
        
        $this->add_control('education_map_location_finder',
            [
                'label'         => esc_html__( 'Latitude & Longitude Finder', 'wpeducation' ),
                'type'          => Controls_Manager::SWITCHER,
            ]
        );
        
        $this->add_control('education_map_notice',
		    [
			    'label' => __( 'Find Latitude & Longitude', 'elementor' ),
			    'type'  => Controls_Manager::RAW_HTML,
			    'raw'   => '<form onsubmit="getAddress(this);" action="javascript:void(0);"><input type="text" id="education-map-get-address" class="education-map-get-address" style="margin-top:10px; margin-bottom:10px;"><input type="submit" value="Search" class="elementor-button elementor-button-default" onclick="getAddress(this)"></form><div class="education-address-result" style="margin-top:10px; line-height: 1.3; font-size: 12px;"></div>',
			    'label_block' => true,
                'condition'     => [
                    'education_map_location_finder'   => 'yes'
                ]
		    ]
	    );
        
        $this->add_control('education_maps_center_lat',
                [
                    'label'         => esc_html__('Center Latitude', 'wpeducation'),
                    'type'          => Controls_Manager::TEXT,
                    'description'   => esc_html__('Center latitude and longitude are required to identify your location', 'wpeducation'),
                    'default'       => '18.591212',
                    'label_block'   => true,
                    ]
                );

        $this->add_control('education_maps_center_long',
                [
                    'label'         => esc_html__('Center Longitude', 'wpeducation'),
                    'type'          => Controls_Manager::TEXT,
                    'description'   => esc_html__('Center latitude and longitude are required to identify your location', 'wpeducation'),
                    'default'       => '73.741261',
                    'label_block'   => true,
                    ]
                );
        
        $this->end_controls_section();
        
        $this->start_controls_section('education_maps_map_pins_settings',
            [
                'label'         => esc_html__('Markers', 'wpeducation'),
            ]
        );
        
        $this->add_control('education_maps_markers_width',
                [
                    'label'         => esc_html__('Max Width', 'wpeducation'),
                    'type'          => Controls_Manager::NUMBER,
                    'title'         => esc_html__('Set the Maximum width for markers description box','wpeducation'),
                    ]
                );
         
        $repeater = new REPEATER();
        
        $repeater->add_control('education_map_pin_location_finder',
            [
                'label'         => esc_html__( 'Latitude & Longitude Finder', 'wpeducation' ),
                'type'          => Controls_Manager::SWITCHER,
            ]
        );
        
        $repeater->add_control('education_map_pin_notice',
		    [
			    'label' => __( 'Find Latitude & Longitude', 'elementor' ),
			    'type'  => Controls_Manager::RAW_HTML,
			    'raw'   => '<form onsubmit="getPinAddress(this);" action="javascript:void(0);"><input type="text" id="education-map-get-address" class="education-map-get-address" style="margin-top:10px; margin-bottom:10px;"><input type="submit" value="Search" class="elementor-button elementor-button-default" onclick="getPinAddress(this)"></form><div class="education-address-result" style="margin-top:10px; line-height: 1.3; font-size: 12px;"></div>',
			    'label_block' => true,
                'condition' => [
                    'education_map_pin_location_finder'   => 'yes'
                ]
		    ]
	    );
        
        $repeater->add_control('map_latitude',
            [
                'label'         => esc_html__('Latitude', 'wpeducation'),
                'type'          => Controls_Manager::TEXT,
                'description'   => 'Click <a href="https://www.latlong.net/" target="_blank">here</a> to get your location coordinates',
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control('map_longitude',
            [
                'name'          => 'map_longitude',
                'label'         => esc_html__('Longitude', 'wpeducation'),
                'type'          => Controls_Manager::TEXT,
                'description'   => 'Click <a href="https://www.latlong.net/" target="_blank">here</a> to get your location coordinates',
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control('pin_title',
            [
                'label'         => esc_html__('Title', 'wpeducation'),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [ 'active' => true ],
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control('pin_desc',
            [
                'label'         => esc_html__('Description', 'wpeducation'),
                'type'          => Controls_Manager::WYSIWYG,
                'dynamic'       => [ 'active' => true ],
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control('pin_icon',
            [
                'label'         => esc_html__('Custom Icon', 'wpeducation'),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [ 'active' => true ],
            ]
        );

        $this->add_control('education_maps_map_pins',
            [
                'label'         => esc_html__('Map Pins', 'wpeducation'),
                'type'          => Controls_Manager::REPEATER,
                'default'       => [
                    'map_latitude'      => '18.591212',
                    'map_longitude'     => '73.741261',
                    'pin_title'         => esc_html__('Premium Google Maps', 'wpeducation'),
                    'pin_desc'          => esc_html__('Add an optional description to your map pin', 'wpeducation'),
                ],
                'fields'       => array_values( $repeater->get_controls() ),
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section('education_maps_controls_section',
                [
                    'label'         => esc_html__('Controls', 'wpeducation'),
                    ]
                );
        
        $this->add_control('education_maps_map_type',
                [
                    'label'         => esc_html__( 'Map Type', 'wpeducation' ),
                    'type'          => Controls_Manager::SELECT,
                    'options'       => [
                        'roadmap'       => esc_html__( 'Road Map', 'wpeducation' ),
                        'satellite'     => esc_html__( 'Satellite', 'wpeducation' ),
                        'terrain'       => esc_html__( 'Terrain', 'wpeducation' ),
                        'hybrid'        => esc_html__( 'Hybrid', 'wpeducation' ),
                        ],
                    'default'       => 'roadmap',
                    ]
                );
        
        $this->add_responsive_control('education_maps_map_height',
                [
                    'label'         => esc_html__( 'Height', 'wpeducation' ),
                    'type'          => Controls_Manager::SLIDER,
                    'default'       => [
                            'size' => 500,
                    ],
                    'range'         => [
                            'px' => [
                                'min' => 80,
                                'max' => 1400,
                            ],
                    ],
                    'selectors'     => [
                            '{{WRAPPER}} .education_maps_map_height' => 'height: {{SIZE}}px;',
                    ],
                ]
  		);
        
        $this->add_control('education_maps_map_zoom',
                [
                    'label'         => esc_html__( 'Zoom', 'wpeducation' ),
                    'type'          => Controls_Manager::SLIDER,
                    'default'       => [
                        'size' => 12,
                    ],
                    'range'         => [
                        'px' => [
                                'min' => 0,
                                'max' => 22,
                        ],
                    ],
                ]
                );
        
        $this->add_control('education_maps_map_option_map_type_control',
                [
                    'label'         => esc_html__( 'Map Type Controls', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );

        $this->add_control('education_maps_map_option_zoom_controls',
                [
                    'label'         => esc_html__( 'Zoom Controls', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
		
        $this->add_control('education_maps_map_option_streeview',
                [
                    'label'         => esc_html__( 'Street View Control', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
		
        $this->add_control('education_maps_map_option_fullscreen_control',
                [
                    'label'         => esc_html__( 'Fullscreen Control', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
		
        $this->add_control('education_maps_map_option_mapscroll',
                [
                    'label'         => esc_html__( 'Scroll Wheel Zoom', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
        
        $this->add_control('education_maps_marker_open',
                [
                    'label'         => esc_html__( 'Info Container Always Opened', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
        
        $this->add_control('education_maps_marker_hover_open',
                [
                    'label'         => esc_html__( 'Info Container Opened when Hovered', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
        
        $this->add_control('education_maps_marker_mouse_out',
                [
                    'label'         => esc_html__( 'Info Container Closed when Mouse Out', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'condition'     => [
                        'education_maps_marker_hover_open'   => 'yes'
                        ]
                    ]
                );

        $this->add_control('education_maps_map_option_cluster',
                [
                    'label'         => esc_html__( 'Marker Clustering', 'wpeducation' ),
                    'type'          => Controls_Manager::SWITCHER,
                ]
                );
        
        $this->end_controls_section();
        
        $this->start_controls_section('education_maps_custom_styling_section',
                [
                    'label'         => esc_html__('Map Style', 'wpeducation'),
                    ]
                );
        
        $this->add_control('education_maps_custom_styling',
        [
            'label'         => esc_html__('JSON Code', 'wpeducation'),
            'type'          => Controls_Manager::TEXTAREA,
            'description'   => 'Get your custom styling from <a href="https://snazzymaps.com/" target="_blank">here</a>',
            'label_block'   => true,
            ]
        );
    
        /*End Map Options Section*/
        $this->end_controls_section();
        
        /*Start Title Style Section*/
        $this->start_controls_section('education_maps_pin_title_style',
                [
                    'label'         => esc_html__('Title', 'wpeducation'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
                );
        
        /*Pin Title Color*/
        $this->add_control('education_maps_pin_title_color',
                [
                    'label'         => esc_html__('Color', 'wpeducation'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-title'   => 'color: {{VALUE}};',
                        ]
                    ]
                );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name'          => 'pin_title_typography',
                    'selector'      => '{{WRAPPER}} .education-maps-info-title',
                ]
                );
        
        $this->add_responsive_control('education_maps_pin_title_margin',
                [
                    'label'         => esc_html__('Margin', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-title'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
        
        /*Pin Title Padding*/
        $this->add_responsive_control('education_maps_pin_title_padding',
                [
                    'label'         => esc_html__('Padding', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-title'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
        
        /*Pin Title ALign*/
        $this->add_responsive_control('education_maps_pin_title_align',
                [
                    'label'         => esc_html__( 'Alignment', 'wpeducation' ),
                    'type'          => Controls_Manager::CHOOSE,
                    'options'       => [
                        'left'      => [
                            'title'=> esc_html__( 'Left', 'wpeducation' ),
                            'icon' => 'eicon-text-align-left',
                            ],
                        'center'    => [
                            'title'=> esc_html__( 'Center', 'wpeducation' ),
                            'icon' => 'eicon-text-align-center',
                            ],
                        'right'     => [
                            'title'=> esc_html__( 'Right', 'wpeducation' ),
                            'icon' => 'eicon-text-align-right',
                            ],
                        ],
                    'default'       => 'center',
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-title' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
                
        /*End Title Style Section*/
        $this->end_controls_section();
        
        /*Start Pin Style Section*/
        $this->start_controls_section('education_maps_pin_text_style',
                [
                    'label'         => esc_html__('Description', 'wpeducation'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
                );
        
        $this->add_control('education_maps_pin_text_color',
                [
                    'label'         => esc_html__('Color', 'wpeducation'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-desc'   => 'color: {{VALUE}};',
                        ]
                    ]
                );
        
        $this->add_group_control(
        Group_Control_Typography::get_type(),
                [
                    'name'          => 'pin_text_typo',
                    'selector'      => '{{WRAPPER}} .education-maps-info-desc',
                ]
                );
        
        $this->add_responsive_control('education_maps_pin_text_margin',
                [
                    'label'         => esc_html__('Margin', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-desc'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
        
        $this->add_responsive_control('education_maps_pin_text_padding',
                [
                    'label'         => esc_html__('Padding', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-desc'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
        
        /*Pin Title ALign*/
        $this->add_responsive_control('education_maps_pin_description_align',
                [
                    'label'         => esc_html__( 'Alignment', 'wpeducation' ),
                    'type'          => Controls_Manager::CHOOSE,
                    'options'       => [
                        'left'      => [
                            'title'=> esc_html__( 'Left', 'wpeducation' ),
                            'icon' => 'eicon-text-align-left',
                            ],
                        'center'    => [
                            'title'=> esc_html__( 'Center', 'wpeducation' ),
                            'icon' => 'eicon-text-align-center',
                            ],
                        'right'     => [
                            'title'=> esc_html__( 'Right', 'wpeducation' ),
                            'icon' => 'eicon-text-align-right',
                            ],
                        ],
                    'default'       => 'center',
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-info-desc' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
        
        /*End Pin Style Section*/
        $this->end_controls_section();
        
        /*Start Map Style Section*/
        $this->start_controls_section('education_maps_box_style',
                [
                    'label'         => esc_html__('Map', 'wpeducation'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
                );

        /*First Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(),
                [
                    'name'              => 'map_border',
                    'selector'          => '{{WRAPPER}} .education-maps-container',
                    ]
                );
        
        /*First Border Radius*/
        $this->add_control('education_maps_box_radius',
                [
                    'label'         => esc_html__('Border Radius', 'wpeducation'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-container,{{WRAPPER}} .education_maps_map_height' => 'border-radius: {{SIZE}}{{UNIT}};'
                        ]
                    ]
                );
        
        /*Box Shadow*/
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
                [
                    'label'         => esc_html__('Shadow','wpeducation'),
                    'name'          => 'education_maps_box_shadow',
                    'selector'      => '{{WRAPPER}} .education-maps-container',
                ]
                );

        /*First Margin*/
        $this->add_responsive_control('education_maps_box_margin',
                [
                    'label'         => esc_html__('Margin', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ]
                    ]
                );
        
        /*First Padding*/
        $this->add_responsive_control('education_maps_box_padding',
                [
                    'label'         => esc_html__('Padding', 'wpeducation'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'selectors'     => [
                        '{{WRAPPER}} .education-maps-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ]
                    ]
                );
        
        /*End Map Style Section*/
        $this->end_controls_section();
        
    }

    protected function render() {
        // get our input from the widget settings.
        $settings = $this->get_settings_for_display();
        
        $map_pins = $settings['education_maps_map_pins'];

        if( !empty( $settings['education_maps_custom_styling'] ) ){
            $map_custom_style = $settings['education_maps_custom_styling'];
        } else {
            $map_custom_style = '';
        }
        
        if ($settings['education_maps_map_option_streeview'] == 'yes') {
            $street_view = 'true';
        } else {
            $street_view = 'false';
        }

        if ($settings['education_maps_map_option_mapscroll'] == 'yes') {
            $scroll_wheel = 'true';
        } else {
            $scroll_wheel = 'false';
        }

        if ($settings['education_maps_map_option_fullscreen_control'] == 'yes') {
            $enable_full_screen = 'true';
        } else {
            $enable_full_screen = 'false';
        }
        
        if ($settings['education_maps_map_option_zoom_controls'] == 'yes') {
            $enable_zoom_control = 'true';
        } else {
            $enable_zoom_control = 'false';
        }
        
        if ($settings['education_maps_map_option_map_type_control'] == 'yes') {
            $map_type_control = 'true';
        } else {
            $map_type_control = 'false';
        }
        
        if ($settings['education_maps_marker_open'] == 'yes') {
            $automatic_open = 'true';
        } else {
            $automatic_open = 'false';
        }
        
        if ($settings['education_maps_marker_hover_open'] == 'yes') {
            $hover_open = 'true';
        } else {
            $hover_open = 'false';
        }
        
        if ($settings['education_maps_marker_mouse_out'] == 'yes') {
            $hover_close = 'true';
        } else {
            $hover_close = 'false';
        }

        if($settings['education_maps_map_option_cluster'] == 'yes') {
            $marker_cluster = 'true';
        } else {
            $marker_cluster = 'false';
        }
        
        $centerlat = !empty($settings['education_maps_center_lat']) ? $settings['education_maps_center_lat'] : 18.591212;
        $centerlong = !empty($settings['education_maps_center_long']) ? $settings['education_maps_center_long'] : 73.741261;
        
        $marker_width = !empty($settings['education_maps_markers_width']) ? $settings['education_maps_markers_width'] : 1000;
        
        $map_settings = [
            'zoom'                  => $settings['education_maps_map_zoom']['size'],
            'maptype'               => $settings['education_maps_map_type'],
            'streetViewControl'     => $street_view,
            'centerlat'             => $centerlat,
            'centerlong'            => $centerlong,
            'scrollwheel'           => $scroll_wheel,
            'fullScreen'            => $enable_full_screen,
            'zoomControl'           => $enable_zoom_control,
            'typeControl'           => $map_type_control,
            'automaticOpen'         => $automatic_open,
            'hoverOpen'             => $hover_open,
            'hoverClose'            => $hover_close,
            'cluster'               => $marker_cluster
        ];
        
        $this->add_render_attribute('style_wrapper', 'data-style', $settings['education_maps_custom_styling']);
?>

<div class="education-maps-container" id="education-maps-container">
    <?php if(count($map_pins)){
        	?>
	        <div class="education_maps_map_height" data-settings='<?php echo wp_json_encode($map_settings); ?>' <?php echo $this->get_render_attribute_string('style_wrapper'); ?>>
			<?php
        	foreach($map_pins as $pin){
				?>
		        <div class="education-pin" data-lng="<?php echo $pin['map_longitude']; ?>" data-lat="<?php echo $pin['map_latitude']; ?>" data-icon="<?php echo $pin['pin_icon']['url']; ?>" data-max-width="<?php echo $marker_width; ?>">
                    <?php if(!empty($pin['pin_title'])|| !empty($pin['pin_desc'])):?>
                    
			        <div class='education-maps-info-container'><p class='education-maps-info-title'><?php echo $pin['pin_title']; ?></p><div class='education-maps-info-desc'><?php echo $pin['pin_desc']; ?></div></div>
                    <?php endif; ?>
		        </div>
		        <?php
	        }
	        ?>
	        </div>
			<?php
        } ?>
    
</div>
    
    <?php

    }
    
    public function render_plain_content( $instance = [] ) {}

}

wpeducation_widget_register_manager( new WPeducation_Elementor_Widget_Maps() );