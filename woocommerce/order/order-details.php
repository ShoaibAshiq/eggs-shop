<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>
<section class="woocommerce-order-details">
	<h2 class="woocommerce-order-details__title"><?php _e( 'Order details', 'woocommerce' ); ?></h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-table product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach ( $order_items as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

					wc_get_template( 'order/order-details-item.php', array(
						'order'			     => $order,
						'item_id'		     => $item_id,
						'item'			     => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'	     => $product ? $product->get_purchase_note() : '',
						'product'	         => $product,
					) );
				}
			?>
			<?php do_action( 'woocommerce_order_items_table', $order ); ?>
		</tbody>

		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo $total['label']; ?></th>
						<td><?php echo $total['value']; ?></td>
					</tr>
					<?php
				}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php _e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/*session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/

/*
    $user_id = $order->get_user_id();
    if($_SESSION['save_billing_address'] == 'false'){
        update_user_meta($user_id,'billing_first_name','');
        update_user_meta($user_id,'billing_last_name','');
        update_user_meta($user_id,'billing_company','');
        update_user_meta($user_id,'billing_address_1','');
        update_user_meta($user_id,'billing_apt','');
        update_user_meta($user_id,'billing_city','');
        update_user_meta($user_id,'billing_country','');
        update_user_meta($user_id,'billing_state','');
        update_user_meta($user_id,'billing_postcode','');
        update_user_meta($user_id,'billing_phone','');
    }
    if($_SESSION['save_shipping_address'] == 'false'){
        update_user_meta($user_id,'shipping_first_name','');
        update_user_meta($user_id,'shipping_last_name','');
        update_user_meta($user_id,'shipping_company','');
        update_user_meta($user_id,'shipping_address_1','');
        update_user_meta($user_id,'shipping_apart','');
        update_user_meta($user_id,'shipping_city','');
        update_user_meta($user_id,'shipping_country','');
        update_user_meta($user_id,'shipping_state','');
        update_user_meta($user_id,'shipping_postcode','');
        update_user_meta($user_id,'shipping_phone','');
    }
    $_SESSION['save_billing_address'] = '';
    $_SESSION['save_shipping_address'] = '';
*/
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
