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
            'key'     => 'date',
            'value'   => $today,
            'compare' => '>=',            
            'type'    => 'DATE',         
        ),
    ),

];

$events_query = new WP_Query($args);
?>

<div id="content">
    <section class="section_events">
        <div class="box-head">
            <div class="box-left">
                <h3><?php echo is_front_page() ? "UPCOMING EVENTS" : "EVENTS"; ?></h3>
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
                        $button_type = get_field('button_type');
                        $button_link = get_field('button_link');
                        $button_text = 'LEARN MORE';
                        if ($button_type === 'learn_register') {
                            $button_text = 'LEARN MORE & REGISTER';
                        }
                        $final_link = !empty($button_link) ? $button_link : get_permalink();
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

                                <a class="event-btn" href="<?php echo esc_url($final_link); ?>">
                                    <?php echo esc_html($button_text); ?>
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
</div>