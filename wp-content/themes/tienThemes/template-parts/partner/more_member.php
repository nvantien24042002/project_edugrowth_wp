<?php
$member_query = new WP_Query([
    'post_type'      => 'partner',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'order' => 'DESC',
]);
?>
<section class="more_member">
    <h4 class="more_member-title">EXPLORE MORE MEMBERS</h4>
    <div class="more_member-list">
        <div class="list-logo">
        <!-- 1 -->
        <?php if ($member_query->have_posts()):
            while ($member_query->have_posts()): $member_query->the_post();
                $images = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
                <div class="list-item">
                    <a href="<?php echo the_permalink() ?>">
                        <img
                            src="<?php echo esc_url($images); ?>"
                            alt="" />
                    </a>
                </div>

        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    </div>
</section>