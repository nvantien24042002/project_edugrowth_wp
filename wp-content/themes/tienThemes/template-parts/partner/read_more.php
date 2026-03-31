<?php
$partner_slug = get_post_field('post_name', get_the_ID());

$tax_query = [
    [
        'taxonomy' => 'post_tag',
        'field'    => 'slug',
        'terms'    => [$partner_slug],
    ]
];

$args = [
    'posts_per_page' => 3,
    'categories'     => [],
    'category_mode'  => 'or',
    'config'         => [
        'show_categories' => true,
        'show_desc'       => true,
    ],
    'tax_query'      => $tax_query,
];

$default_args = [
    'posts_per_page' => 3,
    'post_ids'       => [372, 377, 379],
    'config'         => [
        'show_categories' => true,
        'show_desc'       => true,
    ],
];

echo '<pre>';
echo 'Partner slug: ' . esc_html($partner_slug) . '<br>';
print_r($tax_query);
echo '</pre>';

$data  = tienthemes_get_posts_data($args);
$query = $data['query'];

$has_tag_posts = true;

if ($query->found_posts < 1) {
    $has_tag_posts = false;
    $data  = tienthemes_get_posts_data($default_args);
    $query = $data['query'];
}

$config             = $data['config'];
$allowed_categories = $data['categories'];
$show_categories    = !empty($config['show_categories']);
$show_desc          = !empty($config['show_desc']);
?>

<section class="read_more_about">
    <h4 class="read-more_title">
        <?php echo $has_tag_posts ? 'FEATURED IN' : 'READ MORE ABOUT'; ?>
    </h4>

    <div class="read-more-about_wrapper">
        <ul class="list_card read-more-about_list">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <div class="card_img">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default-thumb.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="card_content">
                            <?php if ($show_categories) : ?>
                                <?php
                                $post_categories = get_the_category();
                                $output = [];

                                foreach ($post_categories as $category) {
                                    if (empty($allowed_categories) || in_array($category->slug, $allowed_categories, true)) {
                                        $output[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-item">' . esc_html($category->name) . '</a>';
                                    }
                                }
                                ?>

                                <?php if (!empty($output)) : ?>
                                    <div class="categories">
                                        <?php echo implode(', ', $output); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <h4>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <?php if ($show_desc) : ?>
                                <?php $card_desc = get_field('card_description'); ?>
                                <?php if (!empty($card_desc)) : ?>
                                    <p class="card_desc">
                                        <?php echo esc_html($card_desc); ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="link--icon">
                                LEARN MORE
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </ul>
    </div>
</section>