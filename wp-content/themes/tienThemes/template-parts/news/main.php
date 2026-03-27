  <?php

    $show_desc = !empty($config['show_desc']);
    var_dump($show_desc);
    $args = array(
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'post_status'    => 'publish',
        'orderby' => "date",
        'order' => 'DESC',
        'config' => [
            'show_categories' => true,
            'show_desc' => true
        ],
        'tax_query' => array(
            'relation' => 'AND',
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['news'],
            ],
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['thought-leadership'],
            ],
        )
    );
    $query = new WP_Query($args);
    echo "<pre>";
    print_r($query);
    echo "</pre>";

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
              <?php if ($query->have_posts()) : ?>
                  <?php while ($query->have_posts()) : $query->the_post(); ?>
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
                              <div class="light-heading">
                                  <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $cat_links = array();
                                        foreach ($categories as $category) {
                                            $cat_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                        }
                                        echo implode(', ', $cat_links);
                                    }
                                    ?>
                              </div>

                              <div class="main-heading">
                                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                              </div>


                              <?php if ($show_desc) : ?>
                                  <?php $card_desc = get_field('card_description'); ?>
                                  <?php if (!empty($card_desc)) : ?>
                                      <div class="card_desc">
                                          <?php echo esc_html($card_desc); ?>
                                      </div>
                          </div>
                      <?php endif; ?>
                  <?php endif; ?>


                  <a href="<?php the_permalink(); ?>" class="link--icon">
                      LEARN MORE <i class="fas fa-arrow-circle-right"></i>
                  </a>
      </div>
      </li>
  <?php endwhile;
                    wp_reset_postdata(); ?>
  <?php else : ?>
  <?php endif; ?>
  </ul>
  </div>
  <div class="row row3">
      <ul class="list_post">
          <!-- 1 -->
          <li class="post_item">
              <div class="post_img">
                  <a href="">
                      <img
                          src="https://edugrowth.org.au/wp-content/uploads/2025/11/Masterclass-Product-Roadmap-2-400x250.png"
                          alt="" />
                  </a>
              </div>
              <div class="post_content">
                  <div class="light-heading">
                      <a href="">News, Thought Leadership</a>
                  </div>
                  <div class="main-heading">
                      Masterclass: Designing a Product Roadmap for Scalable EdTech
                      Growth
                  </div>
                  <p>
                      In today’s rapidly changing digital landscape, the
                      discipline of product management is evolving faster than
                      ever before. What used to be a world defined by detailed
                      project plans, tightly scoped requirements and long delivery
                      cycles has transformed into something far...
                  </p>
                  <a href="" class="link--icon">LEARN MORE
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </li>
          <li class="post_item">
              <div class="post_img">
                  <a href="">
                      <img
                          src="https://edugrowth.org.au/wp-content/uploads/2025/11/Snapshot-400x250.png"
                          alt="" />
                  </a>
              </div>
              <div class="post_content">
                  <div class="light-heading">
                      <a href="">News, Thought Leadership</a>
                  </div>
                  <div class="main-heading">
                      2025 Australian EdTech Snapshot: Five Findings That Matter
                  </div>
                  <p>
                      Last week, EduGrowth hosted an exclusive Snapshot Briefing
                      for members, presenting the latest data and insights from
                      the 2025 Australian EdTech Snapshot. The Snapshot is one of
                      the core research initiatives produced by EduGrowth each
                      year. It maps the scale,...
                  </p>
                  <a href="" class="link--icon">LEARN MORE
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
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