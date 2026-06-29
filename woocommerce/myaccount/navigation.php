<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}

//do_action('woocommerce_before_account_navigation');
?>


<div class="navigation">
    <a href="/my-account/orders/">
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 54 54">
                    <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/account_nav_icons.svg#orders"></use>
                </svg>
            </div>
            <div class="text">
                <div class="title">MY ORDERS</div>
                <div>Track, return, or buy<br>things again</div>
            </div>
        </div>
    </a>
    <a href="/my-account/payment-methods/">
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/account_nav_icons.svg#payment"></use>
                </svg>
            </div>
            <div class="text">
                <div class="title">Payment Options</div>
                <div>Edit or add payment<br>methods</div>
            </div>
        </div>
    </a>
    <a href="/my-account/edit-address/">
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/account_nav_icons.svg#addresses"></use>
                </svg>
            </div>
            <div class="text">
                <div class="title">My addresses</div>
                <div>Edit addresses for orders<br>and gifts</div>
            </div>
        </div>
    </a>
    <a href="/my-account/edit-account/">
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/account_nav_icons.svg#security"></use>
                </svg>
            </div>
            <div class="text">
                <div class="title">Login security</div>
                <div>Edit login, name, and<br>mobile number</div>
            </div>
        </div>
    </a>

</div>
<?php //do_action('woocommerce_after_account_navigation'); ?>
