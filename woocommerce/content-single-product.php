<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="product_wrap">
        <div class="center">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    remove_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

                    /**
                     * woocommerce_before_single_product_summary hook.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
                <div class="col-md-6 product-info">

                    <?php
                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
                    /**
                     * woocommerce_single_product_summary hook.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>

                    <h4><?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?> </h4>

                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<div class="slider slider--stories slider--products">-->
    <!--    <div class="center">-->
    <!--        <div class="slider__head">-->
    <!--            <div class="title"><?php echo $post->post_title?></div>-->
    <!--            <div class="subtitle">Share your photos and join the #<?php echo strtoupper($post->post_title)?> family</div>-->
    <!--                  <a href="#upload_photo" id="upload_button" class="button" onclick="">Add Your Photo</a>-->
    <!--        </div>-->
    <!--      <div class="slider-photos">-->
    <!--        <?php $cat = 'user-photo-'.$post->post_name?>-->
    <!--        <?php echo do_shortcode( '[category-post category="'.$cat.'" post_type="post" , post_name="'.$post->post_name.'"]' );?>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    </div>-->

    </div>
    <?php
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
        do_action('woocommerce_after_single_product_summary');
    ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>
