<?php

add_action( 'add_meta_boxes', 'mws_apo_adding_metaboxes_recomendedbanners' );
function mws_apo_adding_metaboxes_recomendedbanners()
{
    add_meta_box(
        'showing_products_on_recomendedbanners',
        'Category URL',
        'sa_apo_mws_products_listings_recomendedbanners',
        'recomendedbanners',
        'normal',
        'default'
    );
}

function sa_apo_mws_products_listings_recomendedbanners($slider)
{
    $sub_title      =   get_post_meta($slider->ID,'sub_title',true);
    ?>
    <div>
        <input type="text" name="sub_title" value="<?php echo $sub_title;?>">
    </div>
    <?php
}

function sa_apo_mws_save_slider_meta_recomendedbanners( $post_id, $post ) {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    if (!empty($_POST)){
        $author                         =   $_POST['sub_title'];
        $portfolio['sub_title']       =   esc_textarea($author);
        foreach ( $portfolio as $key => $value ) :
            if ( 'revision' === $post->post_type ) {
                return;
            }
            if ($post->post_type == 'recomendedbanners'){
                if ( get_post_meta( $post_id, $key, false ) ) {
                    update_post_meta( $post_id, $key, $value );
                } else {

                    add_post_meta( $post_id, $key, $value);
                }
                if ( ! $value ) {
                    delete_post_meta( $post_id, $key );
                }
            }
        endforeach;
    }
}
add_action( 'save_post', 'sa_apo_mws_save_slider_meta_recomendedbanners', 1, 2 );
add_shortcode('recomendedbanners',function($attr){
    ob_start();
    $sub_title =    !empty($attr['subtitle']) ? $attr['subtitle'] :'';
    $title =    !empty($attr['title']) ? $attr['title'] :'';
    $recomendedbanners  = new WP_Query([
        'post_type'     => 'recomendedbanners',
        'showposts'     => 3,
        'order'         => 'ASC'
    ]);


    ?>
    <section class="section">
        <div class="section-header text-center">
            <h2><?php echo $title;?></h2>
            <div class="sub-title"><?php echo $sub_title;?></div>
        </div>
        <div class="col-list recomended">
            <?php while ($recomendedbanners->have_posts()):$recomendedbanners->the_post();?>
                <?php $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                $sub_title      =   get_post_meta(get_the_ID(),'sub_title',true);
                ?>
                <div class="col">
                    <div class="product-box">
                        <div class="img-box" style="background-image: url(<?php echo !empty($feature_image) ? $feature_image[0] : '' ?>)">
                            <div class="description">
                                <h1><?php echo the_title()?></h1>
                                <p><?php echo the_content()?></p>
                                <a href="<?php echo site_url()?>/shop" class="btn"> Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile;?>
        </div>
    </section>
    <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
});