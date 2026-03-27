<?php
/**
 * SLIDER MANAGEMENT FUNCTIONS
 *
 * This file shows how to convert hardcoded slider data into dynamic data
 * that can be managed from the WordPress admin panel.
 *
 * Add this code to your functions.php if you want to use custom post types
 * for managing slider content.
 */

/**
 * OPTION 1: Using Theme Options (Simplest)
 *
 * This stores slider data in WordPress options table
 * Best for: Small number of items that don't change frequently
 */

// Get slider items from theme options
function tienthemes_get_slider_items() {
    $slider_items = get_option('tienthemes_slider_items', array());

    // If no items, return default
    if (empty($slider_items)) {
        return array(
            array(
                'title'   => 'Innovation Alley',
                'image'   => '',
                'content' => 'Where the StartUp community can exhibit',
                'link'    => '',
                'button'  => 'Exhibit with Us',
            ),
        );
    }

    return $slider_items;
}

// Use in template:
// <?php
// $items = tienthemes_get_slider_items();
// foreach ($items as $item) {
//     echo '<div class="swiper-slide">';
//     echo '  <img src="' . esc_url($item['image']) . '" />';
//     echo '  <h4>' . esc_html($item['title']) . '</h4>';
//     echo '</div>';
// }
// ?>

/\*\*

- OPTION 2: Using Custom Post Type (Recommended)
-
- This creates a "Slider" post type in WordPress admin
- Best for: Multiple items that change frequently, SEO concerns
-
- To use: Uncomment and add to functions.php
  \*/

/\*
function tienthemes_register_slider_cpt() {
register_post_type('slider', array(
'labels' => array(
'name' => **('Sliders', 'tienthemes'),
'singular_name' => **('Slider', 'tienthemes'),
),
'public' => true,
'show_in_menu' => true,
'supports' => array('title', 'editor', 'thumbnail'),
'menu_icon' => 'dashicons-images-alt2',
));
}
add_action('init', 'tienthemes_register_slider_cpt');

// Get slider items from CPT (in functions.php):
function tienthemes_get_slider_items_from_cpt() {
$args = array(
'post_type' => 'slider',
'posts_per_page' => -1,
'orderby' => 'menu_order',
'order' => 'ASC',
);

    return get_posts($args);

}

// Use in template (template-parts/home/slider.php):
// <?php
// $sliders = tienthemes_get_slider_items_from_cpt();
// foreach ($sliders as $slider) {
//     $image = get_the_post_thumbnail_url($slider->ID);
// echo '<div class="swiper-slide">';
// echo ' <img src="' . esc_url($image) . '" />';
// echo ' <h4>' . esc_html($slider->post_title) . '</h4>';
//     echo '  ' . wp_kses_post($slider->post_content);
// echo '</div>';
// }
// ?>
\*/

/\*\*

- OPTION 3: Using ACF Plugin (Most User-Friendly)
-
- Advanced Custom Fields plugin allows drag-drop interface
- Best for: Non-technical users, complex data structures
-
- Installation: plugins.php > Add New > Search "Advanced Custom Fields"
-
- After installing ACF:
-
- 1.  Go to Custom Fields > Add New Field Group
- 2.  Create fields like:
- - Title (text)
- - Image (image)
- - Description (textarea)
- - Link (url)
- 3.  Assign to Post Type: Page, Front Page
-
- Use in template:
- <?php
- $slider_items = get_field('slider_items');
- if ($slider_items) {
-     foreach ($slider_items as $item) {
-         echo '<div class="swiper-slide">';
-         echo '<img src="' . esc_url($item['image']['url']) . '" />';
-         echo '<h4>' . esc_html($item['title']) . '</h4>';
-         echo '</div>';
-     }
- }
- ?>
  \*/

/\*\*

- EVENTS MANAGEMENT
-
- Similar approaches apply to events
  \*/

// Get events from CPT
function tienthemes_get_upcoming_events() {
$args = array(
'post_type' => 'event',
'posts_per_page' => 3,
'orderby' => 'meta_value',
'meta_key' => 'event_date',
'order' => 'ASC',
'meta_query' => array(
array(
'key' => 'event_date',
'value' => date('Y-m-d'),
'compare' => '>=',
'type' => 'DATE',
),
),
);

    return get_posts($args);

}

// Use in template:
// <?php
// $events = tienthemes_get_upcoming_events();
// foreach ($events as $event) {
//     $event_date = get_post_meta($event->ID, 'event_date', true);
// echo '<li>';
// echo ' <h4>' . esc_html($event->post_title) . '</h4>';
//     echo '  <p>' . esc_html($event_date) . '</p>';
// echo '</li>';
// }
// ?>

/\*\*

- COMPARISON OF APPROACHES
-
- Option 1 (Theme Options):
- - ✅ Simple, good for small data
- - ✅ No extra plugins needed
- - ❌ Limited for complex data
- - ❌ No admin interface for editing
-
- Option 2 (Custom Post Type):
- - ✅ Professional approach
- - ✅ Built-in WordPress admin interface
- - ✅ Good for SEO
- - ✅ Can use with ACF
- - ❌ Need to register CPT
- - ❌ More code required
-
- Option 3 (ACF):
- - ✅ Most user-friendly
- - ✅ Beautiful admin interface
- - ✅ Flexible field types
- - ✅ No coding required
- - ❌ Paid plugin (ACF Pro)
- - ❌ Extra dependency
    \*/

// RECOMMENDATION FOR YOUR PROJECT:
// 1. Use ACF + Custom Post Types for slider & events
// 2. This gives you:
// - Drag-drop interface in admin
// - Dynamic content management
// - Professional appearance
// - Easy for content updates
