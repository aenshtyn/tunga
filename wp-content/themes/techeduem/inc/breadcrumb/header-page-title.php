<?php

/**
 * This partial is used for displaying the Site Header when in archive pages
 *
 * @package techeduem
 * @since techeduem 1.0.0
 */
global $techeduem_opt;

$techeduem_page_titlebar = get_post_meta(get_the_id(), '_techeduem_page_titlebar_enable', true);

if (is_home()) :
	if ($techeduem_opt['techeduem_bolg_title_bar'] == true || $techeduem_opt['techeduem_bolg_title_bar'] == '') :
?>
		<section class="breadcrumbs-area bredcrumb-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-text">
							<h1><?php techeduem_blog_header(); ?></h1>
							<?php
							if (!empty($techeduem_opt['techeduem_bolg_subtitle'])) :
							?>
								<h3><?php echo  esc_html($techeduem_opt['techeduem_bolg_subtitle']); ?></h3>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php
	endif;

elseif (!is_front_page() && is_page()) :
	if ($techeduem_page_titlebar == 'yes' || $techeduem_page_titlebar == '') :
		get_template_part('/inc/breadcrumb/pagetitle');
	endif;

//archive page
elseif (is_archive()) :
	get_template_part('/inc/breadcrumb/pagetitle');

elseif (is_single()) :
	if ($techeduem_page_titlebar == 'yes' || $techeduem_page_titlebar == '') :
		get_template_part('/inc/breadcrumb/pagetitle');
	endif;
//404 page --->
elseif (is_404()) :
	get_template_part('/inc/breadcrumb/pagetitle');
//search page--->
elseif (is_search()) :
	get_template_part('/inc/breadcrumb/pagetitle');
else :
endif;
