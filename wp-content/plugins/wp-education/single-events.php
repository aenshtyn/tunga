<?php
/**
 * Template Name: Education Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpeducation
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();
			$relatedtitle = wpeducation_get_option( 'wpevents_posts_related_title', 'events' );
			$wpevents_featured_image_show = wpeducation_get_option( 'wpevents_featured_image_show', 'events' );
			$wpevents_title_show = wpeducation_get_option( 'wpevents_title_show', 'events' );
			$wpevents_related_service_show = wpeducation_get_option( 'wpevents_related_service_show', 'events' );
			$wpevents_related_service_style = wpeducation_get_option( 'wpevents_related_service_style', 'events' );
			
			$events_start_date = get_post_meta( get_the_ID(),'_wpeducation_events_start_date', true );
			$events_end_date = get_post_meta( get_the_ID(),'_wpeducation_events_end_date', true );
			$events_start_time = get_post_meta( get_the_ID(),'_wpeducation_events_start_time', true );
			$events_end_time = get_post_meta( get_the_ID(),'_wpeducation_events_end_time', true );
			$events_location = get_post_meta( get_the_ID(),'_wpeducation_events_location', true );
			$events_bookbtn = get_post_meta( get_the_ID(),'_wpeducation_events_bookbtn', true );
			$events_book_link = get_post_meta( get_the_ID(),'_wpeducation_events_book_link', true );
	?>
		<!-- Events Details Area Start -->
		<div class="wp-education-detals-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="education-ps-image">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="education-event-features-info">
			         		<h3 class="title"> Event Details</h3>
							<ul>
								<li class="lectures-feature">
									<i class="fa fa-calendar"></i>
									<span class="label"><?php esc_html_e( 'Start Date','wpeducation' ) ?></span>
									<span class="value"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_start_date)?></span>
								</li>
								<li class="lectures-feature">
									<i class="fa fa-calendar"></i>
									<span class="label"><?php esc_html_e( 'End Date','wpeducation' ) ?></span>
									<span class="value"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_end_date)?></span>
								</li>
								<li class="lectures-feature">
									<i class="fa fa-clock-o"></i>
									<span class="label"><?php esc_html_e( 'Start Time','wpeducation' ) ?></span>
									<span class="value"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_start_time)?></span>
								</li>
								<li class="lectures-feature">
									<i class="fa fa-clock-o"></i>
									<span class="label"><?php esc_html_e( 'End Time','wpeducation' ) ?></span>
									<span class="value"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_end_time)?></span>
								</li>
								<li class="lectures-feature">
									<i class="fa fa-map-marker"></i>
									<span class="label"><?php esc_html_e( 'Location','wpeducation' ) ?></span>
									<span class="value"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_location)?></span>
								</li>
							</ul>
				            <div class="book-btn">
								<a href="<?php echo esc_url( $events_book_link ); ?>"><?php echo esc_html__(' ','wpeducation'); echo esc_html($events_bookbtn)?></a>
							</div>
	       				</div>
					</div>
					<div class="col-md-12">
						<div class="education-event-desc">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Events Details Area End -->
		<!-- Related Service Area Start -->
		<?php
          
		$related = array(
		    'post_type'  => 'events',
		    'post__not_in' =>array(get_the_ID()),
		    'posts_per_page' =>-1,
		);
		$relatedd = new WP_Query($related);

		if($wpevents_related_service_show =='yes' && !empty( $relatedd )){
		?>
		<div class="education-related-area">
			<div class="container">
				<?php if(!empty($relatedtitle)){?>
					<div class="educationrelated-title">
						<h3><?php echo esc_html($relatedtitle);?> </h3>
					</div>
				<?php } ?>
                <div class="related-education-service-active education-indicator-style-two">
					<?php
                        while($relatedd->have_posts()): $relatedd->the_post();
                            $short_des = get_post_meta( get_the_ID(),'_wpeducation_events_short_des', true );  
                    	?>
                    	<div class="<?php echo esc_attr( $wpevents_related_service_style ) ?>">
							<div class="wp-education-box">
								<div class="wp-education-image">
									<?php the_post_thumbnail('wpeducation_img550x348'); ?>
								</div>
								<div class="wp-education-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<p><?php echo esc_html( $short_des ); ?></p>
								</div>
							</div>
						</div>
                    <?php endwhile; ?>
                </div>
            </div>
		</div>
		<!-- Related Service Area End -->
	<?php
}
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();