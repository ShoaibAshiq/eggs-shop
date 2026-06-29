<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


//do_action('woocommerce_before_checkout_form', $checkout);

//// If checkout registration is disabled and not logged in, the user cannot checkout
//if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
//	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
//
//	return;
//}
// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );

	return;
}
?>
<div class="shopping__conditions">
  <div class="center">
      
    <?php do_action('woocommerce_before_checkout_form', $checkout); ?>
    
    <form name="checkout" method="post" class="checkout woocommerce-checkout"
          action="<?php echo esc_url( wc_get_checkout_url() ); ?>"
          enctype="multipart/form-data">
         <input name="input_guest_billing" id="guest_shopping" class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox" value="0" type="hidden">
         
		<?php if ( $checkout->get_checkout_fields() ) : ?>
      <div class="customer">
		  <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

        <div class="title">Customer Information</div>
        <div class="checkbox-group">
          <h3 id="ship-to-different-address">
            <label
              class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
              <input name="check_address" id="ship-to-different-address-checkbox"
                     class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?>
                     type="checkbox" name="ship_to_different_address"
                     value="1"/>
              <label for="ship-to-different-address-checkbox"></label>
            </label>
            <div>Ship to a different address?</div>
          </h3>
        </div>


		  <?php wc_print_notices(); ?>

        <div class="customer__address" id="customer_details">
          <div class="shipping_address">
			    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
			    <!--<div class="shipping_btn">
                    <h3>
                        <input type="checkbox" name="save_shipping_address" id="save_shipping_address">
                        <label>Save This Information For Next Time</label>
                    </h3>
                </div>-->
                <div class="checkbox-group same_shipping shipping_btn">
                    <h3>
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                            <input type="checkbox" name="save_shipping_address" id="save_shipping_address" class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox">
                          <label for="save_shipping_address"></label>
                        </label>
                        <div>Save This Information For Next Time</div>
                    </h3>
               </div>
          </div>
           <div class="address-item">
			    <?php do_action( 'woocommerce_checkout_billing' ); ?>
			    <!--<div class="billing_btn">
                    <h3>
                        <input type="checkbox" name="save_billing_address" id="save_billing_address">
                        <label>Save This Information For Next Time</label>
                    </h3>
                </div>-->
                <div class="checkbox-group same_shipping billing_btn">
                    <h3>
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                            <input type="checkbox" name="save_billing_address" id="save_billing_address" class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox">
                          <label for="save_billing_address"></label>
                        </label>
                        <div>Save This Information For Next Time</div>
                    </h3>
               </div>
          </div>
            <script>
                jQuery(document).ready(function(){
                    var admin_url = "<?= admin_url('admin-ajax.php'); ?>";
                    jQuery('#save_billing_address').click(function(){
                        var check_value = jQuery(this).is( ":checked" );
                        jQuery.ajax({
                            url:admin_url,
                            type:'post',
                            data:{action:'save_billing_address',check_value:check_value},
                            success:function(rec){
                                
                            }
                        });
                        //localStorage.setItem('save_billing_address',check_value);
                    });
                    jQuery('#save_shipping_address').click(function(){
                        var check_value1 = jQuery(this).is( ":checked" );
                        jQuery.ajax({
                            url:admin_url,
                            type:'post',
                            data:{action:'save_shipping_address',check_value:check_value1},
                            success:function(rec){
                                
                            }
                        });
                        //localStorage.setItem('save_shipping_address',check_value1);
                    });
                });
            </script>


			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
        </div>
        <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
            <div class="woocommerce-account-fields">
              <?php if ( ! $checkout->is_registration_required() ) : ?>
              <div class="checkbox-group">
                  <h3>

                      <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                          <input
                                  id="createaccount"
                                  class="woocommerce-form__input checkbox woocommerce-form__input-checkbox input-checkbox"
                            <?php checked( ( TRUE === $checkout->get_value( 'createaccount' ) || ( TRUE === apply_filters( 'woocommerce_create_account_default_checked', FALSE ) ) ), TRUE ) ?>
                                  type="checkbox" name="createaccount"/>

                          <label for="createaccount"></label>
                      </label>
                      <div><?php _e( 'Create an account?', 'woocommerce' ); ?></div>
                  </h3>
                <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

                <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

                    <div class="create-account">
                      <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                        <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                      <?php endforeach; ?>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>
              </div>
              <?php endif; ?>



              <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
            </div>
        <?php endif; ?>
		  <?php endif; ?>


		  <?php
		  remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
		  do_action( 'woocommerce_checkout_order_review' ); ?>

		  <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

    </form>

	  <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
  </div>
</div>