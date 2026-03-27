<?php
$today = date('Y-m-d');
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'category_name' => 'events',
    'order'          => 'ASC',
    'meta_query' => array(
        array(
            'key'     => 'date', // The meta key for your custom field
            'value'   => $today,
            'compare' => '>=',             // Compare as "greater than or equal to"
            'type'    => 'DATE',           // Tell WordPress to compare the values as dates
        ),
    ),

];

$events_query = new WP_Query($args);
?>

<div id="content">
    <section class="section_events">
        <div class="box-head">
            <div class="box-left">
                <h3>UPCOMING EVENTS</h3>
                <p></p>
            </div>
            <div class="box-right">
                <a href="#">
                    VIEW ALL
                    <i class="fa-solid fa-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="box-content">
            <ul class="list_card">
                <?php if ($events_query->have_posts()) : ?>
                    <?php while ($events_query->have_posts()) : $events_query->the_post();

                        $date = get_field('date');
                        $time  = get_field('time');
                        $start = $time['start'];
                        $end   = $time['end'];
                        $place = get_field('place');
                        // echo $place;
                    ?>
                        <li class="card_item">
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
                                <h4 class="title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>

                                <p class="start">
                                    <?php echo esc_html($date) ?>
                                    <br />
                                    <?php echo esc_html($start) . ' - ' . esc_html($end); ?>
                                </p>
                                <p class="place">
                                    <?php echo esc_html($place) ?>
                                </p>

                                <a href="<?php the_permalink(); ?>">LEARN MORE</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</div>