<?php get_header()  ?>
<div id="content">
    <?php get_template_part('template-parts/banner') ?>
    <?php get_template_part('template-parts/ecosystem/advocates') ?>
    <?php get_template_part('template-parts/ecosystem/card') ?>
    <?php get_template_part('template-parts/ecosystem/strategic') ?>
    <?php get_template_part('template-parts/section/solution') ?>

    <?php the_content() ?>
    <?php get_template_part('template-parts/section/membership') ?>
    <?php get_template_part('template-parts/events') ?>
</div>
<?php get_footer() ?>