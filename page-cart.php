<?php
get_header(); ?>
    <div class="main">

        <div class="head head--shopping-cart">
         <?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            <img src="<?php echo IMGEDIR.image_name($name)?>" />
            <?php } ?>
            <div class="head__title">Shopping Cart</div>
        </div>

        <div class="shopping">

            <?php echo do_shortcode("[woocommerce_cart]"); ?>
            <?php echo do_shortcode("[woocommerce_checkout]"); ?>


        </div>

    </div>
<?php
get_footer();
