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
$class_name = get_field('class_name', $product->get_id());
$bg_color = get_field('background_color', $product->get_id());
?>
<div class="item <?php echo $class_name; ?>" onclick="location.href='<?php the_permalink() ?>'"
     style="background-color: <?php echo $bg_color; ?>; background-image:url(<?php echo $big_src; ?>)">
    <a href="<?php the_permalink() ?>" class="button button--white">Buy</a>
</div>

