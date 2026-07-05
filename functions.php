<?php
/**
 * Theme Functions - PHP 8.3 Compatible with Original Product Filtering
 * Eggs Shop Theme
 */

// WooCommerce Support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Define PHP file constants
define( 'TEMPLATEINC', get_template_directory() . '/inc' );
define( 'IMGEDIR', get_template_directory_uri() . '/images' );
define( 'TEMPLATEURI', get_template_directory_uri() );

// Load library files with error checking
$required_files = array(
    'shortcodes.php',
    'widget.php',
    'header_img.php',
    'cpt.php',
    'template.php',
    'brand-logos.php',
    'home-trust.php',
    'home-icons.php',
    'home-characters.php',
    'home-products.php',
    'toys-collect.php',
    'license-inquiry.php',
    'actions.php',
    'custom_listing_template.php'
);

foreach ( $required_files as $file ) {
    $filepath = TEMPLATEINC . '/' . $file;
    if ( file_exists( $filepath ) ) {
        require_once( $filepath );
    }
}

// Theme Support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'menus' );
}

// Register Navigation Menus
register_nav_menus( array(
    'top_menu'     => 'Main menu',
    'about_menu'   => 'About us menu',
    'blog_menu'    => 'Blog menu',
    'support_menu' => 'Support menu',
    'account_menu' => 'Account menu',
) );

/**
 * Get post featured image
 */
function get_post_featured_image( $post_id = '', $size = 'full' ) {
    $size  = ! empty( $size ) ? $size : 'full';
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
    
    if ( ! empty( $image ) && is_array( $image ) ) {
        $image = isset( $image[0] ) ? $image[0] : '';
    }
    
    return $image;
}

/**
 * Custom Walker for Top Menu - PHP 8.3 Compatible
 */
class Custom_Walker_Nav_Menu_top extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;
        
        $is_current_item = '';
        if ( is_array( $item->classes ) && in_array( 'current-menu-item', $item->classes, true ) ) {
            $is_current_item = ' class="active"';
        }
        
        $output .= '<li><a ' . $is_current_item . ' href="' . esc_url( $item->url ) . '">' . esc_html( $item->title );
    }
    
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</a></li>';
    }
}

/**
 * Custom Walker for Blog Menu - PHP 8.3 Compatible
 */
class Custom_Walker_Nav_Menu_blog extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;
        $img = get_post_featured_image( $item->object_id, 'full' );
        
        $output .= '<a href="' . esc_url( $item->url ) . '" class="button button--circle" style="background-image: url(' . esc_url( $img ) . ')"> View';
    }
    
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</a>';
    }
}

/**
 * Custom WPSL Templates
 */
add_filter( 'wpsl_templates', 'custom_templates' );
function custom_templates( $templates ) {
    $templates[] = array(
        'id'   => 'eggs',
        'name' => 'Eggs map',
        'path' => get_template_directory() . '/inc/eggs-wpsl.php',
    );
    
    return $templates;
}

/**
 * Register Widget Areas - PHP 8.3 Compatible - FIXED
 */
if ( function_exists( 'register_sidebar' ) ) {
    
    register_sidebar( array(
        'name'          => 'Stories King Egg',
        'id'            => 'stories-king-eggs',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Stories Magik Egg',
        'id'            => 'stories-magik-eggs',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Stories Lucky Egg',
        'id'            => 'stories-lucky-eggs',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Stories Happy Egg',
        'id'            => 'stories-happy-eggs',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
        'name'          => 'GAMES',
        'id'            => 'games',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Toy Category Sidebar',
        'id'            => 'toy-category-sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<span class="widgettitle">',
        'after_title'   => '</span>',
    ) );
}

/**
 * Remove WooCommerce Password Strength Meter
 */
function wc_ninja_remove_password_strength() {
    if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
        wp_dequeue_script( 'wc-password-strength-meter' );
    }
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

/**
 * Modify excerpt more
 */
add_filter( 'excerpt_more', function( $more ) {
    return '...';
});

/**
 * Change archive sort order
 */
add_action( 'pre_get_posts', 'my_change_sort_order' );
function my_change_sort_order( $query ) {
    if ( is_archive() && $query->is_main_query() && ! is_admin() ) {
        $query->set( 'order', 'DESC' );
        $query->set( 'orderby', 'date' );
    }
}

/**
 * Save Billing Address - AJAX Handler
 * RESTORED: No nonce check to maintain compatibility
 */
