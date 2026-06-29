<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php
do_action('woocommerce_before_account_orders', $has_orders); ?>
    <div class="orders content-block visible" id="orders">
        <?php if ($has_orders) : ?>

            <div class="orders__head">
                <div class="number">Order</div>
                <div class="date">Date</div>
                <div class="status">Status</div>
                <div class="total">Total</div>
                <div class="operations"></div>
            </div>
            <div class="orders__items">
                <?php foreach ($customer_orders->orders as $customer_order) :
                    $order = wc_get_order($customer_order);
                    $item_count = $order->get_item_count();
                    ?>
                    <div class="orders__item">
                        <div class="number"><?php echo $order->get_order_number(); ?></div>
                        <div class="date"><?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></div>
                        <div class="status <?php echo esc_attr($order->get_status()); ?>"><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?></div>
                        <div class="total">
                            <?php
                            printf(_n('<span class="total__cost">%1$s</span>  for <span class="total__quantity">%2$s</span>  item', '<span class="total__cost">%1$s</span>  for <span class="total__quantity">%2$s</span> items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count);
                            ?>
                        </div>
                        <div class="operations">


                            <?php
                            $actions = wc_get_account_orders_actions($order);

                            if (!empty($actions)) {
                                foreach ($actions as $key => $action) {
                                    if ($key == 'pay') {
                                        ?>
                                        <a href="<?php echo esc_url($action['url']);?>" class="card">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/operations_icons.svg#card"></use></svg></a>
                                    <?php }
                                    if ($key == 'view') {
                                        ?>
                                        <a href="<?php echo esc_url($order->get_view_order_url()); ?>" class="view">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/operations_icons.svg#view"></use>
                                            </svg>
                                        </a>
                                    <?php }
                                    if ($key == 'cancel') {
                                        ?>
                                        <a href="<?php echo esc_url($action['url']);?>" class="view">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/operations_icons.svg#delete"></use>
                                            </svg>
                                        </a>
                                    <?php }

                                    if ($key == 'invoice' && !isset($actions['pay'])) {
                                        ?>
                                        <a href="<?php echo esc_url($action['url']);?>" class="download">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/operations_icons.svg#download"></use>
                                            </svg>
                                        </a>
                                    <?php }else{
//                                        echo '<a href="' . esc_url($action['url']) . '" class="woocommerce-button button ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a>';

                                    }
                                }
                            }
                            ?>

                            <a href="/my-account/print-order/<?php echo $order->get_order_number(); ?>/" class="print">
                                <svg xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="<?php echo TEMPLATEURI; ?>/svg/operations_icons.svg#print"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php do_action('woocommerce_before_account_orders_pagination'); ?>

            <?php if (1 < $customer_orders->max_num_pages) : ?>
                <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
                    <?php if (1 !== $current_page) : ?>
                        <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button"
                           href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>"><?php _e('Previous', 'woocommerce'); ?></a>
                    <?php endif; ?>

                    <?php if (intval($customer_orders->max_num_pages) !== $current_page) : ?>
                        <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button"
                           href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page + 1)); ?>"><?php _e('Next', 'woocommerce'); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
                <a class="woocommerce-Button button"
                   href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
                    <?php _e('Go shop', 'woocommerce') ?>
                </a>
                <?php _e('No order has been made yet.', 'woocommerce'); ?>
            </div>
        <?php endif; ?>
    </div>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>