<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
$attachment_ids = $product->get_gallery_image_ids();
$gallery_ids = !empty($attachment_ids[0])?$attachment_ids[0]:0;
$image_link = '';
if (!empty($gallery_ids)){
    $image_link = wp_get_attachment_url( $gallery_ids );
}
?>
<div class="col">
    <?php	//do_action( 'woocommerce_before_shop_loop_item' );?>

    <?php

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    //do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>

    <div class="product-box">
        <?php  $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'large');?>
        <div class="img-box">
            <a class="d-block img-box" href="<?php echo get_permalink($row->ID)?>">
                <img src="<?php echo !empty($thumbnail[0])?$thumbnail[0]:''?>)" alt="#" />
            </a>
            <div class="layout">
                <!--                    --><?php
                //
                //                    /**
                //                     * Hook: woocommerce_after_shop_loop_item.
                //                     *
                //                     * @hooked woocommerce_template_loop_product_link_close - 5
                //                     * @hooked woocommerce_template_loop_add_to_cart - 10
                //                     */
                //                    do_action( 'woocommerce_after_shop_loop_item' );
                //
                //                    ?>
                <ul class="action-list">
                    <li> <a class="btn" href="<?php echo get_permalink();?>"><i class="fal fa-eye"></i> View</a></li>
                    <li><a href="#"><i class="fal fa-heart"></i> Wishlist</a></li>
                    <li class="cart-btn"><a href="#" class="btn">ADD TO CART</a></li>
                </ul>

            </div>
        </div>

        <div class="description text-center">
            <h5 class="title"><a href="<?php echo get_permalink($product->ID)?>"><?php echo the_title()?></a></h5>

            <?php /*echo !empty(get_star_rating())?get_star_rating():''; */?>
            <?php /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );

            ?>




        </div>
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */



        /**
         * Hook: woocommerce_shop_loop_item_title.
         *
         * @hooked woocommerce_template_loop_product_title - 10
         */
        /*do_action( 'woocommerce_shop_loop_item_title' );*/





        ?>
    </div>
</div>
