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
			$relatedtitle = wpeducation_get_option( 'wpeducation_posts_related_title', 'settings' );
			$wpeducation_featured_image_show = wpeducation_get_option( 'wpeducation_featured_image_show', 'settings' );
			$wpeducation_title_show = wpeducation_get_option( 'wpeducation_title_show', 'settings' );
			$wpeducation_related_service_show = wpeducation_get_option( 'wpeducation_related_service_show', 'settings' );
			$wpeducation_related_service_style = wpeducation_get_option( 'wpeducation_related_service_style', 'settings' );
	?>
		<!-- Course Details Area Start -->
		<div class="wp-education-detals-area">
			<div class="container">
				<div class="wp-education-details-content">
					<?php if($wpeducation_featured_image_show =='yes'){?>
					<div class="education-servie-details-image">
						<?php the_post_thumbnail(); ?>
					</div> 
					<?php } 

					 if($wpeducation_title_show =='yes'){?> 
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
		<!-- Course Details Area End -->
		<!-- Related Service Area Start -->
		<?php
        global $post;
		$term_obj_list = get_the_terms( $post->ID, 'wpeducation_category' );
		$terms_string = join(', ', wp_list_pluck($term_obj_list, 'term_id'));
		
		$related = array(
		    'post_type'  => 'wpeducation',
		    'post__not_in' =>array(get_the_ID()),
		    'posts_per_page' =>-1,
			'tax_query' => array(
				array(
					'taxonomy' => 'wpeducation_category',
					'field' => 'id',
					'terms' => $terms_string
				 )
			  )
		);
		$relatedd = new WP_Query($related);

		if($wpeducation_related_service_show =='yes' && !empty( $relatedd )){
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
                            $short_des = get_post_meta( get_the_ID(),'_wpeducation_service_short_des', true );  
                    	?>
                    	<div class="<?php echo esc_attr( $wpeducation_related_service_style ) ?>">
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