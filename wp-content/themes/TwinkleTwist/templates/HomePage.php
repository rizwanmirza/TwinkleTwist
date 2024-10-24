<?php
/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
get_header();
?>

<main id="main">

       <?php
       while ( have_posts() ) :
           the_post();
           the_content();
       endwhile;
       ?>

</main>
<?php
get_footer();

