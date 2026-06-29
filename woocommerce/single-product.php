<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header(); ?>

    <div class="main">

        <div class="head head--<?php echo $name?>">
            <?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            <img src="<?php echo IMGEDIR.image_name($name)?>" />
            <?php } ?>
          
            <div class="center--type2">
                <div class="head__title"><?php the_title(); ?></div>
            </div>
        </div>
        <?php while (have_posts()) : the_post(); ?>


            <?php wc_get_template_part('content', 'single-product'); ?>

        <?php endwhile; // end of the loop. ?>

    </div>


<?php get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
