<?php
/*
Template Name: Tour Search
*/
?>

<?php get_header(); ?>
<?php echo do_shortcode('[tour_search]') ?>
<?php
$is_search = true;
if ($_GET['keyword'] == '' && $_GET['category'] == '' && $_GET['destination'] == '') {
    $is_search = false;
}

if ($is_search) {
    $query = tour_seacrh_query();
}
?>

<?php if ($is_search) : ?>
    <div class="container">
        <div class="row mt-2 mb-2">
            <?php if ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="card-img-top">
                        <div class="card-body">
                            <a href="<?php the_permalink(); ?>">
                                <h5 class=" card-title"><?php the_title(); ?></h5>
                            </a>
                            <p class="card-text"><?php the_field('overview'); ?></p>
                            <hr>
                            <div class="d-flex bd-highlight">
                                <?php $itinaryCount = get_itinary_count("itinerary");
                                if ($itinaryCount > 0) : ?>
                                    <div class="me-auto p-2 bd-highlight">
                                        <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/24-hours.svg", 'http'); ?>">
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
                                    <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/boat.svg", 'http'); ?>">
                                </div>
                                <div class="p-2 bd-highlight">
                                    <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/camping.svg", 'http'); ?>">
                                </div>
                                <div class="p-2 bd-highlight">
                                    <img class="card-icon" src="<?php echo site_url("/wp-content/themes/Hunza Discovery/images/icons/hiking.svg", 'http'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-danger mt-2">
        No results for the given input
    </div>
<?php endif; ?>
<?php else : ?>
    <div class="alert alert-danger mt-2">
        No search criteria given
    </div>
<?php endif; ?>
<?php get_footer(); ?>