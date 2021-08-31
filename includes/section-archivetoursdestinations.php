<?php
global $wp;
$url = home_url($wp->request);
$link_array = explode('/', $url);
$slug = end($link_array);
$dest_title = ucwords(str_replace("-", " ", $slug), "");
$query = tour_destination_query($slug);
?>
<div class="row">
    <div class="col">
        <div class="category-title">
            <h2 class="category-name"> Tours in <?php echo $dest_title; ?> </h2>
        </div>
        <hr>
    </div>
</div>
<div class="row mb-3 p-2">
    <?php if ($query->have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="card-img-top">
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class=" card-title"><?php the_title(); ?></h5>
                        </a>
                        <p class="card-text">
                            <?php
                            $ov = get_field('overview');
                            if (strlen($ov) > 150) {
                                $short_desc = substr($ov, 0, 149);
                                echo $short_desc . "...";
                            } else {
                                echo $ov;
                            } ?>
                        </p>
                        <hr>
                        <div class="d-flex bd-highlight">
                            <?php $itinaryCount = get_itinary_count("itinerary");
                            if ($itinaryCount > 0) : ?>
                                <div class="me-auto p-2 bd-highlight">
                                    <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza-Discovery/images/icons/24-hours.svg", 'http'); ?>">
                                    <!-- <i class="bi bi-calendar3-range"></i> -->
                                    <?php echo $itinaryCount;
                                    if ($itinaryCount > 1) : ?>
                                        Days
                                    <?php else : ?>
                                        Day
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="p-2 bd-highlight">
                                <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza-Discovery/images/icons/boat.svg", 'http'); ?>">
                            </div>
                            <div class="p-2 bd-highlight">
                                <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza-Discovery/images/icons/camping.svg", 'http'); ?>">
                            </div>
                            <div class="p-2 bd-highlight">
                                <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza-Discovery/images/icons/hiking.svg", 'http'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</div>
<?php if (($query->post_count) > 3) : ?>
    <div class="d-grid gap-2 mt-3">
        <a class="btn btn-primary btn-sm" href="<?php echo get_home_url(null, "/tour-categories/" . $category->slug); ?>" role="button"> Load More.. </a>
    </div>
<?php endif; ?>