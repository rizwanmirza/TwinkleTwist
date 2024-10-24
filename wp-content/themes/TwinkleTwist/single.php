<?php
get_header();
?>
    <main id="main">
       <div class="container">
           <?php

           while ( have_posts() ) :
               the_post();

               get_template_part( 'template-parts/content', 'single' );
           endwhile;
           ?>
       </div>
    </main>


<?php get_footer(); ?>