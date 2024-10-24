
<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<section class="section">
    <div class="container">
        <div class="cto">
            <div class="col">
                <div class="icon-box">
                    <i class="fal ico1"></i>
                </div>
                <div class="description">
                    <h4>Free Delivery</h4>
                    <p>For all oders over $100</p>
                </div>
            </div>
            <div class="col">
                <div class="icon-box">
                    <i class="fal ico2"></i>
                </div>
                <div class="description">
                    <h4>Easy Return </h4>
                    <p>If goods have problems</p>
                </div>
            </div>
            <div class="col">
                <div class="icon-box">
                    <i class="fal ico3"></i>
                </div>
                <div class="description">
                    <h4>Secure Payment</h4>
                    <p>100% secure payment</p>
                </div>
            </div>
            <div class="col">
                <div class="icon-box">
                    <i class="fal ico4"></i>
                </div>
                <div class="description">
                    <h4>24/7 SUPPORT</h4>
                    <p>Dedicated support</p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer">
    <div class="container">
        <div class="footer-header">
            <?php
            $footer_logo_url = get_theme_mod( 'footer_logo' );
            if ( $footer_logo_url ) : ?>
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Footer Logo">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer-middle">

            <div class="col">
                <h4>Quick Links</h4>
                <ul class="quick-links">
                    <?php wp_nav_menu(
                        array(
                            'menu'      => 'Quick Links',
                            'container'  => '',
                            'items_wrap' => '%3$s',
                            'theme_location' => 'primary',
                        )
                    );?>
                </ul>
            </div>
            <div class="col">
                <h4>info</h4>
                <ul class="quick-links">
                    <?php wp_nav_menu(
                        array(
                            'menu'      => 'Quick Links2',
                            'container'  => '',
                            'items_wrap' => '%3$s',
                            'theme_location' => 'primary',
                        )
                    );?>
                </ul>
            </div>
            <div class="col">
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
                <form class="subscribe-form">
                    <div class="text-center">
                        <h4>Subscribe to Newsletter</h4>
                        <p>Get the latest updates on new products
                            and upcoming sales.</p>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter email here...">
                        <button type="submit" class="btn">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- <ul class="social-links">
            <?php /*wp_nav_menu(
                array(
                    'menu'      => 'Social links',
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'primary',
                )
            );*/?>
        </ul>-->
        <div class="bottom-footer">
            <div class="copy-rights text-center">&copy;
                <?php
                echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
                    _x( 'Y', 'copyright date format', 'twentytwenty' )
                );
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                Copyrights Reserved.
            </div>
        </div>
    </div>
    <div class="chat-box">
        <i class="fal fa-sms"></i>
        <div class="chat-drop">
            <a href="https://wa.me/920000000" class="whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="tel:+920000000" class="call"><i class="fal fa-phone"></i></a>
        </div>
    </div>

</footer>



<?php wp_footer(); ?>
</body>
</html>
