<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR3ou6f5A3xNlD_n0No12wi5XLtbHxNFQ"></script>
</head>

<body>

    <?php wp_head(); ?>

    <header>
        <article>
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo site_url("/wp-content/uploads/2021/06/Logo-Transp.png", 'http'); ?>">
                </a>
            </div>
        </article>
        <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button id="menu-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'hunza-discovery'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'main-menu',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </nav>
        <aside>
            <div class="top-bar-socials">
                <?php
                if (is_active_sidebar('navbar-social-icon')) :
                    dynamic_sidebar('navbar-social-icon');
                endif;
                ?>
            </div>
        </aside>
    </header>