
<?php
$args = [
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'order'          => 'ASC',
    'meta_query' => array(
        array(
            'key'     => 'date',
            'compare' => '>=',            
            'type'    => 'DATE',         
        ),
    ),
];

$events_query = new WP_Query($args);
$date = get_field('date');
$time  = get_field('time');
$start = $time['start'];
$end   = $time['end'];
$place = get_field('place');

?>
<section class="banner">
        <div class="banner-left">
            <h1 class="title">
                <?php the_title() ?>
            </h1>
            <div class="infor">
                <p class="date">
                    <?php echo esc_html($date) ?>
                    <br />
                    <?php echo esc_html($start) . ' - ' . esc_html($end); ?>
                </p>
                <p class="place">
                    <?php echo esc_html($place); ?>
                </p>
            </div>
        </div>
        <div class="banner_right">
            <div class="thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                </a>
            </div>
        </div>
    

</section>