<?php

/**
 * Default Footer template
 *
 * @package techeduem
 */
$techeduem_opt = techeduem_get_opt();
$footer_widget_enable = isset($techeduem_opt['techeduem_footer_widgets_enable']) ? $techeduem_opt['techeduem_footer_widgets_enable'] : true;

?>

<!--Footer Widget Area Start-->
<?php $footer_widget_column = 4;
if ($footer_widget_enable == true) : if (is_active_sidebar('techeduem-footer-1') || is_active_sidebar('techeduem-footer-2') || is_active_sidebar('techeduem-footer-3') || is_active_sidebar('techeduem-footer-4')) : ?>
		<div class="footer-top-section pt-80 pb-30">
			<div class="container">
				<div class="row">
					<?php

					// declare varibale with empty value
					$custom_4_col_grid_size = array(3, 3, 3, 3);
					$reduxfooter_widget_column = 4;
					if (isset($techeduem_opt['techeduem_footer_layoutcolumns'])) {
						$reduxfooter_widget_column = $techeduem_opt['techeduem_footer_layoutcolumns'];
					}
					// get and set custom grid size for 4 col widget only
					if ($reduxfooter_widget_column) {
						$footer_widget_column = $reduxfooter_widget_column;
						// get grid sizes when column 4 active
						$custom_4_col_grid_size[0] = isset($techeduem_opt['techeduem_col_1_gird_size']) ? $techeduem_opt['techeduem_col_1_gird_size'] : '';
						$custom_4_col_grid_size[1] = isset($techeduem_opt['techeduem_col_2_gird_size']) ? $techeduem_opt['techeduem_col_2_gird_size'] : '';
						$custom_4_col_grid_size[2] = isset($techeduem_opt['techeduem_col_3_gird_size']) ? $techeduem_opt['techeduem_col_3_gird_size'] : '';
						$custom_4_col_grid_size[3] = isset($techeduem_opt['techeduem_col_4_gird_size']) ? $techeduem_opt['techeduem_col_4_gird_size'] : '';
					}

					// bootstrap grid size array
					switch ($footer_widget_column) {
						case 1:
							$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(12);
							break;
						case 2:
							$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(6, 6);
							break;
						case 3:
							$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(4, 4, 4);
							break;
						case 4:
							$bootstrap_grid_size = $custom_4_col_grid_size ? $custom_4_col_grid_size : array(3, 3, 3, 3);
							break;
					}

					for ($i = 1; $i <= $footer_widget_column; $i++) :
						if (is_active_sidebar('techeduem-footer-' . $i)) :
					?>
							<div class="col-lg-<?php if (!empty($bootstrap_grid_size[$i - 1])) {
																		echo esc_attr($bootstrap_grid_size[$i - 1]);
																	} else {
																		echo 3;
																	}; ?> col-md-6 col-12 mb-10">
								<?php dynamic_sidebar('techeduem-footer-' . $i); ?>
							</div>
					<?php endif;
					endfor; ?>

				</div>
			</div>
		</div>
		<!--End of Footer Widget Area-->
<?php endif;
endif; ?>


<!-- Footer Bottom Section Start -->
<div class="footer-bottom-section">
	<div class="container">
		<div class="row">

			<div class="footer-copyright col-md-5 col-12">
				<?php
				$default_foo_content = (isset($techeduem_opt['techeduem_default_footer_content'])) ? $techeduem_opt['techeduem_default_footer_content'] : '';

				if (!empty($default_foo_content)) {
					echo wp_kses_post($default_foo_content, 'techeduem');
				} else {
					esc_html_e('Copyright', 'techeduem'); ?>
					&copy;
				<?php echo date("Y") . ' ' . get_bloginfo('name');
					esc_html_e('. All Rights Reserved.', 'techeduem');
				}
				?>
			</div>

			<?php if (isset($techeduem_opt['techeduem_social_icons'])) : ?>
				<div class="footer-social col-md-7 col-12">
					<p>
						<?php
						foreach ($techeduem_opt['techeduem_social_icons'] as $key => $value) {
							if ($value != '') {
								if ($key == 'vimeo') {
									echo '<a class="social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
								} else {
									echo '<a class="social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-' . esc_attr($key) . '"></i></a>';
								}
							}
						}
						?>
					</p>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div><!-- Footer Bottom Section End -->