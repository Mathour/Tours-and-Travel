<?php

/**
 * The template for displaying default posts archive
 */

get_header();
?>
<div class="banner">
    <div class="banner-img">
        <img src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/blogs.jpg", 'http'); ?>" alt="featured" class="img-fluid">
        <div class="page-title">
            <h1> Blogs, News & Updates </h1>
        </div>
    </div>
</div>

<section class="page-wrap">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('blog-sidebar')) { ?>
                <div class="col-lg-9">
                    <?php get_template_part('includes/section', 'archive'); ?>
                </div>
                <div class="col-lg-3">
                    <div class="blog-side-bar">
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12">
                    <?php get_template_part('includes/section', 'archive'); ?>
                </div>
            <?php } ?>
        </div>

        <?php /*adding pagination*/
        global $wp_query;
        $big = 99999;
        //adding pagination
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'formate' => '?paged=%#%',
            'current' => '', max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
        ?>
        <?php wp_link_pages(); ?>
    </div>
</section>

<?php
get_footer();
?>