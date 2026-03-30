<?php

/**
 * TienThemes Theme Functions
 * 
 * Documentation: https://developer.wordpress.org/themes/
 */

// Define theme constants
define('TIENTHEMES_VERSION', '1.0.0');
define('TIENTHEMES_DIR', get_template_directory());
define('TIENTHEMES_URI', get_template_directory_uri());

/**
 * 1. TEXT DOMAIN - Essential for Translations
 * Allows the theme to support different languages
 */
function tienthemes_load_textdomain()
{
    load_theme_textdomain('tienthemes', TIENTHEMES_DIR . '/languages');
}
add_action('after_setup_theme', 'tienthemes_load_textdomain');

/**
 * 2. SETUP THEME FEATURES
 */
function tienthemes_theme_setup()
{
    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Add support for title tag
    add_theme_support('title-tag');

    // Add HTML5 support for better markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
}
add_action('after_setup_theme', 'tienthemes_theme_setup');

/**
 * 3. REGISTER NAVIGATION MENUS
 * Learn about: https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function tienthemes_register_menus()
{
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'tienthemes'),
        'mobile-menu'  => __('Mobile Menu', 'tienthemes'),
        'footer-menu'  => __('Footer Menu', 'tienthemes'),
    ));
}
add_action('init', 'tienthemes_register_menus');

/**
 * 4. ENQUEUE SCRIPTS & STYLES
 * Learn about: https://developer.wordpress.org/themes/basics/including-css-javascript/
 */
function tienthemes_enqueue_assets()
{
    // Styles
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        TIENTHEMES_VERSION
    );

    wp_enqueue_style(
        'fontawesome',
        TIENTHEMES_URI . '/assets/fontawesome/css/all.css',
        array(),
        '6.0.0'
    );

    wp_enqueue_style(
        'global-style',
        TIENTHEMES_URI . '/assets/css/base/global.css',
        array(),
        TIENTHEMES_VERSION
    );
    //===add section styles===//
    //  markets //
    wp_enqueue_style(
        'market-style',
        TIENTHEMES_URI . '/assets/css/section/market.css',
        array(),
        TIENTHEMES_VERSION
    );
    //  membership //
    wp_enqueue_style(
        'membership-style',
        TIENTHEMES_URI . '/assets/css/section/membership.css',
        array(),
        TIENTHEMES_VERSION
    );
    //  solution //
    wp_enqueue_style(
        'solution-style',
        TIENTHEMES_URI . '/assets/css/section/solution.css',
        array(),
        TIENTHEMES_VERSION
    );
    // events //
    wp_enqueue_style(
        'events-style',
        TIENTHEMES_URI . '/assets/css/section/events.css',
        array(),
        TIENTHEMES_VERSION
    );
    wp_enqueue_style(
        'header-style',
        TIENTHEMES_URI . '/assets/css/section/header.css',
        array(),
        TIENTHEMES_VERSION
    );
    wp_enqueue_style(
        'footer-style',
        TIENTHEMES_URI . '/assets/css/section/footer.css',
        array(),
        TIENTHEMES_VERSION
    );

    wp_enqueue_style(
        'assets-style',
        TIENTHEMES_URI . '/assets/style.css',
        array(),
        TIENTHEMES_VERSION
    );
    wp_enqueue_style(
        'partner-style',
        TIENTHEMES_URI . '/assets/partner.css',
        array(),
        TIENTHEMES_VERSION
    );

    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css',
        array(),
        '12.0.0'
    );

    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array(),
        TIENTHEMES_VERSION
    );

    // Scripts
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
        array(),
        '12.0.0',
        true
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'tienthemes-main',
        TIENTHEMES_URI . '/assets/js/main.js',
        array('jquery', 'swiper-js'),
        TIENTHEMES_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'tienthemes_enqueue_assets');

/**
 * 5. CUSTOMIZER SETTINGS - For Social Links & Other Options
 * Learn about: https://developer.wordpress.org/themes/customize-api/
 * How to use: Appearance > Customize in admin panel
 */
function tienthemes_customize_register($wp_customize)
{
    // Create a new section for social links
    $wp_customize->add_section('tienthemes_social_section', array(
        'title'       => __('Social Links', 'tienthemes'),
        'priority'    => 30,
        'description' => __('Configure social media links that appear in the footer', 'tienthemes'),
    ));

    // LinkedIn URL setting
    $wp_customize->add_setting('tienthemes_linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'type'              => 'theme_mod',
    ));

    $wp_customize->add_control('tienthemes_linkedin_url', array(
        'label'       => __('LinkedIn URL', 'tienthemes'),
        'section'     => 'tienthemes_social_section',
        'type'        => 'url',
        'description' => __('Enter your LinkedIn profile URL', 'tienthemes'),
    ));

    // Twitter URL setting
    $wp_customize->add_setting('tienthemes_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'type'              => 'theme_mod',
    ));

    $wp_customize->add_control('tienthemes_twitter_url', array(
        'label'       => __('Twitter URL', 'tienthemes'),
        'section'     => 'tienthemes_social_section',
        'type'        => 'url',
        'description' => __('Enter your Twitter/X profile URL', 'tienthemes'),
    ));
}
add_action('customize_register', 'tienthemes_customize_register');

