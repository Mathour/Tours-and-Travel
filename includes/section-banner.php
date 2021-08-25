<div class="banner">
    <div class="banner-img">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="featured">
        <?php endif; ?>
        <div class="page-title">
            <h1> <?php the_title(); ?> </h1>
            <!-- <h5 class="page_subtitle"> This is Subtitle </h5> -->
        </div>
    </div>
</div>