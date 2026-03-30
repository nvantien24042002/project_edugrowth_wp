<section class="section_banner-partner">
        <div class="banner_wrapper">
            <div class="box-text">
                <div class="member-name">
                    <?php the_title() ?>
                </div>
                <div class="member-tagline">
                    <?php echo get_post_meta(get_the_ID(),'tagline',true) ? get_post_meta(get_the_ID(),'tagline',true) : ''; ?>
                </div>
            </div>
            <div class="box-logo">
                <img src="https://edugrowth.org.au/wp-content/themes/Divi-rebuild/images/member-badge-white.png" alt="">
            </div>
        </div>
    <!-- end banner -->
    <style>
        .section_banner-partner {
            background: url('https://edugrowth.org.au/wp-content/uploads/2026/02/EdG-Members-Profile-Background.png') center / cover no-repeat;
            ;
        }
        .section_banner-partner .banner_wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 80px;
        }
        .section_banner-partner .member-name {
            font-size: 52px;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .section_banner-partner .member-tagline {
            font-size:30px;
            margin-bottom: 10px;
            color: #ffffff;
            letter-spacing:2px;
        }
        .section_banner-partner img {
            max-width: 200px;
            max-height: 200px;
        }
        /* Content */
        .section_content-partner {
            display: flex;
            padding: 40px 80px;
            gap: 40px;
        }
        ul {
            list-style:none;
        }
        .section_content-partner {
            display:flex;
            padding: 0px 80px;
        }

        .sidebar {
            flex:1;
        }
        .content {
            flex:2;
        }

    </style>
</section>