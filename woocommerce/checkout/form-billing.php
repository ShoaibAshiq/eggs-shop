<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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

/** @global WC_Checkout $checkout */

?>

<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

    <div class="shipping-box">

        <div class="title">Billing address</div> 
        
        <div class="checkbox-group same_shipping">
            <h3>
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                  <input name="input_same" id ="same_shopping" class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" onclick="FillBilling(this.form)">
                  <label for="same_shopping"></label>
                </label>
                <div>Same as Shipping Address</div>
            </h3>
       </div>
   
   </div>

<?php else : ?>

    <div class="shipping-box">

        <div class="title">Billing address</div> 
        
        <div class="checkbox-group same_shipping">
            <h3>
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                  <input name="input_same" id ="same_shopping" class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" onclick="FillBilling(this.form)">
                  <label for="same_shopping"></label>
                </label>
                <div>Same as Shipping Address</div>
            </h3>
       </div>
   
   </div>
    
    

<?php endif; ?>


<?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

<?php
$fields = $checkout->get_checkout_fields('billing');
$key_id = 0;
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
}
?>

<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>

<script>
    
    function FillBilling(f) {

      if(f.input_same.checked == true) {
        f.billing_first_name.value = f.shipping_first_name.value;
        f.billing_last_name.value = f.shipping_last_name.value;
        f.billing_company.value = f.shipping_company.value;
        f.billing_address_1.value = f.shipping_address_1.value;
        f.billing_apt.value = f.shipping_apart.value;
        f.billing_city.value = f.shipping_city.value;
        f.billing_postcode.value = f.shipping_postcode.value;
        f.billing_phone.value = f.shipping_phone.value;
        f.billing_email.value = f.shipping_email.value;
        f.billing_state.value = f.shipping_state.value;
        f.billing_country.value = f.shipping_country.value;
        f.billing_phone.value = f.shipping_phone.value;
        
        jQuery("#billing_state").change();
        jQuery('#billing_country').change();
      }
    }
    
</script>
<!--<style>

.billing_btn input[type=checkbox] + label, .shipping_btn input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

.billing_btn input[type=checkbox], .shipping_btn input[type=checkbox] {
  display: none;
}

.billing_btn input[type=checkbox] + label:before, .shipping_btn input[type=checkbox] + label:before {
      content: "\2714";
    border: 1px solid #ababab;
    /* border-radius: 0.2em; */
    display: inline-block;
    width: 30px;
    height: 30px;
    padding-left: 0.2em;
    padding-bottom: 0.3em;
    margin-right: 0.2em;
    vertical-align: middle;
        margin-right: 10px;
    color: transparent;
    transition: .2s;
}

.billing_btn input[type=checkbox] + label:active:before, .shipping_btn input[type=checkbox] + label:active:before {
  transform: scale(0);
}

.billing_btn input[type=checkbox]:checked + label:before, .shipping_btn input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: red;
  color: #fff;
}

.billing_btn input[type=checkbox]:disabled + label:before, .shipping_btn input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

.billing_btn input[type=checkbox]:checked:disabled + label:before, .shipping_btn input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
    
</style>-->

