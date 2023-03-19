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
	<div class="footer-copyright-menu">

		<?php wp_nav_menu(array(
			'theme_location' => 'copyright-menu',
			'container'      => false,
		)); ?>
	</div>
</div>