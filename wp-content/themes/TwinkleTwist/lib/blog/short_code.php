<?php

add_shortcode('blog',function ($attr){
    global $wp_query;
    $sub_title          =   !empty($attr['sub_title'])?$attr['sub_title']:"Blog";
    $heading            =   !empty($attr['heading'])?$attr['heading']:"Our BLog";
    $limit              =   !empty($attr['limit'])?$attr['limit']:12;
    $is_pagination      =   (!empty($attr['is_pagination']) && $attr['is_pagination'] ==1)?1:0;
    $show_link          =   (!empty($attr['show_link']) && $attr['show_link'] ==1)?1:0;
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
            'showposts'     =>  $limit
        ];
    }
    $blog_terms = get_terms( 'category', array(
        'hide_empty' => false,
    ));
    if ($is_pagination ==1){
        $args['paged']  =   get_query_var('paged');
    }
    $blogs   =   new WP_Query($args);
    $post_datas =   [];
    ?>
    <section class="section">
        <div class="container">
           <div class="section-header">
               <h1><?php echo $heading;?></h1>
               <div class="sub-title"><?php echo $sub_title?></div>
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
            <?php if(!empty($post_datas[0])){?>
                <?php $top_image    =   $post_datas[0];?>
                <div class="blog-main-section">

                    <div class="product-box">
                        <a href="<?php echo  $top_image['permalink'];?>" class="img-box">
                            <img src="<?php echo $top_image['feature_image'];?>" alt="blog1">
                        </a>
                        <div class="description">
                            <h2><?php echo $top_image['post_title'];?></h2>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <b>Publish:</b>
                                    <time><?php echo $top_image['post_date'];?></time>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <b>Category</b>
                                    <small><?php echo $top_image['category_name']; ?></small>
                                </div>
                            </div>


                            <p><?php echo $top_image['post_excerpt'];?></p>
                            <p><a class="more-link" href="<?php echo $top_image['permalink'];?>">Read More</a> </p>
                        </div>
                    </div>
                </div>
            <?php }?>

            <div class="col-list blog">
                <?php if(count($post_datas)>0){?>
                    <?php foreach ($post_datas as $key => $row){?>
                        <?php if ($key !=0){?>
                            <div class="col">
                                <div class="product-box">
                                    <div class="col" title="<?php echo $row['post_title'];?>">
                                        <a href="<?php echo $row['permalink'];?>" class="img-box">
                                            <img src="<?php echo $row['feature_image'];?>" alt="blog1">
                                        </a>
                                        <div class="description">
                                            <h2><?php echo $row['post_title'];?></h2>
                                            <time><?php echo $row['post_date']; ?></time>
                                            <small><?php echo $row['category_name']; ?></small>
                                            <p><?php echo $row['post_excerpt'];?></p>
                                            <p class="mt-3"><a class="more-link" href="<?php echo $row['permalink'];?>">Read More</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
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