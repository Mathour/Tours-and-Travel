<?php

/**
 * Template Name: Front Page
 * The template for displaying front page
 */

get_header();
?>

<div class="banner">
    <div class="banner-img">
        <?php if (has_post_thumbnail()): ?>
        <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="featured" class="img-fluid">
        <?php endif; ?>
    </div>
</div>

<section class="page-wrap">
    <div class="container">
        <div class="content">
            <?php get_template_part('includes/section', 'content'); ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>