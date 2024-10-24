<?php
/**
 * Template Name: FAQs
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_header();
?>

<main id="main">
   <?php  echo do_shortcode( 'faqs' ); ?>
    <section class="section contactus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Feel Free to Contact us at any time </h3>
                    <p>You can contact us with anything related to ventuno.
                        We'll get in touch with you as soon as possible.</p>
                    <div class="form">
                        <?php echo do_shortcode( '[contact-form-7 id="123" title="Contact form 1"]' );?>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="map-box">
                        <?php dynamic_sidebar('google-map'); ?>
                    </div>
                    <?php dynamic_sidebar('contact-address'); ?>
                    <h6>Follow Us</h6>
                    <ul class="social-links pt-5">
                        <?php wp_nav_menu(
                            array(
                                'menu'      => 'Social Links',
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'primary',
                            )
                        );?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();

