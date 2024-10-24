<?php
global $wp_query,$page;
global $woocommerce;
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/main.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700&display=swap" rel="stylesheet">

    </head>

	<body <?php body_class(); ?>>


        <div id="wrapper" class="<?php echo ((!is_front_page())?'inner':'');?>">

            <header id="header" class="d-none">
                <div class="top-header">
                    <div class="container">
                        <div class="welcome-text">
                            Welcome to <?php bloginfo( 'name' ); ?> online store!
                        </div>
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
                <div class="main-header">
                    <div class="container">
                        <a href="#" class="nav-opener"><i class="fal fa-bars"></i></a>
                        <div class="logo">
                            <?php echo get_custom_logo();?>
                        </div>

                        <nav id="nav">
                            <div class="logo">
                                <?php echo get_custom_logo();?>
                            </div>
                            <ul>
                                <?php wp_nav_menu(
                                    array(
                                        'menu'      => 'Main Menu',
                                        'container'  => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                    )
                                );?>
                            </ul>
                        </nav>
                        <div class="header-btn-list">
                            <div class="col">
                                <a href="#" class="btn search-opener"><i class="fal fa-search"></i></a>
                                <div class="search-box">
                                    <div class="container">
                                        <form role="search" method="get" class="search-form" action="<?php echo home_url(''); ?>">
                                            <div class="form-group">
                                                <input required="required" class="form-control" type="search" placeholder="Search..." value="<?php echo get_search_query() ?>" name="s" title="" />
                                                <input type="hidden" name="post_type" value="product">
                                                <button class="btn" type="submit">Search</button>
                                            </div>
                                        </form>
                                        <a href="#" class="search-opener"><i class="fal fa-times"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col dropdown">
                                <a href="#" class="btn">
                                    <i class="fal fa-user"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if (!is_user_logged_in()) { ?>
                                        <li><a href="<?php echo site_url('my-account')?>">Login</a></li>
                                        <li><a href="<?php echo site_url('my-account')?>">Register</a></li>
                                        <?php
                                    } else { ?>
                                        <li>
                                            <a  href="<?php echo site_url('my-account')?>">My Account</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col cart-box">
                                <a href="<?php echo site_url('cart')?>" class="btn">
                                    <i class="fal fa-baby-carriage shopping-cart"></i>
                                    <span class="counter"><?php echo  count($woocommerce->cart->cart_contents);?></span>
                                </a>

                                <div class="mini-cart-dropdown">
                                    <div id="mini-cart-container">
                                        <?php echo woocommerce_mini_cart()?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </header>
            <header id="header">
                <div class="top-header">
                    <div class="container">
                        <ul class="user-account-list">
                            <li class="userDropdown">
                                <a href="#"><i class="fal fa-user"></i></a>
                                <ul class="dropdown-menu">
                                    <?php if (!is_user_logged_in()) { ?>
                                        <li><a href="<?php echo site_url('my-account')?>">Login</a></li>
                                        <li><a href="<?php echo site_url('my-account')?>">Register</a></li>
                                        <?php
                                    } else { ?>
                                        <li>
                                            <a  href="<?php echo site_url('my-account')?>">My Account</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="btn search-opener"><i class="fal fa-search"></i></a>
                                <div class="search-box">
                                    <div class="container">
                                        <form role="search" method="get" class="search-form" action="<?php echo home_url(''); ?>">
                                            <div class="form-group">
                                                <input required="required" class="form-control" type="search" placeholder="Search..." value="<?php echo get_search_query() ?>" name="s" title="" />
                                                <input type="hidden" name="post_type" value="product">
                                                <button class="btn" type="submit">Search</button>
                                            </div>
                                        </form>
                                        <a href="#" class="search-opener"><i class="fal fa-times"></i> </a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-box">
                                <a href="<?php echo site_url('cart')?>" class="btn">
                                    <i class="fal fa-baby-carriage shopping-cart"></i>
                                    <span class="counter"><?php echo  count($woocommerce->cart->cart_contents);?></span>
                                </a>
                                <div class="mini-cart-dropdown">
                                    <div id="mini-cart-container">
                                        <?php echo woocommerce_mini_cart()?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="ticker-text">Summer Sale: Enjoy Up to 50% off Selected Styless at <?php bloginfo( 'name' ); ?> online store!. <a href="#"><b>See Details</b></a> </p>
                    </div>
                </div>
                <div class="middle-header">
                    <div class="container">
                        <div class="logo">
                            <?php echo get_custom_logo();?>
                        </div>
                        <a href="#" class="nav-opener"><i class="fal fa-bars"></i></a>
                        <nav id="nav">
                            <ul>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu' => 'Main Menu',
                                        'container' => false,
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                        'walker' => new Custom_Walker_Nav_Menu(),
                                    )
                                );
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            <?php
            // If it's the front page, display the slider shortcode
            if (is_front_page()) {
                echo do_shortcode('[sliders]');
            }

            // If it's a WooCommerce product category page, show the category name
            elseif (is_product_category()) {
                $term = $wp_query->get_queried_object(); // Get the queried category object
                $feature_image = wp_get_attachment_image_src(get_term_meta($term->term_id, 'thumbnail_id', true), 'full'); // Get category image
                $data['url'] = !empty($feature_image) ? $feature_image[0] : $default_image;

                ?>
                <div class="banner">
                    <div class="container">
                        <div class="banner-holder">
                            <div class="banner-text">
                                <h1><?php echo $term->name; // Display category name ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            // If it's the WooCommerce shop page, show the shop title
            elseif (is_shop()) {
                $shop_page_id = wc_get_page_id('shop'); // Get the shop page ID
                $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($shop_page_id), 'full'); // Get shop page image
                $data['url'] = !empty($feature_image) ? $feature_image[0] : $default_image;

                ?>
                <div class="banner">
                    <div class="container">
                        <div class="banner-holder">
                            <div class="banner-text">
                                <h1><?php echo get_the_title($shop_page_id); // Display the shop page title ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            // For other pages or posts
            else {
                $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                ?>
                <div class="banner">
                    <div class="container">
                        <div class="banner-holder">
                            <div class="banner-text">
                                <h1>
                                    <?php
                                    if (is_singular()) {
                                        // Display the title of singular pages or posts
                                        echo get_the_title();
                                    } else {
                                        // Display archive or other type of title
                                        echo single_post_title('', false);
                                    }
                                    ?>
                                </h1>
                                <?php woocommerce_breadcrumb(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
