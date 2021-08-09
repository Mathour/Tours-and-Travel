<?php
get_header();
?>
<div class="banner">
    <div class="banner-img">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="featured" class="img-fluid">
        <?php endif; ?>
        <div class="page-title">
            <h1> <?php the_title(); ?> </h1>
            <!-- <h5 class="page_subtitle"> This is Subtitle </h5> -->
        </div>
    </div>
</div>
<section class="page-wrap">
    <?php if (is_active_sidebar('page-sidebar')) { ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="container">
                    <?php get_template_part('includes/section', 'content'); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container">
                    <?php dynamic_sidebar('page-sidebar'); ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <?php get_template_part('includes/section', 'content'); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>

<?php
get_footer();
?>