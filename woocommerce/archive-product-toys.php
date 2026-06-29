<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

do_action('woocommerce_before_main_content');

?>
    <div class="main">

        <div class="head head--products">
            <?php $bannerfield = get_field('add_new_banner_images','37048');
            if($bannerfield =='yes'){
                $getbanner = get_field('banner_image','37048');
                echo '<img class="aaa" src="'.$getbanner.'" />';
            }
            else{ ?>
                <img class="ttt" src="<?php echo IMGEDIR.image_name($name)?>" />
                <?php } ?>
              
            <div class="head__title"><?php woocommerce_page_title(); ?></div>
        </div>

        <?php if (have_posts()) : ?>
            <div class="newcatsideandmain toys-category-new">
                <div class="products-list newproductlist">
                    <div class="center">
                        <div class="sort_by_befault">
                            <label>Sort By:</label>
                            <?php
                            /**
                             * woocommerce_before_shop_loop hook.
                             *
                             * @hooked wc_print_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                                do_action('woocommerce_before_shop_loop');
                            ?>
                            <form class="woocommerce-ordering custom" method="get">
                                <div class="custom-select-wrapper">
                                    <div class="custom-select">
                                        <div class="custom-options">
                                            <span class="custom-option selected" data-value="" style="padding: 0;"></span>
                                            <span class="custom-option" data-value="popularity">Most Popular</span>
                                            <span class="custom-option" data-value="date">Newest</span>
                                            <span class="custom-option" data-value="price">Price (low to high)</span>
                                            <span class="custom-option" data-value="price-desc">Price (high to low)</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="orderby" id="custom_orderby"value="">
                            </form>
                        </div>
                        <?php 
                            woocommerce_product_loop_start();
                        ?>
                        <div class="shopsidebar toys-sidebar">
                            <?php 
                                $category = get_queried_object();
                                $category->term_id;
                                if( ($category->term_id != 53) || (!empty($_GET)) ) {
                                    $category = get_queried_object(); ?>
                                    <div class="cancel-filter-btn">
                                        <a href="<?php echo get_category_link(53); ?>">Cancel Filter <span>X</span></a>
                                    </div>
                                <?php }
                            ?>
                        <?php 
                            get_sidebar('toy-category-sidebar');
                        ?> 
                        </div>
                        <div class="items">
                            <?php while (have_posts()) : the_post(); ?>

                                <?php
                                /**
                                 * woocommerce_shop_loop hook.
                                 *
                                 * @hooked WC_Structured_Data::generate_product_data() - 10
                                 */
                                do_action('woocommerce_shop_loop');
                                ?>

                                <?php wc_get_template_part('content', 'product-toys'); ?>

                            <?php endwhile; // end of the loop. ?>

                            <?php woocommerce_product_loop_end(); ?>
                
                            <?php
                            /**
                             * woocommerce_after_shop_loop hook.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                <?php
                /**
                 * woocommerce_no_products_found hook.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
                ?>

            <?php endif; ?>
    </div>
<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>
<?php get_footer(); ?>