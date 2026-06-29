<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

    <?php do_action('woocommerce_edit_account_form_start'); ?>

    <div class="login  content-block" id="login">
        <div class="form-group">
            <label class="needed" for="first_name">First Name</label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name"
                   placeholder="<?php _e('First Name', 'woocommerce'); ?>" id="account_first_name"
                   value="<?php echo esc_attr($user->first_name); ?>"/>
        </div>
        <div class="form-group">
            <label class="needed" for="last_name">Last Name</label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name"
                   placeholder="<?php _e('Last Name', 'woocommerce'); ?>" id="account_last_name"
                   value="<?php echo esc_attr($user->last_name); ?>"/>
        </div>
        <div class="form-group">
            <label class="needed" for="email_address">Email Address</label>
            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email"
                   placeholder="<?php _e('Email Address', 'woocommerce'); ?>" id="account_email"
                   value="<?php echo esc_attr($user->user_email); ?>"/>
        </div>
        <div class="form-group">
            <div class="checkbox-group">
                <input class="checkbox" type="checkbox" id="change_password" name="change_password">
                <label for="change_password"></label><span>Change Password</span>
            </div>
        </div>
        <fieldset id="password">
            <h3 style="margin-bottom: 20px; margin-left:10px;"><?php _e('Password change', 'woocommerce'); ?></h3>

            <div class="form-group">
                <label for="password_current"><?php _e('Current password', 'woocommerce'); ?></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
                       name="password_current"
                       placeholder="<?php _e('Current password', 'woocommerce'); ?>"
                       id="password_current"/>
            </div>
            <div class="form-group">
                <label for="password_1"><?php _e('New password', 'woocommerce'); ?></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
                       name="password_1"
                       placeholder="<?php _e('New password', 'woocommerce'); ?>"
                       id="password_1"/>
            </div>
            <div class="form-group">
                <label for="password_2"><?php _e('Confirm new password', 'woocommerce'); ?></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"
                       name="password_2"
                       placeholder="<?php _e('Confirm new password', 'woocommerce'); ?>"
                       id="password_2"/>
            </div>
        </fieldset>
        <?php do_action('woocommerce_edit_account_form'); ?>

        <?php wp_nonce_field('save_account_details'); ?>
        <input type="submit" class="button" name="save_account_details"
               value="<?php esc_attr_e('Save', 'woocommerce'); ?>"/>
        <input type="hidden" name="action" value="save_account_details"/>

        <?php do_action('woocommerce_edit_account_form_end'); ?>
    </div>

</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>
