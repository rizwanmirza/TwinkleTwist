<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<section class="section blog-detail">
    <div class="container">
        <h1><?php the_title()?></h1>
        <?php $feature_image  =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );?>
        <img class="ful-width" src="<?php echo !empty($feature_image)?$feature_image[0]:''?>" alt="<?php the_title()?>">
        <?php the_content();?>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="comments">
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            if ( is_singular( 'attachment' ) ) {
                the_post_navigation(
                    array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
                    )
                );
            } elseif ( is_singular( 'post' ) ) {
                echo '<div class="next_pagination">';
                the_post_navigation(
                    array(
                        'next_text' => '<span class="meta-nav btn blue" aria-hidden="true">' . __( 'Next', 'sa' ) . '</span> ',
                        'prev_text' => '<span class="meta-nav btn" aria-hidden="true">' . __( 'Previous', 'sa' ) . '</span> ',
                    )
                );
                echo '</div>';
            }
            ?>

        </div>
    </div>
</section>
