<div id="content">
    <footer id="footer" class="d-flex justify-between">
        <div class="footer-left">
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container'      => false,
                    'menu_class'     => 'footer-menu',
                    'fallback_cb'    => '__return_false',
                ));
                ?>
            </nav>

            <div class="footer-social">
                <?php
                $linkedin_url = get_theme_mod('tienthemes_linkedin_url', '#');
                $twitter_url = get_theme_mod('tienthemes_twitter_url', '#');
                // add social facebook

                ?>
                <a href="<?php echo esc_url($linkedin_url); ?>" class="social_linkedin" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="<?php echo esc_url($twitter_url); ?>" class="social_twitter" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
            </div>

            <div class="footer-copyright">
                <p>
                    Copyright © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. <br />
                    Use of this website constitutes acceptance of the
                    <a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>">Website Terms and Conditions</a>
                    and <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy</a> &amp;
                    <a href="<?php echo esc_url(home_url('/cookie-policy/')); ?>">Cookies Policy</a>.
                </p>
            </div>
        </div>

        <div class="footer-right">
            <div class="footer-button">
                <div class="button_label">Subscribe to our newsletter</div>
                <a href="<?php echo esc_url(home_url('/subscribe-to-news-events/')); ?>" class="button">Subscribe &gt;</a>
            </div>
            <div id="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-footer.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="flogo" />
                </a>
            </div>
        </div>
    </footer>
</div>


<div class="back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</div>

</div> <?php wp_footer(); ?>
</body>

</html>