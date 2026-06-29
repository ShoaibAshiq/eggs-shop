<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @version 3.0.9
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<div class="woocommerce-shipping-fields">
<?php if (true === WC()->cart->needs_shipping_address()) : ?>


    <div class="title">Shipping address</div>


    <?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>
    <div class="woocommerce-shipping-fields__field-wrapper">
    <?php
    $fields = $checkout->get_checkout_fields('shipping');

    foreach ($fields as $key => $field) {
        if (isset($field['country_field'], $fields[$field['country_field']])) {
            $field['country'] = $checkout->get_value($field['country_field']);
        }
        if ($key_id == 0) echo '<div class="group">';
        if ($key == 'country_field') echo '<div class="select">';
        woocommerce_form_field_check($key, $field, $checkout->get_value($key));
        if ($key == 'country_field') echo '</div>';
        if ($key_id == 1) {
            echo '</div>';
            $key_id = 0;
        } else {
            $key_id++;
        }
    }

    if ($key_id == 1) {
        echo '</div>';
    }?>
    </div>
    <?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>

</div>
<?php endif; ?>
