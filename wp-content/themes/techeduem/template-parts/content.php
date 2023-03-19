<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

$techeduem_opt = techeduem_get_opt();
$techeduem_blog_layout_opts = '';

if (isset($techeduem_opt['techeduem_sidebarblog_pos'])) {
	$techeduem_blog_layout_opts = $techeduem_opt['techeduem_sidebarblog_pos'];
}

if (isset($_GET['layout'])) {
	$techeduem_blog_layout_opts = htmlspecialchars($_GET['layout']);
} else {
	$techeduem_blog_layout_opts = $techeduem_blog_layout_opts;
}

if ($techeduem_blog_layout_opts == 'single') {
	if (have_posts()) :

		/* Start the Loop */
		while (have_posts()) : the_post();
?>
			<!---full width-->
			<div class="col-md-10 mb-40 ml-auto mr-auto">
				<?php get_template_part('template-parts/formats/content', get_post_format()); ?>
			</div>
		<?php
		endwhile; /* End Loop */ ?>
		<div class="col-md-10 offset-md-1 mt-3"><?php techeduem_blog_pagination(); ?></div>

		<?php
	endif;
} elseif ($techeduem_blog_layout_opts == 'twocolumn') {

	if (have_posts()) :
		/* Start the Loop */
		while (have_posts()) : the_post();
		?>
			<!---2 column width-->
			<div class="col-lg-6 col-md-6 col-sm-6 mb-40">
				<?php get_template_part('template-parts/formats/content', get_post_format()); ?>
			</div>
	<?php
		endwhile;/* End Loop */
	endif;
	?>
	<div class="col-md-12 text-center">
		<?php techeduem_blog_pagination(); ?>
	</div>
	<?php } elseif ($techeduem_blog_layout_opts == 'threecolumn') {

	if (have_posts()) :
		/* Start the Loop */
		while (have_posts()) : the_post(); ?>
			<!---3 column width-->
			<div class="col-lg-4 col-md-4 col-sm-6 mb-40">
				<?php get_template_part('template-parts/formats/content', get_post_format()); ?>
			</div>
	<?php
		endwhile;/* End Loop */
	endif;
	?>
	<div class="col-md-12 text-center">
		<?php techeduem_blog_pagination(); ?>
	</div>
<?php } elseif ($techeduem_blog_layout_opts == 'left') { ?>
	<!---left sidebar-->
	<?php if (is_active_sidebar('sidebar-left')) { ?>
		<div class="col-lg-3 col-12">
			<?php get_sidebar('left'); ?>
		</div>
	<?php } ?>

	<div class="<?php if (!is_active_sidebar('sidebar-left')) {
								echo 'col-md-12';
							} else {
								echo 'col-lg-9 col-12 mb-40';
							} ?>">
		<?php
		if (have_posts()) :
			echo '<div class="row">';
			/* Start the Loop */
			while (have_posts()) : the_post();
		?>
				<div class="col-md-6 col-12 mb-40">
					<?php get_template_part('template-parts/formats/content', get_post_format()); ?>
				</div>
		<?php
			endwhile;/* End Loop */
			echo '</div>';
		endif;
		?>
		<div class="col-md-12 text-center">
			<?php techeduem_blog_pagination(); ?>
		</div>
	</div>
<?php } elseif ($techeduem_blog_layout_opts == 'creative') { ?>
	<div class="col-lg-12 col-md-12">
		<div class="row blog-masonry clearfix">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();

					get_template_part('template-parts/content-creative');

				endwhile;/* End Loop */
			endif;
			?>
		</div>
		<?php techeduem_blog_pagination(); ?>
	</div>

<?php } elseif ($techeduem_blog_layout_opts == 'left_image') { ?>
	<div class="offset-md-1 col-md-10">
		<div class="row">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();

					get_template_part('template-parts/content-left-image');

				endwhile;/* End Loop */
			endif;
			?>
		</div>
		<?php techeduem_blog_pagination(); ?>
	</div>

<?php } elseif ($techeduem_blog_layout_opts == 'masonry4') { ?>
	<div class="col-md-12 col-lg-12">
		<div class="row blog-masonry clearfix">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();
			?> <div class="col-md-3 grid-item mb-40"> <?php
																								get_template_part('template-parts/formats/content', get_post_format());
																								?> </div> <?php
							endwhile;/* End Loop */
						endif;
								?>
		</div>
		<?php techeduem_blog_pagination(); ?>
	</div>

<?php } elseif ($techeduem_blog_layout_opts == 'masonry3') { ?>
	<div class="col-md-12 col-lg-12">
		<div class="row blog-masonry clearfix">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();
			?> <div class="col-md-4 grid-item mb-40"> <?php
																								get_template_part('template-parts/formats/content', get_post_format());
																								?> </div> <?php
							endwhile;/* End Loop */
						endif;
								?>
		</div>
		<?php techeduem_blog_pagination(); ?>
	</div>

<?php } elseif ($techeduem_blog_layout_opts == 'masonry2') { ?>
	<div class="col-md-12 col-lg-12">
		<div class="row blog-masonry clearfix">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();
			?> <div class="col-md-6 grid-item mb-40"> <?php
																								get_template_part('template-parts/formats/content', get_post_format());
																								?> </div> <?php
							endwhile;/* End Loop */
						endif;
								?>
		</div>
		<?php techeduem_blog_pagination(); ?>
	</div>

<?php } else { ?>
	<!---right sidebar-->
	<div class="<?php if (!is_active_sidebar('sidebar-right')) {
								echo 'col-md-12';
							} else {
								echo 'col-lg-9 col-12 mb-40';
							} ?>">
		<?php
		if (have_posts()) :
			echo '<div class="row blog-masonry clearfix">';
			/* Start the Loop */
			while (have_posts()) : the_post();
		?>
				<div class="col-md-6 col-12 mb-40 grid-item">
					<?php get_template_part('template-parts/formats/content', get_post_format()); ?>
				</div>
		<?php
			endwhile;/* End Loop */
			echo '</div>';
		endif;
		?>
		<div class="col-md-12 text-center">
			<?php techeduem_blog_pagination(); ?>
		</div>
	</div>

	<?php if (is_active_sidebar('sidebar-right')) { ?>
		<div class="col-lg-3 col-12">
			<?php get_sidebar('right'); ?>
		</div>
	<?php } ?>

<?php
} ?>