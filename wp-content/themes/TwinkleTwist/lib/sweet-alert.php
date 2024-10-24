<?php

// remove add to cart woocommerce message
add_filter('wc_add_to_cart_message_html', '__return_null');

// Wordpress Ajax PHP
add_action('wp_ajax_nopriv_item_added', 'addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'addedtocart_sweet_message');
function addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}

// jQuery Ajax
add_action('wp_footer', 'item_count_check');
function item_count_check() {
    if (is_checkout())
        return;
    ?>
    <script src="https://unpkg.com/sweetalert2@7.20.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

           /* $('body').on('click','.single_add_to_cart_button',function(e){
                var $pid = $(this).val();
                var qty =   $("input[name='quantity']").val();
                $.ajax({
                    url     :   '<?php echo site_url(); ?>/?wc-ajax=add_to_cart',
                    type    :   'POST',
                    data    :   {
                        product_id  :   $pid,
                        quantity         :   qty
                    },
                    success : function(data){
                        $.ajax({
                            type: 'POST',
                            url: wc_add_to_cart_params.ajax_url,
                            data: {
                                'action': 'item_added',
                                'id'    : $pid
                            },
                            success: function (response) {
                                if(response == $pid){
                                    const toast = swal.mixin({
                                        toast: true,
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    toast({
                                        type: 'success',
                                        title: 'Product Added To Cart'
                                    })
                                }
                            }
                        });
                    }
                })

                e.preventDefault();
                return false;
            });*/
            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        if(response == $pid){
                            const toast = swal.mixin({
                                toast: true,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            toast({
                                type: 'success',
                                title: 'Product Added To Cart'
                            })
                        }
                    }
                });
            });
        });
    </script>
    <?php
}
