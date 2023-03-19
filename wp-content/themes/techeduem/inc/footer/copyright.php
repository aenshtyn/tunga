<?php
$techeduem_opt = techeduem_get_opt();
$column = '';
if ($techeduem_opt['techeduem_copyright_column'] == '1') {
	$column = 12 . ' text-center';
} elseif ($techeduem_opt['techeduem_copyright_column'] == '3') {
	$column = 4;
} else {
	$column = 6;
}
?>

<div class="col-sm-<?php echo esc_attr($column); ?> col-xs-12">
	<div class="copyright-text">
		<p><?php
				$techeduem_opt = techeduem_get_opt();
				if (isset($techeduem_opt['techeduem_copyright']) && $techeduem_opt['techeduem_copyright'] !== '') {
					echo wp_kses($techeduem_opt['techeduem_copyright'], array(
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
					esc_html_e('Copyright', 'techeduem'); ?>&copy;
		<?php echo date("Y") . ' ' . get_bloginfo('name');
					esc_html_e(' All Rights Reserved.', 'techeduem');
				}
		?>
		</p>
	</div>
</div>