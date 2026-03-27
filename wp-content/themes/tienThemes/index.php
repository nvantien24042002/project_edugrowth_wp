<?php

/**
 * Main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * 
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

<main id="main-content" class="site-content">
    <?php
    if (have_posts()) :
        // Start the loop
        while (have_posts()) :
            the_post();

            // Display the post content
            the_content();
        endwhile;
    else :
        // No posts found
        echo '<p>' . esc_html__('No posts found', 'tienthemes') . '</p>';
    endif;
    ?>
</main>

<?php get_footer();
