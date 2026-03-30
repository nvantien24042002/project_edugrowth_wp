    <?php 
    $taxonomy_info = get_taxonomy('education-sector');
    $taxonomy_label = $taxonomy_info ? $taxonomy_info->label : '';

    $terms = get_the_terms( get_the_ID(), 'education-sector' );
   ?>
    <section class="section_content-partner">
        <div class="sidebar">
            <div class="sdebar-member">


            <?php
            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {?>
                <div class="member-infor">
                    <h4><?php echo $term->label; ?></h4>
                </div>
             <?php } ?>
            <?php } ?>




                <div class="member-connect">
                    <!-- <h4>Conntact</h4> -->
                    <a href="" class="mail-partner"></a>
                    <ul class="member-social">
                        <li><a href="" class="facebook"></a></li>
                        <li><a href="" class="twitter"></a></li>
                        <li><a href="" class="linkedin"></a></li>
                    </ul>
                </div>
                

            </div>
        </div>
        <div class="content">
            <div class="member-logo">
                LOGO
            </div>
            <div class="member-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit auctor dui, sed efficitur ligula. Donec a nunc eget enim efficitur convallis. Sed at felis ac nisl efficitur efficitur. Donec in odio a enim efficitur convallis. Sed at felis ac nisl efficitur efficitur. Donec in odio a enim efficitur convallis.</p>
            </div>
        </div>
    </section>