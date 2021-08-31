<?php
/* Template for tours shortcode on front page*/
$args = [
    'post_type' => 'tours',
    'posts_per_page' => 3,
    'meta_key' => 'featured_tour',
    'meta_query' => array(
        array(
            'key' => 'featured_tour',
            'value' => true,
            'type' => 'BOOLEAN',
        ),
    )
];

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-3">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="post thumbnail">
                        <div class="card-body">
                            <a href="<?php the_permalink(); ?>">
                                <h5 class=" card-title"><?php the_title(); ?></h5>
                            </a>
                            <div class="card-text">
                                <p><?php
                                    $ov = get_field('overview');
                                    if (strlen($ov) > 150) {
                                        $short_desc = substr($ov, 0, 149);
                                        echo $short_desc . "...";
                                    } else {
                                        echo $ov;
                                    } ?>
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex bd-highlight">
                                <?php $itinaryCount = get_itinary_count("itinerary"); ?>
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
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>