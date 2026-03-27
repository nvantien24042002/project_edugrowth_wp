  <section class="section_banner">
      <div class="banner_wrapper">
          <div class="box-text">
              <h4><?php the_title() ?></h4>
          </div>
      </div>
  </section>
  <style>
      .section_banner {
          background: url(<?php echo get_the_post_thumbnail_url($post->id,) ?>) center / cover no-repeat;
          ;
      }
  </style>