<?php
define('LIB_THEME',__DIR__);
include_once LIB_THEME.'/blog/index.php';
include 'homepgae-blog.php';
include 'slider.php';
include 'faqs.php';
include 'popularCollection.php';
include 'productcategories.php';
include 'featuredCollection.php';
include 'smallbanner.php';
include 'recomended.php';
include 'partners.php';
include 'sweet-alert.php';

function pre($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function mws_apo_theme_scripts_function() {

    wp_enqueue_script( 'BOOT.bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'dddmain.js', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true );
    wp_enqueue_script( 'ssslick.js', get_template_directory_uri() . '/js/slick.js', array('jquery'), false, true );
}
add_action('wp_enqueue_scripts','mws_apo_theme_scripts_function');

function mws_apoe_custom_post_type_sliders() {

    $post_types     =   [
        [
            'names'         =>  "Sliders",
            'singular_name' =>  'Slider',
            'supports'      => [ 'title', 'editor', 'thumbnail', 'sub-title']
        ],
        [
            'names'         =>  "Recomended Banners",
            'singular_name' =>  'recomendedbanner',
            'supports'      => [ 'title', 'editor', 'thumbnail', 'sub-title']
        ],
        [
            'names'         =>  "Small Banners",
            'singular_name' =>  'smallbanner',
            'supports'      => [ 'title', 'editor', 'thumbnail', 'sub-title']
        ],

        [
            'names'         =>  "Partners",
            'singular_name' =>  'Partner',
            'supports'      => [ 'title', 'editor', 'thumbnail']
        ],

        [
            'names'         =>  "FAQs",
            'singular_name' =>  'FAQ',
            'supports'      => [ 'title', 'editor', 'thumbnail', 'sub-title']
        ],

    ];
    foreach($post_types as $PostType) {
        $names          =    $PostType['names'];
        $singular_name  =    $PostType['singular_name'];
        $labels = array(
            'name'                => _x( $names, 'Post Type General Name', 'sa' ),
            'singular_name'       => _x( $singular_name, 'Post Type Singular Name', 'sa' ),
            'menu_name'           => __( $names, 'sa' ),
            'parent_item_colon'   => __( 'Parent Story', 'sa' ),
            'all_items'           => __( 'All '.$names, 'sa' ),
            'view_item'           => __( 'View '.$singular_name, 'sa' ),
            'add_new_item'        => __( 'Add New '.$singular_name, 'sa' ),
            'add_new'             => __( 'Add New', 'sa' ),
            'edit_item'           => __( 'Edit '.$singular_name, 'sa' ),
            'update_item'         => __( 'Update '.$singular_name, 'sa' ),
            'search_items'        => __( 'Search '.$singular_name, 'sa' ),
            'not_found'           => __( 'Not Found', 'sa' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'sa' ),
        );
        $args = array(
            'label'               => __( strtolower($names), 'sa' ),
            'description'         => __( $singular_name.' news and reviews', 'sa' ),
            'labels'              => $labels,
            'supports'            => $PostType['supports'],
            'taxonomies'          => array( $singular_name.'-cat' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type( strtolower($names), $args );
        $labels = array(
            'name' => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Categories' ),
            'all_items' => __( 'All Categories' ),
            'parent_item' => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item' => __( 'Edit Category' ),
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category Name' ),
            'menu_name' => __( 'Categories' ),
        );
        register_taxonomy(strtolower(str_replace(' ','',$singular_name)).'-cat',array(strtolower(str_replace(' ','',$names))), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => strtolower(str_replace(' ','-',$singular_name)).'' ),
        ));
    }
}
add_action( 'init', 'mws_apoe_custom_post_type_sliders', 0 );


function my_theme_custom_upload_mimes( $existing_mimes ) {
    
    return $existing_mimes;
}
add_filter( 'mime_types', 'my_theme_custom_upload_mimes' );
add_action( 'widgets_init', function(){
    $shared_args = array(
        'before_title'  => '<h2 class="top-bar">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );


    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'contact-address', 'twentytwenty' ),
                'id'          => 'contact-address',
                'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
            )
        )
    );

    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'Google Map', 'twentytwenty' ),
                'id'          => 'google-map',
                'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
            )
        )
    );

    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'social-links', 'twentytwenty' ),
                'id'          => 'social-links',
                'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
            )
        )
    );


    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'Copyright Text', 'twentytwenty' ),
                'id'          => 'sidebar-9',
                'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
            )
        )
    );


} );
function current_location()
{
    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    return /*$protocol . $_SERVER['HTTP_HOST'] .*/ $_SERVER['REQUEST_URI'];
}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_action('init',function (){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    /*remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 200 );*/
});
