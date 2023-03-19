<?php
global $techeduem_opt;

$techeduem_banner_bg_color = $techeduem_banner_bg_repeat = $techeduem_banner_bg_size = $techeduem_banner_bg_attacement = $techeduem_banner_bg_position = $techeduem_banner_bg_image = "";

if (isset($techeduem_opt['techeduem_breadcrumbs_bg_optins'])) {
	$techeduem_banner_bg_options = $techeduem_opt['techeduem_breadcrumbs_bg_optins'];
}

if (isset($techeduem_banner_bg_options['background-color'])) {
	$techeduem_banner_bg_color = $techeduem_banner_bg_options['background-color'];
}

if (isset($techeduem_banner_bg_options['background-repeat'])) {
	$techeduem_banner_bg_repeat = $techeduem_banner_bg_options['background-repeat'];
}

if (isset($techeduem_banner_bg_options['background-size'])) {
	$techeduem_banner_bg_size = $techeduem_banner_bg_options['background-size'];
}

if (isset($techeduem_banner_bg_options['background-attachment'])) {
	$techeduem_banner_bg_attacement = $techeduem_banner_bg_options['background-attachment'];
}

if (isset($techeduem_banner_bg_options['background-position'])) {
	$techeduem_banner_bg_position = $techeduem_banner_bg_options['background-position'];
}
if (isset($techeduem_banner_bg_options['background-image'])) {
	$techeduem_banner_bg_image = $techeduem_banner_bg_options['background-image'];
}

$_techeduemid = get_the_ID();
$techeduem_banner_img = get_post_meta($_techeduemid, '_techeduem_banner_img', true);
$techeduem_banner_background = get_post_meta($_techeduemid, '_techeduem_banner_color', true);
?>

<?php

//show bar and content
if ('1' == $techeduem_opt['techeduem_page_title_bar']) { ?>
	<!-- breadcrumbs start -->
	<section class="breadcrumbs-area breadcrumbs-bg" style="background-image: url(<?php if ($techeduem_banner_img) {
																																									echo esc_url($techeduem_banner_img);
																																								} else {
																																									echo esc_url($techeduem_banner_bg_image);
																																								} ?>) ; background-color:<?php if ($techeduem_banner_background) {
																																																																																																																				echo esc_attr($techeduem_banner_background);
																																																																																																																			} else {
																																																																																																																				echo esc_attr($techeduem_banner_bg_color);
																																																																																																																			} ?>;  background-repeat: <?php echo esc_attr($techeduem_banner_bg_repeat); ?>; background-size: <?php echo esc_attr($techeduem_banner_bg_size); ?>; background-attachment: <?php echo esc_attr($techeduem_banner_bg_attacement); ?>; background-position: <?php echo esc_attr($techeduem_banner_bg_position); ?>">
		<div class="<?php if ($techeduem_opt['techeduem_breadcrumbs_full'] == true) {
									echo 'container-fluid';
								} else {
									echo 'container';
								} ?>">
			<div class="row">
				<div class="col-md-12">
					<?php
					$breadcrumbs_title_position_cmb = get_post_meta($_techeduemid, '_techeduem_breadcrumbs_position', true);
					$breadcrumbs_title_position_redux = $techeduem_opt['techeduem_breadcrumbs_text'];

					if (!empty($breadcrumbs_title_position_cmb)) {
						$breadcrumbs_title_position = $breadcrumbs_title_position_cmb;
					} else {
						if (isset($breadcrumbs_title_position_redux)) {
							$breadcrumbs_title_position = $breadcrumbs_title_position_redux;
						}
					}
					?>

					<div class="breadcrumbs breadcrumbs-title-<?php echo esc_attr($breadcrumbs_title_position); ?>">
						<?php
						if ($techeduem_opt['techeduem_breadcrumbs_area'] == true) : ?>
							<!---breadcrumbs title start-->
							<h1 class="page-title"><?php wp_title(''); ?></h1>
							<!---breadcrumbs title end -->
						<?php endif; ?>

						<div class="page-title-bar">
							<?php
							if ($techeduem_opt['techeduem_breadcrumbs_content_blog'] == '2') {
								//breadcrumbs function
								techeduem_breadcrumbs();
							} elseif ($techeduem_opt['techeduem_breadcrumbs_content_blog'] == '3') {
							?>
								<!---breadcrumbs serch start-->
								<div class="page-title-search-box">
									<form action="<?php echo esc_url(home_url('/')); ?>" method="GET">
										<input type="text" placeholder="search" name="s">
										<button type="submit"> <i class="fa fa-search"></i> </button>
									</form>
								</div>
								<!---breadcrumbs serch end-->
							<?php
							} else {
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumbs end -->
<?php
	//show content only
} elseif ('2' == $techeduem_opt['techeduem_page_title_bar']) {
} else { ?>
	<div class="breadcrumbs-area breadcrumbs-bg breadcrumbs-area-default">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="breadcrumbs breadcrumbs-title-left">
						<h1 class="page-title"><?php wp_title(''); ?></h1>
						<div class="page-title-bar">
							<?php techeduem_breadcrumbs(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }
