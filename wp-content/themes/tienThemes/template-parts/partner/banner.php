<section class="section_banner-partner">
        <div class="banner_wrapper">
            <div class="banner-text">
                <div class="member-name">
                    <?php the_title() ?>
                </div>
                <div class="member-tagline">
                    <?php echo get_post_meta(get_the_ID(),'tagline',true) ? get_post_meta(get_the_ID(),'tagline',true) : ''; ?>
                </div>
            </div>
            <div class="banner-logo">
                <img src="https://edugrowth.org.au/wp-content/themes/Divi-rebuild/images/member-badge-white.png" alt="">
            </div>
        </div>
    <!-- end banner -->
</section>