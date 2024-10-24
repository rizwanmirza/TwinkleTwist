<?php
/**
 * Template Name: Contact Us
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_header();
?>

<main id="main">
    <section class="section">
        <div class="container">
            <div class="section-header mb-5">
                <h2>Feel Free to Contact us at any time </h2>
                <div class="sub-title">You can contact us with anything related to ventuno.
                    We'll get in touch with you as soon as possible.</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <?php echo do_shortcode( '[contact-form-7 id="123" title="Contact form 1"]' );?>
                    </div>

                </div>
                <div class="col-md-6">
                    <h4>Contact Info</h4>
                    <ul class="contact-list">
                        <?php wp_nav_menu(
                            array(
                                'menu'      => 'Contact List',
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'primary',
                            )
                        );?>
                    </ul>
                    <h4>Find Us</h4>
                    <ul class="social-links">
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

