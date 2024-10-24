<?php
get_header();
?>

<main id="main">
   <div class="section">
       <div class="container">
           <?php

           while ( have_posts() ) :
               the_post();

               get_template_part( 'template-parts/content', 'page' );
           endwhile;
           ?>
       </div>
   </div>
</main>


<?php get_footer(); ?>