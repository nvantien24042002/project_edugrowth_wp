<?php
$config = isset($args['config']) ? $args['config'] : array();
$show_categories = !empty($config['show_categories']);
$show_desc       = !empty($config['show_desc']);
$post_title         = isset($args['post_title']) ? $args['post_title'] : '';
$post_desc          = isset($args['post_desc']) ? $args['post_desc'] : '';
$category_name      = isset($args['category_name']) ? $args['category_name'] : '';
$posts_per_page     = isset($args['posts_per_page']) ? $args['posts_per_page'] : 3;
$query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
);

if (isset($args['category__not_in'])) {
    $query_args['category__not_in'] = $args['category__not_in'];
}
if (isset($args['tax_query'])) {
    $query_args['tax_query'] = $args['tax_query'];
}

$query = new WP_Query($query_args);
?>

<section class="section_market section_leadership">
    <?php if (!empty($post_title) || !empty($post_desc)) : ?>
        <div class="box-head">
            <div class="left">
                <?php if (!empty($post_title)) : ?>
                    <h3><?php echo esc_html($post_title); ?></h3>
                <?php endif; ?>

                <?php if (!empty($post_desc)) : ?>
                    <p><?php echo esc_html($post_desc); ?></p>
                <?php endif; ?>
            </div>

            <div class="right">
                <a href="" class="view_all">
                    VIEW ALL
                    <i class="fa-solid fa-circle-arrow-right"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>

    <div class="box-content">
        <ul class="list_card">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <div class="card_img">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="card_content">
                            <?php if ($show_categories) : ?>
                                <?php
                                $categories = get_the_category();
                                $output = array();

                                foreach ($categories as $category) {
                                    if (empty($allowed_categories) || in_array($category->slug, $allowed_categories)) {
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
            <?php else : ?>
            <?php endif; ?>
        </ul>
    </div>
</section>