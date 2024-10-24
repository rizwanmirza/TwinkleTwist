<?php

add_shortcode('faqs',function($attr){
    ob_start();

    $sub_title =    !empty($attr['subtitle']) ? $attr['subtitle'] :'';
    $title =    !empty($attr['title']) ? $attr['title'] :'';
    $image =    !empty($attr['bg_image']) ? $attr['bg_image'] :'';

    $faqs  = new WP_Query([
        'post_type'     => 'faqs',
        //'showposts'     => 1
    ]);


    ?>
    <section class="section">
        <div class="container">
            <ul class="accordion">
                <?php while ($faqs->have_posts()):$faqs->the_post();?>
                    <?php $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                    $sub_title      =   get_post_meta(get_the_ID(),'sub_title',true);
                    ?>
                    <li>
                        <a class="opener" href="#"><?php echo the_title(); ?></a>
                        <div class="slide">
                            <div><?php the_content()?></div>
                        </div>
                    </li>
                <?php endwhile;?>
            </ul>
        </div>
    </section>
    <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
});


