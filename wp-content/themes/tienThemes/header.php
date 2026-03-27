<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper">
        <header id="header">
            <div class="container d-flex">
                <div id="header-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-header.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="flogo" />
                    </a>
                </div>

                <div class="header-center d-flex align-center">
                    <nav>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'header-menu d-flex',
                            'fallback_cb'    => '__return_false',
                        ));
                        ?>
                    </nav>
                    <span class="header-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>

                <div class="header-right">
                    <a href="#" class="button">Become a Member</a>
                    <div class="mobile">
                        <span class="header-search search-mobile">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <span class="bars">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </div>
                </div>

                <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="form-search">
                    <input type="search" name="s" id="search-input" placeholder="Search..." value="<?php echo get_search_query(); ?>" />
                    <span type="button" class="close-search">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </form>

                <div class="backdrop">
                    <div class="backdrop-container">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'mobile-menu',
                            'container'      => false,
                            'menu_class'     => 'list-backdrop',
                        ));
                        ?>
                    </div>
                    <div class="box-button">
                        <a href="#" class="button">Become a Member</a>
                    </div>
                </div>
            </div>
    </div>
    </header>