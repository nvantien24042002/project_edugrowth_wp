<?php

/**
 * WORDPRESS HOOKS & FILTERS GUIDE
 * 
 * Hooks are one of the most powerful features of WordPress
 * They allow you to "hook into" WordPress at various points
 * and execute your custom code.
 * 
 * There are 2 types of hooks:
 * 1. Actions - Do something at a specific time
 * 2. Filters - Change/modify something
 */

// ==============================================================
// ACTIONS - Do something
// ==============================================================

/**
 * BASIC ACTION EXAMPLE
 * 
 * Syntax: do_action('hook_name');
 *         add_action('hook_name', 'your_function');
 */

// WordPress will call this function after theme setup
function my_function_that_runs_after_theme_setup()
{
    // Your code here
    add_theme_support('thumbnails');
}
add_action('after_setup_theme', 'my_function_that_runs_after_theme_setup');

// This will run when scripts are being enqueued
function my_scripts()
{
    wp_enqueue_style('my-style', '/style.css');
}
add_action('wp_enqueue_scripts', 'my_scripts');


/**
 * COMMON ACTION HOOKS YOU SHOULD KNOW:
 * 
 * init                      - WordPress initialized
 * after_setup_theme         - After theme is loaded
 * wp_enqueue_scripts        - When scripts/styles are loaded
 * wp_footer                 - In the footer
 * wp_head                   - In the head
 * admin_init                - Admin area initialized
 * customize_register        - Customizer is being set up
 * save_post                 - After post is saved
 * template_redirect         - Before template is loaded
 * wp_insert_post            - After post is created
 * wp_update_post            - After post is updated
 * transition_post_status    - When post status changes
 * wp_login                  - When user logs in
 * wp_logout                 - When user logs out
 * user_register             - When user registers
 * end - Any of these can be used with add_action()
 */


// ==============================================================
// FILTERS - Change something
// ==============================================================

/**
 * BASIC FILTER EXAMPLE
 * 
 * Syntax: apply_filters('hook_name', $value);
 *         add_filter('hook_name', 'your_function');
 */

// This function receives WordPress default excerpt and modifies it
function my_excerpt_more($more)
{
    return ' ... [Read More]';
}
add_filter('excerpt_more', 'my_excerpt_more');

// This modifies the post content before it's displayed
function my_post_content($content)
{
    if (is_single()) {
        // Only on single post pages
        return '<div class="custom-wrapper">' . $content . '</div>';
    }
    return $content;
}
add_filter('the_content', 'my_post_content');


/**
 * COMMON FILTER HOOKS YOU SHOULD KNOW:
 * 
 * the_content               - Post content before display
 * the_excerpt               - Excerpt before display
 * the_title                 - Post title before display
 * wp_nav_menu_items         - Menu items HTML
 * template_include          - Which template file to load
 * excerpt_length            - Length of excerpt (words)
 * body_class                - CSS classes for body tag
 * post_class                - CSS classes for post
 * wp_link_pages             - Post pagination links
 * comment_text              - Comment text before display
 * sanitize_*                - Data validation before save
 * wp_mail_from              - Email sender address
 * wp_mail_from_name         - Email sender name
 * image_size_names_choose   - Available image sizes
 * end - Any of these can be used with add_filter()
 */


// ==============================================================
// PRACTICAL EXAMPLES FOR YOUR THEME
// ==============================================================

/**
 * EXAMPLE 1: Add Custom CSS Class to Body
 */
function tienthemes_body_class($classes)
{
    // Add custom class based on page type
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }

    if (is_singular('post')) {
        $classes[] = 'is-single-post';
    }

    return $classes;
}
add_filter('body_class', 'tienthemes_body_class');


/**
 * EXAMPLE 2: Modify Post Content
 */
function tienthemes_add_footer_to_posts($content)
{
    // Only add to single posts, not pages
    if (is_singular('post') && !is_admin()) {
        $footer = '<div class="post-footer">';
        $footer .= '<p>' . __('Posted by: ', 'tienthemes');
        $footer .= get_the_author() . '</p>';
        $footer .= '</div>';

        return $content . $footer;
    }

    return $content;
}
add_filter('the_content', 'tienthemes_add_footer_to_posts');


/**
 * EXAMPLE 3: Filter Navigation Menu
 */
function tienthemes_add_menu_icons($items)
{
    // Replace placeholder with icon HTML
    $items = str_replace('[icon]', '<i class="fa-solid fa-chevron-right"></i>', $items);
    return $items;
}
add_filter('wp_nav_menu_items', 'tienthemes_add_menu_icons');


/**
 * EXAMPLE 4: Change Excerpt Length
 */
