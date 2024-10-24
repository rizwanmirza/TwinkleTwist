<?php



add_shortcode('productcategary',function($attr){
    ob_start();
    $sub_title =    !empty($attr['subtitle']) ? $attr['subtitle'] :'';
    $title =    !empty($attr['title']) ? $attr['title'] :'';
    $product_terms = get_terms( 'product_cat', array(
        'hide_empty' => false,
        //'parent' => 0
    ));

    ?>
    <section class="section bg-2">
        <div class="section-header text-center">
            <h2><?php echo $title;?></h2>
            <div class="sub-title"><?php echo $sub_title;?></div>
        </div>
        <div class="product-list1 category-slider">
            <?php foreach ($product_terms as $term){?>
                <?php  $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );

                $image = wp_get_attachment_url( $thumbnail_id ); ?>
                <div class="col">
                    <div class="product-box">
                        <a class="img-box" href="<?php echo get_term_link($term->term_id,$term->taxonomy);?>">
                            <img src="<?php echo (!empty($image)?$image:'') ?>">
                        </a>
                        <!--<div class="description">
                            <h3><a href="<?php /*echo get_term_link($term->term_id,$term->taxonomy);*/?>"><?php /*echo $term->name;*/?></a></h3>
                        </div>-->
                    </div>
                </div>
            <?php }?>
        </div>
        <div class="btn-row text-center mt-5 mb-5">
            <a href="<?php echo site_url()?>/shop" class="btn">View more</a>
        </div>
    </section>
    <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
});


