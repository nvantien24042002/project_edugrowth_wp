<?php get_header(); ?>
<div id="content">
    <?php get_template_part('template-parts/banner'); ?>
    <?php get_template_part('template-parts/clearpath/services'); ?>
    <?php get_template_part('template-parts/clearpath/card'); ?>
    <?php get_template_part("template-parts/section/membership"); ?>
    <?php
    $arg1 = array(
        'post_title' => 'MARKET RESEARCH',
        'post_desc' => 'Analysis of the Australian EdTech startup sector, key characteristics, economic impact and challenges and opportunities.',
        'category_name' => 'market',
        'order' => 'DESC',
        'posts_per_page' => 9,
        'category__not_in' => array(15, 13, 6, 12, 14, 5),
        // 10
    );
    $arg2 = array(
        'post_title' => 'THOUGHT LEADERSHIP',
        'post_desc' => 'Explore key trends in education innovation and EdTech from leaders across education, hand-picked global innovators and the Australia EdTech ecosystem.',
        'category_name' => 'thought-leadership',
        'orderby' => "DATE",
        'order' => 'DESC',
        'posts_per_page' => 6,
        'category__not_in' => array(15, 13, 6, 10, 5),
    )
    ?>
    <?php get_template_part("template-parts/post", 'post', $arg1); ?>
    <?php get_template_part("template-parts/post", 'post', $arg2); ?>

    <?php get_template_part("template-parts/events"); ?>
</div>
<?php get_footer() ?>