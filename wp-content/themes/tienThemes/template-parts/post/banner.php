<?php

?>
<section class="post-banner">
    <div class="post-left">
        <div class="post-category">
            <?php
                $terms = get_the_terms( $post->ID, 'category' );
                if ( empty( $terms ) ) {
                    return;
                }
                foreach($terms as $key => $c){
                    $cat = get_category( $c );
                    if ( !empty( $cat ) ) {
                        if($key == 0) {
                        ?>
                        <span class="category"><?php echo $cat->cat_name; ?></span>
                        <?php

                        }else {
                            ?>
                            <span class="slitter">-</span>
                            <span class="category"><?php echo $cat->cat_name; ?></span>
                        <?php
                        }
                    }
                }
            ?>
        </div>
        <div class="post-heading">
            <?php echo $post->post_title; ?>
        </div>
    </div>
    <div class="post-right">
        <div class="post-thumb">
            <?php
                $thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
            ?>
            <img src="<?php echo $thumbnail_url; ?>" alt="" class="post-img">
        </div>
    </div>
</section>