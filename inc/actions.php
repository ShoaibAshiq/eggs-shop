<?php

add_filter('the_content', 'do_shortcode');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


add_action('after_setup_theme', 'theme_setup');
function theme_setup()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
//	add_image_size( '640X420', 640, 420 );
}


add_action('wp_enqueue_scripts', 'add_files', 1);
function add_files()
{
	wp_enqueue_style('editor-style', TEMPLATEURI . '/css/editor-style.css', array(), '1.0');
	wp_deregister_script('jquery');
	wp_register_script('jquery', TEMPLATEURI . '/js/jquery.min.js', false, false, false);
	wp_enqueue_script('jquery');



	wp_enqueue_script('fancybox', TEMPLATEURI . '/js/jquery.fancybox.min.js', array('jquery'), '1', true);
	wp_enqueue_script('slick', TEMPLATEURI . '/js/slick.min.js', array('jquery'), '1', true);
	wp_enqueue_script('scripts', TEMPLATEURI . '/js/scripts.js', array('jquery', 'slick'), '1.0.' . filemtime( get_template_directory() . '/js/scripts.js' ), true);

	
	wp_enqueue_style('style-fonts', TEMPLATEURI . '/css/fonts.css', array(), null);
	wp_enqueue_style('eggs-google-font', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap', array(), null);
	wp_enqueue_style('style-bootstrap', TEMPLATEURI . '/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('style-index', TEMPLATEURI . '/css/styles_old.css', array(), null);
    wp_enqueue_style('terms-of-use', TEMPLATEURI . '/css/terms-of-use.css', array(), null);
    wp_enqueue_style('style-fancy', TEMPLATEURI . '/css/jquery.fancybox.min.css', array(), null);
    wp_enqueue_style('style-all', TEMPLATEURI . '/style.css', array(), '6.0.' . filemtime( get_template_directory() . '/style.css' ) );
    wp_enqueue_style('style-buy', TEMPLATEURI . '/css/product-buy.css', array(), null);
}

add_action('wp_enqueue_scripts', 'et_enqueue_cookie_banner_assets', 100002);
function et_enqueue_cookie_banner_assets()
{
    $cookie_css = get_template_directory() . '/css/cookie-banner.css';
    $cookie_js  = get_template_directory() . '/js/cookie-banner.js';

    wp_enqueue_style(
        'et-cookie-banner',
        TEMPLATEURI . '/css/cookie-banner.css',
        array('style-all'),
        file_exists($cookie_css) ? filemtime($cookie_css) : '1.0'
    );

    $cookie_deps = array('jquery');
    if (wp_script_is('cookie-law-info', 'registered')) {
        $cookie_deps[] = 'cookie-law-info';
    }

    wp_enqueue_script(
        'et-cookie-banner',
        TEMPLATEURI . '/js/cookie-banner.js',
        $cookie_deps,
        file_exists($cookie_js) ? filemtime($cookie_js) : '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'add_header_new_css', 99999);
function add_header_new_css()
{
    wp_enqueue_style('header-new', TEMPLATEURI . '/css/header-new.css', array('style-all', 'style-buy'), '3.0.' . time());

    $inline = '
.et-header .et-header__menu > li > a {
    border-bottom: none !important;
    text-decoration: none !important;
}
@media screen and (max-width: 1199px) {
    .et-header__burger {
        display: inline-flex !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
}
@media screen and (min-width: 1200px) {
    .et-header__burger {
        display: none !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }
}
';
    wp_add_inline_style('header-new', $inline);
}

add_action('wp_enqueue_scripts', 'add_license_page_css', 1001);
function add_license_page_css()
{
    if ( is_page( 'license' ) ) {
        wp_enqueue_style(
            'license-page',
            TEMPLATEURI . '/css/license-page.css',
            array( 'style-all', 'header-new' ),
            '1.0.' . filemtime( get_template_directory() . '/css/license-page.css' )
        );

        wp_enqueue_script(
            'license-page',
            TEMPLATEURI . '/js/license-page.js',
            array( 'jquery', 'slick' ),
            '1.0.' . filemtime( get_template_directory() . '/js/license-page.js' ),
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'add_single_product_css', 100000);
function add_single_product_css()
{
    if ( ! function_exists( 'is_product' ) || ! is_product() ) {
        return;
    }

    wp_enqueue_style(
        'single-product',
        TEMPLATEURI . '/css/single-product.css',
        array( 'style-all', 'style-buy', 'header-new' ),
        '1.0.' . filemtime( get_template_directory() . '/css/single-product.css' )
    );
}

add_action('wp_enqueue_scripts', 'add_home_v2_css', 1002);
function add_home_v2_css()
{
    if ( is_page( 'home-v2' ) || is_page_template( 'page-home-v2.php' ) ) {
        wp_enqueue_style(
            'fontawesome',
            'https://use.fontawesome.com/releases/v5.6.3/css/all.css',
            array(),
            '5.6.3'
        );

        wp_enqueue_style(
            'home-v2-google-font',
            'https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap',
            array(),
            null
        );
        wp_enqueue_style(
            'home-v2',
            TEMPLATEURI . '/css/home-v2.css',
            array( 'style-all', 'header-new', 'home-v2-google-font', 'fontawesome' ),
            '1.0.' . filemtime( get_template_directory() . '/css/home-v2.css' )
        );

        wp_enqueue_style(
            'home-v2-characters',
            TEMPLATEURI . '/css/home-v2-characters.css',
            array( 'home-v2', 'fontawesome' ),
            '1.0.' . ( file_exists( get_template_directory() . '/css/home-v2-characters.css' )
                ? filemtime( get_template_directory() . '/css/home-v2-characters.css' )
                : '1' )
        );

        wp_enqueue_script(
            'home-v2',
            TEMPLATEURI . '/js/home-v2.js',
            array( 'jquery', 'slick' ),
            '1.0.' . filemtime( get_template_directory() . '/js/home-v2.js' ),
            true
        );
    }
}

/**
 * Clear license product cache when products change.
 */
add_action( 'save_post_product', 'et_license_flush_product_cache' );
add_action( 'deleted_post', 'et_license_flush_product_cache' );

function et_license_flush_product_cache( $post_id = 0 ) {
    if ( $post_id && get_post_type( $post_id ) !== 'product' ) {
        return;
    }
    delete_transient( 'et_license_showcase_products_v2' );
    delete_transient( 'et_home_character_products_v1' );
    delete_transient( 'et_home_character_products_v2' );
    delete_transient( 'et_home_quality_products_v1' );
    delete_transient( 'et_home_quality_products_v2' );
    delete_transient( 'et_home_quality_products_v3' );
    delete_transient( 'et_home_quality_products_v4' );
    delete_transient( 'et_home_quality_products_v5' );
    delete_transient( 'et_home_social_images_v1' );
}

?>