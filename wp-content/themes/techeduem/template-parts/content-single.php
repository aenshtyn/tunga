<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package techeduem
 */

while (have_posts()) : the_post();

    $techeduem_opt = techeduem_get_opt();
    $techeduem_blog_details_social_share = '';
    $techeduem_blog_details_post_navigation = '';
    $techeduem_blog_details_show_author_info = '';
    $techeduem_blog_details_show_related_post = '';
    $techeduem_blog_details_no_of_column_related_post = '';
    $techeduem_blog_details_no_of_column_related_post = '';
    $techeduem_blog_details_no_of_item_per_page = '';
    $techeduem_blog_details_related_post_title = '';

    if (isset($techeduem_opt['techeduem_blog_details_social_share'])) {
        $techeduem_blog_details_social_share = $techeduem_opt['techeduem_blog_details_social_share'];
    }
    if (isset($techeduem_opt['techeduem_blog_details_post_navigation'])) {
        $techeduem_blog_details_post_navigation = $techeduem_opt['techeduem_blog_details_post_navigation'];
    }
    if (isset($techeduem_opt['techeduem_blog_details_show_author_info'])) {
        $techeduem_blog_details_show_author_info = $techeduem_opt['techeduem_blog_details_show_author_info'];
    }
    if (isset($techeduem_opt['techeduem_blog_details_show_related_post'])) {
        $techeduem_blog_details_show_related_post = $techeduem_opt['techeduem_blog_details_show_related_post'];
    }
    if (isset($techeduem_opt['techeduem_blog_details_no_of_column_related_post'])) {
        $techeduem_blog_details_no_of_column_related_post = $techeduem_opt['techeduem_blog_details_no_of_column_related_post'];
    }
    $techeduem_blog_details_no_of_column_related_post_value = (!empty($techeduem_blog_details_no_of_column_related_post)) ? $techeduem_blog_details_no_of_column_related_post : '4';
    if (isset($techeduem_opt['techeduem_blog_details_no_of_item_per_page'])) {
        $techeduem_blog_details_no_of_item_per_page = $techeduem_opt['techeduem_blog_details_no_of_item_per_page'];
    }
    if (isset($techeduem_opt['techeduem_blog_details_related_post_title'])) {
        $techeduem_blog_details_related_post_title = $techeduem_opt['techeduem_blog_details_related_post_title'];
    }

    /**
     * Single post Meta
     */
    $show_single_post_publish_date_meta = (isset($techeduem_opt['techeduem_show_single_post_publish_date_meta'])) ? $techeduem_opt['techeduem_show_single_post_publish_date_meta'] : '';
    $show_single_post_updated_date_meta = (isset($techeduem_opt['techeduem_show_single_post_updated_date_meta'])) ? $techeduem_opt['techeduem_show_single_post_updated_date_meta'] : '';
    $show_single_post_categories_meta = (isset($techeduem_opt['techeduem_show_single_post_categories_meta'])) ? $techeduem_opt['techeduem_show_single_post_categories_meta'] : '';
    $show_single_post_tags_meta = (isset($techeduem_opt['techeduem_show_single_post_tags_meta'])) ? $techeduem_opt['techeduem_show_single_post_tags_meta'] : '';
    $show_single_post_comments_meta = (isset($techeduem_opt['techeduem_show_single_post_comments_meta'])) ? $techeduem_opt['techeduem_show_single_post_comments_meta'] : '';
    $show_single_post_author_meta = (isset($techeduem_opt['techeduem_show_single_post_author_meta'])) ? $techeduem_opt['techeduem_show_single_post_author_meta'] : '';

