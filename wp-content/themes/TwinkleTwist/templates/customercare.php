<?php
/**
 * Template Name: customer care
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
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center">
                        <h3>Feel Free to Contact us at any time </h3>
                        <p>You can contact us with anything related to ventuno.
                            We'll get in touch with you as soon as possible.</p>
                    </div>
                    <div class="form">
                        <?php echo do_shortcode( '[contact-form-7 id="316" title="Customer Care"]' );?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();

