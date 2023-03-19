<?php
/*
 * Techedu Header top bar
 * Author: Hastech
 * Author URI: http://hastech.company
 * Version: 3.1.3
 * ======================================================
 */

$techeduem_opt = techeduem_get_opt();
$topbar_widht = $techeduem_opt['techeduem_header_top_width'];
if (isset($topbar_widht) && true == $topbar_widht) {
	$topbar_widht = 'container-fluid';
} else {
	$topbar_widht = 'container';
}

?>
<div class="header-top-area">
	<div class="<?php echo esc_attr($topbar_widht); ?>">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<?php
				if ($techeduem_opt['techeduem_left_content_section'] == '1') {
				?>
					<div class="header-social">
						<div class="header-info">
							<?php if (!empty($techeduem_opt['techeduem_left_opening_details'])) : ?>
								<span><?php echo esc_html($techeduem_opt['techeduem_left_opening_details']); ?></span>
							<?php endif; ?>
						</div>
						<ul>
							<?php
							foreach ($techeduem_opt['techeduem_social_icons'] as $key => $value) {
								if ($value != '') {
									if ($key == 'vimeo') {
										echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
									} else {
										echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-' . esc_attr($key) . '"></i></a></li>';
									}
								}
							}
							?>
						</ul>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_left_content_section'] == '2') {
				?>
					<div class="top-bar-left-menu">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'left-menu',
							'container'      => false,
						));
						?>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_left_content_section'] == '4') {
				?>
					<div class="top-bar-left-content">
						<p>
							<?php if (isset($techeduem_opt['techeduem_left_text_area']) && $techeduem_opt['techeduem_left_text_area'] != '') {
								echo wp_kses($techeduem_opt['techeduem_left_text_area'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
								));
							} else {
								esc_html_e('Lorem ipsum dolor sit amet', 'techeduem');
							}
							?>
						</p>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_left_content_section'] == '5') {
				?>
					<div class="header-info">
						<?php if (!is_user_logged_in()) : ?>
							<?php if (!empty($techeduem_opt['techeduem_left_login_area'])) : ?>
								<span><a href="<?php echo esc_url(wp_login_url()); ?>"> <i class="<?php echo esc_attr($techeduem_opt['techeduem_left_login_icon']); ?>"></i> <?php echo esc_attr($techeduem_opt['techeduem_left_login_area']); ?></a></span>
							<?php endif;
							if (!empty($techeduem_opt['techeduem_left_register_area'])) : ?>
								<span><a href="<?php echo esc_url(wp_registration_url()); ?> " target="_top"> <i class="<?php echo esc_attr($techeduem_opt['techeduem_left_register_icon']); ?>"></i> <?php echo esc_attr($techeduem_opt['techeduem_left_register_area']); ?></a></span>
							<?php endif; ?>
						<?php else : ?>
							<span><a href="<?php echo esc_url(wp_logout_url()); ?> " target="_top"><i class="<?php echo esc_attr($techeduem_opt['techeduem_left_logout_icon']); ?>"></i><?php echo esc_html__('Logout', 'techeduem'); ?></a></span>
						<?php endif; ?>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_left_content_section'] == '6') {
				} else {
				?>
					<div class="header-info">
						<?php if (!empty($techeduem_opt['techeduem_left_contact_info'])) : ?>
							<span><a href="tel:<?php echo esc_html($techeduem_opt['techeduem_left_contact_info']); ?>"> <?php echo esc_html($techeduem_opt['techeduem_left_contact_text']); ?> <?php echo esc_html($techeduem_opt['techeduem_left_contact_info']); ?></a></span>
						<?php endif;
						if (!empty($techeduem_opt['techeduem_left_contact_email'])) : ?>
							<span class="mail-us"><a href="mailto:<?php echo esc_html($techeduem_opt['techeduem_left_contact_email']); ?>" target="_top"> <?php echo esc_html($techeduem_opt['techeduem_left_contact_email']); ?></a></span>
						<?php endif; ?>
					</div>
				<?php
				}
				?>
			</div>
			<div class="col-md-6 col-sm-6">
				<?php $techeduem_opt = techeduem_get_opt();
				if ($techeduem_opt['techeduem_right_contactinfo'] == '1') {
				?>
					<div class="header-social text-right">
						<ul class="header-right-social">
							<?php
							foreach ($techeduem_opt['techeduem_social_icons'] as $key => $value) {
								if ($value != '') {
									if ($key == 'vimeo') {
										echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
									} else {
										echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-' . esc_attr($key) . '"></i></a></li>';
									}
								}
							}
							?>
						</ul>
						<div class="header-info">
							<?php if (!empty($techeduem_opt['techeduem_right_opening_details'])) : ?>
								<span><?php echo esc_html($techeduem_opt['techeduem_right_opening_details']); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_right_contactinfo'] == '2') {
				?>
					<div class="top-bar-left-menu text-right">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'right-menu',
						));
						?>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_right_contactinfo'] == '4') {
				?>
					<div class="top-bar-left-content text-right">
						<p>
							<?php if (isset($techeduem_opt['techeduem_right_text_area']) && $techeduem_opt['techeduem_right_text_area'] != '') {
								echo wp_kses($techeduem_opt['techeduem_right_text_area'], array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
									'img' => array(
										'src' => array(),
										'alt' => array()
									),
								));
							} else {
								esc_html_e('Lorem ipsum dolor sit amet', 'techeduem');
							}
							?>
						</p>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_right_contactinfo'] == '5') {
				?>
					<div class="header-info text-right">
						<?php if (!is_user_logged_in()) : ?>
							<?php if (!empty($techeduem_opt['techeduem_right_login_area'])) : ?>
								<span><a href="<?php echo esc_url(wp_login_url()); ?>"> <i class="<?php echo esc_attr($techeduem_opt['techeduem_right_login_icon']); ?>"></i> <?php echo esc_attr($techeduem_opt['techeduem_right_login_area']); ?></a></span>
							<?php endif;
							if (!empty($techeduem_opt['techeduem_right_register_area'])) : ?>
								<span><a href="<?php echo esc_url(wp_registration_url()); ?> " target="_top"> <i class="<?php echo esc_attr($techeduem_opt['techeduem_right_register_icon']); ?>"></i> <?php echo esc_attr($techeduem_opt['techeduem_right_register_area']); ?></a></span>
							<?php endif; ?>
						<?php else : ?>
							<span><a href="<?php echo esc_url(wp_logout_url()); ?> " target="_top"> <i class="<?php echo esc_html($techeduem_opt['techeduem_right_logout_icon']); ?>"></i> <?php echo esc_html__('Logout', 'techeduem'); ?></a></span>
						<?php endif; ?>
					</div>
				<?php
				} elseif ($techeduem_opt['techeduem_right_contactinfo'] == '6') {
				} else {
				?>
					<div class="header-info text-right">
						<?php if (!empty($techeduem_opt['techeduem_right_contact_info'])) : ?>
							<span><a href="tel:<?php echo esc_html($techeduem_opt['techeduem_right_contact_info']); ?>"> <?php echo esc_html($techeduem_opt['techeduem_right_contact_text']); ?> <?php echo esc_html($techeduem_opt['techeduem_right_contact_info']); ?></a></span>
						<?php endif;
						if (!empty($techeduem_opt['techeduem_right_contact_email'])) : ?>
							<span class="mail-us"><a href="mailto:<?php echo esc_html($techeduem_opt['techeduem_right_contact_email']); ?>" target="_top"> <?php echo esc_html($techeduem_opt['techeduem_right_contact_email']); ?></a></span>
						<?php endif; ?>

					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>