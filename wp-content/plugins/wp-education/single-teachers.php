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
			$relatedtitle = wpeducation_get_option( 'wpteachers_posts_related_title', 'teachers' );
			$wpteachers_featured_image_show = wpeducation_get_option( 'wpteachers_featured_image_show', 'teachers' );
			$wpteachers_title_show = wpeducation_get_option( 'wpteachers_title_show', 'teachers' );
			$wpteachers_related_service_show = wpeducation_get_option( 'wpteachers_related_service_show', 'teachers' );
			$wpteachers_related_service_style = wpeducation_get_option( 'wpteachers_related_service_style', 'teachers' );
	?>
		<!-- Teachers Details Area Start -->
		<div class="wp-teachers-detals-area">
			<div class="container">
				<div class="wp-teachers-detals-content">
					<?php if($wpteachers_featured_image_show =='yes'){?>
					<div class="education-servie-details-image">
						<?php the_post_thumbnail(); ?>
					</div> 
					<?php } 

					 if($wpteachers_title_show =='yes'){?> 
					<h3>
                        <?php the_title();?>
                    </h3>
                    <?php } ?>
					<div class="wp-education-details-content">
	                    <?php the_content(); ?>
	                </div> 
				</div>
			</div>
		</div>
		<!-- Teachers Details Area End -->

		<!-- Related Teachers Area Start -->
		<?php
          
		$related = array(
		    'post_type'  => 'teachers',
		    'post__not_in' =>array(get_the_ID()),
		    'posts_per_page' =>-1,
		);
		$relatedd = new WP_Query($related);

		if($wpteachers_related_service_show =='yes' && !empty( $relatedd )){
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
                            $short_des = get_post_meta( get_the_ID(),'_wpteachers_service_short_des', true );  
                    	?>
                    	<div class="<?php echo esc_attr( $wpteachers_related_service_style ) ?>">
							<div class="wp-education-box">
								<div class="wp-education-image teachers-rel">
									<?php the_post_thumbnail( ); ?>
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
		<!-- Related Teachers Area End -->
	<?php
}
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();