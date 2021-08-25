<?php
get_header();
?>

<?php echo do_shortcode('[banner_title]'); ?>

<section class="page-wrap">
    <?php if (is_active_sidebar('page-sidebar')) { ?>
        <div class="container">
            <div class="row">
                <div class="col-xm-12 col-sm-7 col-md-9">
                    <?php get_template_part('includes/section', 'content'); ?>
                </div>
                <div class="col-xm-12 col-sm-5 col-md-3">
                    <?php dynamic_sidebar('page-sidebar'); ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php get_template_part('includes/section', 'content'); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>

<?php
get_footer();
?>