?>

    <div class="blog-wrapper blog-single">

        <div class="single-blog-item">

            <?php
            $postformate = get_post_format();
            $audio_url = esc_url(get_post_meta(get_the_ID(), '_techeduem_audio_url', true));
            $post_gallerys = get_post_meta(get_the_id(), '_techeduem_gallery_slider', true);
            $video_url = esc_url(get_post_meta(get_the_ID(), '_techeduem_video_url', true));
            $local_video_url = esc_url(get_post_meta(get_the_ID(), '_techeduem_local_video_url', true));
            $quote_cite = get_post_meta(get_the_ID(), '_techeduem_city_text', true);
            ?>

            <!-- Start Thumbnail  -->
            <?php if (has_post_thumbnail() && empty($postformate)) : ?>
                <div class="image">
                    <?php the_post_thumbnail('techeduem_size_870X400'); ?>
                </div>
            <?php endif; ?>
            <!-- End Thumbnail  -->

            <?php if ($postformate == 'video' || $postformate == 'gallery' || $postformate == 'audio' || $postformate == 'link' || $postformate == 'quote') : ?>

                <div class="techeduem-post-media">

                    <!-- Start Audio -->
                    <?php if (!empty($audio_url) && $postformate == 'audio') : ?>
                        <div class="blog-audio embed-responsive embed-responsive-16by9 mb-20">
                            <?php echo wp_oembed_get($audio_url); ?>
                        </div>
                    <?php endif ?>
                    <!-- End Audio -->

                    <!-- Start Video -->
                    <?php if (!empty($video_url) && $postformate == 'video') : ?>
                        <div class="blog-video embed-responsive embed-responsive-16by9 mb-20">
                            <?php echo wp_oembed_get($video_url); ?>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($local_video_url) && $postformate == 'video') : ?>
                        <div class="blog-video embed-responsive embed-responsive-16by9 mb-20">
                            <video width="400" controls>
                                <source src="<?php echo esc_url(get_post_meta(get_the_ID(), '_techeduem_local_video_url', true)); ?>" type="video/mp4">
                                <source src="<?php echo esc_url(get_post_meta(get_the_ID(), '_techeduem_local_video_url', true)); ?>" type="video/ogg">
                            </video>
                        </div>
                    <?php endif ?>
                    <!-- End Video -->

                    <!-- Start Gallery -->
                    <?php if (isset($post_gallerys) && $postformate == 'gallery' && !empty($post_gallerys)) : ?>
                        <div class="blog-gallery owl-carousel mb-20">
                            <?php
                            foreach ($post_gallerys as $post_gallerys_key => $single_gallery_image) :
                                $image_id = techeduem_get_image_id($single_gallery_image);
                            ?>
                                <a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image_id, 'techeduem_size_1140X660'); ?></a>
                            <?php endforeach;

                            ?>
                        </div>
                    <?php endif ?>
                    <!-- End Gallery -->

                    <!--quote Post-->
                    <?php if (isset($quote_cite) && $postformate == 'quote') : ?>
                        <div class="quote-post mb-20">
                            <div class="quote-content">
                                <?php if ('no' != $show_single_post_publish_date_meta) : ?>
                                    <span><?php echo get_the_time(get_option('date_format')); ?></span>
                                <?php endif;
                                if (get_the_title()) : ?>
                                    <h3><?php the_title(); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($quote_cite)) {
                                    echo '<h6>' . esc_html($quote_cite) . '</h6>';
                                } ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <!--quote Post-->

                    <!--Link Post-->
                    <?php if ($postformate == 'link') : ?>
                        <div class="link-post mb-20">
                            <div class="link-content">
                                <?php if ('no' != $show_single_post_publish_date_meta) : ?>
                                    <span><?php echo get_the_time(get_option('date_format')); ?></span>
                                <?php endif;
                                if (get_the_title()) : ?>
                                    <h3><?php the_title(); ?></h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <!--Link Post-->

                </div>

            <?php endif ?>


            <div class="content">

                <?php if ($postformate != 'link') : if ($postformate != 'quote') : ?>

                        <h1 class="title"><?php the_title(); ?></h1>

                        <?php if ('no' != $show_single_post_publish_date_meta || 'no' != $show_single_post_updated_date_meta || 'no' != $show_single_post_author_meta || 'no' != $show_single_post_comments_meta || 'no' != $show_single_post_categories_meta) : ?>

                            <ul class="meta">
                                <?php if ('no' != $show_single_post_author_meta) : ?>
                                    <li><?php echo esc_html__('By:', 'techeduem'); ?> <?php the_author_posts_link(); ?></li>
                                <?php endif ?>

                                <?php if ('no' != $show_single_post_publish_date_meta) : ?>
                                    <li><span><?php echo get_the_time(get_option('date_format')); ?></span></li>
                                <?php endif ?>

                                <?php if ('no' != $show_single_post_updated_date_meta && '' != $show_single_post_updated_date_meta) : ?>
                                    <li><span><?php echo the_modified_time(get_option('date_format')); ?></span></li>
                                <?php endif ?>

                                <?php if ('no' != $show_single_post_comments_meta) : ?>
                                    <li><?php comments_popup_link(esc_html__('No Comments', 'techeduem'), esc_html__('1 Comment', 'techeduem'), esc_html__('% Comments', 'techeduem'), 'post-comment', esc_html__('Comments off', 'techeduem')); ?></li>
                                <?php endif ?>

                                <?php if ('no' != $show_single_post_categories_meta && '' != $show_single_post_categories_meta) : ?>
                                    <li><span class="post-categories"><?php the_category(', '); ?></span></li>
                                <?php endif ?>
                            </ul>

                <?php endif;
                    endif;
                endif; ?>

                <div class="desc entry-content">

                    <?php the_content();
                    wp_link_pages(array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'techeduem') . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'techeduem') . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>

                </div>

                <div class="blog-footer row mt-45">

                    <?php if ('no' != $show_single_post_tags_meta) : ?>
                        <?php if (has_tag()) : ?>
                            <div class="post-tags col-lg-6 col-12 mv-15">
                                <h4><?php esc_html_e('Tags:', 'techeduem'); ?></h4>
                                <?php the_tags('<ul class="tag"><li>', '</li><li>', '</li></ul>'); ?>
                            </div>
                        <?php endif ?>
                    <?php endif; ?>

                    <?php if (true == $techeduem_blog_details_social_share && function_exists('techeduem_sharing_icon_links')) : ?>
                        <div class="post-share col-12 mv-15 <?php if ('no' == $show_single_post_tags_meta) {
                                                                echo 'col-lg-12';
                                                            } else {
                                                                echo 'col-lg-6';
                                                            } ?>">
                            <h4><?php echo esc_html__('Share:', 'techeduem'); ?></h4>
                            <div class="share">
                                <?php techeduem_sharing_icon_links(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if (true == $techeduem_blog_details_post_navigation) {
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                ?>
                    <?php if (!empty($prev_post) || !empty($next_post)) : ?>
                        <div class="next-prev clear">
                            <?php
                            if (!empty($prev_post)) : ?>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="prev-btn"><i class="fa fa-angle-left"></i><?php echo esc_html__('prev post', 'techeduem'); ?></a>
                            <?php endif ?>

                            <?php
                            if (!empty($next_post)) : ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="next-btn"><?php echo esc_html__('next post', 'techeduem'); ?><i class="fa fa-angle-right"></i></a>
                            <?php endif; ?>
                        </div>
                    <?php endif ?>
                <?php } ?>

                <!-- Start Author Info -->
                <?php
                if (true == $techeduem_blog_details_show_author_info) {
                    get_template_part('template-parts/biography');
                }
                ?>
                <!-- End Author Info -->

                <?php if (true == $techeduem_blog_details_show_related_post) { ?>
                    <?php
                    $related = get_posts(array(
                        'category__in' => wp_get_post_categories($post->ID),
                        'numberposts' => $techeduem_blog_details_no_of_item_per_page,
                        'post_type' => 'post',
                        'post__not_in' => array($post->ID)
                    ));
                    ?>
                    <?php if ($related) : ?>
                        <div class="related-post">
                            <h3 class="sidebar-title related-post-title"><?php echo esc_html($techeduem_blog_details_related_post_title); ?></h3>
                            <div class="row">
                                <?php
                                if ($related) foreach ($related as $post) {
                                    setup_postdata($post); ?>
                                    <div class="col-sm-<?php echo esc_attr($techeduem_blog_details_no_of_column_related_post_value); ?>">
                                        <div class="single-related-post mrg-btm">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('techeduem_size_300X300');  ?>
                                                </a>
                                            <?php endif; ?>

                                            <div class="related-post-title">
                                                <h3 class="related-post-header-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <span><?php echo get_the_time(get_option('date_format')); ?></span>
                                            </div>

                                        </div>
                                    </div>
                                <?php }
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif ?>
                <?php } ?>

            </div>

        </div>

        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    </div>
<?php endwhile; // End of the loop.
?>