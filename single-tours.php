<?php
//Page hearder
get_header();
?>

<?php //Banner Section 
?>
<div class="tour-banner">
    <div class="banner-img">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="featured" class="img-fluid">
        <?php endif; ?>
        <div class="page-title">
            <h1> <?php the_title(); ?> </h1>
            <h5 class="page_subtitle"> This is Subtitle </h5>
        </div>
    </div>
</div>

<?php //Tour Content Section 
?>
<section class="tour-wrap">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('tour-sidebar')) { ?>
                <div class="col-lg-9">
                    <?php get_template_part('includes/section', 'tourcontent'); ?>
                </div>
                <div class="col-lg-3">
                    <div class="side-bar">
                        <?php dynamic_sidebar('tour-sidebar'); ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12">
                    <?php get_template_part('includes/section', 'tourcontent'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php //Similar tours section ?>
<section class="similar-tours">
    <?php get_template_part('includes/section', 'similartours'); ?>
</section>

<?php
// Post Tags
$tags = get_the_tags();
if (is_array($tags) || is_object($tags)) {
    foreach ($tags as $tag) : ?>
        <a href="<?php echo get_the_tags_link($tag->term_id); ?>" style="display: none;">
            <?php echo $tag->name; ?>
        </a>
<?php endforeach;
} ?>

<?php
//Footer
get_footer();
?>