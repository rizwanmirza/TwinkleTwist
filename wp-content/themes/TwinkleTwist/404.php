<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="main" role="main">

	<section class="section error">
        <div class="container">
           <div class="content">
               <div class="oops">OOPS!</div>
               <h1><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h1>
               <div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>

               <?php
               get_search_form(
                   array(
                       'label' => __( '404 not found', 'twentytwenty' ),
                   )
               );
               ?>

               <p>or ... do the same as Mikkel is doing here</p>

               <div class="img-box" style="max-width: 460px;margin: 0 auto 30px">
                   <img src="<?php echo get_template_directory_uri()?>/images//404-image.webp">
                   <div
           </div>
        </div>
    </section>
  


</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
