<?php



add_shortcode('home_blog',function ($attr){
    global $wp_query;
    $title           =   !empty($attr['title'])?$attr['title']:"Our BLog";
    $description            =   !empty($attr['description'])?$attr['description']:"description";

    ob_start();
    $current_term_id    =   0;
    if (!empty($wp_query->queried_object->taxonomy) && $wp_query->queried_object->taxonomy == 'category'){
        $args           =   [
            'post_type'     =>  'post',
            'showposts'     =>  $limit,
            'tax_query'     =>  [
                array (
                    'taxonomy' => $wp_query->queried_object->taxonomy,
                    'field' => 'slug',
                    'terms' => $wp_query->queried_object->slug,
                )
            ]
        ];
        $current_term_id    =   $wp_query->queried_object->term_id;
    }
    else
    {
        $args           =   [
            'post_type'     =>  'post',
            'order'         => 'ASC',
            'showposts'     =>  3
        ];
    }

    $blogs   =   new WP_Query($args);
    $post_datas =   [];
    ?>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-header">
                        <h2 class="text-center"><?php echo $title;?></h2>
                        <p class="text-center"><?php echo $description;?></p>
                    </div>
                </div>
            </div>

            <?php global $post; if($blogs->have_posts()){?>
                <?php while($blogs->have_posts()):$blogs->the_post();?>
                    <?php $feature_image  =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $term                   =   get_the_terms(get_the_ID(),'category');
                    $post_datas[]   =   [
                        'post_title'        =>  get_the_title(),
                        'post_excerpt'      =>  get_the_excerpt(),
                        'permalink'         =>  get_the_permalink(),
                        'category_name'     =>  !empty($term[0])?$term[0]->name:'',
                        'feature_image'     =>  !empty($feature_image)?$feature_image[0]:'',
                        'post_date'         =>  date("F d,Y h:i A",strtotime($post->post_date)),
                    ];
                    ?>
                <?php endwhile;?>
            <?php }?>
            <div class="blog-list blog-list-slider">
                <?php if(count($post_datas)>0){?>
                    <?php foreach ($post_datas as $key => $row){?>

                        <div class="col">
                            <div class="product-box">
                                <a href="<?php echo $row['permalink'];?>" class="img-box d-block" style="background-image: url(<?php echo $row['feature_image'];?>)"></a>
                                <div class="description">
                                    <div class="time mb-3 text-muted"><small><time><?php echo $row['post_date']; ?></time></small></div>
                                    <h3><a href="<?php echo $row['permalink'];?>"><?php echo $row['post_title'];?></a> </h3>
                                    <p><?php echo $row['post_excerpt'];?></p>
                                </div>
                            </div>
                        </div>

                    <?php }?>
                <?php }else{?>
                    <div class="alert alert-danger text_danger">post not founds</div>
                <?php }?>
            </div>
            <?php if ($is_pagination ==1){?>
                <div class="pagination_class">
                    <?php sa_mws_pagination($blogs);?>
                </div>
            <?php }?>
            <?php if($show_link==1){?>
                <div class="row btn-row">
                    <div class="col-lg-12">
                        <a href="<?php echo site_url('blog')?>" class="btn gradient-btn">Get In Touch <i class="fa fa-angle-right"></i> </a>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>


    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
});