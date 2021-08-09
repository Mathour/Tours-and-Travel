<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR3ou6f5A3xNlD_n0No12wi5XLtbHxNFQ"></script>
</head>

<body>

    <?php wp_head(); ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo site_url("/wp-content/uploads/2021/06/Logo-Transp.png", 'http'); ?>">
                    </a>
                </div>
                <div class="col-md-7">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu',
                            'menu_class' => 'nav-menu',
                        )
                    )
                    ?>
                </div>
                <div class="col-md-3 top-bar-socials">
                    <?php
                    if (is_active_sidebar('navbar-social-icon')) :
                        dynamic_sidebar('navbar-social-icon');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </header>