function save_billing_address_fn() {
    if ( ! session_id() ) {
        session_start();
    }
    
    $_SESSION['save_billing_address'] = isset( $_POST['check_value'] ) ? sanitize_text_field( $_POST['check_value'] ) : '';
    die();
}
add_action( 'wp_ajax_save_billing_address', 'save_billing_address_fn' );
add_action( 'wp_ajax_nopriv_save_billing_address', 'save_billing_address_fn' );

/**
 * Save Shipping Address - AJAX Handler
 * RESTORED: No nonce check to maintain compatibility
 */
function save_shipping_address_fn() {
    if ( ! session_id() ) {
        session_start();
    }
    
    $_SESSION['save_shipping_address'] = isset( $_POST['check_value'] ) ? sanitize_text_field( $_POST['check_value'] ) : '';
    die();
}
add_action( 'wp_ajax_save_shipping_address', 'save_shipping_address_fn' );
add_action( 'wp_ajax_nopriv_save_shipping_address', 'save_shipping_address_fn' );

/**
 * Handle Express Delivery and User Registration/Login
 */
add_action( 'woocommerce_checkout_order_processed', 'is_express_delivery', 1, 1 );
function is_express_delivery( $order_id ) {
    $order = wc_get_order( $order_id );
    
    if ( ! $order ) {
        return;
    }
    
    // Check if guest checkout
    if ( isset( $_POST['input_guest_billing'] ) && $_POST['input_guest_billing'] == "1" ) {
        return;
    }
    
    // Verify credentials exist
    if ( ! isset( $_POST['account_username'], $_POST['user_password'] ) ) {
        return;
    }
    
    $username = sanitize_text_field( $_POST['account_username'] );
    $password = $_POST['user_password'];
    
    $user_exist = wp_authenticate( $username, $password );
    
    if ( is_wp_error( $user_exist ) ) {
        // Create new user
        $email = $username;
        
        if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            $email = $order->get_billing_email();
        }
        
        $userdata = array(
            'user_login' => $username,
            'user_pass'  => $password,
            'user_email' => sanitize_email( $email )
        );
        
        $user_id = wp_insert_user( $userdata );
        
        if ( ! is_wp_error( $user_id ) ) {
            wp_clear_auth_cookie();
            wp_set_current_user( $user_id );
            wp_set_auth_cookie( $user_id );
        }
    } else {
        // Log in existing user
        wp_clear_auth_cookie();
        wp_set_current_user( $user_exist->ID );
        wp_set_auth_cookie( $user_exist->ID );
    }
}

/**
 * Update Cart - AJAX Handler
 * RESTORED: No nonce check to maintain compatibility
 */
function update_cart() {
    if ( ! isset( $_POST['cart_item_key'], $_POST['qty'] ) ) {
        die();
    }
    
    global $woocommerce;
    $cart_item_key = sanitize_text_field( $_POST['cart_item_key'] );
    $qty = absint( $_POST['qty'] );
    
    $woocommerce->cart->set_quantity( $cart_item_key, $qty );
    echo WC()->cart->get_cart_contents_count();
    die();
}
add_action( 'wp_ajax_update_cart', 'update_cart' );
add_action( 'wp_ajax_nopriv_update_cart', 'update_cart' );

/**
 * Refreshed Cart - AJAX Handler
 * RESTORED: No nonce check to maintain compatibility
 */
function refreshed_cart() {
    echo do_shortcode( "[custom-cart]" );
    ?>
    <script>
    jQuery(".qty").change(function(){
        var url = "<?php echo admin_url('admin-ajax.php'); ?>";
        var qty = jQuery(this).val();
        var cart_item = jQuery(this).attr("name");
        var ret = cart_item.split("cart[");
        var str1 = ret[0];
        var str2 = ret[1];
        var str = str2.split("]");
        var str21 = str[0];
        var str22 = str[1];
        var cart_item_key = str21;
        
        jQuery.ajax({
            type:"post",
            url: url,
            data:{action:'update_cart',qty:qty,cart_item_key:cart_item_key},
            success:function(res){
                jQuery(".cart-popup-wrapper .cart__badge").html(res);
                jQuery.ajax({
                    type:"post",
                    url: url,
                    data:{action:'refreshed_cart'},
                    success:function(res){
                        jQuery(".cart-popup .shopping").html(res);
                    },error:function(error){
                        alert('error');
                    }
                });
            },error:function(error){
                alert('error');
            }
        });
    });
    </script>
    <?php
    die();
}
add_action( 'wp_ajax_refreshed_cart', 'refreshed_cart' );
add_action( 'wp_ajax_nopriv_refreshed_cart', 'refreshed_cart' );

/**
 * Country Wise State - AJAX Handler
 */
