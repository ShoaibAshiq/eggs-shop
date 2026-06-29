<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//
//$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
//	'order-number'  => __( 'Order', 'woocommerce' ),
//	'order-date'    => __( 'Date', 'woocommerce' ),
//	'order-status'  => __( 'Status', 'woocommerce' ),
//	'order-total'   => __( 'Total', 'woocommerce' ),
//	'order-actions' => '&nbsp;',
//) );
//
//$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
//	'numberposts' => $order_count,
//	'meta_key'    => '_customer_user',
//	'meta_value'  => get_current_user_id(),
//	'post_type'   => wc_get_order_types( 'view-orders' ),
//	'post_status' => array_keys( wc_get_order_statuses() ),
//) ) );
//
//if ( $customer_orders ) : ?>
<!---->
<!--	<h2>--><?php //echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent orders', 'woocommerce' ) ); ?><!--</h2>-->
<!---->
<!--	<table class="shop_table shop_table_responsive my_account_orders">-->
<!---->
<!--		<thead>-->
<!--			<tr>-->
<!--				--><?php //foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
<!--					<th class="--><?php //echo esc_attr( $column_id ); ?><!--"><span class="nobr">--><?php //echo esc_html( $column_name ); ?><!--</span></th>-->
<!--				--><?php //endforeach; ?>
<!--			</tr>-->
<!--		</thead>-->
<!---->
<!--		<tbody>-->
<!--			--><?php //foreach ( $customer_orders as $customer_order ) :
//				$order      = wc_get_order( $customer_order );
//				$item_count = $order->get_item_count();
//				?>
<!--				<tr class="order">-->
<!--					--><?php //foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
<!--						<td class="--><?php //echo esc_attr( $column_id ); ?><!--" data-title="--><?php //echo esc_attr( $column_name ); ?><!--">-->
<!--							--><?php //if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
<!--								--><?php //do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
<!---->
<!--							--><?php //elseif ( 'order-number' === $column_id ) : ?>
<!--								<a href="--><?php //echo esc_url( $order->get_view_order_url() ); ?><!--">-->
<!--									--><?php //echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
<!--								</a>-->
<!---->
<!--							--><?php //elseif ( 'order-date' === $column_id ) : ?>
<!--								<time datetime="--><?php //echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?><!--">--><?php //echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?><!--</time>-->
<!---->
<!--							--><?php //elseif ( 'order-status' === $column_id ) : ?>
<!--								--><?php //echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
<!---->
<!--							--><?php //elseif ( 'order-total' === $column_id ) : ?>
<!--								--><?php
//								/* translators: 1: formatted order total 2: total order items */
//								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
//								?>
<!---->
<!--							--><?php //elseif ( 'order-actions' === $column_id ) : ?>
<!--								--><?php
//								$actions = wc_get_account_orders_actions( $order );
//
//								if ( ! empty( $actions ) ) {
//									foreach ( $actions as $key => $action ) {
//										echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
//									}
//								}
//								?>
<!--							--><?php //endif; ?>
<!--						</td>-->
<!--					--><?php //endforeach; ?>
<!--				</tr>-->
<!--			--><?php //endforeach; ?>
<!--		</tbody>-->
<!--	</table>-->
<?php //endif; ?>
<div class="orders content-block visible" id="orders">
    <div class="orders__head">
        <div class="number">Order</div><div class="date">Date</div><div class="status">Status</div><div class="total">Total</div><div class="operations"></div>
    </div>
    <div class="orders__items">
        <div class="orders__item">
            <div class="number">11639</div><div class="date">May 23, 2016</div><div class="status processing">Processing</div><div class="total">&#36; <span class="total__cost">1,428.19</span> for <span class="total__quantity">601</span> items</div><div class="operations"><a href="#" class="view"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#view"></use></svg></a><a href="#" class="download"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#download"></use></svg></a><a href="#" class="print"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#print"></use></svg></a></div>
        </div>
        <div class="orders__item">
            <div class="number">10356</div><div class="date">November 18, 2015</div><div class="status failed">Failed</div><div class="total">&#36; <span class="total__cost">102.70</span> for <span class="total__quantity">24</span> items</div><div class="operations"><a href="#" class="card"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#card"></use></svg></a><a href="#" class="delete"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#delete"></use></svg></a><a href="#" class="view"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#view"></use></svg></a><a href="#" class="print"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#print"></use></svg></a></div>
        </div>
        <div class="orders__item">
            <div class="number">9964</div><div class="date">October 28, 2015</div><div class="status processing">Processing</div><div class="total">&#36; <span class="total__cost">83.64</span> for <span class="total__quantity">49</span> items</div><div class="operations"><a href="#" class="view"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#view"></use></svg></a><a href="#" class="download"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#download"></use></svg></a><a href="#" class="print"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#print"></use></svg></a></div>
        </div>
        <div class="orders__item">
            <div class="number">9745</div><div class="date">October 13, 2015</div><div class="status processing">Processing</div><div class="total">&#36; <span class="total__cost">144.74</span> for <span class="total__quantity">60</span> items</div><div class="operations"><a href="#" class="view"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#view"></use></svg></a><a href="#" class="download"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#download"></use></svg></a><a href="#" class="print"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#print"></use></svg></a></div>
        </div>
        <div class="orders__item">
            <div class="number">9744</div><div class="date">October 13, 2015</div><div class="status processing">Processing</div><div class="total">&#36; <span class="total__cost">8.95</span> for <span class="total__quantity">4</span> items</div><div class="operations"><a href="#" class="view"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#view"></use></svg></a><a href="#" class="download"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#download"></use></svg></a><a href="#" class="print"><svg xmlns="http://www.w3.org/2000/svg"><use xlink:href="svg/operations_icons.svg#print"></use></svg></a></div>
        </div>
    </div>
</div>