function tienthemes_custom_excerpt_length($length)
{
    // Instead of default 55 words, use 25
    return 25;
}
add_filter('excerpt_length', 'tienthemes_custom_excerpt_length');


/**
 * EXAMPLE 5: Action - Add Custom Admin Notice
 */
function tienthemes_admin_notice()
{
    // Only show if user has permission
    if (!current_user_can('manage_options')) {
        return;
    }

    // Only show on dashboard
    if (get_current_screen()->base !== 'dashboard') {
        return;
    }

?>
    <div class="notice notice-info is-dismissible">
        <p><?php _e('Welcome to TienThemes! Go to Appearance > Customize to configure your theme.', 'tienthemes'); ?></p>
    </div>
<?php
}
add_action('admin_notices', 'tienthemes_admin_notice');


/**
 * EXAMPLE 6: Remove WordPress Default Actions
 */
function tienthemes_remove_actions()
{
    // Remove WordPress default action if needed
    remove_action('wp_footer', 'wp_print_footer_scripts');

    // Or use remove_filter for filters
    remove_filter('the_content', 'wptexturize');
}
add_action('wp_loaded', 'tienthemes_remove_actions');


/**
 * EXAMPLE 7: Priority - Control when hook runs
 */

// Priority 10 is default (runs first)
// Higher number = runs later
// Lower number = runs earlier

function print_first()
{
    echo 'First ';
}

function print_second()
{
    echo 'Second ';
}

function print_third()
{
    echo 'Third';
}

add_action('wp_footer', 'print_first', 5);      // Runs first   (priority 5)
add_action('wp_footer', 'print_second', 10);    // Runs second  (priority 10, default)
add_action('wp_footer', 'print_third', 15);     // Runs third   (priority 15)

// Output: First Second Third


/**
 * EXAMPLE 8: Hooks with Parameters
 */

// This hook passes 3 parameters to your function
function my_custom_action($arg1, $arg2, $arg3)
{
    echo $arg1 . ' ' . $arg2 . ' ' . $arg3;
}
// Need to specify 4 (number of parameters)
add_action('my_custom_hook', 'my_custom_action', 10, 3);

// Somewhere else:
// do_action('my_custom_hook', 'Hello', 'World', '!');
// Output: Hello World !


/**
 * EXAMPLE 9: Apply Multiple Filters
 */

$title = 'My Post';

// Each filter can modify the value
$title = apply_filters('my_title', $title);
$title = apply_filters('my_title_case', $title);
$title = apply_filters('my_title_length', $title);

// If you have 3 functions hooked:
// 1. capitalize_title() changes 'My Post' to 'MY POST'
// 2. limit_title() changes 'MY POST' to 'MY POS...'
// 3. add_icon() changes 'MY POS...' to '🔖 MY POS...'


/**
 * EXAMPLE 10: Custom Hook in Your Theme
 */

// In your template:
do_action('tienthemes_before_loop');

// Loop code here...

do_action('tienthemes_after_loop');

// Now other plugins/themes can hook into your custom actions:
function add_content_before_loop()
{
    echo '<div class="before-loop">Ads here</div>';
}
add_action('tienthemes_before_loop', 'add_content_before_loop');

/**
 * WHY CUSTOM HOOKS ARE IMPORTANT:
 * - Makes your theme extensible
 * - Allows plugins to modify behavior
 * - Follows WordPress standards
 * - Makes theme easy to customize
 */


// ==============================================================
// BEST PRACTICES
// ==============================================================

/**
 * 1. Always check current context (is_admin(), is_singular(), etc)
 *    to prevent unnecessary code execution
 * 
 * 2. Use priority wisely:
 *    - Use priority < 10 when you need to run before defaults
 *    - Use priority > 10 when you need to run after defaults
 * 
 * 3. Pass correct number of parameters to add_action/add_filter
 * 
 * 4. Always escape/sanitize data in filters
 * 
 * 5. Use meaningful action names with your theme prefix
 *    Good: tienthemes_before_header
 *    Bad:  before_header
 * 
 * 6. Cache results when possible to avoid repeated queries
 * 
 * 7. Consider performance - filters run on every page load
 * 
 * 8. Document your custom hooks for developers
 */

// ==============================================================
// LEARNING RESOURCES
// ==============================================================

/*
Official Documentation:
https://developer.wordpress.org/plugins/hooks/

Action Reference:
https://developer.wordpress.org/reference/hooks/action_reference/

Filter Reference:
https://developer.wordpress.org/reference/hooks/filter_reference/

Common Hooks in themes:
https://developer.wordpress.org/themes/customize-api/
*/
