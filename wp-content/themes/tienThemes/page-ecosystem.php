<?php get_header()  ?>
<div id="content">

    <?php

    $arg = array(
        'post_title' => 'MARKET RESEARCH',
        'post_desc' => 'Explore key trends in education innovation and EdTech from leaders across education, hand-picked global innovators and the Australia EdTech ecosystem.',
        'category_name' => 'thought-leadership',
        'orderby' => "DATE",
        'order' => 'DESC',
        'posts_per_page' => 9,
        'category__not_in' => array(15, 13, 6, 12, 14, 5),
    )

    ?>
    <?php get_template_part('template-parts/banner') ?>
    <?php get_template_part('template-parts/ecosystem/advocates') ?>
    <?php get_template_part('template-parts/ecosystem/card') ?>
    <?php get_template_part('template-parts/ecosystem/strategic') ?>
    <?php get_template_part('template-parts/section/solution') ?>



    <?php get_template_part('template-parts/post', "", $arg) ?>
    <?php get_template_part('template-parts/section/membership') ?>
    <?php get_template_part('template-parts/events') ?>
</div>
<?php get_footer() ?>