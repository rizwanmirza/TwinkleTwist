<?php
    add_shortcode('popularCollection',function ($attr){
        ob_start();
        $sub_title =    !empty($attr['subtitle']) ? $attr['subtitle'] :'';
        $title =    !empty($attr['title']) ? $attr['title'] :'';

        global  $woocommerce;
        $product_category_id   =   !empty($attr['cat_id']) ? $attr['cat_id']:'';

        $term_id   =   !empty($attr['cat_id']) ? $attr['cat_id']:'';

        $showposts             =   !empty($attr['showposts']) ? $attr['showposts']:8;
        if (isset($product_category_id) )
        {
            $tax_query_cat = [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => [$term_id],
            ];
            $tax_query[] = $tax_query_cat;
            $args['tax_query'] = $tax_query;

            $products   =   get_posts([
                'post_type'     =>  'product',
                'showposts'     =>  '10'
            ]);
        }
        ob_start();
        ?>
        <section class="section collection">
            <div class="col">

                <div class="section-header text-center">
                    <h2><?php echo $title;?></h2>
                    <div class="sub-title"><?php echo $sub_title;?></div>
                </div>
                <div class="btn-row p-lg-5 text-right">
                    <a href="<?php echo  site_url()?>/shop">View more</a>
                </div>
            </div>
            <div class="col">
                <div class="three-col-slider2">
                    <?php
                    foreach ($products as $row)
                    {
                        $product            =   wc_get_product($row->ID);
                        $attachment_ids = $product->get_gallery_image_ids();
                        $gallery_ids = !empty($attachment_ids[0])?$attachment_ids[0]:0;
                        $image_link = '';
                        if (!empty($gallery_ids)){
                            $image_link = wp_get_attachment_url( $gallery_ids );
                        }
                        $feature_image      =   wp_get_attachment_image_src(get_post_thumbnail_id($row->ID), 'full');
                        $attechment_image   =   wp_get_attachment_image_src(get_post_thumbnail_id($row->ID), 'full');

                        ?>
                        <div class="col">
                            <div class="product-box">
                                <a class="img-box" href="<?php echo get_permalink($row->ID)?>">
                                    <img src="<?php echo (!empty($feature_image)?$feature_image[0]:'');?>" alt="">
                                </a>
                                <?php if ( $product->is_on_sale() ) : ?>

                                    <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
                                <?php
                                endif; ?>
                                <div class="description">
                                    <h3 class="title"><a href="<?php echo get_permalink($row->ID)?>"><?php echo $row->post_title;?></a></h3>
                                    <div class="prduct-price"><?php echo $product->get_price_html();?></div>
                                </div>
                                <ul class="btn-list">
                                    <li><a href="<?php echo site_url();?>/?add-to-cart=<?php echo $row->ID;?>" class="add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $row->ID ?>"><i class="fal fa-shopping-cart"></i> </a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="<?php echo get_permalink($row->ID)?>"><i class="fal fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <?php
        $output_string = ob_get_contents();
        ob_end_clean();
        return $output_string;
        wp_reset_postdata();
    });