add_action( "wp_ajax_country_wise_state", "country_wise_state" );
add_action( "wp_ajax_nopriv_country_wise_state", "country_wise_state" );

function country_wise_state() {
    global $wpdb;
    
    if ( ! isset( $_POST['country_name'] ) ) {
        die();
    }
    
    $country_name = sanitize_text_field( $_POST['country_name'] );
    $country_tbl = $wpdb->prefix . "cust_countries";
    $state_tbl = $wpdb->prefix . "cust_states";
    
    // Prepared statement for security
    $country_query = $wpdb->get_row( $wpdb->prepare(
        "SELECT id FROM $country_tbl WHERE name = %s",
        $country_name
    ) );
    
    if ( ! $country_query ) {
        die();
    }
    
    $country_id = $country_query->id;
    
    $query = $wpdb->get_results( $wpdb->prepare(
        "SELECT * FROM $state_tbl WHERE country_id = %d",
        $country_id
    ) );
    
    if ( $query ) {
        foreach ( $query as $data ) {
            echo '<option value="' . esc_attr( $data->name ) . '">' . esc_html( $data->name ) . '</option>';
        }
    }
    
    die();
}

/**
 * Register Custom Post Type - Topics/Blogs
 */
function custom_post_type() {
    $labels = array(
        'name'                => _x( 'Blogs', 'Post Type General Name', 'eggs-shop' ),
        'singular_name'       => _x( 'Blog', 'Post Type Singular Name', 'eggs-shop' ),
        'menu_name'           => __( 'Blogs', 'eggs-shop' ),
        'parent_item_colon'   => __( 'Parent Blog', 'eggs-shop' ),
        'all_items'           => __( 'All Blogs', 'eggs-shop' ),
        'view_item'           => __( 'View Blog', 'eggs-shop' ),
        'add_new_item'        => __( 'Add New Blog', 'eggs-shop' ),
        'add_new'             => __( 'Add New', 'eggs-shop' ),
        'edit_item'           => __( 'Edit Blog', 'eggs-shop' ),
        'update_item'         => __( 'Update Blog', 'eggs-shop' ),
        'search_items'        => __( 'Search Blog', 'eggs-shop' ),
        'not_found'           => __( 'Not Found', 'eggs-shop' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'eggs-shop' ),
    );
    
    $args = array(
        'label'               => __( 'topics', 'eggs-shop' ),
        'description'         => __( 'Blog', 'eggs-shop' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'rewrite'             => array( 'slug' => 'topic', 'with_front' => false ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    
    register_post_type( 'topics', $args );
}
add_action( 'init', 'custom_post_type', 0 );

/**
 * Create Topics Taxonomy
 */
add_action( 'init', 'create_topics_questions' );
function create_topics_questions() {
    register_taxonomy(
        'question',
        'topics',
        array(
            'label'        => __( 'Products & Brands', 'eggs-shop' ),
            'rewrite'      => array( 'slug' => 'question' ),
            'hierarchical' => true,
        )
    );
}

/**
 * Register Topics Sidebar
 */
function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Topics Sidebar', 'eggs-shop' ),
        'id'            => 'topics-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all Topics.', 'eggs-shop' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

/**
 * Get Recent Topics Shortcode
 */
function getrecentopics() {
    global $post;
    
    if ( ! $post ) {
        return 'No post found';
    }
    
    $terms = wp_get_post_terms( $post->ID, 'question' );
    
    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return 'No terms found';
    }
    
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'topics',
        'post_status' => 'publish',
        'tax_query'   => array(
            array(
                'taxonomy' => 'question',
                'field'    => 'term_id',
                'terms'    => $terms[0]->term_id
            )
        ),
        'orderby'     => 'date',
        'order'       => 'DESC',
    );
    
    $recent_posts = get_posts( $args );
    
    global $wp;
    $current_url = home_url( $wp->request ) . '/';
    
    ob_start();
    ?>
    <h2 class='widgettitle'>
        <a href="<?php echo esc_url( home_url( '/topic/' ) ); ?>" style="color:#219FD1 !important;">Topics</a>
    </h2>
    <ul class='sidebar_topicslist'>
    <?php
    if ( $recent_posts ) {
        foreach ( $recent_posts as $recent ) {
            $post_url = get_permalink( $recent->ID );
            $active_class = ( $current_url === $post_url ) ? 'active' : '';
            ?>
            <li>
                <a class="<?php echo esc_attr( $active_class ); ?>" 
                   href="<?php echo esc_url( $post_url ); ?>">
                    <?php echo esc_html( $recent->post_title ); ?>
                </a>
            </li>
            <?php
        }
    } else {
        echo '<li>Nothing Found</li>';
    }
    wp_reset_postdata();
    ?>
    </ul>
    <?php
    return ob_get_clean();
}
add_shortcode( 'getrecentopics', 'getrecentopics' );

/**
 * Get Topics Taxonomies Shortcode
 */
function get_topics_taxonomies() {
    $terms = get_terms( array(
        'taxonomy'   => 'question',
        'hide_empty' => false,
        'order'      => 'ASC',
    ) );
    
    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return 'No terms found';
    }
    
    $queried_object = get_queried_object();
    $current_link = '';
    
    if ( $queried_object && isset( $queried_object->slug ) ) {
        $current_link = site_url() . '/question/' . $queried_object->slug . '/';
    }
    
    ob_start();
    ?>
    <h2 class='widgettitle'>
        <a href="<?php echo esc_url( home_url( '/topic/' ) ); ?>" style="color:#219FD1 !important;">
            Products & Brands
        </a>
    </h2>
    <ul class='sidebar_questionlist'>
    <?php
    foreach ( $terms as $taxonomy ) {
        $term_link = get_term_link( $taxonomy );
        
        if ( is_wp_error( $term_link ) ) {
            continue;
        }
        
        $active_class = ( $current_link === $term_link ) ? 'active' : '';
        ?>
        <li>
            <a class="<?php echo esc_attr( $active_class ); ?>" 
               href="<?php echo esc_url( $term_link ); ?>">
                <?php echo esc_html( $taxonomy->name ); ?>
            </a>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
    return ob_get_clean();
}
add_shortcode( 'get_topics_taxonomies', 'get_topics_taxonomies' );

/**
 * Get Recent Topics All Shortcode
 */
function getrecentopicsall() {
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'topics',
        'post_status' => 'publish',
        'orderby'     => 'date',
        'order'       => 'DESC',
    );
    
    $recent_posts = get_posts( $args );
    
    global $wp;
    $current_url = home_url( $wp->request ) . '/';
    
    ob_start();
    ?>
    <h2 class='widgettitle'>
        <a href="<?php echo esc_url( home_url( '/topic/' ) ); ?>" style="color:#219FD1 !important;">Topics</a>
    </h2>
    <ul class='sidebar_topicslist'>
    <?php
    if ( $recent_posts ) {
        foreach ( $recent_posts as $recent ) {
            $post_url = get_permalink( $recent->ID );
            $active_class = ( $current_url === $post_url ) ? 'active' : '';
            ?>
            <li>
                <a class="<?php echo esc_attr( $active_class ); ?>" 
                   href="<?php echo esc_url( $post_url ); ?>">
                    <?php echo esc_html( $recent->post_title ); ?>
                </a>
            </li>
            <?php
        }
    } else {
        echo '<li>Nothing Found</li>';
    }
    wp_reset_postdata();
    ?>
    </ul>
    <?php
    return ob_get_clean();
}
add_shortcode( 'getrecentopicsall', 'getrecentopicsall' );

