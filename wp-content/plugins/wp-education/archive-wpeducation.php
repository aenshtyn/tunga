<?php
/**
 * Template Name: Education Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpeducation
 */

get_header();

?>

<div class="page-wrapper clear wpeducation-details">
	<div class="container">
		<div class="row">
			<?php
				if ( have_posts() ) : 
                        while( have_posts() ):the_post();
                            $short_des = get_post_meta( get_the_ID(),'_wpeducation_service_short_des', true ); 
                            $wpeducation_related_service_style = wpeducation_get_option( 'wpeducation_related_service_style', 'settings' );
                    	?>
                    	<div class="col-md-4">
                    	<div class="<?php echo esc_attr( $wpeducation_related_service_style ) ?>">
							<div class="wp-education-box">
								<div class="wp-education-image">
									<?php the_post_thumbnail('wpeducation_img550x348');?>
								</div>
								<div class="wp-education-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<p><?php echo esc_html( $short_des ); ?></p>
								</div>
							</div>
						</div>
                        </div>
                    <?php endwhile; ?>
                    <!-- Pagination -->
					<div class="col-md-12">
						<div class="wp-education-pagination">
							<?php  wpeducation_pagination();?>
						</div>
					</div>
				<?php endif; ?>
        </div>
	</div>
</div>

<?php

get_footer();