# TienThemes - WordPress Theme Learning Guide

## 🎓 Overview

This guide explains all the improvements made to the TienThemes WordPress theme to help you learn WordPress PHP best practices.

---

## 📋 Key Changes & Learning Points

### 1. **Security - Escaping & Sanitization**

#### What is Escaping?

Escaping converts special characters to HTML entities to prevent XSS attacks. Always escape output!

**Functions.php Learning:**

```php
// ✅ CORRECT - Always escape output
echo esc_html($user_input);           // For HTML content
echo esc_attr($attribute_value);      // For HTML attributes
echo esc_url($url);                   // For URLs
echo wp_kses_post($html_content);     // For HTML with allowed tags
```

**Changes Made:**

- **header.php & footer.php**: Added `esc_url()` and `esc_attr()` for all URLs and attributes
- **footer.php**: Changed `bloginfo('name')` to `get_bloginfo('name')` (more modern)

Example Before & After:

```php
// ❌ BEFORE (Vulnerable)
<a href="<?php echo home_url('/'); ?>">
    <img alt="<?php bloginfo('name'); ?>" />
</a>

// ✅ AFTER (Secure)
<a href="<?php echo esc_url(home_url('/')); ?>">
    <img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
</a>
```

---

### 2. **Text Domain for Translations**

#### What is Text Domain?

A text domain groups all translatable strings in your theme, making it easy to translate to other languages.

**Changes Made:**

- **functions.php**: Added `tienthemes_load_textdomain()` function
- **functions.php**: Changed text domain from `'edugrowth'` to `'tienthemes'`
- **style.css**: Added proper theme header with `Text Domain: tienthemes`

```php
// ✅ CORRECT - Always use text domain for translatable strings
__('Primary Menu', 'tienthemes')              // For general text
_e('Primary Menu', 'tienthemes')               // For echo-ing text
esc_html__('Primary Menu', 'tienthemes')       // For escaped text
```

**Why it matters:**

- Allows your theme to be translated using tools like GlotPress
- Follows WordPress standards
- Makes your theme professional & community-friendly

---

### 3. **Removed Duplicate Assets**

#### Problem:

Google Fonts were being loaded in TWO places:

1. In `header.php` (hardcoded)
2. In `functions.php` via `wp_enqueue_style()`

This causes slower page load and conflicts.

**Solution:**

- ✅ Removed duplicate Google Fonts from `header.php`
- ✅ Kept centralized enqueue in `functions.php`

**Learning Point:**

```php
// ✅ ALWAYS enqueue assets in functions.php, not in templates!
function tienthemes_enqueue_assets() {
    wp_enqueue_style(
        'my-style',              // Handle (unique ID)
        get_template_directory_uri() . '/style.css',
        array('parent-style'),   // Dependencies
        '1.0.0'                  // Version (for cache busting)
    );
}
add_action('wp_enqueue_scripts', 'tienthemes_enqueue_assets');
```

---

### 4. **Proper Function Naming & Structure**

#### Before: Inconsistent naming

```php
function edugrowth_scripts_all()        // Inconsistent
function tienThemes_register_menus()    // Mixed case
```

#### After: Professional naming

```php
function tienthemes_enqueue_assets()    // Consistent lowercase
function tienthemes_register_menus()    // Consistent prefix
function tienthemes_customize_register()// Grouped by function
```

**Rule:** Always prefix your functions with your theme name to avoid conflicts!

```php
// ✅ CORRECT
function tienthemes_get_asset_url($path) { ... }

// ❌ WRONG (Could conflict with other themes)
function get_asset_url($path) { ... }
```

---

### 5. **Theme Customizer Integration**

#### What is the Theme Customizer?

It's the live preview panel in WordPress admin (Appearance → Customize) where users can change theme settings.

**Added:**

```php
// New social links settings in customizer
function tienthemes_customize_register($wp_customize) {
    $wp_customize->add_section('tienthemes_social_section', ...);
    $wp_customize->add_setting('tienthemes_linkedin_url', ...);
    $wp_customize->add_control('tienthemes_linkedin_url', ...);
}
add_action('customize_register', 'tienthemes_customize_register');
```

**How to use in footer:**

```php
// ✅ Gets value from customizer (or default if not set)
$linkedin_url = get_theme_mod('tienthemes_linkedin_url', '#');
echo esc_url($linkedin_url);
```

---

### 6. **Theme Setup & Features**

#### Added `tienthemes_theme_setup()`:

```php
function tienthemes_theme_setup() {
    // Enable featured images
    add_theme_support('post-thumbnails');

    // Enable title tag management
    add_theme_support('title-tag');

    // Better HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', ...));
}
```

**Why?**

- Makes theme compatible with modern WordPress features
- Improves SEO (automatic title tags)
- Better responsive design support

---

### 7. **Helper Functions**

#### Added reusable utility functions:

