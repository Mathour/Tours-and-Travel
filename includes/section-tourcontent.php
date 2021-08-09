<div class="d-flex justify-content-center tax-row">
    <div class="d-inline-flex tour-taxonomies">
        <div class="border-right">
            <i class="bi bi-calendar-plus"></i><br>
            <h5> No of days </h5>
            <p> <?php echo get_itinary_count("itinerary"); ?> </p>
        </div>
    </div>
    <div class="d-inline-flex tour-taxonomies">
        <div class="border-right">
            <i class="bi bi-bar-chart"></i><br>
            <h5> Challenging? </h5>
            <ul class="tour-tax-ul">
                <?php foreach (get_the_terms(get_the_ID(), 'challenging-levels') as $cl) : ?>
                    <li> <?php echo  __($cl->name); ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="d-inline-flex tour-taxonomies">
        <div class="border-right">
            <i class="bi bi-map"></i><br>
            <h5> Destinations </h5>
            <ul class="tour-tax-ul">
                <?php foreach (get_the_terms(get_the_ID(), 'destinations') as $dest) : ?>
                    <li> <?php echo  __($dest->name); ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="d-inline-flex tour-taxonomies">
        <div class="border-right">
            <i class="bi bi-diagram-2-fill"></i><br>
            <h5> Category </h5>
            <ul class="tour-tax-ul">
                <?php foreach (get_the_terms(get_the_ID(), 'tour-categories') as $tax) : ?>
                    <li> <?php echo  __($tax->name); ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="d-inline-flex tour-taxonomies">
        <div class="border-right" style="border-right: none !important;">
            <i class="bi bi-triangle-half"></i><br>
            <h5> Activities </h5>
            <ul class="tour-tax-ul">
                <?php foreach (get_the_terms(get_the_ID(), 'activites') as $act) : ?>
                    <li> <?php echo  __($act->name); ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex details-row">
    <div class="col-lg-3 tabs-col">
        <div class="nav flex-column nav-pills tab-titles" id="tour-tab" role="tablist" aria-orientation="vertical">
            <?php if (get_field('overview') || get_field('whats_included_in_this_tour') || get_field('whats_not_included_in_this_tour')) : $tab_view = "ov"; ?>
                <button class="nav-link active mb-1" id="tour-overview-tab" data-bs-toggle="pill" data-bs-target="#tour-overview" type="button" role="tab" aria-controls="tour-overview" aria-selected="true">Overview</button>
            <?php endif; ?>
            <?php if (get_field('dos_and_donts')) : $tab_view = "es" ?>
                <button class="nav-link mb-1" id="tour-essintial-info-tab" data-bs-toggle="pill" data-bs-target="#tour-essintial-info" type="button" role="tab" aria-controls="tour-essintial-info" aria-selected="false">Essential Information</button>
            <?php endif; ?>
            <?php if (get_field('itinerary')) : ?>
                <button class="nav-link mb-1" id="tour-itinerary-tab" data-bs-toggle="pill" data-bs-target="#tour-itinerary" type="button" role="tab" aria-controls="tour-itinerary" aria-selected="false">Itinerary</button>
            <?php endif; ?>
            <?php if (get_field('tour_map')) : ?>
                <button class="nav-link mb-1" id="tour-map-tab" data-bs-toggle="pill" data-bs-target="#tour-map" type="button" role="tab" aria-controls="tour-map" aria-selected="false">Map</button>
            <?php endif; ?>
            <?php if (get_field('tour_gallery')) : ?>
                <button class="nav-link mb-1" id="tour-gallery-tab" data-bs-toggle="pill" data-bs-target="#tour-gallery" type="button" role="tab" aria-controls="tour-gallery" aria-selected="false">Gallery</button>
            <?php endif; ?>
            <?php if (get_field('dates') || get_field('date_to') || get_field('prices')) : ?>
                <button class="nav-link mb-1" id="tour-dnt-tab" data-bs-toggle="pill" data-bs-target="#tour-dnt" type="button" role="tab" aria-controls="tour-dnt" aria-selected="false">Dates & Prices</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-9 tab-content-col">
        <div class="tab-content" id="tour-tabContent">
            <div class="tab-pane fade show active" id="tour-overview" role="tabpanel" aria-labelledby="tour-overview-tab">
                <div class="row">
                    <div class="col-lg-12 p-1">
                        <div class="bg-white" style="min-height: 140px;">
                            <?php the_field('overview'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1 pdr">
                        <div class="bg-white" style="min-height: 140px;">
                            <?php the_field('whats_included_in_this_tour'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1 pdl">
                        <div class="bg-white" style="min-height: 140px;">
                            <?php the_field('whats_not_included_in_this_tour'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" tab-pane fade" id="tour-essintial-info" role="tabpanel" aria-labelledby="tour-essintial-info-tab">
                <div class="bg-white">
                    <?php the_field('dos_and_donts'); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="tour-itinerary" role="tabpanel" aria-labelledby="tour-itinerary-tab">
                <?php
                // Check rows exists.
                if (have_rows('itinerary')) :
                    // Loop through rows.
                    while (have_rows('itinerary')) : the_row();
                        // Load sub field value.
                        $i_lable = get_sub_field('label');
                        $i_title = get_sub_field('title');
                        $i_description = get_sub_field('description'); ?>
                        <div class="row">
                            <div class="col-lg-3 mb-1 pdr">
                                <div class="bg-white">
                                    <h3> <?php echo $i_lable; ?> </h3>
                                </div>
                            </div>
                            <div class="col-lg-9 mb-1 pdl">
                                <div class="bg-white">
                                    <h3> <?php echo $i_title; ?> </h3>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="bg-white">
                                    <?php echo $i_description; ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>

            </div>
            <div class="tab-pane fade" id="tour-map" role="tabpanel" aria-labelledby="tour-map-tab">
                <div class="bg-white">
                    <?php
                    $location = get_field('tour_map');
                    if ($location) : ?>
                        <div class="acf-map" data-zoom="16">
                            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="tour-gallery" role="tabpanel" aria-labelledby="tour-gallery-tab">
                <div class="bg-white">
                    <?php
                    $images = get_field('tour_gallery');
                    if ($images) : ?>
                        <ul>
                            <?php foreach ($images as $image) : ?>
                                <li>
                                    <a href="<?php echo esc_url($image['url']); ?>">
                                        <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                    <p><?php echo esc_html($image['caption']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="tour-dnt" role="tabpanel" aria-labelledby="tour-dnt-tab">
                <div class="row">
                    <div class="col-lg-12 p-1">
                        <div class="bg-white">
                            <?php the_field('prices'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1 pdr">
                        <div class="bg-white">
                            <?php the_field('dates'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1 pdl">
                        <div class="bg-white">
                            <?php the_field('date_to'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //Tour Inquiry form section 
?>
<section class="tour-inquiry mt-2">
    <h5>INQUIRY ABOUT <?php the_title()?></h5>
    <hr style="height: 2px; color:$secondary">
    <?php get_template_part('includes/section', 'tourinquiry'); ?>
</section>