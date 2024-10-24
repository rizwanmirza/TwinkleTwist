<?php

add_action( 'add_meta_boxes', 'adding_metaboxes_sliders' );
function adding_metaboxes_sliders()
{
    add_meta_box(
        'showing_products_on_sliders',
        'Slider Sub Title',
        'sa_apo_mws_products_listings_sliders',
        'sliders',
        'normal',
        'default'
    );
}

function sa_apo_mws_products_listings_sliders($slider)
{
    $sub_title      =   get_post_meta($slider->ID,'sub_title',true);
    ?>
    <div>
        <input type="text" name="sub_title" value="<?php echo $sub_title;?>">
    </div>
    <?php
}

function sa_apo_mws_save_slider_meta_sliders( $post_id, $post ) {

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
            if ($post->post_type == 'sliders'){
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

add_action( 'save_post', 'sa_apo_mws_save_slider_meta_sliders', 1, 2 );


add_shortcode('sliders',function($attr){
    ob_start();

    $sliders  = new WP_Query([
        'post_type'     => 'sliders',
        'showposts'     => 2
    ]);


    ?>
    <div class="banner">
        <div class="banner-slider">
            <?php while ($sliders->have_posts()):$sliders->the_post();?>
                <?php $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                $sub_title      =   get_post_meta(get_the_ID(),'sub_title',true);
                ?>
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="banner-text">
                                    <span class="sub-title"><?php echo $sub_title ?></span>
                                    <h1><?php echo the_title()?></h1>
                                    <p><?php echo the_content()?></p>
                                    <a href="<?php echo site_url()?>/shop" class="btn"> Shop Now</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-box">
                                    <img src="<?php echo !empty($feature_image) ? esc_url($feature_image[0]) : ''; ?>" alt="<?php the_title_attribute(); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    </div>
    <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
});