```php
/**
 * Get asset URL safely
 * @example: <img src="<?php echo esc_url(tienthemes_get_asset_url('img/logo.png')); ?>" />
 */
function tienthemes_get_asset_url($path = '') {
    return TIENTHEMES_URI . '/assets/' . ltrim($path, '/');
}

/**
 * Check if on specific page
 * @example: <?php if (tienthemes_is_page('about')) { ... } ?>
 */
function tienthemes_is_page($page_slug) {
    return is_page($page_slug);
}
```

---

### 8. **Improved index.php**

#### Before: Minimal & risky

```php
<?php get_header(); ?>
 <?php the_content(); ?>
<?php get_footer(); ?>
```

#### After: Proper template loop

```php
<?php
get_header();
?>

<main id="main-content" class="site-content">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . esc_html__('No posts found', 'tienthemes') . '</p>';
    endif;
    ?>
</main>

<?php get_footer();
```

**Why this matters:**

- Uses proper template hierarchy
- Has fallback when no posts exist
- Properly escaped strings for translations

---

## 🔑 Key WordPress Functions You Should Know

| Function                       | Purpose               | Example                                             |
| ------------------------------ | --------------------- | --------------------------------------------------- |
| `wp_enqueue_style()`           | Load CSS files        | `wp_enqueue_style('my-style', 'style.css')`         |
| `wp_enqueue_script()`          | Load JS files         | `wp_enqueue_script('my-js', 'script.js')`           |
| `get_theme_mod()`              | Get customizer values | `get_theme_mod('my_setting', 'default')`            |
| `esc_url()`                    | Escape URLs           | `echo esc_url($url);`                               |
| `esc_attr()`                   | Escape attributes     | `echo esc_attr($text);`                             |
| `esc_html()`                   | Escape HTML           | `echo esc_html($text);`                             |
| `__()`                         | Translate text        | `__('Text', 'textdomain')`                          |
| `_e()`                         | Translate & echo      | `_e('Text', 'textdomain');`                         |
| `get_template_directory_uri()` | Get theme URL         | `get_template_directory_uri() . '/images/logo.png'` |
| `get_stylesheet_uri()`         | Get style.css URL     | `wp_enqueue_style('theme', get_stylesheet_uri())`   |

---

## 🚀 Quick Reference - Copy & Paste Guide

### Enqueue a Stylesheet:

```php
wp_enqueue_style(
    'my-handle',
    get_template_directory_uri() . '/css/style.css',
    array('parent-style'),  // Dependencies
    '1.0.0'                 // Version for cache busting
);
```

### Enqueue a Script:

```php
wp_enqueue_script(
    'my-script',
    get_template_directory_uri() . '/js/script.js',
    array('jquery'),        // Dependencies
    '1.0.0',                // Version
    true                    // Load in footer (true) or head (false)
);
```

### Add Customizer Setting:

```php
$wp_customize->add_setting('my_option', array(
    'default'           => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'              => 'theme_mod',
));

$wp_customize->add_control('my_option', array(
    'label'   => __('My Setting', 'mytheme'),
    'section' => 'colors',
    'type'    => 'color',
));
```

### Register Navigation Menu:

```php
register_nav_menus(array(
    'primary' => __('Primary Menu', 'tienthemes'),
));

// Use in template
wp_nav_menu(array(
    'theme_location' => 'primary',
    'fallback_cb'    => '__return_false',
));
```

---

## 📚 Resources for Learning More

1. **Official WordPress Theme Development**
   - https://developer.wordpress.org/themes/

2. **Security & Escaping Functions**
   - https://developer.wordpress.org/plugins/security/

3. **Theme Customizer API**
   - https://developer.wordpress.org/themes/customize-api/

4. **WordPress Coding Standards**
   - https://developer.wordpress.org/coding-standards/

5. **Template Hierarchy**
   - https://developer.wordpress.org/themes/basics/template-hierarchy/

---

## ✅ Checklist for WordPress Theme Development

- [ ] Use text domain for all translatable strings
- [ ] Always escape output (esc_url, esc_attr, esc_html)
- [ ] Enqueue styles & scripts in functions.php, not templates
- [ ] Prefix all functions with theme name (avoid conflicts)
- [ ] Don't hardcode data (use customizer/options instead)
- [ ] Add proper theme header in style.css
- [ ] Use proper template hierarchy
- [ ] Add theme support features (title-tag, post-thumbnails, etc)
- [ ] Test on different browsers & devices
- [ ] Follow WordPress coding standards

---

## 🎯 Next Steps

1. **Customize Social Links**: Go to Appearance → Customize → Social Links
2. **Update Footer**: Modify footer.php with your own content
3. **Add Custom Post Types**: Create custom CPTs for events/sliders in functions.php
4. **Use ACF Plugin**: For easier custom field management
5. **Create Template Parts**: For reusable sections

Happy learning! 🚀
