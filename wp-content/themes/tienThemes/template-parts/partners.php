<?php
$partner_query = new WP_Query([
    'post_type'      => 'partner',
    'posts_per_page' => 15,
    'post_status'    => 'publish',
    'order' => 'ASC',
]);
?>
<section class="section_strategic">
    <div class="box-head">
        <h4>STRATEGIC PARTNERS</h4>
    </div>
    <div class="box-content_home">
        <p>Proudly partnering with Australia’s leading education organisations together with local and state bodies.
        </p>
    </div>
    <div class="box-view_member">
        <a href="" class="view_all">
            VIEW ALL MEMBERS
            <i class="fa-solid fa-circle-arrow-right"></i>
        </a>
    </div>
    <div class="list-logo">
        <!-- 1 -->
        <?php if ($partner_query->have_posts()):
            while ($partner_query->have_posts()): $partner_query->the_post();
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
</section>


<!-- 

  -->