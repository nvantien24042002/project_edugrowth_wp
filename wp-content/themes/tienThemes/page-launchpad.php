<?php get_header();
?>
<div id="content">
    <?php
    ?>
    <?php get_template_part('template-parts/banner'); ?>
    <?php get_template_part('template-parts/launchpad/idea'); ?>
    <?php get_template_part('template-parts/launchpad/card'); ?>
    <?php get_template_part('template-parts/launchpad/startup'); ?>
    <?php get_template_part('template-parts/section/membership'); ?>
    <?php the_content(); ?>
</div>
<?php get_footer();
?>