/**
 * 6. HELPER FUNCTIONS
 */

/**
 * Get template directory URI safely
 * 
 * @return string Theme URI
 * 
 * @example:
 * // In template: 
 * <img src="<?php echo esc_url(tienthemes_get_asset_url('img/logo.png')); ?>" alt="Logo" />
 */
function tienthemes_get_asset_url($path = '')
{
    return TIENTHEMES_URI . '/assets/' . ltrim($path, '/');
}

/**
 * Check if we're on a specific page
 * 
 * @param string $page_slug The page slug to check
 * @return bool Whether current page matches the slug
 * 
 * @example:
 * <?php if (tienthemes_is_page('about')) { echo 'About page'; } ?>
 */
function tienthemes_is_page($page_slug)
{
    return is_page($page_slug);
}


function tienthemes_events_shortcode()
{
    ob_start();
    get_template_part('template-parts/section/events');
    return ob_get_clean();
}
add_shortcode('tienthemes_events', 'tienthemes_events_shortcode');


function tienthemes_LaunchpadResource_shortcode()
{
    ob_start();
    get_template_part('template-parts/launchpad/resources');
    return ob_get_clean();
}
add_shortcode('tienthemes_LaunchpadResource', 'tienthemes_LaunchpadResource_shortcode');





function tienthemes_get_posts_data($args = [])
{
    $args = wp_parse_args($args, [
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',

        // category đơn giản
        'categories'     => [],
        'category_mode'  => 'or', // or | and

        // tax_query nâng cao truyền từ ngoài vào
        'tax_query'      => [],

        // config giao diện
        'config'         => [],
    ]);

    $config = wp_parse_args($args['config'], [
        'show_categories' => false,
        'show_desc'       => false,
    ]);

    $query_args = [
        'post_type'           => $args['post_type'],
        'posts_per_page'      => (int) $args['posts_per_page'],
        'post_status'         => $args['post_status'],
        'orderby'             => $args['orderby'],
        'order'               => $args['order'],
        'ignore_sticky_posts' => true,
    ];

    $tax_query = [];

    // 1. Nếu có categories thì tự build tax_query
    if (!empty($args['categories'])) {
        $categories = array_map('sanitize_title', (array) $args['categories']);

        // mode AND: bài phải có tất cả category
        if ($args['category_mode'] === 'and') {
            $tax_query['relation'] = 'AND';

            foreach ($categories as $category_slug) {
                $tax_query[] = [
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => [$category_slug],
                ];
            }
        } else {
            // mode OR: bài thuộc 1 trong các category
            $tax_query[] = [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $categories,
                'operator' => 'IN',
            ];
        }
    }

    // 2. Nếu có tax_query truyền từ ngoài vào thì gộp thêm
    if (!empty($args['tax_query']) && is_array($args['tax_query'])) {
        // Nếu tax_query ngoài có relation thì giữ lại
        if (isset($args['tax_query']['relation'])) {
            $external_relation = $args['tax_query']['relation'];
            unset($args['tax_query']['relation']);

            if (!isset($tax_query['relation'])) {
                $tax_query['relation'] = $external_relation;
            }
        }

        foreach ($args['tax_query'] as $item) {
            $tax_query[] = $item;
        }
    }

    // 3. Gắn tax_query vào WP_Query
    if (!empty($tax_query)) {
        if (!isset($tax_query['relation']) && count($tax_query) > 1) {
            $tax_query['relation'] = 'AND';
        }

        $query_args['tax_query'] = $tax_query;
    }

    return [
        'query'      => new WP_Query($query_args),
        'config'     => $config,
        'categories' => (array) $args['categories'],
    ];
}


function tienthemes_category_links($allowed_categories = [])
{
    $links = [];
    $post_categories = get_the_category();

    if (empty($post_categories) || is_wp_error($post_categories)) {
        return '';
    }

    foreach ($post_categories as $category) {
        if (empty($allowed_categories) || in_array($category->slug, $allowed_categories, true)) {
            $links[] = sprintf(
                '<a href="%s" class="category-item">%s</a>',
                esc_url(get_category_link($category->term_id)),
                esc_html($category->name)
            );
        }
    }

    return implode(', ', $links);
}