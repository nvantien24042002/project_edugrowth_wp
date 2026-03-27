<section class="section_board">
    <h2 class="heading-title"><?php echo $args['title'] ?></h2>
    <div class="staff-list">
        <?php
        $board_query = new WP_Query([
            'post_type'      => 'member',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'order' => 'ASC',
            'tax_query'      => [
                [
                    'taxonomy' => 'group',
                    'field'    => 'slug',
                    'terms'    => $args['term'],
                ]
            ]
        ]);

        if ($board_query->have_posts()) :
            while ($board_query->have_posts()) : $board_query->the_post();

                $position = get_field('position');
                $linkedin = get_field('linkedin');
                // echo $linkedin;
                $image    = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
                <div class="staff">
                    <div class="staff-avatar">
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>
                    </div>

                    <h5 class="staff-name"><?php the_title(); ?></h5>

                    <?php if ($position) : ?>
                        <p class="staff-position"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>

                    <?php if ($linkedin) : ?>
                        <a class="linkedin" href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>