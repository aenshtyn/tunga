<?php
/**
* Start Meta fields
*/
add_filter( 'cmb2_init', 'wpeducation_metaboxes' );
function wpeducation_metaboxes() {
	$prefix = '_wpeducation_';

	/**
	* Start Page options [tab]
	*/
	$page_metabox_options = array(
		'id'           		 => $prefix . '_page_optons',
		'title'        		 => esc_html__( 'Page Options', 'wpeducation' ),
		'object_types' 		 => array('post', 'page'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	);
	// Setup meta box
	$page_options = new_cmb2_box( $page_metabox_options );

	// Setting tabs
	$tabs_setting      = array(
		'config' 	=> $page_metabox_options,
		'layout' 	=> 'vertical', // Default : horizontal
		'tabs'  	=> array()
	);

	//===================================
	//Course Metaboxes
	//===================================
	$course = new_cmb2_box( array(
		'id'            => $prefix . 'wpeducation',
		'title'         => esc_html__( 'Course Option', 'wpeducation' ),
		'object_types'  => array( 'wpeducation'), // Post type
		'priority'   => 'high',
		) );
	
	$course->add_field( array(
		'name'       => esc_html__( 'Class Date', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Class Date Here', 'wpeducation' ),
		'id'         => $prefix . 'course_class_date',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$course->add_field( array(
		'name'       => esc_html__( 'Short Description', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Short Description Here', 'wpeducation' ),
		'id'         => $prefix . 'course_short_des',
		'type'       => 'textarea_small',
		'default' 		=> ''
		) );
		
	$course->add_field( array(
		'name'       => esc_html__( 'Insert Age', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Age Here', 'wpeducation' ),
		'id'         => $prefix . 'course_age_calculate',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$course->add_field( array(
		'name'       => esc_html__( 'Class Size', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Class Size Here', 'wpeducation' ),
		'id'         => $prefix . 'course_class_size',
		'type'       => 'text',
		'default' 		=> ''
		) );

	//===================================
	//Teachers Metaboxes
	//===================================
	$team = new_cmb2_box( array(
		'id'            => $prefix . 'teachers',
		'title'         => esc_html__( 'Teachers Option', 'wpeducation' ),
		'object_types'  => array( 'teachers', ), // Post type
		'priority'   => 'high',
		) );
	$team->add_field( array(
		'name'       => esc_html__( 'Short Description', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Short Description Here', 'wpeducation' ),
		'id'         => $prefix . 'sortcontent',
		'type'       => 'textarea_small',
		) );
	$team->add_field( array(
		'name'       => esc_html__( 'Designation', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Designation Here', 'wpeducation' ),
		'id'         => $prefix . 'teamdeg',
		'type'       => 'text',
		) );
	// $group_field_id is the field id string, so in this case: $prefix . 'wpeducation'
	$teamgrop = $team->add_field( array(
		'id'          => $prefix . 'teachersicon',
		'type'        => 'group',
		'description' => esc_html__( 'Add Second Icon', 'wpeducation' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Social Icon {#}', 'wpeducation' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Icon', 'wpeducation' ),
			'remove_button' => esc_html__( 'Remove Icon', 'wpeducation' ),
			'sortable'      => true, // beta
			),
		) );
	$team->add_group_field( $teamgrop, array(
		'name'       => esc_html__( 'Social Icon', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Icon fa fa-facebook', 'wpeducation' ),
		'placeholder' => esc_html__( 'Enter something here', 'wpeducation' ),
		'id'         => $prefix .'ticon',
		'type'       => 'text',
		) );
	$team->add_group_field( $teamgrop, array(
		'name'       => esc_html__( 'Enter Social Link', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert social link here', 'wpeducation' ),
		'id'  => $prefix .'turl',
		'type' => 'text_url',					
		) );

	//===================================
	// Events Metaboxes
	//===================================
	$events = new_cmb2_box( array(
		'id'            => $prefix . 'events',
		'title'         => esc_html__( 'Events Option', 'wpeducation' ),
		'object_types'  => array( 'events'), // Post type
		'priority'   => 'high',
		) );
	
	$events->add_field( array(
		'name'       => esc_html__( 'Event Date', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Event Date', 'wpeducation' ),
		'id'         => $prefix . 'events_date',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Event Month', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Event Month', 'wpeducation' ),
		'id'         => $prefix . 'events_month',
		'type'       => 'text',
		'default' 		=> ''
		) );
		
	$events->add_field( array(
		'name'       => esc_html__( 'Event Time', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Events Time Here 10:00 AM - 05:00 PM', 'wpeducation' ),
		'id'         => $prefix . 'events_time',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Event Location', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Evetns Location Here', 'wpeducation' ),
		'id'         => $prefix . 'events_location',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Event Short Description', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Short Description Here', 'wpeducation' ),
		'id'         => $prefix . 'events_short_des',
		'type'       => 'textarea_small',
		'default' 		=> ''
		) );
	
	$events->add_field( array(
		'name'       => esc_html__( 'Event Start Date', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Event Start Date Here (D/M/Y)', 'wpeducation' ),
		'id'         => $prefix . 'events_start_date',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Event End Date', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Event End Date Here (D/M/Y)', 'wpeducation' ),
		'id'         => $prefix . 'events_end_date',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Event Start Time', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Event Start Time Here (10:00 AM)', 'wpeducation' ),
		'id'         => $prefix . 'events_start_time',
		'type'       => 'text',
		'default' 		=> ''
		) );
		
	$events->add_field( array(
		'name'       => esc_html__( 'Event End Time', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Events End Time Here (05:00 PM)', 'wpeducation' ),
		'id'         => $prefix . 'events_end_time',
		'type'       => 'text',
		'default' 		=> ''
		) );
		
	$events->add_field( array(
		'name'       => esc_html__( 'Event Book Button Text', 'wpeducation' ),
		'desc'       => esc_html__( 'Insert Events Book Button Text Here (Book Now)', 'wpeducation' ),
		'id'         => $prefix . 'events_bookbtn',
		'type'       => 'text',
		'default' 		=> ''
		) );

	$events->add_field( array(
		'name'       => esc_html__( 'Book Url', 'wpfilm-studio' ),
		'desc'       => esc_html__( 'Insert Your Booking Form Url', 'wpeducation' ),
		'id'         => $prefix . 'events_book_link',
		'type'       => 'text_url',
	   ) );	
	
}