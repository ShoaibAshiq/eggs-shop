<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

wc_print_notices();
// do_action('woocommerce_before_checkout_form', $checkout);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20); ?>
<div class="shopping__head">
    <div class="center">
        <div>Product</div>
        <div>Subtotal</div>
    </div>
</div>
<?php
do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
    <?php do_action('woocommerce_before_cart_table'); ?>
    <div class="shopping__items">
        <?php do_action('woocommerce_before_cart_contents'); ?>

        <?php
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
        ?>
        <div class="item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
            <div class="center">
                <?php
                $thumbnail = wp_get_attachment_image_src($_product->get_image_id(), 'full');
                ?>
                <div class="item__img" style="background-image: url(<?php echo $thumbnail[0]; ?>);"></div>
                <div class="item__info">
                    <div class="item__title">
                        <?php
                        if (!$product_permalink) {
                            echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;';
                        } else {
                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
                        } ?>
                    </div>
                    <div class="item__price"> <?php
                        echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                        ?></div>
                    <div class="item__number">Item # <?php echo $_product->get_sku(); ?></div>
                    <div class="item__weight">Weight:
                        <span><?php the_field('weight', $_product->get_id()); ?></span></div>
                </div>
                <div class="item__details">
                    <div class="quantity">
                        <!--                                <span>14</span><a href="#" class="button button--plus"></a>-->
                        <?php
                        if ($_product->is_sold_individually()) {
                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                        } else {
                            $product_quantity = woocommerce_quantity_input(array(
                                'input_name' => "cart[{$cart_item_key}][qty]",
                                'input_value' => $cart_item['quantity'],
                                'max_value' => $_product->get_max_purchase_quantity(),
                                'min_value' => '0',
                            ), $_product, false);
                        }

                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                        ?>
                    </div>
                    <div class="price">
                        <?php
                        echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                        ?>
                    </div>
                    <div class="value">
                        <?php
                        echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                        ?>
                    </div>
                    <div class="operations"><a href="<?php echo $product_permalink ?>">
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/checkout_icons.svg#edit"></use>
                            </svg>
                        </a>

                        <?php
                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                            '<a href="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                    <svg xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="%s/svg/checkout_icons.svg#delete"></use>
                                    </svg>
                                </a>',
                            esc_url(WC()->cart->get_remove_url($cart_item_key)),
                            __('Remove this item', 'woocommerce'),
                            esc_attr($product_id),
                            esc_attr($_product->get_sku()),
                            TEMPLATEURI
                        ), $cart_item_key);

                        ?>

                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>

            <?php do_action('woocommerce_cart_contents'); ?>


        </div>

    </div>
    <div class="updatebtn-wrap">
        <div class="center">
            <input type="submit" class="button" name="update_cart"
                   value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"/>
        </div>
    </div>
    <div class="center">
        <div class="discount">
            <?php if (wc_coupons_enabled()) { ?>
                <div class="code__group">
                    <div>
                        <label for="code">Use code</label>
                        <input type="text"
                               name="coupon_code"
                               class="input-text"
                               id="code"
                               value=""
                               placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>"/>
                    </div>
                    <input type="submit" class="button" name="apply_coupon"
                           value="<?php esc_attr_e('Apply', 'woocommerce'); ?>"/>
                    <?php do_action('woocommerce_cart_coupon'); ?>
                </div>
            <?php } ?>
            <div class="total">
                <div>Total</div>
                <div class="total_value">
                    <?php
                    echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_cart_total());
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php wp_nonce_field( 'woocommerce-cart' ); ?>
    <?php do_action('woocommerce_after_cart_table'); ?>
</form>
<script>
jQuery(document).ready(function(){
    setTimeout(function(){
        
    
jQuery("#username").blur(function(){ if(!jQuery(".account_u").length) { jQuery("form.woocommerce-checkout").append('<input type="hidden" class="account_u" name="account_username" value="'+jQuery(this).val()+'">'); } else { jQuery(".account_u").val(jQuery(this).val()); } });
        jQuery("#password").blur(function(){ if(!jQuery(".account_p").length) { jQuery("form.woocommerce-checkout").append('<input type="hidden" class="account_p" name="user_password" value="'+jQuery(this).val()+'">'); } else { jQuery(".account_p").val(jQuery(this).val()); } });

    },500);
    });
</script>

<?php do_action('woocommerce_after_cart'); ?>
