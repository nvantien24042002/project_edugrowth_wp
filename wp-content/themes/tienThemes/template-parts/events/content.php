<?php
$categories = wp_get_post_categories(get_the_ID());
echo "<pre>";
print_r($categories);
echo "</pre>";
?>
<section class="content">
    <?php the_content() ?>
</section>