/**
 * Register Custom Post Type - Press
 */
function custom_post_type_for_press() {
    $labels = array(
        'name'                => _x( 'Press', 'Post Type General Name', 'eggs-shop' ),
        'singular_name'       => _x( 'Press', 'Post Type Singular Name', 'eggs-shop' ),
        'menu_name'           => __( 'Press', 'eggs-shop' ),
        'parent_item_colon'   => __( 'Parent Press', 'eggs-shop' ),
        'all_items'           => __( 'All Press', 'eggs-shop' ),
        'view_item'           => __( 'View Press', 'eggs-shop' ),
        'add_new_item'        => __( 'Add New Press', 'eggs-shop' ),
        'add_new'             => __( 'Add New', 'eggs-shop' ),
        'edit_item'           => __( 'Edit Press', 'eggs-shop' ),
        'update_item'         => __( 'Update Press', 'eggs-shop' ),
        'search_items'        => __( 'Search Press', 'eggs-shop' ),
        'not_found'           => __( 'Not Found', 'eggs-shop' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'eggs-shop' ),
    );
    
    $args = array(
        'label'               => __( 'Press', 'eggs-shop' ),
        'description'         => __( 'Press', 'eggs-shop' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'rewrite'             => array( 'slug' => 'as_on_press', 'with_front' => false ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    
    register_post_type( 'as_on_press', $args );
}
add_action( 'init', 'custom_post_type_for_press', 0 );

/**
 * Register Custom Post Type - Catalog
 */
function custom_post_type_for_catalog() {
    $labels = array(
        'name'                => _x( 'Catalog', 'Post Type General Name', 'eggs-shop' ),
        'singular_name'       => _x( 'Catalog', 'Post Type Singular Name', 'eggs-shop' ),
        'menu_name'           => __( 'Catalog', 'eggs-shop' ),
        'parent_item_colon'   => __( 'Parent Catalog', 'eggs-shop' ),
        'all_items'           => __( 'All Catalog', 'eggs-shop' ),
        'view_item'           => __( 'View Catalog', 'eggs-shop' ),
        'add_new_item'        => __( 'Add New Catalog', 'eggs-shop' ),
        'add_new'             => __( 'Add New', 'eggs-shop' ),
        'edit_item'           => __( 'Edit Catalog', 'eggs-shop' ),
        'update_item'         => __( 'Update Catalog', 'eggs-shop' ),
        'search_items'        => __( 'Search Catalog', 'eggs-shop' ),
        'not_found'           => __( 'Not Found', 'eggs-shop' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'eggs-shop' ),
    );
    
    $args = array(
        'label'               => __( 'Catalog', 'eggs-shop' ),
        'description'         => __( 'Catalog', 'eggs-shop' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'rewrite'             => array( 'slug' => 'Catalog', 'with_front' => false ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    
    register_post_type( 'cus_Catalog', $args );
}
add_action( 'init', 'custom_post_type_for_catalog', 0 );

/**
 * WooCommerce Customizations
 */
add_filter( 'woocommerce_layered_nav_count', '__return_false' );

function sip_update_sorting_name( $catalog_orderby ) {
    unset( $catalog_orderby['rating'] );
    
    $catalog_orderby = str_replace( "Default sorting", " ", $catalog_orderby );
    $catalog_orderby = str_replace( "Sort by popularity", "Most Popular", $catalog_orderby );
    $catalog_orderby = str_replace( "Sort by latest", "Newest", $catalog_orderby );
    $catalog_orderby = str_replace( "Sort by price: low to high", "Price (low to high)", $catalog_orderby );
    $catalog_orderby = str_replace( "Sort by price: high to low", "Price (high to low)", $catalog_orderby );
    
    return $catalog_orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'sip_update_sorting_name' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'sip_update_sorting_name' );

/**
 * Variation Change Update Quantity
 */
add_action( 'wp_footer', 'variation_change_update_qty' );
function variation_change_update_qty() {
    if ( is_product() ) {
        ?>
        <script>
        jQuery(function($) {
            $("a.reset_variations").on("click", function() {
                var variation_name = $("li.variable-item.image-variable-item").first().attr('title');
                setTimeout(function() {
                    $("span.woo-selected-variation-item-name").text(': ' + variation_name);
                }, 100);
            });
        });
        </script>
        <?php
    }
}

/**
 * Remove Toy Category from Product Page
 * FIXED: Restores original product filtering logic
 */
function for_remove_toy_category_product_from_product_page( $q ) {
    global $wp_query;
    
    // Get category slug
    $cat_slug = isset( $wp_query->query_vars['product_cat'] ) ? $wp_query->query_vars['product_cat'] : '';
    
    // If viewing toys category or its children, don't filter (show toys)
    if ( ! empty( $cat_slug ) ) {
        $category = get_term_by( 'slug', $cat_slug, 'product_cat' );
        
        if ( $category && ( $cat_slug == 'toys' || $category->parent == 53 ) ) {
            return $q;
        }
    }
    
    // For all other pages, exclude toys
    $tax_query = (array) $q->get( 'tax_query' );
    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => array( 'toys' ),
        'operator' => 'NOT IN'
    );
    
    $q->set( 'tax_query', $tax_query );
}
add_action( 'woocommerce_product_query', 'for_remove_toy_category_product_from_product_page' );

/**
 * Show Toy Categories List Shortcode
 */
add_shortcode( 'show_toy_categories_list', 'show_toy_categories_list' );
function show_toy_categories_list() {
    $args = array(
        'taxonomy'   => 'product_cat',
        'parent'     => 53,
        'hide_empty' => true,
    );
    
    $children = get_terms( $args );
    
    if ( is_wp_error( $children ) || empty( $children ) ) {
        return '';
    }
    
    ob_start();
    ?>
    <span class="widgettitle">CHARACTERS</span>
    <ul class="product-categories">
    <?php
    foreach ( $children as $subcat ) {
        ?>
        <li class="cat-item <?php echo esc_attr( $subcat->slug ); ?>">
            <input type="checkbox" class="attr-checkbox">
            <a href="<?php echo esc_url( get_term_link( $subcat, $subcat->taxonomy ) ); ?>">
                <?php echo esc_html( $subcat->name ); ?>
            </a>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
    return ob_get_clean();
}