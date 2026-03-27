<?php get_header(); ?>
<div id="content">
    <?php
    $args = array(
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'post_status'    => 'publish',
        'order' => 'DESC',
        'config' => [
            'show_categories' => true,
            'show_desc' => true
        ],
        'tax_query' => array(
            'relation' => 'AND',
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['news'],
            ],
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['thought-leadership'],
            ],
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['case_study'],
            ],
        )


    );
    ?>
    <?php get_template_part('template-parts/home/slider'); ?>
    <?php get_template_part('template-parts/home/hero'); ?>
    <?php get_template_part('template-parts/post', '', $args); ?>
    <?php get_template_part('template-parts/home/banner_1'); ?>
    <?php get_template_part('template-parts/home/focus'); ?>
    <?php get_template_part('template-parts/home/edTech_startups'); ?>
    <?php get_template_part('template-parts/partners'); ?>
    <?php get_template_part('template-parts/home/banner_2'); ?>
    <?php get_template_part('template-parts/home/resources'); ?>

    <?php get_template_part('template-parts/events'); ?>
</div>
<?php get_footer(); ?>