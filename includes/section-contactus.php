<div class="row p-2">
    <div class="col-md-6 col-sm-12">
        <?php
        $location = get_field('location_map');
        if ($location) : ?>
            <div class="acf-map" data-zoom="16">
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6 col-sm-12">
        <?php
        $heading = get_field('heading');
        $office_heading = get_field('head_office_heading');
        $branch_heading = get_field('branch_office_heading');
        $head_details = get_field('head_office_details');
        $branch_details = get_field('branch_office_details');
        $social_links = get_field('social_icons');
        ?>
        <?php
        if ($heading) : ?>
            <h2 class="cp-heading"><?php echo $heading; ?></h2>
            <hr style="color:grey; height:2px;">
        <?php endif; ?>
        <?php
        if ($office_heading) : ?>
            <h3 class="cp-subheading"><?php echo $office_heading; ?></h3>
        <?php endif; ?>
        <?php
        if ($head_details) : ?>
            <p class="cp-details"><?php echo $head_details; ?></p>
        <?php endif; ?>
        <?php
        if ($branch_heading) : ?>
            <h3 class="cp-subheading"><?php echo $branch_heading; ?></h3>
        <?php endif; ?>
        <?php
        if ($branch_details) : ?>
            <p class="cp-details"><?php echo $branch_details; ?></p>
        <?php endif; ?>
        <?php
        if ($social_links) : ?>
            <div class="cp-social-icons">
                <?php echo $social_links; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
$c_form = get_field('form_shortcode');
if ($c_form) :
?>
    <div class="row mt-2">
        <div class="col">
            <h2 class="cp-heading" style="padding-left: 1rem;">Send Your Inquiry</h2>
            <hr style="color:grey; height:2px;">
            <div class="form-box">
                <?php echo do_shortcode($c_form); ?>
            </div>
        </div>
    </div>
<?php endif; ?>