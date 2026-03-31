<?php 
get_header();
?>
global $post;
<div id="content">
    <?php get_template_part('template-parts/partner/banner'); ?>
    <?php get_template_part('template-parts/partner/content'); ?>
    <?php get_template_part("template-parts/partner/read_more", '',$post);?>
    <?php get_template_part("template-parts/partner/more_member");?>
</div>
<?php
get_footer();
?>