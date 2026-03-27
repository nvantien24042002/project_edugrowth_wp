<?php
$data = tienthemes_get_posts_data(array(
    'posts_per_page' => 8,
    'categories'     => array('news', 'thought-leadership', 'case-study'),
    'config'         => array(
        'show_categories' => true,
        'show_desc'       => true,
    ),
));

$query = $data['query'];
$config = $data['config'];
$categories = $data['categories'];

$show_categories = !empty($config['show_categories']);
$show_desc = !empty($config['show_desc']);

$all_posts = $query->posts;
$row2_posts = array_slice($all_posts, 0, 6);
$row3_posts = array_slice($all_posts, 6, 2);

?>
<section class="section_main">
    <div class="box-link">
        <ul>
            <li><a href="">News</a></li>
            <li><a href="">Events</a></li>
            <li><a href="">Media</a></li>
        </ul>
    </div>
    <!-- row 1 -->
    <div class="row row1">
        <div class="box-left">
            <div class="box-text">
                <div class="light-heading">SECTOR OVERVIEW AND STATISTICS</div>
                <div class="main-heading">
                    Australian EdTech Ecosystem Snapshot
                </div>
                <p>
                    The sector is made up of 775 EdTech companies employing 20,500
                    staff and generating $4.2Bn in revenue.
                </p>
                <a href="" class="link--icon">LEARN MORE
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            <div class="box-img">
                <img
                    src="https://edugrowth.org.au/wp-content/uploads/2025/04/2024-Snapshot_Map.png"
                    alt="" />
            </div>
        </div>
        <div class="box-right">
            <div class="box-text">
                <div class="light-heading">
                    LAUNCHPAD, CLEARPATH & ECOSYSTEM
                </div>
                <div class="main-heading">Explore Our Programs</div>
                <p>
                    Our programs focus on developing the entire education
                    technology and innovation sector.
                </p>
                <p>
                    We have a range of services supporting Australian EdTech
                    companies at each stage of their journey, whilst also
                    connecting educators, education providers and industry
                    participants into the broader ecosystem.
                </p>
                <a href="" class="link--icon">LEARN MORE
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- row 2 -->
    <div class="row row2">
        <ul class="list_card">
            <?php if (!empty($row2_posts)) : ?>
                <?php foreach ($row2_posts as $post) : setup_postdata($post); ?>
                    <li class="card_item">
                        <div class="card_img">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/400x250" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="card_content">
                            <?php if ($show_categories) : ?>
                                <div class="light-heading">
                                    <?php echo wp_kses_post(tienthemes_category_links($categories)); ?>
                                </div>
                            <?php endif; ?>

                            <div class="main-heading">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>

                            <?php if ($show_desc) : ?>
                                <?php $card_desc = get_field('card_description'); ?>
                                <?php if (!empty($card_desc)) : ?>
                                    <div class="card_desc">
                                        <?php echo esc_html($card_desc); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="link--icon">
                                LEARN MORE <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <!-- row 3 -->
    <div class="row row3">
        <ul class="list_post">
            <?php if (!empty($row3_posts)) : ?>
                <?php foreach ($row3_posts as $post) : setup_postdata($post); ?>
                    <li class="post_item">
                        <div class="post_img">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/400x250" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="post_content">
                            <?php if ($show_categories) : ?>
                                <div class="light-heading">
                                    <?php echo wp_kses_post(tienthemes_category_links($categories)); ?>
                                </div>
                            <?php endif; ?>

                            <div class="main-heading">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>

                            <?php if ($show_desc) : ?>
                                <?php $card_desc = get_field('card_description'); ?>
                                <?php if (!empty($card_desc)) : ?>
                                    <p>
                                        <?php echo esc_html($card_desc); ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="link--icon">
                                LEARN MORE <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <div class="row row4">
        <div class="box-left">
            <div class="box-wrapper">
                <div class="header-inner">
                    <h4 class="light-header">JOIN NOW</h4>
                    <h2 class="main-header">Discover the <br> Member Benefits</h2>
                </div>
                <div class="content-inner">
                    <p>Membership provides a range of benefits<br>connected to your personal, professional and<br>organisational goals</p>
                    <a href="" class="link--icon">LEARN MORE <i class="fa-solid fa-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="box-right">
            <div class="box-wrapper">
                <div class="header-inner">
                    <h4 class="light-header">JOIN NOW</h4>
                    <h2 class="main-header">How to become <br> a Member</h2>
                </div>
                <div class="content-inner">
                    <p>Join EduGrowth and help accelerate the Australian<br>EdTech ecosystem across global stage</p>
                    <a href="" class="link--icon">LEARN MORE <i class="fa-solid fa-circle-right"></i></a>
                </div>
            </div>
        </div>

    </div>
    <div class="row row5">
        <ul class="list_card">
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/11/Strategic-Partnership-e1763511125847-400x250.png"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        EduGrowth welcomes a new partnership with EdTech New
                    </div>
                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </li>
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/11/Vinne-Schifferstein-1-1-400x250.png"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        Unlocking Scale: Marketing and Content to Drive
                    </div>

                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </li>
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/09/Masterclass-Pricing-Strategy-4-400x250.png"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        Masterclass: Unlocking the Power of Pricing with Jon
                    </div>
                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </li>
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/08/Strategic-Partnership-1-400x250.png"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        Shaping the Future of Literacy: EduGrowth Welcomes StepsWeb
                    </div>
                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </li>
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/08/A7R1707-1-400x250.jpg"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        Bringing Research into Classrooms
                    </div>

                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </li>
            <li class="card_item">
                <div class="card_img">
                    <a href="">
                        <img
                            src="https://edugrowth.org.au/wp-content/uploads/2025/08/Copy-of-0V3A0439-400x250.jpg"
                            alt="" />
                    </a>
                </div>
                <div class="card_content">
                    <div class="main-heading">
                        Masterclass: Drive EdTech Sales with Successful Pilot
                    </div>
                    <a href="" class="link--icon">LEARN MORE
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </li>
        </ul>

        <div class="link--icon-right">
            <div class="left">
                <p></p>
            </div>
            <div class="right">
                <a href="">
                    VIEW ALL
                    <i class="fa-solid fa-circle-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>