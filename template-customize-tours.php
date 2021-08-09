<?php

/**
 * Template Name: Customize Tour
 * The template for displaying archive posts
 */

get_header();
?>

<?php echo do_shortcode('[banner_title]'); ?>

<section class="page-wrap">
    <div class="container">
        <div class="form-title">
            <h3> <?php echo "Design Your Own Tour"; ?> </h3>
        </div>
        <hr style="color: gray; height: 2px; margin: 0 1rem 0 1rem;">
        <div class="row form-box">
            <?php echo do_shortcode('[advanced_form form="form_6108edf057df5"]'); ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>