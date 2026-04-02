<section class="section-post-content">
    <div class="post-content">
        <?php the_content(); ?>
    </div>
    <div class="post-sidebar">
        <?php
        $args = [
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'order'          => 'DESC',
            
        ];
        
        $recent_query = new WP_Query($args);
         if ($recent_query->have_posts()) : ?>
                    
        <h4 class="sidebar-title">Recent News</h4>
        <ul class="sidebar-posts">
            <?php while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
                <li class="sidebar-post"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
        
        <?php endif; ?>
    </div>
</section>