<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}

$big_src = wp_get_attachment_url($product->get_image_id());
$new_big_src = wp_get_attachment_image_src($product->get_image_id(), 'custom-toys-images', true);

$pname = $product->name;
$pcost = $product->get_price();
?>
<div class="toycatitem product-category-toys">
	<a href="<?php the_permalink(); ?>">
		<div class="toys-image">
			<div class="toys-image-bg" style="height: 200px; background-image: url('<?php echo esc_url( $big_src ); ?>');background-repeat: no-repeat;background-size: contain;background-position: center;"></div>
		</div>
		<div class="toys-details">
			<span class="toyname"><?php echo esc_html( $pname ); ?></span>
			<span class="toyprice">$ <?php echo esc_html( $pcost ); ?></span>
			<span class="toybuybutton">Buy</span>
		</div>
	</a>
</div>
