<?php

add_action( 'add_meta_boxes', 'mws_apo_adding_metaboxes_partners' );
function mws_apo_adding_metaboxes_partners()
{
    add_meta_box(
        'showing_products_on_partners',
        'Slider Sub Title',
        'sa_apo_mws_products_listings_partners',
        'partners',
        'normal',
        'default'
    );
}

function sa_apo_mws_products_listings_partners($slider)
{
    $sub_title      =   get_post_meta($slider->ID,'sub_title',true);
    ?>
    <div>
        <input type="text" name="sub_title" value="<?php echo $sub_title;?>">
    </div>
    <?php
}

function sa_apo_mws_save_slider_meta_partners( $post_id, $post ) {

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
            if ($post->post_type == 'partners'){
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
add_action( 'save_post', 'sa_apo_mws_save_slider_meta_partners', 1, 2 );
add_shortcode('partners',function($attr){
    ob_start();

    $partners  = new WP_Query([
        'post_type'     => 'partners',
        //'showposts'     => 1
    ]);


    ?>
    <section class="section  bg-3 p-0">
        <div class="brand-slider">
            <?php while ($partners->have_posts()):$partners->the_post();?>
                <?php $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                $sub_title      =   get_post_meta(get_the_ID(),'sub_title',true);
                ?>
                <div>
                    <div class="img-box">
                        <img src="<?php echo !empty($feature_image) ? $feature_image[0] : '' ?>" alt="<?php echo the_title()?>">
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