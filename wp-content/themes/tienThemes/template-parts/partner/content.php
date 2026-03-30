<?php
$taxonomies = get_object_taxonomies('partner', 'objects');
$field_website = get_field('website');
$field_social = get_field('social');
// echo '<pre>';
// print_r($field_social);
// echo '</pre>';
?>
<section class="section_content-partner">
    <div class="sidebar">
        <div class="sidebar-member">
            <?php foreach ($taxonomies as $taxonomy_slug => $taxonomy_obj) : ?>
                <?php
                $terms = get_the_terms(get_the_ID(), $taxonomy_slug);
                if (!$terms || is_wp_error($terms)) {
                    continue;
                }
                ?>
                <div class="partner-taxonomy">
                    <h4 class="partner-taxonomy__label">
                        <?php echo esc_html($taxonomy_obj->labels->singular_name); ?>
                    </h4>

                    <div class="partner-taxonomy__list">
                        <?php foreach ($terms as $term) : ?>
                            <div class="partner-taxonomy__item">
                                <?php echo esc_html($term->name); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="member-connect">
                <h4>Contact</h4>
                <a href="" class="partner-website">
                    <?php echo esc_html($field_website); ?>
                </a>
            <ul class="member-social">
                <?php
                if (!empty($field_social) && is_array($field_social)) {
                    foreach ($field_social as $key => $value) {
                        if (!empty($value)) { ?>
                            <li class="social-item">
                                <a href="<?php echo esc_url($value); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-<?php echo esc_attr($key); ?>"></i>
                                </a>
                            </li>
                        <?php } 
                    }
                } ?>
            </ul>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="member-logo">
            <?php echo the_post_thumbnail('medium'); ?>
        </div>
        <div class="member-description">
            <p>
                <?php the_content(); ?>
            </p>
        </div>
    </div>
</section>