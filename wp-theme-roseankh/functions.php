<?php

// Add Stylesheets
function load_stylesheets()
{
    global $post;
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style');
    wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_stylesheets', 1000);

function load_javascripts()
{
    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', 'jquery', 1, true);
    wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'load_javascripts');

function theme_setup() {
    register_nav_menus( array( 
      'header' => 'main menu', 
      'footer' => 'Footer menu' 
    ) );

    add_theme_support( 'post-thumbnails' );
}
  
add_action( 'after_setup_theme', 'theme_setup' );


if( function_exists('acf_add_options_page') ) { //sets up the ACF options page
	
	acf_add_options_page('Site Options');
	
}


// Add SVG support
function media_mime_types($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
  }
add_filter('upload_mimes', 'media_mime_types');


/* ##########
Custom Post types
########## */


function create_cpts()
{

    //Books
    register_post_type(
        'books',
        array(
            'labels' => array(
                'name' => __('Publications'),
                'singular_name' => __('Publication')
            ),
            'public' => true,
            'show_in_nav_menus' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'publications'),
            'supports' => array('title','editor','thumbnail')
        )
    );
    
    //Authors
    register_post_type(
        'book-authors',
        array(
            'labels' => array(
                'name' => __('Authors'),
                'singular_name' => __('Author')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'book-authors'),
            'supports' => array('title','editor','thumbnail')
        )
	);
    
}

add_action('init', 'create_cpts');

/* Woocommerce */

// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_cart_count_fragments', 10, 1 );

function wc_cart_count_fragments( $fragments ) {
    
    $fragments['span.shop-basket-count'] = '<span class="shop-basket-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    
    return $fragments;
    
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'wc_cart_btn_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'wc_cart_btn_text' );   
 
function wc_cart_btn_text() {
        return __( 'Add to basket', 'woocommerce' );
}

// function get_subcategory_terms( $terms, $taxonomies, $args ) {
 
// 	$new_terms 	= array();
// 	$hide_category 	= array( 18 ); // Ids of the category you don't want to display on the shop page
 	
//  	  // if a product category and on the shop page
// 	if ( in_array( 'product_cat', $taxonomies ) && !is_admin() && is_shop() ) {
// 	    foreach ( $terms as $key => $term ) {
// 		if ( ! in_array( $term->term_id, $hide_category ) ) { 
// 			$new_terms[] = $term;
// 		}
// 	    }
// 	    $terms = $new_terms;
// 	}
//   return $terms;
// }
// add_filter( 'get_terms', 'get_subcategory_terms', 10, 3 );